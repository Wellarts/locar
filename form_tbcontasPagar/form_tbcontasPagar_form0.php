<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Contas à Pagar"); } else { echo strip_tags("Contas à Pagar"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbcontasPagar/form_tbcontasPagar_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbcontasPagar_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_tbcontasPagar_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $("#hidden_bloco_0,#hidden_bloco_1").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         $('#SC_fast_search_t').listen();
     }
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_0": true,
    "hidden_bloco_1": true
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_tbcontasPagar_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbcontasPagar'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbcontasPagar'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Contas à Pagar"; } else { echo "Contas à Pagar"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['empty_filter'] = true;
       }
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idcontaspagar']))
           {
               $this->nmgp_cmp_readonly['idcontaspagar'] = 'on';
           }
?>
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Dados à Pagar<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcontaspagar']))
    {
        $this->nm_new_label['idcontaspagar'] = "Código";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcontaspagar = $this->idcontaspagar;
   $sStyleHidden_idcontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['idcontaspagar']) && $this->nmgp_cmp_hidden['idcontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcontaspagar']);
       $sStyleHidden_idcontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcontaspagar = 'display: none;';
   $sStyleReadInp_idcontaspagar = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idcontaspagar"]) &&  $this->nmgp_cmp_readonly["idcontaspagar"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcontaspagar']);
       $sStyleReadLab_idcontaspagar = '';
       $sStyleReadInp_idcontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcontaspagar']) && $this->nmgp_cmp_hidden['idcontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcontaspagar" value="<?php echo $this->form_encode_input($idcontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idcontaspagar_label" id="hidden_field_label_idcontaspagar" style="<?php echo $sStyleHidden_idcontaspagar; ?>"><span id="id_label_idcontaspagar"><?php echo $this->nm_new_label['idcontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_idcontaspagar_line" id="hidden_field_data_idcontaspagar" style="<?php echo $sStyleHidden_idcontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcontaspagar_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idcontaspagar" class="css_idcontaspagar_line" style="<?php echo $sStyleReadLab_idcontaspagar; ?>"><?php echo $this->form_encode_input($this->idcontaspagar); ?></span><span id="id_read_off_idcontaspagar" style="<?php echo $sStyleReadInp_idcontaspagar; ?>"><input type="hidden" name="idcontaspagar" value="<?php echo $this->form_encode_input($idcontaspagar) . "\">"?><span id="id_ajax_label_idcontaspagar"><?php echo nl2br($idcontaspagar); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idfkcredorcontaspagar']))
   {
       $this->nm_new_label['idfkcredorcontaspagar'] = "Credor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkcredorcontaspagar = $this->idfkcredorcontaspagar;
   $sStyleHidden_idfkcredorcontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['idfkcredorcontaspagar']) && $this->nmgp_cmp_hidden['idfkcredorcontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkcredorcontaspagar']);
       $sStyleHidden_idfkcredorcontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkcredorcontaspagar = 'display: none;';
   $sStyleReadInp_idfkcredorcontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkcredorcontaspagar']) && $this->nmgp_cmp_readonly['idfkcredorcontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkcredorcontaspagar']);
       $sStyleReadLab_idfkcredorcontaspagar = '';
       $sStyleReadInp_idfkcredorcontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkcredorcontaspagar']) && $this->nmgp_cmp_hidden['idfkcredorcontaspagar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfkcredorcontaspagar" value="<?php echo $this->form_encode_input($this->idfkcredorcontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idfkcredorcontaspagar_label" id="hidden_field_label_idfkcredorcontaspagar" style="<?php echo $sStyleHidden_idfkcredorcontaspagar; ?>"><span id="id_label_idfkcredorcontaspagar"><?php echo $this->nm_new_label['idfkcredorcontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_idfkcredorcontaspagar_line" id="hidden_field_data_idfkcredorcontaspagar" style="<?php echo $sStyleHidden_idfkcredorcontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkcredorcontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkcredorcontaspagar"]) &&  $this->nmgp_cmp_readonly["idfkcredorcontaspagar"] == "on") { 
 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'] = array(); 
    }

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
   $x = 0; 
   $idfkcredorcontaspagar_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkcredorcontaspagar_1))
          {
              foreach ($this->idfkcredorcontaspagar_1 as $tmp_idfkcredorcontaspagar)
              {
                  if (trim($tmp_idfkcredorcontaspagar) === trim($cadaselect[1])) { $idfkcredorcontaspagar_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkcredorcontaspagar) === trim($cadaselect[1])) { $idfkcredorcontaspagar_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfkcredorcontaspagar" value="<?php echo $this->form_encode_input($idfkcredorcontaspagar) . "\">" . $idfkcredorcontaspagar_look . ""; ?>
<?php } else { ?>
 
<?php  
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_idfkcredorcontaspagar'] = array(); 
    }

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
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idfkcredorcontaspagar_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkcredorcontaspagar_1))
          {
              foreach ($this->idfkcredorcontaspagar_1 as $tmp_idfkcredorcontaspagar)
              {
                  if (trim($tmp_idfkcredorcontaspagar) === trim($cadaselect[1])) { $idfkcredorcontaspagar_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkcredorcontaspagar) === trim($cadaselect[1])) { $idfkcredorcontaspagar_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfkcredorcontaspagar_look))
          {
              $idfkcredorcontaspagar_look = $this->idfkcredorcontaspagar;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfkcredorcontaspagar\" class=\"css_idfkcredorcontaspagar_line\" style=\"" .  $sStyleReadLab_idfkcredorcontaspagar . "\">" . $this->form_encode_input($idfkcredorcontaspagar_look) . "</span><span id=\"id_read_off_idfkcredorcontaspagar\" style=\"" . $sStyleReadInp_idfkcredorcontaspagar . "\">";
   echo " <span id=\"idAjaxSelect_idfkcredorcontaspagar\"><select class=\"sc-js-input scFormObjectOdd css_idfkcredorcontaspagar_obj\" style=\"\" id=\"id_sc_field_idfkcredorcontaspagar\" name=\"idfkcredorcontaspagar\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfkcredorcontaspagar) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfkcredorcontaspagar)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkcredorcontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkcredorcontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qtdparcelascontaspagar']))
    {
        $this->nm_new_label['qtdparcelascontaspagar'] = "Qtd Parcelas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qtdparcelascontaspagar = $this->qtdparcelascontaspagar;
   $sStyleHidden_qtdparcelascontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['qtdparcelascontaspagar']) && $this->nmgp_cmp_hidden['qtdparcelascontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qtdparcelascontaspagar']);
       $sStyleHidden_qtdparcelascontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qtdparcelascontaspagar = 'display: none;';
   $sStyleReadInp_qtdparcelascontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qtdparcelascontaspagar']) && $this->nmgp_cmp_readonly['qtdparcelascontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qtdparcelascontaspagar']);
       $sStyleReadLab_qtdparcelascontaspagar = '';
       $sStyleReadInp_qtdparcelascontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qtdparcelascontaspagar']) && $this->nmgp_cmp_hidden['qtdparcelascontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qtdparcelascontaspagar" value="<?php echo $this->form_encode_input($qtdparcelascontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_qtdparcelascontaspagar_label" id="hidden_field_label_qtdparcelascontaspagar" style="<?php echo $sStyleHidden_qtdparcelascontaspagar; ?>"><span id="id_label_qtdparcelascontaspagar"><?php echo $this->nm_new_label['qtdparcelascontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_qtdparcelascontaspagar_line" id="hidden_field_data_qtdparcelascontaspagar" style="<?php echo $sStyleHidden_qtdparcelascontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qtdparcelascontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qtdparcelascontaspagar"]) &&  $this->nmgp_cmp_readonly["qtdparcelascontaspagar"] == "on") { 

 ?>
<input type="hidden" name="qtdparcelascontaspagar" value="<?php echo $this->form_encode_input($qtdparcelascontaspagar) . "\">" . $qtdparcelascontaspagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_qtdparcelascontaspagar" class="sc-ui-readonly-qtdparcelascontaspagar css_qtdparcelascontaspagar_line" style="<?php echo $sStyleReadLab_qtdparcelascontaspagar; ?>"><?php echo $this->form_encode_input($this->qtdparcelascontaspagar); ?></span><span id="id_read_off_qtdparcelascontaspagar" style="white-space: nowrap;<?php echo $sStyleReadInp_qtdparcelascontaspagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_qtdparcelascontaspagar_obj" style="" id="id_sc_field_qtdparcelascontaspagar" type=text name="qtdparcelascontaspagar" value="<?php echo $this->form_encode_input($qtdparcelascontaspagar) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['qtdparcelascontaspagar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['qtdparcelascontaspagar']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qtdparcelascontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qtdparcelascontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['datavencimentocontaspagar']))
    {
        $this->nm_new_label['datavencimentocontaspagar'] = "1º Parcela";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $datavencimentocontaspagar = $this->datavencimentocontaspagar;
   $sStyleHidden_datavencimentocontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['datavencimentocontaspagar']) && $this->nmgp_cmp_hidden['datavencimentocontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datavencimentocontaspagar']);
       $sStyleHidden_datavencimentocontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datavencimentocontaspagar = 'display: none;';
   $sStyleReadInp_datavencimentocontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datavencimentocontaspagar']) && $this->nmgp_cmp_readonly['datavencimentocontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datavencimentocontaspagar']);
       $sStyleReadLab_datavencimentocontaspagar = '';
       $sStyleReadInp_datavencimentocontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datavencimentocontaspagar']) && $this->nmgp_cmp_hidden['datavencimentocontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datavencimentocontaspagar" value="<?php echo $this->form_encode_input($datavencimentocontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_datavencimentocontaspagar_label" id="hidden_field_label_datavencimentocontaspagar" style="<?php echo $sStyleHidden_datavencimentocontaspagar; ?>"><span id="id_label_datavencimentocontaspagar"><?php echo $this->nm_new_label['datavencimentocontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_datavencimentocontaspagar_line" id="hidden_field_data_datavencimentocontaspagar" style="<?php echo $sStyleHidden_datavencimentocontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datavencimentocontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datavencimentocontaspagar"]) &&  $this->nmgp_cmp_readonly["datavencimentocontaspagar"] == "on") { 

 ?>
<input type="hidden" name="datavencimentocontaspagar" value="<?php echo $this->form_encode_input($datavencimentocontaspagar) . "\">" . $datavencimentocontaspagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_datavencimentocontaspagar" class="sc-ui-readonly-datavencimentocontaspagar css_datavencimentocontaspagar_line" style="<?php echo $sStyleReadLab_datavencimentocontaspagar; ?>"><?php echo $this->form_encode_input($datavencimentocontaspagar); ?></span><span id="id_read_off_datavencimentocontaspagar" style="white-space: nowrap;<?php echo $sStyleReadInp_datavencimentocontaspagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_datavencimentocontaspagar_obj" style="" id="id_sc_field_datavencimentocontaspagar" type=text name="datavencimentocontaspagar" value="<?php echo $this->form_encode_input($datavencimentocontaspagar) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['datavencimentocontaspagar']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datavencimentocontaspagar']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['datavencimentocontaspagar']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datavencimentocontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datavencimentocontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diasaviso']))
    {
        $this->nm_new_label['diasaviso'] = "Aviso (dias)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diasaviso = $this->diasaviso;
   $sStyleHidden_diasaviso = '';
   if (isset($this->nmgp_cmp_hidden['diasaviso']) && $this->nmgp_cmp_hidden['diasaviso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diasaviso']);
       $sStyleHidden_diasaviso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diasaviso = 'display: none;';
   $sStyleReadInp_diasaviso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diasaviso']) && $this->nmgp_cmp_readonly['diasaviso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diasaviso']);
       $sStyleReadLab_diasaviso = '';
       $sStyleReadInp_diasaviso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diasaviso']) && $this->nmgp_cmp_hidden['diasaviso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diasaviso" value="<?php echo $this->form_encode_input($diasaviso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diasaviso_label" id="hidden_field_label_diasaviso" style="<?php echo $sStyleHidden_diasaviso; ?>"><span id="id_label_diasaviso"><?php echo $this->nm_new_label['diasaviso']; ?></span></TD>
    <TD class="scFormDataOdd css_diasaviso_line" id="hidden_field_data_diasaviso" style="<?php echo $sStyleHidden_diasaviso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diasaviso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diasaviso"]) &&  $this->nmgp_cmp_readonly["diasaviso"] == "on") { 

 ?>
<input type="hidden" name="diasaviso" value="<?php echo $this->form_encode_input($diasaviso) . "\">" . $diasaviso . ""; ?>
<?php } else { ?>
<span id="id_read_on_diasaviso" class="sc-ui-readonly-diasaviso css_diasaviso_line" style="<?php echo $sStyleReadLab_diasaviso; ?>"><?php echo $this->form_encode_input($this->diasaviso); ?></span><span id="id_read_off_diasaviso" style="white-space: nowrap;<?php echo $sStyleReadInp_diasaviso; ?>">
 <input class="sc-js-input scFormObjectOdd css_diasaviso_obj" style="" id="id_sc_field_diasaviso" type=text name="diasaviso" value="<?php echo $this->form_encode_input($diasaviso) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['diasaviso']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['diasaviso']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diasaviso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diasaviso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valorcontaspagar']))
    {
        $this->nm_new_label['valorcontaspagar'] = "Valor da Parcela";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorcontaspagar = $this->valorcontaspagar;
   $sStyleHidden_valorcontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['valorcontaspagar']) && $this->nmgp_cmp_hidden['valorcontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorcontaspagar']);
       $sStyleHidden_valorcontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorcontaspagar = 'display: none;';
   $sStyleReadInp_valorcontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorcontaspagar']) && $this->nmgp_cmp_readonly['valorcontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorcontaspagar']);
       $sStyleReadLab_valorcontaspagar = '';
       $sStyleReadInp_valorcontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorcontaspagar']) && $this->nmgp_cmp_hidden['valorcontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorcontaspagar" value="<?php echo $this->form_encode_input($valorcontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valorcontaspagar_label" id="hidden_field_label_valorcontaspagar" style="<?php echo $sStyleHidden_valorcontaspagar; ?>"><span id="id_label_valorcontaspagar"><?php echo $this->nm_new_label['valorcontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_valorcontaspagar_line" id="hidden_field_data_valorcontaspagar" style="<?php echo $sStyleHidden_valorcontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorcontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorcontaspagar"]) &&  $this->nmgp_cmp_readonly["valorcontaspagar"] == "on") { 

 ?>
<input type="hidden" name="valorcontaspagar" value="<?php echo $this->form_encode_input($valorcontaspagar) . "\">" . $valorcontaspagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorcontaspagar" class="sc-ui-readonly-valorcontaspagar css_valorcontaspagar_line" style="<?php echo $sStyleReadLab_valorcontaspagar; ?>"><?php echo $this->form_encode_input($this->valorcontaspagar); ?></span><span id="id_read_off_valorcontaspagar" style="white-space: nowrap;<?php echo $sStyleReadInp_valorcontaspagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_valorcontaspagar_obj" style="" id="id_sc_field_valorcontaspagar" type=text name="valorcontaspagar" value="<?php echo $this->form_encode_input($valorcontaspagar) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valorcontaspagar']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valorcontaspagar']['format_pos'] || 3 == $this->field_config['valorcontaspagar']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorcontaspagar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorcontaspagar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorcontaspagar']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorcontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorcontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Dados do Pagamento<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ordemparcelacontaspagar']))
    {
        $this->nm_new_label['ordemparcelacontaspagar'] = "Parcela Nº";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ordemparcelacontaspagar = $this->ordemparcelacontaspagar;
   $sStyleHidden_ordemparcelacontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['ordemparcelacontaspagar']) && $this->nmgp_cmp_hidden['ordemparcelacontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ordemparcelacontaspagar']);
       $sStyleHidden_ordemparcelacontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ordemparcelacontaspagar = 'display: none;';
   $sStyleReadInp_ordemparcelacontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ordemparcelacontaspagar']) && $this->nmgp_cmp_readonly['ordemparcelacontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ordemparcelacontaspagar']);
       $sStyleReadLab_ordemparcelacontaspagar = '';
       $sStyleReadInp_ordemparcelacontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ordemparcelacontaspagar']) && $this->nmgp_cmp_hidden['ordemparcelacontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ordemparcelacontaspagar" value="<?php echo $this->form_encode_input($ordemparcelacontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ordemparcelacontaspagar_label" id="hidden_field_label_ordemparcelacontaspagar" style="<?php echo $sStyleHidden_ordemparcelacontaspagar; ?>"><span id="id_label_ordemparcelacontaspagar"><?php echo $this->nm_new_label['ordemparcelacontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_ordemparcelacontaspagar_line" id="hidden_field_data_ordemparcelacontaspagar" style="<?php echo $sStyleHidden_ordemparcelacontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ordemparcelacontaspagar_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="ordemparcelacontaspagar" value="<?php echo $this->form_encode_input($ordemparcelacontaspagar); ?>"><span id="id_ajax_label_ordemparcelacontaspagar"><?php echo nl2br($ordemparcelacontaspagar); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ordemparcelacontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ordemparcelacontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['datapagamentocontaspagar']))
    {
        $this->nm_new_label['datapagamentocontaspagar'] = "Pagamento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $datapagamentocontaspagar = $this->datapagamentocontaspagar;
   $sStyleHidden_datapagamentocontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['datapagamentocontaspagar']) && $this->nmgp_cmp_hidden['datapagamentocontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datapagamentocontaspagar']);
       $sStyleHidden_datapagamentocontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datapagamentocontaspagar = 'display: none;';
   $sStyleReadInp_datapagamentocontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datapagamentocontaspagar']) && $this->nmgp_cmp_readonly['datapagamentocontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datapagamentocontaspagar']);
       $sStyleReadLab_datapagamentocontaspagar = '';
       $sStyleReadInp_datapagamentocontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datapagamentocontaspagar']) && $this->nmgp_cmp_hidden['datapagamentocontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datapagamentocontaspagar" value="<?php echo $this->form_encode_input($datapagamentocontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_datapagamentocontaspagar_label" id="hidden_field_label_datapagamentocontaspagar" style="<?php echo $sStyleHidden_datapagamentocontaspagar; ?>"><span id="id_label_datapagamentocontaspagar"><?php echo $this->nm_new_label['datapagamentocontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_datapagamentocontaspagar_line" id="hidden_field_data_datapagamentocontaspagar" style="<?php echo $sStyleHidden_datapagamentocontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datapagamentocontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datapagamentocontaspagar"]) &&  $this->nmgp_cmp_readonly["datapagamentocontaspagar"] == "on") { 

 ?>
<input type="hidden" name="datapagamentocontaspagar" value="<?php echo $this->form_encode_input($datapagamentocontaspagar) . "\">" . $datapagamentocontaspagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_datapagamentocontaspagar" class="sc-ui-readonly-datapagamentocontaspagar css_datapagamentocontaspagar_line" style="<?php echo $sStyleReadLab_datapagamentocontaspagar; ?>"><?php echo $this->form_encode_input($datapagamentocontaspagar); ?></span><span id="id_read_off_datapagamentocontaspagar" style="white-space: nowrap;<?php echo $sStyleReadInp_datapagamentocontaspagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_datapagamentocontaspagar_obj" style="" id="id_sc_field_datapagamentocontaspagar" type=text name="datapagamentocontaspagar" value="<?php echo $this->form_encode_input($datapagamentocontaspagar) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['datapagamentocontaspagar']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datapagamentocontaspagar']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['datapagamentocontaspagar']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datapagamentocontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datapagamentocontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valorpagocontaspagar']))
    {
        $this->nm_new_label['valorpagocontaspagar'] = "Valor Pago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorpagocontaspagar = $this->valorpagocontaspagar;
   $sStyleHidden_valorpagocontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['valorpagocontaspagar']) && $this->nmgp_cmp_hidden['valorpagocontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorpagocontaspagar']);
       $sStyleHidden_valorpagocontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorpagocontaspagar = 'display: none;';
   $sStyleReadInp_valorpagocontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorpagocontaspagar']) && $this->nmgp_cmp_readonly['valorpagocontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorpagocontaspagar']);
       $sStyleReadLab_valorpagocontaspagar = '';
       $sStyleReadInp_valorpagocontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorpagocontaspagar']) && $this->nmgp_cmp_hidden['valorpagocontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorpagocontaspagar" value="<?php echo $this->form_encode_input($valorpagocontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valorpagocontaspagar_label" id="hidden_field_label_valorpagocontaspagar" style="<?php echo $sStyleHidden_valorpagocontaspagar; ?>"><span id="id_label_valorpagocontaspagar"><?php echo $this->nm_new_label['valorpagocontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_valorpagocontaspagar_line" id="hidden_field_data_valorpagocontaspagar" style="<?php echo $sStyleHidden_valorpagocontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorpagocontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorpagocontaspagar"]) &&  $this->nmgp_cmp_readonly["valorpagocontaspagar"] == "on") { 

 ?>
<input type="hidden" name="valorpagocontaspagar" value="<?php echo $this->form_encode_input($valorpagocontaspagar) . "\">" . $valorpagocontaspagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorpagocontaspagar" class="sc-ui-readonly-valorpagocontaspagar css_valorpagocontaspagar_line" style="<?php echo $sStyleReadLab_valorpagocontaspagar; ?>"><?php echo $this->form_encode_input($this->valorpagocontaspagar); ?></span><span id="id_read_off_valorpagocontaspagar" style="white-space: nowrap;<?php echo $sStyleReadInp_valorpagocontaspagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_valorpagocontaspagar_obj" style="" id="id_sc_field_valorpagocontaspagar" type=text name="valorpagocontaspagar" value="<?php echo $this->form_encode_input($valorpagocontaspagar) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valorpagocontaspagar']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valorpagocontaspagar']['format_pos'] || 3 == $this->field_config['valorpagocontaspagar']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorpagocontaspagar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorpagocontaspagar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorpagocontaspagar']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorpagocontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorpagocontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['quitadocontaspagar']))
   {
       $this->nm_new_label['quitadocontaspagar'] = "Pago?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $quitadocontaspagar = $this->quitadocontaspagar;
   $sStyleHidden_quitadocontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['quitadocontaspagar']) && $this->nmgp_cmp_hidden['quitadocontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['quitadocontaspagar']);
       $sStyleHidden_quitadocontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_quitadocontaspagar = 'display: none;';
   $sStyleReadInp_quitadocontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['quitadocontaspagar']) && $this->nmgp_cmp_readonly['quitadocontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['quitadocontaspagar']);
       $sStyleReadLab_quitadocontaspagar = '';
       $sStyleReadInp_quitadocontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['quitadocontaspagar']) && $this->nmgp_cmp_hidden['quitadocontaspagar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="quitadocontaspagar" value="<?php echo $this->form_encode_input($this->quitadocontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->quitadocontaspagar_1 = explode(";", trim($this->quitadocontaspagar));
  } 
  else
  {
      if (empty($this->quitadocontaspagar))
      {
          $this->quitadocontaspagar_1= array(); 
      } 
      else
      {
          $this->quitadocontaspagar_1= $this->quitadocontaspagar; 
          $this->quitadocontaspagar= ""; 
          foreach ($this->quitadocontaspagar_1 as $cada_quitadocontaspagar)
          {
             if (!empty($quitadocontaspagar))
             {
                 $this->quitadocontaspagar.= ";"; 
             } 
             $this->quitadocontaspagar.= $cada_quitadocontaspagar; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_quitadocontaspagar_label" id="hidden_field_label_quitadocontaspagar" style="<?php echo $sStyleHidden_quitadocontaspagar; ?>"><span id="id_label_quitadocontaspagar"><?php echo $this->nm_new_label['quitadocontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_quitadocontaspagar_line" id="hidden_field_data_quitadocontaspagar" style="<?php echo $sStyleHidden_quitadocontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_quitadocontaspagar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quitadocontaspagar"]) &&  $this->nmgp_cmp_readonly["quitadocontaspagar"] == "on") { 

$quitadocontaspagar_look = "";
 if (in_array("1", $this->quitadocontaspagar_1))  { $quitadocontaspagar_look .= "SIM<br />";} 
?>
<input type="hidden" name="quitadocontaspagar" value="<?php echo $this->form_encode_input($quitadocontaspagar) . "\">" . $quitadocontaspagar_look . ""; ?>
<?php } else { ?>

<?php

$quitadocontaspagar_look = "";
 if (in_array("1", $this->quitadocontaspagar_1))  { $quitadocontaspagar_look .= "SIM<br />";} 
?>
<span id="id_read_on_quitadocontaspagar" class="css_quitadocontaspagar_line" style="<?php echo $sStyleReadLab_quitadocontaspagar; ?>"><?php echo $this->form_encode_input($quitadocontaspagar_look); ?></span><span id="id_read_off_quitadocontaspagar" style="<?php echo $sStyleReadInp_quitadocontaspagar; ?>"><?php echo "<div id=\"idAjaxCheckbox_quitadocontaspagar\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_quitadocontaspagar_line"> <input type=checkbox class="sc-ui-checkbox-quitadocontaspagar sc-ui-checkbox-quitadocontaspagar" name="quitadocontaspagar[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['Lookup_quitadocontaspagar'][] = '1'; ?>
<?php  if (in_array("1", $this->quitadocontaspagar_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;">SIM</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_quitadocontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quitadocontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obscontaspagar']))
    {
        $this->nm_new_label['obscontaspagar'] = "Observações";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obscontaspagar = $this->obscontaspagar;
   $sStyleHidden_obscontaspagar = '';
   if (isset($this->nmgp_cmp_hidden['obscontaspagar']) && $this->nmgp_cmp_hidden['obscontaspagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obscontaspagar']);
       $sStyleHidden_obscontaspagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obscontaspagar = 'display: none;';
   $sStyleReadInp_obscontaspagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obscontaspagar']) && $this->nmgp_cmp_readonly['obscontaspagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obscontaspagar']);
       $sStyleReadLab_obscontaspagar = '';
       $sStyleReadInp_obscontaspagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obscontaspagar']) && $this->nmgp_cmp_hidden['obscontaspagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obscontaspagar" value="<?php echo $this->form_encode_input($obscontaspagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_obscontaspagar_label" id="hidden_field_label_obscontaspagar" style="<?php echo $sStyleHidden_obscontaspagar; ?>"><span id="id_label_obscontaspagar"><?php echo $this->nm_new_label['obscontaspagar']; ?></span></TD>
    <TD class="scFormDataOdd css_obscontaspagar_line" id="hidden_field_data_obscontaspagar" style="<?php echo $sStyleHidden_obscontaspagar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obscontaspagar_line" style="vertical-align: top;padding: 0px">
<?php
$obscontaspagar_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obscontaspagar));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obscontaspagar"]) &&  $this->nmgp_cmp_readonly["obscontaspagar"] == "on") { 

 ?>
<input type="hidden" name="obscontaspagar" value="<?php echo $this->form_encode_input($obscontaspagar) . "\">" . $obscontaspagar_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obscontaspagar" class="sc-ui-readonly-obscontaspagar css_obscontaspagar_line" style="<?php echo $sStyleReadLab_obscontaspagar; ?>"><?php echo $this->form_encode_input($obscontaspagar_val); ?></span><span id="id_read_off_obscontaspagar" style="white-space: nowrap;<?php echo $sStyleReadInp_obscontaspagar; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_obscontaspagar_obj" style="white-space: pre-wrap;" name="obscontaspagar" id="id_sc_field_obscontaspagar" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $obscontaspagar; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obscontaspagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obscontaspagar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcontasPagar']['masterValue']))
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
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbcontasPagar");
 parent.scAjaxDetailHeight("form_tbcontasPagar", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbcontasPagar", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbcontasPagar", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
