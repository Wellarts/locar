
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
  scEventControl_data["idcontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idfkcredorcontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["qtdparcelascontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["datavencimentocontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["diasaviso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valorcontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ordemparcelacontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["datapagamentocontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valorpagocontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["quitadocontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["obscontaspagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idcontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfkcredorcontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfkcredorcontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qtdparcelascontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qtdparcelascontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["datavencimentocontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datavencimentocontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diasaviso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diasaviso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorcontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorcontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ordemparcelacontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ordemparcelacontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["datapagamentocontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datapagamentocontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpagocontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpagocontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["quitadocontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["quitadocontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obscontaspagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obscontaspagar" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idfkcredorcontaspagar" + iSeq == fieldName) {
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
  $('#id_sc_field_idcontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_idcontaspagar_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbcontasPagar_idcontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfkcredorcontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_idfkcredorcontaspagar_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_tbcontasPagar_idfkcredorcontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_datavencimentocontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_datavencimentocontaspagar_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_tbcontasPagar_datavencimentocontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_datapagamentocontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_datapagamentocontaspagar_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_tbcontasPagar_datapagamentocontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorcontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_valorcontaspagar_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbcontasPagar_valorcontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpagocontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_valorpagocontaspagar_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_tbcontasPagar_valorpagocontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_qtdparcelascontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_qtdparcelascontaspagar_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_tbcontasPagar_qtdparcelascontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_ordemparcelacontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_ordemparcelacontaspagar_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_tbcontasPagar_ordemparcelacontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_quitadocontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_quitadocontaspagar_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tbcontasPagar_quitadocontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_obscontaspagar' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_obscontaspagar_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbcontasPagar_obscontaspagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_diasaviso' + iSeqRow).bind('blur', function() { sc_form_tbcontasPagar_diasaviso_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbcontasPagar_diasaviso_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbcontasPagar_idcontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_idcontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_idcontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_idfkcredorcontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_idfkcredorcontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_idfkcredorcontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_datavencimentocontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_datavencimentocontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_datavencimentocontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_datapagamentocontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_datapagamentocontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_datapagamentocontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_valorcontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_valorcontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_valorcontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_valorpagocontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_valorpagocontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_valorpagocontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_qtdparcelascontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_qtdparcelascontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_qtdparcelascontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_ordemparcelacontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_ordemparcelacontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_ordemparcelacontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_quitadocontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_quitadocontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_quitadocontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_obscontaspagar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_obscontaspagar();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_obscontaspagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbcontasPagar_diasaviso_onblur(oThis, iSeqRow) {
  do_ajax_form_tbcontasPagar_validate_diasaviso();
  scCssBlur(oThis);
}

function sc_form_tbcontasPagar_diasaviso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_datavencimentocontaspagar" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_datavencimentocontaspagar" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['datavencimentocontaspagar']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

  $("#id_sc_field_datapagamentocontaspagar" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_datapagamentocontaspagar" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['datapagamentocontaspagar']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

