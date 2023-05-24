
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["idcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nomecliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["enderecocliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkestadocliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkcidadecliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fonecliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fone2cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["datanasc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["redesocial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["numcnhcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["validadecnhcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cpfcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rgcliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["expedrg" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkufexpedrg" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["imgcnh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomecliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomecliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enderecocliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enderecocliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkestadocliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkestadocliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkcidadecliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkcidadecliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fonecliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fonecliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fone2cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fone2cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["datanasc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datanasc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["redesocial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["redesocial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcnhcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcnhcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["validadecnhcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["validadecnhcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpfcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpfcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rgcliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rgcliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["expedrg" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["expedrg" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkufexpedrg" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkufexpedrg" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idfkestadocliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idfkcidadecliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("expedrg" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idfkufexpedrg" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idcliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_idcliente_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbclientes_idcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_enderecocliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_enderecocliente_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbclientes_enderecocliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomecliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_nomecliente_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbclientes_nomecliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_redesocial' + iSeqRow).bind('blur', function() { sc_form_tbclientes_redesocial_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbclientes_redesocial_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkcidadecliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_idfkcidadecliente_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbclientes_idfkcidadecliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkestadocliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_idfkestadocliente_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_tbclientes_idfkestadocliente_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbclientes_idfkestadocliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_fonecliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_fonecliente_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbclientes_fonecliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_fone2cliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_fone2cliente_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbclientes_fone2cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcnhcliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_numcnhcliente_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbclientes_numcnhcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_validadecnhcliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_validadecnhcliente_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tbclientes_validadecnhcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpfcliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_cpfcliente_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbclientes_cpfcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_rgcliente' + iSeqRow).bind('blur', function() { sc_form_tbclientes_rgcliente_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbclientes_rgcliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_expedrg' + iSeqRow).bind('blur', function() { sc_form_tbclientes_expedrg_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbclientes_expedrg_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkufexpedrg' + iSeqRow).bind('blur', function() { sc_form_tbclientes_idfkufexpedrg_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbclientes_idfkufexpedrg_onfocus(this, iSeqRow) });
  $('#id_sc_field_imgcnh' + iSeqRow).bind('blur', function() { sc_form_tbclientes_imgcnh_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbclientes_imgcnh_onfocus(this, iSeqRow) });
  $('#id_sc_field_datanasc' + iSeqRow).bind('blur', function() { sc_form_tbclientes_datanasc_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbclientes_datanasc_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbclientes_idcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_idcliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_idcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_enderecocliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_enderecocliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_enderecocliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_nomecliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_nomecliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_nomecliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_redesocial_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_redesocial();
  scCssBlur(oThis);
}

function sc_form_tbclientes_redesocial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_idfkcidadecliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_idfkcidadecliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_idfkcidadecliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_idfkestadocliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_idfkestadocliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_idfkestadocliente_onchange(oThis, iSeqRow) {
  do_ajax_form_tbclientes_refresh_idfkestadocliente();
}

function sc_form_tbclientes_idfkestadocliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_fonecliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_fonecliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_fonecliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_fone2cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_fone2cliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_fone2cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_numcnhcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_numcnhcliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_numcnhcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_validadecnhcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_validadecnhcliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_validadecnhcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_cpfcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_cpfcliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_cpfcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_rgcliente_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_rgcliente();
  scCssBlur(oThis);
}

function sc_form_tbclientes_rgcliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_expedrg_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_expedrg();
  scCssBlur(oThis);
}

function sc_form_tbclientes_expedrg_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_idfkufexpedrg_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_idfkufexpedrg();
  scCssBlur(oThis);
}

function sc_form_tbclientes_idfkufexpedrg_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclientes_imgcnh_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbclientes_imgcnh_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbclientes_datanasc_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclientes_validate_datanasc();
  scCssBlur(oThis);
}

function sc_form_tbclientes_datanasc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_datanasc" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_datanasc" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['datanasc']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_validadecnhcliente" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_validadecnhcliente" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['validadecnhcliente']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_imgcnh" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbclientes_ul_save.php",
    dropZone: $("#hidden_field_data_imgcnh" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'imgcnh'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imgcnh" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imgcnh" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_imgcnh" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imgcnh" + iSeqRow).hide();
      }
      if (fileData && fileData[0] && fileData[0].error && "acceptFileTypes" == fileData[0].error) {
        oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl']; ?>"};
        scAjaxShowDebug(oTemp);
        return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      $("#id_sc_field_imgcnh" + iSeqRow).val("");
      $("#id_sc_field_imgcnh_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imgcnh_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_imgcnh = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imgcnh) ? "none" : "";
      $("#id_ajax_img_imgcnh" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imgcnh" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imgcnh) {
        document.F1.temp_out_imgcnh.value = var_ajax_img_thumb;
        document.F1.temp_out1_imgcnh.value = var_ajax_img_imgcnh;
      }
      else if (document.F1.temp_out_imgcnh) {
        document.F1.temp_out_imgcnh.value = var_ajax_img_imgcnh;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imgcnh" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imgcnh" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imgcnh" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imgcnh" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

