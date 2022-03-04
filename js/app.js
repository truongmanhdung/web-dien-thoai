const menudt = document.querySelector('#menudt');
const menudt2 = document.querySelector('#menudt2');
const navlinks = document.querySelector('#desktop-nav-left');
const pkcl = document.querySelector('#pkcl');
const content = document.querySelector('.content');
// const line2 = document.querySelector('.line2');
// const line3 = document.querySelector('.line3');
    
    
    if (screen.width < 1200) {
            menudt.addEventListener('click', () => {
            menudt2.style.display = 'inline';
            menudt.style.display = 'none';
            navlinks.style.display = 'inline';
            navlinks.classList.toggle('active');
            });

            menudt2.addEventListener('click', () => {
                menudt.style.display = 'inline';
                menudt2.style.display = 'none';
                navlinks.style.display = 'inline';
                navlinks.classList.remove('active');
                });

            pkcl.addEventListener('click', () =>{
                navlinks.style.display = 'none';
            });
            content.addEventListener('click', () =>{
                navlinks.style.display = 'none';
                menudt2.style.display = 'none';
                menudt.style.display = 'inline';
            });
            window.addEventListener('scroll', () =>{
                navlinks.style.display = 'none';
                menudt.style.display = 'inline';
                menudt2.style.display = 'none';
            });
    }


document.querySelector('.tatcasp').addEventListener('click', ()=>{
    document.querySelector('.cumoi').style.display="none";
});