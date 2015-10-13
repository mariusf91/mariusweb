$( document ).ready(function() {
    var loadingGray = $("#div-loading-gray");
    var loadingSymbol = $("#div-loading");
    var btnRegister = $("#btn-register");
    var btnLogin = $("#btn-login");

    loadingGray.hide();
    loadingSymbol.hide();

    btnLogin.click(function() {
        loadingGray.fadeIn(500);
        loadingSymbol.fadeIn(250);
    });

    btnRegister.click(function() {
        window.location.replace('http://www.mariusweb.net/register');
    });
});

function displayAlert(title, text, timer, type){
    swal({
        title: title,
        text: text,
        timer: timer,
        showConfirmButton: false,
        type: type
    })
}