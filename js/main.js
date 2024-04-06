const menu_btn =  document.querySelector('.menu_bar')
const menu_list = document.querySelector('.nav_block')

menu_btn.onclick = function(){
    menu_btn.classList.toggle('active');
    menu_list.classList.toggle('-active')
    return false;
  };