const form = document.forms["insert-form"];
const isbn = document.forms["insert-form"].isbn;
const title = document.forms["insert-form"].title;
const author = document.forms["insert-form"].author;
const language= document.forms["insert-form"].language;
const where = document.forms["insert-form"].where;
const provincia = document.forms["insert-form"].provincia;
const button =document.forms["insert-form"].button;
const result = document.querySelector('#submitok');
const modal =document.forms['form-modal-view'];
const submit =document.forms["form-modal-view"].submit;
const btn_no =document.forms["form-modal-view"].btn_no;
const section = document.querySelector('section');
const p = document.querySelectorAll('.adv');
const num_error = document.querySelectorAll('.error')
const modal_page = document.querySelector('.modal-page');
const body = document.querySelector('body');
const ans = document.querySelector('#ans');
const exit_modal = document.querySelector('#exit');

isbn.addEventListener("blur", checkisbn);
title.addEventListener("blur", checktitle);
author.addEventListener("blur", checkautor);
language.addEventListener("blur", checklanguage);
where.addEventListener("blur", checkwhere);
button.addEventListener("click",form_ok);
btn_no.addEventListener("click",no_modal);
exit_modal.addEventListener("click",no_modal);
modal.addEventListener("submit",send_data);

function checkisbn(event){
    p[0].innerHTML="";
    p[0].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[0].classList.add('error');
        p[0].textContent= "Campo ISBN vuoto";}
    else if((event.currentTarget.value.length < 10)||isNaN(event.currentTarget.value)|| (event.currentTarget.value.length>13)){
        p[0].classList.add('error');
        p[0].textContent= "Campo ISBN non valido";
    }

}

function checktitle(event){
    p[1].innerHTML="";
    p[1].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[1].classList.add('error');
        p[1].textContent= "Campo titolo vuoto";}

}

function checkautor(event){
    p[2].innerHTML="";
    p[2].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[2].classList.add('error');
        p[2].textContent= "Campo autore vuoto";}
} 

function checklanguage(event){
    p[3].innerHTML="";
    p[3].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[3].classList.add('error');
        p[3].textContent= "Campo lingua vuoto";}
   
}   

function checkwhere(event){
    p[4].innerHTML="";
    p[4].classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p[4].classList.add('error');
        p[4].textContent= "Indicaci dove lascerai il libro";}
    
}


function form_ok(event){
    submit.classList.remove('hidden')
    btn_no.classList.remove('hidden') 
    ans.classList.remove('hidden')
    result.classList.add('hidden');
    const num_error = document.querySelectorAll('.error')
        if ((num_error.length > 0) || isbn.value.length===0 || title.value.length===0 || author.value.length===0 || language.value.lenght===0 || where.value.lenght ===0 ) 
            return;
        else {
        modal_page.classList.remove('hidden');
        body.classList.add('no-scroll');
        modal_page.style.top=window.pageYOffset+'px';

    }
}

function no_modal(event){

        modal_page.classList.add('hidden');
        body.classList.remove('no-scroll');  
        exit_modal.classList.add('hidden') 
}

function send_data(event){
        event.preventDefault();
        submit.classList.add('hidden')
        btn_no.classList.add('hidden')
        fetch_data();
        isbn.value="";
        title.value="";
        author.value ="";
        language.value="";
        where.value="";
}

function fetch_data(){

    const formdata = new FormData(form);
    const get = {
        method: 'post',
        body: formdata
    }
   
    fetch('./SCRIPT/fetch_insertbook.php', get).then(response).then(insertbook)
}

function response(response){
    return response.json(); 

}

function insertbook(insert_ok){
    ans.classList.add('hidden')
    exit_modal.classList.remove('hidden')
    result.classList.remove('hidden');
    if (insert_ok.value === true)
        result.textContent ="Fai sapere che questo libro è registrato su Ourbooks. Scrivi questo codice sul libro per seguire il suo viaggio. "+ insert_ok.id 
    else {
        result.textContent = insert_ok.text
    }

}
