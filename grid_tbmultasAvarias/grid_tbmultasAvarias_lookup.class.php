<?php
class grid_tbmultasAvarias_lookup
{
//  
   function lookup_pagomultasavarias(&$pagomultasavarias) 
   {
      $conteudo = "" ; 
      if ($pagomultasavarias == "1")
      { 
          $conteudo = "SIM";
      } 
      if ($pagomultasavarias == "0")
      { 
          $conteudo = "NÃO";
      } 
      if (!empty($conteudo)) 
      { 
          $pagomultasavarias = $conteudo; 
      } 
   }  
}
?>
