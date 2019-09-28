window.app = new APP();
window.APP = APP;

APP.prototype.autoCloseAlert = function () {
    $('.alert-success').delay(2500).slideUp(300);
    $('.alert-danger').delay(3500).slideUp(300);
    $('.alert-warning').delay(2500).slideUp(300);
};

$(document).ready(function () {
    app.autoCloseAlert();
});
