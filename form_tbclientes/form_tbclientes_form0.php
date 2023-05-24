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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Cadastro de Clientes"); } else { echo strip_tags("Cadastro de Clientes"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbclientes/form_tbclientes_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbclientes_sajax_js.php");
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

include_once('form_tbclientes_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['recarga'];
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
 include_once("form_tbclientes_js0.php");
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
<form name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbclientes'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbclientes'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Cadastro de Clientes"; } else { echo "Cadastro de Clientes"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['fast_search'][2] : "";
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="imgcnh_ul_name" id="id_sc_field_imgcnh_ul_name" value="<?php echo $this->form_encode_input($this->imgcnh_ul_name);?>">
<input type="hidden" name="imgcnh_ul_type" id="id_sc_field_imgcnh_ul_type" value="<?php echo $this->form_encode_input($this->imgcnh_ul_type);?>">
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idcliente']))
           {
               $this->nmgp_cmp_readonly['idcliente'] = 'on';
           }
?>
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Dados Pessoais<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcliente']))
    {
        $this->nm_new_label['idcliente'] = "Código";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcliente = $this->idcliente;
   $sStyleHidden_idcliente = '';
   if (isset($this->nmgp_cmp_hidden['idcliente']) && $this->nmgp_cmp_hidden['idcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcliente']);
       $sStyleHidden_idcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcliente = 'display: none;';
   $sStyleReadInp_idcliente = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idcliente"]) &&  $this->nmgp_cmp_readonly["idcliente"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcliente']);
       $sStyleReadLab_idcliente = '';
       $sStyleReadInp_idcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcliente']) && $this->nmgp_cmp_hidden['idcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcliente" value="<?php echo $this->form_encode_input($idcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idcliente_label" id="hidden_field_label_idcliente" style="<?php echo $sStyleHidden_idcliente; ?>"><span id="id_label_idcliente"><?php echo $this->nm_new_label['idcliente']; ?></span></TD>
    <TD class="scFormDataOdd css_idcliente_line" id="hidden_field_data_idcliente" style="<?php echo $sStyleHidden_idcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcliente_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idcliente" class="css_idcliente_line" style="<?php echo $sStyleReadLab_idcliente; ?>"><?php echo $this->form_encode_input($this->idcliente); ?></span><span id="id_read_off_idcliente" style="<?php echo $sStyleReadInp_idcliente; ?>"><input type="hidden" name="idcliente" value="<?php echo $this->form_encode_input($idcliente) . "\">"?><span id="id_ajax_label_idcliente"><?php echo nl2br($idcliente); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcliente_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['nomecliente']))
    {
        $this->nm_new_label['nomecliente'] = "Nome/Razão Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomecliente = $this->nomecliente;
   $sStyleHidden_nomecliente = '';
   if (isset($this->nmgp_cmp_hidden['nomecliente']) && $this->nmgp_cmp_hidden['nomecliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomecliente']);
       $sStyleHidden_nomecliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomecliente = 'display: none;';
   $sStyleReadInp_nomecliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomecliente']) && $this->nmgp_cmp_readonly['nomecliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomecliente']);
       $sStyleReadLab_nomecliente = '';
       $sStyleReadInp_nomecliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomecliente']) && $this->nmgp_cmp_hidden['nomecliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomecliente" value="<?php echo $this->form_encode_input($nomecliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomecliente_label" id="hidden_field_label_nomecliente" style="<?php echo $sStyleHidden_nomecliente; ?>"><span id="id_label_nomecliente"><?php echo $this->nm_new_label['nomecliente']; ?></span></TD>
    <TD class="scFormDataOdd css_nomecliente_line" id="hidden_field_data_nomecliente" style="<?php echo $sStyleHidden_nomecliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nomecliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomecliente"]) &&  $this->nmgp_cmp_readonly["nomecliente"] == "on") { 

 ?>
<input type="hidden" name="nomecliente" value="<?php echo $this->form_encode_input($nomecliente) . "\">" . $nomecliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomecliente" class="sc-ui-readonly-nomecliente css_nomecliente_line" style="<?php echo $sStyleReadLab_nomecliente; ?>"><?php echo $this->form_encode_input($this->nomecliente); ?></span><span id="id_read_off_nomecliente" style="white-space: nowrap;<?php echo $sStyleReadInp_nomecliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomecliente_obj" style="" id="id_sc_field_nomecliente" type=text name="nomecliente" value="<?php echo $this->form_encode_input($nomecliente) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomecliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomecliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['enderecocliente']))
    {
        $this->nm_new_label['enderecocliente'] = "Endereço";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enderecocliente = $this->enderecocliente;
   $sStyleHidden_enderecocliente = '';
   if (isset($this->nmgp_cmp_hidden['enderecocliente']) && $this->nmgp_cmp_hidden['enderecocliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enderecocliente']);
       $sStyleHidden_enderecocliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enderecocliente = 'display: none;';
   $sStyleReadInp_enderecocliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enderecocliente']) && $this->nmgp_cmp_readonly['enderecocliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enderecocliente']);
       $sStyleReadLab_enderecocliente = '';
       $sStyleReadInp_enderecocliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enderecocliente']) && $this->nmgp_cmp_hidden['enderecocliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enderecocliente" value="<?php echo $this->form_encode_input($enderecocliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enderecocliente_label" id="hidden_field_label_enderecocliente" style="<?php echo $sStyleHidden_enderecocliente; ?>"><span id="id_label_enderecocliente"><?php echo $this->nm_new_label['enderecocliente']; ?></span></TD>
    <TD class="scFormDataOdd css_enderecocliente_line" id="hidden_field_data_enderecocliente" style="<?php echo $sStyleHidden_enderecocliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enderecocliente_line" style="vertical-align: top;padding: 0px">
<?php
$enderecocliente_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($enderecocliente));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enderecocliente"]) &&  $this->nmgp_cmp_readonly["enderecocliente"] == "on") { 

 ?>
<input type="hidden" name="enderecocliente" value="<?php echo $this->form_encode_input($enderecocliente) . "\">" . $enderecocliente_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_enderecocliente" class="sc-ui-readonly-enderecocliente css_enderecocliente_line" style="<?php echo $sStyleReadLab_enderecocliente; ?>"><?php echo $this->form_encode_input($enderecocliente_val); ?></span><span id="id_read_off_enderecocliente" style="white-space: nowrap;<?php echo $sStyleReadInp_enderecocliente; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_enderecocliente_obj" style="white-space: pre-wrap;" name="enderecocliente" id="id_sc_field_enderecocliente" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $enderecocliente; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enderecocliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enderecocliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idfkestadocliente']))
   {
       $this->nm_new_label['idfkestadocliente'] = "UF";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkestadocliente = $this->idfkestadocliente;
   $sStyleHidden_idfkestadocliente = '';
   if (isset($this->nmgp_cmp_hidden['idfkestadocliente']) && $this->nmgp_cmp_hidden['idfkestadocliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkestadocliente']);
       $sStyleHidden_idfkestadocliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkestadocliente = 'display: none;';
   $sStyleReadInp_idfkestadocliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkestadocliente']) && $this->nmgp_cmp_readonly['idfkestadocliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkestadocliente']);
       $sStyleReadLab_idfkestadocliente = '';
       $sStyleReadInp_idfkestadocliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkestadocliente']) && $this->nmgp_cmp_hidden['idfkestadocliente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfkestadocliente" value="<?php echo $this->form_encode_input($this->idfkestadocliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idfkestadocliente_label" id="hidden_field_label_idfkestadocliente" style="<?php echo $sStyleHidden_idfkestadocliente; ?>"><span id="id_label_idfkestadocliente"><?php echo $this->nm_new_label['idfkestadocliente']; ?></span></TD>
    <TD class="scFormDataOdd css_idfkestadocliente_line" id="hidden_field_data_idfkestadocliente" style="<?php echo $sStyleHidden_idfkestadocliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkestadocliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkestadocliente"]) &&  $this->nmgp_cmp_readonly["idfkestadocliente"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array(); 
    }

   $old_value_idcliente = $this->idcliente;
   $old_value_fonecliente = $this->fonecliente;
   $old_value_fone2cliente = $this->fone2cliente;
   $old_value_datanasc = $this->datanasc;
   $old_value_validadecnhcliente = $this->validadecnhcliente;
   $old_value_cpfcliente = $this->cpfcliente;
   $old_value_rgcliente = $this->rgcliente;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcliente = $this->idcliente;
   $unformatted_value_fonecliente = $this->fonecliente;
   $unformatted_value_fone2cliente = $this->fone2cliente;
   $unformatted_value_datanasc = $this->datanasc;
   $unformatted_value_validadecnhcliente = $this->validadecnhcliente;
   $unformatted_value_cpfcliente = $this->cpfcliente;
   $unformatted_value_rgcliente = $this->rgcliente;

   $nm_comando = "SELECT id, uf 
FROM tbestados 
ORDER BY uf";

   $this->idcliente = $old_value_idcliente;
   $this->fonecliente = $old_value_fonecliente;
   $this->fone2cliente = $old_value_fone2cliente;
   $this->datanasc = $old_value_datanasc;
   $this->validadecnhcliente = $old_value_validadecnhcliente;
   $this->cpfcliente = $old_value_cpfcliente;
   $this->rgcliente = $old_value_rgcliente;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'][] = $rs->fields[0];
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
   $idfkestadocliente_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkestadocliente_1))
          {
              foreach ($this->idfkestadocliente_1 as $tmp_idfkestadocliente)
              {
                  if (trim($tmp_idfkestadocliente) === trim($cadaselect[1])) { $idfkestadocliente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkestadocliente) === trim($cadaselect[1])) { $idfkestadocliente_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfkestadocliente" value="<?php echo $this->form_encode_input($idfkestadocliente) . "\">" . $idfkestadocliente_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'] = array(); 
    }

   $old_value_idcliente = $this->idcliente;
   $old_value_fonecliente = $this->fonecliente;
   $old_value_fone2cliente = $this->fone2cliente;
   $old_value_datanasc = $this->datanasc;
   $old_value_validadecnhcliente = $this->validadecnhcliente;
   $old_value_cpfcliente = $this->cpfcliente;
   $old_value_rgcliente = $this->rgcliente;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcliente = $this->idcliente;
   $unformatted_value_fonecliente = $this->fonecliente;
   $unformatted_value_fone2cliente = $this->fone2cliente;
   $unformatted_value_datanasc = $this->datanasc;
   $unformatted_value_validadecnhcliente = $this->validadecnhcliente;
   $unformatted_value_cpfcliente = $this->cpfcliente;
   $unformatted_value_rgcliente = $this->rgcliente;

   $nm_comando = "SELECT id, uf 
FROM tbestados 
ORDER BY uf";

   $this->idcliente = $old_value_idcliente;
   $this->fonecliente = $old_value_fonecliente;
   $this->fone2cliente = $old_value_fone2cliente;
   $this->datanasc = $old_value_datanasc;
   $this->validadecnhcliente = $old_value_validadecnhcliente;
   $this->cpfcliente = $old_value_cpfcliente;
   $this->rgcliente = $old_value_rgcliente;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkestadocliente'][] = $rs->fields[0];
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
   $idfkestadocliente_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkestadocliente_1))
          {
              foreach ($this->idfkestadocliente_1 as $tmp_idfkestadocliente)
              {
                  if (trim($tmp_idfkestadocliente) === trim($cadaselect[1])) { $idfkestadocliente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkestadocliente) === trim($cadaselect[1])) { $idfkestadocliente_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfkestadocliente_look))
          {
              $idfkestadocliente_look = $this->idfkestadocliente;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfkestadocliente\" class=\"css_idfkestadocliente_line\" style=\"" .  $sStyleReadLab_idfkestadocliente . "\">" . $this->form_encode_input($idfkestadocliente_look) . "</span><span id=\"id_read_off_idfkestadocliente\" style=\"" . $sStyleReadInp_idfkestadocliente . "\">";
   echo " <span id=\"idAjaxSelect_idfkestadocliente\"><select class=\"sc-js-input scFormObjectOdd css_idfkestadocliente_obj\" style=\"\" id=\"id_sc_field_idfkestadocliente\" name=\"idfkestadocliente\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfkestadocliente) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfkestadocliente)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkestadocliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkestadocliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idfkcidadecliente']))
   {
       $this->nm_new_label['idfkcidadecliente'] = "Cidade";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkcidadecliente = $this->idfkcidadecliente;
   $sStyleHidden_idfkcidadecliente = '';
   if (isset($this->nmgp_cmp_hidden['idfkcidadecliente']) && $this->nmgp_cmp_hidden['idfkcidadecliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkcidadecliente']);
       $sStyleHidden_idfkcidadecliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkcidadecliente = 'display: none;';
   $sStyleReadInp_idfkcidadecliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkcidadecliente']) && $this->nmgp_cmp_readonly['idfkcidadecliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkcidadecliente']);
       $sStyleReadLab_idfkcidadecliente = '';
       $sStyleReadInp_idfkcidadecliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkcidadecliente']) && $this->nmgp_cmp_hidden['idfkcidadecliente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfkcidadecliente" value="<?php echo $this->form_encode_input($this->idfkcidadecliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idfkcidadecliente_label" id="hidden_field_label_idfkcidadecliente" style="<?php echo $sStyleHidden_idfkcidadecliente; ?>"><span id="id_label_idfkcidadecliente"><?php echo $this->nm_new_label['idfkcidadecliente']; ?></span></TD>
    <TD class="scFormDataOdd css_idfkcidadecliente_line" id="hidden_field_data_idfkcidadecliente" style="<?php echo $sStyleHidden_idfkcidadecliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkcidadecliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkcidadecliente"]) &&  $this->nmgp_cmp_readonly["idfkcidadecliente"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array(); 
}
if ($this->idfkestadocliente != "")
{ 
   $this->nm_clear_val("idfkestadocliente");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array(); 
    }

   $old_value_idcliente = $this->idcliente;
   $old_value_fonecliente = $this->fonecliente;
   $old_value_fone2cliente = $this->fone2cliente;
   $old_value_datanasc = $this->datanasc;
   $old_value_validadecnhcliente = $this->validadecnhcliente;
   $old_value_cpfcliente = $this->cpfcliente;
   $old_value_rgcliente = $this->rgcliente;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcliente = $this->idcliente;
   $unformatted_value_fonecliente = $this->fonecliente;
   $unformatted_value_fone2cliente = $this->fone2cliente;
   $unformatted_value_datanasc = $this->datanasc;
   $unformatted_value_validadecnhcliente = $this->validadecnhcliente;
   $unformatted_value_cpfcliente = $this->cpfcliente;
   $unformatted_value_rgcliente = $this->rgcliente;

   $nm_comando = "SELECT id, nome 
FROM tbcidades 
WHERE estado = $this->idfkestadocliente
ORDER BY nome";

   $this->idcliente = $old_value_idcliente;
   $this->fonecliente = $old_value_fonecliente;
   $this->fone2cliente = $old_value_fone2cliente;
   $this->datanasc = $old_value_datanasc;
   $this->validadecnhcliente = $old_value_validadecnhcliente;
   $this->cpfcliente = $old_value_cpfcliente;
   $this->rgcliente = $old_value_rgcliente;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $idfkcidadecliente_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkcidadecliente_1))
          {
              foreach ($this->idfkcidadecliente_1 as $tmp_idfkcidadecliente)
              {
                  if (trim($tmp_idfkcidadecliente) === trim($cadaselect[1])) { $idfkcidadecliente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkcidadecliente) === trim($cadaselect[1])) { $idfkcidadecliente_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfkcidadecliente" value="<?php echo $this->form_encode_input($idfkcidadecliente) . "\">" . $idfkcidadecliente_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array(); 
}
if ($this->idfkestadocliente != "")
{ 
   $this->nm_clear_val("idfkestadocliente");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'] = array(); 
    }

   $old_value_idcliente = $this->idcliente;
   $old_value_fonecliente = $this->fonecliente;
   $old_value_fone2cliente = $this->fone2cliente;
   $old_value_datanasc = $this->datanasc;
   $old_value_validadecnhcliente = $this->validadecnhcliente;
   $old_value_cpfcliente = $this->cpfcliente;
   $old_value_rgcliente = $this->rgcliente;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcliente = $this->idcliente;
   $unformatted_value_fonecliente = $this->fonecliente;
   $unformatted_value_fone2cliente = $this->fone2cliente;
   $unformatted_value_datanasc = $this->datanasc;
   $unformatted_value_validadecnhcliente = $this->validadecnhcliente;
   $unformatted_value_cpfcliente = $this->cpfcliente;
   $unformatted_value_rgcliente = $this->rgcliente;

   $nm_comando = "SELECT id, nome 
FROM tbcidades 
WHERE estado = $this->idfkestadocliente
ORDER BY nome";

   $this->idcliente = $old_value_idcliente;
   $this->fonecliente = $old_value_fonecliente;
   $this->fone2cliente = $old_value_fone2cliente;
   $this->datanasc = $old_value_datanasc;
   $this->validadecnhcliente = $old_value_validadecnhcliente;
   $this->cpfcliente = $old_value_cpfcliente;
   $this->rgcliente = $old_value_rgcliente;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkcidadecliente'][] = $rs->fields[0];
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
} 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idfkcidadecliente_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkcidadecliente_1))
          {
              foreach ($this->idfkcidadecliente_1 as $tmp_idfkcidadecliente)
              {
                  if (trim($tmp_idfkcidadecliente) === trim($cadaselect[1])) { $idfkcidadecliente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkcidadecliente) === trim($cadaselect[1])) { $idfkcidadecliente_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfkcidadecliente_look))
          {
              $idfkcidadecliente_look = $this->idfkcidadecliente;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfkcidadecliente\" class=\"css_idfkcidadecliente_line\" style=\"" .  $sStyleReadLab_idfkcidadecliente . "\">" . $this->form_encode_input($idfkcidadecliente_look) . "</span><span id=\"id_read_off_idfkcidadecliente\" style=\"" . $sStyleReadInp_idfkcidadecliente . "\">";
   echo " <span id=\"idAjaxSelect_idfkcidadecliente\"><select class=\"sc-js-input scFormObjectOdd css_idfkcidadecliente_obj\" style=\"\" id=\"id_sc_field_idfkcidadecliente\" name=\"idfkcidadecliente\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfkcidadecliente) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfkcidadecliente)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkcidadecliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkcidadecliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fonecliente']))
    {
        $this->nm_new_label['fonecliente'] = "Fone 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fonecliente = $this->fonecliente;
   $sStyleHidden_fonecliente = '';
   if (isset($this->nmgp_cmp_hidden['fonecliente']) && $this->nmgp_cmp_hidden['fonecliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fonecliente']);
       $sStyleHidden_fonecliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fonecliente = 'display: none;';
   $sStyleReadInp_fonecliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fonecliente']) && $this->nmgp_cmp_readonly['fonecliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fonecliente']);
       $sStyleReadLab_fonecliente = '';
       $sStyleReadInp_fonecliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fonecliente']) && $this->nmgp_cmp_hidden['fonecliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fonecliente" value="<?php echo $this->form_encode_input($fonecliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fonecliente_label" id="hidden_field_label_fonecliente" style="<?php echo $sStyleHidden_fonecliente; ?>"><span id="id_label_fonecliente"><?php echo $this->nm_new_label['fonecliente']; ?></span></TD>
    <TD class="scFormDataOdd css_fonecliente_line" id="hidden_field_data_fonecliente" style="<?php echo $sStyleHidden_fonecliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fonecliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fonecliente"]) &&  $this->nmgp_cmp_readonly["fonecliente"] == "on") { 

 ?>
<input type="hidden" name="fonecliente" value="<?php echo $this->form_encode_input($fonecliente) . "\">" . $fonecliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_fonecliente" class="sc-ui-readonly-fonecliente css_fonecliente_line" style="<?php echo $sStyleReadLab_fonecliente; ?>"><?php echo $this->form_encode_input($this->fonecliente); ?></span><span id="id_read_off_fonecliente" style="white-space: nowrap;<?php echo $sStyleReadInp_fonecliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_fonecliente_obj" style="" id="id_sc_field_fonecliente" type=text name="fonecliente" value="<?php echo $this->form_encode_input($fonecliente) ?>"
 size=20 alt="{datatype: 'mask', maskList: '(99) 9-9999-9999;(99) 9999-9999;', alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fonecliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fonecliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fone2cliente']))
    {
        $this->nm_new_label['fone2cliente'] = "Fone 2 ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fone2cliente = $this->fone2cliente;
   $sStyleHidden_fone2cliente = '';
   if (isset($this->nmgp_cmp_hidden['fone2cliente']) && $this->nmgp_cmp_hidden['fone2cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fone2cliente']);
       $sStyleHidden_fone2cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fone2cliente = 'display: none;';
   $sStyleReadInp_fone2cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fone2cliente']) && $this->nmgp_cmp_readonly['fone2cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fone2cliente']);
       $sStyleReadLab_fone2cliente = '';
       $sStyleReadInp_fone2cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fone2cliente']) && $this->nmgp_cmp_hidden['fone2cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fone2cliente" value="<?php echo $this->form_encode_input($fone2cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fone2cliente_label" id="hidden_field_label_fone2cliente" style="<?php echo $sStyleHidden_fone2cliente; ?>"><span id="id_label_fone2cliente"><?php echo $this->nm_new_label['fone2cliente']; ?></span></TD>
    <TD class="scFormDataOdd css_fone2cliente_line" id="hidden_field_data_fone2cliente" style="<?php echo $sStyleHidden_fone2cliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fone2cliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fone2cliente"]) &&  $this->nmgp_cmp_readonly["fone2cliente"] == "on") { 

 ?>
<input type="hidden" name="fone2cliente" value="<?php echo $this->form_encode_input($fone2cliente) . "\">" . $fone2cliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_fone2cliente" class="sc-ui-readonly-fone2cliente css_fone2cliente_line" style="<?php echo $sStyleReadLab_fone2cliente; ?>"><?php echo $this->form_encode_input($this->fone2cliente); ?></span><span id="id_read_off_fone2cliente" style="white-space: nowrap;<?php echo $sStyleReadInp_fone2cliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_fone2cliente_obj" style="" id="id_sc_field_fone2cliente" type=text name="fone2cliente" value="<?php echo $this->form_encode_input($fone2cliente) ?>"
 size=20 alt="{datatype: 'mask', maskList: '(99) 9-9999-9999;(99) 9999-9999;', alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fone2cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fone2cliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['datanasc']))
    {
        $this->nm_new_label['datanasc'] = "Data de Nascimento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $datanasc = $this->datanasc;
   $sStyleHidden_datanasc = '';
   if (isset($this->nmgp_cmp_hidden['datanasc']) && $this->nmgp_cmp_hidden['datanasc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datanasc']);
       $sStyleHidden_datanasc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datanasc = 'display: none;';
   $sStyleReadInp_datanasc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datanasc']) && $this->nmgp_cmp_readonly['datanasc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datanasc']);
       $sStyleReadLab_datanasc = '';
       $sStyleReadInp_datanasc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datanasc']) && $this->nmgp_cmp_hidden['datanasc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datanasc" value="<?php echo $this->form_encode_input($datanasc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_datanasc_label" id="hidden_field_label_datanasc" style="<?php echo $sStyleHidden_datanasc; ?>"><span id="id_label_datanasc"><?php echo $this->nm_new_label['datanasc']; ?></span></TD>
    <TD class="scFormDataOdd css_datanasc_line" id="hidden_field_data_datanasc" style="<?php echo $sStyleHidden_datanasc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datanasc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datanasc"]) &&  $this->nmgp_cmp_readonly["datanasc"] == "on") { 

 ?>
<input type="hidden" name="datanasc" value="<?php echo $this->form_encode_input($datanasc) . "\">" . $datanasc . ""; ?>
<?php } else { ?>
<span id="id_read_on_datanasc" class="sc-ui-readonly-datanasc css_datanasc_line" style="<?php echo $sStyleReadLab_datanasc; ?>"><?php echo $this->form_encode_input($datanasc); ?></span><span id="id_read_off_datanasc" style="white-space: nowrap;<?php echo $sStyleReadInp_datanasc; ?>">
 <input class="sc-js-input scFormObjectOdd css_datanasc_obj" style="" id="id_sc_field_datanasc" type=text name="datanasc" value="<?php echo $this->form_encode_input($datanasc) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['datanasc']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datanasc']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['datanasc']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datanasc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datanasc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['redesocial']))
    {
        $this->nm_new_label['redesocial'] = "Rede Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $redesocial = $this->redesocial;
   $sStyleHidden_redesocial = '';
   if (isset($this->nmgp_cmp_hidden['redesocial']) && $this->nmgp_cmp_hidden['redesocial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['redesocial']);
       $sStyleHidden_redesocial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_redesocial = 'display: none;';
   $sStyleReadInp_redesocial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['redesocial']) && $this->nmgp_cmp_readonly['redesocial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['redesocial']);
       $sStyleReadLab_redesocial = '';
       $sStyleReadInp_redesocial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['redesocial']) && $this->nmgp_cmp_hidden['redesocial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="redesocial" value="<?php echo $this->form_encode_input($redesocial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_redesocial_label" id="hidden_field_label_redesocial" style="<?php echo $sStyleHidden_redesocial; ?>"><span id="id_label_redesocial"><?php echo $this->nm_new_label['redesocial']; ?></span></TD>
    <TD class="scFormDataOdd css_redesocial_line" id="hidden_field_data_redesocial" style="<?php echo $sStyleHidden_redesocial; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_redesocial_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["redesocial"]) &&  $this->nmgp_cmp_readonly["redesocial"] == "on") { 

 ?>
<input type="hidden" name="redesocial" value="<?php echo $this->form_encode_input($redesocial) . "\">" . $redesocial . ""; ?>
<?php } else { ?>
<span id="id_read_on_redesocial" class="sc-ui-readonly-redesocial css_redesocial_line" style="<?php echo $sStyleReadLab_redesocial; ?>"><?php echo $this->form_encode_input($this->redesocial); ?></span><span id="id_read_off_redesocial" style="white-space: nowrap;<?php echo $sStyleReadInp_redesocial; ?>">
 <input class="sc-js-input scFormObjectOdd css_redesocial_obj" style="" id="id_sc_field_redesocial" type=text name="redesocial" value="<?php echo $this->form_encode_input($redesocial) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_redesocial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_redesocial_text"></span></td></tr></table></td></tr></table></TD>
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
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Documentação<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numcnhcliente']))
    {
        $this->nm_new_label['numcnhcliente'] = "Número CNH";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numcnhcliente = $this->numcnhcliente;
   $sStyleHidden_numcnhcliente = '';
   if (isset($this->nmgp_cmp_hidden['numcnhcliente']) && $this->nmgp_cmp_hidden['numcnhcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numcnhcliente']);
       $sStyleHidden_numcnhcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numcnhcliente = 'display: none;';
   $sStyleReadInp_numcnhcliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numcnhcliente']) && $this->nmgp_cmp_readonly['numcnhcliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numcnhcliente']);
       $sStyleReadLab_numcnhcliente = '';
       $sStyleReadInp_numcnhcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numcnhcliente']) && $this->nmgp_cmp_hidden['numcnhcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcnhcliente" value="<?php echo $this->form_encode_input($numcnhcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numcnhcliente_label" id="hidden_field_label_numcnhcliente" style="<?php echo $sStyleHidden_numcnhcliente; ?>"><span id="id_label_numcnhcliente"><?php echo $this->nm_new_label['numcnhcliente']; ?></span></TD>
    <TD class="scFormDataOdd css_numcnhcliente_line" id="hidden_field_data_numcnhcliente" style="<?php echo $sStyleHidden_numcnhcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numcnhcliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numcnhcliente"]) &&  $this->nmgp_cmp_readonly["numcnhcliente"] == "on") { 

 ?>
<input type="hidden" name="numcnhcliente" value="<?php echo $this->form_encode_input($numcnhcliente) . "\">" . $numcnhcliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_numcnhcliente" class="sc-ui-readonly-numcnhcliente css_numcnhcliente_line" style="<?php echo $sStyleReadLab_numcnhcliente; ?>"><?php echo $this->form_encode_input($this->numcnhcliente); ?></span><span id="id_read_off_numcnhcliente" style="white-space: nowrap;<?php echo $sStyleReadInp_numcnhcliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_numcnhcliente_obj" style="" id="id_sc_field_numcnhcliente" type=text name="numcnhcliente" value="<?php echo $this->form_encode_input($numcnhcliente) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcnhcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcnhcliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['validadecnhcliente']))
    {
        $this->nm_new_label['validadecnhcliente'] = "Validade CNH";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $validadecnhcliente = $this->validadecnhcliente;
   $sStyleHidden_validadecnhcliente = '';
   if (isset($this->nmgp_cmp_hidden['validadecnhcliente']) && $this->nmgp_cmp_hidden['validadecnhcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['validadecnhcliente']);
       $sStyleHidden_validadecnhcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_validadecnhcliente = 'display: none;';
   $sStyleReadInp_validadecnhcliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['validadecnhcliente']) && $this->nmgp_cmp_readonly['validadecnhcliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['validadecnhcliente']);
       $sStyleReadLab_validadecnhcliente = '';
       $sStyleReadInp_validadecnhcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['validadecnhcliente']) && $this->nmgp_cmp_hidden['validadecnhcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="validadecnhcliente" value="<?php echo $this->form_encode_input($validadecnhcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_validadecnhcliente_label" id="hidden_field_label_validadecnhcliente" style="<?php echo $sStyleHidden_validadecnhcliente; ?>"><span id="id_label_validadecnhcliente"><?php echo $this->nm_new_label['validadecnhcliente']; ?></span></TD>
    <TD class="scFormDataOdd css_validadecnhcliente_line" id="hidden_field_data_validadecnhcliente" style="<?php echo $sStyleHidden_validadecnhcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_validadecnhcliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["validadecnhcliente"]) &&  $this->nmgp_cmp_readonly["validadecnhcliente"] == "on") { 

 ?>
<input type="hidden" name="validadecnhcliente" value="<?php echo $this->form_encode_input($validadecnhcliente) . "\">" . $validadecnhcliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_validadecnhcliente" class="sc-ui-readonly-validadecnhcliente css_validadecnhcliente_line" style="<?php echo $sStyleReadLab_validadecnhcliente; ?>"><?php echo $this->form_encode_input($validadecnhcliente); ?></span><span id="id_read_off_validadecnhcliente" style="white-space: nowrap;<?php echo $sStyleReadInp_validadecnhcliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_validadecnhcliente_obj" style="" id="id_sc_field_validadecnhcliente" type=text name="validadecnhcliente" value="<?php echo $this->form_encode_input($validadecnhcliente) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['validadecnhcliente']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['validadecnhcliente']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['validadecnhcliente']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_validadecnhcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_validadecnhcliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cpfcliente']))
    {
        $this->nm_new_label['cpfcliente'] = "CPF/CNPJ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cpfcliente = $this->cpfcliente;
   $sStyleHidden_cpfcliente = '';
   if (isset($this->nmgp_cmp_hidden['cpfcliente']) && $this->nmgp_cmp_hidden['cpfcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cpfcliente']);
       $sStyleHidden_cpfcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cpfcliente = 'display: none;';
   $sStyleReadInp_cpfcliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cpfcliente']) && $this->nmgp_cmp_readonly['cpfcliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cpfcliente']);
       $sStyleReadLab_cpfcliente = '';
       $sStyleReadInp_cpfcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cpfcliente']) && $this->nmgp_cmp_hidden['cpfcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cpfcliente" value="<?php echo $this->form_encode_input($cpfcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cpfcliente_label" id="hidden_field_label_cpfcliente" style="<?php echo $sStyleHidden_cpfcliente; ?>"><span id="id_label_cpfcliente"><?php echo $this->nm_new_label['cpfcliente']; ?></span></TD>
    <TD class="scFormDataOdd css_cpfcliente_line" id="hidden_field_data_cpfcliente" style="<?php echo $sStyleHidden_cpfcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cpfcliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cpfcliente"]) &&  $this->nmgp_cmp_readonly["cpfcliente"] == "on") { 

 ?>
<input type="hidden" name="cpfcliente" value="<?php echo $this->form_encode_input($cpfcliente) . "\">" . $cpfcliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_cpfcliente" class="sc-ui-readonly-cpfcliente css_cpfcliente_line" style="<?php echo $sStyleReadLab_cpfcliente; ?>"><?php echo $this->form_encode_input($this->cpfcliente); ?></span><span id="id_read_off_cpfcliente" style="white-space: nowrap;<?php echo $sStyleReadInp_cpfcliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_cpfcliente_obj" style="" id="id_sc_field_cpfcliente" type=text name="cpfcliente" value="<?php echo $this->form_encode_input($cpfcliente) ?>"
 size=16 alt="{datatype: 'mask', maskList: '999.999.999-99;99.999.999/9999-99', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cpfcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cpfcliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rgcliente']))
    {
        $this->nm_new_label['rgcliente'] = "RG";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rgcliente = $this->rgcliente;
   $sStyleHidden_rgcliente = '';
   if (isset($this->nmgp_cmp_hidden['rgcliente']) && $this->nmgp_cmp_hidden['rgcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rgcliente']);
       $sStyleHidden_rgcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rgcliente = 'display: none;';
   $sStyleReadInp_rgcliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rgcliente']) && $this->nmgp_cmp_readonly['rgcliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rgcliente']);
       $sStyleReadLab_rgcliente = '';
       $sStyleReadInp_rgcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rgcliente']) && $this->nmgp_cmp_hidden['rgcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rgcliente" value="<?php echo $this->form_encode_input($rgcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rgcliente_label" id="hidden_field_label_rgcliente" style="<?php echo $sStyleHidden_rgcliente; ?>"><span id="id_label_rgcliente"><?php echo $this->nm_new_label['rgcliente']; ?></span></TD>
    <TD class="scFormDataOdd css_rgcliente_line" id="hidden_field_data_rgcliente" style="<?php echo $sStyleHidden_rgcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rgcliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rgcliente"]) &&  $this->nmgp_cmp_readonly["rgcliente"] == "on") { 

 ?>
<input type="hidden" name="rgcliente" value="<?php echo $this->form_encode_input($rgcliente) . "\">" . $rgcliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_rgcliente" class="sc-ui-readonly-rgcliente css_rgcliente_line" style="<?php echo $sStyleReadLab_rgcliente; ?>"><?php echo $this->form_encode_input($this->rgcliente); ?></span><span id="id_read_off_rgcliente" style="white-space: nowrap;<?php echo $sStyleReadInp_rgcliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_rgcliente_obj" style="" id="id_sc_field_rgcliente" type=text name="rgcliente" value="<?php echo $this->form_encode_input($rgcliente) ?>"
 size=20 alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rgcliente']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rgcliente']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rgcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rgcliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['expedrg']))
   {
       $this->nm_new_label['expedrg'] = "Orgão Expedidor RG";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $expedrg = $this->expedrg;
   $sStyleHidden_expedrg = '';
   if (isset($this->nmgp_cmp_hidden['expedrg']) && $this->nmgp_cmp_hidden['expedrg'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['expedrg']);
       $sStyleHidden_expedrg = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_expedrg = 'display: none;';
   $sStyleReadInp_expedrg = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['expedrg']) && $this->nmgp_cmp_readonly['expedrg'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['expedrg']);
       $sStyleReadLab_expedrg = '';
       $sStyleReadInp_expedrg = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['expedrg']) && $this->nmgp_cmp_hidden['expedrg'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="expedrg" value="<?php echo $this->form_encode_input($this->expedrg) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_expedrg_label" id="hidden_field_label_expedrg" style="<?php echo $sStyleHidden_expedrg; ?>"><span id="id_label_expedrg"><?php echo $this->nm_new_label['expedrg']; ?></span></TD>
    <TD class="scFormDataOdd css_expedrg_line" id="hidden_field_data_expedrg" style="<?php echo $sStyleHidden_expedrg; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_expedrg_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["expedrg"]) &&  $this->nmgp_cmp_readonly["expedrg"] == "on") { 

$expedrg_look = "";
 if ($this->expedrg == "SDS") { $expedrg_look .= "SDS" ;} 
 if ($this->expedrg == "SSP") { $expedrg_look .= "SSP" ;} 
 if ($this->expedrg == "OUTROS") { $expedrg_look .= "OUTROS" ;} 
 if (empty($expedrg_look)) { $expedrg_look = $this->expedrg; }
?>
<input type="hidden" name="expedrg" value="<?php echo $this->form_encode_input($expedrg) . "\">" . $expedrg_look . ""; ?>
<?php } else { ?>
<?php

$expedrg_look = "";
 if ($this->expedrg == "SDS") { $expedrg_look .= "SDS" ;} 
 if ($this->expedrg == "SSP") { $expedrg_look .= "SSP" ;} 
 if ($this->expedrg == "OUTROS") { $expedrg_look .= "OUTROS" ;} 
 if (empty($expedrg_look)) { $expedrg_look = $this->expedrg; }
?>
<span id="id_read_on_expedrg" class="css_expedrg_line"  style="<?php echo $sStyleReadLab_expedrg; ?>"><?php echo $this->form_encode_input($expedrg_look); ?></span><span id="id_read_off_expedrg" style="<?php echo $sStyleReadInp_expedrg; ?>">
 <span id="idAjaxSelect_expedrg"><select class="sc-js-input scFormObjectOdd css_expedrg_obj" style="" id="id_sc_field_expedrg" name="expedrg" size="1" alt="{type: 'select', enterTab: false}">
 <option value="SDS" <?php  if ($this->expedrg == "SDS") { echo " selected" ;} ?><?php  if (empty($this->expedrg)) { echo " selected" ;} ?>>SDS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_expedrg'][] = 'SDS'; ?>
 <option value="SSP" <?php  if ($this->expedrg == "SSP") { echo " selected" ;} ?>>SSP</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_expedrg'][] = 'SSP'; ?>
 <option value="OUTROS" <?php  if ($this->expedrg == "OUTROS") { echo " selected" ;} ?>>OUTROS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_expedrg'][] = 'OUTROS'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_expedrg_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_expedrg_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idfkufexpedrg']))
   {
       $this->nm_new_label['idfkufexpedrg'] = "UF Expedidor RG";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkufexpedrg = $this->idfkufexpedrg;
   $sStyleHidden_idfkufexpedrg = '';
   if (isset($this->nmgp_cmp_hidden['idfkufexpedrg']) && $this->nmgp_cmp_hidden['idfkufexpedrg'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkufexpedrg']);
       $sStyleHidden_idfkufexpedrg = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkufexpedrg = 'display: none;';
   $sStyleReadInp_idfkufexpedrg = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkufexpedrg']) && $this->nmgp_cmp_readonly['idfkufexpedrg'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkufexpedrg']);
       $sStyleReadLab_idfkufexpedrg = '';
       $sStyleReadInp_idfkufexpedrg = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkufexpedrg']) && $this->nmgp_cmp_hidden['idfkufexpedrg'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfkufexpedrg" value="<?php echo $this->form_encode_input($this->idfkufexpedrg) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idfkufexpedrg_label" id="hidden_field_label_idfkufexpedrg" style="<?php echo $sStyleHidden_idfkufexpedrg; ?>"><span id="id_label_idfkufexpedrg"><?php echo $this->nm_new_label['idfkufexpedrg']; ?></span></TD>
    <TD class="scFormDataOdd css_idfkufexpedrg_line" id="hidden_field_data_idfkufexpedrg" style="<?php echo $sStyleHidden_idfkufexpedrg; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkufexpedrg_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkufexpedrg"]) &&  $this->nmgp_cmp_readonly["idfkufexpedrg"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array(); 
    }

   $old_value_idcliente = $this->idcliente;
   $old_value_fonecliente = $this->fonecliente;
   $old_value_fone2cliente = $this->fone2cliente;
   $old_value_datanasc = $this->datanasc;
   $old_value_validadecnhcliente = $this->validadecnhcliente;
   $old_value_cpfcliente = $this->cpfcliente;
   $old_value_rgcliente = $this->rgcliente;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcliente = $this->idcliente;
   $unformatted_value_fonecliente = $this->fonecliente;
   $unformatted_value_fone2cliente = $this->fone2cliente;
   $unformatted_value_datanasc = $this->datanasc;
   $unformatted_value_validadecnhcliente = $this->validadecnhcliente;
   $unformatted_value_cpfcliente = $this->cpfcliente;
   $unformatted_value_rgcliente = $this->rgcliente;

   $nm_comando = "SELECT id, uf 
FROM tbestados 
ORDER BY uf";

   $this->idcliente = $old_value_idcliente;
   $this->fonecliente = $old_value_fonecliente;
   $this->fone2cliente = $old_value_fone2cliente;
   $this->datanasc = $old_value_datanasc;
   $this->validadecnhcliente = $old_value_validadecnhcliente;
   $this->cpfcliente = $old_value_cpfcliente;
   $this->rgcliente = $old_value_rgcliente;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'][] = $rs->fields[0];
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
   $idfkufexpedrg_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkufexpedrg_1))
          {
              foreach ($this->idfkufexpedrg_1 as $tmp_idfkufexpedrg)
              {
                  if (trim($tmp_idfkufexpedrg) === trim($cadaselect[1])) { $idfkufexpedrg_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkufexpedrg) === trim($cadaselect[1])) { $idfkufexpedrg_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfkufexpedrg" value="<?php echo $this->form_encode_input($idfkufexpedrg) . "\">" . $idfkufexpedrg_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'] = array(); 
    }

   $old_value_idcliente = $this->idcliente;
   $old_value_fonecliente = $this->fonecliente;
   $old_value_fone2cliente = $this->fone2cliente;
   $old_value_datanasc = $this->datanasc;
   $old_value_validadecnhcliente = $this->validadecnhcliente;
   $old_value_cpfcliente = $this->cpfcliente;
   $old_value_rgcliente = $this->rgcliente;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idcliente = $this->idcliente;
   $unformatted_value_fonecliente = $this->fonecliente;
   $unformatted_value_fone2cliente = $this->fone2cliente;
   $unformatted_value_datanasc = $this->datanasc;
   $unformatted_value_validadecnhcliente = $this->validadecnhcliente;
   $unformatted_value_cpfcliente = $this->cpfcliente;
   $unformatted_value_rgcliente = $this->rgcliente;

   $nm_comando = "SELECT id, uf 
FROM tbestados 
ORDER BY uf";

   $this->idcliente = $old_value_idcliente;
   $this->fonecliente = $old_value_fonecliente;
   $this->fone2cliente = $old_value_fone2cliente;
   $this->datanasc = $old_value_datanasc;
   $this->validadecnhcliente = $old_value_validadecnhcliente;
   $this->cpfcliente = $old_value_cpfcliente;
   $this->rgcliente = $old_value_rgcliente;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['Lookup_idfkufexpedrg'][] = $rs->fields[0];
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
   $idfkufexpedrg_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkufexpedrg_1))
          {
              foreach ($this->idfkufexpedrg_1 as $tmp_idfkufexpedrg)
              {
                  if (trim($tmp_idfkufexpedrg) === trim($cadaselect[1])) { $idfkufexpedrg_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkufexpedrg) === trim($cadaselect[1])) { $idfkufexpedrg_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfkufexpedrg_look))
          {
              $idfkufexpedrg_look = $this->idfkufexpedrg;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfkufexpedrg\" class=\"css_idfkufexpedrg_line\" style=\"" .  $sStyleReadLab_idfkufexpedrg . "\">" . $this->form_encode_input($idfkufexpedrg_look) . "</span><span id=\"id_read_off_idfkufexpedrg\" style=\"" . $sStyleReadInp_idfkufexpedrg . "\">";
   echo " <span id=\"idAjaxSelect_idfkufexpedrg\"><select class=\"sc-js-input scFormObjectOdd css_idfkufexpedrg_obj\" style=\"\" id=\"id_sc_field_idfkufexpedrg\" name=\"idfkufexpedrg\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfkufexpedrg) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfkufexpedrg)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkufexpedrg_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkufexpedrg_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['imgcnh']))
    {
        $this->nm_new_label['imgcnh'] = "Foto -  CNH";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $imgcnh = $this->imgcnh;
   $sStyleHidden_imgcnh = '';
   if (isset($this->nmgp_cmp_hidden['imgcnh']) && $this->nmgp_cmp_hidden['imgcnh'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['imgcnh']);
       $sStyleHidden_imgcnh = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_imgcnh = 'display: none;';
   $sStyleReadInp_imgcnh = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['imgcnh']) && $this->nmgp_cmp_readonly['imgcnh'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['imgcnh']);
       $sStyleReadLab_imgcnh = '';
       $sStyleReadInp_imgcnh = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['imgcnh']) && $this->nmgp_cmp_hidden['imgcnh'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imgcnh" value="<?php echo $this->form_encode_input($imgcnh) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_imgcnh_label" id="hidden_field_label_imgcnh" style="<?php echo $sStyleHidden_imgcnh; ?>"><span id="id_label_imgcnh"><?php echo $this->nm_new_label['imgcnh']; ?></span></TD>
    <TD class="scFormDataOdd css_imgcnh_line" id="hidden_field_data_imgcnh" style="<?php echo $sStyleHidden_imgcnh; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_imgcnh_line" style="vertical-align: top;padding: 0px">
 <script>var var_ajax_img_imgcnh = '<?php echo $out_imgcnh; ?>';</script><input type="hidden" name="temp_out_imgcnh" value="<?php echo $this->form_encode_input($out_imgcnh); ?>" /><?php if (!empty($out_imgcnh)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_imgcnh, '" . $this->nmgp_return_img['imgcnh'][0] . "', '" . $this->nmgp_return_img['imgcnh'][1] . "')\"><img id=\"id_ajax_img_imgcnh\" border=\"0\" src=\"$out_imgcnh\"></a>"; } else {  echo "<img id=\"id_ajax_img_imgcnh\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imgcnh"]) &&  $this->nmgp_cmp_readonly["imgcnh"] == "on") { 

 ?>
<img id=\"imgcnh_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="imgcnh" value="<?php echo $this->form_encode_input($imgcnh) . "\">" . $imgcnh . ""; ?>
<?php } else { ?>
<span id="id_read_off_imgcnh" style="white-space: nowrap;<?php echo $sStyleReadInp_imgcnh; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-imgcnh" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_imgcnh_obj" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="imgcnh[]" id="id_sc_field_imgcnh" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<span id="chk_ajax_img_imgcnh"<?php if ($this->nmgp_opcao == "novo" || empty($imgcnh)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="imgcnh_limpa" value="<?php echo $imgcnh_limpa . '" '; if ($imgcnh_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="imgcnh_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_imgcnh" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_imgcnh" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_imgcnh" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imgcnh_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imgcnh_text"></span></td></tr></table></td></tr></table></TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage('', "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", false, 0, false, "Ok", 0, 0, 0, 0, "", "", "", true, false);
</script> 
<?php
      }
?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['masterValue']);
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
 parent.scAjaxDetailStatus("form_tbclientes");
 parent.scAjaxDetailHeight("form_tbclientes", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_tbclientes", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbclientes", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbclientes']['sc_modal'])
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
