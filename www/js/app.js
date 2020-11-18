const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.tab-nav');

    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
    });

}

navSlide();