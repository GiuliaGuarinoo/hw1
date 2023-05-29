const form = document.forms['found-form'];
const form_modal = document.forms['form-modal-view']
const id = document.forms['found-form'].id;
const adv = document.querySelector('.adv');
const info= document.querySelectorAll('.info');
const title = document.querySelector('#title');
const message = document.querySelector('#message');
const cover = document.querySelector('img');
const modal_page = document.querySelector('.modal-page');
const no_modal = document.querySelector('#exit');
const update = document.querySelector('#submit')
const body = document.querySelector('body');
const book_release = '1';
form.addEventListener("submit", id_ok);
id.addEventListener("blur", id_ok);
no_modal.addEventListener("click",exit);
form_modal.addEventListener("submit",update_db);
id.addEventListener("focusin",emptymessage)


function id_ok(event){
    event.preventDefault();
    adv.innerHTML="";
    adv.classList.remove('error');
        if (id.value.length === 0){
            adv.classList.add('error')
            adv.textContent= "Id non presente";
        }
        if (id.value.length <13 && event.currentTarget.value.length >0 ){
            adv.classList.add('error')
            adv.textContent= "L'Id è almeno di 13 caratteri";
        }  
        if (event.currentTarget.value.length>12)
        check_id();
}

function check_id(){

    const formdata = new FormData(form);
    const id = {
        method: 'post',
        body: formdata
    }
    fetch("./SCRIPT/fetch_found_book.php",id).then(response).then(details)
}

function response(query){
    
    return query.json()

}

function details(detail){
  
if (!detail.value){
    adv.classList.add('error')
    adv.textContent=detail.text;
    }
else if(detail.value && detail.type !== book_release ){
    modal_page.classList.remove('hidden');
    body.classList.add('no-scroll');
    modal_page.style.top=window.pageYOffset+'px';
    title.textContent = detail.title;
    info[0].textContent = "ISBN: " +detail.isbn;
    info[1].textContent = detail.author;
    info[2].textContent = detail.lang;
    cover.src = detail.cover;
    }
else if (detail.value && detail.type === book_release){
    adv.classList.add('error')
    adv.textContent="Questo libro non è stato rilasciato"
    }
}

function exit(){

    modal_page.classList.add('hidden');
    body.classList.remove('no-scroll');  

}

function update_db(event){
    event.preventDefault();
    send_id();
}

function send_id(){
    const formdata = new FormData(form);
    const id = {
        method: 'post',
        body: formdata
    }
    fetch("./SCRIPT/fetch_found_book_db.php",id).then(insert).then(insertok)
}

function insert(error){
    return error.json();
}

function insertok(errortext){
    console.log(errortext)
    modal_page.classList.add('hidden');
    body.classList.remove('no-scroll');  
    if (errortext.error && errortext.type !== book_release){
        message.textContent=errortext.text
        id.value="";
    }
}
function emptymessage(event){
    message.innerHTML="";
}