<?php
//
class form_tbcontasPagar_apl
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
                                'navPage'        => array(),
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
   var $idcontaspagar;
   var $idfkcredorcontaspagar;
   var $idfkcredorcontaspagar_1;
   var $datavencimentocontaspagar;
   var $datapagamentocontaspagar;
   var $valorcontaspagar;
   var $valorpagocontaspagar;
   var $qtdparcelascontaspagar;
   var $ordemparcelacontaspagar;
   var $quitadocontaspagar;
   var $quitadocontaspagar_1;
   var $obscontaspagar;
   var $diasaviso;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['datapagamentocontaspagar']))
          {
              $this->datapagamentocontaspagar = $this->NM_ajax_info['param']['datapagamentocontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['datavencimentocontaspagar']))
          {
              $this->datavencimentocontaspagar = $this->NM_ajax_info['param']['datavencimentocontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['diasaviso']))
          {
              $this->diasaviso = $this->NM_ajax_info['param']['diasaviso'];
          }
          if (isset($this->NM_ajax_info['param']['idcontaspagar']))
          {
              $this->idcontaspagar = $this->NM_ajax_info['param']['idcontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['idfkcredorcontaspagar']))
          {
              $this->idfkcredorcontaspagar = $this->NM_ajax_info['param']['idfkcredorcontaspagar'];
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
          if (isset($this->NM_ajax_info['param']['obscontaspagar']))
          {
              $this->obscontaspagar = $this->NM_ajax_info['param']['obscontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['ordemparcelacontaspagar']))
          {
              $this->ordemparcelacontaspagar = $this->NM_ajax_info['param']['ordemparcelacontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['qtdparcelascontaspagar']))
          {
              $this->qtdparcelascontaspagar = $this->NM_ajax_info['param']['qtdparcelascontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['quitadocontaspagar']))
          {
              $this->quitadocontaspagar = $this->NM_ajax_info['param']['quitadocontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['valorcontaspagar']))
          {
              $this->valorcontaspagar = $this->NM_ajax_info['param']['valorcontaspagar'];
          }
          if (isset($this->NM_ajax_info['param']['valorpagocontaspagar']))
          {
              $this->valorpagocontaspagar = $this->NM_ajax_info['param']['valorpagocontaspagar'];
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
          $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['embutida_parms']);
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
                 nm_limpa_str_form_tbcontasPagar($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbcontasPagar_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbcontasPagar']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbcontasPagar']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbcontasPagar'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbcontasPagar']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbcontasPagar']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbcontasPagar') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbcontasPagar']['label'] = "Contas � Pagar";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbcontasPagar")
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



      $_SESSION['scriptcase']['error_icon']['form_tbcontasPagar']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbcontasPagar'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcontasPagar']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbcontasPagar", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_tbcontasPagar/form_tbcontasPagar_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbcontasPagar_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbcontasPagar_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbcontasPagar_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_tbcontasPagar/form_tbcontasPagar_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbcontasPagar_erro.class.php"); 
      }
      $this->Erro      = new form_tbcontasPagar_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao']))
         { 
             if ($this->idcontaspagar != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcontasPagar']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->idcontaspagar)) { $this->nm_limpa_alfa($this->idcontaspagar); }
      if (isset($this->idfkcredorcontaspagar)) { $this->nm_limpa_alfa($this->idfkcredorcontaspagar); }
      if (isset($this->valorcontaspagar)) { $this->nm_limpa_alfa($this->valorcontaspagar); }
      if (isset($this->valorpagocontaspagar)) { $this->nm_limpa_alfa($this->valorpagocontaspagar); }
      if (isset($this->qtdparcelascontaspagar)) { $this->nm_limpa_alfa($this->qtdparcelascontaspagar); }
      if (isset($this->ordemparcelacontaspagar)) { $this->nm_limpa_alfa($this->ordemparcelacontaspagar); }
      if (isset($this->quitadocontaspagar)) { $this->nm_limpa_alfa($this->quitadocontaspagar); }
      if (isset($this->obscontaspagar)) { $this->nm_limpa_alfa($this->obscontaspagar); }
      if (isset($this->diasaviso)) { $this->nm_limpa_alfa($this->diasaviso); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idcontaspagar
      $this->field_config['idcontaspagar']               = array();
      $this->field_config['idcontaspagar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idcontaspagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idcontaspagar']['symbol_dec'] = '';
      $this->field_config['idcontaspagar']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idcontaspagar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- qtdparcelascontaspagar
      $this->field_config['qtdparcelascontaspagar']               = array();
      $this->field_config['qtdparcelascontaspagar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['qtdparcelascontaspagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['qtdparcelascontaspagar']['symbol_dec'] = '';
      $this->field_config['qtdparcelascontaspagar']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['qtdparcelascontaspagar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- datavencimentocontaspagar
      $this->field_config['datavencimentocontaspagar']                 = array();
      $this->field_config['datavencimentocontaspagar']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['datavencimentocontaspagar']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['datavencimentocontaspagar']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'datavencimentocontaspagar');
      //-- diasaviso
      $this->field_config['diasaviso']               = array();
      $this->field_config['diasaviso']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['diasaviso']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['diasaviso']['symbol_dec'] = '';
      $this->field_config['diasaviso']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['diasaviso']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valorcontaspagar
      $this->field_config['valorcontaspagar']               = array();
      $this->field_config['valorcontaspagar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorcontaspagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorcontaspagar']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorcontaspagar']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorcontaspagar']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorcontaspagar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ordemparcelacontaspagar
      $this->field_config['ordemparcelacontaspagar']               = array();
      $this->field_config['ordemparcelacontaspagar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ordemparcelacontaspagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ordemparcelacontaspagar']['symbol_dec'] = '';
      $this->field_config['ordemparcelacontaspagar']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ordemparcelacontaspagar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- datapagamentocontaspagar
      $this->field_config['datapagamentocontaspagar']                 = array();
      $this->field_config['datapagamentocontaspagar']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['datapagamentocontaspagar']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['datapagamentocontaspagar']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'datapagamentocontaspagar');
      //-- valorpagocontaspagar
      $this->field_config['valorpagocontaspagar']               = array();
      $this->field_config['valorpagocontaspagar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorpagocontaspagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorpagocontaspagar']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorpagocontaspagar']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorpagocontaspagar']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorpagocontaspagar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Gera_log_access'] = false;
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
          if ('validate_idcontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcontaspagar');
          }
          if ('validate_idfkcredorcontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfkcredorcontaspagar');
          }
          if ('validate_qtdparcelascontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qtdparcelascontaspagar');
          }
          if ('validate_datavencimentocontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'datavencimentocontaspagar');
          }
          if ('validate_diasaviso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diasaviso');
          }
          if ('validate_valorcontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorcontaspagar');
          }
          if ('validate_ordemparcelacontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ordemparcelacontaspagar');
          }
          if ('validate_datapagamentocontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'datapagamentocontaspagar');
          }
          if ('validate_valorpagocontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorpagocontaspagar');
          }
          if ('validate_quitadocontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'quitadocontaspagar');
          }
          if ('validate_obscontaspagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obscontaspagar');
          }
          form_tbcontasPagar_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->quitadocontaspagar))
          {
              $x = 0; 
              $this->quitadocontaspagar_1 = $this->quitadocontaspagar;
              $this->quitadocontaspagar = ""; 
              if ($this->quitadocontaspagar_1 != "") 
              { 
                  foreach ($this->quitadocontaspagar_1 as $dados_quitadocontaspagar_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->quitadocontaspagar .= ";";
                      } 
                      $this->quitadocontaspagar .= $dados_quitadocontaspagar_1;
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
              form_tbcontasPagar_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_tbcontasPagar']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbcontasPagar_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbcontasPagar_pack_ajax_response();
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
          form_tbcontasPagar_pack_ajax_response();
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_tbcontasPagar', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_tbcontasPagar', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_tbcontasPagar_pack_ajax_response();
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
           case 'idcontaspagar':
               return "C�digo";
               break;
           case 'idfkcredorcontaspagar':
               return "Credor";
               break;
           case 'qtdparcelascontaspagar':
               return "Qtd Parcelas";
               break;
           case 'datavencimentocontaspagar':
               return "1� Parcela";
               break;
           case 'diasaviso':
               return "Aviso (dias)";
               break;
           case 'valorcontaspagar':
               return "Valor da Parcela";
               break;
           case 'ordemparcelacontaspagar':
               return "Parcela N�";
               break;
           case 'datapagamentocontaspagar':
               return "Pagamento";
               break;
           case 'valorpagocontaspagar':
               return "Valor Pago";
               break;
           case 'quitadocontaspagar':
               return "Pago?";
               break;
           case 'obscontaspagar':
               return "Observa��es";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbcontasPagar']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbcontasPagar']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbcontasPagar'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbcontasPagar'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'idcontaspagar' == $filtro)
        $this->ValidateField_idcontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idfkcredorcontaspagar' == $filtro)
        $this->ValidateField_idfkcredorcontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qtdparcelascontaspagar' == $filtro)
        $this->ValidateField_qtdparcelascontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'datavencimentocontaspagar' == $filtro)
        $this->ValidateField_datavencimentocontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diasaviso' == $filtro)
        $this->ValidateField_diasaviso($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valorcontaspagar' == $filtro)
        $this->ValidateField_valorcontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ordemparcelacontaspagar' == $filtro)
        $this->ValidateField_ordemparcelacontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'datapagamentocontaspagar' == $filtro)
        $this->ValidateField_datapagamentocontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valorpagocontaspagar' == $filtro)
        $this->ValidateField_valorpagocontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'quitadocontaspagar' == $filtro)
        $this->ValidateField_quitadocontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'obscontaspagar' == $filtro)
        $this->ValidateField_obscontaspagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_idcontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->idcontaspagar == "")  
      { 
          $this->idcontaspagar = 0;
      } 
      nm_limpa_numero($this->idcontaspagar, $this->field_config['idcontaspagar']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idcontaspagar != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idcontaspagar) > $iTestSize)  
              { 
                  $Campos_Crit .= "C�digo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idcontaspagar']))
                  {
                      $Campos_Erros['idcontaspagar'] = array();
                  }
                  $Campos_Erros['idcontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idcontaspagar']) || !is_array($this->NM_ajax_info['errList']['idcontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['idcontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idcontaspagar, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "C�digo; " ; 
                  if (!isset($Campos_Erros['idcontaspagar']))
                  {
                      $Campos_Erros['idcontaspagar'] = array();
                  }
                  $Campos_Erros['idcontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idcontaspagar']) || !is_array($this->NM_ajax_info['errList']['idcontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['idcontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_idcontaspagar

    function ValidateField_idfkcredorcontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->idfkcredorcontaspagar) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']) && !in_array($this->idfkcredorcontaspagar, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idfkcredorcontaspagar']))
                   {
                       $Campos_Erros['idfkcredorcontaspagar'] = array();
                   }
                   $Campos_Erros['idfkcredorcontaspagar'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idfkcredorcontaspagar']) || !is_array($this->NM_ajax_info['errList']['idfkcredorcontaspagar']))
                   {
                       $this->NM_ajax_info['errList']['idfkcredorcontaspagar'] = array();
                   }
                   $this->NM_ajax_info['errList']['idfkcredorcontaspagar'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_idfkcredorcontaspagar

    function ValidateField_qtdparcelascontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->qtdparcelascontaspagar == "")  
      { 
          $this->qtdparcelascontaspagar = 0;
          $this->sc_force_zero[] = 'qtdparcelascontaspagar';
      } 
      nm_limpa_numero($this->qtdparcelascontaspagar, $this->field_config['qtdparcelascontaspagar']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->qtdparcelascontaspagar != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->qtdparcelascontaspagar) > $iTestSize)  
              { 
                  $Campos_Crit .= "Qtd Parcelas: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['qtdparcelascontaspagar']))
                  {
                      $Campos_Erros['qtdparcelascontaspagar'] = array();
                  }
                  $Campos_Erros['qtdparcelascontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['qtdparcelascontaspagar']) || !is_array($this->NM_ajax_info['errList']['qtdparcelascontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['qtdparcelascontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['qtdparcelascontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->qtdparcelascontaspagar, 5, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Qtd Parcelas; " ; 
                  if (!isset($Campos_Erros['qtdparcelascontaspagar']))
                  {
                      $Campos_Erros['qtdparcelascontaspagar'] = array();
                  }
                  $Campos_Erros['qtdparcelascontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['qtdparcelascontaspagar']) || !is_array($this->NM_ajax_info['errList']['qtdparcelascontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['qtdparcelascontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['qtdparcelascontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_qtdparcelascontaspagar

    function ValidateField_datavencimentocontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->datavencimentocontaspagar, $this->field_config['datavencimentocontaspagar']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['datavencimentocontaspagar']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['datavencimentocontaspagar']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['datavencimentocontaspagar']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['datavencimentocontaspagar']['date_sep']) ; 
          if (trim($this->datavencimentocontaspagar) != "")  
          { 
              if ($teste_validade->Data($this->datavencimentocontaspagar, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "1� Parcela; " ; 
                  if (!isset($Campos_Erros['datavencimentocontaspagar']))
                  {
                      $Campos_Erros['datavencimentocontaspagar'] = array();
                  }
                  $Campos_Erros['datavencimentocontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['datavencimentocontaspagar']) || !is_array($this->NM_ajax_info['errList']['datavencimentocontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['datavencimentocontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['datavencimentocontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['datavencimentocontaspagar']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_datavencimentocontaspagar

    function ValidateField_diasaviso(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->diasaviso == "")  
      { 
          $this->diasaviso = 0;
          $this->sc_force_zero[] = 'diasaviso';
      } 
      nm_limpa_numero($this->diasaviso, $this->field_config['diasaviso']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->diasaviso != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->diasaviso) > $iTestSize)  
              { 
                  $Campos_Crit .= "Aviso (dias): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['diasaviso']))
                  {
                      $Campos_Erros['diasaviso'] = array();
                  }
                  $Campos_Erros['diasaviso'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['diasaviso']) || !is_array($this->NM_ajax_info['errList']['diasaviso']))
                  {
                      $this->NM_ajax_info['errList']['diasaviso'] = array();
                  }
                  $this->NM_ajax_info['errList']['diasaviso'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->diasaviso, 2, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Aviso (dias); " ; 
                  if (!isset($Campos_Erros['diasaviso']))
                  {
                      $Campos_Erros['diasaviso'] = array();
                  }
                  $Campos_Erros['diasaviso'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['diasaviso']) || !is_array($this->NM_ajax_info['errList']['diasaviso']))
                  {
                      $this->NM_ajax_info['errList']['diasaviso'] = array();
                  }
                  $this->NM_ajax_info['errList']['diasaviso'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_diasaviso

    function ValidateField_valorcontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valorcontaspagar == "")  
      { 
          $this->valorcontaspagar = 0;
          $this->sc_force_zero[] = 'valorcontaspagar';
      } 
      if (!empty($this->field_config['valorcontaspagar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_dec'], $this->field_config['valorcontaspagar']['symbol_grp'], $this->field_config['valorcontaspagar']['symbol_mon']); 
          nm_limpa_valor($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_dec'], $this->field_config['valorcontaspagar']['symbol_grp']) ; 
          if ('.' == substr($this->valorcontaspagar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorcontaspagar, 1)))
              {
                  $this->valorcontaspagar = '';
              }
              else
              {
                  $this->valorcontaspagar = '0' . $this->valorcontaspagar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorcontaspagar != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->valorcontaspagar) > $iTestSize)  
              { 
                  $Campos_Crit .= "Valor da Parcela: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorcontaspagar']))
                  {
                      $Campos_Erros['valorcontaspagar'] = array();
                  }
                  $Campos_Erros['valorcontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorcontaspagar']) || !is_array($this->NM_ajax_info['errList']['valorcontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['valorcontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorcontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorcontaspagar, 8, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Valor da Parcela; " ; 
                  if (!isset($Campos_Erros['valorcontaspagar']))
                  {
                      $Campos_Erros['valorcontaspagar'] = array();
                  }
                  $Campos_Erros['valorcontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorcontaspagar']) || !is_array($this->NM_ajax_info['errList']['valorcontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['valorcontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorcontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valorcontaspagar

    function ValidateField_ordemparcelacontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->ordemparcelacontaspagar == "")  
      { 
          $this->ordemparcelacontaspagar = 0;
          $this->sc_force_zero[] = 'ordemparcelacontaspagar';
      } 
      nm_limpa_numero($this->ordemparcelacontaspagar, $this->field_config['ordemparcelacontaspagar']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ordemparcelacontaspagar != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->ordemparcelacontaspagar) > $iTestSize)  
              { 
                  $Campos_Crit .= "Parcela N�: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ordemparcelacontaspagar']))
                  {
                      $Campos_Erros['ordemparcelacontaspagar'] = array();
                  }
                  $Campos_Erros['ordemparcelacontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ordemparcelacontaspagar']) || !is_array($this->NM_ajax_info['errList']['ordemparcelacontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['ordemparcelacontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['ordemparcelacontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ordemparcelacontaspagar, 5, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Parcela N�; " ; 
                  if (!isset($Campos_Erros['ordemparcelacontaspagar']))
                  {
                      $Campos_Erros['ordemparcelacontaspagar'] = array();
                  }
                  $Campos_Erros['ordemparcelacontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ordemparcelacontaspagar']) || !is_array($this->NM_ajax_info['errList']['ordemparcelacontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['ordemparcelacontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['ordemparcelacontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_ordemparcelacontaspagar

    function ValidateField_datapagamentocontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->datapagamentocontaspagar, $this->field_config['datapagamentocontaspagar']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['datapagamentocontaspagar']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['datapagamentocontaspagar']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['datapagamentocontaspagar']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['datapagamentocontaspagar']['date_sep']) ; 
          if (trim($this->datapagamentocontaspagar) != "")  
          { 
              if ($teste_validade->Data($this->datapagamentocontaspagar, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Pagamento; " ; 
                  if (!isset($Campos_Erros['datapagamentocontaspagar']))
                  {
                      $Campos_Erros['datapagamentocontaspagar'] = array();
                  }
                  $Campos_Erros['datapagamentocontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['datapagamentocontaspagar']) || !is_array($this->NM_ajax_info['errList']['datapagamentocontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['datapagamentocontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['datapagamentocontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['datapagamentocontaspagar']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_datapagamentocontaspagar

    function ValidateField_valorpagocontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valorpagocontaspagar == "")  
      { 
          $this->valorpagocontaspagar = 0;
          $this->sc_force_zero[] = 'valorpagocontaspagar';
      } 
      if (!empty($this->field_config['valorpagocontaspagar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_dec'], $this->field_config['valorpagocontaspagar']['symbol_grp'], $this->field_config['valorpagocontaspagar']['symbol_mon']); 
          nm_limpa_valor($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_dec'], $this->field_config['valorpagocontaspagar']['symbol_grp']) ; 
          if ('.' == substr($this->valorpagocontaspagar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorpagocontaspagar, 1)))
              {
                  $this->valorpagocontaspagar = '';
              }
              else
              {
                  $this->valorpagocontaspagar = '0' . $this->valorpagocontaspagar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorpagocontaspagar != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->valorpagocontaspagar) > $iTestSize)  
              { 
                  $Campos_Crit .= "Valor Pago: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorpagocontaspagar']))
                  {
                      $Campos_Erros['valorpagocontaspagar'] = array();
                  }
                  $Campos_Erros['valorpagocontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorpagocontaspagar']) || !is_array($this->NM_ajax_info['errList']['valorpagocontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['valorpagocontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpagocontaspagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorpagocontaspagar, 8, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Valor Pago; " ; 
                  if (!isset($Campos_Erros['valorpagocontaspagar']))
                  {
                      $Campos_Erros['valorpagocontaspagar'] = array();
                  }
                  $Campos_Erros['valorpagocontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorpagocontaspagar']) || !is_array($this->NM_ajax_info['errList']['valorpagocontaspagar']))
                  {
                      $this->NM_ajax_info['errList']['valorpagocontaspagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpagocontaspagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valorpagocontaspagar

    function ValidateField_quitadocontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->quitadocontaspagar == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->quitadocontaspagar))
          {
              $x = 0; 
              $this->quitadocontaspagar_1 = array(); 
              foreach ($this->quitadocontaspagar as $ind => $dados_quitadocontaspagar_1 ) 
              {
                  if ($dados_quitadocontaspagar_1 !== "") 
                  {
                      $this->quitadocontaspagar_1[] = $dados_quitadocontaspagar_1;
                  } 
              } 
              $this->quitadocontaspagar = ""; 
              foreach ($this->quitadocontaspagar_1 as $dados_quitadocontaspagar_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->quitadocontaspagar .= ";";
                   } 
                   $this->quitadocontaspagar .= $dados_quitadocontaspagar_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->quitadocontaspagar == "")  
      { 
          $this->quitadocontaspagar = 0;
          $this->sc_force_zero[] = 'quitadocontaspagar';
      } 
    } // ValidateField_quitadocontaspagar

    function ValidateField_obscontaspagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obscontaspagar) > 300) 
          { 
              $Campos_Crit .= "Observa��es " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obscontaspagar']))
              {
                  $Campos_Erros['obscontaspagar'] = array();
              }
              $Campos_Erros['obscontaspagar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obscontaspagar']) || !is_array($this->NM_ajax_info['errList']['obscontaspagar']))
              {
                  $this->NM_ajax_info['errList']['obscontaspagar'] = array();
              }
              $this->NM_ajax_info['errList']['obscontaspagar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_obscontaspagar

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
    $this->nmgp_dados_form['idcontaspagar'] = $this->idcontaspagar;
    $this->nmgp_dados_form['idfkcredorcontaspagar'] = $this->idfkcredorcontaspagar;
    $this->nmgp_dados_form['qtdparcelascontaspagar'] = $this->qtdparcelascontaspagar;
    $this->nmgp_dados_form['datavencimentocontaspagar'] = $this->datavencimentocontaspagar;
    $this->nmgp_dados_form['diasaviso'] = $this->diasaviso;
    $this->nmgp_dados_form['valorcontaspagar'] = $this->valorcontaspagar;
    $this->nmgp_dados_form['ordemparcelacontaspagar'] = $this->ordemparcelacontaspagar;
    $this->nmgp_dados_form['datapagamentocontaspagar'] = $this->datapagamentocontaspagar;
    $this->nmgp_dados_form['valorpagocontaspagar'] = $this->valorpagocontaspagar;
    $this->nmgp_dados_form['quitadocontaspagar'] = $this->quitadocontaspagar;
    $this->nmgp_dados_form['obscontaspagar'] = $this->obscontaspagar;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->idcontaspagar, $this->field_config['idcontaspagar']['symbol_grp']) ; 
      nm_limpa_numero($this->qtdparcelascontaspagar, $this->field_config['qtdparcelascontaspagar']['symbol_grp']) ; 
      nm_limpa_data($this->datavencimentocontaspagar, $this->field_config['datavencimentocontaspagar']['date_sep']) ; 
      nm_limpa_numero($this->diasaviso, $this->field_config['diasaviso']['symbol_grp']) ; 
      if (!empty($this->field_config['valorcontaspagar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_dec'], $this->field_config['valorcontaspagar']['symbol_grp'], $this->field_config['valorcontaspagar']['symbol_mon']);
         nm_limpa_valor($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_dec'], $this->field_config['valorcontaspagar']['symbol_grp']);
      }
      nm_limpa_numero($this->ordemparcelacontaspagar, $this->field_config['ordemparcelacontaspagar']['symbol_grp']) ; 
      nm_limpa_data($this->datapagamentocontaspagar, $this->field_config['datapagamentocontaspagar']['date_sep']) ; 
      if (!empty($this->field_config['valorpagocontaspagar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_dec'], $this->field_config['valorpagocontaspagar']['symbol_grp'], $this->field_config['valorpagocontaspagar']['symbol_mon']);
         nm_limpa_valor($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_dec'], $this->field_config['valorpagocontaspagar']['symbol_grp']);
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
      if ($Nome_Campo == "idcontaspagar")
      {
          nm_limpa_numero($this->idcontaspagar, $this->field_config['idcontaspagar']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "qtdparcelascontaspagar")
      {
          nm_limpa_numero($this->qtdparcelascontaspagar, $this->field_config['qtdparcelascontaspagar']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "diasaviso")
      {
          nm_limpa_numero($this->diasaviso, $this->field_config['diasaviso']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valorcontaspagar")
      {
          if (!empty($this->field_config['valorcontaspagar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_dec'], $this->field_config['valorcontaspagar']['symbol_grp'], $this->field_config['valorcontaspagar']['symbol_mon']);
             nm_limpa_valor($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_dec'], $this->field_config['valorcontaspagar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ordemparcelacontaspagar")
      {
          nm_limpa_numero($this->ordemparcelacontaspagar, $this->field_config['ordemparcelacontaspagar']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valorpagocontaspagar")
      {
          if (!empty($this->field_config['valorpagocontaspagar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_dec'], $this->field_config['valorpagocontaspagar']['symbol_grp'], $this->field_config['valorpagocontaspagar']['symbol_mon']);
             nm_limpa_valor($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_dec'], $this->field_config['valorpagocontaspagar']['symbol_grp']);
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
      if (!empty($this->idcontaspagar) || (!empty($format_fields) && isset($format_fields['idcontaspagar'])))
      {
          nmgp_Form_Num_Val($this->idcontaspagar, $this->field_config['idcontaspagar']['symbol_grp'], $this->field_config['idcontaspagar']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['idcontaspagar']['symbol_fmt']) ; 
      }
      if (!empty($this->qtdparcelascontaspagar) || (!empty($format_fields) && isset($format_fields['qtdparcelascontaspagar'])))
      {
          nmgp_Form_Num_Val($this->qtdparcelascontaspagar, $this->field_config['qtdparcelascontaspagar']['symbol_grp'], $this->field_config['qtdparcelascontaspagar']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['qtdparcelascontaspagar']['symbol_fmt']) ; 
      }
      if ((!empty($this->datavencimentocontaspagar) && 'null' != $this->datavencimentocontaspagar) || (!empty($format_fields) && isset($format_fields['datavencimentocontaspagar'])))
      {
          nm_volta_data($this->datavencimentocontaspagar, $this->field_config['datavencimentocontaspagar']['date_format']) ; 
          nmgp_Form_Datas($this->datavencimentocontaspagar, $this->field_config['datavencimentocontaspagar']['date_format'], $this->field_config['datavencimentocontaspagar']['date_sep']) ;  
      }
      elseif ('null' == $this->datavencimentocontaspagar || '' == $this->datavencimentocontaspagar)
      {
          $this->datavencimentocontaspagar = '';
      }
      if (!empty($this->diasaviso) || (!empty($format_fields) && isset($format_fields['diasaviso'])))
      {
          nmgp_Form_Num_Val($this->diasaviso, $this->field_config['diasaviso']['symbol_grp'], $this->field_config['diasaviso']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['diasaviso']['symbol_fmt']) ; 
      }
      if (!empty($this->valorcontaspagar) || (!empty($format_fields) && isset($format_fields['valorcontaspagar'])))
      {
          nmgp_Form_Num_Val($this->valorcontaspagar, $this->field_config['valorcontaspagar']['symbol_grp'], $this->field_config['valorcontaspagar']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['valorcontaspagar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorcontaspagar']['symbol_mon'];
          $this->sc_add_currency($this->valorcontaspagar, $sMonSymb, $this->field_config['valorcontaspagar']['format_pos']); 
      }
      if (!empty($this->ordemparcelacontaspagar) || (!empty($format_fields) && isset($format_fields['ordemparcelacontaspagar'])))
      {
          nmgp_Form_Num_Val($this->ordemparcelacontaspagar, $this->field_config['ordemparcelacontaspagar']['symbol_grp'], $this->field_config['ordemparcelacontaspagar']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['ordemparcelacontaspagar']['symbol_fmt']) ; 
      }
      if ((!empty($this->datapagamentocontaspagar) && 'null' != $this->datapagamentocontaspagar) || (!empty($format_fields) && isset($format_fields['datapagamentocontaspagar'])))
      {
          nm_volta_data($this->datapagamentocontaspagar, $this->field_config['datapagamentocontaspagar']['date_format']) ; 
          nmgp_Form_Datas($this->datapagamentocontaspagar, $this->field_config['datapagamentocontaspagar']['date_format'], $this->field_config['datapagamentocontaspagar']['date_sep']) ;  
      }
      elseif ('null' == $this->datapagamentocontaspagar || '' == $this->datapagamentocontaspagar)
      {
          $this->datapagamentocontaspagar = '';
      }
      if (!empty($this->valorpagocontaspagar) || (!empty($format_fields) && isset($format_fields['valorpagocontaspagar'])))
      {
          nmgp_Form_Num_Val($this->valorpagocontaspagar, $this->field_config['valorpagocontaspagar']['symbol_grp'], $this->field_config['valorpagocontaspagar']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['valorpagocontaspagar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorpagocontaspagar']['symbol_mon'];
          $this->sc_add_currency($this->valorpagocontaspagar, $sMonSymb, $this->field_config['valorpagocontaspagar']['format_pos']); 
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
      $guarda_format_hora = $this->field_config['datavencimentocontaspagar']['date_format'];
      if ($this->datavencimentocontaspagar != "")  
      { 
          nm_conv_data($this->datavencimentocontaspagar, $this->field_config['datavencimentocontaspagar']['date_format']) ; 
          $this->datavencimentocontaspagar_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->datavencimentocontaspagar_hora = substr($this->datavencimentocontaspagar_hora, 0, -4);
          }
      } 
      if ($this->datavencimentocontaspagar == "" && $use_null)  
      { 
          $this->datavencimentocontaspagar = "null" ; 
      } 
      $this->field_config['datavencimentocontaspagar']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['datapagamentocontaspagar']['date_format'];
      if ($this->datapagamentocontaspagar != "")  
      { 
          nm_conv_data($this->datapagamentocontaspagar, $this->field_config['datapagamentocontaspagar']['date_format']) ; 
          $this->datapagamentocontaspagar_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->datapagamentocontaspagar_hora = substr($this->datapagamentocontaspagar_hora, 0, -4);
          }
      } 
      if ($this->datapagamentocontaspagar == "" && $use_null)  
      { 
          $this->datapagamentocontaspagar = "null" ; 
      } 
      $this->field_config['datapagamentocontaspagar']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_idcontaspagar();
          $this->ajax_return_values_idfkcredorcontaspagar();
          $this->ajax_return_values_qtdparcelascontaspagar();
          $this->ajax_return_values_datavencimentocontaspagar();
          $this->ajax_return_values_diasaviso();
          $this->ajax_return_values_valorcontaspagar();
          $this->ajax_return_values_ordemparcelacontaspagar();
          $this->ajax_return_values_datapagamentocontaspagar();
          $this->ajax_return_values_valorpagocontaspagar();
          $this->ajax_return_values_quitadocontaspagar();
          $this->ajax_return_values_obscontaspagar();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idcontaspagar']['keyVal'] = form_tbcontasPagar_pack_protect_string($this->nmgp_dados_form['idcontaspagar']);
          }
   } // ajax_return_values

          //----- idcontaspagar
   function ajax_return_values_idcontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idcontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idcontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idcontaspagar'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idfkcredorcontaspagar
   function ajax_return_values_idfkcredorcontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfkcredorcontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfkcredorcontaspagar);
              $aLookup = array();
              $this->_tmp_lookup_idfkcredorcontaspagar = $this->idfkcredorcontaspagar;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idcontaspagar = $this->idcontaspagar;
   $old_value_qtdparcelascontaspagar = $this->qtdparcelascontaspagar;
   $old_value_datavencimentocontaspagar = $this->datavencimentocontaspagar;
   $old_value_diasaviso = $this->diasaviso;
   $old_value_valorcontaspagar = $this->valorcontaspagar;
   $old_value_ordemparcelacontaspagar = $this->ordemparcelacontaspagar;
   $old_value_datapagamentocontaspagar = $this->datapagamentocontaspagar;
   $old_value_valorpagocontaspagar = $this->valorpagocontaspagar;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcontaspagar = $this->idcontaspagar;
   $unformatted_value_qtdparcelascontaspagar = $this->qtdparcelascontaspagar;
   $unformatted_value_datavencimentocontaspagar = $this->datavencimentocontaspagar;
   $unformatted_value_diasaviso = $this->diasaviso;
   $unformatted_value_valorcontaspagar = $this->valorcontaspagar;
   $unformatted_value_ordemparcelacontaspagar = $this->ordemparcelacontaspagar;
   $unformatted_value_datapagamentocontaspagar = $this->datapagamentocontaspagar;
   $unformatted_value_valorpagocontaspagar = $this->valorpagocontaspagar;

   $nm_comando = "SELECT idCredor, nomeCredor 
FROM tbcredores 
ORDER BY nomeCredor";

   $this->idcontaspagar = $old_value_idcontaspagar;
   $this->qtdparcelascontaspagar = $old_value_qtdparcelascontaspagar;
   $this->datavencimentocontaspagar = $old_value_datavencimentocontaspagar;
   $this->diasaviso = $old_value_diasaviso;
   $this->valorcontaspagar = $old_value_valorcontaspagar;
   $this->ordemparcelacontaspagar = $old_value_ordemparcelacontaspagar;
   $this->datapagamentocontaspagar = $old_value_datapagamentocontaspagar;
   $this->valorpagocontaspagar = $old_value_valorpagocontaspagar;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_tbcontasPagar_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_tbcontasPagar_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idfkcredorcontaspagar\"";
          if (isset($this->NM_ajax_info['select_html']['idfkcredorcontaspagar']) && !empty($this->NM_ajax_info['select_html']['idfkcredorcontaspagar']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idfkcredorcontaspagar'];
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

                  if ($this->idfkcredorcontaspagar == $sValue)
                  {
                      $this->_tmp_lookup_idfkcredorcontaspagar = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idfkcredorcontaspagar'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idfkcredorcontaspagar']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idfkcredorcontaspagar']['valList'][$i] = form_tbcontasPagar_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idfkcredorcontaspagar']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idfkcredorcontaspagar']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idfkcredorcontaspagar']['labList'] = $aLabel;
          }
   }

          //----- qtdparcelascontaspagar
   function ajax_return_values_qtdparcelascontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qtdparcelascontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->qtdparcelascontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['qtdparcelascontaspagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- datavencimentocontaspagar
   function ajax_return_values_datavencimentocontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("datavencimentocontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->datavencimentocontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['datavencimentocontaspagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- diasaviso
   function ajax_return_values_diasaviso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diasaviso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diasaviso);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diasaviso'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorcontaspagar
   function ajax_return_values_valorcontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorcontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorcontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorcontaspagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ordemparcelacontaspagar
   function ajax_return_values_ordemparcelacontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ordemparcelacontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ordemparcelacontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ordemparcelacontaspagar'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- datapagamentocontaspagar
   function ajax_return_values_datapagamentocontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("datapagamentocontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->datapagamentocontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['datapagamentocontaspagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorpagocontaspagar
   function ajax_return_values_valorpagocontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorpagocontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorpagocontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorpagocontaspagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- quitadocontaspagar
   function ajax_return_values_quitadocontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("quitadocontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->quitadocontaspagar);
              $aLookup = array();
              $this->_tmp_lookup_quitadocontaspagar = $this->quitadocontaspagar;

$aLookup[] = array(form_tbcontasPagar_pack_protect_string('1') => form_tbcontasPagar_pack_protect_string("SIM"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_quitadocontaspagar'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['quitadocontaspagar']) && !empty($this->NM_ajax_info['select_html']['quitadocontaspagar']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['quitadocontaspagar'];
          }
          $this->NM_ajax_info['fldList']['quitadocontaspagar'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-quitadocontaspagar',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['quitadocontaspagar']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['quitadocontaspagar']['valList'][$i] = form_tbcontasPagar_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['quitadocontaspagar']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['quitadocontaspagar']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['quitadocontaspagar']['labList'] = $aLabel;
          }
   }

          //----- obscontaspagar
   function ajax_return_values_obscontaspagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obscontaspagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obscontaspagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obscontaspagar'] = array(
                       'row'    => '',
               'type'    => 'text',
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['upload_dir'][$fieldName][] = $newName;
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
      $this->valorcontaspagar = str_replace($sc_parm1, $sc_parm2, $this->valorcontaspagar); 
      $this->valorpagocontaspagar = str_replace($sc_parm1, $sc_parm2, $this->valorpagocontaspagar); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valorcontaspagar = "'" . $this->valorcontaspagar . "'";
      $this->valorpagocontaspagar = "'" . $this->valorpagocontaspagar . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valorcontaspagar = str_replace("'", "", $this->valorcontaspagar); 
      $this->valorpagocontaspagar = str_replace("'", "", $this->valorpagocontaspagar); 
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
      $NM_val_form['idcontaspagar'] = $this->idcontaspagar;
      $NM_val_form['idfkcredorcontaspagar'] = $this->idfkcredorcontaspagar;
      $NM_val_form['qtdparcelascontaspagar'] = $this->qtdparcelascontaspagar;
      $NM_val_form['datavencimentocontaspagar'] = $this->datavencimentocontaspagar;
      $NM_val_form['diasaviso'] = $this->diasaviso;
      $NM_val_form['valorcontaspagar'] = $this->valorcontaspagar;
      $NM_val_form['ordemparcelacontaspagar'] = $this->ordemparcelacontaspagar;
      $NM_val_form['datapagamentocontaspagar'] = $this->datapagamentocontaspagar;
      $NM_val_form['valorpagocontaspagar'] = $this->valorpagocontaspagar;
      $NM_val_form['quitadocontaspagar'] = $this->quitadocontaspagar;
      $NM_val_form['obscontaspagar'] = $this->obscontaspagar;
      if ($this->idcontaspagar == "")  
      { 
          $this->idcontaspagar = 0;
      } 
      if ($this->idfkcredorcontaspagar == "")  
      { 
          $this->idfkcredorcontaspagar = 0;
          $this->sc_force_zero[] = 'idfkcredorcontaspagar';
      } 
      if ($this->valorcontaspagar == "")  
      { 
          $this->valorcontaspagar = 0;
          $this->sc_force_zero[] = 'valorcontaspagar';
      } 
      if ($this->valorpagocontaspagar == "")  
      { 
          $this->valorpagocontaspagar = 0;
          $this->sc_force_zero[] = 'valorpagocontaspagar';
      } 
      if ($this->qtdparcelascontaspagar == "")  
      { 
          $this->qtdparcelascontaspagar = 0;
          $this->sc_force_zero[] = 'qtdparcelascontaspagar';
      } 
      if ($this->ordemparcelacontaspagar == "")  
      { 
          $this->ordemparcelacontaspagar = 0;
          $this->sc_force_zero[] = 'ordemparcelacontaspagar';
      } 
      if ($this->quitadocontaspagar == "")  
      { 
          $this->quitadocontaspagar = 0;
          $this->sc_force_zero[] = 'quitadocontaspagar';
      } 
      if ($this->diasaviso == "")  
      { 
          $this->diasaviso = 0;
          $this->sc_force_zero[] = 'diasaviso';
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->datavencimentocontaspagar == "")  
          { 
              $this->datavencimentocontaspagar = "null"; 
              $NM_val_null[] = "datavencimentocontaspagar";
          } 
          if ($this->datapagamentocontaspagar == "")  
          { 
              $this->datapagamentocontaspagar = "null"; 
              $NM_val_null[] = "datapagamentocontaspagar";
          } 
          $this->obscontaspagar_before_qstr = $this->obscontaspagar;
          $this->obscontaspagar = substr($this->Db->qstr($this->obscontaspagar), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idContasPagar = $this->idcontaspagar ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idContasPagar = $this->idcontaspagar "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbcontasPagar_pack_ajax_response();
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
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET idFKCredorContasPagar = $this->idfkcredorcontaspagar, dataVencimentoContasPagar = " . $this->Ini->date_delim . $this->datavencimentocontaspagar . $this->Ini->date_delim1 . ", dataPagamentoContasPagar = " . $this->Ini->date_delim . $this->datapagamentocontaspagar . $this->Ini->date_delim1 . ", valorContasPagar = $this->valorcontaspagar, valorPagoContasPagar = $this->valorpagocontaspagar, qtdParcelasContasPagar = $this->qtdparcelascontaspagar, ordemParcelaContasPagar = $this->ordemparcelacontaspagar, quitadoContasPagar = $this->quitadocontaspagar, obsContasPagar = '$this->obscontaspagar', diasAviso = $this->diasaviso";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET idFKCredorContasPagar = $this->idfkcredorcontaspagar, dataVencimentoContasPagar = " . $this->Ini->date_delim . $this->datavencimentocontaspagar . $this->Ini->date_delim1 . ", dataPagamentoContasPagar = " . $this->Ini->date_delim . $this->datapagamentocontaspagar . $this->Ini->date_delim1 . ", valorContasPagar = $this->valorcontaspagar, valorPagoContasPagar = $this->valorpagocontaspagar, qtdParcelasContasPagar = $this->qtdparcelascontaspagar, ordemParcelaContasPagar = $this->ordemparcelacontaspagar, quitadoContasPagar = $this->quitadocontaspagar, obsContasPagar = '$this->obscontaspagar', diasAviso = $this->diasaviso";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE idContasPagar = $this->idcontaspagar ";  
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
                                  form_tbcontasPagar_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->obscontaspagar = $this->obscontaspagar_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idcontaspagar'])) { $this->idcontaspagar = $NM_val_form['idcontaspagar']; }
              elseif (isset($this->idcontaspagar)) { $this->nm_limpa_alfa($this->idcontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfkcredorcontaspagar'])) { $this->idfkcredorcontaspagar = $NM_val_form['idfkcredorcontaspagar']; }
              elseif (isset($this->idfkcredorcontaspagar)) { $this->nm_limpa_alfa($this->idfkcredorcontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorcontaspagar'])) { $this->valorcontaspagar = $NM_val_form['valorcontaspagar']; }
              elseif (isset($this->valorcontaspagar)) { $this->nm_limpa_alfa($this->valorcontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorpagocontaspagar'])) { $this->valorpagocontaspagar = $NM_val_form['valorpagocontaspagar']; }
              elseif (isset($this->valorpagocontaspagar)) { $this->nm_limpa_alfa($this->valorpagocontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['qtdparcelascontaspagar'])) { $this->qtdparcelascontaspagar = $NM_val_form['qtdparcelascontaspagar']; }
              elseif (isset($this->qtdparcelascontaspagar)) { $this->nm_limpa_alfa($this->qtdparcelascontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['ordemparcelacontaspagar'])) { $this->ordemparcelacontaspagar = $NM_val_form['ordemparcelacontaspagar']; }
              elseif (isset($this->ordemparcelacontaspagar)) { $this->nm_limpa_alfa($this->ordemparcelacontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['quitadocontaspagar'])) { $this->quitadocontaspagar = $NM_val_form['quitadocontaspagar']; }
              elseif (isset($this->quitadocontaspagar)) { $this->nm_limpa_alfa($this->quitadocontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['obscontaspagar'])) { $this->obscontaspagar = $NM_val_form['obscontaspagar']; }
              elseif (isset($this->obscontaspagar)) { $this->nm_limpa_alfa($this->obscontaspagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['diasaviso'])) { $this->diasaviso = $NM_val_form['diasaviso']; }
              elseif (isset($this->diasaviso)) { $this->nm_limpa_alfa($this->diasaviso); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idcontaspagar', 'idfkcredorcontaspagar', 'qtdparcelascontaspagar', 'datavencimentocontaspagar', 'diasaviso', 'valorcontaspagar', 'ordemparcelacontaspagar', 'datapagamentocontaspagar', 'valorpagocontaspagar', 'quitadocontaspagar', 'obscontaspagar'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idContasPagar, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbcontasPagar_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idFKCredorContasPagar, dataVencimentoContasPagar, dataPagamentoContasPagar, valorContasPagar, valorPagoContasPagar, qtdParcelasContasPagar, ordemParcelaContasPagar, quitadoContasPagar, obsContasPagar, diasAviso) VALUES (" . $NM_seq_auto . "$this->idfkcredorcontaspagar, " . $this->Ini->date_delim . $this->datavencimentocontaspagar . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->datapagamentocontaspagar . $this->Ini->date_delim1 . ", $this->valorcontaspagar, $this->valorpagocontaspagar, $this->qtdparcelascontaspagar, $this->ordemparcelacontaspagar, $this->quitadocontaspagar, '$this->obscontaspagar', $this->diasaviso)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idFKCredorContasPagar, dataVencimentoContasPagar, dataPagamentoContasPagar, valorContasPagar, valorPagoContasPagar, qtdParcelasContasPagar, ordemParcelaContasPagar, quitadoContasPagar, obsContasPagar, diasAviso) VALUES (" . $NM_seq_auto . "$this->idfkcredorcontaspagar, " . $this->Ini->date_delim . $this->datavencimentocontaspagar . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->datapagamentocontaspagar . $this->Ini->date_delim1 . ", $this->valorcontaspagar, $this->valorpagocontaspagar, $this->qtdparcelascontaspagar, $this->ordemparcelacontaspagar, $this->quitadocontaspagar, '$this->obscontaspagar', $this->diasaviso)"; 
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
                              form_tbcontasPagar_pack_ajax_response();
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
                  $this->idcontaspagar = $rsy->fields[0];
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
                  $this->idcontaspagar = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idcontaspagar = substr($this->Db->qstr($this->idcontaspagar), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where idContasPagar = $this->idcontaspagar"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where idContasPagar = $this->idcontaspagar "); 
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idContasPagar = $this->idcontaspagar "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idContasPagar = $this->idcontaspagar "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbcontasPagar_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']);
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
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_tbcontasPagar']['contr_erro'] = 'on';
  $this->geraParcelas();
$_SESSION['scriptcase']['form_tbcontasPagar']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['parms'] = "idcontaspagar?#?$this->idcontaspagar?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idcontaspagar = substr($this->Db->qstr($this->idcontaspagar), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idcontaspagar)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idcontaspagar) === "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbcontasPagar = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'] = $qt_geral_reg_form_tbcontasPagar;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idcontaspagar))
          {
              $Key_Where = "idContasPagar < $this->idcontaspagar "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbcontasPagar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] > $qt_geral_reg_form_tbcontasPagar)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = $qt_geral_reg_form_tbcontasPagar; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = $qt_geral_reg_form_tbcontasPagar; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_tbcontasPagar) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['parms'] = ""; 
          $nmgp_select = "SELECT idContasPagar, idFKCredorContasPagar, dataVencimentoContasPagar, dataPagamentoContasPagar, valorContasPagar, valorPagoContasPagar, qtdParcelasContasPagar, ordemParcelaContasPagar, quitadoContasPagar, obsContasPagar, diasAviso from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "idContasPagar = $this->idcontaspagar"; 
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
          $sc_order_by = "idContasPagar";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter'] = true;
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
              $this->idcontaspagar = $rs->fields[0] ; 
              $this->nmgp_dados_select['idcontaspagar'] = $this->idcontaspagar;
              $this->idfkcredorcontaspagar = $rs->fields[1] ; 
              $this->nmgp_dados_select['idfkcredorcontaspagar'] = $this->idfkcredorcontaspagar;
              $this->datavencimentocontaspagar = $rs->fields[2] ; 
              $this->nmgp_dados_select['datavencimentocontaspagar'] = $this->datavencimentocontaspagar;
              $this->datapagamentocontaspagar = $rs->fields[3] ; 
              $this->nmgp_dados_select['datapagamentocontaspagar'] = $this->datapagamentocontaspagar;
              $this->valorcontaspagar = $rs->fields[4] ; 
              $this->nmgp_dados_select['valorcontaspagar'] = $this->valorcontaspagar;
              $this->valorpagocontaspagar = $rs->fields[5] ; 
              $this->nmgp_dados_select['valorpagocontaspagar'] = $this->valorpagocontaspagar;
              $this->qtdparcelascontaspagar = $rs->fields[6] ; 
              $this->nmgp_dados_select['qtdparcelascontaspagar'] = $this->qtdparcelascontaspagar;
              $this->ordemparcelacontaspagar = $rs->fields[7] ; 
              $this->nmgp_dados_select['ordemparcelacontaspagar'] = $this->ordemparcelacontaspagar;
              $this->quitadocontaspagar = $rs->fields[8] ; 
              $this->nmgp_dados_select['quitadocontaspagar'] = $this->quitadocontaspagar;
              $this->obscontaspagar = $rs->fields[9] ; 
              $this->nmgp_dados_select['obscontaspagar'] = $this->obscontaspagar;
              $this->diasaviso = $rs->fields[10] ; 
              $this->nmgp_dados_select['diasaviso'] = $this->diasaviso;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idcontaspagar = (string)$this->idcontaspagar; 
              $this->idfkcredorcontaspagar = (string)$this->idfkcredorcontaspagar; 
              $this->valorcontaspagar = (string)$this->valorcontaspagar; 
              $this->valorpagocontaspagar = (string)$this->valorpagocontaspagar; 
              $this->qtdparcelascontaspagar = (string)$this->qtdparcelascontaspagar; 
              $this->ordemparcelacontaspagar = (string)$this->ordemparcelacontaspagar; 
              $this->quitadocontaspagar = (string)$this->quitadocontaspagar; 
              $this->diasaviso = (string)$this->diasaviso; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['parms'] = "idcontaspagar?#?$this->idcontaspagar?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] < $qt_geral_reg_form_tbcontasPagar;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opcao']   = '';
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
              $this->idcontaspagar = "";  
              $this->idfkcredorcontaspagar = "";  
              $this->datavencimentocontaspagar = "";  
              $this->datavencimentocontaspagar_hora = "" ;  
              $this->datapagamentocontaspagar = "";  
              $this->datapagamentocontaspagar_hora = "" ;  
              $this->valorcontaspagar = "";  
              $this->valorpagocontaspagar = "";  
              $this->qtdparcelascontaspagar = "";  
              $this->ordemparcelacontaspagar = "1";  
              $this->quitadocontaspagar = "";  
              $this->obscontaspagar = "";  
              $this->diasaviso = "1";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['foreign_key'] as $sFKName => $sFKValue)
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
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idContasPagar) from " . $this->Ini->nm_tabela . " where idContasPagar < $this->idcontaspagar" . $str_where_filter; 
     $rs = $this->Db->Execute("select max(idContasPagar) from " . $this->Ini->nm_tabela . " where idContasPagar < $this->idcontaspagar" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idcontaspagar = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idContasPagar) from " . $this->Ini->nm_tabela . " where idContasPagar > $this->idcontaspagar" . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idContasPagar) from " . $this->Ini->nm_tabela . " where idContasPagar > $this->idcontaspagar" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idcontaspagar = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idContasPagar) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
     $rs = $this->Db->Execute("select min(idContasPagar) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idcontaspagar = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idContasPagar) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idContasPagar) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idcontaspagar = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $this->SC_log_arr['keys']['idcontaspagar'] =  $this->idcontaspagar;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['dados_select'];
           $this->SC_log_arr['fields']['idFKCredorContasPagar']['0'] =  $nmgp_dados_select['idfkcredorcontaspagar'];
           $this->SC_log_arr['fields']['dataVencimentoContasPagar']['0'] =  $nmgp_dados_select['datavencimentocontaspagar'];
           $this->SC_log_arr['fields']['dataPagamentoContasPagar']['0'] =  $nmgp_dados_select['datapagamentocontaspagar'];
           $this->SC_log_arr['fields']['valorContasPagar']['0'] =  $nmgp_dados_select['valorcontaspagar'];
           $this->SC_log_arr['fields']['valorPagoContasPagar']['0'] =  $nmgp_dados_select['valorpagocontaspagar'];
           $this->SC_log_arr['fields']['qtdParcelasContasPagar']['0'] =  $nmgp_dados_select['qtdparcelascontaspagar'];
           $this->SC_log_arr['fields']['ordemParcelaContasPagar']['0'] =  $nmgp_dados_select['ordemparcelacontaspagar'];
           $this->SC_log_arr['fields']['quitadoContasPagar']['0'] =  $nmgp_dados_select['quitadocontaspagar'];
           $this->SC_log_arr['fields']['obsContasPagar']['0'] =  $nmgp_dados_select['obscontaspagar'];
           $this->SC_log_arr['fields']['diasAviso']['0'] =  $nmgp_dados_select['diasaviso'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['idFKCredorContasPagar']['1'] =  $this->idfkcredorcontaspagar;
       $this->SC_log_arr['fields']['dataVencimentoContasPagar']['1'] =  $this->datavencimentocontaspagar;
       $this->SC_log_arr['fields']['dataPagamentoContasPagar']['1'] =  $this->datapagamentocontaspagar;
       $this->SC_log_arr['fields']['valorContasPagar']['1'] =  $this->valorcontaspagar;
       $this->SC_log_arr['fields']['valorPagoContasPagar']['1'] =  $this->valorpagocontaspagar;
       $this->SC_log_arr['fields']['qtdParcelasContasPagar']['1'] =  $this->qtdparcelascontaspagar;
       $this->SC_log_arr['fields']['ordemParcelaContasPagar']['1'] =  $this->ordemparcelacontaspagar;
       $this->SC_log_arr['fields']['quitadoContasPagar']['1'] =  $this->quitadocontaspagar;
       $this->SC_log_arr['fields']['obsContasPagar']['1'] =  $this->obscontaspagar;
       $this->SC_log_arr['fields']['diasAviso']['1'] =  $this->diasaviso;
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
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
//
function geraParcelas()
{
$_SESSION['scriptcase']['form_tbcontasPagar']['contr_erro'] = 'on';
   
if($this->qtdparcelascontaspagar  <> '1' )
	{
	 $dataVencimentoParcela = $this->datavencimentocontaspagar ;
	  $ordemParcela = 1;
     
	   for($cont=1;$cont<$this->qtdparcelascontaspagar ;$cont++)
		  {
	         $ordemParcela = $ordemParcela + 1;
		     $dataVencimentoParcela = 
         nm_conv_form_data($this->nm_data->CalculaData($dataVencimentoParcela, "aaaa-mm-dd", "+", 30, 0, 0), "aaaa-mm-dd",  "aaaa-mm-dd"); 
      ;
		     
		     
			$insert_table  = 'tbcontasPagar';      
			$insert_fields = array(   
				 'idFKcredorContasPagar' => "'$this->idfkcredorcontaspagar'",
				 'dataVencimentoContasPagar' => "'$dataVencimentoParcela'",
				 'valorContasPagar' => "'$this->valorcontaspagar'",
				 'qtdParcelasContasPagar' => "'$this->qtdparcelascontaspagar'",
				 'ordemParcelaContasPagar' => "'$ordemParcela'",
				 'obsContasPagar' => "'$this->obscontaspagar'",
				 'diasAviso' => "'$this->diasaviso'",
				
			);

			$insert_sql = 'INSERT INTO ' . $insert_table
				. ' ('   . implode(', ', array_keys($insert_fields))   . ')'
				. ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';

			
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbcontasPagar_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	    
	  }
   $this->nm_mens_alert[] = "$this->qtdparcelascontaspagar parcelas geradas com sucesso!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("$this->qtdparcelascontaspagar parcelas geradas com sucesso!"); }}
$_SESSION['scriptcase']['form_tbcontasPagar']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbcontasPagar_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_tbcontasPagar_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbcontasPagar_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "idContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idfkcredorcontaspagar($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idFKCredorContasPagar", $arg_search, $data_lookup);
          }
      }
      {
          $this->SC_monta_condicao($comando, "dataVencimentoContasPagar", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "dataPagamentoContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorPagoContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qtdParcelasContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ordemParcelaContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_quitadocontaspagar($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "quitadoContasPagar", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "obsContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idfkcredorcontaspagar($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idFKCredorContasPagar", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "qtdParcelasContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "diasAviso", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ordemParcelaContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorPagoContasPagar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_quitadocontaspagar($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "quitadoContasPagar", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "obsContasPagar", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_tbcontasPagar = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'] = $qt_geral_reg_form_tbcontasPagar;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbcontasPagar_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbcontasPagar_pack_ajax_response();
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
      $nm_numeric[] = "idcontaspagar";$nm_numeric[] = "idfkcredorcontaspagar";$nm_numeric[] = "valorcontaspagar";$nm_numeric[] = "valorpagocontaspagar";$nm_numeric[] = "qtdparcelascontaspagar";$nm_numeric[] = "ordemparcelacontaspagar";$nm_numeric[] = "quitadocontaspagar";$nm_numeric[] = "diasaviso";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['decimal_db'] == ".")
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
      $Nm_datas['datavencimentocontaspagar'] = "date";$Nm_datas['datapagamentocontaspagar'] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['SC_sep_date1'];
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
   function SC_lookup_idfkcredorcontaspagar($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nomeCredor, idCredor FROM tbcredores WHERE (nomeCredor LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_quitadocontaspagar($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "SIM";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_tbcontasPagar_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbcontasPagar_fim.php";
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
       form_tbcontasPagar_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['masterValue']);
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
    function sc_ajax_alert($sMessage)
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxAlert']['message'] = NM_charset_to_utf8($sMessage);
        }
    } // sc_ajax_alert
}
?>
