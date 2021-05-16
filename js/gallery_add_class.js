

window.onload = function() {
  var images = document.querySelector('.wfa__gallery--bikes').querySelectorAll('img');
  document.querySelector('.wfa__gallery--bikes').classList.remove('wfa__gallery--bikes');

  var srcList = [];
  for(var i = 0; i < images.length; i++) {
    images[i].classList.add('visible');
    images[i].setAttribute('style', 'transform: scale(0); animation: .6s ease-in ani_zoom_in forwards; animation-delay:' + (i - 1 ) * .05 + 's;');
  }
}
