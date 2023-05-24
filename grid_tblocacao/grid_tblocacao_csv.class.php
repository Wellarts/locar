<?php

class grid_tblocacao_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_tblocacao_csv()
   {
      $this->nm_data   = new nm_data("pt_br");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
     global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo     = "sc_csv";
      $this->Arquivo    .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo    .= "_grid_tblocacao";
      $this->Arquivo    .= ".csv";
      $this->Tit_doc    = "grid_tblocacao.csv";
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
   }

   //----- 
   function grava_arquivo()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tblocacao']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tblocacao']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tblocacao']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['campos_busca']))
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
          $this->datasaidalocacao_2 = $Busca_temp['datasaidalocacao_input_2']; 
          $this->statuslocacao = $Busca_temp['statuslocacao']; 
          $tmp_pos = strpos($this->statuslocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->statuslocacao = substr($this->statuslocacao, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['where_pesq_filtro'];
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'on';
        $this->alertas();

$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idLocacao, idFKclienteLocacao, idFKveiculoLocacao, dataSaidaLocacao, horaSaidaLocacao, dataRetornoLocacao, horaRetornoLocacao, qtdDiarias, valorLiquidoLocacao, statusLocacao, kmSaidaLocacao, kmRetornoLocacao from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idLocacao, idFKclienteLocacao, idFKveiculoLocacao, dataSaidaLocacao, horaSaidaLocacao, dataRetornoLocacao, horaRetornoLocacao, qtdDiarias, valorLiquidoLocacao, statusLocacao, kmSaidaLocacao, kmRetornoLocacao from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      while (!$rs->EOF)
      {
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->idlocacao = $rs->fields[0] ;  
         $this->idlocacao = (string)$this->idlocacao;
         $this->idfkclientelocacao = $rs->fields[1] ;  
         $this->idfkclientelocacao = (string)$this->idfkclientelocacao;
         $this->idfkveiculolocacao = $rs->fields[2] ;  
         $this->idfkveiculolocacao = (string)$this->idfkveiculolocacao;
         $this->datasaidalocacao = $rs->fields[3] ;  
         $this->horasaidalocacao = $rs->fields[4] ;  
         $this->dataretornolocacao = $rs->fields[5] ;  
         $this->horaretornolocacao = $rs->fields[6] ;  
         $this->qtddiarias = $rs->fields[7] ;  
         $this->qtddiarias = (string)$this->qtddiarias;
         $this->valorliquidolocacao = $rs->fields[8] ;  
         $this->valorliquidolocacao =  str_replace(",", ".", $this->valorliquidolocacao);
         $this->valorliquidolocacao = (string)$this->valorliquidolocacao;
         $this->statuslocacao = $rs->fields[9] ;  
         $this->statuslocacao = (string)$this->statuslocacao;
         $this->kmsaidalocacao = $rs->fields[10] ;  
         $this->kmsaidalocacao = (string)$this->kmsaidalocacao;
         $this->kmretornolocacao = $rs->fields[11] ;  
         $this->kmretornolocacao = (string)$this->kmretornolocacao;
         //----- lookup - idfkclientelocacao
         $this->look_idfkclientelocacao = $this->idfkclientelocacao; 
         $this->Lookup->lookup_idfkclientelocacao($this->look_idfkclientelocacao, $this->idfkclientelocacao) ; 
         $this->look_idfkclientelocacao = ($this->look_idfkclientelocacao == "&nbsp;") ? "" : $this->look_idfkclientelocacao; 
         //----- lookup - idfkveiculolocacao
         $this->look_idfkveiculolocacao = $this->idfkveiculolocacao; 
         $this->Lookup->lookup_idfkveiculolocacao($this->look_idfkveiculolocacao, $this->idfkveiculolocacao) ; 
         $this->look_idfkveiculolocacao = ($this->look_idfkveiculolocacao == "&nbsp;") ? "" : $this->look_idfkveiculolocacao; 
         //----- lookup - statuslocacao
         $this->look_statuslocacao = $this->statuslocacao; 
         $this->Lookup->lookup_statuslocacao($this->look_statuslocacao); 
         $this->look_statuslocacao = ($this->look_statuslocacao == "&nbsp;") ? "" : $this->look_statuslocacao; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'on';
        $this->calculaKmTotal();$this->veiculosLocados();

$_SESSION['scriptcase']['grid_tblocacao']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->Delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);

      $rs->Close();
   }
   //----- idlocacao
   function NM_export_idlocacao()
   {
         nmgp_Form_Num_Val($this->idlocacao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->idlocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- idfkclientelocacao
   function NM_export_idfkclientelocacao()
   {
         nmgp_Form_Num_Val($this->look_idfkclientelocacao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_idfkclientelocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- idfkveiculolocacao
   function NM_export_idfkveiculolocacao()
   {
         nmgp_Form_Num_Val($this->look_idfkveiculolocacao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_idfkveiculolocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- datasaidalocacao
   function NM_export_datasaidalocacao()
   {
         $conteudo_x = $this->datasaidalocacao;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->datasaidalocacao, "YYYY-MM-DD");
             $this->datasaidalocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->datasaidalocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- horasaidalocacao
   function NM_export_horasaidalocacao()
   {
         $conteudo_x =  $this->horasaidalocacao;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->horasaidalocacao, "HH:II:SS");
             $this->horasaidalocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->horasaidalocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- dataretornolocacao
   function NM_export_dataretornolocacao()
   {
         $conteudo_x = $this->dataretornolocacao;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->dataretornolocacao, "YYYY-MM-DD");
             $this->dataretornolocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->dataretornolocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- horaretornolocacao
   function NM_export_horaretornolocacao()
   {
         $conteudo_x =  $this->horaretornolocacao;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->horaretornolocacao, "HH:II:SS");
             $this->horaretornolocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->horaretornolocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- kmtotal
   function NM_export_kmtotal()
   {
         nmgp_Form_Num_Val($this->kmtotal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->kmtotal);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- qtddiarias
   function NM_export_qtddiarias()
   {
         nmgp_Form_Num_Val($this->qtddiarias, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->qtddiarias);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valorliquidolocacao
   function NM_export_valorliquidolocacao()
   {
         nmgp_Form_Num_Val($this->valorliquidolocacao, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valorliquidolocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- fichalocacao
   function NM_export_fichalocacao()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->fichalocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- statuslocacao
   function NM_export_statuslocacao()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->look_statuslocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- kmsaidalocacao
   function NM_export_kmsaidalocacao()
   {
         nmgp_Form_Num_Val($this->kmsaidalocacao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->kmsaidalocacao);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tblocacao'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Consulta de Locações :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">CSV</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_tblocacao_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_tblocacao"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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
