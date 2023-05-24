<?php

class grid_tblucratividade_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_tblucratividade_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_tblucratividade']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_tblucratividade']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idfklocacao = $Busca_temp['idfklocacao']; 
          $tmp_pos = strpos($this->idfklocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->idfklocacao = substr($this->idfklocacao, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $idfkveiculo;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['tot_geral'] = array() ;  
      $nm_comando = "select count(*), sum(valorDiaria) as sum_valordiaria from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['contr_total_geral'] = "OK";
   } 

   //-----  datadiaria
   function quebra_datadiaria_porMes($datadiaria, $arg_sum_datadiaria) 
   {
      global $tot_datadiaria , $idfkveiculo, $Sc_groupby_datadiaria;  
      $Sc_groupby_datadiaria = "dataDiaria";
      $tot_datadiaria = array() ;  
      $nm_comando = "select count(*), sum(valorDiaria) as sum_valordiaria from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $Sc_groupby_datadiaria . $arg_sum_datadiaria ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $Sc_groupby_datadiaria . $arg_sum_datadiaria ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datadiaria[0] = NM_encode_input(sc_strip_script($datadiaria)) ; 
      $tot_datadiaria[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datadiaria[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 


   //----- 
   function resumo_porMes($destino_resumo, &$array_total_datadiaria)
   {
      global $nada, $nm_lang, $idfkveiculo;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->idfklocacao = $Busca_temp['idfklocacao']; 
       $tmp_pos = strpos($this->idfklocacao, "##@@");
       if ($tmp_pos !== false)
       {
           $this->idfklocacao = substr($this->idfklocacao, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblucratividade']['where_pesq_filtro'];
   $nmgp_order_by = " order by dataDiaria desc"; 
     $comando  = "select count(*), sum(valorDiaria) as sum_valordiaria, dataDiaria from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by dataDiaria  " . $nmgp_order_by;
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $registro[2] = substr($registro[2], 0, 7);
         $datadiaria      = $registro[2];
         $datadiaria_orig = $registro[2];
         $conteudo = $registro[2];
        $conteudo_x = $conteudo;
        nm_conv_limpa_dado($conteudo_x, "YYYY-MM");
        if (is_numeric($conteudo_x) && $conteudo_x > 0) 
        { 
            $this->nm_data->SetaData($conteudo, "YYYY-MM");
            $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "mmaaaa"));
        } 
         $datadiaria = $conteudo;
         if (null === $datadiaria)
         {
             $datadiaria = '';
         }
         if (null === $datadiaria_orig)
         {
             $datadiaria_orig = '';
         }
         $val_grafico_datadiaria = $datadiaria;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $datadiaria_orig = NM_encode_input(sc_strip_script($datadiaria_orig));
         if (isset($datadiaria_orig))
         {
            //-----  datadiaria
            if (!isset($array_total_datadiaria[$datadiaria_orig]))
            {
               $array_total_datadiaria[$datadiaria_orig][0] = $registro[0];
               $array_total_datadiaria[$datadiaria_orig][1] = $registro[1];
               $array_total_datadiaria[$datadiaria_orig][2] = NM_encode_input(sc_strip_script($val_grafico_datadiaria));
               $array_total_datadiaria[$datadiaria_orig][3] = $datadiaria_orig;
            }
            else
            {
               $array_total_datadiaria[$datadiaria_orig][0] += $registro[0];
               $array_total_datadiaria[$datadiaria_orig][1] += $registro[1];
            }
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
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
function geraLucratividade()
{
$_SESSION['scriptcase']['grid_tblucratividade']['contr_erro'] = 'on';
   

     $nm_select = "DELETE FROM tblucratividade"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

 
      $nm_select = "SELECT COUNT(*) FROM tblocacao"; 
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
$qtdRegistros = $this->dataset[0][0];

 
      $nm_select = "SELECT MAX(idLocacao) FROM tblocacao"; 
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
$maiorRegistro = $this->dataset[0][0];

$qtdRealRegistros = ($maiorRegistro - $qtdRegistros) + $qtdRegistros;

for($a=1;$a<=$qtdRealRegistros;$a++)
	{
				 

			$check_table = 'tblocacao';    
			$check_where = "idLocacao = '$a'"; 

			$check_sql = 'SELECT *'
			   . ' FROM '  . $check_table
			   . ' WHERE ' . $check_where;
			 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->dataset = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 
;

			if (false == $this->dataset )
			{
			}
			elseif ($this->dataset->EOF)
			{
			}
			else
			{
				     
      $nm_select = "SELECT idLocacao, idFKveiculoLocacao, dataSaidaLocacao, valorLiquidoLocacao, 													qtdDiarias   FROM tblocacao WHERE idLocacao = $a"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DatasetSQL = array();
      $this->datasetsql = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DatasetSQL[$y] [$x] = $rx->fields[$x];
                        $this->datasetsql[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DatasetSQL = false;
          $this->DatasetSQL_erro = $this->Db->ErrorMsg();
          $this->datasetsql = false;
          $this->datasetsql_erro = $this->Db->ErrorMsg();
      } 
; 

					$idLocacao = $this->datasetsql[0][0];
					$veiculoLocacao = 	$this->datasetsql[0][1];
					$dataSaidaLocacao = $this->datasetsql[0][2];	
					$valorLocacao = $this->datasetsql[0][3];
					$qtdDiariaLocacao = $this->datasetsql[0][4];	
					

					$valorDiariaDia = $valorLocacao / $qtdDiariaLocacao;
					$dataSaida  = $dataSaidaLocacao;
					for($x=1;$x<=$qtdDiariaLocacao;$x++)
						{


							$insert_table  = 'tblucratividade';      
							$insert_fields = array(   
								 'idFKLocacao' => "'$idLocacao'",
								 'valorDiaria' => "'$valorDiariaDia'",
								 'dataDiaria'  => "'$dataSaida'",
								 'idFKveiculo'  => "'$veiculoLocacao'",
							 );

							$insert_sql = 'INSERT INTO ' . $insert_table
								. ' ('   . implode(', ', array_keys($insert_fields))   . ')'
								. ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';

							 $dataSaida = 
         nm_conv_form_data($this->nm_data->CalculaData($dataSaida, "aaaa-mm-dd", "+", 1, 0, 0), "aaaa-mm-dd",  "aaaa-mm-dd"); 
      

							
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

					   }

		    }   
	

	
	}
$_SESSION['scriptcase']['grid_tblucratividade']['contr_erro'] = 'off';
}
}

?>
