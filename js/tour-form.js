const FormInputRange = document.querySelectorAll('.form-input__range');
const FormInputNumber = document.querySelectorAll('.form__input__number');
FormInputRange[0].value = '7';
FormInputNumber[0].value = '7';
FormInputNumber[0].addEventListener('input', function() {
    FormInputRange[0].value = FormInputNumber[0].value;
});
FormInputRange[0].addEventListener('input', function() {
    FormInputNumber[0].value = FormInputRange[0].value;
});

FormInputRange[1].value = +FormInputRange[0].value + 1;
FormInputNumber[1].value = +FormInputNumber[0].value + 1;
FormInputNumber[1].addEventListener('input', function() {
    FormInputRange[1].value = FormInputNumber[1].value;
});
FormInputRange[1].addEventListener('input', function() {
    FormInputNumber[1].value = FormInputRange[1].value;
});
const successFunction = function() {
    document.location.href = "../success.html";
}
const formButton = document.querySelector('.form__button');
const form = document.querySelector('.form');

// Проверка на верный ввод данных Form
const callbackButton = document.querySelector('.form__button');
const callbackInputSecure = document.querySelectorAll('.form__input--secure');
let sum2 = 0
setInterval(() => {
    FormInputRange[1].min = +FormInputRange[0].value + 1;
    FormInputNumber[1].min = +FormInputNumber[0].value + 1;


    for(let i = 0; i<callbackInputSecure.length; i++){
        if(callbackInputSecure[i].value == ''){
            sum2=0;
            callbackInputSecure[i].style.border = '1px solid red';
        }else{
            sum2+=1;
            callbackInputSecure[i].style.border = '1px solid green';
        }
    }
    if(sum2 < callbackInputSecure.length){
        callbackButton.setAttribute('disabled', true)
        sum2 = 0
    } else {
        callbackButton.removeAttribute('disabled')
    }
}, 500);
const callbackInputGrey = document.querySelectorAll('.form__input--grey');
setInterval(() => {
    FormInputRange[1].min = +FormInputRange[0].value + 1;
    FormInputNumber[1].min = +FormInputNumber[0].value + 1;


    for(let i = 0; i<callbackInputGrey.length; i++){
        if(callbackInputGrey[i].value == ''){
            sum2=0;
            callbackInputGrey[i].style.border = '1px solid grey';
        }else{
            sum2+=1;
            callbackInputGrey[i].style.border = '1px solid green';
        }
    }

}, 500);
// Form ajax
formButton.addEventListener('click',function() {
  var form_data = jQuery(form).serialize();
  jQuery.ajax({
    type: "POST",
    async: false,
    url: "../php/sendform.php",
    data: form_data,
    success: successFunction()
  });
  event.preventDefault();
});