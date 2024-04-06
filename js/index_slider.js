function checkDirection(fun1, fun2) {
    if (Math.abs(touchendX - touchstartX) > 150) {
        // console.log('swipe X = ' +  Math.abs(touchendX - touchstartX));
        if (touchendX < touchstartX) { fun1 }
        if (touchendX > touchstartX) { fun2 }
    }
}



window.onload = function() {
    function init_slider_projects() {
        let touchstartX = 0;    
        let touchendX = 0;
        let cur_slide = 0

        const slider = document.querySelector('.projects_slider')
        const lent = slider.querySelector('.projects_list')
        const prev_btn = slider.querySelector('.prev');
        const newx_btn = slider.querySelector('.next');

        const length = lent.querySelector('.project_item').offsetWidth
        const max_cur_slide = lent.querySelectorAll('.project_item').length -1

        function swipe() {
            if (cur_slide > 0) {
                lent.style.cssText = 'transform: translateX(calc(-' + cur_slide * length + 'px - ' + cur_slide*4 + 'rem))';
            } else {
                lent.style.cssText = 'transform: translateX(calc(0px))';
            }
        }

        function prev() {
            // console.log('prev')
            // console.log(cur_slide)
            if (cur_slide > 0 ) {
                cur_slide--;
            } else {
                cur_slide = 0;
            }
            swipe();
        }

        function next() {
            // console.log('next')
            // console.log(cur_slide)
            if (cur_slide < max_cur_slide) {
                cur_slide++;
            } else {
                cur_slide = max_cur_slide
            }
            swipe();
        }

        slider.addEventListener('touchstart', e => {
            // console.log('touch start');
            touchstartX = e.changedTouches[0].screenX
            return
        })
        
        slider.addEventListener('touchend', e => {
            // console.log('touch end');
            touchendX = e.changedTouches[0].screenX;
            checkDirection(next(), prev());
            return
        })

        prev_btn.onclick = function() {prev();}
        newx_btn.onclick = function() {next();}
    }

    init_slider_projects()
}