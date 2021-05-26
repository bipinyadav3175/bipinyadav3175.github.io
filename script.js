const bars = document.querySelector('.burger');
const navBar = document.querySelector('.right');



bars.addEventListener('click', ()=>{
    navBar.classList.toggle('nav_toggle');

    if(navBar.classList.contains('nav_toggle')){
        bars.classList.remove('fa-bars');
        bars.classList.add('fa-times');
        bars.classList.add('cut');

        document.body.style.top = `-${window.scrollY}px`;
        document.body.style.position = 'fixed';
    }else{
        bars.classList.remove('fa-times');
        bars.classList.add('fa-bars');
        bars.classList.remove('cut');

        document.body.style.position = '';
        document.body.style.top = '';

    }
})

const closeNav = ()=>{
    if(navBar.classList.contains('nav_toggle')){
        navBar.classList.remove('nav_toggle');
        document.body.style.position = '';
        document.body.style.top = '';
        bars.classList.remove('fa-times');
        bars.classList.add('fa-bars');
    }
}