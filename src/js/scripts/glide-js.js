
import Glide from '@glidejs/glide';

var $glide = document.querySelectorAll('.glide')

$glide.forEach(function (element) {
    new Glide(element).mount();
});