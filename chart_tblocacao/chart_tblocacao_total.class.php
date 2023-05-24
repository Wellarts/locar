<?php

class chart_tblocacao_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function chart_tblocacao_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['sc_session'][$this->sc_page]['chart_tblocacao']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['chart_tblocacao']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $idfkveiculolocacao;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['tot_geral'] = array() ;  
      $nm_comando = "select count(*), sum(valorLiquidoLocacao) as sum_valorliquidolocacao from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['contr_total_geral'] = "OK";
   } 

   //-----  datasaidalocacao
   function quebra_datasaidalocacao_sc_free_group_by($datasaidalocacao, $Where_qb) 
   {
      global $tot_datasaidalocacao , $idfkveiculolocacao, $Sc_groupby_datasaidalocacao;  
      $tot_datasaidalocacao = array() ;  
      $nm_comando = "select count(*), sum(valorLiquidoLocacao) as sum_valorliquidolocacao from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_datasaidalocacao[0] = NM_encode_input(sc_strip_script($datasaidalocacao)) ; 
      $tot_datasaidalocacao[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_datasaidalocacao[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  idfkveiculolocacao
   function quebra_idfkveiculolocacao_sc_free_group_by($idfkveiculolocacao, $Where_qb) 
   {
      global $tot_idfkveiculolocacao , $idfkveiculolocacao, $Sc_groupby_datasaidalocacao;  
      $tot_idfkveiculolocacao = array() ;  
      $nm_comando = "select count(*), sum(valorLiquidoLocacao) as sum_valorliquidolocacao from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_idfkveiculolocacao[0] = NM_encode_input(sc_strip_script($idfkveiculolocacao)) ; 
      $tot_idfkveiculolocacao[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_idfkveiculolocacao[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  valorliquidolocacao
   function quebra_valorliquidolocacao_sc_free_group_by($valorliquidolocacao, $Where_qb) 
   {
      global $tot_valorliquidolocacao , $idfkveiculolocacao, $Sc_groupby_datasaidalocacao;  
      $tot_valorliquidolocacao = array() ;  
      $nm_comando = "select count(*), sum(valorLiquidoLocacao) as sum_valorliquidolocacao from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_valorliquidolocacao[0] = NM_encode_input(sc_strip_script($valorliquidolocacao)) ; 
      $tot_valorliquidolocacao[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_valorliquidolocacao[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 


   //----- 
   function resumo_sc_free_group_by($destino_resumo, &$array_total_datasaidalocacao, &$array_total_idfkveiculolocacao, &$array_total_valorliquidolocacao)
   {
      global $nada, $nm_lang, $idfkveiculolocacao;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['where_pesq_filtro'];
   $temp = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['SC_Gb_Free_sql'] as $cmp_gb => $ord)
   {
       $temp .= (empty($temp)) ? $cmp_gb . " " . $ord : ", " . $cmp_gb . " " . $ord;
   }
   $nmgp_order_by = (!empty($temp)) ? " order by " . $temp : "";
   $free_group_by = "";
   $all_sql_free  = array();
   $all_sql_free[] = "dataSaidaLocacao";
   $all_sql_free[] = "idFKveiculoLocacao";
   $all_sql_free[] = "valorLiquidoLocacao";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['SC_Gb_Free_sql'] as $cmp_gb => $ord)
   {
       $free_group_by .= (empty($free_group_by)) ? $cmp_gb : ", " . $cmp_gb;
   }
   foreach ($all_sql_free as $cmp_gb)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['SC_Gb_Free_sql'][$cmp_gb]))
       {
           $free_group_by .= (empty($free_group_by)) ? $cmp_gb : ", " . $cmp_gb;
       }
   }
     $comando  = "select count(*), sum(valorLiquidoLocacao) as sum_valorliquidolocacao, dataSaidaLocacao, idFKveiculoLocacao, valorLiquidoLocacao from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by " . $free_group_by . "  " . $nmgp_order_by;
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $registro[2] = substr($registro[2], 0, 7);
         $datasaidalocacao      = $registro[2];
         $datasaidalocacao_orig = $registro[2];
         $conteudo = $registro[2];
        $conteudo_x = $conteudo;
        nm_conv_limpa_dado($conteudo_x, "YYYY-MM");
        if (is_numeric($conteudo_x) && $conteudo_x > 0) 
        { 
            $this->nm_data->SetaData($conteudo, "YYYY-MM");
            $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "mmaaaa"));
        } 
         $datasaidalocacao = $conteudo;
         if (null === $datasaidalocacao)
         {
             $datasaidalocacao = '';
         }
         if (null === $datasaidalocacao_orig)
         {
             $datasaidalocacao_orig = '';
         }
         $val_grafico_datasaidalocacao = $datasaidalocacao;
         $idfkveiculolocacao      = $registro[3];
         $idfkveiculolocacao_orig = $registro[3];
         $conteudo = $registro[3];
         $this->Lookup->lookup_idfkveiculolocacao($conteudo , $idfkveiculolocacao_orig) ; 
         $idfkveiculolocacao = $conteudo;
         if (null === $idfkveiculolocacao)
         {
             $idfkveiculolocacao = '';
         }
         if (null === $idfkveiculolocacao_orig)
         {
             $idfkveiculolocacao_orig = '';
         }
         $val_grafico_idfkveiculolocacao = $idfkveiculolocacao;
         $valorliquidolocacao      = $registro[4];
         $valorliquidolocacao_orig = $registro[4];
         $conteudo = $registro[4];
        nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $valorliquidolocacao = $conteudo;
         if (null === $valorliquidolocacao)
         {
             $valorliquidolocacao = '';
         }
         if (null === $valorliquidolocacao_orig)
         {
             $valorliquidolocacao_orig = '';
         }
         $val_grafico_valorliquidolocacao = $valorliquidolocacao;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $datasaidalocacao_orig        = NM_encode_input(sc_strip_script($datasaidalocacao_orig));
         $val_grafico_datasaidalocacao = NM_encode_input(sc_strip_script($val_grafico_datasaidalocacao));
         $idfkveiculolocacao_orig        = NM_encode_input(sc_strip_script($idfkveiculolocacao_orig));
         $val_grafico_idfkveiculolocacao = NM_encode_input(sc_strip_script($val_grafico_idfkveiculolocacao));
         $valorliquidolocacao_orig        = NM_encode_input(sc_strip_script($valorliquidolocacao_orig));
         $val_grafico_valorliquidolocacao = NM_encode_input(sc_strip_script($val_grafico_valorliquidolocacao));
         $contr_arr = "";
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['chart_tblocacao']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
         {
             $temp       = $cmp_gb . "_orig";
             $contr_arr .= "[\"" . str_replace('"', '\"', $$temp) . "\"]";
             $arr_name   = "array_total_" . $cmp_gb . $contr_arr;
            eval ('
             if (!isset($' . $arr_name . '))
             {
                 $' . $arr_name . '[0] = ' . $registro[0] . ';
                 $' . $arr_name . '[1] = ' . $registro[1] . ';
                 $' . $arr_name . '[2] = $val_grafico_' . $cmp_gb . ';
                 $' . $arr_name . '[3] = "' . str_replace('"', '\"', $$temp) . '";
             }
             else
             {
                 $' . $arr_name . '[0] += ' . $registro[0] . ';
                 $' . $arr_name . '[1] += ' . $registro[1] . ';
             }
            ');
         }
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
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
