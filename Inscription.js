// var password = document.getElementById("passwd")
//     , confirm_password = document.getElementById("passwdVerif");
//
// function validatePassword(){
//     if(password.value != confirm_password.value) {
//         confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
//     } else {
//         confirm_password.setCustomValidity('');
//     }
// }
//
// password.onchange = validatePassword;
// confirm_password.onkeyup = validatePassword;

var email = document.getElementById("email")
    , verif_email = document.getElementById("emailVerif");

function validateEmail() {
    if (email.value != verif_email.value){
        verif_email.setCustomValidity("Les adresses mail ne correspondent pas");
    } else {
        verif_email.setCustomValidity('');
    }
}

email.onchange = validateEmail;
verif_email.onkeyup = validateEmail;