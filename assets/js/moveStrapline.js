
// Grab the first header smaller than h1 and add strapline class to move it up in masthead
// Note window.onload conflicts with gallery_add_class
window.addEventListener('load', () => {
  document.querySelectorAll('h2,h3,h4,h5,h6')[0].classList.add('sw__strapline', 'sw--strapline');
  //console.log("moveSub loaded")
}
)
