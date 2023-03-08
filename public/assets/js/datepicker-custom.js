// this file contain all the date pickers added to the system

$(document).on('ready', function(){
    $(".datepicker-default").datepicker({
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        changeMonth: true,
        changeYear: true,
        onChangeMonthYear: function(year, month) {
          var selectedMonth = month;
          var selectedYear = year;
          $(this).datepicker("setDate", year + "-"+month+"-" + month);
        },
        yearRange: "-100:+100",
        dateFormat: "yy-mm-dd"
        // dateFormat: 'YYYY-mm-dd',
    });
});