$( document ).ready(function() { 

$('.masks-carousel').owlCarousel({
    stagePadding: 50,
    margin:10,
    nav:true, 
    navText:'',
    items:8,
    slideBy:6
})

var seconds;
var temp;


$('.gallery-carousel').owlCarousel({
    margin:10,
    loop:true,
    autoplay:true,
    autoplayTimeout: 5000,
    nav:true, 
    navText:'',
    items:1
})




});