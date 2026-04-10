import '../sass/main.scss'
import $ from 'jquery';

window.sajo = {
    menu: (el) => {
        $(el).toggleClass('open');
    }
}
AOS.init({
    once: true, 
    duration: 800, 
    easing: 'ease-in-out',
});