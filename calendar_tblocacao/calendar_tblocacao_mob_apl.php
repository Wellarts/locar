<?php
//
class calendar_tblocacao_mob_apl
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
   var $idlocacao;
   var $idfkclientelocacao;
   var $idfkclientelocacao_1;
   var $idfkveiculolocacao;
   var $idfkveiculolocacao_1;
   var $datasaidalocacao;
   var $horasaidalocacao;
   var $kmsaidalocacao;
   var $dataretornolocacao;
   var $horaretornolocacao;
   var $kmretornolocacao;
   var $qtddiarias;
   var $descontolocacao;
   var $valorliquidolocacao;
   var $obslocacao;
   var $statuslocacao;
   var $statuslocacao_1;
   var $__calend_all_day__;
   var $__calend_all_day___1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
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
   var $is_calendar_app = true;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dataretornolocacao']))
          {
              $this->dataretornolocacao = $this->NM_ajax_info['param']['dataretornolocacao'];
          }
          if (isset($this->NM_ajax_info['param']['datasaidalocacao']))
          {
              $this->datasaidalocacao = $this->NM_ajax_info['param']['datasaidalocacao'];
          }
          if (isset($this->NM_ajax_info['param']['descontolocacao']))
          {
              $this->descontolocacao = $this->NM_ajax_info['param']['descontolocacao'];
          }
          if (isset($this->NM_ajax_info['param']['horaretornolocacao']))
          {
              $this->horaretornolocacao = $this->NM_ajax_info['param']['horaretornolocacao'];
          }
          if (isset($this->NM_ajax_info['param']['horasaidalocacao']))
          {
              $this->horasaidalocacao = $this->NM_ajax_info['param']['horasaidalocacao'];
          }
          if (isset($this->NM_ajax_info['param']['idfkclientelocacao']))
          {
              $this->idfkclientelocacao = $this->NM_ajax_info['param']['idfkclientelocacao'];
          }
          if (isset($this->NM_ajax_info['param']['idfkveiculolocacao']))
          {
              $this->idfkveiculolocacao = $this->NM_ajax_info['param']['idfkveiculolocacao'];
          }
          if (isset($this->NM_ajax_info['param']['idlocacao']))
          {
              $this->idlocacao = $this->NM_ajax_info['param']['idlocacao'];
          }
          if (isset($this->NM_ajax_info['param']['kmretornolocacao']))
          {
              $this->kmretornolocacao = $this->NM_ajax_info['param']['kmretornolocacao'];
          }
          if (isset($this->NM_ajax_info['param']['kmsaidalocacao']))
          {
              $this->kmsaidalocacao = $this->NM_ajax_info['param']['kmsaidalocacao'];
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
          if (isset($this->NM_ajax_info['param']['obslocacao']))
          {
              $this->obslocacao = $this->NM_ajax_info['param']['obslocacao'];
          }
          if (isset($this->NM_ajax_info['param']['qtddiarias']))
          {
              $this->qtddiarias = $this->NM_ajax_info['param']['qtddiarias'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['statuslocacao']))
          {
              $this->statuslocacao = $this->NM_ajax_info['param']['statuslocacao'];
          }
          if (isset($this->NM_ajax_info['param']['valorliquidolocacao']))
          {
              $this->valorliquidolocacao = $this->NM_ajax_info['param']['valorliquidolocacao'];
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
          $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['calendar_tblocacao']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['calendar_tblocacao']['embutida_parms']);
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
                 nm_limpa_str_calendar_tblocacao_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['parms']);
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

      if ('' == $this->nmgp_opcao && !$this->NM_ajax_flag)
      {
          $this->nmgp_opcao = 'calendar';
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new calendar_tblocacao_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['calendar_tblocacao_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['calendar_tblocacao_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['calendar_tblocacao_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_tblocacao_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_tblocacao_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('calendar_tblocacao_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_tblocacao_mob']['label'] = "Loca��o de Ve�culo";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "calendar_tblocacao_mob")
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



      $_SESSION['scriptcase']['error_icon']['calendar_tblocacao_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['calendar_tblocacao_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_tblocacao_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }

      $this->nmgp_botoes['first']   = "off";
      $this->nmgp_botoes['back']    = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last']    = "off";

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_form'];
          if (!isset($this->__calend_all_day__)){$this->__calend_all_day__ = $this->nmgp_dados_form['__calend_all_day__'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("calendar_tblocacao_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'calendar_tblocacao/calendar_tblocacao_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'calendar_tblocacao_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'calendar_tblocacao_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'calendar_tblocacao_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'calendar_tblocacao/calendar_tblocacao_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "calendar_tblocacao_mob_erro.class.php"); 
      }
      $this->Erro      = new calendar_tblocacao_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['calendar_tblocacao_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->idlocacao)) { $this->nm_limpa_alfa($this->idlocacao); }
      if (isset($this->idfkclientelocacao)) { $this->nm_limpa_alfa($this->idfkclientelocacao); }
      if (isset($this->idfkveiculolocacao)) { $this->nm_limpa_alfa($this->idfkveiculolocacao); }
      if (isset($this->kmsaidalocacao)) { $this->nm_limpa_alfa($this->kmsaidalocacao); }
      if (isset($this->kmretornolocacao)) { $this->nm_limpa_alfa($this->kmretornolocacao); }
      if (isset($this->qtddiarias)) { $this->nm_limpa_alfa($this->qtddiarias); }
      if (isset($this->descontolocacao)) { $this->nm_limpa_alfa($this->descontolocacao); }
      if (isset($this->valorliquidolocacao)) { $this->nm_limpa_alfa($this->valorliquidolocacao); }
      if (isset($this->obslocacao)) { $this->nm_limpa_alfa($this->obslocacao); }
      if (isset($this->statuslocacao)) { $this->nm_limpa_alfa($this->statuslocacao); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idlocacao
      $this->field_config['idlocacao']               = array();
      $this->field_config['idlocacao']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idlocacao']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idlocacao']['symbol_dec'] = '';
      $this->field_config['idlocacao']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idlocacao']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- datasaidalocacao
      $this->field_config['datasaidalocacao']                 = array();
      $this->field_config['datasaidalocacao']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['datasaidalocacao']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['datasaidalocacao']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'datasaidalocacao');
      //-- horasaidalocacao
      $this->field_config['horasaidalocacao']                 = array();
      $this->field_config['horasaidalocacao']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horasaidalocacao']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horasaidalocacao']['date_display'] = "hhii";
      $this->new_date_format('HH', 'horasaidalocacao');
      //-- kmsaidalocacao
      $this->field_config['kmsaidalocacao']               = array();
      $this->field_config['kmsaidalocacao']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['kmsaidalocacao']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['kmsaidalocacao']['symbol_dec'] = '';
      $this->field_config['kmsaidalocacao']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['kmsaidalocacao']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dataretornolocacao
      $this->field_config['dataretornolocacao']                 = array();
      $this->field_config['dataretornolocacao']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['dataretornolocacao']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dataretornolocacao']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'dataretornolocacao');
      //-- horaretornolocacao
      $this->field_config['horaretornolocacao']                 = array();
      $this->field_config['horaretornolocacao']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['horaretornolocacao']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['horaretornolocacao']['date_display'] = "hhii";
      $this->new_date_format('HH', 'horaretornolocacao');
      //-- kmretornolocacao
      $this->field_config['kmretornolocacao']               = array();
      $this->field_config['kmretornolocacao']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['kmretornolocacao']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['kmretornolocacao']['symbol_dec'] = '';
      $this->field_config['kmretornolocacao']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['kmretornolocacao']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- qtddiarias
      $this->field_config['qtddiarias']               = array();
      $this->field_config['qtddiarias']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['qtddiarias']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['qtddiarias']['symbol_dec'] = '';
      $this->field_config['qtddiarias']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['qtddiarias']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- descontolocacao
      $this->field_config['descontolocacao']               = array();
      $this->field_config['descontolocacao']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['descontolocacao']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['descontolocacao']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['descontolocacao']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['descontolocacao']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['descontolocacao']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- valorliquidolocacao
      $this->field_config['valorliquidolocacao']               = array();
      $this->field_config['valorliquidolocacao']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorliquidolocacao']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorliquidolocacao']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorliquidolocacao']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorliquidolocacao']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorliquidolocacao']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Gera_log_access'] = false;
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
      $this->calendarConfigValues = array(
          'insert'           => 'on' == $this->nmgp_botoes['insert'],
          'update'           => 'on' == $this->nmgp_botoes['update'],
          'delete'           => 'on' == $this->nmgp_botoes['delete'],
          'eventColorPast'   => 'scCalendarEventPast',
          'eventColorToday'  => 'scCalendarEventOnDay',
          'eventColorFuture' => 'scCalendarEventFuture',
      );
      if ('calendar' == $this->nmgp_opcao)
      {
          $this->calendarOutputDisplay();
          exit;
      }
      elseif ('calendar_fetch' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents();
          $this->calendarOutputJson($this->calendarNormalizeEvents($aEvents));
          exit;
      }
      elseif ('calendar_drop' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarDragDrop());
          exit;
      }
      elseif ('calendar_resize' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarResize());
          exit;
      }
      elseif ('calendar_print' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents('', true);
          $this->calendarOutputJson($this->calendarPrintEvents($this->calendarNormalizeEvents($aEvents)));
          exit;
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_idlocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idlocacao');
          }
          if ('validate_idfkclientelocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfkclientelocacao');
          }
          if ('validate_idfkveiculolocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfkveiculolocacao');
          }
          if ('validate_datasaidalocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'datasaidalocacao');
          }
          if ('validate_horasaidalocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horasaidalocacao');
          }
          if ('validate_kmsaidalocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kmsaidalocacao');
          }
          if ('validate_dataretornolocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dataretornolocacao');
          }
          if ('validate_horaretornolocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'horaretornolocacao');
          }
          if ('validate_kmretornolocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kmretornolocacao');
          }
          if ('validate_qtddiarias' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qtddiarias');
          }
          if ('validate_descontolocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descontolocacao');
          }
          if ('validate_valorliquidolocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorliquidolocacao');
          }
          if ('validate_statuslocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'statuslocacao');
          }
          if ('validate_obslocacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obslocacao');
          }
          calendar_tblocacao_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = $this->__calend_all_day__;
              $this->__calend_all_day__ = ""; 
              if ($this->__calend_all_day___1 != "") 
              { 
                  foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->__calend_all_day__ .= ";";
                      } 
                      $this->__calend_all_day__ .= $dados___calend_all_day___1;
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
              calendar_tblocacao_mob_pack_ajax_response();
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
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['calendar_tblocacao_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  calendar_tblocacao_mob_pack_ajax_response();
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
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link")
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          calendar_tblocacao_mob_pack_ajax_response();
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
          calendar_tblocacao_mob_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'calendar_tblocacao_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'calendar_tblocacao_mob', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               calendar_tblocacao_mob_pack_ajax_response();
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
           case 'idlocacao':
               return "C�digo";
               break;
           case 'idfkclientelocacao':
               return "Cliente";
               break;
           case 'idfkveiculolocacao':
               return "Ve�culo";
               break;
           case 'datasaidalocacao':
               return "Data da Sa�da";
               break;
           case 'horasaidalocacao':
               return "Hora da Sa�da";
               break;
           case 'kmsaidalocacao':
               return "Km da Sa�da";
               break;
           case 'dataretornolocacao':
               return "Data do Retorno";
               break;
           case 'horaretornolocacao':
               return "Hora do Retorno";
               break;
           case 'kmretornolocacao':
               return "Km do Retorno";
               break;
           case 'qtddiarias':
               return "Qtd Di�rias";
               break;
           case 'descontolocacao':
               return "Desconto";
               break;
           case 'valorliquidolocacao':
               return "Valor L�quido";
               break;
           case 'statuslocacao':
               return "Locado?";
               break;
           case 'obslocacao':
               return "Observa��o";
               break;
           case '__calend_all_day__':
               return "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
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
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_calendar_tblocacao_mob']) || !is_array($this->NM_ajax_info['errList']['geral_calendar_tblocacao_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_calendar_tblocacao_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_calendar_tblocacao_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['bypass_required_time']['horasaidalocacao'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['bypass_required_time']['horaretornolocacao'] = true;
      }
      if ('' == $filtro || 'idlocacao' == $filtro)
        $this->ValidateField_idlocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idlocacao";

      if ('' == $filtro || 'idfkclientelocacao' == $filtro)
        $this->ValidateField_idfkclientelocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idfkclientelocacao";

      if ('' == $filtro || 'idfkveiculolocacao' == $filtro)
        $this->ValidateField_idfkveiculolocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idfkveiculolocacao";

      if ('' == $filtro || 'datasaidalocacao' == $filtro)
        $this->ValidateField_datasaidalocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "datasaidalocacao";

      if ('' == $filtro || 'horasaidalocacao' == $filtro)
        $this->ValidateField_horasaidalocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "horasaidalocacao";

      if ('' == $filtro || 'kmsaidalocacao' == $filtro)
        $this->ValidateField_kmsaidalocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "kmsaidalocacao";

      if ('' == $filtro || 'dataretornolocacao' == $filtro)
        $this->ValidateField_dataretornolocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "dataretornolocacao";

      if ('' == $filtro || 'horaretornolocacao' == $filtro)
        $this->ValidateField_horaretornolocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "horaretornolocacao";

      if ('' == $filtro || 'kmretornolocacao' == $filtro)
        $this->ValidateField_kmretornolocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "kmretornolocacao";

      if ('' == $filtro || 'qtddiarias' == $filtro)
        $this->ValidateField_qtddiarias($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "qtddiarias";

      if ('' == $filtro || 'descontolocacao' == $filtro)
        $this->ValidateField_descontolocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "descontolocacao";

      if ('' == $filtro || 'valorliquidolocacao' == $filtro)
        $this->ValidateField_valorliquidolocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "valorliquidolocacao";

      if ('' == $filtro || 'statuslocacao' == $filtro)
        $this->ValidateField_statuslocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "statuslocacao";

      if ('' == $filtro || 'obslocacao' == $filtro)
        $this->ValidateField_obslocacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "obslocacao";

      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['bypass_required_time']['horasaidalocacao'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['bypass_required_time']['horaretornolocacao'] = false;

      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $this->horasaidalocacao = '';
          $this->horaretornolocacao = '';
      }

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

    function ValidateField_idlocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->idlocacao == "")  
      { 
          $this->idlocacao = 0;
      } 
      nm_limpa_numero($this->idlocacao, $this->field_config['idlocacao']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idlocacao != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idlocacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "C�digo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idlocacao']))
                  {
                      $Campos_Erros['idlocacao'] = array();
                  }
                  $Campos_Erros['idlocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idlocacao']) || !is_array($this->NM_ajax_info['errList']['idlocacao']))
                  {
                      $this->NM_ajax_info['errList']['idlocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['idlocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idlocacao, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "C�digo; " ; 
                  if (!isset($Campos_Erros['idlocacao']))
                  {
                      $Campos_Erros['idlocacao'] = array();
                  }
                  $Campos_Erros['idlocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idlocacao']) || !is_array($this->NM_ajax_info['errList']['idlocacao']))
                  {
                      $this->NM_ajax_info['errList']['idlocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['idlocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_idlocacao

    function ValidateField_idfkclientelocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
               if (!empty($this->idfkclientelocacao) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao']) && !in_array($this->idfkclientelocacao, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idfkclientelocacao']))
                   {
                       $Campos_Erros['idfkclientelocacao'] = array();
                   }
                   $Campos_Erros['idfkclientelocacao'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idfkclientelocacao']) || !is_array($this->NM_ajax_info['errList']['idfkclientelocacao']))
                   {
                       $this->NM_ajax_info['errList']['idfkclientelocacao'] = array();
                   }
                   $this->NM_ajax_info['errList']['idfkclientelocacao'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
   }
    } // ValidateField_idfkclientelocacao

    function ValidateField_idfkveiculolocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
               if (!empty($this->idfkveiculolocacao) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao']) && !in_array($this->idfkveiculolocacao, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idfkveiculolocacao']))
                   {
                       $Campos_Erros['idfkveiculolocacao'] = array();
                   }
                   $Campos_Erros['idfkveiculolocacao'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idfkveiculolocacao']) || !is_array($this->NM_ajax_info['errList']['idfkveiculolocacao']))
                   {
                       $this->NM_ajax_info['errList']['idfkveiculolocacao'] = array();
                   }
                   $this->NM_ajax_info['errList']['idfkveiculolocacao'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
   }
    } // ValidateField_idfkveiculolocacao

    function ValidateField_datasaidalocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->datasaidalocacao, $this->field_config['datasaidalocacao']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['datasaidalocacao']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['datasaidalocacao']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['datasaidalocacao']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['datasaidalocacao']['date_sep']) ; 
          if (trim($this->datasaidalocacao) != "")  
          { 
              if ($teste_validade->Data($this->datasaidalocacao, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data da Sa�da; " ; 
                  if (!isset($Campos_Erros['datasaidalocacao']))
                  {
                      $Campos_Erros['datasaidalocacao'] = array();
                  }
                  $Campos_Erros['datasaidalocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['datasaidalocacao']) || !is_array($this->NM_ajax_info['errList']['datasaidalocacao']))
                  {
                      $this->NM_ajax_info['errList']['datasaidalocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['datasaidalocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['datasaidalocacao']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_datasaidalocacao

    function ValidateField_horasaidalocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->horasaidalocacao, $this->field_config['horasaidalocacao']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['horasaidalocacao']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['horasaidalocacao']['time_sep']) ; 
          if (trim($this->horasaidalocacao) != "")  
          { 
              if ($teste_validade->Hora($this->horasaidalocacao, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora da Sa�da; " ; 
                  if (!isset($Campos_Erros['horasaidalocacao']))
                  {
                      $Campos_Erros['horasaidalocacao'] = array();
                  }
                  $Campos_Erros['horasaidalocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['horasaidalocacao']) || !is_array($this->NM_ajax_info['errList']['horasaidalocacao']))
                  {
                      $this->NM_ajax_info['errList']['horasaidalocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['horasaidalocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_horasaidalocacao

    function ValidateField_kmsaidalocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->kmsaidalocacao == "")  
      { 
          $this->kmsaidalocacao = 0;
          $this->sc_force_zero[] = 'kmsaidalocacao';
      } 
      nm_limpa_numero($this->kmsaidalocacao, $this->field_config['kmsaidalocacao']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->kmsaidalocacao != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->kmsaidalocacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km da Sa�da: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['kmsaidalocacao']))
                  {
                      $Campos_Erros['kmsaidalocacao'] = array();
                  }
                  $Campos_Erros['kmsaidalocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['kmsaidalocacao']) || !is_array($this->NM_ajax_info['errList']['kmsaidalocacao']))
                  {
                      $this->NM_ajax_info['errList']['kmsaidalocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['kmsaidalocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->kmsaidalocacao, 20, 0, -0, 1.0E+20, "N") == false)  
              { 
                  $Campos_Crit .= "Km da Sa�da; " ; 
                  if (!isset($Campos_Erros['kmsaidalocacao']))
                  {
                      $Campos_Erros['kmsaidalocacao'] = array();
                  }
                  $Campos_Erros['kmsaidalocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['kmsaidalocacao']) || !is_array($this->NM_ajax_info['errList']['kmsaidalocacao']))
                  {
                      $this->NM_ajax_info['errList']['kmsaidalocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['kmsaidalocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_kmsaidalocacao

    function ValidateField_dataretornolocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->dataretornolocacao, $this->field_config['dataretornolocacao']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['dataretornolocacao']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['dataretornolocacao']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['dataretornolocacao']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['dataretornolocacao']['date_sep']) ; 
          if (trim($this->dataretornolocacao) != "")  
          { 
              if ($teste_validade->Data($this->dataretornolocacao, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data do Retorno; " ; 
                  if (!isset($Campos_Erros['dataretornolocacao']))
                  {
                      $Campos_Erros['dataretornolocacao'] = array();
                  }
                  $Campos_Erros['dataretornolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dataretornolocacao']) || !is_array($this->NM_ajax_info['errList']['dataretornolocacao']))
                  {
                      $this->NM_ajax_info['errList']['dataretornolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['dataretornolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['dataretornolocacao']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_dataretornolocacao

    function ValidateField_horaretornolocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->horaretornolocacao, $this->field_config['horaretornolocacao']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['horaretornolocacao']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['horaretornolocacao']['time_sep']) ; 
          if (trim($this->horaretornolocacao) != "")  
          { 
              if ($teste_validade->Hora($this->horaretornolocacao, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora do Retorno; " ; 
                  if (!isset($Campos_Erros['horaretornolocacao']))
                  {
                      $Campos_Erros['horaretornolocacao'] = array();
                  }
                  $Campos_Erros['horaretornolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['horaretornolocacao']) || !is_array($this->NM_ajax_info['errList']['horaretornolocacao']))
                  {
                      $this->NM_ajax_info['errList']['horaretornolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['horaretornolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_horaretornolocacao

    function ValidateField_kmretornolocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->kmretornolocacao == "")  
      { 
          $this->kmretornolocacao = 0;
          $this->sc_force_zero[] = 'kmretornolocacao';
      } 
      nm_limpa_numero($this->kmretornolocacao, $this->field_config['kmretornolocacao']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->kmretornolocacao != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->kmretornolocacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "Km do Retorno: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['kmretornolocacao']))
                  {
                      $Campos_Erros['kmretornolocacao'] = array();
                  }
                  $Campos_Erros['kmretornolocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['kmretornolocacao']) || !is_array($this->NM_ajax_info['errList']['kmretornolocacao']))
                  {
                      $this->NM_ajax_info['errList']['kmretornolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['kmretornolocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->kmretornolocacao, 20, 0, -0, 1.0E+20, "N") == false)  
              { 
                  $Campos_Crit .= "Km do Retorno; " ; 
                  if (!isset($Campos_Erros['kmretornolocacao']))
                  {
                      $Campos_Erros['kmretornolocacao'] = array();
                  }
                  $Campos_Erros['kmretornolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['kmretornolocacao']) || !is_array($this->NM_ajax_info['errList']['kmretornolocacao']))
                  {
                      $this->NM_ajax_info['errList']['kmretornolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['kmretornolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_kmretornolocacao

    function ValidateField_qtddiarias(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->qtddiarias == "")  
      { 
          $this->qtddiarias = 0;
          $this->sc_force_zero[] = 'qtddiarias';
      } 
      nm_limpa_numero($this->qtddiarias, $this->field_config['qtddiarias']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->qtddiarias != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->qtddiarias) > $iTestSize)  
              { 
                  $Campos_Crit .= "Qtd Di�rias: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['qtddiarias']))
                  {
                      $Campos_Erros['qtddiarias'] = array();
                  }
                  $Campos_Erros['qtddiarias'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['qtddiarias']) || !is_array($this->NM_ajax_info['errList']['qtddiarias']))
                  {
                      $this->NM_ajax_info['errList']['qtddiarias'] = array();
                  }
                  $this->NM_ajax_info['errList']['qtddiarias'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->qtddiarias, 2, 0, -0, 99, "N") == false)  
              { 
                  $Campos_Crit .= "Qtd Di�rias; " ; 
                  if (!isset($Campos_Erros['qtddiarias']))
                  {
                      $Campos_Erros['qtddiarias'] = array();
                  }
                  $Campos_Erros['qtddiarias'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['qtddiarias']) || !is_array($this->NM_ajax_info['errList']['qtddiarias']))
                  {
                      $this->NM_ajax_info['errList']['qtddiarias'] = array();
                  }
                  $this->NM_ajax_info['errList']['qtddiarias'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_qtddiarias

    function ValidateField_descontolocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->descontolocacao == "")  
      { 
          $this->descontolocacao = 0;
          $this->sc_force_zero[] = 'descontolocacao';
      } 
      if (!empty($this->field_config['descontolocacao']['symbol_dec']))
      {
          $this->sc_remove_currency($this->descontolocacao, $this->field_config['descontolocacao']['symbol_dec'], $this->field_config['descontolocacao']['symbol_grp'], $this->field_config['descontolocacao']['symbol_mon']); 
          nm_limpa_valor($this->descontolocacao, $this->field_config['descontolocacao']['symbol_dec'], $this->field_config['descontolocacao']['symbol_grp']) ; 
          if ('.' == substr($this->descontolocacao, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descontolocacao, 1)))
              {
                  $this->descontolocacao = '';
              }
              else
              {
                  $this->descontolocacao = '0' . $this->descontolocacao;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->descontolocacao != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->descontolocacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "Desconto: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descontolocacao']))
                  {
                      $Campos_Erros['descontolocacao'] = array();
                  }
                  $Campos_Erros['descontolocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descontolocacao']) || !is_array($this->NM_ajax_info['errList']['descontolocacao']))
                  {
                      $this->NM_ajax_info['errList']['descontolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['descontolocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descontolocacao, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Desconto; " ; 
                  if (!isset($Campos_Erros['descontolocacao']))
                  {
                      $Campos_Erros['descontolocacao'] = array();
                  }
                  $Campos_Erros['descontolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descontolocacao']) || !is_array($this->NM_ajax_info['errList']['descontolocacao']))
                  {
                      $this->NM_ajax_info['errList']['descontolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['descontolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_descontolocacao

    function ValidateField_valorliquidolocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valorliquidolocacao == "")  
      { 
          $this->valorliquidolocacao = 0;
          $this->sc_force_zero[] = 'valorliquidolocacao';
      } 
      if (!empty($this->field_config['valorliquidolocacao']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_dec'], $this->field_config['valorliquidolocacao']['symbol_grp'], $this->field_config['valorliquidolocacao']['symbol_mon']); 
          nm_limpa_valor($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_dec'], $this->field_config['valorliquidolocacao']['symbol_grp']) ; 
          if ('.' == substr($this->valorliquidolocacao, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorliquidolocacao, 1)))
              {
                  $this->valorliquidolocacao = '';
              }
              else
              {
                  $this->valorliquidolocacao = '0' . $this->valorliquidolocacao;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->valorliquidolocacao != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->valorliquidolocacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "Valor L�quido: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorliquidolocacao']))
                  {
                      $Campos_Erros['valorliquidolocacao'] = array();
                  }
                  $Campos_Erros['valorliquidolocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorliquidolocacao']) || !is_array($this->NM_ajax_info['errList']['valorliquidolocacao']))
                  {
                      $this->NM_ajax_info['errList']['valorliquidolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorliquidolocacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorliquidolocacao, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Valor L�quido; " ; 
                  if (!isset($Campos_Erros['valorliquidolocacao']))
                  {
                      $Campos_Erros['valorliquidolocacao'] = array();
                  }
                  $Campos_Erros['valorliquidolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorliquidolocacao']) || !is_array($this->NM_ajax_info['errList']['valorliquidolocacao']))
                  {
                      $this->NM_ajax_info['errList']['valorliquidolocacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorliquidolocacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valorliquidolocacao

    function ValidateField_statuslocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->statuslocacao == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->statuslocacao == "")  
      { 
          $this->statuslocacao = 0;
          $this->sc_force_zero[] = 'statuslocacao';
      } 
   }
    } // ValidateField_statuslocacao

    function ValidateField_obslocacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->obslocacao) > 1000) 
          { 
              $Campos_Crit .= "Observa��o " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obslocacao']))
              {
                  $Campos_Erros['obslocacao'] = array();
              }
              $Campos_Erros['obslocacao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obslocacao']) || !is_array($this->NM_ajax_info['errList']['obslocacao']))
              {
                  $this->NM_ajax_info['errList']['obslocacao'] = array();
              }
              $this->NM_ajax_info['errList']['obslocacao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_obslocacao

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
    $this->nmgp_dados_form['idlocacao'] = $this->idlocacao;
    $this->nmgp_dados_form['idfkclientelocacao'] = $this->idfkclientelocacao;
    $this->nmgp_dados_form['idfkveiculolocacao'] = $this->idfkveiculolocacao;
    $this->nmgp_dados_form['datasaidalocacao'] = $this->datasaidalocacao;
    $this->nmgp_dados_form['horasaidalocacao'] = $this->horasaidalocacao;
    $this->nmgp_dados_form['kmsaidalocacao'] = $this->kmsaidalocacao;
    $this->nmgp_dados_form['dataretornolocacao'] = $this->dataretornolocacao;
    $this->nmgp_dados_form['horaretornolocacao'] = $this->horaretornolocacao;
    $this->nmgp_dados_form['kmretornolocacao'] = $this->kmretornolocacao;
    $this->nmgp_dados_form['qtddiarias'] = $this->qtddiarias;
    $this->nmgp_dados_form['descontolocacao'] = $this->descontolocacao;
    $this->nmgp_dados_form['valorliquidolocacao'] = $this->valorliquidolocacao;
    $this->nmgp_dados_form['statuslocacao'] = $this->statuslocacao;
    $this->nmgp_dados_form['obslocacao'] = $this->obslocacao;
    $this->nmgp_dados_form['__calend_all_day__'] = $this->__calend_all_day__;
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->idlocacao, $this->field_config['idlocacao']['symbol_grp']) ; 
      nm_limpa_data($this->datasaidalocacao, $this->field_config['datasaidalocacao']['date_sep']) ; 
      nm_limpa_hora($this->horasaidalocacao, $this->field_config['horasaidalocacao']['time_sep']) ; 
      nm_limpa_numero($this->kmsaidalocacao, $this->field_config['kmsaidalocacao']['symbol_grp']) ; 
      nm_limpa_data($this->dataretornolocacao, $this->field_config['dataretornolocacao']['date_sep']) ; 
      nm_limpa_hora($this->horaretornolocacao, $this->field_config['horaretornolocacao']['time_sep']) ; 
      nm_limpa_numero($this->kmretornolocacao, $this->field_config['kmretornolocacao']['symbol_grp']) ; 
      nm_limpa_numero($this->qtddiarias, $this->field_config['qtddiarias']['symbol_grp']) ; 
      if (!empty($this->field_config['descontolocacao']['symbol_dec']))
      {
         $this->sc_remove_currency($this->descontolocacao, $this->field_config['descontolocacao']['symbol_dec'], $this->field_config['descontolocacao']['symbol_grp'], $this->field_config['descontolocacao']['symbol_mon']);
         nm_limpa_valor($this->descontolocacao, $this->field_config['descontolocacao']['symbol_dec'], $this->field_config['descontolocacao']['symbol_grp']);
      }
      if (!empty($this->field_config['valorliquidolocacao']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_dec'], $this->field_config['valorliquidolocacao']['symbol_grp'], $this->field_config['valorliquidolocacao']['symbol_mon']);
         nm_limpa_valor($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_dec'], $this->field_config['valorliquidolocacao']['symbol_grp']);
      }
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
      if ($Nome_Campo == "idlocacao")
      {
          nm_limpa_numero($this->idlocacao, $this->field_config['idlocacao']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "kmsaidalocacao")
      {
          nm_limpa_numero($this->kmsaidalocacao, $this->field_config['kmsaidalocacao']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "kmretornolocacao")
      {
          nm_limpa_numero($this->kmretornolocacao, $this->field_config['kmretornolocacao']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "qtddiarias")
      {
          nm_limpa_numero($this->qtddiarias, $this->field_config['qtddiarias']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "descontolocacao")
      {
          if (!empty($this->field_config['descontolocacao']['symbol_dec']))
          {
             $this->sc_remove_currency($this->descontolocacao, $this->field_config['descontolocacao']['symbol_dec'], $this->field_config['descontolocacao']['symbol_grp'], $this->field_config['descontolocacao']['symbol_mon']);
             nm_limpa_valor($this->descontolocacao, $this->field_config['descontolocacao']['symbol_dec'], $this->field_config['descontolocacao']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorliquidolocacao")
      {
          if (!empty($this->field_config['valorliquidolocacao']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_dec'], $this->field_config['valorliquidolocacao']['symbol_grp'], $this->field_config['valorliquidolocacao']['symbol_mon']);
             nm_limpa_valor($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_dec'], $this->field_config['valorliquidolocacao']['symbol_grp']);
          }
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
      if (!empty($this->idlocacao) || (!empty($format_fields) && isset($format_fields['idlocacao'])))
      {
          nmgp_Form_Num_Val($this->idlocacao, $this->field_config['idlocacao']['symbol_grp'], $this->field_config['idlocacao']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['idlocacao']['symbol_fmt']) ; 
      }
      if ((!empty($this->datasaidalocacao) && 'null' != $this->datasaidalocacao) || (!empty($format_fields) && isset($format_fields['datasaidalocacao'])))
      {
          nm_volta_data($this->datasaidalocacao, $this->field_config['datasaidalocacao']['date_format']) ; 
          nmgp_Form_Datas($this->datasaidalocacao, $this->field_config['datasaidalocacao']['date_format'], $this->field_config['datasaidalocacao']['date_sep']) ;  
      }
      elseif ('null' == $this->datasaidalocacao || '' == $this->datasaidalocacao)
      {
          $this->datasaidalocacao = '';
      }
      if ((!empty($this->horasaidalocacao) && 'null' != $this->horasaidalocacao) || (!empty($format_fields) && isset($format_fields['horasaidalocacao'])))
      {
          nm_volta_hora($this->horasaidalocacao, $this->field_config['horasaidalocacao']['date_format']) ; 
          nmgp_Form_Hora($this->horasaidalocacao, $this->field_config['horasaidalocacao']['date_format'], $this->field_config['horasaidalocacao']['time_sep']) ;  
      }
      elseif ('null' == $this->horasaidalocacao || '' == $this->horasaidalocacao)
      {
          $this->horasaidalocacao = '';
      }
      if (!empty($this->kmsaidalocacao) || (!empty($format_fields) && isset($format_fields['kmsaidalocacao'])))
      {
          nmgp_Form_Num_Val($this->kmsaidalocacao, $this->field_config['kmsaidalocacao']['symbol_grp'], $this->field_config['kmsaidalocacao']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['kmsaidalocacao']['symbol_fmt']) ; 
      }
      if ((!empty($this->dataretornolocacao) && 'null' != $this->dataretornolocacao) || (!empty($format_fields) && isset($format_fields['dataretornolocacao'])))
      {
          nm_volta_data($this->dataretornolocacao, $this->field_config['dataretornolocacao']['date_format']) ; 
          nmgp_Form_Datas($this->dataretornolocacao, $this->field_config['dataretornolocacao']['date_format'], $this->field_config['dataretornolocacao']['date_sep']) ;  
      }
      elseif ('null' == $this->dataretornolocacao || '' == $this->dataretornolocacao)
      {
          $this->dataretornolocacao = '';
      }
      if ((!empty($this->horaretornolocacao) && 'null' != $this->horaretornolocacao) || (!empty($format_fields) && isset($format_fields['horaretornolocacao'])))
      {
          nm_volta_hora($this->horaretornolocacao, $this->field_config['horaretornolocacao']['date_format']) ; 
          nmgp_Form_Hora($this->horaretornolocacao, $this->field_config['horaretornolocacao']['date_format'], $this->field_config['horaretornolocacao']['time_sep']) ;  
      }
      elseif ('null' == $this->horaretornolocacao || '' == $this->horaretornolocacao)
      {
          $this->horaretornolocacao = '';
      }
      if (!empty($this->kmretornolocacao) || (!empty($format_fields) && isset($format_fields['kmretornolocacao'])))
      {
          nmgp_Form_Num_Val($this->kmretornolocacao, $this->field_config['kmretornolocacao']['symbol_grp'], $this->field_config['kmretornolocacao']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['kmretornolocacao']['symbol_fmt']) ; 
      }
      if (!empty($this->qtddiarias) || (!empty($format_fields) && isset($format_fields['qtddiarias'])))
      {
          nmgp_Form_Num_Val($this->qtddiarias, $this->field_config['qtddiarias']['symbol_grp'], $this->field_config['qtddiarias']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['qtddiarias']['symbol_fmt']) ; 
      }
      if (!empty($this->descontolocacao) || (!empty($format_fields) && isset($format_fields['descontolocacao'])))
      {
          nmgp_Form_Num_Val($this->descontolocacao, $this->field_config['descontolocacao']['symbol_grp'], $this->field_config['descontolocacao']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['descontolocacao']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['descontolocacao']['symbol_mon'];
          $this->sc_add_currency($this->descontolocacao, $sMonSymb, $this->field_config['descontolocacao']['format_pos']); 
      }
      if (!empty($this->valorliquidolocacao) || (!empty($format_fields) && isset($format_fields['valorliquidolocacao'])))
      {
          nmgp_Form_Num_Val($this->valorliquidolocacao, $this->field_config['valorliquidolocacao']['symbol_grp'], $this->field_config['valorliquidolocacao']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['valorliquidolocacao']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorliquidolocacao']['symbol_mon'];
          $this->sc_add_currency($this->valorliquidolocacao, $sMonSymb, $this->field_config['valorliquidolocacao']['format_pos']); 
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
      $guarda_format_hora = $this->field_config['datasaidalocacao']['date_format'];
      if ($this->datasaidalocacao != "")  
      { 
          nm_conv_data($this->datasaidalocacao, $this->field_config['datasaidalocacao']['date_format']) ; 
          $this->datasaidalocacao_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->datasaidalocacao_hora = substr($this->datasaidalocacao_hora, 0, -4);
          }
      } 
      if ($this->datasaidalocacao == "" && $use_null)  
      { 
          $this->datasaidalocacao = "null" ; 
      } 
      $this->field_config['datasaidalocacao']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['horasaidalocacao']['date_format'];
      if ($this->horasaidalocacao != "")  
      { 
          $this->horasaidalocacao_hora = $this->horasaidalocacao;
          $this->horasaidalocacao = "1900-01-01";
          nm_conv_hora($this->horasaidalocacao_hora, $this->field_config['horasaidalocacao']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->horasaidalocacao_hora = substr($this->horasaidalocacao_hora, 0, -4);
          }
          $this->horasaidalocacao = $this->horasaidalocacao_hora;
      } 
      if ($this->horasaidalocacao == "" && $use_null)  
      { 
          $this->horasaidalocacao = "null" ; 
      } 
      $this->field_config['horasaidalocacao']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['dataretornolocacao']['date_format'];
      if ($this->dataretornolocacao != "")  
      { 
          nm_conv_data($this->dataretornolocacao, $this->field_config['dataretornolocacao']['date_format']) ; 
          $this->dataretornolocacao_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->dataretornolocacao_hora = substr($this->dataretornolocacao_hora, 0, -4);
          }
      } 
      if ($this->dataretornolocacao == "" && $use_null)  
      { 
          $this->dataretornolocacao = "null" ; 
      } 
      $this->field_config['dataretornolocacao']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['horaretornolocacao']['date_format'];
      if ($this->horaretornolocacao != "")  
      { 
          $this->horaretornolocacao_hora = $this->horaretornolocacao;
          $this->horaretornolocacao = "1900-01-01";
          nm_conv_hora($this->horaretornolocacao_hora, $this->field_config['horaretornolocacao']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->horaretornolocacao_hora = substr($this->horaretornolocacao_hora, 0, -4);
          }
          $this->horaretornolocacao = $this->horaretornolocacao_hora;
      } 
      if ($this->horaretornolocacao == "" && $use_null)  
      { 
          $this->horaretornolocacao = "null" ; 
      } 
      $this->field_config['horaretornolocacao']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_idlocacao();
          $this->ajax_return_values_idfkclientelocacao();
          $this->ajax_return_values_idfkveiculolocacao();
          $this->ajax_return_values_datasaidalocacao();
          $this->ajax_return_values_horasaidalocacao();
          $this->ajax_return_values_kmsaidalocacao();
          $this->ajax_return_values_dataretornolocacao();
          $this->ajax_return_values_horaretornolocacao();
          $this->ajax_return_values_kmretornolocacao();
          $this->ajax_return_values_qtddiarias();
          $this->ajax_return_values_descontolocacao();
          $this->ajax_return_values_valorliquidolocacao();
          $this->ajax_return_values_statuslocacao();
          $this->ajax_return_values_obslocacao();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idlocacao']['keyVal'] = calendar_tblocacao_mob_pack_protect_string($this->nmgp_dados_form['idlocacao']);
          }
   } // ajax_return_values

          //----- idlocacao
   function ajax_return_values_idlocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idlocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idlocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idlocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idfkclientelocacao
   function ajax_return_values_idfkclientelocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfkclientelocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfkclientelocacao);
              $aLookup = array();
              $this->_tmp_lookup_idfkclientelocacao = $this->idfkclientelocacao;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idlocacao = $this->idlocacao;
   $old_value_datasaidalocacao = $this->datasaidalocacao;
   $old_value_horasaidalocacao = $this->horasaidalocacao;
   $old_value_kmsaidalocacao = $this->kmsaidalocacao;
   $old_value_dataretornolocacao = $this->dataretornolocacao;
   $old_value_horaretornolocacao = $this->horaretornolocacao;
   $old_value_kmretornolocacao = $this->kmretornolocacao;
   $old_value_qtddiarias = $this->qtddiarias;
   $old_value_descontolocacao = $this->descontolocacao;
   $old_value_valorliquidolocacao = $this->valorliquidolocacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlocacao = $this->idlocacao;
   $unformatted_value_datasaidalocacao = $this->datasaidalocacao;
   $unformatted_value_horasaidalocacao = $this->horasaidalocacao;
   $unformatted_value_kmsaidalocacao = $this->kmsaidalocacao;
   $unformatted_value_dataretornolocacao = $this->dataretornolocacao;
   $unformatted_value_horaretornolocacao = $this->horaretornolocacao;
   $unformatted_value_kmretornolocacao = $this->kmretornolocacao;
   $unformatted_value_qtddiarias = $this->qtddiarias;
   $unformatted_value_descontolocacao = $this->descontolocacao;
   $unformatted_value_valorliquidolocacao = $this->valorliquidolocacao;

   $nm_comando = "SELECT idCliente, nomeCliente 
FROM tbclientes 
ORDER BY nomeCliente";

   $this->idlocacao = $old_value_idlocacao;
   $this->datasaidalocacao = $old_value_datasaidalocacao;
   $this->horasaidalocacao = $old_value_horasaidalocacao;
   $this->kmsaidalocacao = $old_value_kmsaidalocacao;
   $this->dataretornolocacao = $old_value_dataretornolocacao;
   $this->horaretornolocacao = $old_value_horaretornolocacao;
   $this->kmretornolocacao = $old_value_kmretornolocacao;
   $this->qtddiarias = $old_value_qtddiarias;
   $this->descontolocacao = $old_value_descontolocacao;
   $this->valorliquidolocacao = $old_value_valorliquidolocacao;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(calendar_tblocacao_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => calendar_tblocacao_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkclientelocacao'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idfkclientelocacao\"";
          if (isset($this->NM_ajax_info['select_html']['idfkclientelocacao']) && !empty($this->NM_ajax_info['select_html']['idfkclientelocacao']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idfkclientelocacao'];
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

                  if ($this->idfkclientelocacao == $sValue)
                  {
                      $this->_tmp_lookup_idfkclientelocacao = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("idfkclientelocacao", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['idfkclientelocacao'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idfkclientelocacao']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idfkclientelocacao']['valList'][$i] = calendar_tblocacao_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idfkclientelocacao']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idfkclientelocacao']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idfkclientelocacao']['labList'] = $aLabel;
          }
   }

          //----- idfkveiculolocacao
   function ajax_return_values_idfkveiculolocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfkveiculolocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfkveiculolocacao);
              $aLookup = array();
              $this->_tmp_lookup_idfkveiculolocacao = $this->idfkveiculolocacao;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idlocacao = $this->idlocacao;
   $old_value_datasaidalocacao = $this->datasaidalocacao;
   $old_value_horasaidalocacao = $this->horasaidalocacao;
   $old_value_kmsaidalocacao = $this->kmsaidalocacao;
   $old_value_dataretornolocacao = $this->dataretornolocacao;
   $old_value_horaretornolocacao = $this->horaretornolocacao;
   $old_value_kmretornolocacao = $this->kmretornolocacao;
   $old_value_qtddiarias = $this->qtddiarias;
   $old_value_descontolocacao = $this->descontolocacao;
   $old_value_valorliquidolocacao = $this->valorliquidolocacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlocacao = $this->idlocacao;
   $unformatted_value_datasaidalocacao = $this->datasaidalocacao;
   $unformatted_value_horasaidalocacao = $this->horasaidalocacao;
   $unformatted_value_kmsaidalocacao = $this->kmsaidalocacao;
   $unformatted_value_dataretornolocacao = $this->dataretornolocacao;
   $unformatted_value_horaretornolocacao = $this->horaretornolocacao;
   $unformatted_value_kmretornolocacao = $this->kmretornolocacao;
   $unformatted_value_qtddiarias = $this->qtddiarias;
   $unformatted_value_descontolocacao = $this->descontolocacao;
   $unformatted_value_valorliquidolocacao = $this->valorliquidolocacao;

   $nm_comando = "SELECT idVeiculo, modeloVeiculo 
FROM tbveiculos 
ORDER BY modeloVeiculo";

   $this->idlocacao = $old_value_idlocacao;
   $this->datasaidalocacao = $old_value_datasaidalocacao;
   $this->horasaidalocacao = $old_value_horasaidalocacao;
   $this->kmsaidalocacao = $old_value_kmsaidalocacao;
   $this->dataretornolocacao = $old_value_dataretornolocacao;
   $this->horaretornolocacao = $old_value_horaretornolocacao;
   $this->kmretornolocacao = $old_value_kmretornolocacao;
   $this->qtddiarias = $old_value_qtddiarias;
   $this->descontolocacao = $old_value_descontolocacao;
   $this->valorliquidolocacao = $old_value_valorliquidolocacao;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(calendar_tblocacao_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => calendar_tblocacao_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_idfkveiculolocacao'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idfkveiculolocacao\"";
          if (isset($this->NM_ajax_info['select_html']['idfkveiculolocacao']) && !empty($this->NM_ajax_info['select_html']['idfkveiculolocacao']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idfkveiculolocacao'];
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

                  if ($this->idfkveiculolocacao == $sValue)
                  {
                      $this->_tmp_lookup_idfkveiculolocacao = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("idfkveiculolocacao", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['idfkveiculolocacao'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idfkveiculolocacao']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idfkveiculolocacao']['valList'][$i] = calendar_tblocacao_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idfkveiculolocacao']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idfkveiculolocacao']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idfkveiculolocacao']['labList'] = $aLabel;
          }
   }

          //----- datasaidalocacao
   function ajax_return_values_datasaidalocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("datasaidalocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->datasaidalocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['datasaidalocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- horasaidalocacao
   function ajax_return_values_horasaidalocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("horasaidalocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->horasaidalocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['horasaidalocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- kmsaidalocacao
   function ajax_return_values_kmsaidalocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kmsaidalocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kmsaidalocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kmsaidalocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- dataretornolocacao
   function ajax_return_values_dataretornolocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dataretornolocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dataretornolocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dataretornolocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- horaretornolocacao
   function ajax_return_values_horaretornolocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("horaretornolocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->horaretornolocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['horaretornolocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- kmretornolocacao
   function ajax_return_values_kmretornolocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kmretornolocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kmretornolocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kmretornolocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- qtddiarias
   function ajax_return_values_qtddiarias($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qtddiarias", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qtddiarias);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qtddiarias'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- descontolocacao
   function ajax_return_values_descontolocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descontolocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descontolocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descontolocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorliquidolocacao
   function ajax_return_values_valorliquidolocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorliquidolocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorliquidolocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorliquidolocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- statuslocacao
   function ajax_return_values_statuslocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("statuslocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->statuslocacao);
              $aLookup = array();
              $this->_tmp_lookup_statuslocacao = $this->statuslocacao;

$aLookup[] = array(calendar_tblocacao_mob_pack_protect_string('1') => calendar_tblocacao_mob_pack_protect_string("SIM"));
$aLookup[] = array(calendar_tblocacao_mob_pack_protect_string('0') => calendar_tblocacao_mob_pack_protect_string("N�O"));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_statuslocacao'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['Lookup_statuslocacao'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"statuslocacao\"";
          if (isset($this->NM_ajax_info['select_html']['statuslocacao']) && !empty($this->NM_ajax_info['select_html']['statuslocacao']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['statuslocacao'];
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

                  if ($this->statuslocacao == $sValue)
                  {
                      $this->_tmp_lookup_statuslocacao = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("statuslocacao", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['statuslocacao'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['statuslocacao']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['statuslocacao']['valList'][$i] = calendar_tblocacao_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['statuslocacao']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['statuslocacao']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['statuslocacao']['labList'] = $aLabel;
          }
   }

          //----- obslocacao
   function ajax_return_values_obslocacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obslocacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obslocacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obslocacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->descontolocacao = str_replace($sc_parm1, $sc_parm2, $this->descontolocacao); 
      $this->valorliquidolocacao = str_replace($sc_parm1, $sc_parm2, $this->valorliquidolocacao); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->descontolocacao = "'" . $this->descontolocacao . "'";
      $this->valorliquidolocacao = "'" . $this->valorliquidolocacao . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->descontolocacao = str_replace("'", "", $this->descontolocacao); 
      $this->valorliquidolocacao = str_replace("'", "", $this->valorliquidolocacao); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']))
          {
               $sc_where_pos = " WHERE ((idLocacao < $this->idlocacao))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->idlocacao)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opcao'] = '';

   }

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
      $_SESSION['scriptcase']['calendar_tblocacao_mob']['contr_erro'] = 'on';
             /* tbmultasAvarias */
      $sc_cmd_dependency = "SELECT COUNT(*) FROM tbmultasAvarias WHERE idFKlocacao = " . $this->idlocacao ;
       
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
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_tblocacao_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['calendar_tblocacao_mob']['contr_erro'] = 'off'; 
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
      $SC_tem_cmp_update = false; 
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
      $NM_val_form['idlocacao'] = $this->idlocacao;
      $NM_val_form['idfkclientelocacao'] = $this->idfkclientelocacao;
      $NM_val_form['idfkveiculolocacao'] = $this->idfkveiculolocacao;
      $NM_val_form['datasaidalocacao'] = $this->datasaidalocacao;
      $NM_val_form['horasaidalocacao'] = $this->horasaidalocacao;
      $NM_val_form['kmsaidalocacao'] = $this->kmsaidalocacao;
      $NM_val_form['dataretornolocacao'] = $this->dataretornolocacao;
      $NM_val_form['horaretornolocacao'] = $this->horaretornolocacao;
      $NM_val_form['kmretornolocacao'] = $this->kmretornolocacao;
      $NM_val_form['qtddiarias'] = $this->qtddiarias;
      $NM_val_form['descontolocacao'] = $this->descontolocacao;
      $NM_val_form['valorliquidolocacao'] = $this->valorliquidolocacao;
      $NM_val_form['statuslocacao'] = $this->statuslocacao;
      $NM_val_form['obslocacao'] = $this->obslocacao;
      $NM_val_form['__calend_all_day__'] = $this->__calend_all_day__;
      if ($this->idlocacao == "")  
      { 
          $this->idlocacao = 0;
      } 
      if ($this->idfkclientelocacao == "")  
      { 
          $this->idfkclientelocacao = 0;
          $this->sc_force_zero[] = 'idfkclientelocacao';
      } 
      if ($this->idfkveiculolocacao == "")  
      { 
          $this->idfkveiculolocacao = 0;
          $this->sc_force_zero[] = 'idfkveiculolocacao';
      } 
      if ($this->kmsaidalocacao == "")  
      { 
          $this->kmsaidalocacao = 0;
          $this->sc_force_zero[] = 'kmsaidalocacao';
      } 
      if ($this->kmretornolocacao == "")  
      { 
          $this->kmretornolocacao = 0;
          $this->sc_force_zero[] = 'kmretornolocacao';
      } 
      if ($this->qtddiarias == "")  
      { 
          $this->qtddiarias = 0;
          $this->sc_force_zero[] = 'qtddiarias';
      } 
      if ($this->descontolocacao == "")  
      { 
          $this->descontolocacao = 0;
          $this->sc_force_zero[] = 'descontolocacao';
      } 
      if ($this->valorliquidolocacao == "")  
      { 
          $this->valorliquidolocacao = 0;
          $this->sc_force_zero[] = 'valorliquidolocacao';
      } 
      if ($this->nmgp_opcao == "alterar") 
      {
      if ($this->statuslocacao == "")  
      { 
          $this->statuslocacao = 0;
          $this->sc_force_zero[] = 'statuslocacao';
      } 
      }
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->datasaidalocacao == "")  
          { 
              $this->datasaidalocacao = "null"; 
              $NM_val_null[] = "datasaidalocacao";
          } 
          if ($this->horasaidalocacao == "")  
          { 
              $this->horasaidalocacao = "null"; 
              $NM_val_null[] = "horasaidalocacao";
          } 
          if ($this->dataretornolocacao == "")  
          { 
              $this->dataretornolocacao = "null"; 
              $NM_val_null[] = "dataretornolocacao";
          } 
          if ($this->horaretornolocacao == "")  
          { 
              $this->horaretornolocacao = "null"; 
              $NM_val_null[] = "horaretornolocacao";
          } 
          $this->obslocacao_before_qstr = $this->obslocacao;
          $this->obslocacao = substr($this->Db->qstr($this->obslocacao), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = false; 
          $SC_ex_upd_or = false; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idLocacao = $this->idlocacao ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idLocacao = $this->idlocacao "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 calendar_tblocacao_mob_pack_ajax_response();
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
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
              } 
              if (isset($NM_val_form['idfkclientelocacao']) && $NM_val_form['idfkclientelocacao'] != $this->nmgp_dados_select['idfkclientelocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " idFKclienteLocacao = $this->idfkclientelocacao"; 
                  $comando_oracle        .= " idFKclienteLocacao = $this->idfkclientelocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['idfkveiculolocacao']) && $NM_val_form['idfkveiculolocacao'] != $this->nmgp_dados_select['idfkveiculolocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " idFKveiculoLocacao = $this->idfkveiculolocacao"; 
                  $comando_oracle        .= " idFKveiculoLocacao = $this->idfkveiculolocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['datasaidalocacao']) && $NM_val_form['datasaidalocacao'] != $this->nmgp_dados_select['datasaidalocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dataSaidaLocacao = " . $this->Ini->date_delim . $this->datasaidalocacao . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " dataSaidaLocacao = " . $this->Ini->date_delim . $this->datasaidalocacao . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['horasaidalocacao']) && $NM_val_form['horasaidalocacao'] != $this->nmgp_dados_select['horasaidalocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " horaSaidaLocacao = " . $this->Ini->date_delim . $this->horasaidalocacao . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " horaSaidaLocacao = " . $this->Ini->date_delim . $this->horasaidalocacao . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['kmsaidalocacao']) && $NM_val_form['kmsaidalocacao'] != $this->nmgp_dados_select['kmsaidalocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " kmSaidaLocacao = $this->kmsaidalocacao"; 
                  $comando_oracle        .= " kmSaidaLocacao = $this->kmsaidalocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['dataretornolocacao']) && $NM_val_form['dataretornolocacao'] != $this->nmgp_dados_select['dataretornolocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " dataRetornoLocacao = " . $this->Ini->date_delim . $this->dataretornolocacao . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " dataRetornoLocacao = " . $this->Ini->date_delim . $this->dataretornolocacao . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['horaretornolocacao']) && $NM_val_form['horaretornolocacao'] != $this->nmgp_dados_select['horaretornolocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " horaRetornoLocacao = " . $this->Ini->date_delim . $this->horaretornolocacao . $this->Ini->date_delim1 . ""; 
                  $comando_oracle        .= " horaRetornoLocacao = " . $this->Ini->date_delim . $this->horaretornolocacao . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['kmretornolocacao']) && $NM_val_form['kmretornolocacao'] != $this->nmgp_dados_select['kmretornolocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " kmRetornoLocacao = $this->kmretornolocacao"; 
                  $comando_oracle        .= " kmRetornoLocacao = $this->kmretornolocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['qtddiarias']) && $NM_val_form['qtddiarias'] != $this->nmgp_dados_select['qtddiarias']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " qtdDiarias = $this->qtddiarias"; 
                  $comando_oracle        .= " qtdDiarias = $this->qtddiarias"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['descontolocacao']) && $NM_val_form['descontolocacao'] != $this->nmgp_dados_select['descontolocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " descontoLocacao = $this->descontolocacao"; 
                  $comando_oracle        .= " descontoLocacao = $this->descontolocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['valorliquidolocacao']) && $NM_val_form['valorliquidolocacao'] != $this->nmgp_dados_select['valorliquidolocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " valorLiquidoLocacao = $this->valorliquidolocacao"; 
                  $comando_oracle        .= " valorLiquidoLocacao = $this->valorliquidolocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['obslocacao']) && $NM_val_form['obslocacao'] != $this->nmgp_dados_select['obslocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " obsLocacao = '$this->obslocacao'"; 
                  $comando_oracle        .= " obsLocacao = '$this->obslocacao'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['statuslocacao']) && $NM_val_form['statuslocacao'] != $this->nmgp_dados_select['statuslocacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " statusLocacao = $this->statuslocacao"; 
                  $comando_oracle        .= " statusLocacao = $this->statuslocacao"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE idLocacao = $this->idlocacao ";  
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
                                  calendar_tblocacao_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->obslocacao = $this->obslocacao_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['db_changed'] = true;

              $this->NM_ajax_info['calendarReload'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idlocacao'])) { $this->idlocacao = $NM_val_form['idlocacao']; }
              elseif (isset($this->idlocacao)) { $this->nm_limpa_alfa($this->idlocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfkclientelocacao'])) { $this->idfkclientelocacao = $NM_val_form['idfkclientelocacao']; }
              elseif (isset($this->idfkclientelocacao)) { $this->nm_limpa_alfa($this->idfkclientelocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfkveiculolocacao'])) { $this->idfkveiculolocacao = $NM_val_form['idfkveiculolocacao']; }
              elseif (isset($this->idfkveiculolocacao)) { $this->nm_limpa_alfa($this->idfkveiculolocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['kmsaidalocacao'])) { $this->kmsaidalocacao = $NM_val_form['kmsaidalocacao']; }
              elseif (isset($this->kmsaidalocacao)) { $this->nm_limpa_alfa($this->kmsaidalocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['kmretornolocacao'])) { $this->kmretornolocacao = $NM_val_form['kmretornolocacao']; }
              elseif (isset($this->kmretornolocacao)) { $this->nm_limpa_alfa($this->kmretornolocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['qtddiarias'])) { $this->qtddiarias = $NM_val_form['qtddiarias']; }
              elseif (isset($this->qtddiarias)) { $this->nm_limpa_alfa($this->qtddiarias); }
              if     (isset($NM_val_form) && isset($NM_val_form['descontolocacao'])) { $this->descontolocacao = $NM_val_form['descontolocacao']; }
              elseif (isset($this->descontolocacao)) { $this->nm_limpa_alfa($this->descontolocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorliquidolocacao'])) { $this->valorliquidolocacao = $NM_val_form['valorliquidolocacao']; }
              elseif (isset($this->valorliquidolocacao)) { $this->nm_limpa_alfa($this->valorliquidolocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['obslocacao'])) { $this->obslocacao = $NM_val_form['obslocacao']; }
              elseif (isset($this->obslocacao)) { $this->nm_limpa_alfa($this->obslocacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['statuslocacao'])) { $this->statuslocacao = $NM_val_form['statuslocacao']; }
              elseif (isset($this->statuslocacao)) { $this->nm_limpa_alfa($this->statuslocacao); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idlocacao', 'idfkclientelocacao', 'idfkveiculolocacao', 'datasaidalocacao', 'horasaidalocacao', 'kmsaidalocacao', 'dataretornolocacao', 'horaretornolocacao', 'kmretornolocacao', 'qtddiarias', 'descontolocacao', 'valorliquidolocacao', 'statuslocacao', 'obslocacao'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idLocacao, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      calendar_tblocacao_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->statuslocacao != "")
                  { 
                       $compl_insert     .= ", statusLocacao";
                       $compl_insert_val .= ", $this->statuslocacao";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idFKclienteLocacao, idFKveiculoLocacao, dataSaidaLocacao, horaSaidaLocacao, kmSaidaLocacao, dataRetornoLocacao, horaRetornoLocacao, kmRetornoLocacao, qtdDiarias, descontoLocacao, valorLiquidoLocacao, obsLocacao $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfkclientelocacao, $this->idfkveiculolocacao, " . $this->Ini->date_delim . $this->datasaidalocacao . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horasaidalocacao . $this->Ini->date_delim1 . ", $this->kmsaidalocacao, " . $this->Ini->date_delim . $this->dataretornolocacao . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horaretornolocacao . $this->Ini->date_delim1 . ", $this->kmretornolocacao, $this->qtddiarias, $this->descontolocacao, $this->valorliquidolocacao, '$this->obslocacao' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->statuslocacao != "")
                  { 
                       $compl_insert     .= ", statusLocacao";
                       $compl_insert_val .= ", $this->statuslocacao";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idFKclienteLocacao, idFKveiculoLocacao, dataSaidaLocacao, horaSaidaLocacao, kmSaidaLocacao, dataRetornoLocacao, horaRetornoLocacao, kmRetornoLocacao, qtdDiarias, descontoLocacao, valorLiquidoLocacao, obsLocacao $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfkclientelocacao, $this->idfkveiculolocacao, " . $this->Ini->date_delim . $this->datasaidalocacao . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horasaidalocacao . $this->Ini->date_delim1 . ", $this->kmsaidalocacao, " . $this->Ini->date_delim . $this->dataretornolocacao . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->horaretornolocacao . $this->Ini->date_delim1 . ", $this->kmretornolocacao, $this->qtddiarias, $this->descontolocacao, $this->valorliquidolocacao, '$this->obslocacao' $compl_insert_val)"; 
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
                              calendar_tblocacao_mob_pack_ajax_response();
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
                  $this->idlocacao = $rsy->fields[0];
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
                  $this->idlocacao = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              $this->sc_evento = "insert"; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idlocacao = substr($this->Db->qstr($this->idlocacao), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idLocacao = $this->idlocacao"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idLocacao = $this->idlocacao "); 
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idLocacao = $this->idlocacao "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idLocacao = $this->idlocacao "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          calendar_tblocacao_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['parms'] = "idlocacao?#?$this->idlocacao?@?"; 
      }
      $this->NM_commit_db(); 
      if (('insert' == $this->sc_evento && 1 != $GLOBALS["erro_incl"]) || 'delete' == $this->sc_evento)
      {
          $this->calendarOutputReload();
          exit;
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idlocacao = substr($this->Db->qstr($this->idlocacao), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['parms'] = ""; 
          $nmgp_select = "SELECT idLocacao, idFKclienteLocacao, idFKveiculoLocacao, dataSaidaLocacao, horaSaidaLocacao, kmSaidaLocacao, dataRetornoLocacao, horaRetornoLocacao, kmRetornoLocacao, qtdDiarias, descontoLocacao, valorLiquidoLocacao, obsLocacao, statusLocacao from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "idLocacao = $this->idlocacao"; 
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
          $sc_order_by = "idLocacao";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter'] = true;
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
              $this->idlocacao = $rs->fields[0] ; 
              $this->nmgp_dados_select['idlocacao'] = $this->idlocacao;
              $this->idfkclientelocacao = $rs->fields[1] ; 
              $this->nmgp_dados_select['idfkclientelocacao'] = $this->idfkclientelocacao;
              $this->idfkveiculolocacao = $rs->fields[2] ; 
              $this->nmgp_dados_select['idfkveiculolocacao'] = $this->idfkveiculolocacao;
              $this->datasaidalocacao = $rs->fields[3] ; 
              $this->nmgp_dados_select['datasaidalocacao'] = $this->datasaidalocacao;
              $this->horasaidalocacao = $rs->fields[4] ; 
              $this->nmgp_dados_select['horasaidalocacao'] = $this->horasaidalocacao;
              $this->kmsaidalocacao = $rs->fields[5] ; 
              $this->nmgp_dados_select['kmsaidalocacao'] = $this->kmsaidalocacao;
              $this->dataretornolocacao = $rs->fields[6] ; 
              $this->nmgp_dados_select['dataretornolocacao'] = $this->dataretornolocacao;
              $this->horaretornolocacao = $rs->fields[7] ; 
              $this->nmgp_dados_select['horaretornolocacao'] = $this->horaretornolocacao;
              $this->kmretornolocacao = $rs->fields[8] ; 
              $this->nmgp_dados_select['kmretornolocacao'] = $this->kmretornolocacao;
              $this->qtddiarias = $rs->fields[9] ; 
              $this->nmgp_dados_select['qtddiarias'] = $this->qtddiarias;
              $this->descontolocacao = $rs->fields[10] ; 
              $this->nmgp_dados_select['descontolocacao'] = $this->descontolocacao;
              $this->valorliquidolocacao = $rs->fields[11] ; 
              $this->nmgp_dados_select['valorliquidolocacao'] = $this->valorliquidolocacao;
              $this->obslocacao = $rs->fields[12] ; 
              $this->nmgp_dados_select['obslocacao'] = $this->obslocacao;
              $this->statuslocacao = $rs->fields[13] ; 
              $this->nmgp_dados_select['statuslocacao'] = $this->statuslocacao;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idlocacao = (string)$this->idlocacao; 
              $this->idfkclientelocacao = (string)$this->idfkclientelocacao; 
              $this->idfkveiculolocacao = (string)$this->idfkveiculolocacao; 
              $this->kmsaidalocacao = (string)$this->kmsaidalocacao; 
              $this->kmretornolocacao = (string)$this->kmretornolocacao; 
              $this->qtddiarias = (string)$this->qtddiarias; 
              $this->descontolocacao = (string)$this->descontolocacao; 
              $this->valorliquidolocacao = (string)$this->valorliquidolocacao; 
              $this->statuslocacao = (string)$this->statuslocacao; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['parms'] = "idlocacao?#?$this->idlocacao?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
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
              $this->idlocacao = "";  
              $this->idfkclientelocacao = "";  
              $this->idfkveiculolocacao = "";  
              $this->datasaidalocacao = "";  
              $this->datasaidalocacao_hora = "" ;  
              $this->horasaidalocacao = "";  
              $this->horasaidalocacao_hora = "" ;  
              $this->kmsaidalocacao = "";  
              $this->dataretornolocacao = "";  
              $this->dataretornolocacao_hora = "" ;  
              $this->horaretornolocacao = "";  
              $this->horaretornolocacao_hora = "" ;  
              $this->kmretornolocacao = "";  
              $this->qtddiarias = "";  
              $this->descontolocacao = "";  
              $this->valorliquidolocacao = "";  
              $this->obslocacao = "";  
              $this->statuslocacao = "";  
              $this->__calend_all_day__ = "";  
              $this->formatado = false;
          }

          if (isset($this->sc_cal_click_date) && isset($this->sc_cal_click_time))
          {
              list($iTimestampIni, $iTimestampEnd) = $this->calendarInitTimestamp();

              $sTimeFormat1 = 'true' == $this->sc_cal_click_allday ? ''          : 'H:i:s';
              $sTimeFormat2 = 'true' == $this->sc_cal_click_allday ? ' 00:00:00' : ' H:i:s';

              $this->datasaidalocacao = date('Y-m-d', $iTimestampIni);
              $this->horasaidalocacao = date($sTimeFormat1, $iTimestampIni);
              $this->dataretornolocacao = date('Y-m-d', $iTimestampEnd);
              $this->horaretornolocacao = date($sTimeFormat1, $iTimestampEnd);
          }

          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['foreign_key'] as $sFKName => $sFKValue)
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
       $this->SC_log_arr['keys']['idlocacao'] =  $this->idlocacao;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['dados_select'];
           $this->SC_log_arr['fields']['idFKclienteLocacao']['0'] =  $nmgp_dados_select['idfkclientelocacao'];
           $this->SC_log_arr['fields']['idFKveiculoLocacao']['0'] =  $nmgp_dados_select['idfkveiculolocacao'];
           $this->SC_log_arr['fields']['dataSaidaLocacao']['0'] =  $nmgp_dados_select['datasaidalocacao'];
           $this->SC_log_arr['fields']['horaSaidaLocacao']['0'] =  $nmgp_dados_select['horasaidalocacao'];
           $this->SC_log_arr['fields']['kmSaidaLocacao']['0'] =  $nmgp_dados_select['kmsaidalocacao'];
           $this->SC_log_arr['fields']['dataRetornoLocacao']['0'] =  $nmgp_dados_select['dataretornolocacao'];
           $this->SC_log_arr['fields']['horaRetornoLocacao']['0'] =  $nmgp_dados_select['horaretornolocacao'];
           $this->SC_log_arr['fields']['kmRetornoLocacao']['0'] =  $nmgp_dados_select['kmretornolocacao'];
           $this->SC_log_arr['fields']['qtdDiarias']['0'] =  $nmgp_dados_select['qtddiarias'];
           $this->SC_log_arr['fields']['descontoLocacao']['0'] =  $nmgp_dados_select['descontolocacao'];
           $this->SC_log_arr['fields']['valorLiquidoLocacao']['0'] =  $nmgp_dados_select['valorliquidolocacao'];
           $this->SC_log_arr['fields']['obsLocacao']['0'] =  $nmgp_dados_select['obslocacao'];
           $this->SC_log_arr['fields']['statusLocacao']['0'] =  $nmgp_dados_select['statuslocacao'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['idFKclienteLocacao']['1'] =  $this->idfkclientelocacao;
       $this->SC_log_arr['fields']['idFKveiculoLocacao']['1'] =  $this->idfkveiculolocacao;
       $this->SC_log_arr['fields']['dataSaidaLocacao']['1'] =  $this->datasaidalocacao;
       $this->SC_log_arr['fields']['horaSaidaLocacao']['1'] =  $this->horasaidalocacao;
       $this->SC_log_arr['fields']['kmSaidaLocacao']['1'] =  $this->kmsaidalocacao;
       $this->SC_log_arr['fields']['dataRetornoLocacao']['1'] =  $this->dataretornolocacao;
       $this->SC_log_arr['fields']['horaRetornoLocacao']['1'] =  $this->horaretornolocacao;
       $this->SC_log_arr['fields']['kmRetornoLocacao']['1'] =  $this->kmretornolocacao;
       $this->SC_log_arr['fields']['qtdDiarias']['1'] =  $this->qtddiarias;
       $this->SC_log_arr['fields']['descontoLocacao']['1'] =  $this->descontolocacao;
       $this->SC_log_arr['fields']['valorLiquidoLocacao']['1'] =  $this->valorliquidolocacao;
       $this->SC_log_arr['fields']['obsLocacao']['1'] =  $this->obslocacao;
       $this->SC_log_arr['fields']['statusLocacao']['1'] =  $this->statuslocacao;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              calendar_tblocacao_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }

    if (('' == $this->horasaidalocacao || '00:00:00' == $this->horasaidalocacao) && ('' == $this->horaretornolocacao || '00:00:00' == $this->horaretornolocacao))
    {
        $this->__calend_all_day__ = 'Y';
    }

    include_once("calendar_tblocacao_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function calendarOutputDisplay()
   {
       if (isset($_SESSION['scriptcase']['reg_conf']['date_format']) && '' != $_SESSION['scriptcase']['reg_conf']['date_format'])
       {
           $iPosDay     = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'd');
           $iPosMonth   = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'm');
           $sCalDateCol = (false !== $iPosDay && false !== $iPosMonth && $iPosDay > $iPosMonth) ? 'M/d' : 'd/M';
       }
       else
       {
           $sCalDateCol = 'M/d';
       }

       $iFirstDay = isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && '' != $_SESSION['scriptcase']['reg_conf']['date_week_ini'] ? array_search($_SESSION['scriptcase']['reg_conf']['date_week_ini'], array('SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA')) : false;
       $iFirstDay = false === $iFirstDay ? 0 : $iFirstDay;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <title></title>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/fullcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <script type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
 </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/fullcalendar.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/gcal.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <script type="text/javascript">
  function calendar_reload() {
    $('#calendar').fullCalendar('refetchEvents');
  }
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      dayNamesShort: ["<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      allDayText: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      buttonText: {
        today: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        month: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        week: "<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);        ?>",
        day: "<?php    echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);         ?>",
        agenda: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        print: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>"
      },
      columnFormat: {
        month: 'ddd',
        week: 'ddd <?php echo $sCalDateCol; ?>',
        day: 'dddd <?php echo $sCalDateCol; ?>'
      },
      firstDay: <?php echo $iFirstDay; ?>,
      header: {
        left: 'prev,next today print',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,scAgenda'
      },
      printUrl: "calendar_tblocacao_mob.php",
      editable: <?php echo ($this->calendarConfigValues['update'] ? 'true' : 'false'); ?>,
      events: 'calendar_tblocacao_mob.php?nmgp_opcao=calendar_fetch',
      dayClick: function(date, allDay, jsEvent, view) {
<?php
       if ($this->calendarConfigValues['insert'])
       {
?>
        var sDate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate(),
            sTime = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scAddNewEvent(sDate, sTime, allDay);
<?php
}
else
{
?>
        tb_show('', 'calendar_tblocacao_mob.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
<?php
       }
?>
      },
      eventClick: function(calEvent, jsEvent, view) {
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scEditEvent(calEvent.id);
<?php
}
else
{
?>
        tb_show('', 'calendar_tblocacao_mob.php?nmgp_opcao=igual&idlocacao=' + calEvent.id + '&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
      },
      eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
        $.ajax({
          url: 'calendar_tblocacao_mob.php',
          type: 'POST',
          dataType: 'json',
          data: { 'nmgp_opcao': 'calendar_drop', 'sc_event_id': event.id, 'sc_day_delta': dayDelta, 'sc_time_delta': minuteDelta, 'sc_all_day': allDay, 'sc_all_day_before': event.originalAllDay },
          originalEvent: event,
          success: function(data) {
            var bChanged = false;
            if (false == data['status']) {
              revertFunc();
            }
            else {
              if ('' != data['backgroundColor']) {
                if (this.originalEvent.backgroundColor != data['backgroundColor']) {
                  bChanged = true;
                }
                this.originalEvent.backgroundColor = data['backgroundColor'];
              }
              if ('' != data['borderColor']) {
                if (this.originalEvent.borderColor != data['borderColor']) {
                  bChanged = true;
                }
                this.originalEvent.borderColor = data['borderColor'];
              }
              if (this.originalEvent.allDay || this.originalEvent.originalAllDay || bChanged) {
                $('#calendar').fullCalendar('refetchEvents');
              }
              else {
                $('#calendar').fullCalendar('updateEvent', this.originalEvent);
              }
            }
            if ('' != data['message']) {
              alert(data['message']);
            }
          }
        });
      },
      eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) {
        $.post(
          'calendar_tblocacao_mob.php',
          { 'nmgp_opcao': 'calendar_resize', 'sc_event_id': event.id, 'sc_day_delta': dayDelta, 'sc_time_delta': minuteDelta },
          function(data) {
            if (false == data['status']) {
              revertFunc();
            }
            if ('' != data['message']) {
              alert(data['message']);
            }
          },
          'json'
        );
      },
      defaultView: 'month',
      axisFormat: 'H:mm',
      timeFormat: 'H:mm'
    });
  });
  function scAddNewEvent(sDate, sTime, allDay) {
    $("#sc-ui-nmgp_opcao").val("edit_novo");
    $("#sc-ui-click-date").val(sDate);
    $("#sc-ui-click-time").val(sTime);
    $("#sc-ui-click-allday").val(allDay);
    $("#sc-ui-form").submit();
  }
  function scEditEvent(sEventId) {
    $("#sc-ui-nmgp_opcao").val("igual");
    $("#sc-ui-event-id").val(sEventId);
    $("#sc-ui-form").submit();
  }
 </script>
</head>
<body class="scAppCalendarPage">
<div id="calendar"></div>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
<form name="F1" id="sc-ui-form" method="post"
      action="calendar_tblocacao.php"
      target="_self">
 <input type="hidden" name="nm_form_submit" value="1" />
 <input type="hidden" name="nmgp_url_saida" value="" />
 <input type="hidden" name="nmgp_opcao" id="sc-ui-nmgp_opcao" value="" />
 <input type="hidden" name="nmgp_parms" value="" />
 <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
 <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>" />
 <input type="hidden" name="sc_cal_click_date" id="sc-ui-click-date" value="" />
 <input type="hidden" name="sc_cal_click_time" id="sc-ui-click-time" value="" />
 <input type="hidden" name="sc_cal_click_allday" id="sc-ui-click-allday" value="" />
 <input type="hidden" name="idlocacao" id="sc-ui-event-id" value="" />
</form>
<?php
}

?>
</body>
</html>
<?php
   } // calendarOutputDisplay

   function calendarOutputJson($events)
   {
       if (!isset($_GET['nmgp_opcao']) || ($_GET['nmgp_opcao'] != 'igual' && $_GET['nmgp_opcao'] != 'edit_novo'))
       {
            $Temp = ob_get_clean();
       }
       $oJson = new Services_JSON();
       echo $oJson->encode($events);
   } // calendarOutputJson

   function calendarOutputReload()
   {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
<form name="fsai" method="post" action="<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>">
<input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($script_case_init); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
</form>
<SCRIPT LANGUAGE="Javascript">
   nm_ver_saida = "<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>";
   nm_ver_saida = nm_ver_saida.toLowerCase();
   if (nm_ver_saida.substr(0, 4) != ".php" && (nm_ver_saida.substr(0, 7) == "http://" || nm_ver_saida.substr(0, 8) == "https://" || nm_ver_saida.substr(0, 3) == "../")) 
   { 
       window.location = ("<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>"); 
   } 
   else 
   { 
       document.fsai.submit();
   } 
</SCRIPT>
</head>
<body>
</body>
</html>
<?php
   } // calendarOutputReload

   function calendarFetchEvents($sId = '', $bPrintCalendar = false)
   {
       $aEvents = $this->calendarFetchNormalEvents($sId, $bPrintCalendar);

       foreach ($aEvents as $iEvent => $aEventData)
       {
           if ($aEventData['start'] < date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorPast'];
           }
           elseif ($aEventData['start'] > date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorFuture'];
           }
           else
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorToday'];
           }
       }

       return $aEvents;
   } // calendarFetchEvents

   function calendarFetchNormalEvents($sId, $bPrintCalendar = false)
   {
       $aSelect = $this->calendarFetchSelect();

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $this->calendarWhere($sId, false, $bPrintCalendar);
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
                   $this->idfkveiculolocacao = $aEvent['title'];
                   $this->ajax_return_values_idfkveiculolocacao(true);
                   $aEvent['title'] = $this->_tmp_lookup_idfkveiculolocacao;
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           $aEvents[] = $aEvent;

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchNormalEvents

   function calendarFetchRecurrentEvents($sId, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return array();
       }

       $aSelect = $this->calendarFetchSelect();

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $this->calendarWhere($sId, true, $bPrintCalendar);
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (!$bPrintCalendar)
       {
           $sStart = isset($_GET['start']) && '' != $_GET['start'] ? date('Ymd', $_GET['start']) : '';
           $sEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? date('Ymd', $_GET['end'])   : '';
       }
       else
       {
           $sStart = isset($_GET['start']) && '' != $_GET['start'] ? str_replace('-', '', $_GET['start']) : '';
           $sEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? str_replace('-', '', $_GET['end'])   : '';
       }

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
                   $this->idfkveiculolocacao = $aEvent['title'];
                   $this->ajax_return_values_idfkveiculolocacao(true);
                   $aEvent['title'] = $this->_tmp_lookup_idfkveiculolocacao;
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           switch ($aEvent['period'])
           {
               case '':
                   $this->calendarRecurrentDay($aEvents, $aEvent, $sStart, $sEnd);
                   break;

               case '':
                   $this->calendarRecurrentWeek($aEvents, $aEvent, $sStart, $sEnd);
                   break;

               case '':
                   $this->calendarRecurrentMonth($aEvents, $aEvent, $sStart, $sEnd);
                   break;

               case '':
                   $this->calendarRecurrentYear($aEvents, $aEvent, $sStart, $sEnd);
                   break;
           }

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchRecurrentEvents

   function calendarFetchSelect()
   {
       $aSelect = array();

       $aSelect['id'] = "idLocacao";

       $aSelect['title'] = "idFKveiculoLocacao";

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start'] = "convert(char(23),dataSaidaLocacao,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start'] = "str_replace(convert(char(10),dataSaidaLocacao,102), '.', '-') + ' ' + convert(char(8),dataSaidaLocacao,20)";
       }
       else
       {
           $aSelect['start'] = "dataSaidaLocacao";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end'] = "convert(char(23),dataRetornoLocacao,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end'] = "str_replace(convert(char(10),dataRetornoLocacao,102), '.', '-') + ' ' + convert(char(8),dataRetornoLocacao,20)";
       }
       else
       {
           $aSelect['end'] = "dataRetornoLocacao";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start_time'] = "convert(char(23),horaSaidaLocacao,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start_time'] = "str_replace(convert(char(10),horaSaidaLocacao,102), '.', '-') + ' ' + convert(char(8),horaSaidaLocacao,20)";
       }
       else
       {
           $aSelect['start_time'] = "horaSaidaLocacao";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end_time'] = "convert(char(23),horaRetornoLocacao,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end_time'] = "str_replace(convert(char(10),horaRetornoLocacao,102), '.', '-') + ' ' + convert(char(8),horaRetornoLocacao,20)";
       }
       else
       {
           $aSelect['end_time'] = "horaRetornoLocacao";
       }

       $aSelect['idfkclientelocacao'] = "idFKclienteLocacao";

       $aSelect['qtddiarias'] = "qtdDiarias";

       $aSelect['valorliquidolocacao'] = "valorLiquidoLocacao";

       $aSelect['obslocacao'] = "obsLocacao";

       return $aSelect;
   } // calendarFetchSelect

   function calendarWhere($sId, $bRecur, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return " WHERE idLocacao = '" . $sId . "'";
       }

       $aWhere = array();

       $sStart = isset($_GET['start']) && '' != $_GET['start'] ? $_GET['start'] : '';
       $sEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? $_GET['end']   : '';

       if ('' != $sStart && '' != $sEnd)
       {
           if (!$bPrintCalendar)
           {
               $s_Ini_StartFormat = date('Y-m-d', $sStart);
               $s_Ini_EndFormat   = date('Y-m-d', $sEnd);
           }
           else
           {
               $s_Ini_StartFormat = $sStart;
               $s_Ini_EndFormat   = $sEnd;
           }
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
           {
               $aWhere[] = "convert(char(23),dataSaidaLocacao,121) >= '" . $s_Ini_StartFormat . "' AND convert(char(23),dataSaidaLocacao,121) <= '" . $s_Ini_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
           {
               $aWhere[] = "str_replace(convert(char(10),dataSaidaLocacao,102), '.', '-') + ' ' + convert(char(8),dataSaidaLocacao,20) >= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),dataSaidaLocacao,102), '.', '-') + ' ' + convert(char(8),dataSaidaLocacao,20) <= '" . $s_Ini_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
           {
               $aWhere[] = "dataSaidaLocacao >= #" . $s_Ini_StartFormat . "# AND dataSaidaLocacao <= #" . $s_Ini_EndFormat . "#";
           }
           else
           {
               $aWhere[] = "dataSaidaLocacao >= '" . $s_Ini_StartFormat . "' AND dataSaidaLocacao <= '" . $s_Ini_EndFormat . "'";
           }

           if (!$bPrintCalendar)
           {
               $s_Fin_StartFormat = date('Y-m-d', $sStart);
               $s_Fin_EndFormat   = date('Y-m-d', $sEnd);
           }
           else
           {
               $s_Fin_StartFormat = $sStart;
               $s_Fin_EndFormat   = $sEnd;
           }
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
           {
               $aWhere[] = "convert(char(23),dataRetornoLocacao,121) >= '" . $s_Fin_StartFormat . "' AND convert(char(23),dataRetornoLocacao,121) <= '" . $s_Fin_EndFormat . "'";
               $aWhere[] = "convert(char(23),dataSaidaLocacao,121) <= '" . $s_Ini_StartFormat . "' AND convert(char(23),dataRetornoLocacao,121) >= '" . $s_Fin_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
           {
               $aWhere[] = "str_replace(convert(char(10),dataRetornoLocacao,102), '.', '-') + ' ' + convert(char(8),dataRetornoLocacao,20) >= '" . $s_Fin_StartFormat . "' AND str_replace(convert(char(10),dataRetornoLocacao,102), '.', '-') + ' ' + convert(char(8),dataRetornoLocacao,20) <= '" . $s_Fin_EndFormat . "'";
               $aWhere[] = "str_replace(convert(char(10),dataSaidaLocacao,102), '.', '-') + ' ' + convert(char(8),dataSaidaLocacao,20) <= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),dataRetornoLocacao,102), '.', '-') + ' ' + convert(char(8),dataRetornoLocacao,20) >= '" . $s_Fin_EndFormat . "'";
           }
           elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
           {
               $aWhere[] = "dataRetornoLocacao >= #" . $s_Fin_StartFormat . "# AND dataRetornoLocacao <= #" . $s_Fin_EndFormat . "#";
               $aWhere[] = "dataSaidaLocacao <= #" . $s_Ini_StartFormat . "# AND dataRetornoLocacao >= #" . $s_Fin_EndFormat . "#";
           }
           else
           {
               $aWhere[] = "dataRetornoLocacao >= '" . $s_Fin_StartFormat . "' AND dataRetornoLocacao <= '" . $s_Fin_EndFormat . "'";
               $aWhere[] = "dataSaidaLocacao <= '" . $s_Ini_StartFormat . "' AND dataRetornoLocacao >= '" . $s_Fin_EndFormat . "'";
           }
       }

       $aFinal = array('(' . implode(') OR (', $aWhere) . ')');

       $cWhere = array();
       $sc_where_filter = '';
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form'])
       {
           $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'])
       {
           if (empty($sc_where_filter))
           {
               $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'];
           }
           else
           {
               $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'] . ")";
           }
       }
       $cWhere[] = $sc_where_filter;
       $wUsr     = $this->returnWhere($cWhere);
       if (!empty($wUsr))
       {
           $aFinal[] = substr(trim($wUsr), 5);
       }

       return empty($aWhere) && empty($cWhere) ? '' : ' WHERE (' . implode(') AND (', $aFinal) . ')';
   } // calendarWhere

   function calendarRecurrentDay(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           if (false === $iEndDate)
           {
               $iEndDate = $iStartDate;
           }
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddDay($sOrigDate, $i);
           $i++;
       }
   } // calendarRecurrentDay

   function calendarRecurrentWeek(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           if (false === $iEndDate)
           {
               $iEndDate = $iStartDate;
           }
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddDay($sOrigDate, $i * 7);
           $i++;
       }
   } // calendarRecurrentWeek

   function calendarRecurrentMonth(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           if (false === $iEndDate)
           {
               $iEndDate = $iStartDate;
           }
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddMonth($sOrigDate, $i);
           $i++;
       }
   } // calendarRecurrentMonth

   function calendarRecurrentYear(&$aEvents, $aEvent, $sStart, $sEnd)
   {
       $iStartDate = $this->calendarStartToTimestamp($aEvent);
       $sOrigDate  = date('Ymd', $iStartDate);
       $sStartDate = date('Ymd', $iStartDate);
       $sStartTime = date('His', $iStartDate);

       $i = 1;
       while ($sStartDate < $sEnd)
       {
           $iEndDate = $this->calendarEndToTimestamp($aEvent);
           $sEndDate = date('Ymd', $iEndDate);
           $sEndTime = date('His', $iEndDate);

           if ($sStart < $sStartDate && $sEnd > $sStartDate && $sStartDate <= $sEndDate)
           {
               $aNewEvent = $aEvent;
               $this->calendarTimestampToStart($aNewEvent, $this->calendarGetMktime($sStartDate, $sStartTime));
               $this->calendarTimestampToEnd($aNewEvent, $this->calendarGetMktime($sStartDate, $sEndTime));

               $aEvents[] = $aNewEvent;
           }

           $sStartDate = $this->calendarRecurrentAddYear($sOrigDate, $i);
           $i++;
       }
   } // calendarRecurrentYear

   function calendarRecurrentAddDay($sDate, $iAdd)
   {
       $iDate = $this->calendarGetMktime($sDate, '000000', $iAdd);

       return date('Ymd', $iDate);
   } // calendarRecurrentAddDay

   function calendarRecurrentAddMonth($sDate, $iAdd)
   {
       $iYear  = (integer) substr($sDate, 0, 4);
       $iMonth = (integer) substr($sDate, 4, 2) + $iAdd;
       $iDay   = (integer) substr($sDate, 6, 2);

       while (12 < $iMonth)
       {
           $iMonth -= 12;
           $iYear++;
       }

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 28 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (2 == $iMonth && $this->calendarIsLeapYear($iYear) && 29 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (in_array($iMonth, array(4, 6, 9, 11)) && 31 == $iDay)
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . '30';
       }
       else
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . substr($sDate, 6);
       }

       return $sDate;
   } // calendarRecurrentAddMonth

   function calendarRecurrentAddYear($sDate, $iAdd)
   {
       $iYear  = substr($sDate, 0, 4) + $iAdd;
       $iMonth = (integer) substr($sDate, 4, 2);
       $iDay   = (integer) substr($sDate, 6, 2);

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 29 == $iDay)
       {
           $sDate = $iYear . '0228';
       }
       else
       {
           $sDate = $iYear . substr($sDate, 4);
       }

       return $sDate;
   } // calendarRecurrentAddYear

   function calendarIsLeapYear(&$iYear)
   {
       if ($iYear % 4 != 0)
       {
           return false;
       }
       else
       {
           if ($iYear % 100 != 0)
           {
               return true;
           }
           else
           {
               if ($iYear % 400 != 0)
               {
                   return false;
               }
               else
               {
                   return true;
               }
           }
       }
   } // calendarIsLeapYear

   function calendarHandleEvents($aEvents)
   {
       foreach ($aEvents as $i => $aEventData)
       {
           if (false !== strpos($aEventData['start'], ' '))
           {
               $aTemp               = explode(' ', $aEventData['start']);
               $aEventData['start'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['start_time'], ' '))
           {
               $aTemp                    = explode(' ', $aEventData['start_time']);
               $aEventData['start_time'] = $aTemp[1];
           }
           elseif (8 < strlen($aEventData['start_time']))
           {
               $aEventData['start_time'] = substr($aEventData['start_time'], 0, 8);
           }
           if (false !== strpos($aEventData['end'], ' '))
           {
               $aTemp             = explode(' ', $aEventData['end']);
               $aEventData['end'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['end_time'], ' '))
           {
               $aTemp                  = explode(' ', $aEventData['end_time']);
               $aEventData['end_time'] = $aTemp[1];
           }
           elseif (8 < strlen($aEventData['end_time']))
           {
               $aEventData['end_time'] = substr($aEventData['end_time'], 0, 8);
           }

           $aEvents[$i] = $aEventData;
       }

       return $aEvents;
   } // calendarHandleEvents

   function calendarNormalizeEvents($aEvents)
   {
       $aEvents = $this->calendarHandleEvents($aEvents);

       foreach ($aEvents as $i => $aEventData)
       {
           if ((isset($aEventData['id']) && '' == $aEventData['id']) || (isset($aEventData['title']) && '' == $aEventData['title']) || (isset($aEventData['start']) && '' == $aEventData['start']))
           {
               unset($aEvents[$i]);
           }
           else
           {

               $bStartTime = false;
               $bEndTime   = false;

               if (isset($aEventData['start_time']) && '' == $aEventData['start_time'])
               {
                   unset($aEventData['start_time']);
               }

               if (isset($aEventData['end']) && '' == $aEventData['end'])
               {
                   unset($aEventData['end']);
                   unset($aEventData['end_time']);
               }
               elseif (isset($aEventData['end_time']) && '' == $aEventData['end_time'])
               {
                   unset($aEventData['end_time']);
               }

               if (isset($aEventData['start']) && isset($aEventData['start_time']))
               {
                   $aEventData['start'] .= ' ' . $aEventData['start_time'];
                   unset($aEventData['start_time']);
                   $bStartTime = true;
               }
               if (isset($aEventData['end']) && isset($aEventData['end_time']))
               {
                   $aEventData['end'] .= ' ' . $aEventData['end_time'];
                   unset($aEventData['end_time']);
                   $bEndTime = true;
               }

               if ($bStartTime && $bEndTime)
               {
                   $aEventData['allDay'] = false;
               }

               $aEvents[$i] = $aEventData;
           }
       }

       return $aEvents;
   } // calendarNormalizeEvents

   function calendarPrintEvents($aEvents)
   {
       $aEventHtml = array();
       $sPrintHtml = '';
       $sLastDay   = '';

       $sPrintHtml .= "<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\n";
       $sPrintHtml .= "<head>\n";
       $sPrintHtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar.css\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\n";
       $sPrintHtml .= "<style type=\"text/css\">\n";
       $sPrintHtml .= ".sc-ui-cal-time { padding-left: 20px }\n";
       $sPrintHtml .= ".sc-ui-cal-event { padding-left: 35px }\n";
       $sPrintHtml .= "</style>\n";
       $sPrintHtml .= "</head>\n";
       $sPrintHtml .= "<body>\n";

       $sPrintHtml .= "" . $this->Ini->Nm_lang['lang_events_order'] . "<hr style=\"border-style: solid; border-width: 1px 0 0 0\"/><br />\n";
       foreach ($this->calendarPrintSort($aEvents) as $aEventData)
       {
           $aStartInfo = explode(' ', $aEventData['start']);
           $aEndInfo   = explode(' ', $aEventData['end']);
           if (!isset($aStartInfo[1]))
           {
               $aStartInfo[1] = '';
           }
           if (!isset($aEndInfo[1]))
           {
               $aEndInfo[1] = '';
           }

           $sEventHtml = '';

           if ('' == $sLastDay || $aStartInfo[0] != $sLastDay)
           {
               $sEventHtml .= '<div class="scCalendarPrintDate">' . sc_convert_encoding($this->calendarPrintFormatDate($aStartInfo[0]), 'UTF-8', $_SESSION['scriptcase']['charset']) . "</div>\n";
               $sLastDay = $aStartInfo[0];
           }
           $sEventHtml .= '<div class="scCalendarPrintTime sc-ui-cal-time">';
           if ('' == $aStartInfo[1])
           {
               $sEventHtml .= sc_convert_encoding($this->Ini->Nm_lang['lang_per_allday'], 'UTF-8', $_SESSION['scriptcase']['charset']);
           }
           elseif ($aEventData['start'] == $aEventData['end'])
           {
               $sEventHtml .= $aStartInfo[1];
           }
           else
           {
               $sEventHtml .= $aStartInfo[1] . ' ' . sc_convert_encoding($this->Ini->Nm_lang['lang_othr_txto'], 'UTF-8', $_SESSION['scriptcase']['charset']) . ' ' . $aEndInfo[1];
           }
           $sEventHtml .= "</div>\n";
           $sEventHtml .= '<div class="scCalendarPrintEvent sc-ui-cal-event">';
           $sEventHtml .= $aEventData['title'];
           if (isset($aEventData['idfkclientelocacao']) && '' != $aEventData['idfkclientelocacao'])
           {
               $sEventHtml .= "<br />" . sc_convert_encoding($aEventData['idfkclientelocacao'], 'UTF-8', $_SESSION['scriptcase']['charset']) . "\n";
           }
           if (isset($aEventData['qtddiarias']) && '' != $aEventData['qtddiarias'])
           {
               $sEventHtml .= "<br />" . sc_convert_encoding($aEventData['qtddiarias'], 'UTF-8', $_SESSION['scriptcase']['charset']) . "\n";
           }
           if (isset($aEventData['valorliquidolocacao']) && '' != $aEventData['valorliquidolocacao'])
           {
               $sEventHtml .= "<br />" . sc_convert_encoding($aEventData['valorliquidolocacao'], 'UTF-8', $_SESSION['scriptcase']['charset']) . "\n";
           }
           if (isset($aEventData['obslocacao']) && '' != $aEventData['obslocacao'])
           {
               $sEventHtml .= "<br />" . sc_convert_encoding($aEventData['obslocacao'], 'UTF-8', $_SESSION['scriptcase']['charset']) . "\n";
           }
           $sEventHtml .= "</div>\n";

           $aEventHtml[] = $sEventHtml;
       }

       $sPrintHtml .= implode('<br />', $aEventHtml);

       $sPrintHtml .= "</body>\n";
       $sPrintHtml .= "</html>\n";

       $sTmpFile  = $this->Ini->path_imag_temp . '/sc_cal_print' . md5(session_id() . microtime()) . '.html';
       $rHtmlFile = @fopen($this->Ini->root . $sTmpFile, 'w');
       if ($rHtmlFile)
       {
           @fwrite($rHtmlFile, $sPrintHtml);
           @fclose($rHtmlFile);
           return array('outputFormat' => 'file', 'fileHtml' => $sTmpFile);
       }
       else
       {
           return array('outputFormat' => 'html', 'printHtml' => $sPrintHtml);
       }
   } // calendarPrintEvents

   function calendarPrintSort($aEvents)
   {
       $aUnsortedEvents = array();
       $aSortedEvents   = array();

       foreach ($aEvents as $aEventData)
       {
           if (!isset($aUnsortedEvents[ $aEventData['start'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ] = array();
           }
           if (!isset($aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ] = array();
           }
           $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ][] = $aEventData;
       }

       ksort($aUnsortedEvents);
       foreach ($aUnsortedEvents as $aEventsEnd)
       {
           ksort($aEventsEnd);
           foreach ($aEventsEnd as $aEventList)
           {
               foreach ($aEventList as $aEventData)
               {
                   $aSortedEvents[] = $aEventData;
               }
           }
       }

       return $aSortedEvents;
   } // calendarPrintSort

   function calendarPrintFormatDate($sDate)
   {
       $aDateTime     = explode(' ', $sDate);
       $aDateParts    = explode('-', $aDateTime[0]);
       $iMktime       = mktime(0, 0, 0, $aDateParts[1], $aDateParts[2], $aDateParts[0]);
       $sFormatString = "l, d \\d\\e F \\d\\e Y";
       $sFormatted    = '';
       $bSlash        = false;

       for ($i = 0; $i < strlen($sFormatString); $i++)
       {
           $sFormatChar = $sFormatString[$i];
           if (!$bSlash && "\\" == $sFormatChar)
           {
               $bSlash = true;
           }
           elseif ($bSlash)
           {
               $bSlash      = false;
               $sFormatChar = "\\" . $sFormatString[$i];
           }
           if ($bSlash)
           {
               continue;
           }
           elseif ('D' == $sFormatChar || 'l' == $sFormatChar)
           {
               $sWeekDay = date('w', $iMktime);
               $sShort   = 'D' == $sFormatChar ? 'shrt_' : '';
               switch ($sWeekDay)
               {
                   case '0':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '1':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           elseif ('F' == $sFormatChar || 'M' == $sFormatChar)
           {
               $sShort = 'M' == $sFormatChar ? 'shrt_' : '';
               switch ($aDateParts[1])
               {
                   case '1':
                   case '01':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                   case '02':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                   case '03':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                   case '04':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                   case '05':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                   case '06':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '7':
                   case '07':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '8':
                   case '08':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '9':
                   case '09':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '10':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '11':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '12':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           else
           {
               $sFormatted .= date($sFormatChar, $iMktime);
           }
       }

       return $sFormatted;
   } // calendarPrintFormatDate

   function calendarUpdateEvent($sOp, $sId, $iDays, $iMinutes, $bAllDay, $bAllDayBefore)
   {
       $aEvents = $this->calendarFetchEvents($sId);
       if (1 != sizeof($aEvents))
       {
           return array('status' => false, 'message' => 'Erro ao recuperar informacoes do evento');
       }
       $aEvent = $aEvents[0];

       $iStart = $this->calendarStartToTimestamp($aEvent);
       $iEnd   = $this->calendarEndToTimestamp($aEvent);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data inicial');
       }
       elseif (false === $iEnd)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data final');
       }

       $iStart += ('move' == $sOp) ? ($iDays * 86400) + ($iMinutes * 60) : $iDays * 86400;
       if ($bAllDayBefore)
       {
           $iEnd = $iStart + 7200;
       }
       else
       {
           $iEnd += ($iDays * 86400) + ($iMinutes * 60);
       }

       $this->calendarTimestampToStart($aEvent, $iStart, $bAllDay);
       $this->calendarTimestampToEnd($aEvent, $iEnd, $bAllDay);

       if ('' == $aEvent['start'])
       {
           $aEvent['start'] = 'null';
       }
       if ('' == $aEvent['start_time'])
       {
           $aEvent['start_time'] = 'null';
       }
       if ('' == $aEvent['end'])
       {
           $aEvent['end'] = 'null';
       }
       if ('' == $aEvent['end_time'])
       {
           $aEvent['end_time'] = 'null';
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET dataSaidaLocacao = #" . $aEvent['start'] . "#, horaSaidaLocacao = #" . $aEvent['start_time'] . "#, dataRetornoLocacao = #" . $aEvent['end'] . "#, horaRetornoLocacao = #" . $aEvent['end_time'] . "#" . $this->calendarWhere($sId);
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET dataSaidaLocacao = EXTEND(dataSaidaLocacao, YEAR TO DAY), dataRetornoLocacao = EXTEND(dataRetornoLocacao, YEAR TO DAY)" . $this->calendarWhere($sId);
       }
       else
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET dataSaidaLocacao = '" . $aEvent['start'] . "', horaSaidaLocacao = '" . $aEvent['start_time'] . "', dataRetornoLocacao = '" . $aEvent['end'] . "', horaRetornoLocacao = '" . $aEvent['end_time'] . "'" . $this->calendarWhere($sId);
       }

       $sSql = str_replace(array('#null#', "'null'"), array('null', 'null'), $sSql);

       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na atualizacao do evento');
       }

       $aReturn = array('status' => true, 'message' => '');

       if ($aEvent['start_only'] < date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorPast'];
       }
       elseif ($aEvent['start_only'] > date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorFuture'];
       }
       else
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorToday'];
       }

       return $aReturn;
   } // calendarUpdateEvent

   function calendarStartToTimestamp($aEvent)
   {
       if (!isset($aEvent['start']) || '' == $aEvent['start'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['start'], 0, 4);
       $iMonth = (integer) substr($aEvent['start'], 5, 2);
       $iDay   = (integer) substr($aEvent['start'], 8, 2);

       if (!isset($aEvent['start_time']) || '' == $aEvent['start_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['start_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['start_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['start_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarEndToTimestamp($aEvent)
   {
       if (!isset($aEvent['end']) || '' == $aEvent['end'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['end'], 0, 4);
       $iMonth = (integer) substr($aEvent['end'], 5, 2);
       $iDay   = (integer) substr($aEvent['end'], 8, 2);

       if (!isset($aEvent['end_time']) || '' == $aEvent['end_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['end_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['end_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['end_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarEndToTimestamp

   function calendarTimestampToStart(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['start_only'] = date('Y-m-d', $iTimestamp);
       $aEvent['start']      = date('Y-m-d', $iTimestamp);
       $aEvent['start_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToStart

   function calendarTimestampToEnd(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['end']      = date('Y-m-d', $iTimestamp);
       $aEvent['end_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToEnd

   function calendarGetMktime($sDate, $sTime, $iAddDay = 0)
   {
       return mktime( (integer) substr($sTime, 0, 2),
                      (integer) substr($sTime, 2, 2),
                      (integer) substr($sTime, 4, 2),
                      (integer) substr($sDate, 4, 2),
                     ((integer) substr($sDate, 6, 2)) + $iAddDay,
                      (integer) substr($sDate, 0, 4));
   } // calendarGetMktime

   function calendarDragDrop()
   {
       return $this->calendarUpdateEvent('move', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, 'true' == $this->sc_all_day, 'true' == $this->sc_all_day_before);
   } // calendarDragDrop

   function calendarResize()
   {
       return $this->calendarUpdateEvent('resize', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, false, false);
   } // calendarDragDrop

   function calendarRemoveTime(&$iTimestamp)
   {
       $iTimestamp = mktime(0, 0, 0, date('m', $iTimestamp), date('d', $iTimestamp), date('Y', $iTimestamp));
   } // calendarRemoveTime

   function calendarInitTimestamp()
   {
       $aDate = explode('-', $this->sc_cal_click_date);
       $aTime = 'true' == $this->sc_cal_click_allday ? array(0, 0, 0) : explode(':', $this->sc_cal_click_time);

       $iInit = mktime($aTime[0], $aTime[1], $aTime[2], $aDate[1], $aDate[2], $aDate[0]);
       $iEnd  = 'true' == $this->sc_cal_click_allday ? $iInit : $iInit + 7200;

       return array($iInit, $iEnd);
   } // calendarInitTimestamp

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              calendar_tblocacao_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "idLocacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idfkclientelocacao($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idFKclienteLocacao", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idfkveiculolocacao($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idFKveiculoLocacao", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "kmSaidaLocacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "kmRetornoLocacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qtdDiarias", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "descontoLocacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorLiquidoLocacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_statuslocacao($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "statusLocacao", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "obsLocacao", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_calendar_tblocacao_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['total'] = $qt_geral_reg_calendar_tblocacao_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          calendar_tblocacao_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          calendar_tblocacao_mob_pack_ajax_response();
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
      $nm_numeric[] = "idlocacao";$nm_numeric[] = "idfkclientelocacao";$nm_numeric[] = "idfkveiculolocacao";$nm_numeric[] = "kmsaidalocacao";$nm_numeric[] = "kmretornolocacao";$nm_numeric[] = "qtddiarias";$nm_numeric[] = "descontolocacao";$nm_numeric[] = "valorliquidolocacao";$nm_numeric[] = "statuslocacao";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['decimal_db'] == ".")
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
      $Nm_datas['datasaidalocacao'] = "date";$Nm_datas['horasaidalocacao'] = "time";$Nm_datas['dataretornolocacao'] = "date";$Nm_datas['horaretornolocacao'] = "time";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['SC_sep_date1'];
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "calendar_tblocacao_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "calendar_tblocacao_mob_fim.php";
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
       calendar_tblocacao_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_tblocacao_mob']['masterValue']);
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
