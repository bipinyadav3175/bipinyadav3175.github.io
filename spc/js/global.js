// Adding drop shadow to header when user scrolls page
const header = document.querySelector('header');
window.addEventListener('scroll', ()=>{
    const scrollTop = document.documentElement.scrollTop;
    if(scrollTop>=20){
        header.classList.add('scrolled')
    }else{
        header.classList.remove('scrolled')
    }
})


// Adding Sidebar functionality

const bars = document.querySelector('.burger');
const navBar = document.querySelector('.right_nav');



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