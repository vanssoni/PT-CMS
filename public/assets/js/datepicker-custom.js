// this file contain all the date pickers added to the system
!(function (t) {
    "use strict";
    function e() {}
    (e.prototype.init = function () {
        t(".datepicker-default").flatpickr();
        t(".datepicker-default-max-today").flatpickr({
            maxDate: "today" 
        });
    }),
        (t.FormPickers = new e()),
        (t.FormPickers.Constructor = e);
})(window.jQuery),
(function () {
    "use strict";
    window.jQuery.FormPickers.init();
})();
