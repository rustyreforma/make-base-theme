import 'simplebar';
import 'simplelightbox';
import 'slickjs';
import { roundabout } from "./scripts/roundabout";
import { glidejs } from "./scripts/glide-js";
import { lity } from "./scripts/lity";
import { navigation } from "./scripts/navigation";
import { selectChange } from "./scripts/contact-js";

if ($('.post-gallery a').length) {
    var lightbox = $('.post-gallery a').simpleLightbox();
}

// slider sync slick
// $('.slider-for').slick({
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     arrows: false,
//     fade: true,
//     asNavFor: '.slider-nav'
// });
// $('.slider-nav').slick({
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     asNavFor: '.slider-for',
//     dots: true,
//     centerMode: true,
//     focusOnSelect: true
// });