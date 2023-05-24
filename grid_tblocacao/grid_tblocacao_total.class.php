<?php

class grid_tblocacao_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_tblocacao_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_tblocacao']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_tblocacao']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idfkveiculolocacao = $Busca_temp['idfkveiculolocacao']; 
          $tmp_pos = strpos($this->idfkveiculolocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->idfkveiculolocacao = substr($this->idfkveiculolocacao, 0, $tmp_pos);
          }
          $this->idfkclientelocacao = $Busca_temp['idfkclientelocacao']; 
          $tmp_pos = strpos($this->idfkclientelocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->idfkclientelocacao = substr($this->idfkclientelocacao, 0, $tmp_pos);
          }
          $this->datasaidalocacao = $Busca_temp['datasaidalocacao']; 
          $tmp_pos = strpos($this->datasaidalocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->datasaidalocacao = substr($this->datasaidalocacao, 0, $tmp_pos);
          }
          $datasaidalocacao_2 = $Busca_temp['datasaidalocacao_input_2']; 
          $this->datasaidalocacao_2 = $Busca_temp['datasaidalocacao_input_2']; 
          $this->statuslocacao = $Busca_temp['statuslocacao']; 
          $tmp_pos = strpos($this->statuslocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->statuslocacao = substr($this->statuslocacao, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $idfkclientelocacao, $idfkveiculolocacao;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['tot_geral'] = array() ;  
      $nm_comando = "select count(*), sum(valorLiquidoLocacao) as sum_valorliquidolocacao from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['contr_total_geral'] = "OK";
   } 

   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
function alertas()
{
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'on';
         

 
      $nm_select = "SELECT COUNT(*) FROM tbveiculos"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DatasetX = array();
      $this->datasetx = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DatasetX[$y] [$x] = $rx->fields[$x];
                        $this->datasetx[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DatasetX = false;
          $this->DatasetX_erro = $this->Db->ErrorMsg();
          $this->datasetx = false;
          $this->datasetx_erro = $this->Db->ErrorMsg();
      } 
;
$cont = $this->datasetx[0][0];
$var = 1;

do 
	{
	
		 
      $nm_select = "SELECT modeloVeiculo, placaVeiculo, kmAtualVeiculo, proxTrocaOleoVeiculo, proxTrocaFiltroVeiculo,  avisoTrocaOleoVeiculo, avisoTrocaFiltroVeiculo, proxTrocaCorreiaVeiculo, proxTrocaPastilhaVeiculo,avisoTrocaCorreiaVeiculo, avisoTrocaPastilhaVeiculo FROM tbveiculos WHERE idVeiculo = $var"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Dataset[$y] [$x] = $rx->fields[$x];
                        $this->dataset[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 
;

		$modelo = $this->dataset[0][0];
	    $placa = $this->dataset[0][1];
	    $km	 = $this->dataset[0][2];	
		$trocaOleo  = $this->dataset[0][3];
		$trocaFiltro  = $this->dataset[0][4];
		$avisoOleo  = $this->dataset[0][5];
		$avisoFiltro  = $this->dataset[0][6];
		$trocaCorreia  = $this->dataset[0][7];
		$trocaPastilha  = $this->dataset[0][8];
		$avisoCorreia  = $this->dataset[0][9];
		$avisoPastilha  = $this->dataset[0][10];
			
		$calculaTrocaOleo = $trocaOleo - $km;
		
		if($calculaTrocaOleo <= $avisoOleo)
			{

										
              $this->nm_mens_alert[] = "Falta $calculaTrocaOleo km para a troca de óleo do veículo: $modelo - $placa";}
	
	  $calculaTrocaFiltro =  $trocaFiltro - $km;
		
		if($calculaTrocaFiltro <= $avisoFiltro)
			{

										
              $this->nm_mens_alert[] = "Falta $calculaTrocaFiltro km para a troca do filtro de óleo do veículo: $modelo - $placa";}   
	
	$calculaTrocaCorreia =  $trocaCorreia - $km;
		
		if($calculaTrocaCorreia <= $avisoCorreia)
			{

										
              $this->nm_mens_alert[] = "Falta $calculaTrocaCorreia km para a troca da Correia Dentada do veículo: $modelo - $placa";}
	
	$calculaTrocaPastilha =  $trocaPastilha - $km;
		
		if($calculaTrocaPastilha <= $avisoPastilha)
			{

										
              $this->nm_mens_alert[] = "Falta $calculaTrocaPastilha km para a troca da Pastilha de Freio do veículo: $modelo - $placa";}      
	    
		 $var++;
	     
	  } 
    while($var <= $cont);
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'off';
}
function alertasContasVencer()
{
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'on';
         


 
      $nm_select = "SELECT COUNT(*) FROM tbcontasPagar 
                       WHERE quitadoContasPagar = 0"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DatasetX = array();
      $this->datasetx = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DatasetX[$y] [$x] = $rx->fields[$x];
                        $this->datasetx[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DatasetX = false;
          $this->DatasetX_erro = $this->Db->ErrorMsg();
          $this->datasetx = false;
          $this->datasetx_erro = $this->Db->ErrorMsg();
      } 
;
$cont = $this->datasetx[0][0];
$var = 1;

do 
{

 
      $nm_select = "SELECT idFKCredorContasPagar, dataVencimentoContasPagar, valorContasPagar, ordemParcelaContasPagar,  diasAviso FROM tbcontasPagar
WHERE quitadoContasPagar = 0 AND idContasPagar = $var"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset2 = array();
      $this->dataset2 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Dataset2[$y] [$x] = $rx->fields[$x];
                        $this->dataset2[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset2 = false;
          $this->Dataset2_erro = $this->Db->ErrorMsg();
          $this->dataset2 = false;
          $this->dataset2_erro = $this->Db->ErrorMsg();
      } 
;

$vencimento = $this->nm_conv_data_db($this->dataset2[0][1],"db_format","ddmmaaaa");
$hoje = date('dmY');
$diasAviso = $this->dataset2[0][4];
$numeroParcela = $this->dataset2[0][3];
$idCredor = $this->dataset2[0][0];
$valorParcela = $this->dataset2[0][2];
	

 
      $nm_select = "SELECT nomeCredor FROM tbcredores 
WHERE idCredor = $idCredor"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset3 = array();
      $this->dataset3 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Dataset3[$y] [$x] = $rx->fields[$x];
                        $this->dataset3[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset3 = false;
          $this->Dataset3_erro = $this->Db->ErrorMsg();
          $this->dataset3 = false;
          $this->dataset3_erro = $this->Db->ErrorMsg();
      } 
;

$nomeCredor = $this->dataset3[0][0];




$diasRestante = $this->nm_data->Dif_Datas($vencimento, "ddmmaaaa", $hoje, "ddmmaaaa");

if($diasRestante <= $diasAviso)
	{
		$this->nm_mens_alert[] = "Falta ". $diasRestante ." dia(s) para o vencimento da parcela nº ". $numeroParcela ." do credor ". $nomeCredor ." de valor R$ ". $valorParcela ." reais.";}
	
	 $var++;
	     
	  } 
    while($var <= $cont);
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'off';
}
function calculaKmTotal()
{
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'on';
         
$this->kmtotal  =$this->kmretornolocacao  - $this->kmsaidalocacao ;

$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'off';
}
function veiculosLocados()
{
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'on';
         
 
      $nm_select = "SELECT statusLocacao FROM tblocacao
WHERE idLocacao = '$this->idlocacao' "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Dataset = array();
      $this->dataset = array();
     if ($this->idlocacao !== "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Dataset[$y] [$x] = $rx->fields[$x];
                        $this->dataset[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Dataset = false;
          $this->Dataset_erro = $this->Db->ErrorMsg();
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if($this->dataset[0][0] == 0)
	{
	  $this->NM_cmp_hidden["statuslocacao"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['php_cmp_sel']["statuslocacao"] = "off"; }
	}
   else
    {
	  $this->NM_cmp_hidden["statuslocacao"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['php_cmp_sel']["statuslocacao"] = "on"; }
	}
$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'off';
}
}

?>
