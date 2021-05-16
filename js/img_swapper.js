// Swapping hero images when we hover over hero titles

function bigImg(x) {
  var img = document.querySelector(x);
  document.querySelector('.hero_img_default').classList.remove('visible');
  img.classList.remove('hidden');
  img.classList.add('visible');
}

function normalImg(x) {
  var img = document.querySelector(x);
  document.querySelector('.hero_img_default').classList.add('visible');
  img.classList.remove('visible');
  img.classList.add('hidden');
}
