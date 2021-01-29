const form = document.querySelector("form");
const emailInput= form.querySelector('input[name="email"]');
const ageInput = form.querySelector('input[name="kid-age"]');
const passwordInput = form.querySelector('input[name="password"]');
const phoneInput = form.querySelector('input[name="phone"]');


function isEmail(email){
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function isPhoneNumber(phone){
    const re=/^\d{9}$/
    return re.test(phone);
}

function isAge(age){
    const re=/^\d{2}$/;
    if(re.test(age) && age>0){
        return true;
    }else{
        return false;
    }
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid'):element.classList.remove('no-valid');
}

function validateEmail(){
    setTimeout(function(){
        markValidation(emailInput, isEmail(emailInput.value));},1000);
}

function validateAge(){
    setTimeout(function (){
        markValidation(ageInput, isAge(ageInput.value));},1000);
}

function validatePhoneNumber(){
    setTimeout(function (){
        markValidation(phoneInput, isPhoneNumber(phoneInput.value));},1000);
}
function isSet(elem){
    if(elem==null){
        return false;
    }else{
        return true;
    }
}
if(isSet(ageInput))ageInput.addEventListener('keyup', validateAge);
if(isSet(phoneInput))phoneInput.addEventListener('keyup', validatePhoneNumber);
if(isSet(emailInput))emailInput.addEventListener('keyup', validateEmail);


