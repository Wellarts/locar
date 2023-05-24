
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
  scEventControl_data["idveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkmarcaveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["modeloveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["anoveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["placaveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["corveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valordiaria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["datacompraveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["kmatualveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["chassiveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["proxtrocaoleoveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["proxtrocafiltroveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["avisotrocaoleoveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["avisotrocafiltroveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["proxtrocacorreiaveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["proxtrocapastilhaveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["avisotrocacorreiaveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["avisotrocapastilhaveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["statusveiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkmarcaveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkmarcaveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modeloveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modeloveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anoveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anoveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placaveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placaveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["corveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["corveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valordiaria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valordiaria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["datacompraveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datacompraveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kmatualveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kmatualveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["chassiveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["chassiveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proxtrocaoleoveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proxtrocaoleoveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proxtrocafiltroveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proxtrocafiltroveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["avisotrocaoleoveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["avisotrocaoleoveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["avisotrocafiltroveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["avisotrocafiltroveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proxtrocacorreiaveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proxtrocacorreiaveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proxtrocapastilhaveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proxtrocapastilhaveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["avisotrocacorreiaveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["avisotrocacorreiaveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["avisotrocapastilhaveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["avisotrocapastilhaveiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statusveiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statusveiculo" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idfkmarcaveiculo" + iSeq == fieldName) {
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
  $('#id_sc_field_idveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_idveiculo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbveiculos_idveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkmarcaveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_idfkmarcaveiculo_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbveiculos_idfkmarcaveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_modeloveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_modeloveiculo_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbveiculos_modeloveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_anoveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_anoveiculo_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbveiculos_anoveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_placaveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_placaveiculo_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbveiculos_placaveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_corveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_corveiculo_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbveiculos_corveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_kmatualveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_kmatualveiculo_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbveiculos_kmatualveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_valordiaria' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_valordiaria_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbveiculos_valordiaria_onfocus(this, iSeqRow) });
  $('#id_sc_field_proxtrocaoleoveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_proxtrocaoleoveiculo_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_tbveiculos_proxtrocaoleoveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_proxtrocafiltroveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_proxtrocafiltroveiculo_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_tbveiculos_proxtrocafiltroveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_avisotrocaoleoveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_avisotrocaoleoveiculo_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_tbveiculos_avisotrocaoleoveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_avisotrocafiltroveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_avisotrocafiltroveiculo_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_tbveiculos_avisotrocafiltroveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_chassiveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_chassiveiculo_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbveiculos_chassiveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_datacompraveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_datacompraveiculo_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbveiculos_datacompraveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_statusveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_statusveiculo_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbveiculos_statusveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_proxtrocacorreiaveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_proxtrocacorreiaveiculo_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_tbveiculos_proxtrocacorreiaveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_proxtrocapastilhaveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_proxtrocapastilhaveiculo_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_tbveiculos_proxtrocapastilhaveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_avisotrocacorreiaveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_avisotrocacorreiaveiculo_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_tbveiculos_avisotrocacorreiaveiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_avisotrocapastilhaveiculo' + iSeqRow).bind('blur', function() { sc_form_tbveiculos_avisotrocapastilhaveiculo_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_tbveiculos_avisotrocapastilhaveiculo_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbveiculos_idveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_idveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_idveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_idfkmarcaveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_idfkmarcaveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_idfkmarcaveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_modeloveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_modeloveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_modeloveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_anoveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_anoveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_anoveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_placaveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_placaveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_placaveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_corveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_corveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_corveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_kmatualveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_kmatualveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_kmatualveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_valordiaria_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_valordiaria();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_valordiaria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_proxtrocaoleoveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_proxtrocaoleoveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_proxtrocaoleoveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_proxtrocafiltroveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_proxtrocafiltroveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_proxtrocafiltroveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_avisotrocaoleoveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_avisotrocaoleoveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_avisotrocaoleoveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_avisotrocafiltroveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_avisotrocafiltroveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_avisotrocafiltroveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_chassiveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_chassiveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_chassiveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_datacompraveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_datacompraveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_datacompraveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_statusveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_statusveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_statusveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_proxtrocacorreiaveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_proxtrocacorreiaveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_proxtrocacorreiaveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_proxtrocapastilhaveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_proxtrocapastilhaveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_proxtrocapastilhaveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_avisotrocacorreiaveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_avisotrocacorreiaveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_avisotrocacorreiaveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbveiculos_avisotrocapastilhaveiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbveiculos_mob_validate_avisotrocapastilhaveiculo();
  scCssBlur(oThis);
}

function sc_form_tbveiculos_avisotrocapastilhaveiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_datacompraveiculo" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_datacompraveiculo" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['datacompraveiculo']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
