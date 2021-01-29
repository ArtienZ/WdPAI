const search = document.querySelector('input[placeholder="Imie i nazwisko"]');
const usersContainer = document.querySelector('.users-search');

search.addEventListener('keyup',searchfor);
function loadKid(kids){
    kids.forEach(kid=>{
        console.log(kid);
        createKid(kid);
    });
}
function createKid(kid){
    const template= document.querySelector("#user-template");
    const clone = template.content.cloneNode(true);
    const kidName = clone.querySelector('a');
    kidName.innerHTML = kid.name +" "+ kid.surname;
    usersContainer.appendChild(clone);
}