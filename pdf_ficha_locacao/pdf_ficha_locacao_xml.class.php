<?php

class pdf_ficha_locacao_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function pdf_ficha_locacao_xml()
   {
      $this->nm_data   = new nm_data("pt_br");
   }

   //---- 
   function monta_xml()
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
      $this->nm_data    = new nm_data("pt_br");
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $this->Teste_validade = new NM_Valida;
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_pdf_ficha_locacao";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdf_ficha_locacao.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tblocacao_horasaidalocacao = $Busca_temp['tblocacao_horasaidalocacao']; 
          $tmp_pos = strpos($this->tblocacao_horasaidalocacao, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tblocacao_horasaidalocacao = substr($this->tblocacao_horasaidalocacao, 0, $tmp_pos);
          }
          $this->tbclientes_nomecliente = $Busca_temp['tbclientes_nomecliente']; 
          $tmp_pos = strpos($this->tbclientes_nomecliente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tbclientes_nomecliente = substr($this->tbclientes_nomecliente, 0, $tmp_pos);
          }
          $this->tbclientes_enderecocliente = $Busca_temp['tbclientes_enderecocliente']; 
          $tmp_pos = strpos($this->tbclientes_enderecocliente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tbclientes_enderecocliente = substr($this->tbclientes_enderecocliente, 0, $tmp_pos);
          }
          $this->tbclientes_idfkcidadecliente = $Busca_temp['tbclientes_idfkcidadecliente']; 
          $tmp_pos = strpos($this->tbclientes_idfkcidadecliente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tbclientes_idfkcidadecliente = substr($this->tbclientes_idfkcidadecliente, 0, $tmp_pos);
          }
          $this->tbclientes_idfkcidadecliente_2 = $Busca_temp['tbclientes_idfkcidadecliente_input_2']; 
          $this->tbclientes_idfkestadocliente = $Busca_temp['tbclientes_idfkestadocliente']; 
          $tmp_pos = strpos($this->tbclientes_idfkestadocliente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tbclientes_idfkestadocliente = substr($this->tbclientes_idfkestadocliente, 0, $tmp_pos);
          }
          $this->tbclientes_idfkestadocliente_2 = $Busca_temp['tbclientes_idfkestadocliente_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tbclientes.nomeCliente as tbclientes_nomecliente, tbclientes.enderecoCliente as tbclientes_enderecocliente, tbclientes.idFKcidadeCliente as tbclientes_idfkcidadecliente, tbclientes.idFKestadoCliente as tbclientes_idfkestadocliente, tbclientes.foneCliente as tbclientes_fonecliente, tbclientes.fone2Cliente as tbclientes_fone2cliente, tbclientes.numCnhCliente as tbclientes_numcnhcliente, tbclientes.validadeCnhCliente as tbclientes_validadecnhcliente, tbclientes.cpfCliente as tbclientes_cpfcliente, tbclientes.rgCliente as tbclientes_rgcliente, tbclientes.expedRG as tbclientes_expedrg, tbclientes.idFKufExpedRG as tbclientes_idfkufexpedrg, tbclientes.nomeCliente as nomecliente, tbclientes.foneCliente as fonecliente, tbclientes.fone2Cliente as fone2cliente, tbclientes.numCnhCliente as numcnhcliente, tbclientes.validadeCnhCliente as validadecnhcliente, tbclientes.cpfCliente as cpfcliente, tbclientes.rgCliente as rgcliente, tbclientes.expedRG as expedrg, tbclientes.idFKufExpedRG as idfkufexpedrg, tbveiculos.idFKmarcaVeiculo as tbveiculos_idfkmarcaveiculo, tbveiculos.modeloVeiculo as tbveiculos_modeloveiculo, tbveiculos.anoVeiculo as tbveiculos_anoveiculo, tbveiculos.placaVeiculo as tbveiculos_placaveiculo, tbveiculos.corVeiculo as tbveiculos_corveiculo, tbveiculos.valorDiaria as tbveiculos_valordiaria, tbveiculos.chassiVeiculo as tbveiculos_chassiveiculo, tblocacao.dataSaidaLocacao as tblocacao_datasaidalocacao, tblocacao.horaSaidaLocacao as tblocacao_horasaidalocacao, tblocacao.kmSaidaLocacao as tblocacao_kmsaidalocacao, tblocacao.dataRetornoLocacao as tblocacao_dataretornolocacao, tblocacao.horaRetornoLocacao as tblocacao_horaretornolocacao, tblocacao.qtdDiarias as tblocacao_qtddiarias, tblocacao.valorLiquidoLocacao as tblocacao_valorliquidolocacao, tblocacao.obsLocacao as tblocacao_obslocacao from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tbclientes.nomeCliente as tbclientes_nomecliente, tbclientes.enderecoCliente as tbclientes_enderecocliente, tbclientes.idFKcidadeCliente as tbclientes_idfkcidadecliente, tbclientes.idFKestadoCliente as tbclientes_idfkestadocliente, tbclientes.foneCliente as tbclientes_fonecliente, tbclientes.fone2Cliente as tbclientes_fone2cliente, tbclientes.numCnhCliente as tbclientes_numcnhcliente, tbclientes.validadeCnhCliente as tbclientes_validadecnhcliente, tbclientes.cpfCliente as tbclientes_cpfcliente, tbclientes.rgCliente as tbclientes_rgcliente, tbclientes.expedRG as tbclientes_expedrg, tbclientes.idFKufExpedRG as tbclientes_idfkufexpedrg, tbclientes.nomeCliente as nomecliente, tbclientes.foneCliente as fonecliente, tbclientes.fone2Cliente as fone2cliente, tbclientes.numCnhCliente as numcnhcliente, tbclientes.validadeCnhCliente as validadecnhcliente, tbclientes.cpfCliente as cpfcliente, tbclientes.rgCliente as rgcliente, tbclientes.expedRG as expedrg, tbclientes.idFKufExpedRG as idfkufexpedrg, tbveiculos.idFKmarcaVeiculo as tbveiculos_idfkmarcaveiculo, tbveiculos.modeloVeiculo as tbveiculos_modeloveiculo, tbveiculos.anoVeiculo as tbveiculos_anoveiculo, tbveiculos.placaVeiculo as tbveiculos_placaveiculo, tbveiculos.corVeiculo as tbveiculos_corveiculo, tbveiculos.valorDiaria as tbveiculos_valordiaria, tbveiculos.chassiVeiculo as tbveiculos_chassiveiculo, tblocacao.dataSaidaLocacao as tblocacao_datasaidalocacao, tblocacao.horaSaidaLocacao as tblocacao_horasaidalocacao, tblocacao.kmSaidaLocacao as tblocacao_kmsaidalocacao, tblocacao.dataRetornoLocacao as tblocacao_dataretornolocacao, tblocacao.horaRetornoLocacao as tblocacao_horaretornolocacao, tblocacao.qtdDiarias as tblocacao_qtddiarias, tblocacao.valorLiquidoLocacao as tblocacao_valorliquidolocacao, tblocacao.obsLocacao as tblocacao_obslocacao from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<pdf_ficha_locacao";
         $this->tbclientes_nomecliente = $rs->fields[0] ;  
         $this->tbclientes_enderecocliente = $rs->fields[1] ;  
         $this->tbclientes_idfkcidadecliente = $rs->fields[2] ;  
         $this->tbclientes_idfkcidadecliente = (string)$this->tbclientes_idfkcidadecliente;
         $this->tbclientes_idfkestadocliente = $rs->fields[3] ;  
         $this->tbclientes_idfkestadocliente = (string)$this->tbclientes_idfkestadocliente;
         $this->tbclientes_fonecliente = $rs->fields[4] ;  
         $this->tbclientes_fone2cliente = $rs->fields[5] ;  
         $this->tbclientes_numcnhcliente = $rs->fields[6] ;  
         $this->tbclientes_validadecnhcliente = $rs->fields[7] ;  
         $this->tbclientes_cpfcliente = $rs->fields[8] ;  
         $this->tbclientes_rgcliente = $rs->fields[9] ;  
         $this->tbclientes_expedrg = $rs->fields[10] ;  
         $this->tbclientes_idfkufexpedrg = $rs->fields[11] ;  
         $this->tbclientes_idfkufexpedrg = (string)$this->tbclientes_idfkufexpedrg;
         $this->nomecliente = $rs->fields[12] ;  
         $this->fonecliente = $rs->fields[13] ;  
         $this->fone2cliente = $rs->fields[14] ;  
         $this->numcnhcliente = $rs->fields[15] ;  
         $this->validadecnhcliente = $rs->fields[16] ;  
         $this->cpfcliente = $rs->fields[17] ;  
         $this->rgcliente = $rs->fields[18] ;  
         $this->expedrg = $rs->fields[19] ;  
         $this->idfkufexpedrg = $rs->fields[20] ;  
         $this->idfkufexpedrg = (string)$this->idfkufexpedrg;
         $this->tbveiculos_idfkmarcaveiculo = $rs->fields[21] ;  
         $this->tbveiculos_idfkmarcaveiculo = (string)$this->tbveiculos_idfkmarcaveiculo;
         $this->tbveiculos_modeloveiculo = $rs->fields[22] ;  
         $this->tbveiculos_anoveiculo = $rs->fields[23] ;  
         $this->tbveiculos_anoveiculo = (string)$this->tbveiculos_anoveiculo;
         $this->tbveiculos_placaveiculo = $rs->fields[24] ;  
         $this->tbveiculos_corveiculo = $rs->fields[25] ;  
         $this->tbveiculos_valordiaria = $rs->fields[26] ;  
         $this->tbveiculos_valordiaria =  str_replace(",", ".", $this->tbveiculos_valordiaria);
         $this->tbveiculos_valordiaria = (string)$this->tbveiculos_valordiaria;
         $this->tbveiculos_chassiveiculo = $rs->fields[27] ;  
         $this->tblocacao_datasaidalocacao = $rs->fields[28] ;  
         $this->tblocacao_horasaidalocacao = $rs->fields[29] ;  
         $this->tblocacao_kmsaidalocacao = $rs->fields[30] ;  
         $this->tblocacao_kmsaidalocacao = (string)$this->tblocacao_kmsaidalocacao;
         $this->tblocacao_dataretornolocacao = $rs->fields[31] ;  
         $this->tblocacao_horaretornolocacao = $rs->fields[32] ;  
         $this->tblocacao_qtddiarias = $rs->fields[33] ;  
         $this->tblocacao_qtddiarias = (string)$this->tblocacao_qtddiarias;
         $this->tblocacao_valorliquidolocacao = $rs->fields[34] ;  
         $this->tblocacao_valorliquidolocacao =  str_replace(",", ".", $this->tblocacao_valorliquidolocacao);
         $this->tblocacao_valorliquidolocacao = (string)$this->tblocacao_valorliquidolocacao;
         $this->tblocacao_obslocacao = $rs->fields[35] ;  
         //----- lookup - tbclientes_idfkcidadecliente
         $this->look_tbclientes_idfkcidadecliente = $this->tbclientes_idfkcidadecliente; 
         $this->Lookup->lookup_tbclientes_idfkcidadecliente($this->look_tbclientes_idfkcidadecliente, $this->tbclientes_idfkcidadecliente) ; 
         $this->look_tbclientes_idfkcidadecliente = ($this->look_tbclientes_idfkcidadecliente == "&nbsp;") ? "" : $this->look_tbclientes_idfkcidadecliente; 
         //----- lookup - tbclientes_idfkestadocliente
         $this->look_tbclientes_idfkestadocliente = $this->tbclientes_idfkestadocliente; 
         $this->Lookup->lookup_tbclientes_idfkestadocliente($this->look_tbclientes_idfkestadocliente, $this->tbclientes_idfkestadocliente) ; 
         $this->look_tbclientes_idfkestadocliente = ($this->look_tbclientes_idfkestadocliente == "&nbsp;") ? "" : $this->look_tbclientes_idfkestadocliente; 
         //----- lookup - tbclientes_idfkufexpedrg
         $this->look_tbclientes_idfkufexpedrg = $this->tbclientes_idfkufexpedrg; 
         $this->Lookup->lookup_tbclientes_idfkufexpedrg($this->look_tbclientes_idfkufexpedrg, $this->tbclientes_idfkufexpedrg) ; 
         $this->look_tbclientes_idfkufexpedrg = ($this->look_tbclientes_idfkufexpedrg == "&nbsp;") ? "" : $this->look_tbclientes_idfkufexpedrg; 
         //----- lookup - tbveiculos_idfkmarcaveiculo
         $this->look_tbveiculos_idfkmarcaveiculo = $this->tbveiculos_idfkmarcaveiculo; 
         $this->Lookup->lookup_tbveiculos_idfkmarcaveiculo($this->look_tbveiculos_idfkmarcaveiculo, $this->tbveiculos_idfkmarcaveiculo) ; 
         $this->look_tbveiculos_idfkmarcaveiculo = ($this->look_tbveiculos_idfkmarcaveiculo == "&nbsp;") ? "" : $this->look_tbveiculos_idfkmarcaveiculo; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- tbclientes_nomecliente
   function NM_export_tbclientes_nomecliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_nomecliente))
         {
             $this->tbclientes_nomecliente = sc_convert_encoding($this->tbclientes_nomecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_nomecliente =\"" . $this->trata_dados($this->tbclientes_nomecliente) . "\"";
   }
   //----- tbclientes_enderecocliente
   function NM_export_tbclientes_enderecocliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_enderecocliente))
         {
             $this->tbclientes_enderecocliente = sc_convert_encoding($this->tbclientes_enderecocliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_enderecocliente =\"" . $this->trata_dados($this->tbclientes_enderecocliente) . "\"";
   }
   //----- tbclientes_idfkcidadecliente
   function NM_export_tbclientes_idfkcidadecliente()
   {
         nmgp_Form_Num_Val($this->look_tbclientes_idfkcidadecliente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_tbclientes_idfkcidadecliente))
         {
             $this->look_tbclientes_idfkcidadecliente = sc_convert_encoding($this->look_tbclientes_idfkcidadecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_idfkcidadecliente =\"" . $this->trata_dados($this->look_tbclientes_idfkcidadecliente) . "\"";
   }
   //----- tbclientes_idfkestadocliente
   function NM_export_tbclientes_idfkestadocliente()
   {
         nmgp_Form_Num_Val($this->look_tbclientes_idfkestadocliente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_tbclientes_idfkestadocliente))
         {
             $this->look_tbclientes_idfkestadocliente = sc_convert_encoding($this->look_tbclientes_idfkestadocliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_idfkestadocliente =\"" . $this->trata_dados($this->look_tbclientes_idfkestadocliente) . "\"";
   }
   //----- tbclientes_fonecliente
   function NM_export_tbclientes_fonecliente()
   {
         $this->nm_gera_mask($this->tbclientes_fonecliente, "(xx) x-xxxx-xxxx"); 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_fonecliente))
         {
             $this->tbclientes_fonecliente = sc_convert_encoding($this->tbclientes_fonecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_fonecliente =\"" . $this->trata_dados($this->tbclientes_fonecliente) . "\"";
   }
   //----- tbclientes_fone2cliente
   function NM_export_tbclientes_fone2cliente()
   {
         $this->nm_gera_mask($this->tbclientes_fone2cliente, "(xx) x-xxxx-xxxx"); 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_fone2cliente))
         {
             $this->tbclientes_fone2cliente = sc_convert_encoding($this->tbclientes_fone2cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_fone2cliente =\"" . $this->trata_dados($this->tbclientes_fone2cliente) . "\"";
   }
   //----- tbclientes_numcnhcliente
   function NM_export_tbclientes_numcnhcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_numcnhcliente))
         {
             $this->tbclientes_numcnhcliente = sc_convert_encoding($this->tbclientes_numcnhcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_numcnhcliente =\"" . $this->trata_dados($this->tbclientes_numcnhcliente) . "\"";
   }
   //----- tbclientes_validadecnhcliente
   function NM_export_tbclientes_validadecnhcliente()
   {
         $conteudo_x = $this->tbclientes_validadecnhcliente;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->tbclientes_validadecnhcliente, "YYYY-MM-DD");
             $this->tbclientes_validadecnhcliente = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_validadecnhcliente))
         {
             $this->tbclientes_validadecnhcliente = sc_convert_encoding($this->tbclientes_validadecnhcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_validadecnhcliente =\"" . $this->trata_dados($this->tbclientes_validadecnhcliente) . "\"";
   }
   //----- tbclientes_cpfcliente
   function NM_export_tbclientes_cpfcliente()
   {
         if (strlen($this->tbclientes_cpfcliente) < 14) 
         { 
             $this->tbclientes_cpfcliente = str_repeat(0, 14 - strlen($this->tbclientes_cpfcliente)) . $this->tbclientes_cpfcliente; 
         } 
         if (strlen($this->tbclientes_cpfcliente) > 11 && substr($this->tbclientes_cpfcliente, 0, 3) == "000" && $this->Teste_validade->CNPJ($this->tbclientes_cpfcliente) == false) 
         { 
             $this->tbclientes_cpfcliente = substr($this->tbclientes_cpfcliente, strlen($this->tbclientes_cpfcliente) - 11); 
         } 
         nmgp_Form_CicCnpj($this->tbclientes_cpfcliente) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_cpfcliente))
         {
             $this->tbclientes_cpfcliente = sc_convert_encoding($this->tbclientes_cpfcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_cpfcliente =\"" . $this->trata_dados($this->tbclientes_cpfcliente) . "\"";
   }
   //----- tbclientes_rgcliente
   function NM_export_tbclientes_rgcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_rgcliente))
         {
             $this->tbclientes_rgcliente = sc_convert_encoding($this->tbclientes_rgcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_rgcliente =\"" . $this->trata_dados($this->tbclientes_rgcliente) . "\"";
   }
   //----- tbclientes_expedrg
   function NM_export_tbclientes_expedrg()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbclientes_expedrg))
         {
             $this->tbclientes_expedrg = sc_convert_encoding($this->tbclientes_expedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_expedrg =\"" . $this->trata_dados($this->tbclientes_expedrg) . "\"";
   }
   //----- tbclientes_idfkufexpedrg
   function NM_export_tbclientes_idfkufexpedrg()
   {
         nmgp_Form_Num_Val($this->look_tbclientes_idfkufexpedrg, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_tbclientes_idfkufexpedrg))
         {
             $this->look_tbclientes_idfkufexpedrg = sc_convert_encoding($this->look_tbclientes_idfkufexpedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbclientes_idfkufexpedrg =\"" . $this->trata_dados($this->look_tbclientes_idfkufexpedrg) . "\"";
   }
   //----- nomecliente
   function NM_export_nomecliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nomecliente))
         {
             $this->nomecliente = sc_convert_encoding($this->nomecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nomecliente =\"" . $this->trata_dados($this->nomecliente) . "\"";
   }
   //----- fonecliente
   function NM_export_fonecliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fonecliente))
         {
             $this->fonecliente = sc_convert_encoding($this->fonecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " fonecliente =\"" . $this->trata_dados($this->fonecliente) . "\"";
   }
   //----- fone2cliente
   function NM_export_fone2cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fone2cliente))
         {
             $this->fone2cliente = sc_convert_encoding($this->fone2cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " fone2cliente =\"" . $this->trata_dados($this->fone2cliente) . "\"";
   }
   //----- numcnhcliente
   function NM_export_numcnhcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->numcnhcliente))
         {
             $this->numcnhcliente = sc_convert_encoding($this->numcnhcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " numcnhcliente =\"" . $this->trata_dados($this->numcnhcliente) . "\"";
   }
   //----- validadecnhcliente
   function NM_export_validadecnhcliente()
   {
         $conteudo_x = $this->validadecnhcliente;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->validadecnhcliente, "YYYY-MM-DD");
             $this->validadecnhcliente = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->validadecnhcliente))
         {
             $this->validadecnhcliente = sc_convert_encoding($this->validadecnhcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " validadecnhcliente =\"" . $this->trata_dados($this->validadecnhcliente) . "\"";
   }
   //----- cpfcliente
   function NM_export_cpfcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cpfcliente))
         {
             $this->cpfcliente = sc_convert_encoding($this->cpfcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cpfcliente =\"" . $this->trata_dados($this->cpfcliente) . "\"";
   }
   //----- rgcliente
   function NM_export_rgcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->rgcliente))
         {
             $this->rgcliente = sc_convert_encoding($this->rgcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " rgcliente =\"" . $this->trata_dados($this->rgcliente) . "\"";
   }
   //----- expedrg
   function NM_export_expedrg()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->expedrg))
         {
             $this->expedrg = sc_convert_encoding($this->expedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " expedrg =\"" . $this->trata_dados($this->expedrg) . "\"";
   }
   //----- idfkufexpedrg
   function NM_export_idfkufexpedrg()
   {
         nmgp_Form_Num_Val($this->idfkufexpedrg, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->idfkufexpedrg))
         {
             $this->idfkufexpedrg = sc_convert_encoding($this->idfkufexpedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " idfkufexpedrg =\"" . $this->trata_dados($this->idfkufexpedrg) . "\"";
   }
   //----- tbveiculos_idfkmarcaveiculo
   function NM_export_tbveiculos_idfkmarcaveiculo()
   {
         nmgp_Form_Num_Val($this->look_tbveiculos_idfkmarcaveiculo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_tbveiculos_idfkmarcaveiculo))
         {
             $this->look_tbveiculos_idfkmarcaveiculo = sc_convert_encoding($this->look_tbveiculos_idfkmarcaveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_idfkmarcaveiculo =\"" . $this->trata_dados($this->look_tbveiculos_idfkmarcaveiculo) . "\"";
   }
   //----- tbveiculos_modeloveiculo
   function NM_export_tbveiculos_modeloveiculo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbveiculos_modeloveiculo))
         {
             $this->tbveiculos_modeloveiculo = sc_convert_encoding($this->tbveiculos_modeloveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_modeloveiculo =\"" . $this->trata_dados($this->tbveiculos_modeloveiculo) . "\"";
   }
   //----- tbveiculos_anoveiculo
   function NM_export_tbveiculos_anoveiculo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbveiculos_anoveiculo))
         {
             $this->tbveiculos_anoveiculo = sc_convert_encoding($this->tbveiculos_anoveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_anoveiculo =\"" . $this->trata_dados($this->tbveiculos_anoveiculo) . "\"";
   }
   //----- tbveiculos_placaveiculo
   function NM_export_tbveiculos_placaveiculo()
   {
         $this->nm_gera_mask($this->tbveiculos_placaveiculo, "zzz-zzzz"); 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbveiculos_placaveiculo))
         {
             $this->tbveiculos_placaveiculo = sc_convert_encoding($this->tbveiculos_placaveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_placaveiculo =\"" . $this->trata_dados($this->tbveiculos_placaveiculo) . "\"";
   }
   //----- tbveiculos_corveiculo
   function NM_export_tbveiculos_corveiculo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbveiculos_corveiculo))
         {
             $this->tbveiculos_corveiculo = sc_convert_encoding($this->tbveiculos_corveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_corveiculo =\"" . $this->trata_dados($this->tbveiculos_corveiculo) . "\"";
   }
   //----- tbveiculos_valordiaria
   function NM_export_tbveiculos_valordiaria()
   {
         nmgp_Form_Num_Val($this->tbveiculos_valordiaria, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbveiculos_valordiaria))
         {
             $this->tbveiculos_valordiaria = sc_convert_encoding($this->tbveiculos_valordiaria, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_valordiaria =\"" . $this->trata_dados($this->tbveiculos_valordiaria) . "\"";
   }
   //----- tbveiculos_chassiveiculo
   function NM_export_tbveiculos_chassiveiculo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tbveiculos_chassiveiculo))
         {
             $this->tbveiculos_chassiveiculo = sc_convert_encoding($this->tbveiculos_chassiveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tbveiculos_chassiveiculo =\"" . $this->trata_dados($this->tbveiculos_chassiveiculo) . "\"";
   }
   //----- tblocacao_datasaidalocacao
   function NM_export_tblocacao_datasaidalocacao()
   {
         $conteudo_x = $this->tblocacao_datasaidalocacao;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->tblocacao_datasaidalocacao, "YYYY-MM-DD");
             $this->tblocacao_datasaidalocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_datasaidalocacao))
         {
             $this->tblocacao_datasaidalocacao = sc_convert_encoding($this->tblocacao_datasaidalocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_datasaidalocacao =\"" . $this->trata_dados($this->tblocacao_datasaidalocacao) . "\"";
   }
   //----- tblocacao_horasaidalocacao
   function NM_export_tblocacao_horasaidalocacao()
   {
         $conteudo_x =  $this->tblocacao_horasaidalocacao;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tblocacao_horasaidalocacao, "HH:II:SS");
             $this->tblocacao_horasaidalocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_horasaidalocacao))
         {
             $this->tblocacao_horasaidalocacao = sc_convert_encoding($this->tblocacao_horasaidalocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_horasaidalocacao =\"" . $this->trata_dados($this->tblocacao_horasaidalocacao) . "\"";
   }
   //----- tblocacao_kmsaidalocacao
   function NM_export_tblocacao_kmsaidalocacao()
   {
         nmgp_Form_Num_Val($this->tblocacao_kmsaidalocacao, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_kmsaidalocacao))
         {
             $this->tblocacao_kmsaidalocacao = sc_convert_encoding($this->tblocacao_kmsaidalocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_kmsaidalocacao =\"" . $this->trata_dados($this->tblocacao_kmsaidalocacao) . "\"";
   }
   //----- tblocacao_dataretornolocacao
   function NM_export_tblocacao_dataretornolocacao()
   {
         $conteudo_x = $this->tblocacao_dataretornolocacao;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->tblocacao_dataretornolocacao, "YYYY-MM-DD");
             $this->tblocacao_dataretornolocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_dataretornolocacao))
         {
             $this->tblocacao_dataretornolocacao = sc_convert_encoding($this->tblocacao_dataretornolocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_dataretornolocacao =\"" . $this->trata_dados($this->tblocacao_dataretornolocacao) . "\"";
   }
   //----- tblocacao_horaretornolocacao
   function NM_export_tblocacao_horaretornolocacao()
   {
         $conteudo_x =  $this->tblocacao_horaretornolocacao;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tblocacao_horaretornolocacao, "HH:II:SS");
             $this->tblocacao_horaretornolocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_horaretornolocacao))
         {
             $this->tblocacao_horaretornolocacao = sc_convert_encoding($this->tblocacao_horaretornolocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_horaretornolocacao =\"" . $this->trata_dados($this->tblocacao_horaretornolocacao) . "\"";
   }
   //----- tblocacao_qtddiarias
   function NM_export_tblocacao_qtddiarias()
   {
         nmgp_Form_Num_Val($this->tblocacao_qtddiarias, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_qtddiarias))
         {
             $this->tblocacao_qtddiarias = sc_convert_encoding($this->tblocacao_qtddiarias, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_qtddiarias =\"" . $this->trata_dados($this->tblocacao_qtddiarias) . "\"";
   }
   //----- tblocacao_valorliquidolocacao
   function NM_export_tblocacao_valorliquidolocacao()
   {
         nmgp_Form_Num_Val($this->tblocacao_valorliquidolocacao, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_valorliquidolocacao))
         {
             $this->tblocacao_valorliquidolocacao = sc_convert_encoding($this->tblocacao_valorliquidolocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_valorliquidolocacao =\"" . $this->trata_dados($this->tblocacao_valorliquidolocacao) . "\"";
   }
   //----- tblocacao_obslocacao
   function NM_export_tblocacao_obslocacao()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tblocacao_obslocacao))
         {
             $this->tblocacao_obslocacao = sc_convert_encoding($this->tblocacao_obslocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " tblocacao_obslocacao =\"" . $this->trata_dados($this->tblocacao_obslocacao) . "\"";
   }
   //----- contrato1
   function NM_export_contrato1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->contrato1))
         {
             $this->contrato1 = sc_convert_encoding($this->contrato1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " contrato1 =\"" . $this->trata_dados($this->contrato1) . "\"";
   }
   //----- contrato2
   function NM_export_contrato2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->contrato2))
         {
             $this->contrato2 = sc_convert_encoding($this->contrato2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " contrato2 =\"" . $this->trata_dados($this->contrato2) . "\"";
   }
   //----- contrato3
   function NM_export_contrato3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->contrato3))
         {
             $this->contrato3 = sc_convert_encoding($this->contrato3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " contrato3 =\"" . $this->trata_dados($this->contrato3) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pdf_ficha_locacao_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdf_ficha_locacao"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
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
}

?>
