// toggle
const navbarNav = document.querySelector('.navbar-nav');
document.querySelector('#menu').onclick = () =>{
    navbarNav.classList.toggle('active');
};

//klik sidebar
const menu = document.querySelector('#menu');
document.addEventListener('click', function(e){
    if(!menu.contains(e.target) && !navbarNav.contains(e.target)){
        navbarNav.classList.remove('active');
    }
});

//klik penghilang sidebar
const menunya = document.querySelector('#menu');

document.addEventListener('click', function(e){
    if(!menunya.contains(e.target) && !navbarNav.contains(e.target)){
        navbarNav.classList.remove('active');
    }
});