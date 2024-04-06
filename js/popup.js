const open_btns = document.querySelectorAll('.popup_btn-open');
const popup = document.querySelector('.popup_wrapper');
const close_popup = document.querySelector('.popup_btn-close')
open_btns.forEach(element => {
    element.onclick = function() {popup.classList.add('--active')}
})
close_popup.onclick = function() {popup.classList.remove('--active')}