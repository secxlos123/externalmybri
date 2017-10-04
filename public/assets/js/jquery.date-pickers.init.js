jQuery(document).ready(function () {
    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        format: "dd-MM-yyyy",
        clearBtn: true,
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#datepicker-year').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        clearBtn: true,
        autoclose: true
    });
    jQuery('#datepicker-inline').datepicker();
    jQuery('#datepicker-multiple-date').datepicker({
        format: "mm/dd/yyyy",
        clearBtn: true,
        multidate: true,
        multidateSeparator: ","
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('.datepicker-mindate').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        multidate: true,
        startDate: new Date(),
        multidateSeparator: ","
    });
});