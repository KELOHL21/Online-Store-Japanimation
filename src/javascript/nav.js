const nav = document.getElementById('nav_container')

window.addEventListener('scroll', () => {
   if(window.scrollY >= 100){
      nav.classList.add('header_black');
   }else{
      nav.classList.remove('header_black');
   }
});