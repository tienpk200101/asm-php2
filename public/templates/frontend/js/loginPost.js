var CORRECT_EMAIL = 'tienpk@gmail.com'
var CORRECT_PASS = '123456'
document.querySelector('input[name=email]').disabled = true
// var email = document.querySelector('input[name=email]');
// email.disabled = true;
var pass = document.querySelector('input[name=password]');

var formLogin = document.querySelector('#login');
formLogin.addEventListener('submit', onFormSubmit);


function onFormSubmit(e) {
    if(email == CORRECT_EMAIL && pass == CORRECT_PASS) {
        alert("Đăng nhập thành công");
    }
    else {
        alert("Đăng nhập thất bại");
    }
}