<?php

class app_grid_sec_users_apps_rtf
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
   function app_grid_sec_users_apps_rtf()
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
      $this->Arquivo   .= "_app_grid_sec_users_apps";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "app_grid_sec_users_apps.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_grid_sec_users_apps']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_grid_sec_users_apps']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_grid_sec_users_apps']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->priv_access = $Busca_temp['priv_access']; 
          $tmp_pos = strpos($this->priv_access, "##@@");
          if ($tmp_pos !== false)
          {
              $this->priv_access = substr($this->priv_access, 0, $tmp_pos);
          }
          $this->priv_insert = $Busca_temp['priv_insert']; 
          $tmp_pos = strpos($this->priv_insert, "##@@");
          if ($tmp_pos !== false)
          {
              $this->priv_insert = substr($this->priv_insert, 0, $tmp_pos);
          }
          $this->priv_delete = $Busca_temp['priv_delete']; 
          $tmp_pos = strpos($this->priv_delete, "##@@");
          if ($tmp_pos !== false)
          {
              $this->priv_delete = substr($this->priv_delete, 0, $tmp_pos);
          }
          $this->priv_update = $Busca_temp['priv_update']; 
          $tmp_pos = strpos($this->priv_update, "##@@");
          if ($tmp_pos !== false)
          {
              $this->priv_update = substr($this->priv_update, 0, $tmp_pos);
          }
          $this->priv_export = $Busca_temp['priv_export']; 
          $tmp_pos = strpos($this->priv_export, "##@@");
          if ($tmp_pos !== false)
          {
              $this->priv_export = substr($this->priv_export, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT priv_access, priv_insert, priv_delete, priv_update, priv_export, priv_print from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT priv_access, priv_insert, priv_delete, priv_update, priv_export, priv_print from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['order_grid'];
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
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['priv_access'])) ? $this->New_label['priv_access'] : "Priv Access "; 
          if ($Cada_col == "priv_access" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['priv_insert'])) ? $this->New_label['priv_insert'] : "Priv Insert "; 
          if ($Cada_col == "priv_insert" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['priv_delete'])) ? $this->New_label['priv_delete'] : "Priv Delete "; 
          if ($Cada_col == "priv_delete" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['priv_update'])) ? $this->New_label['priv_update'] : "Priv Update "; 
          if ($Cada_col == "priv_update" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['priv_export'])) ? $this->New_label['priv_export'] : "Priv Export "; 
          if ($Cada_col == "priv_export" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['priv_print'])) ? $this->New_label['priv_print'] : "Priv Print "; 
          if ($Cada_col == "priv_print" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
         $this->priv_access = $rs->fields[0] ;  
         $this->priv_insert = $rs->fields[1] ;  
         $this->priv_delete = $rs->fields[2] ;  
         $this->priv_update = $rs->fields[3] ;  
         $this->priv_export = $rs->fields[4] ;  
         $this->priv_print = $rs->fields[5] ;  
         //----- lookup - priv_access
         $this->look_priv_access = $this->priv_access; 
         $this->Lookup->lookup_priv_access($this->look_priv_access); 
         $this->look_priv_access = ($this->look_priv_access == "&nbsp;") ? "" : $this->look_priv_access; 
         //----- lookup - priv_insert
         $this->look_priv_insert = $this->priv_insert; 
         $this->Lookup->lookup_priv_insert($this->look_priv_insert); 
         $this->look_priv_insert = ($this->look_priv_insert == "&nbsp;") ? "" : $this->look_priv_insert; 
         //----- lookup - priv_delete
         $this->look_priv_delete = $this->priv_delete; 
         $this->Lookup->lookup_priv_delete($this->look_priv_delete); 
         $this->look_priv_delete = ($this->look_priv_delete == "&nbsp;") ? "" : $this->look_priv_delete; 
         //----- lookup - priv_update
         $this->look_priv_update = $this->priv_update; 
         $this->Lookup->lookup_priv_update($this->look_priv_update); 
         $this->look_priv_update = ($this->look_priv_update == "&nbsp;") ? "" : $this->look_priv_update; 
         //----- lookup - priv_export
         $this->look_priv_export = $this->priv_export; 
         $this->Lookup->lookup_priv_export($this->look_priv_export); 
         $this->look_priv_export = ($this->look_priv_export == "&nbsp;") ? "" : $this->look_priv_export; 
         //----- lookup - priv_print
         $this->look_priv_print = $this->priv_print; 
         $this->Lookup->lookup_priv_print($this->look_priv_print); 
         $this->look_priv_print = ($this->look_priv_print == "&nbsp;") ? "" : $this->look_priv_print; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['field_order'] as $Cada_col)
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
   //----- priv_access
   function NM_export_priv_access()
   {
         $this->look_priv_access = html_entity_decode($this->look_priv_access, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_priv_access = strip_tags($this->look_priv_access);
         if (!NM_is_utf8($this->look_priv_access))
         {
             $this->look_priv_access = sc_convert_encoding($this->look_priv_access, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_priv_access = str_replace('<', '&lt;', $this->look_priv_access);
         $this->look_priv_access = str_replace('>', '&gt;', $this->look_priv_access);
         $this->Texto_tag .= "<td>" . $this->look_priv_access . "</td>\r\n";
   }
   //----- priv_insert
   function NM_export_priv_insert()
   {
         $this->look_priv_insert = html_entity_decode($this->look_priv_insert, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_priv_insert = strip_tags($this->look_priv_insert);
         if (!NM_is_utf8($this->look_priv_insert))
         {
             $this->look_priv_insert = sc_convert_encoding($this->look_priv_insert, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_priv_insert = str_replace('<', '&lt;', $this->look_priv_insert);
         $this->look_priv_insert = str_replace('>', '&gt;', $this->look_priv_insert);
         $this->Texto_tag .= "<td>" . $this->look_priv_insert . "</td>\r\n";
   }
   //----- priv_delete
   function NM_export_priv_delete()
   {
         $this->look_priv_delete = html_entity_decode($this->look_priv_delete, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_priv_delete = strip_tags($this->look_priv_delete);
         if (!NM_is_utf8($this->look_priv_delete))
         {
             $this->look_priv_delete = sc_convert_encoding($this->look_priv_delete, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_priv_delete = str_replace('<', '&lt;', $this->look_priv_delete);
         $this->look_priv_delete = str_replace('>', '&gt;', $this->look_priv_delete);
         $this->Texto_tag .= "<td>" . $this->look_priv_delete . "</td>\r\n";
   }
   //----- priv_update
   function NM_export_priv_update()
   {
         $this->look_priv_update = html_entity_decode($this->look_priv_update, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_priv_update = strip_tags($this->look_priv_update);
         if (!NM_is_utf8($this->look_priv_update))
         {
             $this->look_priv_update = sc_convert_encoding($this->look_priv_update, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_priv_update = str_replace('<', '&lt;', $this->look_priv_update);
         $this->look_priv_update = str_replace('>', '&gt;', $this->look_priv_update);
         $this->Texto_tag .= "<td>" . $this->look_priv_update . "</td>\r\n";
   }
   //----- priv_export
   function NM_export_priv_export()
   {
         $this->look_priv_export = html_entity_decode($this->look_priv_export, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_priv_export = strip_tags($this->look_priv_export);
         if (!NM_is_utf8($this->look_priv_export))
         {
             $this->look_priv_export = sc_convert_encoding($this->look_priv_export, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_priv_export = str_replace('<', '&lt;', $this->look_priv_export);
         $this->look_priv_export = str_replace('>', '&gt;', $this->look_priv_export);
         $this->Texto_tag .= "<td>" . $this->look_priv_export . "</td>\r\n";
   }
   //----- priv_print
   function NM_export_priv_print()
   {
         $this->look_priv_print = html_entity_decode($this->look_priv_print, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_priv_print = strip_tags($this->look_priv_print);
         if (!NM_is_utf8($this->look_priv_print))
         {
             $this->look_priv_print = sc_convert_encoding($this->look_priv_print, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_priv_print = str_replace('<', '&lt;', $this->look_priv_print);
         $this->look_priv_print = str_replace('>', '&gt;', $this->look_priv_print);
         $this->Texto_tag .= "<td>" . $this->look_priv_print . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_grid_sec_users_apps'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - sec_users_apps :: RTF</TITLE>
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
<form name="Fdown" method="get" action="app_grid_sec_users_apps_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="app_grid_sec_users_apps"> 
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
