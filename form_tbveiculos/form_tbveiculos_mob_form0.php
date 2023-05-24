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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Cadastro de Veículos"); } else { echo strip_tags("Cadastro de Veículos"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbveiculos/form_tbveiculos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbveiculos_mob_sajax_js.php");
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
<?php

include_once('form_tbveiculos_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
  $(".scBtnGrpClick").find("a").click(function(e){
     e.preventDefault();
  });
  $(".scBtnGrpClick").click(function(){
     var aObj = $(this).find("a"), aHref = aObj.attr("href");
     if ("javascript:" == aHref.substr(0, 11)) {
        eval(aHref.substr(11));
     }
     else {
        aObj.trigger("click");
     }
   }).mouseover(function(){
     $(this).css("cursor", "pointer");
  });
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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
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
 include_once("form_tbveiculos_mob_js0.php");
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
               action="form_tbveiculos_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tbveiculos_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbveiculos_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Cadastro de Veículos"; } else { echo "Cadastro de Veículos"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" id="sc_btgp_div_group_2_t">
 <tr><td class="scBtnGrpBackground">
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "nm_move ('clone');", "nm_move ('clone');", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
?>
 </td></tr>
</table>
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idveiculo']))
           {
               $this->nmgp_cmp_readonly['idveiculo'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Características<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idveiculo']))
    {
        $this->nm_new_label['idveiculo'] = "Código";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idveiculo = $this->idveiculo;
   $sStyleHidden_idveiculo = '';
   if (isset($this->nmgp_cmp_hidden['idveiculo']) && $this->nmgp_cmp_hidden['idveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idveiculo']);
       $sStyleHidden_idveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idveiculo = 'display: none;';
   $sStyleReadInp_idveiculo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idveiculo"]) &&  $this->nmgp_cmp_readonly["idveiculo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idveiculo']);
       $sStyleReadLab_idveiculo = '';
       $sStyleReadInp_idveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idveiculo']) && $this->nmgp_cmp_hidden['idveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idveiculo" value="<?php echo $this->form_encode_input($idveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_idveiculo_line" id="hidden_field_data_idveiculo" style="<?php echo $sStyleHidden_idveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idveiculo_label"><span id="id_label_idveiculo"><?php echo $this->nm_new_label['idveiculo']; ?></span></span><br><span id="id_read_on_idveiculo" class="css_idveiculo_line" style="<?php echo $sStyleReadLab_idveiculo; ?>"><?php echo $this->form_encode_input($this->idveiculo); ?></span><span id="id_read_off_idveiculo" style="<?php echo $sStyleReadInp_idveiculo; ?>"><input type="hidden" name="idveiculo" value="<?php echo $this->form_encode_input($idveiculo) . "\">"?><span id="id_ajax_label_idveiculo"><?php echo nl2br($idveiculo); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idfkmarcaveiculo']))
   {
       $this->nm_new_label['idfkmarcaveiculo'] = "Marca";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkmarcaveiculo = $this->idfkmarcaveiculo;
   $sStyleHidden_idfkmarcaveiculo = '';
   if (isset($this->nmgp_cmp_hidden['idfkmarcaveiculo']) && $this->nmgp_cmp_hidden['idfkmarcaveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkmarcaveiculo']);
       $sStyleHidden_idfkmarcaveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkmarcaveiculo = 'display: none;';
   $sStyleReadInp_idfkmarcaveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkmarcaveiculo']) && $this->nmgp_cmp_readonly['idfkmarcaveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkmarcaveiculo']);
       $sStyleReadLab_idfkmarcaveiculo = '';
       $sStyleReadInp_idfkmarcaveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkmarcaveiculo']) && $this->nmgp_cmp_hidden['idfkmarcaveiculo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfkmarcaveiculo" value="<?php echo $this->form_encode_input($this->idfkmarcaveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idfkmarcaveiculo_line" id="hidden_field_data_idfkmarcaveiculo" style="<?php echo $sStyleHidden_idfkmarcaveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkmarcaveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfkmarcaveiculo_label"><span id="id_label_idfkmarcaveiculo"><?php echo $this->nm_new_label['idfkmarcaveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkmarcaveiculo"]) &&  $this->nmgp_cmp_readonly["idfkmarcaveiculo"] == "on") { 
 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'] = array(); 
    }

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
   $x = 0; 
   $idfkmarcaveiculo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkmarcaveiculo_1))
          {
              foreach ($this->idfkmarcaveiculo_1 as $tmp_idfkmarcaveiculo)
              {
                  if (trim($tmp_idfkmarcaveiculo) === trim($cadaselect[1])) { $idfkmarcaveiculo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkmarcaveiculo) === trim($cadaselect[1])) { $idfkmarcaveiculo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfkmarcaveiculo" value="<?php echo $this->form_encode_input($idfkmarcaveiculo) . "\">" . $idfkmarcaveiculo_look . ""; ?>
<?php } else { ?>
 
<?php  
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_idfkmarcaveiculo'] = array(); 
    }

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
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idfkmarcaveiculo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfkmarcaveiculo_1))
          {
              foreach ($this->idfkmarcaveiculo_1 as $tmp_idfkmarcaveiculo)
              {
                  if (trim($tmp_idfkmarcaveiculo) === trim($cadaselect[1])) { $idfkmarcaveiculo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfkmarcaveiculo) === trim($cadaselect[1])) { $idfkmarcaveiculo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfkmarcaveiculo_look))
          {
              $idfkmarcaveiculo_look = $this->idfkmarcaveiculo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfkmarcaveiculo\" class=\"css_idfkmarcaveiculo_line\" style=\"" .  $sStyleReadLab_idfkmarcaveiculo . "\">" . $this->form_encode_input($idfkmarcaveiculo_look) . "</span><span id=\"id_read_off_idfkmarcaveiculo\" style=\"" . $sStyleReadInp_idfkmarcaveiculo . "\">";
   echo " <span id=\"idAjaxSelect_idfkmarcaveiculo\"><select class=\"sc-js-input scFormObjectOdd css_idfkmarcaveiculo_obj\" style=\"\" id=\"id_sc_field_idfkmarcaveiculo\" name=\"idfkmarcaveiculo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfkmarcaveiculo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfkmarcaveiculo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkmarcaveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkmarcaveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['modeloveiculo']))
    {
        $this->nm_new_label['modeloveiculo'] = "Modelo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modeloveiculo = $this->modeloveiculo;
   $sStyleHidden_modeloveiculo = '';
   if (isset($this->nmgp_cmp_hidden['modeloveiculo']) && $this->nmgp_cmp_hidden['modeloveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modeloveiculo']);
       $sStyleHidden_modeloveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modeloveiculo = 'display: none;';
   $sStyleReadInp_modeloveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modeloveiculo']) && $this->nmgp_cmp_readonly['modeloveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modeloveiculo']);
       $sStyleReadLab_modeloveiculo = '';
       $sStyleReadInp_modeloveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modeloveiculo']) && $this->nmgp_cmp_hidden['modeloveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="modeloveiculo" value="<?php echo $this->form_encode_input($modeloveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_modeloveiculo_line" id="hidden_field_data_modeloveiculo" style="<?php echo $sStyleHidden_modeloveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modeloveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_modeloveiculo_label"><span id="id_label_modeloveiculo"><?php echo $this->nm_new_label['modeloveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modeloveiculo"]) &&  $this->nmgp_cmp_readonly["modeloveiculo"] == "on") { 

 ?>
<input type="hidden" name="modeloveiculo" value="<?php echo $this->form_encode_input($modeloveiculo) . "\">" . $modeloveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_modeloveiculo" class="sc-ui-readonly-modeloveiculo css_modeloveiculo_line" style="<?php echo $sStyleReadLab_modeloveiculo; ?>"><?php echo $this->form_encode_input($this->modeloveiculo); ?></span><span id="id_read_off_modeloveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_modeloveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_modeloveiculo_obj" style="" id="id_sc_field_modeloveiculo" type=text name="modeloveiculo" value="<?php echo $this->form_encode_input($modeloveiculo) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modeloveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modeloveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anoveiculo']))
    {
        $this->nm_new_label['anoveiculo'] = "Ano";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anoveiculo = $this->anoveiculo;
   $sStyleHidden_anoveiculo = '';
   if (isset($this->nmgp_cmp_hidden['anoveiculo']) && $this->nmgp_cmp_hidden['anoveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anoveiculo']);
       $sStyleHidden_anoveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anoveiculo = 'display: none;';
   $sStyleReadInp_anoveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anoveiculo']) && $this->nmgp_cmp_readonly['anoveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anoveiculo']);
       $sStyleReadLab_anoveiculo = '';
       $sStyleReadInp_anoveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anoveiculo']) && $this->nmgp_cmp_hidden['anoveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anoveiculo" value="<?php echo $this->form_encode_input($anoveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anoveiculo_line" id="hidden_field_data_anoveiculo" style="<?php echo $sStyleHidden_anoveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anoveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anoveiculo_label"><span id="id_label_anoveiculo"><?php echo $this->nm_new_label['anoveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anoveiculo"]) &&  $this->nmgp_cmp_readonly["anoveiculo"] == "on") { 

 ?>
<input type="hidden" name="anoveiculo" value="<?php echo $this->form_encode_input($anoveiculo) . "\">" . $anoveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_anoveiculo" class="sc-ui-readonly-anoveiculo css_anoveiculo_line" style="<?php echo $sStyleReadLab_anoveiculo; ?>"><?php echo $this->form_encode_input($this->anoveiculo); ?></span><span id="id_read_off_anoveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_anoveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_anoveiculo_obj" style="" id="id_sc_field_anoveiculo" type=text name="anoveiculo" value="<?php echo $this->form_encode_input($anoveiculo) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['anoveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anoveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anoveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['placaveiculo']))
    {
        $this->nm_new_label['placaveiculo'] = "Placa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $placaveiculo = $this->placaveiculo;
   $sStyleHidden_placaveiculo = '';
   if (isset($this->nmgp_cmp_hidden['placaveiculo']) && $this->nmgp_cmp_hidden['placaveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['placaveiculo']);
       $sStyleHidden_placaveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_placaveiculo = 'display: none;';
   $sStyleReadInp_placaveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['placaveiculo']) && $this->nmgp_cmp_readonly['placaveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['placaveiculo']);
       $sStyleReadLab_placaveiculo = '';
       $sStyleReadInp_placaveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['placaveiculo']) && $this->nmgp_cmp_hidden['placaveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="placaveiculo" value="<?php echo $this->form_encode_input($placaveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_placaveiculo_line" id="hidden_field_data_placaveiculo" style="<?php echo $sStyleHidden_placaveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_placaveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_placaveiculo_label"><span id="id_label_placaveiculo"><?php echo $this->nm_new_label['placaveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["placaveiculo"]) &&  $this->nmgp_cmp_readonly["placaveiculo"] == "on") { 

 ?>
<input type="hidden" name="placaveiculo" value="<?php echo $this->form_encode_input($placaveiculo) . "\">" . $placaveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_placaveiculo" class="sc-ui-readonly-placaveiculo css_placaveiculo_line" style="<?php echo $sStyleReadLab_placaveiculo; ?>"><?php echo $this->form_encode_input($this->placaveiculo); ?></span><span id="id_read_off_placaveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_placaveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_placaveiculo_obj" style="" id="id_sc_field_placaveiculo" type=text name="placaveiculo" value="<?php echo $this->form_encode_input($placaveiculo) ?>"
 size=10 maxlength=19 alt="{datatype: 'mask', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', maskList: 'aaa-9*999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_placaveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_placaveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['corveiculo']))
    {
        $this->nm_new_label['corveiculo'] = "Cor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $corveiculo = $this->corveiculo;
   $sStyleHidden_corveiculo = '';
   if (isset($this->nmgp_cmp_hidden['corveiculo']) && $this->nmgp_cmp_hidden['corveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['corveiculo']);
       $sStyleHidden_corveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_corveiculo = 'display: none;';
   $sStyleReadInp_corveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['corveiculo']) && $this->nmgp_cmp_readonly['corveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['corveiculo']);
       $sStyleReadLab_corveiculo = '';
       $sStyleReadInp_corveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['corveiculo']) && $this->nmgp_cmp_hidden['corveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="corveiculo" value="<?php echo $this->form_encode_input($corveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_corveiculo_line" id="hidden_field_data_corveiculo" style="<?php echo $sStyleHidden_corveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_corveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_corveiculo_label"><span id="id_label_corveiculo"><?php echo $this->nm_new_label['corveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["corveiculo"]) &&  $this->nmgp_cmp_readonly["corveiculo"] == "on") { 

 ?>
<input type="hidden" name="corveiculo" value="<?php echo $this->form_encode_input($corveiculo) . "\">" . $corveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_corveiculo" class="sc-ui-readonly-corveiculo css_corveiculo_line" style="<?php echo $sStyleReadLab_corveiculo; ?>"><?php echo $this->form_encode_input($this->corveiculo); ?></span><span id="id_read_off_corveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_corveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_corveiculo_obj" style="" id="id_sc_field_corveiculo" type=text name="corveiculo" value="<?php echo $this->form_encode_input($corveiculo) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_corveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_corveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valordiaria']))
    {
        $this->nm_new_label['valordiaria'] = "Valor da Diária";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valordiaria = $this->valordiaria;
   $sStyleHidden_valordiaria = '';
   if (isset($this->nmgp_cmp_hidden['valordiaria']) && $this->nmgp_cmp_hidden['valordiaria'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valordiaria']);
       $sStyleHidden_valordiaria = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valordiaria = 'display: none;';
   $sStyleReadInp_valordiaria = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valordiaria']) && $this->nmgp_cmp_readonly['valordiaria'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valordiaria']);
       $sStyleReadLab_valordiaria = '';
       $sStyleReadInp_valordiaria = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valordiaria']) && $this->nmgp_cmp_hidden['valordiaria'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valordiaria" value="<?php echo $this->form_encode_input($valordiaria) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valordiaria_line" id="hidden_field_data_valordiaria" style="<?php echo $sStyleHidden_valordiaria; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valordiaria_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valordiaria_label"><span id="id_label_valordiaria"><?php echo $this->nm_new_label['valordiaria']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valordiaria"]) &&  $this->nmgp_cmp_readonly["valordiaria"] == "on") { 

 ?>
<input type="hidden" name="valordiaria" value="<?php echo $this->form_encode_input($valordiaria) . "\">" . $valordiaria . ""; ?>
<?php } else { ?>
<span id="id_read_on_valordiaria" class="sc-ui-readonly-valordiaria css_valordiaria_line" style="<?php echo $sStyleReadLab_valordiaria; ?>"><?php echo $this->form_encode_input($this->valordiaria); ?></span><span id="id_read_off_valordiaria" style="white-space: nowrap;<?php echo $sStyleReadInp_valordiaria; ?>">
 <input class="sc-js-input scFormObjectOdd css_valordiaria_obj" style="" id="id_sc_field_valordiaria" type=text name="valordiaria" value="<?php echo $this->form_encode_input($valordiaria) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valordiaria']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valordiaria']['format_pos'] || 3 == $this->field_config['valordiaria']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valordiaria']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valordiaria']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valordiaria']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valordiaria_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valordiaria_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['datacompraveiculo']))
    {
        $this->nm_new_label['datacompraveiculo'] = "Data da Compra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $datacompraveiculo = $this->datacompraveiculo;
   $sStyleHidden_datacompraveiculo = '';
   if (isset($this->nmgp_cmp_hidden['datacompraveiculo']) && $this->nmgp_cmp_hidden['datacompraveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datacompraveiculo']);
       $sStyleHidden_datacompraveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datacompraveiculo = 'display: none;';
   $sStyleReadInp_datacompraveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datacompraveiculo']) && $this->nmgp_cmp_readonly['datacompraveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datacompraveiculo']);
       $sStyleReadLab_datacompraveiculo = '';
       $sStyleReadInp_datacompraveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datacompraveiculo']) && $this->nmgp_cmp_hidden['datacompraveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datacompraveiculo" value="<?php echo $this->form_encode_input($datacompraveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_datacompraveiculo_line" id="hidden_field_data_datacompraveiculo" style="<?php echo $sStyleHidden_datacompraveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datacompraveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_datacompraveiculo_label"><span id="id_label_datacompraveiculo"><?php echo $this->nm_new_label['datacompraveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datacompraveiculo"]) &&  $this->nmgp_cmp_readonly["datacompraveiculo"] == "on") { 

 ?>
<input type="hidden" name="datacompraveiculo" value="<?php echo $this->form_encode_input($datacompraveiculo) . "\">" . $datacompraveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_datacompraveiculo" class="sc-ui-readonly-datacompraveiculo css_datacompraveiculo_line" style="<?php echo $sStyleReadLab_datacompraveiculo; ?>"><?php echo $this->form_encode_input($datacompraveiculo); ?></span><span id="id_read_off_datacompraveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_datacompraveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_datacompraveiculo_obj" style="" id="id_sc_field_datacompraveiculo" type=text name="datacompraveiculo" value="<?php echo $this->form_encode_input($datacompraveiculo) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['datacompraveiculo']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datacompraveiculo']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['datacompraveiculo']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datacompraveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datacompraveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kmatualveiculo']))
    {
        $this->nm_new_label['kmatualveiculo'] = "Km Atual";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kmatualveiculo = $this->kmatualveiculo;
   $sStyleHidden_kmatualveiculo = '';
   if (isset($this->nmgp_cmp_hidden['kmatualveiculo']) && $this->nmgp_cmp_hidden['kmatualveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kmatualveiculo']);
       $sStyleHidden_kmatualveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kmatualveiculo = 'display: none;';
   $sStyleReadInp_kmatualveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kmatualveiculo']) && $this->nmgp_cmp_readonly['kmatualveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kmatualveiculo']);
       $sStyleReadLab_kmatualveiculo = '';
       $sStyleReadInp_kmatualveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kmatualveiculo']) && $this->nmgp_cmp_hidden['kmatualveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kmatualveiculo" value="<?php echo $this->form_encode_input($kmatualveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kmatualveiculo_line" id="hidden_field_data_kmatualveiculo" style="<?php echo $sStyleHidden_kmatualveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kmatualveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kmatualveiculo_label"><span id="id_label_kmatualveiculo"><?php echo $this->nm_new_label['kmatualveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kmatualveiculo"]) &&  $this->nmgp_cmp_readonly["kmatualveiculo"] == "on") { 

 ?>
<input type="hidden" name="kmatualveiculo" value="<?php echo $this->form_encode_input($kmatualveiculo) . "\">" . $kmatualveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_kmatualveiculo" class="sc-ui-readonly-kmatualveiculo css_kmatualveiculo_line" style="<?php echo $sStyleReadLab_kmatualveiculo; ?>"><?php echo $this->form_encode_input($this->kmatualveiculo); ?></span><span id="id_read_off_kmatualveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_kmatualveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_kmatualveiculo_obj" style="" id="id_sc_field_kmatualveiculo" type=text name="kmatualveiculo" value="<?php echo $this->form_encode_input($kmatualveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['kmatualveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['kmatualveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kmatualveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kmatualveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['chassiveiculo']))
    {
        $this->nm_new_label['chassiveiculo'] = "Chassi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $chassiveiculo = $this->chassiveiculo;
   $sStyleHidden_chassiveiculo = '';
   if (isset($this->nmgp_cmp_hidden['chassiveiculo']) && $this->nmgp_cmp_hidden['chassiveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['chassiveiculo']);
       $sStyleHidden_chassiveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_chassiveiculo = 'display: none;';
   $sStyleReadInp_chassiveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['chassiveiculo']) && $this->nmgp_cmp_readonly['chassiveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['chassiveiculo']);
       $sStyleReadLab_chassiveiculo = '';
       $sStyleReadInp_chassiveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['chassiveiculo']) && $this->nmgp_cmp_hidden['chassiveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="chassiveiculo" value="<?php echo $this->form_encode_input($chassiveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_chassiveiculo_line" id="hidden_field_data_chassiveiculo" style="<?php echo $sStyleHidden_chassiveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_chassiveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_chassiveiculo_label"><span id="id_label_chassiveiculo"><?php echo $this->nm_new_label['chassiveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["chassiveiculo"]) &&  $this->nmgp_cmp_readonly["chassiveiculo"] == "on") { 

 ?>
<input type="hidden" name="chassiveiculo" value="<?php echo $this->form_encode_input($chassiveiculo) . "\">" . $chassiveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_chassiveiculo" class="sc-ui-readonly-chassiveiculo css_chassiveiculo_line" style="<?php echo $sStyleReadLab_chassiveiculo; ?>"><?php echo $this->form_encode_input($this->chassiveiculo); ?></span><span id="id_read_off_chassiveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_chassiveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_chassiveiculo_obj" style="" id="id_sc_field_chassiveiculo" type=text name="chassiveiculo" value="<?php echo $this->form_encode_input($chassiveiculo) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_chassiveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_chassiveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_chassiveiculo_dumb = ('' == $sStyleHidden_chassiveiculo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_chassiveiculo_dumb" style="<?php echo $sStyleHidden_chassiveiculo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Dados de Manutenção<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proxtrocaoleoveiculo']))
    {
        $this->nm_new_label['proxtrocaoleoveiculo'] = "Km - Prox. Troca Óleo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proxtrocaoleoveiculo = $this->proxtrocaoleoveiculo;
   $sStyleHidden_proxtrocaoleoveiculo = '';
   if (isset($this->nmgp_cmp_hidden['proxtrocaoleoveiculo']) && $this->nmgp_cmp_hidden['proxtrocaoleoveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proxtrocaoleoveiculo']);
       $sStyleHidden_proxtrocaoleoveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proxtrocaoleoveiculo = 'display: none;';
   $sStyleReadInp_proxtrocaoleoveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proxtrocaoleoveiculo']) && $this->nmgp_cmp_readonly['proxtrocaoleoveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proxtrocaoleoveiculo']);
       $sStyleReadLab_proxtrocaoleoveiculo = '';
       $sStyleReadInp_proxtrocaoleoveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proxtrocaoleoveiculo']) && $this->nmgp_cmp_hidden['proxtrocaoleoveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proxtrocaoleoveiculo" value="<?php echo $this->form_encode_input($proxtrocaoleoveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proxtrocaoleoveiculo_line" id="hidden_field_data_proxtrocaoleoveiculo" style="<?php echo $sStyleHidden_proxtrocaoleoveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proxtrocaoleoveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proxtrocaoleoveiculo_label"><span id="id_label_proxtrocaoleoveiculo"><?php echo $this->nm_new_label['proxtrocaoleoveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proxtrocaoleoveiculo"]) &&  $this->nmgp_cmp_readonly["proxtrocaoleoveiculo"] == "on") { 

 ?>
<input type="hidden" name="proxtrocaoleoveiculo" value="<?php echo $this->form_encode_input($proxtrocaoleoveiculo) . "\">" . $proxtrocaoleoveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_proxtrocaoleoveiculo" class="sc-ui-readonly-proxtrocaoleoveiculo css_proxtrocaoleoveiculo_line" style="<?php echo $sStyleReadLab_proxtrocaoleoveiculo; ?>"><?php echo $this->form_encode_input($this->proxtrocaoleoveiculo); ?></span><span id="id_read_off_proxtrocaoleoveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_proxtrocaoleoveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_proxtrocaoleoveiculo_obj" style="" id="id_sc_field_proxtrocaoleoveiculo" type=text name="proxtrocaoleoveiculo" value="<?php echo $this->form_encode_input($proxtrocaoleoveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['proxtrocaoleoveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['proxtrocaoleoveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proxtrocaoleoveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proxtrocaoleoveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proxtrocafiltroveiculo']))
    {
        $this->nm_new_label['proxtrocafiltroveiculo'] = "Km - Prox. Troca Filtro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proxtrocafiltroveiculo = $this->proxtrocafiltroveiculo;
   $sStyleHidden_proxtrocafiltroveiculo = '';
   if (isset($this->nmgp_cmp_hidden['proxtrocafiltroveiculo']) && $this->nmgp_cmp_hidden['proxtrocafiltroveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proxtrocafiltroveiculo']);
       $sStyleHidden_proxtrocafiltroveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proxtrocafiltroveiculo = 'display: none;';
   $sStyleReadInp_proxtrocafiltroveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proxtrocafiltroveiculo']) && $this->nmgp_cmp_readonly['proxtrocafiltroveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proxtrocafiltroveiculo']);
       $sStyleReadLab_proxtrocafiltroveiculo = '';
       $sStyleReadInp_proxtrocafiltroveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proxtrocafiltroveiculo']) && $this->nmgp_cmp_hidden['proxtrocafiltroveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proxtrocafiltroveiculo" value="<?php echo $this->form_encode_input($proxtrocafiltroveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proxtrocafiltroveiculo_line" id="hidden_field_data_proxtrocafiltroveiculo" style="<?php echo $sStyleHidden_proxtrocafiltroveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proxtrocafiltroveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proxtrocafiltroveiculo_label"><span id="id_label_proxtrocafiltroveiculo"><?php echo $this->nm_new_label['proxtrocafiltroveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proxtrocafiltroveiculo"]) &&  $this->nmgp_cmp_readonly["proxtrocafiltroveiculo"] == "on") { 

 ?>
<input type="hidden" name="proxtrocafiltroveiculo" value="<?php echo $this->form_encode_input($proxtrocafiltroveiculo) . "\">" . $proxtrocafiltroveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_proxtrocafiltroveiculo" class="sc-ui-readonly-proxtrocafiltroveiculo css_proxtrocafiltroveiculo_line" style="<?php echo $sStyleReadLab_proxtrocafiltroveiculo; ?>"><?php echo $this->form_encode_input($this->proxtrocafiltroveiculo); ?></span><span id="id_read_off_proxtrocafiltroveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_proxtrocafiltroveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_proxtrocafiltroveiculo_obj" style="" id="id_sc_field_proxtrocafiltroveiculo" type=text name="proxtrocafiltroveiculo" value="<?php echo $this->form_encode_input($proxtrocafiltroveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['proxtrocafiltroveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['proxtrocafiltroveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proxtrocafiltroveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proxtrocafiltroveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['avisotrocaoleoveiculo']))
    {
        $this->nm_new_label['avisotrocaoleoveiculo'] = "Km - Aviso Troca Óleo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $avisotrocaoleoveiculo = $this->avisotrocaoleoveiculo;
   $sStyleHidden_avisotrocaoleoveiculo = '';
   if (isset($this->nmgp_cmp_hidden['avisotrocaoleoveiculo']) && $this->nmgp_cmp_hidden['avisotrocaoleoveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['avisotrocaoleoveiculo']);
       $sStyleHidden_avisotrocaoleoveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_avisotrocaoleoveiculo = 'display: none;';
   $sStyleReadInp_avisotrocaoleoveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['avisotrocaoleoveiculo']) && $this->nmgp_cmp_readonly['avisotrocaoleoveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['avisotrocaoleoveiculo']);
       $sStyleReadLab_avisotrocaoleoveiculo = '';
       $sStyleReadInp_avisotrocaoleoveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['avisotrocaoleoveiculo']) && $this->nmgp_cmp_hidden['avisotrocaoleoveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="avisotrocaoleoveiculo" value="<?php echo $this->form_encode_input($avisotrocaoleoveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_avisotrocaoleoveiculo_line" id="hidden_field_data_avisotrocaoleoveiculo" style="<?php echo $sStyleHidden_avisotrocaoleoveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_avisotrocaoleoveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_avisotrocaoleoveiculo_label"><span id="id_label_avisotrocaoleoveiculo"><?php echo $this->nm_new_label['avisotrocaoleoveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["avisotrocaoleoveiculo"]) &&  $this->nmgp_cmp_readonly["avisotrocaoleoveiculo"] == "on") { 

 ?>
<input type="hidden" name="avisotrocaoleoveiculo" value="<?php echo $this->form_encode_input($avisotrocaoleoveiculo) . "\">" . $avisotrocaoleoveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_avisotrocaoleoveiculo" class="sc-ui-readonly-avisotrocaoleoveiculo css_avisotrocaoleoveiculo_line" style="<?php echo $sStyleReadLab_avisotrocaoleoveiculo; ?>"><?php echo $this->form_encode_input($this->avisotrocaoleoveiculo); ?></span><span id="id_read_off_avisotrocaoleoveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_avisotrocaoleoveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_avisotrocaoleoveiculo_obj" style="" id="id_sc_field_avisotrocaoleoveiculo" type=text name="avisotrocaoleoveiculo" value="<?php echo $this->form_encode_input($avisotrocaoleoveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['avisotrocaoleoveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['avisotrocaoleoveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_avisotrocaoleoveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_avisotrocaoleoveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['avisotrocafiltroveiculo']))
    {
        $this->nm_new_label['avisotrocafiltroveiculo'] = "Km - Aviso Troca Filtro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $avisotrocafiltroveiculo = $this->avisotrocafiltroveiculo;
   $sStyleHidden_avisotrocafiltroveiculo = '';
   if (isset($this->nmgp_cmp_hidden['avisotrocafiltroveiculo']) && $this->nmgp_cmp_hidden['avisotrocafiltroveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['avisotrocafiltroveiculo']);
       $sStyleHidden_avisotrocafiltroveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_avisotrocafiltroveiculo = 'display: none;';
   $sStyleReadInp_avisotrocafiltroveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['avisotrocafiltroveiculo']) && $this->nmgp_cmp_readonly['avisotrocafiltroveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['avisotrocafiltroveiculo']);
       $sStyleReadLab_avisotrocafiltroveiculo = '';
       $sStyleReadInp_avisotrocafiltroveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['avisotrocafiltroveiculo']) && $this->nmgp_cmp_hidden['avisotrocafiltroveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="avisotrocafiltroveiculo" value="<?php echo $this->form_encode_input($avisotrocafiltroveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_avisotrocafiltroveiculo_line" id="hidden_field_data_avisotrocafiltroveiculo" style="<?php echo $sStyleHidden_avisotrocafiltroveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_avisotrocafiltroveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_avisotrocafiltroveiculo_label"><span id="id_label_avisotrocafiltroveiculo"><?php echo $this->nm_new_label['avisotrocafiltroveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["avisotrocafiltroveiculo"]) &&  $this->nmgp_cmp_readonly["avisotrocafiltroveiculo"] == "on") { 

 ?>
<input type="hidden" name="avisotrocafiltroveiculo" value="<?php echo $this->form_encode_input($avisotrocafiltroveiculo) . "\">" . $avisotrocafiltroveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_avisotrocafiltroveiculo" class="sc-ui-readonly-avisotrocafiltroveiculo css_avisotrocafiltroveiculo_line" style="<?php echo $sStyleReadLab_avisotrocafiltroveiculo; ?>"><?php echo $this->form_encode_input($this->avisotrocafiltroveiculo); ?></span><span id="id_read_off_avisotrocafiltroveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_avisotrocafiltroveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_avisotrocafiltroveiculo_obj" style="" id="id_sc_field_avisotrocafiltroveiculo" type=text name="avisotrocafiltroveiculo" value="<?php echo $this->form_encode_input($avisotrocafiltroveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['avisotrocafiltroveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['avisotrocafiltroveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_avisotrocafiltroveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_avisotrocafiltroveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proxtrocacorreiaveiculo']))
    {
        $this->nm_new_label['proxtrocacorreiaveiculo'] = "Km - Prox. Troca Correia Dentada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proxtrocacorreiaveiculo = $this->proxtrocacorreiaveiculo;
   $sStyleHidden_proxtrocacorreiaveiculo = '';
   if (isset($this->nmgp_cmp_hidden['proxtrocacorreiaveiculo']) && $this->nmgp_cmp_hidden['proxtrocacorreiaveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proxtrocacorreiaveiculo']);
       $sStyleHidden_proxtrocacorreiaveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proxtrocacorreiaveiculo = 'display: none;';
   $sStyleReadInp_proxtrocacorreiaveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proxtrocacorreiaveiculo']) && $this->nmgp_cmp_readonly['proxtrocacorreiaveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proxtrocacorreiaveiculo']);
       $sStyleReadLab_proxtrocacorreiaveiculo = '';
       $sStyleReadInp_proxtrocacorreiaveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proxtrocacorreiaveiculo']) && $this->nmgp_cmp_hidden['proxtrocacorreiaveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proxtrocacorreiaveiculo" value="<?php echo $this->form_encode_input($proxtrocacorreiaveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proxtrocacorreiaveiculo_line" id="hidden_field_data_proxtrocacorreiaveiculo" style="<?php echo $sStyleHidden_proxtrocacorreiaveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proxtrocacorreiaveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proxtrocacorreiaveiculo_label"><span id="id_label_proxtrocacorreiaveiculo"><?php echo $this->nm_new_label['proxtrocacorreiaveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proxtrocacorreiaveiculo"]) &&  $this->nmgp_cmp_readonly["proxtrocacorreiaveiculo"] == "on") { 

 ?>
<input type="hidden" name="proxtrocacorreiaveiculo" value="<?php echo $this->form_encode_input($proxtrocacorreiaveiculo) . "\">" . $proxtrocacorreiaveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_proxtrocacorreiaveiculo" class="sc-ui-readonly-proxtrocacorreiaveiculo css_proxtrocacorreiaveiculo_line" style="<?php echo $sStyleReadLab_proxtrocacorreiaveiculo; ?>"><?php echo $this->form_encode_input($this->proxtrocacorreiaveiculo); ?></span><span id="id_read_off_proxtrocacorreiaveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_proxtrocacorreiaveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_proxtrocacorreiaveiculo_obj" style="" id="id_sc_field_proxtrocacorreiaveiculo" type=text name="proxtrocacorreiaveiculo" value="<?php echo $this->form_encode_input($proxtrocacorreiaveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['proxtrocacorreiaveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['proxtrocacorreiaveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proxtrocacorreiaveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proxtrocacorreiaveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proxtrocapastilhaveiculo']))
    {
        $this->nm_new_label['proxtrocapastilhaveiculo'] = "Km - Prox. Troca Pastilha de Freio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proxtrocapastilhaveiculo = $this->proxtrocapastilhaveiculo;
   $sStyleHidden_proxtrocapastilhaveiculo = '';
   if (isset($this->nmgp_cmp_hidden['proxtrocapastilhaveiculo']) && $this->nmgp_cmp_hidden['proxtrocapastilhaveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proxtrocapastilhaveiculo']);
       $sStyleHidden_proxtrocapastilhaveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proxtrocapastilhaveiculo = 'display: none;';
   $sStyleReadInp_proxtrocapastilhaveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proxtrocapastilhaveiculo']) && $this->nmgp_cmp_readonly['proxtrocapastilhaveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proxtrocapastilhaveiculo']);
       $sStyleReadLab_proxtrocapastilhaveiculo = '';
       $sStyleReadInp_proxtrocapastilhaveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proxtrocapastilhaveiculo']) && $this->nmgp_cmp_hidden['proxtrocapastilhaveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proxtrocapastilhaveiculo" value="<?php echo $this->form_encode_input($proxtrocapastilhaveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proxtrocapastilhaveiculo_line" id="hidden_field_data_proxtrocapastilhaveiculo" style="<?php echo $sStyleHidden_proxtrocapastilhaveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proxtrocapastilhaveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proxtrocapastilhaveiculo_label"><span id="id_label_proxtrocapastilhaveiculo"><?php echo $this->nm_new_label['proxtrocapastilhaveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proxtrocapastilhaveiculo"]) &&  $this->nmgp_cmp_readonly["proxtrocapastilhaveiculo"] == "on") { 

 ?>
<input type="hidden" name="proxtrocapastilhaveiculo" value="<?php echo $this->form_encode_input($proxtrocapastilhaveiculo) . "\">" . $proxtrocapastilhaveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_proxtrocapastilhaveiculo" class="sc-ui-readonly-proxtrocapastilhaveiculo css_proxtrocapastilhaveiculo_line" style="<?php echo $sStyleReadLab_proxtrocapastilhaveiculo; ?>"><?php echo $this->form_encode_input($this->proxtrocapastilhaveiculo); ?></span><span id="id_read_off_proxtrocapastilhaveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_proxtrocapastilhaveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_proxtrocapastilhaveiculo_obj" style="" id="id_sc_field_proxtrocapastilhaveiculo" type=text name="proxtrocapastilhaveiculo" value="<?php echo $this->form_encode_input($proxtrocapastilhaveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['proxtrocapastilhaveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['proxtrocapastilhaveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proxtrocapastilhaveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proxtrocapastilhaveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['avisotrocacorreiaveiculo']))
    {
        $this->nm_new_label['avisotrocacorreiaveiculo'] = "Km - Aviso Troca Correia Dentada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $avisotrocacorreiaveiculo = $this->avisotrocacorreiaveiculo;
   $sStyleHidden_avisotrocacorreiaveiculo = '';
   if (isset($this->nmgp_cmp_hidden['avisotrocacorreiaveiculo']) && $this->nmgp_cmp_hidden['avisotrocacorreiaveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['avisotrocacorreiaveiculo']);
       $sStyleHidden_avisotrocacorreiaveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_avisotrocacorreiaveiculo = 'display: none;';
   $sStyleReadInp_avisotrocacorreiaveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['avisotrocacorreiaveiculo']) && $this->nmgp_cmp_readonly['avisotrocacorreiaveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['avisotrocacorreiaveiculo']);
       $sStyleReadLab_avisotrocacorreiaveiculo = '';
       $sStyleReadInp_avisotrocacorreiaveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['avisotrocacorreiaveiculo']) && $this->nmgp_cmp_hidden['avisotrocacorreiaveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="avisotrocacorreiaveiculo" value="<?php echo $this->form_encode_input($avisotrocacorreiaveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_avisotrocacorreiaveiculo_line" id="hidden_field_data_avisotrocacorreiaveiculo" style="<?php echo $sStyleHidden_avisotrocacorreiaveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_avisotrocacorreiaveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_avisotrocacorreiaveiculo_label"><span id="id_label_avisotrocacorreiaveiculo"><?php echo $this->nm_new_label['avisotrocacorreiaveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["avisotrocacorreiaveiculo"]) &&  $this->nmgp_cmp_readonly["avisotrocacorreiaveiculo"] == "on") { 

 ?>
<input type="hidden" name="avisotrocacorreiaveiculo" value="<?php echo $this->form_encode_input($avisotrocacorreiaveiculo) . "\">" . $avisotrocacorreiaveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_avisotrocacorreiaveiculo" class="sc-ui-readonly-avisotrocacorreiaveiculo css_avisotrocacorreiaveiculo_line" style="<?php echo $sStyleReadLab_avisotrocacorreiaveiculo; ?>"><?php echo $this->form_encode_input($this->avisotrocacorreiaveiculo); ?></span><span id="id_read_off_avisotrocacorreiaveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_avisotrocacorreiaveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_avisotrocacorreiaveiculo_obj" style="" id="id_sc_field_avisotrocacorreiaveiculo" type=text name="avisotrocacorreiaveiculo" value="<?php echo $this->form_encode_input($avisotrocacorreiaveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['avisotrocacorreiaveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['avisotrocacorreiaveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_avisotrocacorreiaveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_avisotrocacorreiaveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['avisotrocapastilhaveiculo']))
    {
        $this->nm_new_label['avisotrocapastilhaveiculo'] = "Km - Aviso Troca Pastilha de Freio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $avisotrocapastilhaveiculo = $this->avisotrocapastilhaveiculo;
   $sStyleHidden_avisotrocapastilhaveiculo = '';
   if (isset($this->nmgp_cmp_hidden['avisotrocapastilhaveiculo']) && $this->nmgp_cmp_hidden['avisotrocapastilhaveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['avisotrocapastilhaveiculo']);
       $sStyleHidden_avisotrocapastilhaveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_avisotrocapastilhaveiculo = 'display: none;';
   $sStyleReadInp_avisotrocapastilhaveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['avisotrocapastilhaveiculo']) && $this->nmgp_cmp_readonly['avisotrocapastilhaveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['avisotrocapastilhaveiculo']);
       $sStyleReadLab_avisotrocapastilhaveiculo = '';
       $sStyleReadInp_avisotrocapastilhaveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['avisotrocapastilhaveiculo']) && $this->nmgp_cmp_hidden['avisotrocapastilhaveiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="avisotrocapastilhaveiculo" value="<?php echo $this->form_encode_input($avisotrocapastilhaveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_avisotrocapastilhaveiculo_line" id="hidden_field_data_avisotrocapastilhaveiculo" style="<?php echo $sStyleHidden_avisotrocapastilhaveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_avisotrocapastilhaveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_avisotrocapastilhaveiculo_label"><span id="id_label_avisotrocapastilhaveiculo"><?php echo $this->nm_new_label['avisotrocapastilhaveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["avisotrocapastilhaveiculo"]) &&  $this->nmgp_cmp_readonly["avisotrocapastilhaveiculo"] == "on") { 

 ?>
<input type="hidden" name="avisotrocapastilhaveiculo" value="<?php echo $this->form_encode_input($avisotrocapastilhaveiculo) . "\">" . $avisotrocapastilhaveiculo . ""; ?>
<?php } else { ?>
<span id="id_read_on_avisotrocapastilhaveiculo" class="sc-ui-readonly-avisotrocapastilhaveiculo css_avisotrocapastilhaveiculo_line" style="<?php echo $sStyleReadLab_avisotrocapastilhaveiculo; ?>"><?php echo $this->form_encode_input($this->avisotrocapastilhaveiculo); ?></span><span id="id_read_off_avisotrocapastilhaveiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_avisotrocapastilhaveiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_avisotrocapastilhaveiculo_obj" style="" id="id_sc_field_avisotrocapastilhaveiculo" type=text name="avisotrocapastilhaveiculo" value="<?php echo $this->form_encode_input($avisotrocapastilhaveiculo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['avisotrocapastilhaveiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['avisotrocapastilhaveiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_avisotrocapastilhaveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_avisotrocapastilhaveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['statusveiculo']))
   {
       $this->nm_new_label['statusveiculo'] = "" . $this->Ini->Nm_lang['lang_sec_users_fild_active'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $statusveiculo = $this->statusveiculo;
   $sStyleHidden_statusveiculo = '';
   if (isset($this->nmgp_cmp_hidden['statusveiculo']) && $this->nmgp_cmp_hidden['statusveiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['statusveiculo']);
       $sStyleHidden_statusveiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_statusveiculo = 'display: none;';
   $sStyleReadInp_statusveiculo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['statusveiculo']) && $this->nmgp_cmp_readonly['statusveiculo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['statusveiculo']);
       $sStyleReadLab_statusveiculo = '';
       $sStyleReadInp_statusveiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['statusveiculo']) && $this->nmgp_cmp_hidden['statusveiculo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="statusveiculo" value="<?php echo $this->form_encode_input($this->statusveiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->statusveiculo_1 = explode(";", trim($this->statusveiculo));
  } 
  else
  {
      if (empty($this->statusveiculo))
      {
          $this->statusveiculo_1= array(); 
      } 
      else
      {
          $this->statusveiculo_1= $this->statusveiculo; 
          $this->statusveiculo= ""; 
          foreach ($this->statusveiculo_1 as $cada_statusveiculo)
          {
             if (!empty($statusveiculo))
             {
                 $this->statusveiculo.= ";"; 
             } 
             $this->statusveiculo.= $cada_statusveiculo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_statusveiculo_line" id="hidden_field_data_statusveiculo" style="<?php echo $sStyleHidden_statusveiculo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statusveiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_statusveiculo_label"><span id="id_label_statusveiculo"><?php echo $this->nm_new_label['statusveiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statusveiculo"]) &&  $this->nmgp_cmp_readonly["statusveiculo"] == "on") { 

$statusveiculo_look = "";
 if (in_array("1", $this->statusveiculo_1))  { $statusveiculo_look .= "<br />";} 
?>
<input type="hidden" name="statusveiculo" value="<?php echo $this->form_encode_input($statusveiculo) . "\">" . $statusveiculo_look . ""; ?>
<?php } else { ?>

<?php

$statusveiculo_look = "";
 if (in_array("1", $this->statusveiculo_1))  { $statusveiculo_look .= "<br />";} 
?>
<span id="id_read_on_statusveiculo" class="css_statusveiculo_line" style="<?php echo $sStyleReadLab_statusveiculo; ?>"><?php echo $this->form_encode_input($statusveiculo_look); ?></span><span id="id_read_off_statusveiculo" style="<?php echo $sStyleReadInp_statusveiculo; ?>"><?php echo "<div id=\"idAjaxCheckbox_statusveiculo\" style=\"display: inline-block\">\r\n"; ?><TABLE cellpadding="0" cellspacing="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_statusveiculo_line"> <input type=checkbox class="sc-ui-checkbox-statusveiculo sc-ui-checkbox-statusveiculo" name="statusveiculo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['Lookup_statusveiculo'][] = '1'; ?>
<?php  if (in_array("1", $this->statusveiculo_1))  { echo " checked" ;} ?> onClick=""  style="float:left; position:relative; top: -3px;"></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statusveiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statusveiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
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
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
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
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbveiculos_mob']['masterValue']))
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
 parent.scAjaxDetailStatus("form_tbveiculos_mob");
 parent.scAjaxDetailHeight("form_tbveiculos_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_tbveiculos_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbveiculos_mob", <?php echo $sTamanhoIframe; ?>);
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
</body> 
</html> 
