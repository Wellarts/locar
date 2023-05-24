<?php

class pdf_ficha_locacao_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $Arquivo;
   var $Tit_doc;
   //---- 
   function pdf_ficha_locacao_xls()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->Xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_col    = 0;
      $this->nm_data    = new nm_data("pt_br");
      $this->Arquivo    = "sc_xls";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdf_ficha_locacao";
      $this->Arquivo   .= ".xls";
      $this->Tit_doc    = "pdf_ficha_locacao.xls";
      $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );;
      $this->Xls_dados = new PHPExcel();
      $this->Xls_dados->setActiveSheetIndex(0);
      $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
      if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
      {
          $this->Nm_ActiveSheet->setRightToLeft(true);
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $this->Teste_validade = new NM_Valida;
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xls_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tbclientes_nomecliente'])) ? $this->New_label['tbclientes_nomecliente'] : "Nome Cliente"; 
          if ($Cada_col == "tbclientes_nomecliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_enderecocliente'])) ? $this->New_label['tbclientes_enderecocliente'] : "Endereco Cliente"; 
          if ($Cada_col == "tbclientes_enderecocliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_idfkcidadecliente'])) ? $this->New_label['tbclientes_idfkcidadecliente'] : "Id F Kcidade Cliente"; 
          if ($Cada_col == "tbclientes_idfkcidadecliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_idfkestadocliente'])) ? $this->New_label['tbclientes_idfkestadocliente'] : "Id F Kestado Cliente"; 
          if ($Cada_col == "tbclientes_idfkestadocliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_fonecliente'])) ? $this->New_label['tbclientes_fonecliente'] : "Fone Cliente"; 
          if ($Cada_col == "tbclientes_fonecliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_fone2cliente'])) ? $this->New_label['tbclientes_fone2cliente'] : "Fone 2 Cliente"; 
          if ($Cada_col == "tbclientes_fone2cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_numcnhcliente'])) ? $this->New_label['tbclientes_numcnhcliente'] : "Num Cnh Cliente"; 
          if ($Cada_col == "tbclientes_numcnhcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_validadecnhcliente'])) ? $this->New_label['tbclientes_validadecnhcliente'] : "Validade Cnh Cliente"; 
          if ($Cada_col == "tbclientes_validadecnhcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_cpfcliente'])) ? $this->New_label['tbclientes_cpfcliente'] : "Cpf Cliente"; 
          if ($Cada_col == "tbclientes_cpfcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_rgcliente'])) ? $this->New_label['tbclientes_rgcliente'] : "Rg Cliente"; 
          if ($Cada_col == "tbclientes_rgcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_expedrg'])) ? $this->New_label['tbclientes_expedrg'] : "Exped RG"; 
          if ($Cada_col == "tbclientes_expedrg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbclientes_idfkufexpedrg'])) ? $this->New_label['tbclientes_idfkufexpedrg'] : "Id F Kuf Exped RG"; 
          if ($Cada_col == "tbclientes_idfkufexpedrg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['nomecliente'])) ? $this->New_label['nomecliente'] : "Nome Cliente"; 
          if ($Cada_col == "nomecliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['fonecliente'])) ? $this->New_label['fonecliente'] : "Fone Cliente"; 
          if ($Cada_col == "fonecliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['fone2cliente'])) ? $this->New_label['fone2cliente'] : "Fone 2 Cliente"; 
          if ($Cada_col == "fone2cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['numcnhcliente'])) ? $this->New_label['numcnhcliente'] : "Num Cnh Cliente"; 
          if ($Cada_col == "numcnhcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['validadecnhcliente'])) ? $this->New_label['validadecnhcliente'] : "Validade Cnh Cliente"; 
          if ($Cada_col == "validadecnhcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cpfcliente'])) ? $this->New_label['cpfcliente'] : "Cpf Cliente"; 
          if ($Cada_col == "cpfcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['rgcliente'])) ? $this->New_label['rgcliente'] : "Rg Cliente"; 
          if ($Cada_col == "rgcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['expedrg'])) ? $this->New_label['expedrg'] : "Exped RG"; 
          if ($Cada_col == "expedrg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['idfkufexpedrg'])) ? $this->New_label['idfkufexpedrg'] : "Id F Kuf Exped RG"; 
          if ($Cada_col == "idfkufexpedrg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_idfkmarcaveiculo'])) ? $this->New_label['tbveiculos_idfkmarcaveiculo'] : "Id F Kmarca Veiculo"; 
          if ($Cada_col == "tbveiculos_idfkmarcaveiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_modeloveiculo'])) ? $this->New_label['tbveiculos_modeloveiculo'] : "Modelo Veiculo"; 
          if ($Cada_col == "tbveiculos_modeloveiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_anoveiculo'])) ? $this->New_label['tbveiculos_anoveiculo'] : "Ano Veiculo"; 
          if ($Cada_col == "tbveiculos_anoveiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_placaveiculo'])) ? $this->New_label['tbveiculos_placaveiculo'] : "Placa Veiculo"; 
          if ($Cada_col == "tbveiculos_placaveiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_corveiculo'])) ? $this->New_label['tbveiculos_corveiculo'] : "Cor Veiculo"; 
          if ($Cada_col == "tbveiculos_corveiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_valordiaria'])) ? $this->New_label['tbveiculos_valordiaria'] : "Valor Diaria"; 
          if ($Cada_col == "tbveiculos_valordiaria" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tbveiculos_chassiveiculo'])) ? $this->New_label['tbveiculos_chassiveiculo'] : "Chassi Veiculo"; 
          if ($Cada_col == "tbveiculos_chassiveiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_datasaidalocacao'])) ? $this->New_label['tblocacao_datasaidalocacao'] : "Data Saida Locacao"; 
          if ($Cada_col == "tblocacao_datasaidalocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_horasaidalocacao'])) ? $this->New_label['tblocacao_horasaidalocacao'] : "Hora Saida Locacao"; 
          if ($Cada_col == "tblocacao_horasaidalocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_kmsaidalocacao'])) ? $this->New_label['tblocacao_kmsaidalocacao'] : "Km Saida Locacao"; 
          if ($Cada_col == "tblocacao_kmsaidalocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_dataretornolocacao'])) ? $this->New_label['tblocacao_dataretornolocacao'] : "Data Retorno Locacao"; 
          if ($Cada_col == "tblocacao_dataretornolocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_horaretornolocacao'])) ? $this->New_label['tblocacao_horaretornolocacao'] : "Hora Retorno Locacao"; 
          if ($Cada_col == "tblocacao_horaretornolocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_qtddiarias'])) ? $this->New_label['tblocacao_qtddiarias'] : "Qtd Diarias"; 
          if ($Cada_col == "tblocacao_qtddiarias" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_valorliquidolocacao'])) ? $this->New_label['tblocacao_valorliquidolocacao'] : "Valor Liquido Locacao"; 
          if ($Cada_col == "tblocacao_valorliquidolocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tblocacao_obslocacao'])) ? $this->New_label['tblocacao_obslocacao'] : "Obs Locacao"; 
          if ($Cada_col == "tblocacao_obslocacao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['contrato1'])) ? $this->New_label['contrato1'] : "contrato1"; 
          if ($Cada_col == "contrato1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['contrato2'])) ? $this->New_label['contrato2'] : "contrato2"; 
          if ($Cada_col == "contrato2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['contrato3'])) ? $this->New_label['contrato3'] : "contrato3"; 
          if ($Cada_col == "contrato3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
              $this->Xls_col++;
          }
      } 
      while (!$rs->EOF)
      {
         $this->Xls_col = 0;
         $this->Xls_row++;
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
         if (isset($this->NM_Row_din[$this->Xls_row]))
         { 
             $this->Nm_ActiveSheet->getRowDimension($this->Xls_row)->setRowHeight($this->NM_Row_din[$this->Xls_row]);
         } 
         $rs->MoveNext();
      }
      if (isset($this->NM_Col_din))
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      $rs->Close();
      $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
      $objWriter->save($this->Xls_f);
   }
   //----- tbclientes_nomecliente
   function NM_export_tbclientes_nomecliente()
   {
         $this->tbclientes_nomecliente = html_entity_decode($this->tbclientes_nomecliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbclientes_nomecliente = strip_tags($this->tbclientes_nomecliente);
         if (!NM_is_utf8($this->tbclientes_nomecliente))
         {
             $this->tbclientes_nomecliente = sc_convert_encoding($this->tbclientes_nomecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_nomecliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_enderecocliente
   function NM_export_tbclientes_enderecocliente()
   {
         $this->tbclientes_enderecocliente = html_entity_decode($this->tbclientes_enderecocliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbclientes_enderecocliente = strip_tags($this->tbclientes_enderecocliente);
         if (!NM_is_utf8($this->tbclientes_enderecocliente))
         {
             $this->tbclientes_enderecocliente = sc_convert_encoding($this->tbclientes_enderecocliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_enderecocliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_idfkcidadecliente
   function NM_export_tbclientes_idfkcidadecliente()
   {
         if (!NM_is_utf8($this->look_tbclientes_idfkcidadecliente))
         {
             $this->look_tbclientes_idfkcidadecliente = sc_convert_encoding($this->look_tbclientes_idfkcidadecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->look_tbclientes_idfkcidadecliente))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->look_tbclientes_idfkcidadecliente);
         $this->Xls_col++;
   }
   //----- tbclientes_idfkestadocliente
   function NM_export_tbclientes_idfkestadocliente()
   {
         if (!NM_is_utf8($this->look_tbclientes_idfkestadocliente))
         {
             $this->look_tbclientes_idfkestadocliente = sc_convert_encoding($this->look_tbclientes_idfkestadocliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->look_tbclientes_idfkestadocliente))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->look_tbclientes_idfkestadocliente);
         $this->Xls_col++;
   }
   //----- tbclientes_fonecliente
   function NM_export_tbclientes_fonecliente()
   {
      if (!empty($this->tbclientes_fonecliente))
      {
         $this->nm_gera_mask($this->tbclientes_fonecliente, "(xx) x-xxxx-xxxx"); 
      }
         $this->tbclientes_fonecliente = html_entity_decode($this->tbclientes_fonecliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->tbclientes_fonecliente))
         {
             $this->tbclientes_fonecliente = sc_convert_encoding($this->tbclientes_fonecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_fonecliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_fone2cliente
   function NM_export_tbclientes_fone2cliente()
   {
      if (!empty($this->tbclientes_fone2cliente))
      {
         $this->nm_gera_mask($this->tbclientes_fone2cliente, "(xx) x-xxxx-xxxx"); 
      }
         $this->tbclientes_fone2cliente = html_entity_decode($this->tbclientes_fone2cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->tbclientes_fone2cliente))
         {
             $this->tbclientes_fone2cliente = sc_convert_encoding($this->tbclientes_fone2cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_fone2cliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_numcnhcliente
   function NM_export_tbclientes_numcnhcliente()
   {
         $this->tbclientes_numcnhcliente = html_entity_decode($this->tbclientes_numcnhcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbclientes_numcnhcliente = strip_tags($this->tbclientes_numcnhcliente);
         if (!NM_is_utf8($this->tbclientes_numcnhcliente))
         {
             $this->tbclientes_numcnhcliente = sc_convert_encoding($this->tbclientes_numcnhcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_numcnhcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_validadecnhcliente
   function NM_export_tbclientes_validadecnhcliente()
   {
         $this->tbclientes_validadecnhcliente = substr($this->tbclientes_validadecnhcliente, 0, 10);
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         if (empty($this->tbclientes_validadecnhcliente) || $this->tbclientes_validadecnhcliente == "0000-00-00")
         {
             $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_validadecnhcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_validadecnhcliente);
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode($this->SC_date_conf_region);
         }
         $this->Xls_col++;
   }
   //----- tbclientes_cpfcliente
   function NM_export_tbclientes_cpfcliente()
   {
      if (!empty($this->tbclientes_cpfcliente))
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
      }
         if (!NM_is_utf8($this->tbclientes_cpfcliente))
         {
             $this->tbclientes_cpfcliente = sc_convert_encoding($this->tbclientes_cpfcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_cpfcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_rgcliente
   function NM_export_tbclientes_rgcliente()
   {
         $this->tbclientes_rgcliente = html_entity_decode($this->tbclientes_rgcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbclientes_rgcliente = strip_tags($this->tbclientes_rgcliente);
         if (!NM_is_utf8($this->tbclientes_rgcliente))
         {
             $this->tbclientes_rgcliente = sc_convert_encoding($this->tbclientes_rgcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_rgcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_expedrg
   function NM_export_tbclientes_expedrg()
   {
         $this->tbclientes_expedrg = html_entity_decode($this->tbclientes_expedrg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbclientes_expedrg = strip_tags($this->tbclientes_expedrg);
         if (!NM_is_utf8($this->tbclientes_expedrg))
         {
             $this->tbclientes_expedrg = sc_convert_encoding($this->tbclientes_expedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbclientes_expedrg, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbclientes_idfkufexpedrg
   function NM_export_tbclientes_idfkufexpedrg()
   {
         if (!NM_is_utf8($this->look_tbclientes_idfkufexpedrg))
         {
             $this->look_tbclientes_idfkufexpedrg = sc_convert_encoding($this->look_tbclientes_idfkufexpedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->look_tbclientes_idfkufexpedrg))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->look_tbclientes_idfkufexpedrg);
         $this->Xls_col++;
   }
   //----- nomecliente
   function NM_export_nomecliente()
   {
         $this->nomecliente = html_entity_decode($this->nomecliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nomecliente = strip_tags($this->nomecliente);
         if (!NM_is_utf8($this->nomecliente))
         {
             $this->nomecliente = sc_convert_encoding($this->nomecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->nomecliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- fonecliente
   function NM_export_fonecliente()
   {
         $this->fonecliente = html_entity_decode($this->fonecliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fonecliente = strip_tags($this->fonecliente);
         if (!NM_is_utf8($this->fonecliente))
         {
             $this->fonecliente = sc_convert_encoding($this->fonecliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->fonecliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- fone2cliente
   function NM_export_fone2cliente()
   {
         $this->fone2cliente = html_entity_decode($this->fone2cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fone2cliente = strip_tags($this->fone2cliente);
         if (!NM_is_utf8($this->fone2cliente))
         {
             $this->fone2cliente = sc_convert_encoding($this->fone2cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->fone2cliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- numcnhcliente
   function NM_export_numcnhcliente()
   {
         $this->numcnhcliente = html_entity_decode($this->numcnhcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numcnhcliente = strip_tags($this->numcnhcliente);
         if (!NM_is_utf8($this->numcnhcliente))
         {
             $this->numcnhcliente = sc_convert_encoding($this->numcnhcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->numcnhcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- validadecnhcliente
   function NM_export_validadecnhcliente()
   {
         $this->validadecnhcliente = substr($this->validadecnhcliente, 0, 10);
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         if (empty($this->validadecnhcliente) || $this->validadecnhcliente == "0000-00-00")
         {
             $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->validadecnhcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->validadecnhcliente);
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode($this->SC_date_conf_region);
         }
         $this->Xls_col++;
   }
   //----- cpfcliente
   function NM_export_cpfcliente()
   {
         $this->cpfcliente = html_entity_decode($this->cpfcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cpfcliente = strip_tags($this->cpfcliente);
         if (!NM_is_utf8($this->cpfcliente))
         {
             $this->cpfcliente = sc_convert_encoding($this->cpfcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->cpfcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- rgcliente
   function NM_export_rgcliente()
   {
         $this->rgcliente = html_entity_decode($this->rgcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rgcliente = strip_tags($this->rgcliente);
         if (!NM_is_utf8($this->rgcliente))
         {
             $this->rgcliente = sc_convert_encoding($this->rgcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->rgcliente, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- expedrg
   function NM_export_expedrg()
   {
         $this->expedrg = html_entity_decode($this->expedrg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->expedrg = strip_tags($this->expedrg);
         if (!NM_is_utf8($this->expedrg))
         {
             $this->expedrg = sc_convert_encoding($this->expedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->expedrg, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- idfkufexpedrg
   function NM_export_idfkufexpedrg()
   {
         if (!NM_is_utf8($this->idfkufexpedrg))
         {
             $this->idfkufexpedrg = sc_convert_encoding($this->idfkufexpedrg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->idfkufexpedrg))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->idfkufexpedrg);
         $this->Xls_col++;
   }
   //----- tbveiculos_idfkmarcaveiculo
   function NM_export_tbveiculos_idfkmarcaveiculo()
   {
         if (!NM_is_utf8($this->look_tbveiculos_idfkmarcaveiculo))
         {
             $this->look_tbveiculos_idfkmarcaveiculo = sc_convert_encoding($this->look_tbveiculos_idfkmarcaveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->look_tbveiculos_idfkmarcaveiculo))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->look_tbveiculos_idfkmarcaveiculo);
         $this->Xls_col++;
   }
   //----- tbveiculos_modeloveiculo
   function NM_export_tbveiculos_modeloveiculo()
   {
         $this->tbveiculos_modeloveiculo = html_entity_decode($this->tbveiculos_modeloveiculo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbveiculos_modeloveiculo = strip_tags($this->tbveiculos_modeloveiculo);
         if (!NM_is_utf8($this->tbveiculos_modeloveiculo))
         {
             $this->tbveiculos_modeloveiculo = sc_convert_encoding($this->tbveiculos_modeloveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbveiculos_modeloveiculo, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbveiculos_anoveiculo
   function NM_export_tbveiculos_anoveiculo()
   {
         $this->tbveiculos_anoveiculo = html_entity_decode($this->tbveiculos_anoveiculo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->tbveiculos_anoveiculo))
         {
             $this->tbveiculos_anoveiculo = sc_convert_encoding($this->tbveiculos_anoveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbveiculos_anoveiculo, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbveiculos_placaveiculo
   function NM_export_tbveiculos_placaveiculo()
   {
      if (!empty($this->tbveiculos_placaveiculo))
      {
         $this->nm_gera_mask($this->tbveiculos_placaveiculo, "zzz-zzzz"); 
      }
         $this->tbveiculos_placaveiculo = html_entity_decode($this->tbveiculos_placaveiculo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->tbveiculos_placaveiculo))
         {
             $this->tbveiculos_placaveiculo = sc_convert_encoding($this->tbveiculos_placaveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbveiculos_placaveiculo, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbveiculos_corveiculo
   function NM_export_tbveiculos_corveiculo()
   {
         $this->tbveiculos_corveiculo = html_entity_decode($this->tbveiculos_corveiculo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbveiculos_corveiculo = strip_tags($this->tbveiculos_corveiculo);
         if (!NM_is_utf8($this->tbveiculos_corveiculo))
         {
             $this->tbveiculos_corveiculo = sc_convert_encoding($this->tbveiculos_corveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbveiculos_corveiculo, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tbveiculos_valordiaria
   function NM_export_tbveiculos_valordiaria()
   {
         if (!NM_is_utf8($this->tbveiculos_valordiaria))
         {
             $this->tbveiculos_valordiaria = sc_convert_encoding($this->tbveiculos_valordiaria, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->tbveiculos_valordiaria))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0.00');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbveiculos_valordiaria);
         $this->Xls_col++;
   }
   //----- tbveiculos_chassiveiculo
   function NM_export_tbveiculos_chassiveiculo()
   {
         $this->tbveiculos_chassiveiculo = html_entity_decode($this->tbveiculos_chassiveiculo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tbveiculos_chassiveiculo = strip_tags($this->tbveiculos_chassiveiculo);
         if (!NM_is_utf8($this->tbveiculos_chassiveiculo))
         {
             $this->tbveiculos_chassiveiculo = sc_convert_encoding($this->tbveiculos_chassiveiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tbveiculos_chassiveiculo, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tblocacao_datasaidalocacao
   function NM_export_tblocacao_datasaidalocacao()
   {
         $this->tblocacao_datasaidalocacao = substr($this->tblocacao_datasaidalocacao, 0, 10);
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         if (empty($this->tblocacao_datasaidalocacao) || $this->tblocacao_datasaidalocacao == "0000-00-00")
         {
             $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_datasaidalocacao, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_datasaidalocacao);
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode($this->SC_date_conf_region);
         }
         $this->Xls_col++;
   }
   //----- tblocacao_horasaidalocacao
   function NM_export_tblocacao_horasaidalocacao()
   {
      if (!empty($this->tblocacao_horasaidalocacao))
      {
         $conteudo_x =  $this->tblocacao_horasaidalocacao;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tblocacao_horasaidalocacao, "HH:II:SS");
             $this->tblocacao_horasaidalocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->tblocacao_horasaidalocacao))
         {
             $this->tblocacao_horasaidalocacao = sc_convert_encoding($this->tblocacao_horasaidalocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_horasaidalocacao, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tblocacao_kmsaidalocacao
   function NM_export_tblocacao_kmsaidalocacao()
   {
         if (!NM_is_utf8($this->tblocacao_kmsaidalocacao))
         {
             $this->tblocacao_kmsaidalocacao = sc_convert_encoding($this->tblocacao_kmsaidalocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->tblocacao_kmsaidalocacao))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_kmsaidalocacao);
         $this->Xls_col++;
   }
   //----- tblocacao_dataretornolocacao
   function NM_export_tblocacao_dataretornolocacao()
   {
         $this->tblocacao_dataretornolocacao = substr($this->tblocacao_dataretornolocacao, 0, 10);
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         if (empty($this->tblocacao_dataretornolocacao) || $this->tblocacao_dataretornolocacao == "0000-00-00")
         {
             $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_dataretornolocacao, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_dataretornolocacao);
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode($this->SC_date_conf_region);
         }
         $this->Xls_col++;
   }
   //----- tblocacao_horaretornolocacao
   function NM_export_tblocacao_horaretornolocacao()
   {
      if (!empty($this->tblocacao_horaretornolocacao))
      {
         $conteudo_x =  $this->tblocacao_horaretornolocacao;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->tblocacao_horaretornolocacao, "HH:II:SS");
             $this->tblocacao_horaretornolocacao = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->tblocacao_horaretornolocacao))
         {
             $this->tblocacao_horaretornolocacao = sc_convert_encoding($this->tblocacao_horaretornolocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_horaretornolocacao, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- tblocacao_qtddiarias
   function NM_export_tblocacao_qtddiarias()
   {
         if (!NM_is_utf8($this->tblocacao_qtddiarias))
         {
             $this->tblocacao_qtddiarias = sc_convert_encoding($this->tblocacao_qtddiarias, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->tblocacao_qtddiarias))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_qtddiarias);
         $this->Xls_col++;
   }
   //----- tblocacao_valorliquidolocacao
   function NM_export_tblocacao_valorliquidolocacao()
   {
         if (!NM_is_utf8($this->tblocacao_valorliquidolocacao))
         {
             $this->tblocacao_valorliquidolocacao = sc_convert_encoding($this->tblocacao_valorliquidolocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->tblocacao_valorliquidolocacao))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('#,##0.00');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_valorliquidolocacao);
         $this->Xls_col++;
   }
   //----- tblocacao_obslocacao
   function NM_export_tblocacao_obslocacao()
   {
         $this->tblocacao_obslocacao = html_entity_decode($this->tblocacao_obslocacao, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->tblocacao_obslocacao))
         {
             $this->tblocacao_obslocacao = sc_convert_encoding($this->tblocacao_obslocacao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->tblocacao_obslocacao, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- contrato1
   function NM_export_contrato1()
   {
         if (!NM_is_utf8($this->contrato1))
         {
             $this->contrato1 = sc_convert_encoding($this->contrato1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->contrato1, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- contrato2
   function NM_export_contrato2()
   {
         if (!NM_is_utf8($this->contrato2))
         {
             $this->contrato2 = sc_convert_encoding($this->contrato2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->contrato2, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- contrato3
   function NM_export_contrato3()
   {
         if (!NM_is_utf8($this->contrato3))
         {
             $this->contrato3 = sc_convert_encoding($this->contrato3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->contrato3, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: Excel</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<form name="Fdown" method="get" action="pdf_ficha_locacao_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdf_ficha_locacao"> 
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
}

?>
