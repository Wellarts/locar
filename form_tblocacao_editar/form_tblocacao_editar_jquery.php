
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
    scSetFocusOnField($("#id_ac_" + sField));
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
  scEventControl_data["idlocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkclientelocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkveiculolocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["kmsaidalocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["datasaidalocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["horasaidalocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dataretornolocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["horaretornolocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["kmretornolocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qtddiarias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["descontolocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valorliquidolocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["multasavarias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["obslocacao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idlocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idlocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkclientelocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkclientelocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkveiculolocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkveiculolocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kmsaidalocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kmsaidalocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["datasaidalocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datasaidalocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["horasaidalocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["horasaidalocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dataretornolocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dataretornolocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["horaretornolocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["horaretornolocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kmretornolocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kmretornolocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qtddiarias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qtddiarias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descontolocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descontolocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorliquidolocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorliquidolocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["multasavarias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["multasavarias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obslocacao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obslocacao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkclientelocacao" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["idfkveiculolocacao" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  if ("dataretornolocacao" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("descontolocacao" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("idfkclientelocacao" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("idfkveiculolocacao" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("qtddiarias" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("valorbrutolocacao" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idlocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_idlocacao_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tblocacao_editar_idlocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkclientelocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_idfkclientelocacao_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_tblocacao_editar_idfkclientelocacao_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tblocacao_editar_idfkclientelocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkveiculolocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_idfkveiculolocacao_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_tblocacao_editar_idfkveiculolocacao_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tblocacao_editar_idfkveiculolocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_datasaidalocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_datasaidalocacao_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tblocacao_editar_datasaidalocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_horasaidalocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_horasaidalocacao_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tblocacao_editar_horasaidalocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_kmsaidalocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_kmsaidalocacao_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tblocacao_editar_kmsaidalocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_dataretornolocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_dataretornolocacao_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_tblocacao_editar_dataretornolocacao_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tblocacao_editar_dataretornolocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_horaretornolocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_horaretornolocacao_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tblocacao_editar_horaretornolocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_kmretornolocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_kmretornolocacao_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tblocacao_editar_kmretornolocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_qtddiarias' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_qtddiarias_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tblocacao_editar_qtddiarias_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tblocacao_editar_qtddiarias_onfocus(this, iSeqRow) });
  $('#id_sc_field_descontolocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_descontolocacao_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_tblocacao_editar_descontolocacao_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tblocacao_editar_descontolocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorliquidolocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_valorliquidolocacao_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_tblocacao_editar_valorliquidolocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_obslocacao' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_obslocacao_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tblocacao_editar_obslocacao_onfocus(this, iSeqRow) });
  $('#id_sc_field_multasavarias' + iSeqRow).bind('blur', function() { sc_form_tblocacao_editar_multasavarias_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tblocacao_editar_multasavarias_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tblocacao_editar_idlocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_idlocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_idlocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_idfkclientelocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_idfkclientelocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_idfkclientelocacao_onchange(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_event_idfkclientelocacao_onchange();
}

function sc_form_tblocacao_editar_idfkclientelocacao_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_idfkveiculolocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_idfkveiculolocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_idfkveiculolocacao_onchange(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_event_idfkveiculolocacao_onchange();
}

function sc_form_tblocacao_editar_idfkveiculolocacao_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_datasaidalocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_datasaidalocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_datasaidalocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_horasaidalocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_horasaidalocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_horasaidalocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_kmsaidalocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_kmsaidalocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_kmsaidalocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_dataretornolocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_dataretornolocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_dataretornolocacao_onchange(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_event_dataretornolocacao_onchange();
}

function sc_form_tblocacao_editar_dataretornolocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_horaretornolocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_horaretornolocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_horaretornolocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_kmretornolocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_kmretornolocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_kmretornolocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_qtddiarias_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_qtddiarias();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_qtddiarias_onchange(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_event_qtddiarias_onchange();
}

function sc_form_tblocacao_editar_qtddiarias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_descontolocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_descontolocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_descontolocacao_onchange(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_event_descontolocacao_onchange();
}

function sc_form_tblocacao_editar_descontolocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_valorliquidolocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_valorliquidolocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_valorliquidolocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_obslocacao_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_obslocacao();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_obslocacao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblocacao_editar_multasavarias_onblur(oThis, iSeqRow) {
  do_ajax_form_tblocacao_editar_validate_multasavarias();
  scCssBlur(oThis);
}

function sc_form_tblocacao_editar_multasavarias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_datasaidalocacao" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_datasaidalocacao" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['datasaidalocacao']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_dataretornolocacao" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dataretornolocacao" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['dataretornolocacao']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

