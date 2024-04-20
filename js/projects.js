document.querySelectorAll('.project_container').forEach(el => {
    const btn = el.querySelector('.btn-green');

    btn.onclick = function() {
        if (btn.innerHTML == "Скрыть") {
            btn.innerHTML = "Показать"
            el.setAttribute('data-show', 0)
        } else {
            btn.innerHTML = "Скрыть"
            el.setAttribute('data-show', 1)
        }
    }
})