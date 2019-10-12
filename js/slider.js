$(document).ready(function () {
    var owl = $(".owl-carousel");
    owl.owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $(".films__container__btn-after").click(function(){ // added by myself
        owl.trigger('next.owl.carousel');
    })
    $(".films__container__btn-before").click(function(){
        owl.trigger('prev.owl.carousel');
    })
});