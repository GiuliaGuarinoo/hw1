const form = document.forms["subscribe-form"];
const user = document.forms["subscribe-form"].username;
const password = document.forms["subscribe-form"].password;
const p = document.querySelectorAll('.adv');

user.addEventListener("blur",checkuser);
password.addEventListener("blur",checkpassword);
form.addEventListener("submit",field_ok);

function checkuser(event){
    p[0].innerHTML="";
    p[0].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[0].classList.add('error')
        p[0].textContent= "Campo username vuoto";}
}

function checkpassword(event){
    p[1].innerHTML="";
    p[1].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[1].classList.add('error')
        p[1].textContent= "Campo password vuoto";
    }
}

function field_ok(event){  
    const num_error = document.querySelectorAll('.error');
    if (num_error.length > 0)
        event.preventDefault()
}       
