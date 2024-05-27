const menu_btn =  document.querySelector('.menu_bar')
const menu_list = document.querySelector('.nav_block')

menu_btn.onclick = function(){
    menu_btn.classList.toggle('active');
    menu_list.classList.toggle('-active')
    return false;
};

const open_btns = document.querySelectorAll('.popup_btn-open');
const popup = document.querySelector('.popup_wrapper');
const popup_content = document.querySelectorAll('.popup');
const close_popup = document.querySelector('.popup_btn-close');

popup_content.forEach(element => {
    element.onclick = function(e) {e.stopPropagation();}
})
open_btns.forEach(element => {
    element.onclick = function() {popup.classList.add('--active')}
})
close_popup.onclick = function() {popup.classList.remove('--active')}
popup.onclick = function(e) {
    e.stopPropagation();
    popup.classList.remove('--active')
}