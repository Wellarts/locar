<?php
//
class form_tbveiculos_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idveiculo;
   var $idfkmarcaveiculo;
   var $idfkmarcaveiculo_1;
   var $modeloveiculo;
   var $anoveiculo;
   var $placaveiculo;
   var $corveiculo;
   var $kmatualveiculo;
   var $valordiaria;
   var $proxtrocaoleoveiculo;
   var $proxtrocafiltroveiculo;
   var $avisotrocaoleoveiculo;
   var $avisotrocafiltroveiculo;
   var $chassiveiculo;
   var $datacompraveiculo;
   var $statusveiculo;
   var $statusveiculo_1;
   var $proxtrocacorreiaveiculo;
   var $proxtrocapastilhaveiculo;
   var $avisotrocacorreiaveiculo;
   var $avisotrocapastilhaveiculo;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['anoveiculo']))
          {
              $this->anoveiculo = $this->NM_ajax_info['param']['anoveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['avisotrocacorreiaveiculo']))
          {
              $this->avisotrocacorreiaveiculo = $this->NM_ajax_info['param']['avisotrocacorreiaveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['avisotrocafiltroveiculo']))
          {
              $this->avisotrocafiltroveiculo = $this->NM_ajax_info['param']['avisotrocafiltroveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['avisotrocaoleoveiculo']))
          {
              $this->avisotrocaoleoveiculo = $this->NM_ajax_info['param']['avisotrocaoleoveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['avisotrocapastilhaveiculo']))
          {
              $this->avisotrocapastilhaveiculo = $this->NM_ajax_info['param']['avisotrocapastilhaveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['chassiveiculo']))
          {
              $this->chassiveiculo = $this->NM_ajax_info['param']['chassiveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['corveiculo']))
          {
              $this->corveiculo = $this->NM_ajax_info['param']['corveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['datacompraveiculo']))
          {
              $this->datacompraveiculo = $this->NM_ajax_info['param']['datacompraveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['idfkmarcaveiculo']))
          {
              $this->idfkmarcaveiculo = $this->NM_ajax_info['param']['idfkmarcaveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['idveiculo']))
          {
              $this->idveiculo = $this->NM_ajax_info['param']['idveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['kmatualveiculo']))
          {
              $this->kmatualveiculo = $this->NM_ajax_info['param']['kmatualveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['modeloveiculo']))
          {
              $this->modeloveiculo = $this->NM_ajax_info['param']['modeloveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['placaveiculo']))
          {
              $this->placaveiculo = $this->NM_ajax_info['param']['placaveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['proxtrocacorreiaveiculo']))
          {
              $this->proxtrocacorreiaveiculo = $this->NM_ajax_info['param']['proxtrocacorreiaveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['proxtrocafiltroveiculo']))
          {
              $this->proxtrocafiltroveiculo = $this->NM_ajax_info['param']['proxtrocafiltroveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['proxtrocaoleoveiculo']))
          {
              $this->proxtrocaoleoveiculo = $this->NM_ajax_info['param']['proxtrocaoleoveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['proxtrocapastilhaveiculo']))
          {
              $this->proxtrocapastilhaveiculo = $this->NM_ajax_info['param']['proxtrocapastilhaveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['statusveiculo']))
          {
              $this->statusveiculo = $this->NM_ajax_info['param']['statusveiculo'];
          }
          if (isset($this->NM_ajax_info['param']['valordiaria']))
          {
              $this->valordiaria = $this->NM_ajax_info['param']['valordiaria'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbveiculos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbveiculos']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbveiculos']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_tbveiculos_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbveiculos_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbveiculos_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbveiculos_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbveiculos_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbveiculos_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbveiculos_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbveiculos_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbveiculos_mob']['label'] = "Cadastro de Veículos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbveiculos_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['statusveiculo'] = '' . $this->Ini->Nm_lang['lang_sec_users_fild_active'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_tbveiculos_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbveiculos_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbveiculos_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbveiculos_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_tbveiculos/form_tbveiculos_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbveiculos_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbveiculos_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbveiculos_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_tbveiculos/form_tbveiculos_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbveiculos_mob_erro.class.php"); 
      }
      $this->Erro      = new form_tbveiculos_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao']))
         { 
             if ($this->idveiculo != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbveiculos_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->idveiculo)) { $this->nm_limpa_alfa($this->idveiculo); }
      if (isset($this->idfkmarcaveiculo)) { $this->nm_limpa_alfa($this->idfkmarcaveiculo); }
      if (isset($this->modeloveiculo)) { $this->nm_limpa_alfa($this->modeloveiculo); }
      if (isset($this->anoveiculo)) { $this->nm_limpa_alfa($this->anoveiculo); }
      if (isset($this->placaveiculo)) { $this->nm_limpa_alfa($this->placaveiculo); }
      if (isset($this->corveiculo)) { $this->nm_limpa_alfa($this->corveiculo); }
      if (isset($this->kmatualveiculo)) { $this->nm_limpa_alfa($this->kmatualveiculo); }
      if (isset($this->valordiaria)) { $this->nm_limpa_alfa($this->valordiaria); }
      if (isset($this->proxtrocaoleoveiculo)) { $this->nm_limpa_alfa($this->proxtrocaoleoveiculo); }
      if (isset($this->proxtrocafiltroveiculo)) { $this->nm_limpa_alfa($this->proxtrocafiltroveiculo); }
      if (isset($this->avisotrocaoleoveiculo)) { $this->nm_limpa_alfa($this->avisotrocaoleoveiculo); }
      if (isset($this->avisotrocafiltroveiculo)) { $this->nm_limpa_alfa($this->avisotrocafiltroveiculo); }
      if (isset($this->chassiveiculo)) { $this->nm_limpa_alfa($this->chassiveiculo); }
      if (isset($this->statusveiculo)) { $this->nm_limpa_alfa($this->statusveiculo); }
      if (isset($this->proxtrocacorreiaveiculo)) { $this->nm_limpa_alfa($this->proxtrocacorreiaveiculo); }
      if (isset($this->proxtrocapastilhaveiculo)) { $this->nm_limpa_alfa($this->proxtrocapastilhaveiculo); }
      if (isset($this->avisotrocacorreiaveiculo)) { $this->nm_limpa_alfa($this->avisotrocacorreiaveiculo); }
      if (isset($this->avisotrocapastilhaveiculo)) { $this->nm_limpa_alfa($this->avisotrocapastilhaveiculo); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idveiculo
      $this->field_config['idveiculo']               = array();
      $this->field_config['idveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idveiculo']['symbol_dec'] = '';
      $this->field_config['idveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anoveiculo
      $this->field_config['anoveiculo']               = array();
      $this->field_config['anoveiculo']['symbol_grp'] = '';
      $this->field_config['anoveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anoveiculo']['symbol_dec'] = '';
      $this->field_config['anoveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anoveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valordiaria
      $this->field_config['valordiaria']               = array();
      $this->field_config['valordiaria']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valordiaria']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valordiaria']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valordiaria']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valordiaria']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valordiaria']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- datacompraveiculo
      $this->field_config['datacompraveiculo']                 = array();
      $this->field_config['datacompraveiculo']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['datacompraveiculo']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['datacompraveiculo']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'datacompraveiculo');
      //-- kmatualveiculo
      $this->field_config['kmatualveiculo']               = array();
      $this->field_config['kmatualveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['kmatualveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['kmatualveiculo']['symbol_dec'] = '';
      $this->field_config['kmatualveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['kmatualveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- proxtrocaoleoveiculo
      $this->field_config['proxtrocaoleoveiculo']               = array();
      $this->field_config['proxtrocaoleoveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['proxtrocaoleoveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['proxtrocaoleoveiculo']['symbol_dec'] = '';
      $this->field_config['proxtrocaoleoveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['proxtrocaoleoveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- proxtrocafiltroveiculo
      $this->field_config['proxtrocafiltroveiculo']               = array();
      $this->field_config['proxtrocafiltroveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['proxtrocafiltroveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['proxtrocafiltroveiculo']['symbol_dec'] = '';
      $this->field_config['proxtrocafiltroveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['proxtrocafiltroveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- avisotrocaoleoveiculo
      $this->field_config['avisotrocaoleoveiculo']               = array();
      $this->field_config['avisotrocaoleoveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['avisotrocaoleoveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['avisotrocaoleoveiculo']['symbol_dec'] = '';
      $this->field_config['avisotrocaoleoveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['avisotrocaoleoveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- avisotrocafiltroveiculo
      $this->field_config['avisotrocafiltroveiculo']               = array();
      $this->field_config['avisotrocafiltroveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['avisotrocafiltroveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['avisotrocafiltroveiculo']['symbol_dec'] = '';
      $this->field_config['avisotrocafiltroveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['avisotrocafiltroveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- proxtrocacorreiaveiculo
      $this->field_config['proxtrocacorreiaveiculo']               = array();
      $this->field_config['proxtrocacorreiaveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['proxtrocacorreiaveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['proxtrocacorreiaveiculo']['symbol_dec'] = '';
      $this->field_config['proxtrocacorreiaveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['proxtrocacorreiaveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- proxtrocapastilhaveiculo
      $this->field_config['proxtrocapastilhaveiculo']               = array();
      $this->field_config['proxtrocapastilhaveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['proxtrocapastilhaveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['proxtrocapastilhaveiculo']['symbol_dec'] = '';
      $this->field_config['proxtrocapastilhaveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['proxtrocapastilhaveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- avisotrocacorreiaveiculo
      $this->field_config['avisotrocacorreiaveiculo']               = array();
      $this->field_config['avisotrocacorreiaveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['avisotrocacorreiaveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['avisotrocacorreiaveiculo']['symbol_dec'] = '';
      $this->field_config['avisotrocacorreiaveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['avisotrocacorreiaveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- avisotrocapastilhaveiculo
      $this->field_config['avisotrocapastilhaveiculo']               = array();
      $this->field_config['avisotrocapastilhaveiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['avisotrocapastilhaveiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['avisotrocapastilhaveiculo']['symbol_dec'] = '';
      $this->field_config['avisotrocapastilhaveiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['avisotrocapastilhaveiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_idveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idveiculo');
          }
          if ('validate_idfkmarcaveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfkmarcaveiculo');
          }
          if ('validate_modeloveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'modeloveiculo');
          }
          if ('validate_anoveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anoveiculo');
          }
          if ('validate_placaveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'placaveiculo');
          }
          if ('validate_corveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'corveiculo');
          }
          if ('validate_valordiaria' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valordiaria');
          }
          if ('validate_datacompraveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'datacompraveiculo');
          }
          if ('validate_kmatualveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kmatualveiculo');
          }
          if ('validate_chassiveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'chassiveiculo');
          }
          if ('validate_proxtrocaoleoveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proxtrocaoleoveiculo');
          }
          if ('validate_proxtrocafiltroveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proxtrocafiltroveiculo');
          }
          if ('validate_avisotrocaoleoveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'avisotrocaoleoveiculo');
          }
          if ('validate_avisotrocafiltroveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'avisotrocafiltroveiculo');
          }
          if ('validate_proxtrocacorreiaveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proxtrocacorreiaveiculo');
          }
          if ('validate_proxtrocapastilhaveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proxtrocapastilhaveiculo');
          }
          if ('validate_avisotrocacorreiaveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'avisotrocacorreiaveiculo');
          }
          if ('validate_avisotrocapastilhaveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'avisotrocapastilhaveiculo');
          }
          if ('validate_statusveiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'statusveiculo');
          }
          form_tbveiculos_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->statusveiculo))
          {
              $x = 0; 
              $this->statusveiculo_1 = $this->statusveiculo;
              $this->statusveiculo = ""; 
              if ($this->statusveiculo_1 != "") 
              { 
                  foreach ($this->statusveiculo_1 as $dados_statusveiculo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->statusveiculo .= ";";
                      } 
                      $this->statusveiculo .= $dados_statusveiculo_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbveiculos_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_tbveiculos_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbveiculos_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbveiculos_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_tbveiculos_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_tbveiculos_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_tbveiculos_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_tbveiculos_mob_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'idveiculo':
               return "Código";
               break;
           case 'idfkmarcaveiculo':
               return "Marca";
               break;
           case 'modeloveiculo':
               return "Modelo";
               break;
           case 'anoveiculo':
               return "Ano";
               break;
           case 'placaveiculo':
               return "Placa";
               break;
           case 'corveiculo':
               return "Cor";
               break;
           case 'valordiaria':
               return "Valor da Diária";
               break;
           case 'datacompraveiculo':
               return "Data da Compra";
               break;
           case 'kmatualveiculo':
               return "Km Atual";
               break;
           case 'chassiveiculo':
               return "Chassi";
               break;
           case 'proxtrocaoleoveiculo':
               return "Km - Prox. Troca Óleo";
               break;
           case 'proxtrocafiltroveiculo':
               return "Km - Prox. Troca Filtro";
               break;
           case 'avisotrocaoleoveiculo':
               return "Km - Aviso Troca Óleo";
               break;
           case 'avisotrocafiltroveiculo':
               return "Km - Aviso Troca Filtro";
               break;
           case 'proxtrocacorreiaveiculo':
               return "Km - Prox. Troca Correia Dentada";
               break;
           case 'proxtrocapastilhaveiculo':
               return "Km - Prox. Troca Pastilha de Freio";
               break;
           case 'avisotrocacorreiaveiculo':
               return "Km - Aviso Troca Correia Dentada";
               break;
           case 'avisotrocapastilhaveiculo':
               return "Km - Aviso Troca Pastilha de Freio";
               break;
           case 'statusveiculo':
               return "" . $this->Ini->Nm_lang['lang_sec_users_fild_active'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbveiculos_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbveiculos_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbveiculos_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbveiculos_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'idveiculo' == $filtro)
        $this->ValidateField_idveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idfkmarcaveiculo' == $filtro)
        $this->ValidateField_idfkmarcaveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'modeloveiculo' == $filtro)
        $this->ValidateField_modeloveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'anoveiculo' == $filtro)
        $this->ValidateField_anoveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'placaveiculo' == $filtro)
        $this->ValidateField_placaveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'corveiculo' == $filtro)
        $this->ValidateField_corveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valordiaria' == $filtro)
        $this->ValidateField_valordiaria($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'datacompraveiculo' == $filtro)
        $this->ValidateField_datacompraveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kmatualveiculo' == $filtro)
        $this->ValidateField_kmatualveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'chassiveiculo' == $filtro)
        $this->ValidateField_chassiveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'proxtrocaoleoveiculo' == $filtro)
        $this->ValidateField_proxtrocaoleoveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'proxtrocafiltroveiculo' == $filtro)
        $this->ValidateField_proxtrocafiltroveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'avisotrocaoleoveiculo' == $filtro)
        $this->ValidateField_avisotrocaoleoveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'avisotrocafiltroveiculo' == $filtro)
        $this->ValidateField_avisotrocafiltroveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'proxtrocacorreiaveiculo' == $filtro)
        $this->ValidateField_proxtrocacorreiaveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'proxtrocapastilhaveiculo' == $filtro)
        $this->ValidateField_proxtrocapastilhaveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'avisotrocacorreiaveiculo' == $filtro)
        $this->ValidateField_avisotrocacorreiaveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'avisotrocapastilhaveiculo' == $filtro)
        $this->ValidateField_avisotrocapastilhaveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'statusveiculo' == $filtro)
        $this->ValidateField_statusveiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
      $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_idveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->idveiculo == "")  
      { 
          $this->idveiculo = 0;
      } 
      nm_limpa_numero($this->idveiculo, $this->field_config['idveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idveiculo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Código: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idveiculo']))
                  {
                      $Campos_Erros['idveiculo'] = array();
                  }
                  $Campos_Erros['idveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idveiculo']) || !is_array($this->NM_ajax_info['errList']['idveiculo']))
                  {
                      $this->NM_ajax_info['errList']['idveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['idveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idveiculo, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Código; " ; 
                  if (!isset($Campos_Erros['idveiculo']))
                  {
                      $Campos_Erros['idveiculo'] = array();
                  }
                  $Campos_Erros['idveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idveiculo']) || !is_array($this->NM_ajax_info['errList']['idveiculo']))
                  {
                      $this->NM_ajax_info['errList']['idveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['idveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_idveiculo

    function ValidateField_idfkmarcaveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->idfkmarcaveiculo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']) && !in_array($this->idfkmarcaveiculo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idfkmarcaveiculo']))
                   {
                       $Campos_Erros['idfkmarcaveiculo'] = array();
                   }
                   $Campos_Erros['idfkmarcaveiculo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idfkmarcaveiculo']) || !is_array($this->NM_ajax_info['errList']['idfkmarcaveiculo']))
                   {
                       $this->NM_ajax_info['errList']['idfkmarcaveiculo'] = array();
                   }
                   $this->NM_ajax_info['errList']['idfkmarcaveiculo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_idfkmarcaveiculo

    function ValidateField_modeloveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->modeloveiculo) > 50) 
          { 
              $Campos_Crit .= "Modelo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['modeloveiculo']))
              {
                  $Campos_Erros['modeloveiculo'] = array();
              }
              $Campos_Erros['modeloveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['modeloveiculo']) || !is_array($this->NM_ajax_info['errList']['modeloveiculo']))
              {
                  $this->NM_ajax_info['errList']['modeloveiculo'] = array();
              }
              $this->NM_ajax_info['errList']['modeloveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_modeloveiculo

    function ValidateField_anoveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->anoveiculo == "")  
      { 
          $this->anoveiculo = 0;
          $this->sc_force_zero[] = 'anoveiculo';
      } 
      nm_limpa_numero($this->anoveiculo, $this->field_config['anoveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anoveiculo != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->anoveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Ano: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anoveiculo']))
                  {
                      $Campos_Erros['anoveiculo'] = array();
                  }
                  $Campos_Erros['anoveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anoveiculo']) || !is_array($this->NM_ajax_info['errList']['anoveiculo']))
                  {
                      $this->NM_ajax_info['errList']['anoveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['anoveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anoveiculo, 5, 0, -0, 99999, "N") == false)  
              { 
                  $Campos_Crit .= "Ano; " ; 
                  if (!isset($Campos_Erros['anoveiculo']))
                  {
                      $Campos_Erros['anoveiculo'] = array();
                  }
                  $Campos_Erros['anoveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anoveiculo']) || !is_array($this->NM_ajax_info['errList']['anoveiculo']))
                  {
                      $this->NM_ajax_info['errList']['anoveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['anoveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_anoveiculo

    function ValidateField_placaveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->placaveiculo, "aaa-9*999", "(){}[].,;:-+/ "); 
      $this->placaveiculo = sc_strtoupper($this->placaveiculo); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->placaveiculo) > 10) 
          { 
              $Campos_Crit .= "Placa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['placaveiculo']))
              {
                  $Campos_Erros['placaveiculo'] = array();
              }
              $Campos_Erros['placaveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['placaveiculo']) || !is_array($this->NM_ajax_info['errList']['placaveiculo']))
              {
                  $this->NM_ajax_info['errList']['placaveiculo'] = array();
              }
              $this->NM_ajax_info['errList']['placaveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_placaveiculo

    function ValidateField_corveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->corveiculo) > 20) 
          { 
              $Campos_Crit .= "Cor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['corveiculo']))
              {
                  $Campos_Erros['corveiculo'] = array();
              }
              $Campos_Erros['corveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['corveiculo']) || !is_array($this->NM_ajax_info['errList']['corveiculo']))
              {
                  $this->NM_ajax_info['errList']['corveiculo'] = array();
              }
              $this->NM_ajax_info['errList']['corveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_corveiculo

    function ValidateField_valordiaria(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valordiaria == "")  
      { 
          $this->valordiaria = 0;
          $this->sc_force_zero[] = 'valordiaria';
      } 
      if (!empty($this->field_config['valordiaria']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valordiaria, $this->field_config['valordiaria']['symbol_dec'], $this->field_config['valordiaria']['symbol_grp'], $this->field_config['valordiaria']['symbol_mon']); 
          nm_limpa_valor($this->valordiaria, $this->field_config['valordiaria']['symbol_dec'], $this->field_config['valordiaria']['symbol_grp']) ; 
          if ('.' == substr($this->valordiaria, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valordiaria, 1)))
              {
                  $this->valordiaria = '';
              }
              else
              {
                  $this->valordiaria = '0' . $this->valordiaria;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valordiaria != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->valordiaria) > $iTestSize)  
              { 
                  $Campos_Crit .= "Valor da Diária: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valordiaria']))
                  {
                      $Campos_Erros['valordiaria'] = array();
                  }
                  $Campos_Erros['valordiaria'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valordiaria']) || !is_array($this->NM_ajax_info['errList']['valordiaria']))
                  {
                      $this->NM_ajax_info['errList']['valordiaria'] = array();
                  }
                  $this->NM_ajax_info['errList']['valordiaria'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valordiaria, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Valor da Diária; " ; 
                  if (!isset($Campos_Erros['valordiaria']))
                  {
                      $Campos_Erros['valordiaria'] = array();
                  }
                  $Campos_Erros['valordiaria'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valordiaria']) || !is_array($this->NM_ajax_info['errList']['valordiaria']))
                  {
                      $this->NM_ajax_info['errList']['valordiaria'] = array();
                  }
                  $this->NM_ajax_info['errList']['valordiaria'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valordiaria

    function ValidateField_datacompraveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->datacompraveiculo, $this->field_config['datacompraveiculo']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['datacompraveiculo']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['datacompraveiculo']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['datacompraveiculo']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['datacompraveiculo']['date_sep']) ; 
          if (trim($this->datacompraveiculo) != "")  
          { 
              if ($teste_validade->Data($this->datacompraveiculo, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data da Compra; " ; 
                  if (!isset($Campos_Erros['datacompraveiculo']))
                  {
                      $Campos_Erros['datacompraveiculo'] = array();
                  }
                  $Campos_Erros['datacompraveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['datacompraveiculo']) || !is_array($this->NM_ajax_info['errList']['datacompraveiculo']))
                  {
                      $this->NM_ajax_info['errList']['datacompraveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['datacompraveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['datacompraveiculo']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_datacompraveiculo

    function ValidateField_kmatualveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->kmatualveiculo == "")  
      { 
          $this->kmatualveiculo = 0;
          $this->sc_force_zero[] = 'kmatualveiculo';
      } 
      nm_limpa_numero($this->kmatualveiculo, $this->field_config['kmatualveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->kmatualveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->kmatualveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km Atual: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['kmatualveiculo']))
                  {
                      $Campos_Erros['kmatualveiculo'] = array();
                  }
                  $Campos_Erros['kmatualveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['kmatualveiculo']) || !is_array($this->NM_ajax_info['errList']['kmatualveiculo']))
                  {
                      $this->NM_ajax_info['errList']['kmatualveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['kmatualveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->kmatualveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km Atual; " ; 
                  if (!isset($Campos_Erros['kmatualveiculo']))
                  {
                      $Campos_Erros['kmatualveiculo'] = array();
                  }
                  $Campos_Erros['kmatualveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['kmatualveiculo']) || !is_array($this->NM_ajax_info['errList']['kmatualveiculo']))
                  {
                      $this->NM_ajax_info['errList']['kmatualveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['kmatualveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_kmatualveiculo

    function ValidateField_chassiveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->chassiveiculo = sc_strtoupper($this->chassiveiculo); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->chassiveiculo) > 100) 
          { 
              $Campos_Crit .= "Chassi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['chassiveiculo']))
              {
                  $Campos_Erros['chassiveiculo'] = array();
              }
              $Campos_Erros['chassiveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['chassiveiculo']) || !is_array($this->NM_ajax_info['errList']['chassiveiculo']))
              {
                  $this->NM_ajax_info['errList']['chassiveiculo'] = array();
              }
              $this->NM_ajax_info['errList']['chassiveiculo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_chassiveiculo

    function ValidateField_proxtrocaoleoveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->proxtrocaoleoveiculo == "")  
      { 
          $this->proxtrocaoleoveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocaoleoveiculo';
      } 
      nm_limpa_numero($this->proxtrocaoleoveiculo, $this->field_config['proxtrocaoleoveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->proxtrocaoleoveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->proxtrocaoleoveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Óleo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['proxtrocaoleoveiculo']))
                  {
                      $Campos_Erros['proxtrocaoleoveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocaoleoveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['proxtrocaoleoveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocaoleoveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocaoleoveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocaoleoveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->proxtrocaoleoveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Óleo; " ; 
                  if (!isset($Campos_Erros['proxtrocaoleoveiculo']))
                  {
                      $Campos_Erros['proxtrocaoleoveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocaoleoveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['proxtrocaoleoveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocaoleoveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocaoleoveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocaoleoveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_proxtrocaoleoveiculo

    function ValidateField_proxtrocafiltroveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->proxtrocafiltroveiculo == "")  
      { 
          $this->proxtrocafiltroveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocafiltroveiculo';
      } 
      nm_limpa_numero($this->proxtrocafiltroveiculo, $this->field_config['proxtrocafiltroveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->proxtrocafiltroveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->proxtrocafiltroveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Filtro: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['proxtrocafiltroveiculo']))
                  {
                      $Campos_Erros['proxtrocafiltroveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocafiltroveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['proxtrocafiltroveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocafiltroveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocafiltroveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocafiltroveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->proxtrocafiltroveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Filtro; " ; 
                  if (!isset($Campos_Erros['proxtrocafiltroveiculo']))
                  {
                      $Campos_Erros['proxtrocafiltroveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocafiltroveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['proxtrocafiltroveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocafiltroveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocafiltroveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocafiltroveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_proxtrocafiltroveiculo

    function ValidateField_avisotrocaoleoveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->avisotrocaoleoveiculo == "")  
      { 
          $this->avisotrocaoleoveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocaoleoveiculo';
      } 
      nm_limpa_numero($this->avisotrocaoleoveiculo, $this->field_config['avisotrocaoleoveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->avisotrocaoleoveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->avisotrocaoleoveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Óleo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['avisotrocaoleoveiculo']))
                  {
                      $Campos_Erros['avisotrocaoleoveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocaoleoveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['avisotrocaoleoveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocaoleoveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocaoleoveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocaoleoveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->avisotrocaoleoveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Óleo; " ; 
                  if (!isset($Campos_Erros['avisotrocaoleoveiculo']))
                  {
                      $Campos_Erros['avisotrocaoleoveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocaoleoveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['avisotrocaoleoveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocaoleoveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocaoleoveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocaoleoveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_avisotrocaoleoveiculo

    function ValidateField_avisotrocafiltroveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->avisotrocafiltroveiculo == "")  
      { 
          $this->avisotrocafiltroveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocafiltroveiculo';
      } 
      nm_limpa_numero($this->avisotrocafiltroveiculo, $this->field_config['avisotrocafiltroveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->avisotrocafiltroveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->avisotrocafiltroveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Filtro: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['avisotrocafiltroveiculo']))
                  {
                      $Campos_Erros['avisotrocafiltroveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocafiltroveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['avisotrocafiltroveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocafiltroveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocafiltroveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocafiltroveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->avisotrocafiltroveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Filtro; " ; 
                  if (!isset($Campos_Erros['avisotrocafiltroveiculo']))
                  {
                      $Campos_Erros['avisotrocafiltroveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocafiltroveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['avisotrocafiltroveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocafiltroveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocafiltroveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocafiltroveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_avisotrocafiltroveiculo

    function ValidateField_proxtrocacorreiaveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->proxtrocacorreiaveiculo == "")  
      { 
          $this->proxtrocacorreiaveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocacorreiaveiculo';
      } 
      nm_limpa_numero($this->proxtrocacorreiaveiculo, $this->field_config['proxtrocacorreiaveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->proxtrocacorreiaveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->proxtrocacorreiaveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Correia Dentada: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['proxtrocacorreiaveiculo']))
                  {
                      $Campos_Erros['proxtrocacorreiaveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocacorreiaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['proxtrocacorreiaveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocacorreiaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocacorreiaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocacorreiaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->proxtrocacorreiaveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Correia Dentada; " ; 
                  if (!isset($Campos_Erros['proxtrocacorreiaveiculo']))
                  {
                      $Campos_Erros['proxtrocacorreiaveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocacorreiaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['proxtrocacorreiaveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocacorreiaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocacorreiaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocacorreiaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_proxtrocacorreiaveiculo

    function ValidateField_proxtrocapastilhaveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->proxtrocapastilhaveiculo == "")  
      { 
          $this->proxtrocapastilhaveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocapastilhaveiculo';
      } 
      nm_limpa_numero($this->proxtrocapastilhaveiculo, $this->field_config['proxtrocapastilhaveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->proxtrocapastilhaveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->proxtrocapastilhaveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Pastilha de Freio: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['proxtrocapastilhaveiculo']))
                  {
                      $Campos_Erros['proxtrocapastilhaveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocapastilhaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['proxtrocapastilhaveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocapastilhaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocapastilhaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocapastilhaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->proxtrocapastilhaveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Prox. Troca Pastilha de Freio; " ; 
                  if (!isset($Campos_Erros['proxtrocapastilhaveiculo']))
                  {
                      $Campos_Erros['proxtrocapastilhaveiculo'] = array();
                  }
                  $Campos_Erros['proxtrocapastilhaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['proxtrocapastilhaveiculo']) || !is_array($this->NM_ajax_info['errList']['proxtrocapastilhaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['proxtrocapastilhaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['proxtrocapastilhaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_proxtrocapastilhaveiculo

    function ValidateField_avisotrocacorreiaveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->avisotrocacorreiaveiculo == "")  
      { 
          $this->avisotrocacorreiaveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocacorreiaveiculo';
      } 
      nm_limpa_numero($this->avisotrocacorreiaveiculo, $this->field_config['avisotrocacorreiaveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->avisotrocacorreiaveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->avisotrocacorreiaveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Correia Dentada: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['avisotrocacorreiaveiculo']))
                  {
                      $Campos_Erros['avisotrocacorreiaveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocacorreiaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['avisotrocacorreiaveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocacorreiaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocacorreiaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocacorreiaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->avisotrocacorreiaveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Correia Dentada; " ; 
                  if (!isset($Campos_Erros['avisotrocacorreiaveiculo']))
                  {
                      $Campos_Erros['avisotrocacorreiaveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocacorreiaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['avisotrocacorreiaveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocacorreiaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocacorreiaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocacorreiaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_avisotrocacorreiaveiculo

    function ValidateField_avisotrocapastilhaveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->avisotrocapastilhaveiculo == "")  
      { 
          $this->avisotrocapastilhaveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocapastilhaveiculo';
      } 
      nm_limpa_numero($this->avisotrocapastilhaveiculo, $this->field_config['avisotrocapastilhaveiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->avisotrocapastilhaveiculo != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->avisotrocapastilhaveiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Pastilha de Freio: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['avisotrocapastilhaveiculo']))
                  {
                      $Campos_Erros['avisotrocapastilhaveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocapastilhaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['avisotrocapastilhaveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocapastilhaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocapastilhaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocapastilhaveiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->avisotrocapastilhaveiculo, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Km - Aviso Troca Pastilha de Freio; " ; 
                  if (!isset($Campos_Erros['avisotrocapastilhaveiculo']))
                  {
                      $Campos_Erros['avisotrocapastilhaveiculo'] = array();
                  }
                  $Campos_Erros['avisotrocapastilhaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['avisotrocapastilhaveiculo']) || !is_array($this->NM_ajax_info['errList']['avisotrocapastilhaveiculo']))
                  {
                      $this->NM_ajax_info['errList']['avisotrocapastilhaveiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['avisotrocapastilhaveiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_avisotrocapastilhaveiculo

    function ValidateField_statusveiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->statusveiculo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->statusveiculo))
          {
              $x = 0; 
              $this->statusveiculo_1 = array(); 
              foreach ($this->statusveiculo as $ind => $dados_statusveiculo_1 ) 
              {
                  if ($dados_statusveiculo_1 !== "") 
                  {
                      $this->statusveiculo_1[] = $dados_statusveiculo_1;
                  } 
              } 
              $this->statusveiculo = ""; 
              foreach ($this->statusveiculo_1 as $dados_statusveiculo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->statusveiculo .= ";";
                   } 
                   $this->statusveiculo .= $dados_statusveiculo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->statusveiculo == "")  
      { 
          $this->statusveiculo = 0;
          $this->sc_force_zero[] = 'statusveiculo';
      } 
    } // ValidateField_statusveiculo

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['idveiculo'] = $this->idveiculo;
    $this->nmgp_dados_form['idfkmarcaveiculo'] = $this->idfkmarcaveiculo;
    $this->nmgp_dados_form['modeloveiculo'] = $this->modeloveiculo;
    $this->nmgp_dados_form['anoveiculo'] = $this->anoveiculo;
    $this->nmgp_dados_form['placaveiculo'] = $this->placaveiculo;
    $this->nmgp_dados_form['corveiculo'] = $this->corveiculo;
    $this->nmgp_dados_form['valordiaria'] = $this->valordiaria;
    $this->nmgp_dados_form['datacompraveiculo'] = $this->datacompraveiculo;
    $this->nmgp_dados_form['kmatualveiculo'] = $this->kmatualveiculo;
    $this->nmgp_dados_form['chassiveiculo'] = $this->chassiveiculo;
    $this->nmgp_dados_form['proxtrocaoleoveiculo'] = $this->proxtrocaoleoveiculo;
    $this->nmgp_dados_form['proxtrocafiltroveiculo'] = $this->proxtrocafiltroveiculo;
    $this->nmgp_dados_form['avisotrocaoleoveiculo'] = $this->avisotrocaoleoveiculo;
    $this->nmgp_dados_form['avisotrocafiltroveiculo'] = $this->avisotrocafiltroveiculo;
    $this->nmgp_dados_form['proxtrocacorreiaveiculo'] = $this->proxtrocacorreiaveiculo;
    $this->nmgp_dados_form['proxtrocapastilhaveiculo'] = $this->proxtrocapastilhaveiculo;
    $this->nmgp_dados_form['avisotrocacorreiaveiculo'] = $this->avisotrocacorreiaveiculo;
    $this->nmgp_dados_form['avisotrocapastilhaveiculo'] = $this->avisotrocapastilhaveiculo;
    $this->nmgp_dados_form['statusveiculo'] = $this->statusveiculo;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->idveiculo, $this->field_config['idveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->anoveiculo, $this->field_config['anoveiculo']['symbol_grp']) ; 
      $this->nm_tira_mask($this->placaveiculo, "aaa-9*999", "(){}[].,;:-+/ "); 
      if (!empty($this->field_config['valordiaria']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valordiaria, $this->field_config['valordiaria']['symbol_dec'], $this->field_config['valordiaria']['symbol_grp'], $this->field_config['valordiaria']['symbol_mon']);
         nm_limpa_valor($this->valordiaria, $this->field_config['valordiaria']['symbol_dec'], $this->field_config['valordiaria']['symbol_grp']);
      }
      nm_limpa_data($this->datacompraveiculo, $this->field_config['datacompraveiculo']['date_sep']) ; 
      nm_limpa_numero($this->kmatualveiculo, $this->field_config['kmatualveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->proxtrocaoleoveiculo, $this->field_config['proxtrocaoleoveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->proxtrocafiltroveiculo, $this->field_config['proxtrocafiltroveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->avisotrocaoleoveiculo, $this->field_config['avisotrocaoleoveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->avisotrocafiltroveiculo, $this->field_config['avisotrocafiltroveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->proxtrocacorreiaveiculo, $this->field_config['proxtrocacorreiaveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->proxtrocapastilhaveiculo, $this->field_config['proxtrocapastilhaveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->avisotrocacorreiaveiculo, $this->field_config['avisotrocacorreiaveiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->avisotrocapastilhaveiculo, $this->field_config['avisotrocapastilhaveiculo']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "idveiculo")
      {
          nm_limpa_numero($this->idveiculo, $this->field_config['idveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anoveiculo")
      {
          nm_limpa_numero($this->anoveiculo, $this->field_config['anoveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "placaveiculo")
      {
          $this->nm_tira_mask($this->placaveiculo, "aaa-9*999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "valordiaria")
      {
          if (!empty($this->field_config['valordiaria']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valordiaria, $this->field_config['valordiaria']['symbol_dec'], $this->field_config['valordiaria']['symbol_grp'], $this->field_config['valordiaria']['symbol_mon']);
             nm_limpa_valor($this->valordiaria, $this->field_config['valordiaria']['symbol_dec'], $this->field_config['valordiaria']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "kmatualveiculo")
      {
          nm_limpa_numero($this->kmatualveiculo, $this->field_config['kmatualveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "proxtrocaoleoveiculo")
      {
          nm_limpa_numero($this->proxtrocaoleoveiculo, $this->field_config['proxtrocaoleoveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "proxtrocafiltroveiculo")
      {
          nm_limpa_numero($this->proxtrocafiltroveiculo, $this->field_config['proxtrocafiltroveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "avisotrocaoleoveiculo")
      {
          nm_limpa_numero($this->avisotrocaoleoveiculo, $this->field_config['avisotrocaoleoveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "avisotrocafiltroveiculo")
      {
          nm_limpa_numero($this->avisotrocafiltroveiculo, $this->field_config['avisotrocafiltroveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "proxtrocacorreiaveiculo")
      {
          nm_limpa_numero($this->proxtrocacorreiaveiculo, $this->field_config['proxtrocacorreiaveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "proxtrocapastilhaveiculo")
      {
          nm_limpa_numero($this->proxtrocapastilhaveiculo, $this->field_config['proxtrocapastilhaveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "avisotrocacorreiaveiculo")
      {
          nm_limpa_numero($this->avisotrocacorreiaveiculo, $this->field_config['avisotrocacorreiaveiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "avisotrocapastilhaveiculo")
      {
          nm_limpa_numero($this->avisotrocapastilhaveiculo, $this->field_config['avisotrocapastilhaveiculo']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->idveiculo) || (!empty($format_fields) && isset($format_fields['idveiculo'])))
      {
          nmgp_Form_Num_Val($this->idveiculo, $this->field_config['idveiculo']['symbol_grp'], $this->field_config['idveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['idveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->anoveiculo) || (!empty($format_fields) && isset($format_fields['anoveiculo'])))
      {
          nmgp_Form_Num_Val($this->anoveiculo, $this->field_config['anoveiculo']['symbol_grp'], $this->field_config['anoveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['anoveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->placaveiculo) || (!empty($format_fields) && isset($format_fields['placaveiculo'])))
      {
          $this->nm_gera_mask($this->placaveiculo, "aaa-9*999"); 
      }
      if (!empty($this->valordiaria) || (!empty($format_fields) && isset($format_fields['valordiaria'])))
      {
          nmgp_Form_Num_Val($this->valordiaria, $this->field_config['valordiaria']['symbol_grp'], $this->field_config['valordiaria']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['valordiaria']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valordiaria']['symbol_mon'];
          $this->sc_add_currency($this->valordiaria, $sMonSymb, $this->field_config['valordiaria']['format_pos']); 
      }
      if ((!empty($this->datacompraveiculo) && 'null' != $this->datacompraveiculo) || (!empty($format_fields) && isset($format_fields['datacompraveiculo'])))
      {
          nm_volta_data($this->datacompraveiculo, $this->field_config['datacompraveiculo']['date_format']) ; 
          nmgp_Form_Datas($this->datacompraveiculo, $this->field_config['datacompraveiculo']['date_format'], $this->field_config['datacompraveiculo']['date_sep']) ;  
      }
      elseif ('null' == $this->datacompraveiculo || '' == $this->datacompraveiculo)
      {
          $this->datacompraveiculo = '';
      }
      if (!empty($this->kmatualveiculo) || (!empty($format_fields) && isset($format_fields['kmatualveiculo'])))
      {
          nmgp_Form_Num_Val($this->kmatualveiculo, $this->field_config['kmatualveiculo']['symbol_grp'], $this->field_config['kmatualveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['kmatualveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->proxtrocaoleoveiculo) || (!empty($format_fields) && isset($format_fields['proxtrocaoleoveiculo'])))
      {
          nmgp_Form_Num_Val($this->proxtrocaoleoveiculo, $this->field_config['proxtrocaoleoveiculo']['symbol_grp'], $this->field_config['proxtrocaoleoveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['proxtrocaoleoveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->proxtrocafiltroveiculo) || (!empty($format_fields) && isset($format_fields['proxtrocafiltroveiculo'])))
      {
          nmgp_Form_Num_Val($this->proxtrocafiltroveiculo, $this->field_config['proxtrocafiltroveiculo']['symbol_grp'], $this->field_config['proxtrocafiltroveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['proxtrocafiltroveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->avisotrocaoleoveiculo) || (!empty($format_fields) && isset($format_fields['avisotrocaoleoveiculo'])))
      {
          nmgp_Form_Num_Val($this->avisotrocaoleoveiculo, $this->field_config['avisotrocaoleoveiculo']['symbol_grp'], $this->field_config['avisotrocaoleoveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['avisotrocaoleoveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->avisotrocafiltroveiculo) || (!empty($format_fields) && isset($format_fields['avisotrocafiltroveiculo'])))
      {
          nmgp_Form_Num_Val($this->avisotrocafiltroveiculo, $this->field_config['avisotrocafiltroveiculo']['symbol_grp'], $this->field_config['avisotrocafiltroveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['avisotrocafiltroveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->proxtrocacorreiaveiculo) || (!empty($format_fields) && isset($format_fields['proxtrocacorreiaveiculo'])))
      {
          nmgp_Form_Num_Val($this->proxtrocacorreiaveiculo, $this->field_config['proxtrocacorreiaveiculo']['symbol_grp'], $this->field_config['proxtrocacorreiaveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['proxtrocacorreiaveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->proxtrocapastilhaveiculo) || (!empty($format_fields) && isset($format_fields['proxtrocapastilhaveiculo'])))
      {
          nmgp_Form_Num_Val($this->proxtrocapastilhaveiculo, $this->field_config['proxtrocapastilhaveiculo']['symbol_grp'], $this->field_config['proxtrocapastilhaveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['proxtrocapastilhaveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->avisotrocacorreiaveiculo) || (!empty($format_fields) && isset($format_fields['avisotrocacorreiaveiculo'])))
      {
          nmgp_Form_Num_Val($this->avisotrocacorreiaveiculo, $this->field_config['avisotrocacorreiaveiculo']['symbol_grp'], $this->field_config['avisotrocacorreiaveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['avisotrocacorreiaveiculo']['symbol_fmt']) ; 
      }
      if (!empty($this->avisotrocapastilhaveiculo) || (!empty($format_fields) && isset($format_fields['avisotrocapastilhaveiculo'])))
      {
          nmgp_Form_Num_Val($this->avisotrocapastilhaveiculo, $this->field_config['avisotrocapastilhaveiculo']['symbol_grp'], $this->field_config['avisotrocapastilhaveiculo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['avisotrocapastilhaveiculo']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['datacompraveiculo']['date_format'];
      if ($this->datacompraveiculo != "")  
      { 
          nm_conv_data($this->datacompraveiculo, $this->field_config['datacompraveiculo']['date_format']) ; 
          $this->datacompraveiculo_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->datacompraveiculo_hora = substr($this->datacompraveiculo_hora, 0, -4);
          }
      } 
      if ($this->datacompraveiculo == "" && $use_null)  
      { 
          $this->datacompraveiculo = "null" ; 
      } 
      $this->field_config['datacompraveiculo']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_idveiculo();
          $this->ajax_return_values_idfkmarcaveiculo();
          $this->ajax_return_values_modeloveiculo();
          $this->ajax_return_values_anoveiculo();
          $this->ajax_return_values_placaveiculo();
          $this->ajax_return_values_corveiculo();
          $this->ajax_return_values_valordiaria();
          $this->ajax_return_values_datacompraveiculo();
          $this->ajax_return_values_kmatualveiculo();
          $this->ajax_return_values_chassiveiculo();
          $this->ajax_return_values_proxtrocaoleoveiculo();
          $this->ajax_return_values_proxtrocafiltroveiculo();
          $this->ajax_return_values_avisotrocaoleoveiculo();
          $this->ajax_return_values_avisotrocafiltroveiculo();
          $this->ajax_return_values_proxtrocacorreiaveiculo();
          $this->ajax_return_values_proxtrocapastilhaveiculo();
          $this->ajax_return_values_avisotrocacorreiaveiculo();
          $this->ajax_return_values_avisotrocapastilhaveiculo();
          $this->ajax_return_values_statusveiculo();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idveiculo']['keyVal'] = form_tbveiculos_mob_pack_protect_string($this->nmgp_dados_form['idveiculo']);
          }
   } // ajax_return_values

          //----- idveiculo
   function ajax_return_values_idveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idveiculo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idfkmarcaveiculo
   function ajax_return_values_idfkmarcaveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfkmarcaveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfkmarcaveiculo);
              $aLookup = array();
              $this->_tmp_lookup_idfkmarcaveiculo = $this->idfkmarcaveiculo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idveiculo = $this->idveiculo;
   $old_value_anoveiculo = $this->anoveiculo;
   $old_value_placaveiculo = $this->placaveiculo;
   $old_value_valordiaria = $this->valordiaria;
   $old_value_datacompraveiculo = $this->datacompraveiculo;
   $old_value_kmatualveiculo = $this->kmatualveiculo;
   $old_value_proxtrocaoleoveiculo = $this->proxtrocaoleoveiculo;
   $old_value_proxtrocafiltroveiculo = $this->proxtrocafiltroveiculo;
   $old_value_avisotrocaoleoveiculo = $this->avisotrocaoleoveiculo;
   $old_value_avisotrocafiltroveiculo = $this->avisotrocafiltroveiculo;
   $old_value_proxtrocacorreiaveiculo = $this->proxtrocacorreiaveiculo;
   $old_value_proxtrocapastilhaveiculo = $this->proxtrocapastilhaveiculo;
   $old_value_avisotrocacorreiaveiculo = $this->avisotrocacorreiaveiculo;
   $old_value_avisotrocapastilhaveiculo = $this->avisotrocapastilhaveiculo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idveiculo = $this->idveiculo;
   $unformatted_value_anoveiculo = $this->anoveiculo;
   $unformatted_value_placaveiculo = $this->placaveiculo;
   $unformatted_value_valordiaria = $this->valordiaria;
   $unformatted_value_datacompraveiculo = $this->datacompraveiculo;
   $unformatted_value_kmatualveiculo = $this->kmatualveiculo;
   $unformatted_value_proxtrocaoleoveiculo = $this->proxtrocaoleoveiculo;
   $unformatted_value_proxtrocafiltroveiculo = $this->proxtrocafiltroveiculo;
   $unformatted_value_avisotrocaoleoveiculo = $this->avisotrocaoleoveiculo;
   $unformatted_value_avisotrocafiltroveiculo = $this->avisotrocafiltroveiculo;
   $unformatted_value_proxtrocacorreiaveiculo = $this->proxtrocacorreiaveiculo;
   $unformatted_value_proxtrocapastilhaveiculo = $this->proxtrocapastilhaveiculo;
   $unformatted_value_avisotrocacorreiaveiculo = $this->avisotrocacorreiaveiculo;
   $unformatted_value_avisotrocapastilhaveiculo = $this->avisotrocapastilhaveiculo;

   $nm_comando = "SELECT idMarca, nomeMarca 
FROM tbmarcas 
ORDER BY nomeMarca";

   $this->idveiculo = $old_value_idveiculo;
   $this->anoveiculo = $old_value_anoveiculo;
   $this->placaveiculo = $old_value_placaveiculo;
   $this->valordiaria = $old_value_valordiaria;
   $this->datacompraveiculo = $old_value_datacompraveiculo;
   $this->kmatualveiculo = $old_value_kmatualveiculo;
   $this->proxtrocaoleoveiculo = $old_value_proxtrocaoleoveiculo;
   $this->proxtrocafiltroveiculo = $old_value_proxtrocafiltroveiculo;
   $this->avisotrocaoleoveiculo = $old_value_avisotrocaoleoveiculo;
   $this->avisotrocafiltroveiculo = $old_value_avisotrocafiltroveiculo;
   $this->proxtrocacorreiaveiculo = $old_value_proxtrocacorreiaveiculo;
   $this->proxtrocapastilhaveiculo = $old_value_proxtrocapastilhaveiculo;
   $this->avisotrocacorreiaveiculo = $old_value_avisotrocacorreiaveiculo;
   $this->avisotrocapastilhaveiculo = $old_value_avisotrocapastilhaveiculo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_tbveiculos_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_tbveiculos_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"idfkmarcaveiculo\"";
          if (isset($this->NM_ajax_info['select_html']['idfkmarcaveiculo']) && !empty($this->NM_ajax_info['select_html']['idfkmarcaveiculo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idfkmarcaveiculo'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->idfkmarcaveiculo == $sValue)
                  {
                      $this->_tmp_lookup_idfkmarcaveiculo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idfkmarcaveiculo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idfkmarcaveiculo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idfkmarcaveiculo']['valList'][$i] = form_tbveiculos_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idfkmarcaveiculo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idfkmarcaveiculo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idfkmarcaveiculo']['labList'] = $aLabel;
          }
   }

          //----- modeloveiculo
   function ajax_return_values_modeloveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("modeloveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->modeloveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['modeloveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- anoveiculo
   function ajax_return_values_anoveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anoveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anoveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anoveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- placaveiculo
   function ajax_return_values_placaveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("placaveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->placaveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['placaveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- corveiculo
   function ajax_return_values_corveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("corveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->corveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['corveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valordiaria
   function ajax_return_values_valordiaria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valordiaria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valordiaria);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valordiaria'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- datacompraveiculo
   function ajax_return_values_datacompraveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("datacompraveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->datacompraveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['datacompraveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- kmatualveiculo
   function ajax_return_values_kmatualveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kmatualveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kmatualveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kmatualveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- chassiveiculo
   function ajax_return_values_chassiveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("chassiveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->chassiveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['chassiveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- proxtrocaoleoveiculo
   function ajax_return_values_proxtrocaoleoveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proxtrocaoleoveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proxtrocaoleoveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['proxtrocaoleoveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- proxtrocafiltroveiculo
   function ajax_return_values_proxtrocafiltroveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proxtrocafiltroveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proxtrocafiltroveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['proxtrocafiltroveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- avisotrocaoleoveiculo
   function ajax_return_values_avisotrocaoleoveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("avisotrocaoleoveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->avisotrocaoleoveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['avisotrocaoleoveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- avisotrocafiltroveiculo
   function ajax_return_values_avisotrocafiltroveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("avisotrocafiltroveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->avisotrocafiltroveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['avisotrocafiltroveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- proxtrocacorreiaveiculo
   function ajax_return_values_proxtrocacorreiaveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proxtrocacorreiaveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proxtrocacorreiaveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['proxtrocacorreiaveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- proxtrocapastilhaveiculo
   function ajax_return_values_proxtrocapastilhaveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proxtrocapastilhaveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proxtrocapastilhaveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['proxtrocapastilhaveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- avisotrocacorreiaveiculo
   function ajax_return_values_avisotrocacorreiaveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("avisotrocacorreiaveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->avisotrocacorreiaveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['avisotrocacorreiaveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- avisotrocapastilhaveiculo
   function ajax_return_values_avisotrocapastilhaveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("avisotrocapastilhaveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->avisotrocapastilhaveiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['avisotrocapastilhaveiculo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- statusveiculo
   function ajax_return_values_statusveiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("statusveiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->statusveiculo);
              $aLookup = array();
              $this->_tmp_lookup_statusveiculo = $this->statusveiculo;

$aLookup[] = array(form_tbveiculos_mob_pack_protect_string('1') => form_tbveiculos_mob_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_statusveiculo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['statusveiculo']) && !empty($this->NM_ajax_info['select_html']['statusveiculo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['statusveiculo'];
          }
          $this->NM_ajax_info['fldList']['statusveiculo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-statusveiculo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['statusveiculo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['statusveiculo']['valList'][$i] = form_tbveiculos_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['statusveiculo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['statusveiculo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['statusveiculo']['labList'] = $aLabel;
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->valordiaria = str_replace($sc_parm1, $sc_parm2, $this->valordiaria); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valordiaria = "'" . $this->valordiaria . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valordiaria = str_replace("'", "", $this->valordiaria); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbveiculos_mob']['contr_erro'] = 'on';
             /* tbcustosVeiculos */
      $sc_cmd_dependency = "SELECT COUNT(*) FROM tbcustosVeiculos WHERE idFKveiculoCustoVeiculo = " . $this->idveiculo ;
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tbcustosVeiculos = array();
      $this->dataset_tbcustosveiculos = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tbcustosVeiculos[$y] [$x] = $rx->fields[$x];
                      $this->dataset_tbcustosveiculos[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tbcustosVeiculos = false;
          $this->dataset_tbcustosVeiculos_erro = $this->Db->ErrorMsg();
          $this->dataset_tbcustosveiculos = false;
          $this->dataset_tbcustosveiculos_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tbcustosVeiculos[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_tbveiculos_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tblocacao */
      $sc_cmd_dependency = "SELECT COUNT(*) FROM tblocacao WHERE idFKveiculoLocacao = " . $this->idveiculo ;
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tblocacao = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tblocacao[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tblocacao = false;
          $this->dataset_tblocacao_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tblocacao[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_tbveiculos_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tbmultasAvarias */
      $sc_cmd_dependency = "SELECT COUNT(*) FROM tbmultasAvarias WHERE idFKveiculoMultasAvarias = " . $this->idveiculo ;
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tbmultasAvarias = array();
      $this->dataset_tbmultasavarias = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tbmultasAvarias[$y] [$x] = $rx->fields[$x];
                      $this->dataset_tbmultasavarias[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tbmultasAvarias = false;
          $this->dataset_tbmultasAvarias_erro = $this->Db->ErrorMsg();
          $this->dataset_tbmultasavarias = false;
          $this->dataset_tbmultasavarias_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tbmultasAvarias[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_tbveiculos_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_tbveiculos_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['idveiculo'] = $this->idveiculo;
      $NM_val_form['idfkmarcaveiculo'] = $this->idfkmarcaveiculo;
      $NM_val_form['modeloveiculo'] = $this->modeloveiculo;
      $NM_val_form['anoveiculo'] = $this->anoveiculo;
      $NM_val_form['placaveiculo'] = $this->placaveiculo;
      $NM_val_form['corveiculo'] = $this->corveiculo;
      $NM_val_form['valordiaria'] = $this->valordiaria;
      $NM_val_form['datacompraveiculo'] = $this->datacompraveiculo;
      $NM_val_form['kmatualveiculo'] = $this->kmatualveiculo;
      $NM_val_form['chassiveiculo'] = $this->chassiveiculo;
      $NM_val_form['proxtrocaoleoveiculo'] = $this->proxtrocaoleoveiculo;
      $NM_val_form['proxtrocafiltroveiculo'] = $this->proxtrocafiltroveiculo;
      $NM_val_form['avisotrocaoleoveiculo'] = $this->avisotrocaoleoveiculo;
      $NM_val_form['avisotrocafiltroveiculo'] = $this->avisotrocafiltroveiculo;
      $NM_val_form['proxtrocacorreiaveiculo'] = $this->proxtrocacorreiaveiculo;
      $NM_val_form['proxtrocapastilhaveiculo'] = $this->proxtrocapastilhaveiculo;
      $NM_val_form['avisotrocacorreiaveiculo'] = $this->avisotrocacorreiaveiculo;
      $NM_val_form['avisotrocapastilhaveiculo'] = $this->avisotrocapastilhaveiculo;
      $NM_val_form['statusveiculo'] = $this->statusveiculo;
      if ($this->idveiculo == "")  
      { 
          $this->idveiculo = 0;
      } 
      if ($this->idfkmarcaveiculo == "")  
      { 
          $this->idfkmarcaveiculo = 0;
          $this->sc_force_zero[] = 'idfkmarcaveiculo';
      } 
      if ($this->anoveiculo == "")  
      { 
          $this->anoveiculo = 0;
          $this->sc_force_zero[] = 'anoveiculo';
      } 
      if ($this->kmatualveiculo == "")  
      { 
          $this->kmatualveiculo = 0;
          $this->sc_force_zero[] = 'kmatualveiculo';
      } 
      if ($this->valordiaria == "")  
      { 
          $this->valordiaria = 0;
          $this->sc_force_zero[] = 'valordiaria';
      } 
      if ($this->proxtrocaoleoveiculo == "")  
      { 
          $this->proxtrocaoleoveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocaoleoveiculo';
      } 
      if ($this->proxtrocafiltroveiculo == "")  
      { 
          $this->proxtrocafiltroveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocafiltroveiculo';
      } 
      if ($this->avisotrocaoleoveiculo == "")  
      { 
          $this->avisotrocaoleoveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocaoleoveiculo';
      } 
      if ($this->avisotrocafiltroveiculo == "")  
      { 
          $this->avisotrocafiltroveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocafiltroveiculo';
      } 
      if ($this->statusveiculo == "")  
      { 
          $this->statusveiculo = 0;
          $this->sc_force_zero[] = 'statusveiculo';
      } 
      if ($this->proxtrocacorreiaveiculo == "")  
      { 
          $this->proxtrocacorreiaveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocacorreiaveiculo';
      } 
      if ($this->proxtrocapastilhaveiculo == "")  
      { 
          $this->proxtrocapastilhaveiculo = 0;
          $this->sc_force_zero[] = 'proxtrocapastilhaveiculo';
      } 
      if ($this->avisotrocacorreiaveiculo == "")  
      { 
          $this->avisotrocacorreiaveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocacorreiaveiculo';
      } 
      if ($this->avisotrocapastilhaveiculo == "")  
      { 
          $this->avisotrocapastilhaveiculo = 0;
          $this->sc_force_zero[] = 'avisotrocapastilhaveiculo';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->modeloveiculo_before_qstr = $this->modeloveiculo;
          $this->modeloveiculo = substr($this->Db->qstr($this->modeloveiculo), 1, -1); 
          $this->placaveiculo_before_qstr = $this->placaveiculo;
          $this->placaveiculo = substr($this->Db->qstr($this->placaveiculo), 1, -1); 
          $this->corveiculo_before_qstr = $this->corveiculo;
          $this->corveiculo = substr($this->Db->qstr($this->corveiculo), 1, -1); 
          $this->chassiveiculo_before_qstr = $this->chassiveiculo;
          $this->chassiveiculo = substr($this->Db->qstr($this->chassiveiculo), 1, -1); 
          if ($this->datacompraveiculo == "")  
          { 
              $this->datacompraveiculo = "null"; 
              $NM_val_null[] = "datacompraveiculo";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idVeiculo = $this->idveiculo ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idVeiculo = $this->idveiculo "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbveiculos_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET idFKmarcaVeiculo = $this->idfkmarcaveiculo, modeloVeiculo = '$this->modeloveiculo', anoVeiculo = $this->anoveiculo, placaVeiculo = '$this->placaveiculo', corVeiculo = '$this->corveiculo', kmAtualVeiculo = $this->kmatualveiculo, valorDiaria = $this->valordiaria, proxTrocaOleoVeiculo = $this->proxtrocaoleoveiculo, proxTrocaFiltroVeiculo = $this->proxtrocafiltroveiculo, avisoTrocaOleoVeiculo = $this->avisotrocaoleoveiculo, avisoTrocaFiltroVeiculo = $this->avisotrocafiltroveiculo, chassiVeiculo = '$this->chassiveiculo', dataCompraVeiculo = " . $this->Ini->date_delim . $this->datacompraveiculo . $this->Ini->date_delim1 . ", statusVeiculo = $this->statusveiculo, proxTrocaCorreiaVeiculo = $this->proxtrocacorreiaveiculo, proxTrocaPastilhaVeiculo = $this->proxtrocapastilhaveiculo, avisoTrocaCorreiaVeiculo = $this->avisotrocacorreiaveiculo, avisoTrocaPastilhaVeiculo = $this->avisotrocapastilhaveiculo";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET idFKmarcaVeiculo = $this->idfkmarcaveiculo, modeloVeiculo = '$this->modeloveiculo', anoVeiculo = $this->anoveiculo, placaVeiculo = '$this->placaveiculo', corVeiculo = '$this->corveiculo', kmAtualVeiculo = $this->kmatualveiculo, valorDiaria = $this->valordiaria, proxTrocaOleoVeiculo = $this->proxtrocaoleoveiculo, proxTrocaFiltroVeiculo = $this->proxtrocafiltroveiculo, avisoTrocaOleoVeiculo = $this->avisotrocaoleoveiculo, avisoTrocaFiltroVeiculo = $this->avisotrocafiltroveiculo, chassiVeiculo = '$this->chassiveiculo', dataCompraVeiculo = " . $this->Ini->date_delim . $this->datacompraveiculo . $this->Ini->date_delim1 . ", statusVeiculo = $this->statusveiculo, proxTrocaCorreiaVeiculo = $this->proxtrocacorreiaveiculo, proxTrocaPastilhaVeiculo = $this->proxtrocapastilhaveiculo, avisoTrocaCorreiaVeiculo = $this->avisotrocacorreiaveiculo, avisoTrocaPastilhaVeiculo = $this->avisotrocapastilhaveiculo";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE idVeiculo = $this->idveiculo ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_tbveiculos_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->modeloveiculo = $this->modeloveiculo_before_qstr;
          $this->placaveiculo = $this->placaveiculo_before_qstr;
          $this->corveiculo = $this->corveiculo_before_qstr;
          $this->chassiveiculo = $this->chassiveiculo_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idveiculo'])) { $this->idveiculo = $NM_val_form['idveiculo']; }
              elseif (isset($this->idveiculo)) { $this->nm_limpa_alfa($this->idveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfkmarcaveiculo'])) { $this->idfkmarcaveiculo = $NM_val_form['idfkmarcaveiculo']; }
              elseif (isset($this->idfkmarcaveiculo)) { $this->nm_limpa_alfa($this->idfkmarcaveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['modeloveiculo'])) { $this->modeloveiculo = $NM_val_form['modeloveiculo']; }
              elseif (isset($this->modeloveiculo)) { $this->nm_limpa_alfa($this->modeloveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['anoveiculo'])) { $this->anoveiculo = $NM_val_form['anoveiculo']; }
              elseif (isset($this->anoveiculo)) { $this->nm_limpa_alfa($this->anoveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['placaveiculo'])) { $this->placaveiculo = $NM_val_form['placaveiculo']; }
              elseif (isset($this->placaveiculo)) { $this->nm_limpa_alfa($this->placaveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['corveiculo'])) { $this->corveiculo = $NM_val_form['corveiculo']; }
              elseif (isset($this->corveiculo)) { $this->nm_limpa_alfa($this->corveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['kmatualveiculo'])) { $this->kmatualveiculo = $NM_val_form['kmatualveiculo']; }
              elseif (isset($this->kmatualveiculo)) { $this->nm_limpa_alfa($this->kmatualveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['valordiaria'])) { $this->valordiaria = $NM_val_form['valordiaria']; }
              elseif (isset($this->valordiaria)) { $this->nm_limpa_alfa($this->valordiaria); }
              if     (isset($NM_val_form) && isset($NM_val_form['proxtrocaoleoveiculo'])) { $this->proxtrocaoleoveiculo = $NM_val_form['proxtrocaoleoveiculo']; }
              elseif (isset($this->proxtrocaoleoveiculo)) { $this->nm_limpa_alfa($this->proxtrocaoleoveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['proxtrocafiltroveiculo'])) { $this->proxtrocafiltroveiculo = $NM_val_form['proxtrocafiltroveiculo']; }
              elseif (isset($this->proxtrocafiltroveiculo)) { $this->nm_limpa_alfa($this->proxtrocafiltroveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['avisotrocaoleoveiculo'])) { $this->avisotrocaoleoveiculo = $NM_val_form['avisotrocaoleoveiculo']; }
              elseif (isset($this->avisotrocaoleoveiculo)) { $this->nm_limpa_alfa($this->avisotrocaoleoveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['avisotrocafiltroveiculo'])) { $this->avisotrocafiltroveiculo = $NM_val_form['avisotrocafiltroveiculo']; }
              elseif (isset($this->avisotrocafiltroveiculo)) { $this->nm_limpa_alfa($this->avisotrocafiltroveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['chassiveiculo'])) { $this->chassiveiculo = $NM_val_form['chassiveiculo']; }
              elseif (isset($this->chassiveiculo)) { $this->nm_limpa_alfa($this->chassiveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['statusveiculo'])) { $this->statusveiculo = $NM_val_form['statusveiculo']; }
              elseif (isset($this->statusveiculo)) { $this->nm_limpa_alfa($this->statusveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['proxtrocacorreiaveiculo'])) { $this->proxtrocacorreiaveiculo = $NM_val_form['proxtrocacorreiaveiculo']; }
              elseif (isset($this->proxtrocacorreiaveiculo)) { $this->nm_limpa_alfa($this->proxtrocacorreiaveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['proxtrocapastilhaveiculo'])) { $this->proxtrocapastilhaveiculo = $NM_val_form['proxtrocapastilhaveiculo']; }
              elseif (isset($this->proxtrocapastilhaveiculo)) { $this->nm_limpa_alfa($this->proxtrocapastilhaveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['avisotrocacorreiaveiculo'])) { $this->avisotrocacorreiaveiculo = $NM_val_form['avisotrocacorreiaveiculo']; }
              elseif (isset($this->avisotrocacorreiaveiculo)) { $this->nm_limpa_alfa($this->avisotrocacorreiaveiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['avisotrocapastilhaveiculo'])) { $this->avisotrocapastilhaveiculo = $NM_val_form['avisotrocapastilhaveiculo']; }
              elseif (isset($this->avisotrocapastilhaveiculo)) { $this->nm_limpa_alfa($this->avisotrocapastilhaveiculo); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idveiculo', 'idfkmarcaveiculo', 'modeloveiculo', 'anoveiculo', 'placaveiculo', 'corveiculo', 'valordiaria', 'datacompraveiculo', 'kmatualveiculo', 'chassiveiculo', 'proxtrocaoleoveiculo', 'proxtrocafiltroveiculo', 'avisotrocaoleoveiculo', 'avisotrocafiltroveiculo', 'proxtrocacorreiaveiculo', 'proxtrocapastilhaveiculo', 'avisotrocacorreiaveiculo', 'avisotrocapastilhaveiculo', 'statusveiculo'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idVeiculo, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbveiculos_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idFKmarcaVeiculo, modeloVeiculo, anoVeiculo, placaVeiculo, corVeiculo, kmAtualVeiculo, valorDiaria, proxTrocaOleoVeiculo, proxTrocaFiltroVeiculo, avisoTrocaOleoVeiculo, avisoTrocaFiltroVeiculo, chassiVeiculo, dataCompraVeiculo, statusVeiculo, proxTrocaCorreiaVeiculo, proxTrocaPastilhaVeiculo, avisoTrocaCorreiaVeiculo, avisoTrocaPastilhaVeiculo) VALUES (" . $NM_seq_auto . "$this->idfkmarcaveiculo, '$this->modeloveiculo', $this->anoveiculo, '$this->placaveiculo', '$this->corveiculo', $this->kmatualveiculo, $this->valordiaria, $this->proxtrocaoleoveiculo, $this->proxtrocafiltroveiculo, $this->avisotrocaoleoveiculo, $this->avisotrocafiltroveiculo, '$this->chassiveiculo', " . $this->Ini->date_delim . $this->datacompraveiculo . $this->Ini->date_delim1 . ", $this->statusveiculo, $this->proxtrocacorreiaveiculo, $this->proxtrocapastilhaveiculo, $this->avisotrocacorreiaveiculo, $this->avisotrocapastilhaveiculo)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idFKmarcaVeiculo, modeloVeiculo, anoVeiculo, placaVeiculo, corVeiculo, kmAtualVeiculo, valorDiaria, proxTrocaOleoVeiculo, proxTrocaFiltroVeiculo, avisoTrocaOleoVeiculo, avisoTrocaFiltroVeiculo, chassiVeiculo, dataCompraVeiculo, statusVeiculo, proxTrocaCorreiaVeiculo, proxTrocaPastilhaVeiculo, avisoTrocaCorreiaVeiculo, avisoTrocaPastilhaVeiculo) VALUES (" . $NM_seq_auto . "$this->idfkmarcaveiculo, '$this->modeloveiculo', $this->anoveiculo, '$this->placaveiculo', '$this->corveiculo', $this->kmatualveiculo, $this->valordiaria, $this->proxtrocaoleoveiculo, $this->proxtrocafiltroveiculo, $this->avisotrocaoleoveiculo, $this->avisotrocafiltroveiculo, '$this->chassiveiculo', " . $this->Ini->date_delim . $this->datacompraveiculo . $this->Ini->date_delim1 . ", $this->statusveiculo, $this->proxtrocacorreiaveiculo, $this->proxtrocapastilhaveiculo, $this->avisotrocacorreiaveiculo, $this->avisotrocapastilhaveiculo)"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_tbveiculos_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idveiculo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idveiculo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idveiculo = substr($this->Db->qstr($this->idveiculo), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idVeiculo = $this->idveiculo"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idVeiculo = $this->idveiculo "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idVeiculo = $this->idveiculo "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idVeiculo = $this->idveiculo "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbveiculos_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['parms'] = "idveiculo?#?$this->idveiculo?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idveiculo = substr($this->Db->qstr($this->idveiculo), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idveiculo)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->idveiculo) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbveiculos_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total'] = $qt_geral_reg_form_tbveiculos_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idveiculo))
          {
              $Key_Where = "idVeiculo < $this->idveiculo "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbveiculos_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] > $qt_geral_reg_form_tbveiculos_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = $qt_geral_reg_form_tbveiculos_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = $qt_geral_reg_form_tbveiculos_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['parms'] = ""; 
          $nmgp_select = "SELECT idVeiculo, idFKmarcaVeiculo, modeloVeiculo, anoVeiculo, placaVeiculo, corVeiculo, kmAtualVeiculo, valorDiaria, proxTrocaOleoVeiculo, proxTrocaFiltroVeiculo, avisoTrocaOleoVeiculo, avisoTrocaFiltroVeiculo, chassiVeiculo, dataCompraVeiculo, statusVeiculo, proxTrocaCorreiaVeiculo, proxTrocaPastilhaVeiculo, avisoTrocaCorreiaVeiculo, avisoTrocaPastilhaVeiculo from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "idVeiculo = $this->idveiculo"; 
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idVeiculo";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idveiculo = $rs->fields[0] ; 
              $this->nmgp_dados_select['idveiculo'] = $this->idveiculo;
              $this->idfkmarcaveiculo = $rs->fields[1] ; 
              $this->nmgp_dados_select['idfkmarcaveiculo'] = $this->idfkmarcaveiculo;
              $this->modeloveiculo = $rs->fields[2] ; 
              $this->nmgp_dados_select['modeloveiculo'] = $this->modeloveiculo;
              $this->anoveiculo = $rs->fields[3] ; 
              $this->nmgp_dados_select['anoveiculo'] = $this->anoveiculo;
              $this->placaveiculo = $rs->fields[4] ; 
              $this->nmgp_dados_select['placaveiculo'] = $this->placaveiculo;
              $this->corveiculo = $rs->fields[5] ; 
              $this->nmgp_dados_select['corveiculo'] = $this->corveiculo;
              $this->kmatualveiculo = $rs->fields[6] ; 
              $this->nmgp_dados_select['kmatualveiculo'] = $this->kmatualveiculo;
              $this->valordiaria = $rs->fields[7] ; 
              $this->nmgp_dados_select['valordiaria'] = $this->valordiaria;
              $this->proxtrocaoleoveiculo = $rs->fields[8] ; 
              $this->nmgp_dados_select['proxtrocaoleoveiculo'] = $this->proxtrocaoleoveiculo;
              $this->proxtrocafiltroveiculo = $rs->fields[9] ; 
              $this->nmgp_dados_select['proxtrocafiltroveiculo'] = $this->proxtrocafiltroveiculo;
              $this->avisotrocaoleoveiculo = $rs->fields[10] ; 
              $this->nmgp_dados_select['avisotrocaoleoveiculo'] = $this->avisotrocaoleoveiculo;
              $this->avisotrocafiltroveiculo = $rs->fields[11] ; 
              $this->nmgp_dados_select['avisotrocafiltroveiculo'] = $this->avisotrocafiltroveiculo;
              $this->chassiveiculo = $rs->fields[12] ; 
              $this->nmgp_dados_select['chassiveiculo'] = $this->chassiveiculo;
              $this->datacompraveiculo = $rs->fields[13] ; 
              $this->nmgp_dados_select['datacompraveiculo'] = $this->datacompraveiculo;
              $this->statusveiculo = $rs->fields[14] ; 
              $this->nmgp_dados_select['statusveiculo'] = $this->statusveiculo;
              $this->proxtrocacorreiaveiculo = $rs->fields[15] ; 
              $this->nmgp_dados_select['proxtrocacorreiaveiculo'] = $this->proxtrocacorreiaveiculo;
              $this->proxtrocapastilhaveiculo = $rs->fields[16] ; 
              $this->nmgp_dados_select['proxtrocapastilhaveiculo'] = $this->proxtrocapastilhaveiculo;
              $this->avisotrocacorreiaveiculo = $rs->fields[17] ; 
              $this->nmgp_dados_select['avisotrocacorreiaveiculo'] = $this->avisotrocacorreiaveiculo;
              $this->avisotrocapastilhaveiculo = $rs->fields[18] ; 
              $this->nmgp_dados_select['avisotrocapastilhaveiculo'] = $this->avisotrocapastilhaveiculo;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idveiculo = (string)$this->idveiculo; 
              $this->idfkmarcaveiculo = (string)$this->idfkmarcaveiculo; 
              $this->anoveiculo = (string)$this->anoveiculo; 
              $this->kmatualveiculo = (string)$this->kmatualveiculo; 
              $this->valordiaria = (string)$this->valordiaria; 
              $this->proxtrocaoleoveiculo = (string)$this->proxtrocaoleoveiculo; 
              $this->proxtrocafiltroveiculo = (string)$this->proxtrocafiltroveiculo; 
              $this->avisotrocaoleoveiculo = (string)$this->avisotrocaoleoveiculo; 
              $this->avisotrocafiltroveiculo = (string)$this->avisotrocafiltroveiculo; 
              $this->statusveiculo = (string)$this->statusveiculo; 
              $this->proxtrocacorreiaveiculo = (string)$this->proxtrocacorreiaveiculo; 
              $this->proxtrocapastilhaveiculo = (string)$this->proxtrocapastilhaveiculo; 
              $this->avisotrocacorreiaveiculo = (string)$this->avisotrocacorreiaveiculo; 
              $this->avisotrocapastilhaveiculo = (string)$this->avisotrocapastilhaveiculo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['parms'] = "idveiculo?#?$this->idveiculo?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] < $qt_geral_reg_form_tbveiculos_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idveiculo = "";  
              $this->idfkmarcaveiculo = "";  
              $this->modeloveiculo = "";  
              $this->anoveiculo = "";  
              $this->placaveiculo = "";  
              $this->corveiculo = "";  
              $this->kmatualveiculo = "";  
              $this->valordiaria = "";  
              $this->proxtrocaoleoveiculo = "";  
              $this->proxtrocafiltroveiculo = "";  
              $this->avisotrocaoleoveiculo = "";  
              $this->avisotrocafiltroveiculo = "";  
              $this->chassiveiculo = "";  
              $this->datacompraveiculo = "";  
              $this->datacompraveiculo_hora = "" ;  
              $this->statusveiculo = "1";  
              $this->proxtrocacorreiaveiculo = "";  
              $this->proxtrocapastilhaveiculo = "";  
              $this->avisotrocacorreiaveiculo = "";  
              $this->avisotrocapastilhaveiculo = "";  
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select'];
                  $this->idfkmarcaveiculo = $this->nmgp_dados_select['idfkmarcaveiculo'];  
                  $this->modeloveiculo = $this->nmgp_dados_select['modeloveiculo'];  
                  $this->anoveiculo = $this->nmgp_dados_select['anoveiculo'];  
                  $this->placaveiculo = $this->nmgp_dados_select['placaveiculo'];  
                  $this->corveiculo = $this->nmgp_dados_select['corveiculo'];  
                  $this->kmatualveiculo = $this->nmgp_dados_select['kmatualveiculo'];  
                  $this->valordiaria = $this->nmgp_dados_select['valordiaria'];  
                  $this->proxtrocaoleoveiculo = $this->nmgp_dados_select['proxtrocaoleoveiculo'];  
                  $this->proxtrocafiltroveiculo = $this->nmgp_dados_select['proxtrocafiltroveiculo'];  
                  $this->avisotrocaoleoveiculo = $this->nmgp_dados_select['avisotrocaoleoveiculo'];  
                  $this->avisotrocafiltroveiculo = $this->nmgp_dados_select['avisotrocafiltroveiculo'];  
                  $this->chassiveiculo = $this->nmgp_dados_select['chassiveiculo'];  
                  $this->datacompraveiculo = $this->nmgp_dados_select['datacompraveiculo'];  
                  $this->statusveiculo = $this->nmgp_dados_select['statusveiculo'];  
                  $this->proxtrocacorreiaveiculo = $this->nmgp_dados_select['proxtrocacorreiaveiculo'];  
                  $this->proxtrocapastilhaveiculo = $this->nmgp_dados_select['proxtrocapastilhaveiculo'];  
                  $this->avisotrocacorreiaveiculo = $this->nmgp_dados_select['avisotrocacorreiaveiculo'];  
                  $this->avisotrocapastilhaveiculo = $this->nmgp_dados_select['avisotrocapastilhaveiculo'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idVeiculo) from " . $this->Ini->nm_tabela . " where idVeiculo < $this->idveiculo" . $str_where_filter; 
     $rs = $this->Db->Execute("select max(idVeiculo) from " . $this->Ini->nm_tabela . " where idVeiculo < $this->idveiculo" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idveiculo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idVeiculo) from " . $this->Ini->nm_tabela . " where idVeiculo > $this->idveiculo" . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idVeiculo) from " . $this->Ini->nm_tabela . " where idVeiculo > $this->idveiculo" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idveiculo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idVeiculo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idVeiculo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idveiculo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idVeiculo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idVeiculo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idveiculo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['idveiculo'] =  $this->idveiculo;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['dados_select'];
           $this->SC_log_arr['fields']['idFKmarcaVeiculo']['0'] =  $nmgp_dados_select['idfkmarcaveiculo'];
           $this->SC_log_arr['fields']['modeloVeiculo']['0'] =  $nmgp_dados_select['modeloveiculo'];
           $this->SC_log_arr['fields']['anoVeiculo']['0'] =  $nmgp_dados_select['anoveiculo'];
           $this->SC_log_arr['fields']['placaVeiculo']['0'] =  $nmgp_dados_select['placaveiculo'];
           $this->SC_log_arr['fields']['corVeiculo']['0'] =  $nmgp_dados_select['corveiculo'];
           $this->SC_log_arr['fields']['kmAtualVeiculo']['0'] =  $nmgp_dados_select['kmatualveiculo'];
           $this->SC_log_arr['fields']['valorDiaria']['0'] =  $nmgp_dados_select['valordiaria'];
           $this->SC_log_arr['fields']['proxTrocaOleoVeiculo']['0'] =  $nmgp_dados_select['proxtrocaoleoveiculo'];
           $this->SC_log_arr['fields']['proxTrocaFiltroVeiculo']['0'] =  $nmgp_dados_select['proxtrocafiltroveiculo'];
           $this->SC_log_arr['fields']['avisoTrocaOleoVeiculo']['0'] =  $nmgp_dados_select['avisotrocaoleoveiculo'];
           $this->SC_log_arr['fields']['avisoTrocaFiltroVeiculo']['0'] =  $nmgp_dados_select['avisotrocafiltroveiculo'];
           $this->SC_log_arr['fields']['chassiVeiculo']['0'] =  $nmgp_dados_select['chassiveiculo'];
           $this->SC_log_arr['fields']['dataCompraVeiculo']['0'] =  $nmgp_dados_select['datacompraveiculo'];
           $this->SC_log_arr['fields']['statusVeiculo']['0'] =  $nmgp_dados_select['statusveiculo'];
           $this->SC_log_arr['fields']['proxTrocaCorreiaVeiculo']['0'] =  $nmgp_dados_select['proxtrocacorreiaveiculo'];
           $this->SC_log_arr['fields']['proxTrocaPastilhaVeiculo']['0'] =  $nmgp_dados_select['proxtrocapastilhaveiculo'];
           $this->SC_log_arr['fields']['avisoTrocaCorreiaVeiculo']['0'] =  $nmgp_dados_select['avisotrocacorreiaveiculo'];
           $this->SC_log_arr['fields']['avisoTrocaPastilhaVeiculo']['0'] =  $nmgp_dados_select['avisotrocapastilhaveiculo'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['idFKmarcaVeiculo']['1'] =  $this->idfkmarcaveiculo;
       $this->SC_log_arr['fields']['modeloVeiculo']['1'] =  $this->modeloveiculo;
       $this->SC_log_arr['fields']['anoVeiculo']['1'] =  $this->anoveiculo;
       $this->SC_log_arr['fields']['placaVeiculo']['1'] =  $this->placaveiculo;
       $this->SC_log_arr['fields']['corVeiculo']['1'] =  $this->corveiculo;
       $this->SC_log_arr['fields']['kmAtualVeiculo']['1'] =  $this->kmatualveiculo;
       $this->SC_log_arr['fields']['valorDiaria']['1'] =  $this->valordiaria;
       $this->SC_log_arr['fields']['proxTrocaOleoVeiculo']['1'] =  $this->proxtrocaoleoveiculo;
       $this->SC_log_arr['fields']['proxTrocaFiltroVeiculo']['1'] =  $this->proxtrocafiltroveiculo;
       $this->SC_log_arr['fields']['avisoTrocaOleoVeiculo']['1'] =  $this->avisotrocaoleoveiculo;
       $this->SC_log_arr['fields']['avisoTrocaFiltroVeiculo']['1'] =  $this->avisotrocafiltroveiculo;
       $this->SC_log_arr['fields']['chassiVeiculo']['1'] =  $this->chassiveiculo;
       $this->SC_log_arr['fields']['dataCompraVeiculo']['1'] =  $this->datacompraveiculo;
       $this->SC_log_arr['fields']['statusVeiculo']['1'] =  $this->statusveiculo;
       $this->SC_log_arr['fields']['proxTrocaCorreiaVeiculo']['1'] =  $this->proxtrocacorreiaveiculo;
       $this->SC_log_arr['fields']['proxTrocaPastilhaVeiculo']['1'] =  $this->proxtrocapastilhaveiculo;
       $this->SC_log_arr['fields']['avisoTrocaCorreiaVeiculo']['1'] =  $this->avisotrocacorreiaveiculo;
       $this->SC_log_arr['fields']['avisoTrocaPastilhaVeiculo']['1'] =  $this->avisotrocapastilhaveiculo;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbveiculos_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_tbveiculos_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbveiculos_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "modeloVeiculo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "placaVeiculo", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_tbveiculos_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total'] = $qt_geral_reg_form_tbveiculos_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbveiculos_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbveiculos_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idveiculo";$nm_numeric[] = "idfkmarcaveiculo";$nm_numeric[] = "anoveiculo";$nm_numeric[] = "kmatualveiculo";$nm_numeric[] = "valordiaria";$nm_numeric[] = "proxtrocaoleoveiculo";$nm_numeric[] = "proxtrocafiltroveiculo";$nm_numeric[] = "avisotrocaoleoveiculo";$nm_numeric[] = "avisotrocafiltroveiculo";$nm_numeric[] = "statusveiculo";$nm_numeric[] = "proxtrocacorreiaveiculo";$nm_numeric[] = "proxtrocapastilhaveiculo";$nm_numeric[] = "avisotrocacorreiaveiculo";$nm_numeric[] = "avisotrocapastilhaveiculo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      $Nm_datas['datacompraveiculo'] = "date";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_tbveiculos_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbveiculos_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_tbveiculos_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
