<?php
class pdf_ficha_locacao_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $contrato1 = array();
   var $contrato2 = array();
   var $contrato3 = array();
   var $tbclientes_nomecliente = array();
   var $tbclientes_enderecocliente = array();
   var $tbclientes_idfkcidadecliente = array();
   var $tbclientes_idfkestadocliente = array();
   var $tbclientes_fonecliente = array();
   var $tbclientes_fone2cliente = array();
   var $tbclientes_numcnhcliente = array();
   var $tbclientes_validadecnhcliente = array();
   var $tbclientes_cpfcliente = array();
   var $tbclientes_rgcliente = array();
   var $tbclientes_expedrg = array();
   var $tbclientes_idfkufexpedrg = array();
   var $nomecliente = array();
   var $fonecliente = array();
   var $fone2cliente = array();
   var $numcnhcliente = array();
   var $validadecnhcliente = array();
   var $cpfcliente = array();
   var $rgcliente = array();
   var $expedrg = array();
   var $idfkufexpedrg = array();
   var $tbveiculos_idfkmarcaveiculo = array();
   var $tbveiculos_modeloveiculo = array();
   var $tbveiculos_anoveiculo = array();
   var $tbveiculos_placaveiculo = array();
   var $tbveiculos_corveiculo = array();
   var $tbveiculos_valordiaria = array();
   var $tbveiculos_chassiveiculo = array();
   var $tblocacao_datasaidalocacao = array();
   var $tblocacao_horasaidalocacao = array();
   var $tblocacao_kmsaidalocacao = array();
   var $tblocacao_dataretornolocacao = array();
   var $tblocacao_horaretornolocacao = array();
   var $tblocacao_qtddiarias = array();
   var $tblocacao_valorliquidolocacao = array();
   var $tblocacao_obslocacao = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("pt_br");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdf_ficha_locacao']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'cm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
   $this->Teste_validade = new NM_Valida;
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdf_ficha_locacao", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->tbclientes_nomecliente[0] = $Busca_temp['tbclientes_nomecliente']; 
       $tmp_pos = strpos($this->tbclientes_nomecliente[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->tbclientes_nomecliente[0] = substr($this->tbclientes_nomecliente[0], 0, $tmp_pos);
       }
       $this->tbclientes_enderecocliente[0] = $Busca_temp['tbclientes_enderecocliente']; 
       $tmp_pos = strpos($this->tbclientes_enderecocliente[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->tbclientes_enderecocliente[0] = substr($this->tbclientes_enderecocliente[0], 0, $tmp_pos);
       }
       $this->tbclientes_idfkcidadecliente[0] = $Busca_temp['tbclientes_idfkcidadecliente']; 
       $tmp_pos = strpos($this->tbclientes_idfkcidadecliente[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->tbclientes_idfkcidadecliente[0] = substr($this->tbclientes_idfkcidadecliente[0], 0, $tmp_pos);
       }
       $tbclientes_idfkcidadecliente_2 = $Busca_temp['tbclientes_idfkcidadecliente_input_2']; 
       $this->tbclientes_idfkcidadecliente_2 = $Busca_temp['tbclientes_idfkcidadecliente_input_2']; 
       $this->tbclientes_idfkestadocliente[0] = $Busca_temp['tbclientes_idfkestadocliente']; 
       $tmp_pos = strpos($this->tbclientes_idfkestadocliente[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->tbclientes_idfkestadocliente[0] = substr($this->tbclientes_idfkestadocliente[0], 0, $tmp_pos);
       }
       $tbclientes_idfkestadocliente_2 = $Busca_temp['tbclientes_idfkestadocliente_input_2']; 
       $this->tbclientes_idfkestadocliente_2 = $Busca_temp['tbclientes_idfkestadocliente_input_2']; 
       $this->tblocacao_horasaidalocacao[0] = $Busca_temp['tblocacao_horasaidalocacao']; 
       $tmp_pos = strpos($this->tblocacao_horasaidalocacao[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->tblocacao_horasaidalocacao[0] = substr($this->tblocacao_horasaidalocacao[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'] = " where tblocacao.idLocacao = " . $_SESSION['var_id_locacao'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT tbclientes.nomeCliente as tbclientes_nomecliente, tbclientes.enderecoCliente as tbclientes_enderecocliente, tbclientes.idFKcidadeCliente as tbclientes_idfkcidadecliente, tbclientes.idFKestadoCliente as tbclientes_idfkestadocliente, tbclientes.foneCliente as tbclientes_fonecliente, tbclientes.fone2Cliente as tbclientes_fone2cliente, tbclientes.numCnhCliente as tbclientes_numcnhcliente, tbclientes.validadeCnhCliente as tbclientes_validadecnhcliente, tbclientes.cpfCliente as tbclientes_cpfcliente, tbclientes.rgCliente as tbclientes_rgcliente, tbclientes.expedRG as tbclientes_expedrg, tbclientes.idFKufExpedRG as tbclientes_idfkufexpedrg, tbclientes.nomeCliente as nomecliente, tbclientes.foneCliente as fonecliente, tbclientes.fone2Cliente as fone2cliente, tbclientes.numCnhCliente as numcnhcliente, tbclientes.validadeCnhCliente as validadecnhcliente, tbclientes.cpfCliente as cpfcliente, tbclientes.rgCliente as rgcliente, tbclientes.expedRG as expedrg, tbclientes.idFKufExpedRG as idfkufexpedrg, tbveiculos.idFKmarcaVeiculo as tbveiculos_idfkmarcaveiculo, tbveiculos.modeloVeiculo as tbveiculos_modeloveiculo, tbveiculos.anoVeiculo as tbveiculos_anoveiculo, tbveiculos.placaVeiculo as tbveiculos_placaveiculo, tbveiculos.corVeiculo as tbveiculos_corveiculo, tbveiculos.valorDiaria as tbveiculos_valordiaria, tbveiculos.chassiVeiculo as tbveiculos_chassiveiculo, tblocacao.dataSaidaLocacao as tblocacao_datasaidalocacao, tblocacao.horaSaidaLocacao as tblocacao_horasaidalocacao, tblocacao.kmSaidaLocacao as tblocacao_kmsaidalocacao, tblocacao.dataRetornoLocacao as tblocacao_dataretornolocacao, tblocacao.horaRetornoLocacao as tblocacao_horaretornolocacao, tblocacao.qtdDiarias as tblocacao_qtddiarias, tblocacao.valorLiquidoLocacao as tblocacao_valorliquidolocacao, tblocacao.obsLocacao as tblocacao_obslocacao from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT tbclientes.nomeCliente as tbclientes_nomecliente, tbclientes.enderecoCliente as tbclientes_enderecocliente, tbclientes.idFKcidadeCliente as tbclientes_idfkcidadecliente, tbclientes.idFKestadoCliente as tbclientes_idfkestadocliente, tbclientes.foneCliente as tbclientes_fonecliente, tbclientes.fone2Cliente as tbclientes_fone2cliente, tbclientes.numCnhCliente as tbclientes_numcnhcliente, tbclientes.validadeCnhCliente as tbclientes_validadecnhcliente, tbclientes.cpfCliente as tbclientes_cpfcliente, tbclientes.rgCliente as tbclientes_rgcliente, tbclientes.expedRG as tbclientes_expedrg, tbclientes.idFKufExpedRG as tbclientes_idfkufexpedrg, tbclientes.nomeCliente as nomecliente, tbclientes.foneCliente as fonecliente, tbclientes.fone2Cliente as fone2cliente, tbclientes.numCnhCliente as numcnhcliente, tbclientes.validadeCnhCliente as validadecnhcliente, tbclientes.cpfCliente as cpfcliente, tbclientes.rgCliente as rgcliente, tbclientes.expedRG as expedrg, tbclientes.idFKufExpedRG as idfkufexpedrg, tbveiculos.idFKmarcaVeiculo as tbveiculos_idfkmarcaveiculo, tbveiculos.modeloVeiculo as tbveiculos_modeloveiculo, tbveiculos.anoVeiculo as tbveiculos_anoveiculo, tbveiculos.placaVeiculo as tbveiculos_placaveiculo, tbveiculos.corVeiculo as tbveiculos_corveiculo, tbveiculos.valorDiaria as tbveiculos_valordiaria, tbveiculos.chassiVeiculo as tbveiculos_chassiveiculo, tblocacao.dataSaidaLocacao as tblocacao_datasaidalocacao, tblocacao.horaSaidaLocacao as tblocacao_horasaidalocacao, tblocacao.kmSaidaLocacao as tblocacao_kmsaidalocacao, tblocacao.dataRetornoLocacao as tblocacao_dataretornolocacao, tblocacao.horaRetornoLocacao as tblocacao_horaretornolocacao, tblocacao.qtdDiarias as tblocacao_qtddiarias, tblocacao.valorLiquidoLocacao as tblocacao_valorliquidolocacao, tblocacao.obsLocacao as tblocacao_obslocacao from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     $this->Pdf->setCellMargins($left = '', $top = '', $right = '', $bottom = 0);
     $this->Pdf->SetAutoPageBreak(true, 0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/sys__NM__bg__NM__logo_novo4.png", -0.2, -0, 0, 0, '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_nomecliente'] = "Nome Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_enderecocliente'] = "Endereco Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_idfkcidadecliente'] = "Id F Kcidade Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_idfkestadocliente'] = "Id F Kestado Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_fonecliente'] = "Fone Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_fone2cliente'] = "Fone 2 Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_numcnhcliente'] = "Num Cnh Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_validadecnhcliente'] = "Validade Cnh Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_cpfcliente'] = "Cpf Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_rgcliente'] = "Rg Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_expedrg'] = "Exped RG";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbclientes_idfkufexpedrg'] = "Id F Kuf Exped RG";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['nomecliente'] = "Nome Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['fonecliente'] = "Fone Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['fone2cliente'] = "Fone 2 Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['numcnhcliente'] = "Num Cnh Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['validadecnhcliente'] = "Validade Cnh Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['cpfcliente'] = "Cpf Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['rgcliente'] = "Rg Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['expedrg'] = "Exped RG";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['idfkufexpedrg'] = "Id F Kuf Exped RG";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_idfkmarcaveiculo'] = "Id F Kmarca Veiculo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_modeloveiculo'] = "Modelo Veiculo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_anoveiculo'] = "Ano Veiculo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_placaveiculo'] = "Placa Veiculo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_corveiculo'] = "Cor Veiculo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_valordiaria'] = "Valor Diaria";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tbveiculos_chassiveiculo'] = "Chassi Veiculo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_datasaidalocacao'] = "Data Saida Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_horasaidalocacao'] = "Hora Saida Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_kmsaidalocacao'] = "Km Saida Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_dataretornolocacao'] = "Data Retorno Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_horaretornolocacao'] = "Hora Retorno Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_qtddiarias'] = "Qtd Diarias";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_valorliquidolocacao'] = "Valor Liquido Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['tblocacao_obslocacao'] = "Obs Locacao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['contrato1'] = "contrato1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['contrato2'] = "contrato2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['labels']['contrato3'] = "contrato3";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdf_ficha_locacao']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(1, 1, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdf_ficha_locacao']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->tbclientes_nomecliente[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->tbclientes_enderecocliente[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas] = (string)$this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas];
          $this->tbclientes_idfkestadocliente[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->tbclientes_idfkestadocliente[$this->nm_grid_colunas] = (string)$this->tbclientes_idfkestadocliente[$this->nm_grid_colunas];
          $this->tbclientes_fonecliente[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->tbclientes_fone2cliente[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->tbclientes_numcnhcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->tbclientes_cpfcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->tbclientes_rgcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->tbclientes_expedrg[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas] = (string)$this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas];
          $this->nomecliente[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->fonecliente[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->fone2cliente[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->numcnhcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->validadecnhcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->cpfcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->rgcliente[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->expedrg[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->idfkufexpedrg[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->idfkufexpedrg[$this->nm_grid_colunas] = (string)$this->idfkufexpedrg[$this->nm_grid_colunas];
          $this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas] = (string)$this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas];
          $this->tbveiculos_modeloveiculo[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->tbveiculos_anoveiculo[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->tbveiculos_anoveiculo[$this->nm_grid_colunas] = (string)$this->tbveiculos_anoveiculo[$this->nm_grid_colunas];
          $this->tbveiculos_placaveiculo[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->tbveiculos_corveiculo[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->tbveiculos_valordiaria[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->tbveiculos_valordiaria[$this->nm_grid_colunas] =  str_replace(",", ".", $this->tbveiculos_valordiaria[$this->nm_grid_colunas]);
          $this->tbveiculos_valordiaria[$this->nm_grid_colunas] = (string)$this->tbveiculos_valordiaria[$this->nm_grid_colunas];
          $this->tbveiculos_chassiveiculo[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas] = (string)$this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas];
          $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->tblocacao_qtddiarias[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->tblocacao_qtddiarias[$this->nm_grid_colunas] = (string)$this->tblocacao_qtddiarias[$this->nm_grid_colunas];
          $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] =  str_replace(",", ".", $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas]);
          $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] = (string)$this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas];
          $this->tblocacao_obslocacao[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->contrato1[$this->nm_grid_colunas] = "";
          $this->contrato2[$this->nm_grid_colunas] = "";
          $this->contrato3[$this->nm_grid_colunas] = "";
          $this->tbclientes_nomecliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_nomecliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_nomecliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_nomecliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbclientes_nomecliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_nomecliente[$this->nm_grid_colunas]);
          $this->tbclientes_enderecocliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_enderecocliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_enderecocliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_enderecocliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbclientes_enderecocliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_enderecocliente[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tbclientes_idfkcidadecliente($this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas] , $this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas]) ; 
          $this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tbclientes_idfkestadocliente($this->tbclientes_idfkestadocliente[$this->nm_grid_colunas] , $this->tbclientes_idfkestadocliente[$this->nm_grid_colunas]) ; 
          $this->tbclientes_idfkestadocliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_idfkestadocliente[$this->nm_grid_colunas]);
          $this->tbclientes_fonecliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_fonecliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_fonecliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_fonecliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nm_gera_mask($this->tbclientes_fonecliente[$this->nm_grid_colunas], "(xx) x-xxxx-xxxx"); 
          $this->tbclientes_fonecliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_fonecliente[$this->nm_grid_colunas]);
          $this->tbclientes_fone2cliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_fone2cliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_fone2cliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_fone2cliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nm_gera_mask($this->tbclientes_fone2cliente[$this->nm_grid_colunas], "(xx) x-xxxx-xxxx"); 
          $this->tbclientes_fone2cliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_fone2cliente[$this->nm_grid_colunas]);
          $this->tbclientes_numcnhcliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_numcnhcliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_numcnhcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_numcnhcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbclientes_numcnhcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_numcnhcliente[$this->nm_grid_colunas]);
          $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_validadecnhcliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_validadecnhcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tbclientes_validadecnhcliente_x =  $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tbclientes_validadecnhcliente_x, "YYYY-MM-DD");
               if (is_numeric($tbclientes_validadecnhcliente_x) && $tbclientes_validadecnhcliente_x > 0) 
               { 
                   $this->nm_data->SetaData($this->tbclientes_validadecnhcliente[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_validadecnhcliente[$this->nm_grid_colunas]);
          $this->tbclientes_cpfcliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_cpfcliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_cpfcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_cpfcliente[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (strlen($this->tbclientes_cpfcliente[$this->nm_grid_colunas]) < 14 && strlen($this->tbclientes_cpfcliente[$this->nm_grid_colunas]) !=  11) 
               { 
                   $this->tbclientes_cpfcliente[$this->nm_grid_colunas] = str_repeat(0, 14 - strlen($this->tbclientes_cpfcliente[$this->nm_grid_colunas])) . $this->tbclientes_cpfcliente[$this->nm_grid_colunas]; 
               } 
               if (strlen($this->tbclientes_cpfcliente[$this->nm_grid_colunas]) > 11 && substr($this->tbclientes_cpfcliente[$this->nm_grid_colunas], 0, 3) == "000" && $this->Teste_validade->CNPJ($this->tbclientes_cpfcliente[$this->nm_grid_colunas]) == false) 
               { 
                   $this->tbclientes_cpfcliente[$this->nm_grid_colunas] = substr($this->tbclientes_cpfcliente[$this->nm_grid_colunas], strlen($this->tbclientes_cpfcliente[$this->nm_grid_colunas]) - 11); 
               } 
               nmgp_Form_CicCnpj($this->tbclientes_cpfcliente[$this->nm_grid_colunas]) ; 
          } 
          $this->tbclientes_cpfcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_cpfcliente[$this->nm_grid_colunas]);
          $this->tbclientes_rgcliente[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_rgcliente[$this->nm_grid_colunas]);
          if ($this->tbclientes_rgcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_rgcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbclientes_rgcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_rgcliente[$this->nm_grid_colunas]);
          $this->tbclientes_expedrg[$this->nm_grid_colunas] = sc_strip_script($this->tbclientes_expedrg[$this->nm_grid_colunas]);
          if ($this->tbclientes_expedrg[$this->nm_grid_colunas] === "") 
          { 
              $this->tbclientes_expedrg[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbclientes_expedrg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_expedrg[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tbclientes_idfkufexpedrg($this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas] , $this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas]) ; 
          $this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas]);
          $this->nomecliente[$this->nm_grid_colunas] = sc_strip_script($this->nomecliente[$this->nm_grid_colunas]);
          if ($this->nomecliente[$this->nm_grid_colunas] === "") 
          { 
              $this->nomecliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nomecliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nomecliente[$this->nm_grid_colunas]);
          $this->fonecliente[$this->nm_grid_colunas] = sc_strip_script($this->fonecliente[$this->nm_grid_colunas]);
          if ($this->fonecliente[$this->nm_grid_colunas] === "") 
          { 
              $this->fonecliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->fonecliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fonecliente[$this->nm_grid_colunas]);
          $this->fone2cliente[$this->nm_grid_colunas] = sc_strip_script($this->fone2cliente[$this->nm_grid_colunas]);
          if ($this->fone2cliente[$this->nm_grid_colunas] === "") 
          { 
              $this->fone2cliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->fone2cliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fone2cliente[$this->nm_grid_colunas]);
          $this->numcnhcliente[$this->nm_grid_colunas] = sc_strip_script($this->numcnhcliente[$this->nm_grid_colunas]);
          if ($this->numcnhcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->numcnhcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numcnhcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numcnhcliente[$this->nm_grid_colunas]);
          $this->validadecnhcliente[$this->nm_grid_colunas] = sc_strip_script($this->validadecnhcliente[$this->nm_grid_colunas]);
          if ($this->validadecnhcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->validadecnhcliente[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $validadecnhcliente_x =  $this->validadecnhcliente[$this->nm_grid_colunas];
               nm_conv_limpa_dado($validadecnhcliente_x, "YYYY-MM-DD");
               if (is_numeric($validadecnhcliente_x) && $validadecnhcliente_x > 0) 
               { 
                   $this->nm_data->SetaData($this->validadecnhcliente[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->validadecnhcliente[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->validadecnhcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->validadecnhcliente[$this->nm_grid_colunas]);
          $this->cpfcliente[$this->nm_grid_colunas] = sc_strip_script($this->cpfcliente[$this->nm_grid_colunas]);
          if ($this->cpfcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->cpfcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cpfcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cpfcliente[$this->nm_grid_colunas]);
          $this->rgcliente[$this->nm_grid_colunas] = sc_strip_script($this->rgcliente[$this->nm_grid_colunas]);
          if ($this->rgcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->rgcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rgcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rgcliente[$this->nm_grid_colunas]);
          $this->expedrg[$this->nm_grid_colunas] = sc_strip_script($this->expedrg[$this->nm_grid_colunas]);
          if ($this->expedrg[$this->nm_grid_colunas] === "") 
          { 
              $this->expedrg[$this->nm_grid_colunas] = "" ;  
          } 
          $this->expedrg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->expedrg[$this->nm_grid_colunas]);
          $this->idfkufexpedrg[$this->nm_grid_colunas] = sc_strip_script($this->idfkufexpedrg[$this->nm_grid_colunas]);
          if ($this->idfkufexpedrg[$this->nm_grid_colunas] === "") 
          { 
              $this->idfkufexpedrg[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idfkufexpedrg[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idfkufexpedrg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idfkufexpedrg[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tbveiculos_idfkmarcaveiculo($this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas] , $this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas]) ; 
          $this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas]);
          $this->tbveiculos_modeloveiculo[$this->nm_grid_colunas] = sc_strip_script($this->tbveiculos_modeloveiculo[$this->nm_grid_colunas]);
          if ($this->tbveiculos_modeloveiculo[$this->nm_grid_colunas] === "") 
          { 
              $this->tbveiculos_modeloveiculo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbveiculos_modeloveiculo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_modeloveiculo[$this->nm_grid_colunas]);
          $this->tbveiculos_anoveiculo[$this->nm_grid_colunas] = sc_strip_script($this->tbveiculos_anoveiculo[$this->nm_grid_colunas]);
          if ($this->tbveiculos_anoveiculo[$this->nm_grid_colunas] === "") 
          { 
              $this->tbveiculos_anoveiculo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbveiculos_anoveiculo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_anoveiculo[$this->nm_grid_colunas]);
          $this->tbveiculos_placaveiculo[$this->nm_grid_colunas] = sc_strip_script($this->tbveiculos_placaveiculo[$this->nm_grid_colunas]);
          if ($this->tbveiculos_placaveiculo[$this->nm_grid_colunas] === "") 
          { 
              $this->tbveiculos_placaveiculo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nm_gera_mask($this->tbveiculos_placaveiculo[$this->nm_grid_colunas], "zzz-zzzz"); 
          $this->tbveiculos_placaveiculo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_placaveiculo[$this->nm_grid_colunas]);
          $this->tbveiculos_corveiculo[$this->nm_grid_colunas] = sc_strip_script($this->tbveiculos_corveiculo[$this->nm_grid_colunas]);
          if ($this->tbveiculos_corveiculo[$this->nm_grid_colunas] === "") 
          { 
              $this->tbveiculos_corveiculo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbveiculos_corveiculo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_corveiculo[$this->nm_grid_colunas]);
          $this->tbveiculos_valordiaria[$this->nm_grid_colunas] = sc_strip_script($this->tbveiculos_valordiaria[$this->nm_grid_colunas]);
          if ($this->tbveiculos_valordiaria[$this->nm_grid_colunas] === "") 
          { 
              $this->tbveiculos_valordiaria[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tbveiculos_valordiaria[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tbveiculos_valordiaria[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_valordiaria[$this->nm_grid_colunas]);
          $this->tbveiculos_chassiveiculo[$this->nm_grid_colunas] = sc_strip_script($this->tbveiculos_chassiveiculo[$this->nm_grid_colunas]);
          if ($this->tbveiculos_chassiveiculo[$this->nm_grid_colunas] === "") 
          { 
              $this->tbveiculos_chassiveiculo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tbveiculos_chassiveiculo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tbveiculos_chassiveiculo[$this->nm_grid_colunas]);
          $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_datasaidalocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_datasaidalocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tblocacao_datasaidalocacao_x =  $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tblocacao_datasaidalocacao_x, "YYYY-MM-DD");
               if (is_numeric($tblocacao_datasaidalocacao_x) && $tblocacao_datasaidalocacao_x > 0) 
               { 
                   $this->nm_data->SetaData($this->tblocacao_datasaidalocacao[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_datasaidalocacao[$this->nm_grid_colunas]);
          $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_horasaidalocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_horasaidalocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tblocacao_horasaidalocacao_x =  $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tblocacao_horasaidalocacao_x, "HH:II:SS");
               if (is_numeric($tblocacao_horasaidalocacao_x) && $tblocacao_horasaidalocacao_x > 0) 
               { 
                   $this->nm_data->SetaData($this->tblocacao_horasaidalocacao[$this->nm_grid_colunas], "HH:II:SS");
                   $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_horasaidalocacao[$this->nm_grid_colunas]);
          $this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas]);
          $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_dataretornolocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_dataretornolocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tblocacao_dataretornolocacao_x =  $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tblocacao_dataretornolocacao_x, "YYYY-MM-DD");
               if (is_numeric($tblocacao_dataretornolocacao_x) && $tblocacao_dataretornolocacao_x > 0) 
               { 
                   $this->nm_data->SetaData($this->tblocacao_dataretornolocacao[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_dataretornolocacao[$this->nm_grid_colunas]);
          $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_horaretornolocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_horaretornolocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tblocacao_horaretornolocacao_x =  $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tblocacao_horaretornolocacao_x, "HH:II:SS");
               if (is_numeric($tblocacao_horaretornolocacao_x) && $tblocacao_horaretornolocacao_x > 0) 
               { 
                   $this->nm_data->SetaData($this->tblocacao_horaretornolocacao[$this->nm_grid_colunas], "HH:II:SS");
                   $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_horaretornolocacao[$this->nm_grid_colunas]);
          $this->tblocacao_qtddiarias[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_qtddiarias[$this->nm_grid_colunas]);
          if ($this->tblocacao_qtddiarias[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_qtddiarias[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tblocacao_qtddiarias[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tblocacao_qtddiarias[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_qtddiarias[$this->nm_grid_colunas]);
          $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas]);
          $this->tblocacao_obslocacao[$this->nm_grid_colunas] = sc_strip_script($this->tblocacao_obslocacao[$this->nm_grid_colunas]);
          if ($this->tblocacao_obslocacao[$this->nm_grid_colunas] === "") 
          { 
              $this->tblocacao_obslocacao[$this->nm_grid_colunas] = "" ;  
          } 
          else   
          { 
              $this->tblocacao_obslocacao[$this->nm_grid_colunas] = nl2br($this->tblocacao_obslocacao[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->tblocacao_obslocacao[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->tblocacao_obslocacao[$this->nm_grid_colunas]); 
              } 
              $this->tblocacao_obslocacao[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->tblocacao_obslocacao[$this->nm_grid_colunas])) 
                 { 
                     $this->tblocacao_obslocacao[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 100) 
                 { 
                     $this->tblocacao_obslocacao[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 100, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->tblocacao_obslocacao[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->tblocacao_obslocacao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tblocacao_obslocacao[$this->nm_grid_colunas]);
          if ($this->contrato1[$this->nm_grid_colunas] === "") 
          { 
              $this->contrato1[$this->nm_grid_colunas] = "" ;  
          } 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/sys__NM__bg__NM__contrato.png"))
          { 
              $this->contrato1[$this->nm_grid_colunas] = "" ;  
          } 
          else 
          { 
              $this->contrato1[$this->nm_grid_colunas] = $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/sys__NM__bg__NM__contrato.png"; 
          } 
          $this->contrato1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->contrato1[$this->nm_grid_colunas]);
          if ($this->contrato2[$this->nm_grid_colunas] === "") 
          { 
              $this->contrato2[$this->nm_grid_colunas] = "" ;  
          } 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/sys__NM__bg__NM__contrato2.png"))
          { 
              $this->contrato2[$this->nm_grid_colunas] = "" ;  
          } 
          else 
          { 
              $this->contrato2[$this->nm_grid_colunas] = $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/sys__NM__bg__NM__contrato2.png"; 
          } 
          $this->contrato2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->contrato2[$this->nm_grid_colunas]);
          if ($this->contrato3[$this->nm_grid_colunas] === "") 
          { 
              $this->contrato3[$this->nm_grid_colunas] = "" ;  
          } 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/sys__NM__bg__NM__contrato3 (1).png"))
          { 
              $this->contrato3[$this->nm_grid_colunas] = "" ;  
          } 
          else 
          { 
              $this->contrato3[$this->nm_grid_colunas] = $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/sys__NM__bg__NM__contrato3 (1).png"; 
          } 
          $this->contrato3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->contrato3[$this->nm_grid_colunas]);
            $cell_tbclientes_nomeCliente = array('posx' => -18.9, 'posy' => -23.8, 'data' => $this->tbclientes_nomecliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_numCnhCliente = array('posx' => -19.1, 'posy' => 9.1, 'data' => $this->tbclientes_numcnhcliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_validadeCnhCliente = array('posx' => -10.3, 'posy' => 9.1, 'data' => $this->tbclientes_validadecnhcliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_rgCliente = array('posx' => -19.3, 'posy' => -21.45, 'data' => $this->tbclientes_rgcliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_expedRG = array('posx' => 8.7, 'posy' => 8.25, 'data' => $this->tbclientes_expedrg[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_idFKufExpedRG = array('posx' => 12.9, 'posy' => 8.25, 'data' => $this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_cpfCliente = array('posx' => -6.35, 'posy' => 9.75, 'data' => $this->tbclientes_cpfcliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_foneCliente = array('posx' => -18.1, 'posy' => 9.8, 'data' => $this->tbclientes_fonecliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_fone2Cliente = array('posx' => -13, 'posy' => 9.8, 'data' => $this->tbclientes_fone2cliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculos_idFKmarcaVeiculo = array('posx' => -18.9, 'posy' => 12, 'data' => $this->tbveiculos_idfkmarcaveiculo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculos_modeloVeiculo = array('posx' => 7.9, 'posy' => 12, 'data' => $this->tbveiculos_modeloveiculo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculos_anoVeiculo = array('posx' => -19.35, 'posy' => 12.9, 'data' => $this->tbveiculos_anoveiculo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculos_corVeiculo = array('posx' => -13.7, 'posy' => 12.9, 'data' => $this->tbveiculos_corveiculo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculos_placaVeiculo = array('posx' => -8.3, 'posy' => 12.9, 'data' => $this->tbveiculos_placaveiculo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_dataSaidaLocacao = array('posx' => -17.6, 'posy' => 14.95, 'data' => $this->tblocacao_datasaidalocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_horaSaidaLocacao = array('posx' => 10.25, 'posy' => 14.95, 'data' => $this->tblocacao_horasaidalocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_dataRetornoLocacao = array('posx' => -17.2, 'posy' => 15.8, 'data' => $this->tblocacao_dataretornolocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_horaRetornoLocacao = array('posx' => 10.5, 'posy' => 15.8, 'data' => $this->tblocacao_horaretornolocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_kmSaidaLocacao = array('posx' => -17.8, 'posy' => 16.9, 'data' => $this->tblocacao_kmsaidalocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_qtdDiarias = array('posx' => -10.8, 'posy' => 16.9, 'data' => $this->tblocacao_qtddiarias[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_valorLiquidoLocacao = array('posx' => -6, 'posy' => 17.85, 'data' => $this->tblocacao_valorliquidolocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_tbclientes_enderecoCliente = array('posx' => -18.2, 'posy' => -23.04, 'data' => $this->tbclientes_enderecocliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_idFKestadoCliente = array('posx' => -6.5, 'posy' => -22.25, 'data' => $this->tbclientes_idfkestadocliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbclientes_idFKcidadeCliente = array('posx' => -18.7, 'posy' => -22.25, 'data' => $this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculos_valorDiaria = array('posx' => -6.1, 'posy' => 16.9, 'data' => $this->tbveiculos_valordiaria[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tblocacao_obsLocacao = array('posx' => -20.5, 'posy' => 27.45, 'data' => $this->tblocacao_obslocacao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_data_atual = array('posx' => -8.3, 'posy' => 19.68, 'data' => '', 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tbveiculo_chassi = array('posx' => -7, 'posy' => 12, 'data' => $this->tbveiculos_chassiveiculo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
          
            $contrato1 = array('posx' => 0, 'posy' => 0, 'data' => $this->contrato1[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $nomeCliente = array('posx' => 2.1, 'posy' => 5.9, 'data' => $this->tbclientes_nomecliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $endereco = array('posx' => 2.6, 'posy' => 6.3, 'data' => $this->tbclientes_enderecocliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cidade = array('posx' => 2.35, 'posy' => 6.63, 'data' => $this->tbclientes_idfkcidadecliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $uf = array('posx' => 12.2, 'posy' => 6.6, 'data' => $this->tbclientes_idfkestadocliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cpf = array('posx' => 2.8, 'posy' => 6.98, 'data' => $this->tbclientes_cpfcliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $rg = array('posx' => 7, 'posy' => 6.98, 'data' => $this->tbclientes_rgcliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $orgao_exp = array('posx' => 11.1, 'posy' => 6.98, 'data' => $this->tbclientes_expedrg[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $uf_rg = array('posx' => 13, 'posy' => 6.98, 'data' => $this->tbclientes_idfkufexpedrg[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
          
            $contrato2 = array('posx' => 0, 'posy' => 0, 'data' => $this->contrato2[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
          
            $contatro3 = array('posx' => 0, 'posy' => 0, 'data' => $this->contrato3[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $nome_assinar = array('posx' => 7.7, 'posy' => 12.6, 'data' => $this->tbclientes_nomecliente[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $lajedo = array('posx' => 7, 'posy' => 10, 'data' => $this->SC_conv_utf8('Lajedo, '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $dataAtual = array('posx' => 8.5, 'posy' => 10, 'data' => '', 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_tbclientes_nomeCliente['font_type'], $cell_tbclientes_nomeCliente['font_style'], $cell_tbclientes_nomeCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_nomeCliente['data'], $cell_tbclientes_nomeCliente['color_r'], $cell_tbclientes_nomeCliente['color_g'], $cell_tbclientes_nomeCliente['color_b']);
            if (!empty($cell_tbclientes_nomeCliente['posx']) && !empty($cell_tbclientes_nomeCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_nomeCliente['posx'], $cell_tbclientes_nomeCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_nomeCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_nomeCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_nomeCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_nomeCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_nomeCliente['width'], 0, $cell_tbclientes_nomeCliente['data'], 0, 0, $cell_tbclientes_nomeCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_numCnhCliente['font_type'], $cell_tbclientes_numCnhCliente['font_style'], $cell_tbclientes_numCnhCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_numCnhCliente['data'], $cell_tbclientes_numCnhCliente['color_r'], $cell_tbclientes_numCnhCliente['color_g'], $cell_tbclientes_numCnhCliente['color_b']);
            if (!empty($cell_tbclientes_numCnhCliente['posx']) && !empty($cell_tbclientes_numCnhCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_numCnhCliente['posx'], $cell_tbclientes_numCnhCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_numCnhCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_numCnhCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_numCnhCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_numCnhCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_numCnhCliente['width'], 0, $cell_tbclientes_numCnhCliente['data'], 0, 0, $cell_tbclientes_numCnhCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_validadeCnhCliente['font_type'], $cell_tbclientes_validadeCnhCliente['font_style'], $cell_tbclientes_validadeCnhCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_validadeCnhCliente['data'], $cell_tbclientes_validadeCnhCliente['color_r'], $cell_tbclientes_validadeCnhCliente['color_g'], $cell_tbclientes_validadeCnhCliente['color_b']);
            if (!empty($cell_tbclientes_validadeCnhCliente['posx']) && !empty($cell_tbclientes_validadeCnhCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_validadeCnhCliente['posx'], $cell_tbclientes_validadeCnhCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_validadeCnhCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_validadeCnhCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_validadeCnhCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_validadeCnhCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_validadeCnhCliente['width'], 0, $cell_tbclientes_validadeCnhCliente['data'], 0, 0, $cell_tbclientes_validadeCnhCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_rgCliente['font_type'], $cell_tbclientes_rgCliente['font_style'], $cell_tbclientes_rgCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_rgCliente['data'], $cell_tbclientes_rgCliente['color_r'], $cell_tbclientes_rgCliente['color_g'], $cell_tbclientes_rgCliente['color_b']);
            if (!empty($cell_tbclientes_rgCliente['posx']) && !empty($cell_tbclientes_rgCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_rgCliente['posx'], $cell_tbclientes_rgCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_rgCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_rgCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_rgCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_rgCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_rgCliente['width'], 0, $cell_tbclientes_rgCliente['data'], 0, 0, $cell_tbclientes_rgCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_expedRG['font_type'], $cell_tbclientes_expedRG['font_style'], $cell_tbclientes_expedRG['font_size']);
            $this->pdf_text_color($cell_tbclientes_expedRG['data'], $cell_tbclientes_expedRG['color_r'], $cell_tbclientes_expedRG['color_g'], $cell_tbclientes_expedRG['color_b']);
            if (!empty($cell_tbclientes_expedRG['posx']) && !empty($cell_tbclientes_expedRG['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_expedRG['posx'], $cell_tbclientes_expedRG['posy']);
            }
            elseif (!empty($cell_tbclientes_expedRG['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_expedRG['posx']);
            }
            elseif (!empty($cell_tbclientes_expedRG['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_expedRG['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_expedRG['width'], 0, $cell_tbclientes_expedRG['data'], 0, 0, $cell_tbclientes_expedRG['align']);

            $this->Pdf->SetFont($cell_tbclientes_idFKufExpedRG['font_type'], $cell_tbclientes_idFKufExpedRG['font_style'], $cell_tbclientes_idFKufExpedRG['font_size']);
            $this->pdf_text_color($cell_tbclientes_idFKufExpedRG['data'], $cell_tbclientes_idFKufExpedRG['color_r'], $cell_tbclientes_idFKufExpedRG['color_g'], $cell_tbclientes_idFKufExpedRG['color_b']);
            if (!empty($cell_tbclientes_idFKufExpedRG['posx']) && !empty($cell_tbclientes_idFKufExpedRG['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_idFKufExpedRG['posx'], $cell_tbclientes_idFKufExpedRG['posy']);
            }
            elseif (!empty($cell_tbclientes_idFKufExpedRG['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_idFKufExpedRG['posx']);
            }
            elseif (!empty($cell_tbclientes_idFKufExpedRG['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_idFKufExpedRG['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_idFKufExpedRG['width'], 0, $cell_tbclientes_idFKufExpedRG['data'], 0, 0, $cell_tbclientes_idFKufExpedRG['align']);

            $this->Pdf->SetFont($cell_tbclientes_cpfCliente['font_type'], $cell_tbclientes_cpfCliente['font_style'], $cell_tbclientes_cpfCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_cpfCliente['data'], $cell_tbclientes_cpfCliente['color_r'], $cell_tbclientes_cpfCliente['color_g'], $cell_tbclientes_cpfCliente['color_b']);
            if (!empty($cell_tbclientes_cpfCliente['posx']) && !empty($cell_tbclientes_cpfCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_cpfCliente['posx'], $cell_tbclientes_cpfCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_cpfCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_cpfCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_cpfCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_cpfCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_cpfCliente['width'], 0, $cell_tbclientes_cpfCliente['data'], 0, 0, $cell_tbclientes_cpfCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_foneCliente['font_type'], $cell_tbclientes_foneCliente['font_style'], $cell_tbclientes_foneCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_foneCliente['data'], $cell_tbclientes_foneCliente['color_r'], $cell_tbclientes_foneCliente['color_g'], $cell_tbclientes_foneCliente['color_b']);
            if (!empty($cell_tbclientes_foneCliente['posx']) && !empty($cell_tbclientes_foneCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_foneCliente['posx'], $cell_tbclientes_foneCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_foneCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_foneCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_foneCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_foneCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_foneCliente['width'], 0, $cell_tbclientes_foneCliente['data'], 0, 0, $cell_tbclientes_foneCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_fone2Cliente['font_type'], $cell_tbclientes_fone2Cliente['font_style'], $cell_tbclientes_fone2Cliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_fone2Cliente['data'], $cell_tbclientes_fone2Cliente['color_r'], $cell_tbclientes_fone2Cliente['color_g'], $cell_tbclientes_fone2Cliente['color_b']);
            if (!empty($cell_tbclientes_fone2Cliente['posx']) && !empty($cell_tbclientes_fone2Cliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_fone2Cliente['posx'], $cell_tbclientes_fone2Cliente['posy']);
            }
            elseif (!empty($cell_tbclientes_fone2Cliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_fone2Cliente['posx']);
            }
            elseif (!empty($cell_tbclientes_fone2Cliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_fone2Cliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_fone2Cliente['width'], 0, $cell_tbclientes_fone2Cliente['data'], 0, 0, $cell_tbclientes_fone2Cliente['align']);

            $this->Pdf->SetFont($cell_tbveiculos_idFKmarcaVeiculo['font_type'], $cell_tbveiculos_idFKmarcaVeiculo['font_style'], $cell_tbveiculos_idFKmarcaVeiculo['font_size']);
            $this->pdf_text_color($cell_tbveiculos_idFKmarcaVeiculo['data'], $cell_tbveiculos_idFKmarcaVeiculo['color_r'], $cell_tbveiculos_idFKmarcaVeiculo['color_g'], $cell_tbveiculos_idFKmarcaVeiculo['color_b']);
            if (!empty($cell_tbveiculos_idFKmarcaVeiculo['posx']) && !empty($cell_tbveiculos_idFKmarcaVeiculo['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculos_idFKmarcaVeiculo['posx'], $cell_tbveiculos_idFKmarcaVeiculo['posy']);
            }
            elseif (!empty($cell_tbveiculos_idFKmarcaVeiculo['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculos_idFKmarcaVeiculo['posx']);
            }
            elseif (!empty($cell_tbveiculos_idFKmarcaVeiculo['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculos_idFKmarcaVeiculo['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculos_idFKmarcaVeiculo['width'], 0, $cell_tbveiculos_idFKmarcaVeiculo['data'], 0, 0, $cell_tbveiculos_idFKmarcaVeiculo['align']);

            $this->Pdf->SetFont($cell_tbveiculos_modeloVeiculo['font_type'], $cell_tbveiculos_modeloVeiculo['font_style'], $cell_tbveiculos_modeloVeiculo['font_size']);
            $this->pdf_text_color($cell_tbveiculos_modeloVeiculo['data'], $cell_tbveiculos_modeloVeiculo['color_r'], $cell_tbveiculos_modeloVeiculo['color_g'], $cell_tbveiculos_modeloVeiculo['color_b']);
            if (!empty($cell_tbveiculos_modeloVeiculo['posx']) && !empty($cell_tbveiculos_modeloVeiculo['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculos_modeloVeiculo['posx'], $cell_tbveiculos_modeloVeiculo['posy']);
            }
            elseif (!empty($cell_tbveiculos_modeloVeiculo['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculos_modeloVeiculo['posx']);
            }
            elseif (!empty($cell_tbveiculos_modeloVeiculo['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculos_modeloVeiculo['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculos_modeloVeiculo['width'], 0, $cell_tbveiculos_modeloVeiculo['data'], 0, 0, $cell_tbveiculos_modeloVeiculo['align']);

            $this->Pdf->SetFont($cell_tbveiculos_anoVeiculo['font_type'], $cell_tbveiculos_anoVeiculo['font_style'], $cell_tbveiculos_anoVeiculo['font_size']);
            $this->pdf_text_color($cell_tbveiculos_anoVeiculo['data'], $cell_tbveiculos_anoVeiculo['color_r'], $cell_tbveiculos_anoVeiculo['color_g'], $cell_tbveiculos_anoVeiculo['color_b']);
            if (!empty($cell_tbveiculos_anoVeiculo['posx']) && !empty($cell_tbveiculos_anoVeiculo['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculos_anoVeiculo['posx'], $cell_tbveiculos_anoVeiculo['posy']);
            }
            elseif (!empty($cell_tbveiculos_anoVeiculo['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculos_anoVeiculo['posx']);
            }
            elseif (!empty($cell_tbveiculos_anoVeiculo['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculos_anoVeiculo['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculos_anoVeiculo['width'], 0, $cell_tbveiculos_anoVeiculo['data'], 0, 0, $cell_tbveiculos_anoVeiculo['align']);

            $this->Pdf->SetFont($cell_tbveiculos_corVeiculo['font_type'], $cell_tbveiculos_corVeiculo['font_style'], $cell_tbveiculos_corVeiculo['font_size']);
            $this->pdf_text_color($cell_tbveiculos_corVeiculo['data'], $cell_tbveiculos_corVeiculo['color_r'], $cell_tbveiculos_corVeiculo['color_g'], $cell_tbveiculos_corVeiculo['color_b']);
            if (!empty($cell_tbveiculos_corVeiculo['posx']) && !empty($cell_tbveiculos_corVeiculo['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculos_corVeiculo['posx'], $cell_tbveiculos_corVeiculo['posy']);
            }
            elseif (!empty($cell_tbveiculos_corVeiculo['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculos_corVeiculo['posx']);
            }
            elseif (!empty($cell_tbveiculos_corVeiculo['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculos_corVeiculo['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculos_corVeiculo['width'], 0, $cell_tbveiculos_corVeiculo['data'], 0, 0, $cell_tbveiculos_corVeiculo['align']);

            $this->Pdf->SetFont($cell_tbveiculos_placaVeiculo['font_type'], $cell_tbveiculos_placaVeiculo['font_style'], $cell_tbveiculos_placaVeiculo['font_size']);
            $this->pdf_text_color($cell_tbveiculos_placaVeiculo['data'], $cell_tbveiculos_placaVeiculo['color_r'], $cell_tbveiculos_placaVeiculo['color_g'], $cell_tbveiculos_placaVeiculo['color_b']);
            if (!empty($cell_tbveiculos_placaVeiculo['posx']) && !empty($cell_tbveiculos_placaVeiculo['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculos_placaVeiculo['posx'], $cell_tbveiculos_placaVeiculo['posy']);
            }
            elseif (!empty($cell_tbveiculos_placaVeiculo['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculos_placaVeiculo['posx']);
            }
            elseif (!empty($cell_tbveiculos_placaVeiculo['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculos_placaVeiculo['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculos_placaVeiculo['width'], 0, $cell_tbveiculos_placaVeiculo['data'], 0, 0, $cell_tbveiculos_placaVeiculo['align']);

            $this->Pdf->SetFont($cell_tblocacao_dataSaidaLocacao['font_type'], $cell_tblocacao_dataSaidaLocacao['font_style'], $cell_tblocacao_dataSaidaLocacao['font_size']);
            $this->pdf_text_color($cell_tblocacao_dataSaidaLocacao['data'], $cell_tblocacao_dataSaidaLocacao['color_r'], $cell_tblocacao_dataSaidaLocacao['color_g'], $cell_tblocacao_dataSaidaLocacao['color_b']);
            if (!empty($cell_tblocacao_dataSaidaLocacao['posx']) && !empty($cell_tblocacao_dataSaidaLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_dataSaidaLocacao['posx'], $cell_tblocacao_dataSaidaLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_dataSaidaLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_dataSaidaLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_dataSaidaLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_dataSaidaLocacao['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_dataSaidaLocacao['width'], 0, $cell_tblocacao_dataSaidaLocacao['data'], 0, 0, $cell_tblocacao_dataSaidaLocacao['align']);

            $this->Pdf->SetFont($cell_tblocacao_horaSaidaLocacao['font_type'], $cell_tblocacao_horaSaidaLocacao['font_style'], $cell_tblocacao_horaSaidaLocacao['font_size']);
            $this->pdf_text_color($cell_tblocacao_horaSaidaLocacao['data'], $cell_tblocacao_horaSaidaLocacao['color_r'], $cell_tblocacao_horaSaidaLocacao['color_g'], $cell_tblocacao_horaSaidaLocacao['color_b']);
            if (!empty($cell_tblocacao_horaSaidaLocacao['posx']) && !empty($cell_tblocacao_horaSaidaLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_horaSaidaLocacao['posx'], $cell_tblocacao_horaSaidaLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_horaSaidaLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_horaSaidaLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_horaSaidaLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_horaSaidaLocacao['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_horaSaidaLocacao['width'], 0, $cell_tblocacao_horaSaidaLocacao['data'], 0, 0, $cell_tblocacao_horaSaidaLocacao['align']);

            $this->Pdf->SetFont($cell_tblocacao_dataRetornoLocacao['font_type'], $cell_tblocacao_dataRetornoLocacao['font_style'], $cell_tblocacao_dataRetornoLocacao['font_size']);
            $this->pdf_text_color($cell_tblocacao_dataRetornoLocacao['data'], $cell_tblocacao_dataRetornoLocacao['color_r'], $cell_tblocacao_dataRetornoLocacao['color_g'], $cell_tblocacao_dataRetornoLocacao['color_b']);
            if (!empty($cell_tblocacao_dataRetornoLocacao['posx']) && !empty($cell_tblocacao_dataRetornoLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_dataRetornoLocacao['posx'], $cell_tblocacao_dataRetornoLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_dataRetornoLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_dataRetornoLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_dataRetornoLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_dataRetornoLocacao['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_dataRetornoLocacao['width'], 0, $cell_tblocacao_dataRetornoLocacao['data'], 0, 0, $cell_tblocacao_dataRetornoLocacao['align']);

            $this->Pdf->SetFont($cell_tblocacao_horaRetornoLocacao['font_type'], $cell_tblocacao_horaRetornoLocacao['font_style'], $cell_tblocacao_horaRetornoLocacao['font_size']);
            $this->pdf_text_color($cell_tblocacao_horaRetornoLocacao['data'], $cell_tblocacao_horaRetornoLocacao['color_r'], $cell_tblocacao_horaRetornoLocacao['color_g'], $cell_tblocacao_horaRetornoLocacao['color_b']);
            if (!empty($cell_tblocacao_horaRetornoLocacao['posx']) && !empty($cell_tblocacao_horaRetornoLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_horaRetornoLocacao['posx'], $cell_tblocacao_horaRetornoLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_horaRetornoLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_horaRetornoLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_horaRetornoLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_horaRetornoLocacao['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_horaRetornoLocacao['width'], 0, $cell_tblocacao_horaRetornoLocacao['data'], 0, 0, $cell_tblocacao_horaRetornoLocacao['align']);

            $this->Pdf->SetFont($cell_tblocacao_kmSaidaLocacao['font_type'], $cell_tblocacao_kmSaidaLocacao['font_style'], $cell_tblocacao_kmSaidaLocacao['font_size']);
            $this->pdf_text_color($cell_tblocacao_kmSaidaLocacao['data'], $cell_tblocacao_kmSaidaLocacao['color_r'], $cell_tblocacao_kmSaidaLocacao['color_g'], $cell_tblocacao_kmSaidaLocacao['color_b']);
            if (!empty($cell_tblocacao_kmSaidaLocacao['posx']) && !empty($cell_tblocacao_kmSaidaLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_kmSaidaLocacao['posx'], $cell_tblocacao_kmSaidaLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_kmSaidaLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_kmSaidaLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_kmSaidaLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_kmSaidaLocacao['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_kmSaidaLocacao['width'], 0, $cell_tblocacao_kmSaidaLocacao['data'], 0, 0, $cell_tblocacao_kmSaidaLocacao['align']);

            $this->Pdf->SetFont($cell_tblocacao_qtdDiarias['font_type'], $cell_tblocacao_qtdDiarias['font_style'], $cell_tblocacao_qtdDiarias['font_size']);
            $this->pdf_text_color($cell_tblocacao_qtdDiarias['data'], $cell_tblocacao_qtdDiarias['color_r'], $cell_tblocacao_qtdDiarias['color_g'], $cell_tblocacao_qtdDiarias['color_b']);
            if (!empty($cell_tblocacao_qtdDiarias['posx']) && !empty($cell_tblocacao_qtdDiarias['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_qtdDiarias['posx'], $cell_tblocacao_qtdDiarias['posy']);
            }
            elseif (!empty($cell_tblocacao_qtdDiarias['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_qtdDiarias['posx']);
            }
            elseif (!empty($cell_tblocacao_qtdDiarias['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_qtdDiarias['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_qtdDiarias['width'], 0, $cell_tblocacao_qtdDiarias['data'], 0, 0, $cell_tblocacao_qtdDiarias['align']);

            $this->Pdf->SetFont($cell_tblocacao_valorLiquidoLocacao['font_type'], $cell_tblocacao_valorLiquidoLocacao['font_style'], $cell_tblocacao_valorLiquidoLocacao['font_size']);
            $this->pdf_text_color($cell_tblocacao_valorLiquidoLocacao['data'], $cell_tblocacao_valorLiquidoLocacao['color_r'], $cell_tblocacao_valorLiquidoLocacao['color_g'], $cell_tblocacao_valorLiquidoLocacao['color_b']);
            if (!empty($cell_tblocacao_valorLiquidoLocacao['posx']) && !empty($cell_tblocacao_valorLiquidoLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_valorLiquidoLocacao['posx'], $cell_tblocacao_valorLiquidoLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_valorLiquidoLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_valorLiquidoLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_valorLiquidoLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_valorLiquidoLocacao['posy']);
            }
            $this->Pdf->Cell($cell_tblocacao_valorLiquidoLocacao['width'], 0, $cell_tblocacao_valorLiquidoLocacao['data'], 0, 0, $cell_tblocacao_valorLiquidoLocacao['align']);

            $this->Pdf->SetFont($cell_tbclientes_enderecoCliente['font_type'], $cell_tbclientes_enderecoCliente['font_style'], $cell_tbclientes_enderecoCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_enderecoCliente['data'], $cell_tbclientes_enderecoCliente['color_r'], $cell_tbclientes_enderecoCliente['color_g'], $cell_tbclientes_enderecoCliente['color_b']);
            if (!empty($cell_tbclientes_enderecoCliente['posx']) && !empty($cell_tbclientes_enderecoCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_enderecoCliente['posx'], $cell_tbclientes_enderecoCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_enderecoCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_enderecoCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_enderecoCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_enderecoCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_enderecoCliente['width'], 0, $cell_tbclientes_enderecoCliente['data'], 0, 0, $cell_tbclientes_enderecoCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_idFKestadoCliente['font_type'], $cell_tbclientes_idFKestadoCliente['font_style'], $cell_tbclientes_idFKestadoCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_idFKestadoCliente['data'], $cell_tbclientes_idFKestadoCliente['color_r'], $cell_tbclientes_idFKestadoCliente['color_g'], $cell_tbclientes_idFKestadoCliente['color_b']);
            if (!empty($cell_tbclientes_idFKestadoCliente['posx']) && !empty($cell_tbclientes_idFKestadoCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_idFKestadoCliente['posx'], $cell_tbclientes_idFKestadoCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_idFKestadoCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_idFKestadoCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_idFKestadoCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_idFKestadoCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_idFKestadoCliente['width'], 0, $cell_tbclientes_idFKestadoCliente['data'], 0, 0, $cell_tbclientes_idFKestadoCliente['align']);

            $this->Pdf->SetFont($cell_tbclientes_idFKcidadeCliente['font_type'], $cell_tbclientes_idFKcidadeCliente['font_style'], $cell_tbclientes_idFKcidadeCliente['font_size']);
            $this->pdf_text_color($cell_tbclientes_idFKcidadeCliente['data'], $cell_tbclientes_idFKcidadeCliente['color_r'], $cell_tbclientes_idFKcidadeCliente['color_g'], $cell_tbclientes_idFKcidadeCliente['color_b']);
            if (!empty($cell_tbclientes_idFKcidadeCliente['posx']) && !empty($cell_tbclientes_idFKcidadeCliente['posy']))
            {
                $this->Pdf->SetXY($cell_tbclientes_idFKcidadeCliente['posx'], $cell_tbclientes_idFKcidadeCliente['posy']);
            }
            elseif (!empty($cell_tbclientes_idFKcidadeCliente['posx']))
            {
                $this->Pdf->SetX($cell_tbclientes_idFKcidadeCliente['posx']);
            }
            elseif (!empty($cell_tbclientes_idFKcidadeCliente['posy']))
            {
                $this->Pdf->SetY($cell_tbclientes_idFKcidadeCliente['posy']);
            }
            $this->Pdf->Cell($cell_tbclientes_idFKcidadeCliente['width'], 0, $cell_tbclientes_idFKcidadeCliente['data'], 0, 0, $cell_tbclientes_idFKcidadeCliente['align']);

            $this->Pdf->SetFont($cell_tbveiculos_valorDiaria['font_type'], $cell_tbveiculos_valorDiaria['font_style'], $cell_tbveiculos_valorDiaria['font_size']);
            $this->pdf_text_color($cell_tbveiculos_valorDiaria['data'], $cell_tbveiculos_valorDiaria['color_r'], $cell_tbveiculos_valorDiaria['color_g'], $cell_tbveiculos_valorDiaria['color_b']);
            if (!empty($cell_tbveiculos_valorDiaria['posx']) && !empty($cell_tbveiculos_valorDiaria['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculos_valorDiaria['posx'], $cell_tbveiculos_valorDiaria['posy']);
            }
            elseif (!empty($cell_tbveiculos_valorDiaria['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculos_valorDiaria['posx']);
            }
            elseif (!empty($cell_tbveiculos_valorDiaria['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculos_valorDiaria['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculos_valorDiaria['width'], 0, $cell_tbveiculos_valorDiaria['data'], 0, 0, $cell_tbveiculos_valorDiaria['align']);

            $this->Pdf->SetFont($cell_tblocacao_obsLocacao['font_type'], $cell_tblocacao_obsLocacao['font_style'], $cell_tblocacao_obsLocacao['font_size']);
            $this->Pdf->SetTextColor($cell_tblocacao_obsLocacao['color_r'], $cell_tblocacao_obsLocacao['color_g'], $cell_tblocacao_obsLocacao['color_b']);
            if (!empty($cell_tblocacao_obsLocacao['posx']) && !empty($cell_tblocacao_obsLocacao['posy']))
            {
                $this->Pdf->SetXY($cell_tblocacao_obsLocacao['posx'], $cell_tblocacao_obsLocacao['posy']);
            }
            elseif (!empty($cell_tblocacao_obsLocacao['posx']))
            {
                $this->Pdf->SetX($cell_tblocacao_obsLocacao['posx']);
            }
            elseif (!empty($cell_tblocacao_obsLocacao['posy']))
            {
                $this->Pdf->SetY($cell_tblocacao_obsLocacao['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_tblocacao_obsLocacao['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(0.42333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_tblocacao_obsLocacao['width'], 0, trim($Lines), 0, 0, $cell_tblocacao_obsLocacao['align']);
                $Incre = true;
            }

            $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
            $NM_dt_sys = html_entity_decode($this->nm_data->FormataSaida('d @?#?@d@?#?@e M @?#?@d@?#?@e Y'), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
            $this->Pdf->SetFont($cell_data_atual['font_type'], $cell_data_atual['font_style'], $cell_data_atual['font_size']);
            $this->Pdf->SetTextColor($cell_data_atual['color_r'], $cell_data_atual['color_g'], $cell_data_atual['color_b']);
            if (!empty($cell_data_atual['posx']) && !empty($cell_data_atual['posy']))
            {
                $this->Pdf->SetXY($cell_data_atual['posx'], $cell_data_atual['posy']);
            }
            elseif (!empty($cell_data_atual['posx']))
            {
                $this->Pdf->SetX($cell_data_atual['posx']);
            }
            elseif (!empty($cell_data_atual['posy']))
            {
                $this->Pdf->SetY($cell_data_atual['posy']);
            }
            $this->Pdf->Cell($cell_data_atual['width'], 0, $NM_dt_sys, 0, 0, $cell_data_atual['align']);


            $this->Pdf->SetFont($cell_tbveiculo_chassi['font_type'], $cell_tbveiculo_chassi['font_style'], $cell_tbveiculo_chassi['font_size']);
            $this->pdf_text_color($cell_tbveiculo_chassi['data'], $cell_tbveiculo_chassi['color_r'], $cell_tbveiculo_chassi['color_g'], $cell_tbveiculo_chassi['color_b']);
            if (!empty($cell_tbveiculo_chassi['posx']) && !empty($cell_tbveiculo_chassi['posy']))
            {
                $this->Pdf->SetXY($cell_tbveiculo_chassi['posx'], $cell_tbveiculo_chassi['posy']);
            }
            elseif (!empty($cell_tbveiculo_chassi['posx']))
            {
                $this->Pdf->SetX($cell_tbveiculo_chassi['posx']);
            }
            elseif (!empty($cell_tbveiculo_chassi['posy']))
            {
                $this->Pdf->SetY($cell_tbveiculo_chassi['posy']);
            }
            $this->Pdf->Cell($cell_tbveiculo_chassi['width'], 0, $cell_tbveiculo_chassi['data'], 0, 0, $cell_tbveiculo_chassi['align']);

          
          
            $this->Pdf->AddPage();
            $this->Pdf_image();
            if (isset($contrato1['data']) && !empty($contrato1['data']) && is_file($contrato1['data']))
            {
                $this->Pdf->Image($contrato1['data'], $contrato1['posx'], $contrato1['posy'], 0, 0);
            }

            $this->Pdf->SetFont($nomeCliente['font_type'], $nomeCliente['font_style'], $nomeCliente['font_size']);
            $this->pdf_text_color($nomeCliente['data'], $nomeCliente['color_r'], $nomeCliente['color_g'], $nomeCliente['color_b']);
            if (!empty($nomeCliente['posx']) && !empty($nomeCliente['posy']))
            {
                $this->Pdf->SetXY($nomeCliente['posx'], $nomeCliente['posy']);
            }
            elseif (!empty($nomeCliente['posx']))
            {
                $this->Pdf->SetX($nomeCliente['posx']);
            }
            elseif (!empty($nomeCliente['posy']))
            {
                $this->Pdf->SetY($nomeCliente['posy']);
            }
            $this->Pdf->Cell($nomeCliente['width'], 0, $nomeCliente['data'], 0, 0, $nomeCliente['align']);

            $this->Pdf->SetFont($endereco['font_type'], $endereco['font_style'], $endereco['font_size']);
            $this->pdf_text_color($endereco['data'], $endereco['color_r'], $endereco['color_g'], $endereco['color_b']);
            if (!empty($endereco['posx']) && !empty($endereco['posy']))
            {
                $this->Pdf->SetXY($endereco['posx'], $endereco['posy']);
            }
            elseif (!empty($endereco['posx']))
            {
                $this->Pdf->SetX($endereco['posx']);
            }
            elseif (!empty($endereco['posy']))
            {
                $this->Pdf->SetY($endereco['posy']);
            }
            $this->Pdf->Cell($endereco['width'], 0, $endereco['data'], 0, 0, $endereco['align']);

            $this->Pdf->SetFont($cidade['font_type'], $cidade['font_style'], $cidade['font_size']);
            $this->pdf_text_color($cidade['data'], $cidade['color_r'], $cidade['color_g'], $cidade['color_b']);
            if (!empty($cidade['posx']) && !empty($cidade['posy']))
            {
                $this->Pdf->SetXY($cidade['posx'], $cidade['posy']);
            }
            elseif (!empty($cidade['posx']))
            {
                $this->Pdf->SetX($cidade['posx']);
            }
            elseif (!empty($cidade['posy']))
            {
                $this->Pdf->SetY($cidade['posy']);
            }
            $this->Pdf->Cell($cidade['width'], 0, $cidade['data'], 0, 0, $cidade['align']);

            $this->Pdf->SetFont($uf['font_type'], $uf['font_style'], $uf['font_size']);
            $this->pdf_text_color($uf['data'], $uf['color_r'], $uf['color_g'], $uf['color_b']);
            if (!empty($uf['posx']) && !empty($uf['posy']))
            {
                $this->Pdf->SetXY($uf['posx'], $uf['posy']);
            }
            elseif (!empty($uf['posx']))
            {
                $this->Pdf->SetX($uf['posx']);
            }
            elseif (!empty($uf['posy']))
            {
                $this->Pdf->SetY($uf['posy']);
            }
            $this->Pdf->Cell($uf['width'], 0, $uf['data'], 0, 0, $uf['align']);

            $this->Pdf->SetFont($cpf['font_type'], $cpf['font_style'], $cpf['font_size']);
            $this->pdf_text_color($cpf['data'], $cpf['color_r'], $cpf['color_g'], $cpf['color_b']);
            if (!empty($cpf['posx']) && !empty($cpf['posy']))
            {
                $this->Pdf->SetXY($cpf['posx'], $cpf['posy']);
            }
            elseif (!empty($cpf['posx']))
            {
                $this->Pdf->SetX($cpf['posx']);
            }
            elseif (!empty($cpf['posy']))
            {
                $this->Pdf->SetY($cpf['posy']);
            }
            $this->Pdf->Cell($cpf['width'], 0, $cpf['data'], 0, 0, $cpf['align']);

            $this->Pdf->SetFont($rg['font_type'], $rg['font_style'], $rg['font_size']);
            $this->pdf_text_color($rg['data'], $rg['color_r'], $rg['color_g'], $rg['color_b']);
            if (!empty($rg['posx']) && !empty($rg['posy']))
            {
                $this->Pdf->SetXY($rg['posx'], $rg['posy']);
            }
            elseif (!empty($rg['posx']))
            {
                $this->Pdf->SetX($rg['posx']);
            }
            elseif (!empty($rg['posy']))
            {
                $this->Pdf->SetY($rg['posy']);
            }
            $this->Pdf->Cell($rg['width'], 0, $rg['data'], 0, 0, $rg['align']);

            $this->Pdf->SetFont($orgao_exp['font_type'], $orgao_exp['font_style'], $orgao_exp['font_size']);
            $this->pdf_text_color($orgao_exp['data'], $orgao_exp['color_r'], $orgao_exp['color_g'], $orgao_exp['color_b']);
            if (!empty($orgao_exp['posx']) && !empty($orgao_exp['posy']))
            {
                $this->Pdf->SetXY($orgao_exp['posx'], $orgao_exp['posy']);
            }
            elseif (!empty($orgao_exp['posx']))
            {
                $this->Pdf->SetX($orgao_exp['posx']);
            }
            elseif (!empty($orgao_exp['posy']))
            {
                $this->Pdf->SetY($orgao_exp['posy']);
            }
            $this->Pdf->Cell($orgao_exp['width'], 0, $orgao_exp['data'], 0, 0, $orgao_exp['align']);

            $this->Pdf->SetFont($uf_rg['font_type'], $uf_rg['font_style'], $uf_rg['font_size']);
            $this->pdf_text_color($uf_rg['data'], $uf_rg['color_r'], $uf_rg['color_g'], $uf_rg['color_b']);
            if (!empty($uf_rg['posx']) && !empty($uf_rg['posy']))
            {
                $this->Pdf->SetXY($uf_rg['posx'], $uf_rg['posy']);
            }
            elseif (!empty($uf_rg['posx']))
            {
                $this->Pdf->SetX($uf_rg['posx']);
            }
            elseif (!empty($uf_rg['posy']))
            {
                $this->Pdf->SetY($uf_rg['posy']);
            }
            $this->Pdf->Cell($uf_rg['width'], 0, $uf_rg['data'], 0, 0, $uf_rg['align']);

          
          
            $this->Pdf->AddPage();
            $this->Pdf_image();
            if (isset($contrato2['data']) && !empty($contrato2['data']) && is_file($contrato2['data']))
            {
                $this->Pdf->Image($contrato2['data'], $contrato2['posx'], $contrato2['posy'], 0, 0);
            }

          
          
            $this->Pdf->AddPage();
            $this->Pdf_image();
            if (isset($contatro3['data']) && !empty($contatro3['data']) && is_file($contatro3['data']))
            {
                $this->Pdf->Image($contatro3['data'], $contatro3['posx'], $contatro3['posy'], 0, 0);
            }

            $this->Pdf->SetFont($nome_assinar['font_type'], $nome_assinar['font_style'], $nome_assinar['font_size']);
            $this->pdf_text_color($nome_assinar['data'], $nome_assinar['color_r'], $nome_assinar['color_g'], $nome_assinar['color_b']);
            if (!empty($nome_assinar['posx']) && !empty($nome_assinar['posy']))
            {
                $this->Pdf->SetXY($nome_assinar['posx'], $nome_assinar['posy']);
            }
            elseif (!empty($nome_assinar['posx']))
            {
                $this->Pdf->SetX($nome_assinar['posx']);
            }
            elseif (!empty($nome_assinar['posy']))
            {
                $this->Pdf->SetY($nome_assinar['posy']);
            }
            $this->Pdf->Cell($nome_assinar['width'], 0, $nome_assinar['data'], 0, 0, $nome_assinar['align']);

            $this->Pdf->SetFont($lajedo['font_type'], $lajedo['font_style'], $lajedo['font_size']);
            $this->pdf_text_color($lajedo['data'], $lajedo['color_r'], $lajedo['color_g'], $lajedo['color_b']);
            if (!empty($lajedo['posx']) && !empty($lajedo['posy']))
            {
                $this->Pdf->SetXY($lajedo['posx'], $lajedo['posy']);
            }
            elseif (!empty($lajedo['posx']))
            {
                $this->Pdf->SetX($lajedo['posx']);
            }
            elseif (!empty($lajedo['posy']))
            {
                $this->Pdf->SetY($lajedo['posy']);
            }
            $this->Pdf->Cell($lajedo['width'], 0, $lajedo['data'], 0, 0, $lajedo['align']);

            $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
            $NM_dt_sys = html_entity_decode($this->nm_data->FormataSaida('d @?#?@d@?#?@e M @?#?@d@?#?@e Y'), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
            $this->Pdf->SetFont($dataAtual['font_type'], $dataAtual['font_style'], $dataAtual['font_size']);
            $this->Pdf->SetTextColor($dataAtual['color_r'], $dataAtual['color_g'], $dataAtual['color_b']);
            if (!empty($dataAtual['posx']) && !empty($dataAtual['posy']))
            {
                $this->Pdf->SetXY($dataAtual['posx'], $dataAtual['posy']);
            }
            elseif (!empty($dataAtual['posx']))
            {
                $this->Pdf->SetX($dataAtual['posx']);
            }
            elseif (!empty($dataAtual['posy']))
            {
                $this->Pdf->SetY($dataAtual['posy']);
            }
            $this->Pdf->Cell($dataAtual['width'], 0, $NM_dt_sys, 0, 0, $dataAtual['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
}
?>
