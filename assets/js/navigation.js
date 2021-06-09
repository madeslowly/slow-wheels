const navSlide = ()=>{
  const burger = document.querySelector('.burger');
  const navSlider = document.querySelector('.main-navigation ul');
  const navLinks = document.querySelectorAll('.main-navigation li');
  const navBar = document.querySelector('.main-navigation');

  // watch for touch clicks on the whole navbar
  navBar.addEventListener('click', () => {
    // animate accordinaly
    navSlider.classList.toggle('nav-active');
    burger.classList.toggle('burger-active');
    navLinks.forEach((link, index) => {
      if ( link.style.animation ) {
        link.style.animation = ``
      } else {
        link.style.animation = `navLinksFade .4s ease-out forwards ${index * .1 + .1 }s`
      }
    });
    burger.classList.toggle('toggle');
  });
}

navSlide();
