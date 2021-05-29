
document.addEventListener('scroll', inView);

var images = document.querySelector('.wfa__gallery').querySelectorAll('img');

// get window height
var windowHeight = window.innerHeight;

// get number of pixels that the document is scrolled
var scrollY = window.scrollY || window.pageYOffset;

window.onload = function() {

  var scrollPosition = scrollY + windowHeight;

  for( var i = 0; i < images.length; i++) {

    // get element position (distance from the top of the page to the bottom of the element)
    var imageHeight = images[i].clientHeight;
    var imagePosition = images[i].getBoundingClientRect().top + scrollY + imageHeight;

    if ( scrollPosition > imagePosition ) {
      images[i].classList.add('visible')
    }
    else {
      images[i].classList.remove('visible')
    }
  }
}

function inView() {

  // get current scroll position (distance from the top of the page to the bottom of the current viewport)
  var scrollPosition = scrollY + windowHeight;

  for( var i = 0; i < images.length; i++) {

    // get element position (distance from the top of the page to the bottom of the element)
    var imageHeight = images[i].clientHeight;
    var imagePosition = images[i].getBoundingClientRect().top + scrollY + imageHeight;

    if ( scrollPosition > imagePosition ) {
      images[i].classList.add('visible')
    }
    else {
      images[i].classList.remove('visible')
    }
  }
}
