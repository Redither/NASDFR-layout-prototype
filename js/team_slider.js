window.onload = function() {
    var slides = 0;

    let touchstartX = 0;    
    let touchendX = 0;

    const slider = document.querySelector('.team_slider');
    const all_slides = slider.querySelectorAll('.team_person');
    const lent = slider.querySelector('.team_lent');
    const prev_btn = slider.querySelector('.prev');
    const newx_btn = slider.querySelector('.next');

    const max_slides = all_slides.length - Math.floor(slider.offsetWidth/300);

    function swipe() {
        if (slides > 0) {
            lent.style.cssText = 'transform: translateX(calc(-' + slides * 300 + 'px - 2rem))';
        } else {
            lent.style.cssText = 'transform: translateX(calc(0px))';
        }
    }

    function prev() {
        if (slides > 0 ) {
            slides--;
        } else {
            slides = 0;
        }
        swipe();
    }

    function next() {
        if (slides < max_slides) {
            slides++;
        } else {
            slides = max_slides
        }
        swipe();
    }


    prev_btn.onclick = function() {prev();}
    newx_btn.onclick = function() {next();}


    function checkDirection() {
        if (Math.abs(touchendX - touchstartX) > 50) {
            // console.log('swipe X = ' +  Math.abs(touchendX - touchstartX));
            if (touchendX < touchstartX) { next() }
            if (touchendX > touchstartX) { prev() }
        }
    }

    slider.addEventListener('touchstart', e => {
        // console.log('touch start');
        touchstartX = e.changedTouches[0].screenX
        return
    })

    slider.addEventListener('touchend', e => {
        // console.log('touch end');
        touchendX = e.changedTouches[0].screenX;
        checkDirection();
        return
    })
}