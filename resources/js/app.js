import './bootstrap.js'
import {Toast,Modal,Tooltip} from "bootstrap";
import Choices from "choices.js";
import "./ck.js"

let form = document.querySelector(".user_save_form");

document.querySelectorAll(".user_save_form").forEach(function (form){
    form.querySelectorAll("input").forEach(function (inp){
        inp.addEventListener("change",function (){
            saveUserData(form);
        })
    })
    form.querySelectorAll("select").forEach(function (inp){
        inp.addEventListener("change",function (){
            saveUserData(form);
        })
    })
});
function saveUserData(form){
    let alert = document.getElementById("user_save_toast");
    const formData = new FormData(form);
    axios.post(form.getAttribute("action"), formData)
        .then(response => {
            let a = new Toast(alert);
            a.show();
            console.log(response.data);
        })
        .catch(error => {
            console.error('Error submitting form:', error);
        });
}

window.addEventListener("show_deposit_modal",function (){
    let m = new Modal(document.getElementById("new_deposite_modal"));
    m.show();
})

window.addEventListener("show_withdrawal_modal",function (){
    let m = new Modal(document.getElementById("new_withdrawal_modal"));
    m.show();
})

window.addEventListener("acc_start_modal_show",function (){
    let m = new Modal(document.getElementById("acc_start_modal"));
    m.show();
});





document.querySelectorAll('.js-choice').forEach(function (sel){
    new Choices(sel);
})

//
// document.addEventListener("reg_captcha",function (){
//     setTimeout(function (){
//         document.querySelector(".for_captcha").prepend(document.querySelector(".g-recaptcha"));
//     },300);
// })

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new Tooltip(tooltipTriggerEl)
})

