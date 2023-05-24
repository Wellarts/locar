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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Locação de Veículo"); } else { echo strip_tags("Locação de Veículo"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tblocacao_editar/form_tblocacao_editar_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tblocacao_editar_sajax_js.php");
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

include_once('form_tblocacao_editar_jquery.php');

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

  addAutocomplete(this);

  $("#hidden_bloco_0,#hidden_bloco_2,#hidden_bloco_3,#hidden_bloco_4").each(function() {
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
    "hidden_bloco_2": true,
    "hidden_bloco_3": true,
    "hidden_bloco_4": true
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
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_tbmultasAvarias", $($("#nmsc_iframe_liga_form_tbmultasAvarias")[0].contentWindow.document).innerHeight());
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-idfkclientelocacao", elem).focus(function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).blur(function() {
   var sId = $(this).attr("id").substr(6), sRow = "idfkclientelocacao" != sId ? sId.substr(18) : "";
   if ("" == $(this).val()) {
    $("#id_sc_field_" + sId).val("");
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).autocomplete({
   source: function (request, response) {
    $.ajax({
     url: "form_tblocacao_editar.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idfkclientelocacao",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      response(data);
     }
    });
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idfkclientelocacao' != sId ? sId.substr(18) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_tblocacao_editar_event_idfkclientelocacao_onchange(sRow);
    event.preventDefault();
   }
  });

  $(".sc-ui-autocomp-idfkveiculolocacao", elem).focus(function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).blur(function() {
   var sId = $(this).attr("id").substr(6), sRow = "idfkveiculolocacao" != sId ? sId.substr(18) : "";
   if ("" == $(this).val()) {
    $("#id_sc_field_" + sId).val("");
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).autocomplete({
   source: function (request, response) {
    $.ajax({
     url: "form_tblocacao_editar.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idfkveiculolocacao",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      response(data);
     }
    });
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'idfkveiculolocacao' != sId ? sId.substr(18) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_tblocacao_editar_event_idfkveiculolocacao_onchange(sRow);
    event.preventDefault();
   }
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['recarga'];
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
 include_once("form_tblocacao_editar_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_tblocacao_editar'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tblocacao_editar'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Locação de Veículo"; } else { echo "Locação de Veículo"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['fast_search'][2] : "";
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
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['fichaLocacao'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "fichalocacao", "sc_btn_fichaLocacao()", "sc_btn_fichaLocacao()", "sc_fichaLocacao_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['fichaLocacao'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "fichalocacao", "sc_btn_fichaLocacao()", "sc_btn_fichaLocacao()", "sc_fichaLocacao_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['finalizaLocacao'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "finalizalocacao", "sc_btn_finalizaLocacao()", "sc_btn_finalizaLocacao()", "sc_finalizaLocacao_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['finalizaLocacao'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "finalizalocacao", "sc_btn_finalizaLocacao()", "sc_btn_finalizaLocacao()", "sc_finalizaLocacao_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['locacaoFinalizada'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "locacaofinalizada", "sc_btn_locacaoFinalizada()", "sc_btn_locacaoFinalizada()", "sc_locacaoFinalizada_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['locacaoFinalizada'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "locacaofinalizada", "sc_btn_locacaoFinalizada()", "sc_btn_locacaoFinalizada()", "sc_locacaoFinalizada_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idlocacao']))
           {
               $this->nmgp_cmp_readonly['idlocacao'] = 'on';
           }
?>
   <tr>


    <TD colspan="3" height="20" class="scFormBlock" style="text-align: center; vertical-align: middle">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="center" valign="middle" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;text-align: center; vertical-align: middle; \" class=\"scFormBlockAlign\" align=\"center\">"; } ?>Dada da Saída<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idlocacao']))
    {
        $this->nm_new_label['idlocacao'] = "Código";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idlocacao = $this->idlocacao;
   $sStyleHidden_idlocacao = '';
   if (isset($this->nmgp_cmp_hidden['idlocacao']) && $this->nmgp_cmp_hidden['idlocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idlocacao']);
       $sStyleHidden_idlocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idlocacao = 'display: none;';
   $sStyleReadInp_idlocacao = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idlocacao"]) &&  $this->nmgp_cmp_readonly["idlocacao"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idlocacao']);
       $sStyleReadLab_idlocacao = '';
       $sStyleReadInp_idlocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idlocacao']) && $this->nmgp_cmp_hidden['idlocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idlocacao" value="<?php echo $this->form_encode_input($idlocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idlocacao_line" id="hidden_field_data_idlocacao" style="<?php echo $sStyleHidden_idlocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idlocacao_line" style="padding: 0px"><span class="scFormLabelOddFormat css_idlocacao_label"><span id="id_label_idlocacao"><?php echo $this->nm_new_label['idlocacao']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_idlocacao" css_idlocacao_line" style="<?php echo $sStyleReadLab_idlocacao; ?>"><?php echo $this->form_encode_input($this->idlocacao); ?></span><span id="id_read_off_idlocacao" style="<?php echo $sStyleReadInp_idlocacao; ?>"><input type="hidden" name="idlocacao" value="<?php echo $this->form_encode_input($idlocacao) . "\">"?><span id="id_ajax_label_idlocacao"><?php echo nl2br($idlocacao); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idlocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idlocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idfkclientelocacao']))
    {
        $this->nm_new_label['idfkclientelocacao'] = "Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkclientelocacao = $this->idfkclientelocacao;
   $sStyleHidden_idfkclientelocacao = '';
   if (isset($this->nmgp_cmp_hidden['idfkclientelocacao']) && $this->nmgp_cmp_hidden['idfkclientelocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkclientelocacao']);
       $sStyleHidden_idfkclientelocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkclientelocacao = 'display: none;';
   $sStyleReadInp_idfkclientelocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkclientelocacao']) && $this->nmgp_cmp_readonly['idfkclientelocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkclientelocacao']);
       $sStyleReadLab_idfkclientelocacao = '';
       $sStyleReadInp_idfkclientelocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkclientelocacao']) && $this->nmgp_cmp_hidden['idfkclientelocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idfkclientelocacao" value="<?php echo $this->form_encode_input($idfkclientelocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idfkclientelocacao_line" id="hidden_field_data_idfkclientelocacao" style="<?php echo $sStyleHidden_idfkclientelocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkclientelocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfkclientelocacao_label"><span id="id_label_idfkclientelocacao"><?php echo $this->nm_new_label['idfkclientelocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkclientelocacao"]) &&  $this->nmgp_cmp_readonly["idfkclientelocacao"] == "on") { 

 ?>
<input type="hidden" name="idfkclientelocacao" value="<?php echo $this->form_encode_input($idfkclientelocacao) . "\">" . $idfkclientelocacao . ""; ?>
<?php } else { ?>

<?php
$aRecData['idfkclientelocacao'] = $this->idfkclientelocacao;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao'] = array(); 
    }

   $old_value_idlocacao = $this->idlocacao;
   $old_value_kmsaidalocacao = $this->kmsaidalocacao;
   $old_value_datasaidalocacao = $this->datasaidalocacao;
   $old_value_horasaidalocacao = $this->horasaidalocacao;
   $old_value_dataretornolocacao = $this->dataretornolocacao;
   $old_value_horaretornolocacao = $this->horaretornolocacao;
   $old_value_kmretornolocacao = $this->kmretornolocacao;
   $old_value_qtddiarias = $this->qtddiarias;
   $old_value_descontolocacao = $this->descontolocacao;
   $old_value_valorliquidolocacao = $this->valorliquidolocacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlocacao = $this->idlocacao;
   $unformatted_value_kmsaidalocacao = $this->kmsaidalocacao;
   $unformatted_value_datasaidalocacao = $this->datasaidalocacao;
   $unformatted_value_horasaidalocacao = $this->horasaidalocacao;
   $unformatted_value_dataretornolocacao = $this->dataretornolocacao;
   $unformatted_value_horaretornolocacao = $this->horaretornolocacao;
   $unformatted_value_kmretornolocacao = $this->kmretornolocacao;
   $unformatted_value_qtddiarias = $this->qtddiarias;
   $unformatted_value_descontolocacao = $this->descontolocacao;
   $unformatted_value_valorliquidolocacao = $this->valorliquidolocacao;

   $nm_comando = "SELECT idCliente, nomeCliente FROM tbclientes WHERE idCliente = " . substr($this->Db->qstr($this->idfkclientelocacao), 1, -1) . " ORDER BY nomeCliente";

   $this->idlocacao = $old_value_idlocacao;
   $this->kmsaidalocacao = $old_value_kmsaidalocacao;
   $this->datasaidalocacao = $old_value_datasaidalocacao;
   $this->horasaidalocacao = $old_value_horasaidalocacao;
   $this->dataretornolocacao = $old_value_dataretornolocacao;
   $this->horaretornolocacao = $old_value_horaretornolocacao;
   $this->kmretornolocacao = $old_value_kmretornolocacao;
   $this->qtddiarias = $old_value_qtddiarias;
   $this->descontolocacao = $old_value_descontolocacao;
   $this->valorliquidolocacao = $old_value_valorliquidolocacao;

   if ('' != $this->idfkclientelocacao)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$idfkclientelocacao_look = (isset($aLookup[0][$this->idfkclientelocacao])) ? $aLookup[0][$this->idfkclientelocacao] : $this->idfkclientelocacao;
?>
<span id="id_read_on_idfkclientelocacao" class="sc-ui-readonly-idfkclientelocacao css_idfkclientelocacao_line" style="<?php echo $sStyleReadLab_idfkclientelocacao; ?>"><?php echo $idfkclientelocacao_look; ?></span><span id="id_read_off_idfkclientelocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_idfkclientelocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_idfkclientelocacao_obj" style="display: none;" id="id_sc_field_idfkclientelocacao" type=text name="idfkclientelocacao" value="<?php echo $this->form_encode_input($idfkclientelocacao) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php
$aRecData['idfkclientelocacao'] = $this->idfkclientelocacao;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao'] = array(); 
    }

   $old_value_idlocacao = $this->idlocacao;
   $old_value_kmsaidalocacao = $this->kmsaidalocacao;
   $old_value_datasaidalocacao = $this->datasaidalocacao;
   $old_value_horasaidalocacao = $this->horasaidalocacao;
   $old_value_dataretornolocacao = $this->dataretornolocacao;
   $old_value_horaretornolocacao = $this->horaretornolocacao;
   $old_value_kmretornolocacao = $this->kmretornolocacao;
   $old_value_qtddiarias = $this->qtddiarias;
   $old_value_descontolocacao = $this->descontolocacao;
   $old_value_valorliquidolocacao = $this->valorliquidolocacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlocacao = $this->idlocacao;
   $unformatted_value_kmsaidalocacao = $this->kmsaidalocacao;
   $unformatted_value_datasaidalocacao = $this->datasaidalocacao;
   $unformatted_value_horasaidalocacao = $this->horasaidalocacao;
   $unformatted_value_dataretornolocacao = $this->dataretornolocacao;
   $unformatted_value_horaretornolocacao = $this->horaretornolocacao;
   $unformatted_value_kmretornolocacao = $this->kmretornolocacao;
   $unformatted_value_qtddiarias = $this->qtddiarias;
   $unformatted_value_descontolocacao = $this->descontolocacao;
   $unformatted_value_valorliquidolocacao = $this->valorliquidolocacao;

   $nm_comando = "SELECT idCliente, nomeCliente FROM tbclientes WHERE idCliente = " . substr($this->Db->qstr($this->idfkclientelocacao), 1, -1) . " ORDER BY nomeCliente";

   $this->idlocacao = $old_value_idlocacao;
   $this->kmsaidalocacao = $old_value_kmsaidalocacao;
   $this->datasaidalocacao = $old_value_datasaidalocacao;
   $this->horasaidalocacao = $old_value_horasaidalocacao;
   $this->dataretornolocacao = $old_value_dataretornolocacao;
   $this->horaretornolocacao = $old_value_horaretornolocacao;
   $this->kmretornolocacao = $old_value_kmretornolocacao;
   $this->qtddiarias = $old_value_qtddiarias;
   $this->descontolocacao = $old_value_descontolocacao;
   $this->valorliquidolocacao = $old_value_valorliquidolocacao;

   if ('' != $this->idfkclientelocacao)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkclientelocacao'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->idfkclientelocacao])) ? $aLookup[0][$this->idfkclientelocacao] : '';
?>
<input type="text" id="id_ac_idfkclientelocacao" name="idfkclientelocacao_autocomp" class="scFormObjectOdd sc-ui-autocomp-idfkclientelocacao css_idfkclientelocacao_obj" size="30" value="<?php echo $sAutocompValue; ?>" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkclientelocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkclientelocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idfkveiculolocacao']))
    {
        $this->nm_new_label['idfkveiculolocacao'] = "Veículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfkveiculolocacao = $this->idfkveiculolocacao;
   $sStyleHidden_idfkveiculolocacao = '';
   if (isset($this->nmgp_cmp_hidden['idfkveiculolocacao']) && $this->nmgp_cmp_hidden['idfkveiculolocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfkveiculolocacao']);
       $sStyleHidden_idfkveiculolocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfkveiculolocacao = 'display: none;';
   $sStyleReadInp_idfkveiculolocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfkveiculolocacao']) && $this->nmgp_cmp_readonly['idfkveiculolocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfkveiculolocacao']);
       $sStyleReadLab_idfkveiculolocacao = '';
       $sStyleReadInp_idfkveiculolocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfkveiculolocacao']) && $this->nmgp_cmp_hidden['idfkveiculolocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idfkveiculolocacao" value="<?php echo $this->form_encode_input($idfkveiculolocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idfkveiculolocacao_line" id="hidden_field_data_idfkveiculolocacao" style="<?php echo $sStyleHidden_idfkveiculolocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfkveiculolocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfkveiculolocacao_label"><span id="id_label_idfkveiculolocacao"><?php echo $this->nm_new_label['idfkveiculolocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfkveiculolocacao"]) &&  $this->nmgp_cmp_readonly["idfkveiculolocacao"] == "on") { 

 ?>
<input type="hidden" name="idfkveiculolocacao" value="<?php echo $this->form_encode_input($idfkveiculolocacao) . "\">" . $idfkveiculolocacao . ""; ?>
<?php } else { ?>

<?php
$aRecData['idfkveiculolocacao'] = $this->idfkveiculolocacao;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao'] = array(); 
    }

   $old_value_idlocacao = $this->idlocacao;
   $old_value_kmsaidalocacao = $this->kmsaidalocacao;
   $old_value_datasaidalocacao = $this->datasaidalocacao;
   $old_value_horasaidalocacao = $this->horasaidalocacao;
   $old_value_dataretornolocacao = $this->dataretornolocacao;
   $old_value_horaretornolocacao = $this->horaretornolocacao;
   $old_value_kmretornolocacao = $this->kmretornolocacao;
   $old_value_qtddiarias = $this->qtddiarias;
   $old_value_descontolocacao = $this->descontolocacao;
   $old_value_valorliquidolocacao = $this->valorliquidolocacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlocacao = $this->idlocacao;
   $unformatted_value_kmsaidalocacao = $this->kmsaidalocacao;
   $unformatted_value_datasaidalocacao = $this->datasaidalocacao;
   $unformatted_value_horasaidalocacao = $this->horasaidalocacao;
   $unformatted_value_dataretornolocacao = $this->dataretornolocacao;
   $unformatted_value_horaretornolocacao = $this->horaretornolocacao;
   $unformatted_value_kmretornolocacao = $this->kmretornolocacao;
   $unformatted_value_qtddiarias = $this->qtddiarias;
   $unformatted_value_descontolocacao = $this->descontolocacao;
   $unformatted_value_valorliquidolocacao = $this->valorliquidolocacao;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idVeiculo, concat(modeloVeiculo,\" - \" , placaVeiculo) FROM tbveiculos WHERE (statusVeiculo = 1) AND idVeiculo = " . substr($this->Db->qstr($this->idfkveiculolocacao), 1, -1) . " ORDER BY modeloVeiculo, placaVeiculo";
   }
   else
   {
       $nm_comando = "SELECT idVeiculo, modeloVeiculo||\" - \"||placaVeiculo FROM tbveiculos WHERE (statusVeiculo = 1) AND idVeiculo = " . substr($this->Db->qstr($this->idfkveiculolocacao), 1, -1) . " ORDER BY modeloVeiculo, placaVeiculo";
   }

   $this->idlocacao = $old_value_idlocacao;
   $this->kmsaidalocacao = $old_value_kmsaidalocacao;
   $this->datasaidalocacao = $old_value_datasaidalocacao;
   $this->horasaidalocacao = $old_value_horasaidalocacao;
   $this->dataretornolocacao = $old_value_dataretornolocacao;
   $this->horaretornolocacao = $old_value_horaretornolocacao;
   $this->kmretornolocacao = $old_value_kmretornolocacao;
   $this->qtddiarias = $old_value_qtddiarias;
   $this->descontolocacao = $old_value_descontolocacao;
   $this->valorliquidolocacao = $old_value_valorliquidolocacao;

   if ('' != $this->idfkveiculolocacao && '' != $this->idfkveiculolocacao)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$idfkveiculolocacao_look = (isset($aLookup[0][$this->idfkveiculolocacao])) ? $aLookup[0][$this->idfkveiculolocacao] : $this->idfkveiculolocacao;
?>
<span id="id_read_on_idfkveiculolocacao" class="sc-ui-readonly-idfkveiculolocacao css_idfkveiculolocacao_line" style="<?php echo $sStyleReadLab_idfkveiculolocacao; ?>"><?php echo $idfkveiculolocacao_look; ?></span><span id="id_read_off_idfkveiculolocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_idfkveiculolocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_idfkveiculolocacao_obj" style="display: none;" id="id_sc_field_idfkveiculolocacao" type=text name="idfkveiculolocacao" value="<?php echo $this->form_encode_input($idfkveiculolocacao) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php
$aRecData['idfkveiculolocacao'] = $this->idfkveiculolocacao;
$aLookup = array();
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao'] = array(); 
    }

   $old_value_idlocacao = $this->idlocacao;
   $old_value_kmsaidalocacao = $this->kmsaidalocacao;
   $old_value_datasaidalocacao = $this->datasaidalocacao;
   $old_value_horasaidalocacao = $this->horasaidalocacao;
   $old_value_dataretornolocacao = $this->dataretornolocacao;
   $old_value_horaretornolocacao = $this->horaretornolocacao;
   $old_value_kmretornolocacao = $this->kmretornolocacao;
   $old_value_qtddiarias = $this->qtddiarias;
   $old_value_descontolocacao = $this->descontolocacao;
   $old_value_valorliquidolocacao = $this->valorliquidolocacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlocacao = $this->idlocacao;
   $unformatted_value_kmsaidalocacao = $this->kmsaidalocacao;
   $unformatted_value_datasaidalocacao = $this->datasaidalocacao;
   $unformatted_value_horasaidalocacao = $this->horasaidalocacao;
   $unformatted_value_dataretornolocacao = $this->dataretornolocacao;
   $unformatted_value_horaretornolocacao = $this->horaretornolocacao;
   $unformatted_value_kmretornolocacao = $this->kmretornolocacao;
   $unformatted_value_qtddiarias = $this->qtddiarias;
   $unformatted_value_descontolocacao = $this->descontolocacao;
   $unformatted_value_valorliquidolocacao = $this->valorliquidolocacao;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idVeiculo, concat(modeloVeiculo,\" - \" , placaVeiculo) FROM tbveiculos WHERE (statusVeiculo = 1) AND idVeiculo = " . substr($this->Db->qstr($this->idfkveiculolocacao), 1, -1) . " ORDER BY modeloVeiculo, placaVeiculo";
   }
   else
   {
       $nm_comando = "SELECT idVeiculo, modeloVeiculo||\" - \"||placaVeiculo FROM tbveiculos WHERE (statusVeiculo = 1) AND idVeiculo = " . substr($this->Db->qstr($this->idfkveiculolocacao), 1, -1) . " ORDER BY modeloVeiculo, placaVeiculo";
   }

   $this->idlocacao = $old_value_idlocacao;
   $this->kmsaidalocacao = $old_value_kmsaidalocacao;
   $this->datasaidalocacao = $old_value_datasaidalocacao;
   $this->horasaidalocacao = $old_value_horasaidalocacao;
   $this->dataretornolocacao = $old_value_dataretornolocacao;
   $this->horaretornolocacao = $old_value_horaretornolocacao;
   $this->kmretornolocacao = $old_value_kmretornolocacao;
   $this->qtddiarias = $old_value_qtddiarias;
   $this->descontolocacao = $old_value_descontolocacao;
   $this->valorliquidolocacao = $old_value_valorliquidolocacao;

   if ('' != $this->idfkveiculolocacao && '' != $this->idfkveiculolocacao)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['Lookup_idfkveiculolocacao'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->idfkveiculolocacao])) ? $aLookup[0][$this->idfkveiculolocacao] : '';
?>
<input type="text" id="id_ac_idfkveiculolocacao" name="idfkveiculolocacao_autocomp" class="scFormObjectOdd sc-ui-autocomp-idfkveiculolocacao css_idfkveiculolocacao_obj" size="30" value="<?php echo $sAutocompValue; ?>" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfkveiculolocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfkveiculolocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_idlocacao_dumb = ('' == $sStyleHidden_idlocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idlocacao_dumb" style="<?php echo $sStyleHidden_idlocacao_dumb; ?>"></TD>
<?php $sStyleHidden_idfkclientelocacao_dumb = ('' == $sStyleHidden_idfkclientelocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idfkclientelocacao_dumb" style="<?php echo $sStyleHidden_idfkclientelocacao_dumb; ?>"></TD>
<?php $sStyleHidden_idfkveiculolocacao_dumb = ('' == $sStyleHidden_idfkveiculolocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idfkveiculolocacao_dumb" style="<?php echo $sStyleHidden_idfkveiculolocacao_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kmsaidalocacao']))
    {
        $this->nm_new_label['kmsaidalocacao'] = "Km da Saída";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kmsaidalocacao = $this->kmsaidalocacao;
   $sStyleHidden_kmsaidalocacao = '';
   if (isset($this->nmgp_cmp_hidden['kmsaidalocacao']) && $this->nmgp_cmp_hidden['kmsaidalocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kmsaidalocacao']);
       $sStyleHidden_kmsaidalocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kmsaidalocacao = 'display: none;';
   $sStyleReadInp_kmsaidalocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kmsaidalocacao']) && $this->nmgp_cmp_readonly['kmsaidalocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kmsaidalocacao']);
       $sStyleReadLab_kmsaidalocacao = '';
       $sStyleReadInp_kmsaidalocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kmsaidalocacao']) && $this->nmgp_cmp_hidden['kmsaidalocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kmsaidalocacao" value="<?php echo $this->form_encode_input($kmsaidalocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kmsaidalocacao_line" id="hidden_field_data_kmsaidalocacao" style="<?php echo $sStyleHidden_kmsaidalocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kmsaidalocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kmsaidalocacao_label"><span id="id_label_kmsaidalocacao"><?php echo $this->nm_new_label['kmsaidalocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kmsaidalocacao"]) &&  $this->nmgp_cmp_readonly["kmsaidalocacao"] == "on") { 

 ?>
<input type="hidden" name="kmsaidalocacao" value="<?php echo $this->form_encode_input($kmsaidalocacao) . "\">" . $kmsaidalocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_kmsaidalocacao" class="sc-ui-readonly-kmsaidalocacao css_kmsaidalocacao_line" style="<?php echo $sStyleReadLab_kmsaidalocacao; ?>"><?php echo $this->form_encode_input($this->kmsaidalocacao); ?></span><span id="id_read_off_kmsaidalocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_kmsaidalocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_kmsaidalocacao_obj" style="" id="id_sc_field_kmsaidalocacao" type=text name="kmsaidalocacao" value="<?php echo $this->form_encode_input($kmsaidalocacao) ?>"
 size=20 alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['kmsaidalocacao']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['kmsaidalocacao']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kmsaidalocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kmsaidalocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['datasaidalocacao']))
    {
        $this->nm_new_label['datasaidalocacao'] = "Data da Saída";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $datasaidalocacao = $this->datasaidalocacao;
   $sStyleHidden_datasaidalocacao = '';
   if (isset($this->nmgp_cmp_hidden['datasaidalocacao']) && $this->nmgp_cmp_hidden['datasaidalocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datasaidalocacao']);
       $sStyleHidden_datasaidalocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datasaidalocacao = 'display: none;';
   $sStyleReadInp_datasaidalocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datasaidalocacao']) && $this->nmgp_cmp_readonly['datasaidalocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datasaidalocacao']);
       $sStyleReadLab_datasaidalocacao = '';
       $sStyleReadInp_datasaidalocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datasaidalocacao']) && $this->nmgp_cmp_hidden['datasaidalocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datasaidalocacao" value="<?php echo $this->form_encode_input($datasaidalocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_datasaidalocacao_line" id="hidden_field_data_datasaidalocacao" style="<?php echo $sStyleHidden_datasaidalocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datasaidalocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_datasaidalocacao_label"><span id="id_label_datasaidalocacao"><?php echo $this->nm_new_label['datasaidalocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datasaidalocacao"]) &&  $this->nmgp_cmp_readonly["datasaidalocacao"] == "on") { 

 ?>
<input type="hidden" name="datasaidalocacao" value="<?php echo $this->form_encode_input($datasaidalocacao) . "\">" . $datasaidalocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_datasaidalocacao" class="sc-ui-readonly-datasaidalocacao css_datasaidalocacao_line" style="<?php echo $sStyleReadLab_datasaidalocacao; ?>"><?php echo $this->form_encode_input($datasaidalocacao); ?></span><span id="id_read_off_datasaidalocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_datasaidalocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_datasaidalocacao_obj" style="" id="id_sc_field_datasaidalocacao" type=text name="datasaidalocacao" value="<?php echo $this->form_encode_input($datasaidalocacao) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['datasaidalocacao']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datasaidalocacao']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['datasaidalocacao']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datasaidalocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datasaidalocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['horasaidalocacao']))
    {
        $this->nm_new_label['horasaidalocacao'] = "Hora da Saída";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $horasaidalocacao = $this->horasaidalocacao;
   $sStyleHidden_horasaidalocacao = '';
   if (isset($this->nmgp_cmp_hidden['horasaidalocacao']) && $this->nmgp_cmp_hidden['horasaidalocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['horasaidalocacao']);
       $sStyleHidden_horasaidalocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_horasaidalocacao = 'display: none;';
   $sStyleReadInp_horasaidalocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['horasaidalocacao']) && $this->nmgp_cmp_readonly['horasaidalocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['horasaidalocacao']);
       $sStyleReadLab_horasaidalocacao = '';
       $sStyleReadInp_horasaidalocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['horasaidalocacao']) && $this->nmgp_cmp_hidden['horasaidalocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="horasaidalocacao" value="<?php echo $this->form_encode_input($horasaidalocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_horasaidalocacao_line" id="hidden_field_data_horasaidalocacao" style="<?php echo $sStyleHidden_horasaidalocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horasaidalocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_horasaidalocacao_label"><span id="id_label_horasaidalocacao"><?php echo $this->nm_new_label['horasaidalocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["horasaidalocacao"]) &&  $this->nmgp_cmp_readonly["horasaidalocacao"] == "on") { 

 ?>
<input type="hidden" name="horasaidalocacao" value="<?php echo $this->form_encode_input($horasaidalocacao) . "\">" . $horasaidalocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_horasaidalocacao" class="sc-ui-readonly-horasaidalocacao css_horasaidalocacao_line" style="<?php echo $sStyleReadLab_horasaidalocacao; ?>"><?php echo $this->form_encode_input($horasaidalocacao); ?></span><span id="id_read_off_horasaidalocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_horasaidalocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_horasaidalocacao_obj" style="" id="id_sc_field_horasaidalocacao" type=text name="horasaidalocacao" value="<?php echo $this->form_encode_input($horasaidalocacao) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['horasaidalocacao']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['horasaidalocacao']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['horasaidalocacao']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_horasaidalocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horasaidalocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_kmsaidalocacao_dumb = ('' == $sStyleHidden_kmsaidalocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_kmsaidalocacao_dumb" style="<?php echo $sStyleHidden_kmsaidalocacao_dumb; ?>"></TD>
<?php $sStyleHidden_datasaidalocacao_dumb = ('' == $sStyleHidden_datasaidalocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_datasaidalocacao_dumb" style="<?php echo $sStyleHidden_datasaidalocacao_dumb; ?>"></TD>
<?php $sStyleHidden_horasaidalocacao_dumb = ('' == $sStyleHidden_horasaidalocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_horasaidalocacao_dumb" style="<?php echo $sStyleHidden_horasaidalocacao_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dataretornolocacao']))
    {
        $this->nm_new_label['dataretornolocacao'] = "Data do Retorno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dataretornolocacao = $this->dataretornolocacao;
   $sStyleHidden_dataretornolocacao = '';
   if (isset($this->nmgp_cmp_hidden['dataretornolocacao']) && $this->nmgp_cmp_hidden['dataretornolocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dataretornolocacao']);
       $sStyleHidden_dataretornolocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dataretornolocacao = 'display: none;';
   $sStyleReadInp_dataretornolocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dataretornolocacao']) && $this->nmgp_cmp_readonly['dataretornolocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dataretornolocacao']);
       $sStyleReadLab_dataretornolocacao = '';
       $sStyleReadInp_dataretornolocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dataretornolocacao']) && $this->nmgp_cmp_hidden['dataretornolocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dataretornolocacao" value="<?php echo $this->form_encode_input($dataretornolocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dataretornolocacao_line" id="hidden_field_data_dataretornolocacao" style="<?php echo $sStyleHidden_dataretornolocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dataretornolocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dataretornolocacao_label"><span id="id_label_dataretornolocacao"><?php echo $this->nm_new_label['dataretornolocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dataretornolocacao"]) &&  $this->nmgp_cmp_readonly["dataretornolocacao"] == "on") { 

 ?>
<input type="hidden" name="dataretornolocacao" value="<?php echo $this->form_encode_input($dataretornolocacao) . "\">" . $dataretornolocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_dataretornolocacao" class="sc-ui-readonly-dataretornolocacao css_dataretornolocacao_line" style="<?php echo $sStyleReadLab_dataretornolocacao; ?>"><?php echo $this->form_encode_input($dataretornolocacao); ?></span><span id="id_read_off_dataretornolocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_dataretornolocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_dataretornolocacao_obj" style="" id="id_sc_field_dataretornolocacao" type=text name="dataretornolocacao" value="<?php echo $this->form_encode_input($dataretornolocacao) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['dataretornolocacao']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['dataretornolocacao']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['dataretornolocacao']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dataretornolocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dataretornolocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['horaretornolocacao']))
    {
        $this->nm_new_label['horaretornolocacao'] = "Hora do Retorno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $horaretornolocacao = $this->horaretornolocacao;
   $sStyleHidden_horaretornolocacao = '';
   if (isset($this->nmgp_cmp_hidden['horaretornolocacao']) && $this->nmgp_cmp_hidden['horaretornolocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['horaretornolocacao']);
       $sStyleHidden_horaretornolocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_horaretornolocacao = 'display: none;';
   $sStyleReadInp_horaretornolocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['horaretornolocacao']) && $this->nmgp_cmp_readonly['horaretornolocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['horaretornolocacao']);
       $sStyleReadLab_horaretornolocacao = '';
       $sStyleReadInp_horaretornolocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['horaretornolocacao']) && $this->nmgp_cmp_hidden['horaretornolocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="horaretornolocacao" value="<?php echo $this->form_encode_input($horaretornolocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_horaretornolocacao_line" id="hidden_field_data_horaretornolocacao" style="<?php echo $sStyleHidden_horaretornolocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_horaretornolocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_horaretornolocacao_label"><span id="id_label_horaretornolocacao"><?php echo $this->nm_new_label['horaretornolocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["horaretornolocacao"]) &&  $this->nmgp_cmp_readonly["horaretornolocacao"] == "on") { 

 ?>
<input type="hidden" name="horaretornolocacao" value="<?php echo $this->form_encode_input($horaretornolocacao) . "\">" . $horaretornolocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_horaretornolocacao" class="sc-ui-readonly-horaretornolocacao css_horaretornolocacao_line" style="<?php echo $sStyleReadLab_horaretornolocacao; ?>"><?php echo $this->form_encode_input($horaretornolocacao); ?></span><span id="id_read_off_horaretornolocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_horaretornolocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_horaretornolocacao_obj" style="" id="id_sc_field_horaretornolocacao" type=text name="horaretornolocacao" value="<?php echo $this->form_encode_input($horaretornolocacao) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['horaretornolocacao']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['horaretornolocacao']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['horaretornolocacao']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_horaretornolocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_horaretornolocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['kmretornolocacao']))
    {
        $this->nm_new_label['kmretornolocacao'] = "Km de Retorno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kmretornolocacao = $this->kmretornolocacao;
   $sStyleHidden_kmretornolocacao = '';
   if (isset($this->nmgp_cmp_hidden['kmretornolocacao']) && $this->nmgp_cmp_hidden['kmretornolocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kmretornolocacao']);
       $sStyleHidden_kmretornolocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kmretornolocacao = 'display: none;';
   $sStyleReadInp_kmretornolocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kmretornolocacao']) && $this->nmgp_cmp_readonly['kmretornolocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kmretornolocacao']);
       $sStyleReadLab_kmretornolocacao = '';
       $sStyleReadInp_kmretornolocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kmretornolocacao']) && $this->nmgp_cmp_hidden['kmretornolocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kmretornolocacao" value="<?php echo $this->form_encode_input($kmretornolocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kmretornolocacao_line" id="hidden_field_data_kmretornolocacao" style="<?php echo $sStyleHidden_kmretornolocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kmretornolocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kmretornolocacao_label"><span id="id_label_kmretornolocacao"><?php echo $this->nm_new_label['kmretornolocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kmretornolocacao"]) &&  $this->nmgp_cmp_readonly["kmretornolocacao"] == "on") { 

 ?>
<input type="hidden" name="kmretornolocacao" value="<?php echo $this->form_encode_input($kmretornolocacao) . "\">" . $kmretornolocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_kmretornolocacao" class="sc-ui-readonly-kmretornolocacao css_kmretornolocacao_line" style="<?php echo $sStyleReadLab_kmretornolocacao; ?>"><?php echo $this->form_encode_input($this->kmretornolocacao); ?></span><span id="id_read_off_kmretornolocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_kmretornolocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_kmretornolocacao_obj" style="" id="id_sc_field_kmretornolocacao" type=text name="kmretornolocacao" value="<?php echo $this->form_encode_input($kmretornolocacao) ?>"
 size=20 alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['kmretornolocacao']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['kmretornolocacao']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kmretornolocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kmretornolocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="3" height="20" class="scFormBlock" style="vertical-align: top">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="top" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;vertical-align: top; \" class=\"scFormBlockAlign\">"; } ?>Valores<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qtddiarias']))
    {
        $this->nm_new_label['qtddiarias'] = "Qtd Diárias";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qtddiarias = $this->qtddiarias;
   $sStyleHidden_qtddiarias = '';
   if (isset($this->nmgp_cmp_hidden['qtddiarias']) && $this->nmgp_cmp_hidden['qtddiarias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qtddiarias']);
       $sStyleHidden_qtddiarias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qtddiarias = 'display: none;';
   $sStyleReadInp_qtddiarias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qtddiarias']) && $this->nmgp_cmp_readonly['qtddiarias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qtddiarias']);
       $sStyleReadLab_qtddiarias = '';
       $sStyleReadInp_qtddiarias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qtddiarias']) && $this->nmgp_cmp_hidden['qtddiarias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qtddiarias" value="<?php echo $this->form_encode_input($qtddiarias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_qtddiarias_line" id="hidden_field_data_qtddiarias" style="<?php echo $sStyleHidden_qtddiarias; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qtddiarias_line" style="padding: 0px"><span class="scFormLabelOddFormat css_qtddiarias_label"><span id="id_label_qtddiarias"><?php echo $this->nm_new_label['qtddiarias']; ?></span></span><br><input type="hidden" name="qtddiarias" value="<?php echo $this->form_encode_input($qtddiarias); ?>"><span id="id_ajax_label_qtddiarias"><?php echo nl2br($qtddiarias); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qtddiarias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qtddiarias_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['descontolocacao']))
    {
        $this->nm_new_label['descontolocacao'] = "Desconto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descontolocacao = $this->descontolocacao;
   $sStyleHidden_descontolocacao = '';
   if (isset($this->nmgp_cmp_hidden['descontolocacao']) && $this->nmgp_cmp_hidden['descontolocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descontolocacao']);
       $sStyleHidden_descontolocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descontolocacao = 'display: none;';
   $sStyleReadInp_descontolocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descontolocacao']) && $this->nmgp_cmp_readonly['descontolocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descontolocacao']);
       $sStyleReadLab_descontolocacao = '';
       $sStyleReadInp_descontolocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descontolocacao']) && $this->nmgp_cmp_hidden['descontolocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descontolocacao" value="<?php echo $this->form_encode_input($descontolocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descontolocacao_line" id="hidden_field_data_descontolocacao" style="<?php echo $sStyleHidden_descontolocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descontolocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descontolocacao_label"><span id="id_label_descontolocacao"><?php echo $this->nm_new_label['descontolocacao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descontolocacao"]) &&  $this->nmgp_cmp_readonly["descontolocacao"] == "on") { 

 ?>
<input type="hidden" name="descontolocacao" value="<?php echo $this->form_encode_input($descontolocacao) . "\">" . $descontolocacao . ""; ?>
<?php } else { ?>
<span id="id_read_on_descontolocacao" class="sc-ui-readonly-descontolocacao css_descontolocacao_line" style="<?php echo $sStyleReadLab_descontolocacao; ?>"><?php echo $this->form_encode_input($this->descontolocacao); ?></span><span id="id_read_off_descontolocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_descontolocacao; ?>">
 <input class="sc-js-input scFormObjectOdd css_descontolocacao_obj" style="" id="id_sc_field_descontolocacao" type=text name="descontolocacao" value="<?php echo $this->form_encode_input($descontolocacao) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['descontolocacao']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['descontolocacao']['format_pos'] || 3 == $this->field_config['descontolocacao']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descontolocacao']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descontolocacao']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descontolocacao']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descontolocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descontolocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valorliquidolocacao']))
    {
        $this->nm_new_label['valorliquidolocacao'] = "Valor Total:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorliquidolocacao = $this->valorliquidolocacao;
   $sStyleHidden_valorliquidolocacao = '';
   if (isset($this->nmgp_cmp_hidden['valorliquidolocacao']) && $this->nmgp_cmp_hidden['valorliquidolocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorliquidolocacao']);
       $sStyleHidden_valorliquidolocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorliquidolocacao = 'display: none;';
   $sStyleReadInp_valorliquidolocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorliquidolocacao']) && $this->nmgp_cmp_readonly['valorliquidolocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorliquidolocacao']);
       $sStyleReadLab_valorliquidolocacao = '';
       $sStyleReadInp_valorliquidolocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorliquidolocacao']) && $this->nmgp_cmp_hidden['valorliquidolocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorliquidolocacao" value="<?php echo $this->form_encode_input($valorliquidolocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valorliquidolocacao_line" id="hidden_field_data_valorliquidolocacao" style="<?php echo $sStyleHidden_valorliquidolocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorliquidolocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valorliquidolocacao_label"><span id="id_label_valorliquidolocacao"><?php echo $this->nm_new_label['valorliquidolocacao']; ?></span></span><br><input type="hidden" name="valorliquidolocacao" value="<?php echo $this->form_encode_input($valorliquidolocacao); ?>"><span id="id_ajax_label_valorliquidolocacao"><?php echo nl2br($valorliquidolocacao); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorliquidolocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorliquidolocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_qtddiarias_dumb = ('' == $sStyleHidden_qtddiarias) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_qtddiarias_dumb" style="<?php echo $sStyleHidden_qtddiarias_dumb; ?>"></TD>
<?php $sStyleHidden_descontolocacao_dumb = ('' == $sStyleHidden_descontolocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_descontolocacao_dumb" style="<?php echo $sStyleHidden_descontolocacao_dumb; ?>"></TD>
<?php $sStyleHidden_valorliquidolocacao_dumb = ('' == $sStyleHidden_valorliquidolocacao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valorliquidolocacao_dumb" style="<?php echo $sStyleHidden_valorliquidolocacao_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Multas e Avarias<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['multasavarias']))
    {
        $this->nm_new_label['multasavarias'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $multasavarias = $this->multasavarias;
   $sStyleHidden_multasavarias = '';
   if (isset($this->nmgp_cmp_hidden['multasavarias']) && $this->nmgp_cmp_hidden['multasavarias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['multasavarias']);
       $sStyleHidden_multasavarias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_multasavarias = 'display: none;';
   $sStyleReadInp_multasavarias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['multasavarias']) && $this->nmgp_cmp_readonly['multasavarias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['multasavarias']);
       $sStyleReadLab_multasavarias = '';
       $sStyleReadInp_multasavarias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['multasavarias']) && $this->nmgp_cmp_hidden['multasavarias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="multasavarias" value="<?php echo $this->form_encode_input($multasavarias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_multasavarias_line" id="hidden_field_data_multasavarias" style="<?php echo $sStyleHidden_multasavarias; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_multasavarias_line" style="vertical-align: top;padding: 0px">
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['foreign_key']['idfklocacao'] = $this->nmgp_dados_form['idlocacao'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['where_filter'] = "idFKlocacao = " . $this->nmgp_dados_form['idlocacao'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['where_detal']  = "idFKlocacao = " . $this->nmgp_dados_form['idlocacao'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbmultasAvarias']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_tblocacao_editar_empty.htm' : $this->Ini->link_form_tbmultasAvarias_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_tbmultasAvarias"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_tbmultasAvarias"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_multasavarias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_multasavarias_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Observações<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obslocacao']))
    {
        $this->nm_new_label['obslocacao'] = "Observação";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obslocacao = $this->obslocacao;
   $sStyleHidden_obslocacao = '';
   if (isset($this->nmgp_cmp_hidden['obslocacao']) && $this->nmgp_cmp_hidden['obslocacao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obslocacao']);
       $sStyleHidden_obslocacao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obslocacao = 'display: none;';
   $sStyleReadInp_obslocacao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obslocacao']) && $this->nmgp_cmp_readonly['obslocacao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obslocacao']);
       $sStyleReadLab_obslocacao = '';
       $sStyleReadInp_obslocacao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obslocacao']) && $this->nmgp_cmp_hidden['obslocacao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obslocacao" value="<?php echo $this->form_encode_input($obslocacao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_obslocacao_line" id="hidden_field_data_obslocacao" style="<?php echo $sStyleHidden_obslocacao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obslocacao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_obslocacao_label"><span id="id_label_obslocacao"><?php echo $this->nm_new_label['obslocacao']; ?></span></span><br>
<?php
$obslocacao_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obslocacao));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obslocacao"]) &&  $this->nmgp_cmp_readonly["obslocacao"] == "on") { 

 ?>
<input type="hidden" name="obslocacao" value="<?php echo $this->form_encode_input($obslocacao) . "\">" . $obslocacao_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obslocacao" class="sc-ui-readonly-obslocacao css_obslocacao_line" style="<?php echo $sStyleReadLab_obslocacao; ?>"><?php echo $this->form_encode_input($obslocacao_val); ?></span><span id="id_read_off_obslocacao" style="white-space: nowrap;<?php echo $sStyleReadInp_obslocacao; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_obslocacao_obj" style="white-space: pre-wrap;" name="obslocacao" id="id_sc_field_obslocacao" rows="2" cols="130"
 alt="{datatype: 'text', maxLength: 1000, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $obslocacao; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obslocacao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obslocacao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['masterValue']);
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
 parent.scAjaxDetailStatus("form_tblocacao_editar");
 parent.scAjaxDetailHeight("form_tblocacao_editar", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_tblocacao_editar", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tblocacao_editar", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tblocacao_editar']['sc_modal'])
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
