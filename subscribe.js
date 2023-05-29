const form = document.forms["subscribe-form"];
const user = document.forms["subscribe-form"].username;
const nome = document.forms["subscribe-form"].nome;
const surname = document.forms["subscribe-form"].cognome;
const email = document.forms["subscribe-form"].email;
const password = document.forms["subscribe-form"].password;
const r_password = document.forms["subscribe-form"].rpassword;
const privacy = document.forms["subscribe-form"].privacy;
const p = document.querySelectorAll('.adv');
const subok = document.querySelector('#submitok')
const overlay= document.querySelector('#overlay')
const data=document.querySelectorAll('.data');
user.addEventListener("blur", checkuser);
nome.addEventListener("blur", emptyname);
surname.addEventListener("blur", emptysurname);
email.addEventListener("blur", checkemail);
password.addEventListener("blur", checkpassword);
r_password.addEventListener("blur", checkpassword);
privacy.addEventListener("change", removeadvprivacy);
privacy.addEventListener("blur", removeadvprivacy);
form.addEventListener("submit",form_ok);

for (const i of data){
    i.addEventListener("focusin",empty_err) 
}

function checkuser(event){
    p[0].innerHTML="";
    p[0].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[0].classList.add('error')
        p[0].textContent= "Campo username vuoto";
    } else if 
        (!event.currentTarget.value.match(/^[a-z0-9]+$/i)){;
        p[0].classList.add('error')
        p[0].textContent = "Username non valido";
    }else
    check_user_db();

}

function emptyname(event){
    p[1].innerHTML="";
    p[1].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[1].classList.add('error')
        p[1].textContent = "Campo nome vuoto"; 
    }
}
    
function emptysurname(event){
    p[2].innerHTML="";
    p[2].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[2].classList.add('error');
        p[2].textContent = "Campo cognome vuoto"
    } 
}
    
function checkemail(event){
    p[3].innerHTML="";
    p[3].classList.remove('error');
    if (event.currentTarget.value.length === 0) {
        p[3].classList.add('error')
        p[3].textContent = "Campo email vuoto";
    }else if
        (!event.currentTarget.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)){  
        p[3].classList.add('error')
        p[3].textContent = "Email non valida";}
    else 
    check_email_db();
}
    
function checkpassword(event){
    p[4].innerHTML="";
    p[4].classList.remove('error');
    p[5].innerHTML="";
    p[5].classList.remove('error');

    if (event.currentTarget.value.length < 7){
        p[4].classList.add('error')
        p[4].textContent = "Deve contenere almeno 8 caratteri";
    } 
    if (password.value !== r_password.value){
        p[5].classList.add('error')
        p[5].textContent = "La password non coincidono";
    } 
}

function removeadvprivacy(event){

    if (privacy.checked){
        p[6].innerHTML='';
        p[6].classList.remove('error');
        return true
    }else
        {
        p[6].classList.add('error')
        p[6].textContent = "Informativa sulla privacy non accettata";      
    }
}

function check_user_db(){

    const form_data ={
        method: 'post',
        body: new FormData(form)
        }
        fetch("http://localhost/HW1/SCRIPT/user_search.php",form_data).then(user_exist).then(user_error);
    }
    
function user_exist(error_user){
        return error_user.json(); 
    }
    
function user_error(text_user_error){
    if (text_user_error.error){
        p[0].classList.add('error');
        p[0].textContent = text_user_error.text;
    }
    
}

function check_email_db(){
    const form_data ={
        method: 'post',
        body: new FormData(form)
        }
        fetch("http://localhost/HW1/SCRIPT/email_search.php",form_data).then(email_exist).then(email_error); 
    }

function email_exist(error_mail){
        return error_mail.json(); 
    }

function email_error(text_email_error){
    if(text_email_error.error){
        p[3].classList.add('error');
        p[3].textContent = text_email_error.text; 
    }   
}

function data_full(){
    for (const i of data){
        if (i.value.length===0) 
            return true
    }

}
function form_ok(event){
    event.preventDefault();
    const num_error = document.querySelectorAll('.error')
        if ((num_error.length === 0) && (!data_full()) && privacy.checked)
            sub_fetch();

}

function sub_fetch(){
    const formdata = new FormData(form);
    const get = {
        method: 'post',
        body: formdata
    }
   
    fetch('./SCRIPT/fetch_insert_user.php', get).then(response).then(insertuser)   
}

function response(user){
    
    return user.json()
}

function insertuser(ok_sub){
    if (ok_sub.value === true){
        
        const success = document.createElement('p')
        const login = document.createElement('a')
        success.textContent=ok_sub.text;
        login.href ='login.php';
        login.textContent="Accedi";
        subok.appendChild(success);
        success.appendChild(login);
        overlay.classList.add('overlay-index');
        subok.classList.add('submit-index');
        user.value="";
        nome.value="";
        surname.value="";
        email.value="";
        password.value="";
        r_password.value="";
        privacy.checked= false;
    }else {
        const unsuccess = document.createElement('p')
        unsuccess.textContent=ok_sub.text;
        subok.appendChild(unsuccess);
    }
}

function empty_err() {
    subok.innerHTML=""
}
    