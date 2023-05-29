const modal =document.forms['form-modal-view'];
const where =document.forms['form-modal-view'].where;
const submit =document.forms["form-modal-view"].submit;
const btn_no =document.forms["form-modal-view"].btn_no;
const search_form= document.forms["search"];
const containers =document.querySelector('article');
const section =document.querySelector('section');
const place=document.querySelector('#researchbook');
const modal_page = document.querySelector('.modal-page');
const body = document.querySelector('body');
const p = document.querySelector('.adv');
const forms_book= document.querySelectorAll('form.bookcontainer');
const form_results = document.querySelector('#form-results');
const exit_form = document.querySelector('#exit');

where.addEventListener("blur",where_null);
btn_no.addEventListener("click",click_no);
search_form.addEventListener("submit",search_book);
exit_form.addEventListener("click",exit);

let current_form;

for (const form of forms_book)
    form.addEventListener('submit', submit_ok)



function where_null(event){
    p.innerHTML="";
    p.classList.remove('error');
    if (event.currentTarget.value.length === 0){
        p.classList.add('error')
        p.textContent = "Campo vuoto"; 
    }
}

function submit_ok(event){
    event.preventDefault();
    current_form = event.target;
    modal_page.classList.remove('hidden');
    body.classList.add('no-scroll');
    modal_page.style.top=window.pageYOffset+'px';
    modal.addEventListener('submit', modal_ok);

}

function click_no(event){
    current_form = null;
    modal_page.classList.add('hidden');
    body.classList.remove('no-scroll'); 

}
function modal_ok(event){
    event.preventDefault();
    if(!event.target.querySelector('.error')){
        fetch_data();
        modal_page.classList.add('hidden');
        body.classList.remove('no-scroll'); 
        where.value="";
    }
}

function fetch_data(){
    const id = current_form['id_hidden'].value
    fetch('./SCRIPT/fetch_releasebook.php?id=' + encodeURIComponent(id) + "&where=" + encodeURIComponent(where.value) + "&provincia=" + encodeURIComponent(modal.provincia.value)).then(response).then(insertbook)

}


function response(response){
return response.json();

}

function insertbook(insert){
    const sub = current_form['ok'];
    const res = document.createElement('p');

    if (insert.value===false){
        sub.value = "Riprova più tardi";
    }
    else{
        sub.value = "Riprova più tardi";
        sub.remove();
        res.classList.add('sub');
        res.classList.add('release');
        res.textContent = 'Libro Rilasciato!';
        current_form.querySelector('.bookinfo').appendChild(res);
    }
    current_form = null;
    
}

function search_book(event){
        event.preventDefault()
        if (place.value.length !==0)
            fetch_search();
        else 
            return;
}

function fetch_search(){

    fetch('./SCRIPT/fetch_search_book.php?place=' + encodeURIComponent(place.value.trim())).then(response_search).then(view_book)    

}

function response_search(response){

    return response.json()
}

function view_book(book){
    containers.classList.add('profile_hidden');
    form_results.classList.remove('hidden');
    exit_form.classList.remove('hidden')
    form_results.innerHTML = '';
    if (book.value===false){
        error = document.createElement('h3');
        error.textContent=book.text;
        form_results.appendChild(error);
        
    } else{

        for (const i of book) {
        const bookscontainer =document.createElement('div');
        bookscontainer.classList.add('bookcontainer');
        const title = document.createElement('h3');
        title.textContent = i.title;
        bookscontainer.appendChild(title);
        const infocontainer = document.createElement('div');
        infocontainer.classList.add('bookinfo');
        const div_info = document.createElement('div');
        div_info.classList.add('info');
        const id = document.createElement('p');
        const isbn = document.createElement('p');
        const author = document.createElement('p');
        const language = document.createElement('p');
        const place = document.createElement('p');
        const provincia = document.createElement('p');
        id.textContent = "ID: " + i.id;
        isbn.textContent ="ISBN: " + i.isbn;
        author.textContent= i.author;
        language.textContent="Lingua: " + i.lang;
        place.textContent ="Luogo di rilascio: " + i.place;
        provincia.textContent= i.provincia;
        div_info.appendChild(id);
        div_info.appendChild(isbn);
        div_info.appendChild(author);
        div_info.appendChild(language);
        div_info.appendChild(place);
        div_info.appendChild(provincia);
        const img = document.createElement('img')
        img.src = i.cover
        bookscontainer.appendChild(infocontainer);
        infocontainer.appendChild(div_info)
        infocontainer.appendChild(img)
        form_results.appendChild(bookscontainer)
        }
    }
}

function exit(){
    containers.classList.remove('profile_hidden');
    form_results.classList.add('hidden');
    form_results.innerHTML="";
    exit_form.classList.add('hidden');
    place.value="";
}

