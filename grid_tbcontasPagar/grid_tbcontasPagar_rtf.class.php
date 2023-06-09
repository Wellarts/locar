<?php

class grid_tbcontasPagar_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_tbcontasPagar_rtf()
   {
      $this->nm_data   = new nm_data("pt_br");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_tbcontasPagar";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_tbcontasPagar.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbcontasPagar']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tbcontasPagar']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tbcontasPagar']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->idfkcredorcontaspagar = $Busca_temp['idfkcredorcontaspagar']; 
          $tmp_pos = strpos($this->idfkcredorcontaspagar, "##@@");
          if ($tmp_pos !== false)
          {
              $this->idfkcredorcontaspagar = substr($this->idfkcredorcontaspagar, 0, $tmp_pos);
          }
          $this->datavencimentocontaspagar = $Busca_temp['datavencimentocontaspagar']; 
          $tmp_pos = strpos($this->datavencimentocontaspagar, "##@@");
          if ($tmp_pos !== false)
          {
              $this->datavencimentocontaspagar = substr($this->datavencimentocontaspagar, 0, $tmp_pos);
          }
          $this->datavencimentocontaspagar_2 = $Busca_temp['datavencimentocontaspagar_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idContasPagar, idFKCredorContasPagar, dataVencimentoContasPagar, dataPagamentoContasPagar, ordemParcelaContasPagar, valorContasPagar, quitadoContasPagar, valorPagoContasPagar, obsContasPagar, diasAviso from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idContasPagar, idFKCredorContasPagar, dataVencimentoContasPagar, dataPagamentoContasPagar, ordemParcelaContasPagar, valorContasPagar, quitadoContasPagar, valorPagoContasPagar, obsContasPagar, diasAviso from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idcontaspagar'])) ? $this->New_label['idcontaspagar'] : "C�digo"; 
          if ($Cada_col == "idcontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idfkcredorcontaspagar'])) ? $this->New_label['idfkcredorcontaspagar'] : "Credor"; 
          if ($Cada_col == "idfkcredorcontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['datavencimentocontaspagar'])) ? $this->New_label['datavencimentocontaspagar'] : "Vencimento"; 
          if ($Cada_col == "datavencimentocontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['datapagamentocontaspagar'])) ? $this->New_label['datapagamentocontaspagar'] : "Pagamento"; 
          if ($Cada_col == "datapagamentocontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ordemparcelacontaspagar'])) ? $this->New_label['ordemparcelacontaspagar'] : "Parcela"; 
          if ($Cada_col == "ordemparcelacontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valorcontaspagar'])) ? $this->New_label['valorcontaspagar'] : "Valor da Parcela"; 
          if ($Cada_col == "valorcontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['quitadocontaspagar'])) ? $this->New_label['quitadocontaspagar'] : "Pago?"; 
          if ($Cada_col == "quitadocontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valorpagocontaspagar'])) ? $this->New_label['valorpagocontaspagar'] : "Valor Pago"; 
          if ($Cada_col == "valorpagocontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obscontaspagar'])) ? $this->New_label['obscontaspagar'] : "Observa��es"; 
          if ($Cada_col == "obscontaspagar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->idcontaspagar = $rs->fields[0] ;  
         $this->idcontaspagar = (string)$this->idcontaspagar;
         $this->idfkcredorcontaspagar = $rs->fields[1] ;  
         $this->idfkcredorcontaspagar = (string)$this->idfkcredorcontaspagar;
         $this->datavencimentocontaspagar = $rs->fields[2] ;  
         $this->datapagamentocontaspagar = $rs->fields[3] ;  
         $this->ordemparcelacontaspagar = $rs->fields[4] ;  
         $this->ordemparcelacontaspagar = (string)$this->ordemparcelacontaspagar;
         $this->valorcontaspagar = $rs->fields[5] ;  
         $this->valorcontaspagar =  str_replace(",", ".", $this->valorcontaspagar);
         $this->valorcontaspagar = (string)$this->valorcontaspagar;
         $this->quitadocontaspagar = $rs->fields[6] ;  
         $this->quitadocontaspagar = (string)$this->quitadocontaspagar;
         $this->valorpagocontaspagar = $rs->fields[7] ;  
         $this->valorpagocontaspagar =  str_replace(",", ".", $this->valorpagocontaspagar);
         $this->valorpagocontaspagar = (string)$this->valorpagocontaspagar;
         $this->obscontaspagar = $rs->fields[8] ;  
         $this->diasaviso = $rs->fields[9] ;  
         $this->diasaviso = (string)$this->diasaviso;
         //----- lookup - idfkcredorcontaspagar
         $this->look_idfkcredorcontaspagar = $this->idfkcredorcontaspagar; 
         $this->Lookup->lookup_idfkcredorcontaspagar($this->look_idfkcredorcontaspagar, $this->idfkcredorcontaspagar) ; 
         $this->look_idfkcredorcontaspagar = ($this->look_idfkcredorcontaspagar == "&nbsp;") ? "" : $this->look_idfkcredorcontaspagar; 
         //----- lookup - quitadocontaspagar
         $this->look_quitadocontaspagar = $this->quitadocontaspagar; 
         $this->Lookup->lookup_quitadocontaspagar($this->look_quitadocontaspagar); 
         $this->look_quitadocontaspagar = ($this->look_quitadocontaspagar == "&nbsp;") ? "" : $this->look_quitadocontaspagar; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_tbcontasPagar']['contr_erro'] = 'on';
    $this->alertaContaVencer();$this->parcelaPaga();
$_SESSION['scriptcase']['grid_tbcontasPagar']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- idcontaspagar
   function NM_export_idcontaspagar()
   {
         nmgp_Form_Num_Val($this->idcontaspagar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->idcontaspagar))
         {
             $this->idcontaspagar = sc_convert_encoding($this->idcontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->idcontaspagar = str_replace('<', '&lt;', $this->idcontaspagar);
         $this->idcontaspagar = str_replace('>', '&gt;', $this->idcontaspagar);
         $this->Texto_tag .= "<td>" . $this->idcontaspagar . "</td>\r\n";
   }
   //----- idfkcredorcontaspagar
   function NM_export_idfkcredorcontaspagar()
   {
         nmgp_Form_Num_Val($this->look_idfkcredorcontaspagar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idfkcredorcontaspagar))
         {
             $this->look_idfkcredorcontaspagar = sc_convert_encoding($this->look_idfkcredorcontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idfkcredorcontaspagar = str_replace('<', '&lt;', $this->look_idfkcredorcontaspagar);
         $this->look_idfkcredorcontaspagar = str_replace('>', '&gt;', $this->look_idfkcredorcontaspagar);
         $this->Texto_tag .= "<td>" . $this->look_idfkcredorcontaspagar . "</td>\r\n";
   }
   //----- datavencimentocontaspagar
   function NM_export_datavencimentocontaspagar()
   {
         $conteudo_x = $this->datavencimentocontaspagar;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->datavencimentocontaspagar, "YYYY-MM-DD");
             $this->datavencimentocontaspagar = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->datavencimentocontaspagar))
         {
             $this->datavencimentocontaspagar = sc_convert_encoding($this->datavencimentocontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->datavencimentocontaspagar = str_replace('<', '&lt;', $this->datavencimentocontaspagar);
         $this->datavencimentocontaspagar = str_replace('>', '&gt;', $this->datavencimentocontaspagar);
         $this->Texto_tag .= "<td>" . $this->datavencimentocontaspagar . "</td>\r\n";
   }
   //----- datapagamentocontaspagar
   function NM_export_datapagamentocontaspagar()
   {
         $conteudo_x = $this->datapagamentocontaspagar;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->datapagamentocontaspagar, "YYYY-MM-DD");
             $this->datapagamentocontaspagar = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->datapagamentocontaspagar))
         {
             $this->datapagamentocontaspagar = sc_convert_encoding($this->datapagamentocontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->datapagamentocontaspagar = str_replace('<', '&lt;', $this->datapagamentocontaspagar);
         $this->datapagamentocontaspagar = str_replace('>', '&gt;', $this->datapagamentocontaspagar);
         $this->Texto_tag .= "<td>" . $this->datapagamentocontaspagar . "</td>\r\n";
   }
   //----- ordemparcelacontaspagar
   function NM_export_ordemparcelacontaspagar()
   {
         nmgp_Form_Num_Val($this->ordemparcelacontaspagar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->ordemparcelacontaspagar))
         {
             $this->ordemparcelacontaspagar = sc_convert_encoding($this->ordemparcelacontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ordemparcelacontaspagar = str_replace('<', '&lt;', $this->ordemparcelacontaspagar);
         $this->ordemparcelacontaspagar = str_replace('>', '&gt;', $this->ordemparcelacontaspagar);
         $this->Texto_tag .= "<td>" . $this->ordemparcelacontaspagar . "</td>\r\n";
   }
   //----- valorcontaspagar
   function NM_export_valorcontaspagar()
   {
         nmgp_Form_Num_Val($this->valorcontaspagar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->valorcontaspagar))
         {
             $this->valorcontaspagar = sc_convert_encoding($this->valorcontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->valorcontaspagar = str_replace('<', '&lt;', $this->valorcontaspagar);
         $this->valorcontaspagar = str_replace('>', '&gt;', $this->valorcontaspagar);
         $this->Texto_tag .= "<td>" . $this->valorcontaspagar . "</td>\r\n";
   }
   //----- quitadocontaspagar
   function NM_export_quitadocontaspagar()
   {
         if (!NM_is_utf8($this->look_quitadocontaspagar))
         {
             $this->look_quitadocontaspagar = sc_convert_encoding($this->look_quitadocontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_quitadocontaspagar = str_replace('<', '&lt;', $this->look_quitadocontaspagar);
         $this->look_quitadocontaspagar = str_replace('>', '&gt;', $this->look_quitadocontaspagar);
         $this->Texto_tag .= "<td>" . $this->look_quitadocontaspagar . "</td>\r\n";
   }
   //----- valorpagocontaspagar
   function NM_export_valorpagocontaspagar()
   {
         nmgp_Form_Num_Val($this->valorpagocontaspagar, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->valorpagocontaspagar))
         {
             $this->valorpagocontaspagar = sc_convert_encoding($this->valorpagocontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->valorpagocontaspagar = str_replace('<', '&lt;', $this->valorpagocontaspagar);
         $this->valorpagocontaspagar = str_replace('>', '&gt;', $this->valorpagocontaspagar);
         $this->Texto_tag .= "<td>" . $this->valorpagocontaspagar . "</td>\r\n";
   }
   //----- obscontaspagar
   function NM_export_obscontaspagar()
   {
         $this->obscontaspagar = html_entity_decode($this->obscontaspagar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obscontaspagar = strip_tags($this->obscontaspagar);
         if (!NM_is_utf8($this->obscontaspagar))
         {
             $this->obscontaspagar = sc_convert_encoding($this->obscontaspagar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->obscontaspagar = str_replace('<', '&lt;', $this->obscontaspagar);
         $this->obscontaspagar = str_replace('>', '&gt;', $this->obscontaspagar);
         $this->Texto_tag .= "<td>" . $this->obscontaspagar . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbcontasPagar'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Contas � Pagar/Pagas :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="grid_tbcontasPagar_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_tbcontasPagar"> 
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
function alertaContaVencer()
{
$_SESSION['scriptcase']['grid_tbcontasPagar']['contr_erro'] = 'on';
     


$current_date = date('Y-m-d');
$amount_days  = $this->nm_data->Dif_Datas($this->datavencimentocontaspagar , 'aaaa-mm-dd', $current_date, 'aaaa-mm-dd');

if($amount_days  < 2 && $this->quitadocontaspagar  == 0)
{

	$this->NM_field_style["datavencimentocontaspagar"] = "background-color:#cd5555;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";


}
elseif($amount_days  == 2 && $this->quitadocontaspagar  == 0)
{
	
     $this->NM_field_style["datavencimentocontaspagar"] = "background-color:#cd5555;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
	
}
elseif($amount_days  > 2 && $this->quitadocontaspagar  == 0)
{
	
	 $this->NM_text_style["datavencimentocontaspagar"] = "background-color:;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}







$vencimento = $this->nm_conv_data_db($this->datavencimentocontaspagar ,"aaaa-mm-dd","ddmmaaaa");
$hoje = date('dmY');
$diasAviso = $this->diasaviso ;
$numeroParcela = $this->ordemparcelacontaspagar ;
$idCredor = $this->idfkcredorcontaspagar ;
$valorParcela = $this->valorcontaspagar ;
	

 
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

if($diasRestante <= $diasAviso &&$this->quitadocontaspagar  == 0)
	{
		$this->nm_mens_alert[] = "Falta ". $diasRestante ." dia(s) para o vencimento da parcela n� ". $numeroParcela ." do credor ". $nomeCredor ." de valor R$ ". $valorParcela ." reais.";}
$_SESSION['scriptcase']['grid_tbcontasPagar']['contr_erro'] = 'off';
}
function parcelaPaga()
{
$_SESSION['scriptcase']['grid_tbcontasPagar']['contr_erro'] = 'on';
     
$pago = $this->quitadocontaspagar ;

if($pago == 0)
	{
		$this->NM_field_style["quitadocontaspagar"] = "background-color:#6495ed;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
 }
else
	{
	$this->NM_field_style["quitadocontaspagar"] = "background-color:#8fbc8f;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$_SESSION['scriptcase']['grid_tbcontasPagar']['contr_erro'] = 'off';
}
}

?>
