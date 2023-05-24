<?php
class app_grid_sec_users_apps_lookup
{
//  
   function lookup_priv_access(&$priv_access) 
   {
      $conteudo = "" ; 
      if ($priv_access == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_access == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_access = $conteudo; 
      } 
   }  
//  
   function lookup_priv_insert(&$priv_insert) 
   {
      $conteudo = "" ; 
      if ($priv_insert == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_insert == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_insert = $conteudo; 
      } 
   }  
//  
   function lookup_priv_delete(&$priv_delete) 
   {
      $conteudo = "" ; 
      if ($priv_delete == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_delete == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_delete = $conteudo; 
      } 
   }  
//  
   function lookup_priv_update(&$priv_update) 
   {
      $conteudo = "" ; 
      if ($priv_update == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_update == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_update = $conteudo; 
      } 
   }  
//  
   function lookup_priv_export(&$priv_export) 
   {
      $conteudo = "" ; 
      if ($priv_export == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_export == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_export = $conteudo; 
      } 
   }  
//  
   function lookup_priv_print(&$priv_print) 
   {
      $conteudo = "" ; 
      if ($priv_print == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_print == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_print = $conteudo; 
      } 
   }  
}
?>
