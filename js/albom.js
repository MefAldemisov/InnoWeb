$("#albom_shower").click(
    function() {
        $(".albom__container").css("display", "block")
    }
) 
$(document).ready(function () {
    const albom = $(".albom__inner");
    albom.owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:2
            },
            1000:{
                items:2
            }
        },
        autoplay:true,
        autoplayTimeout:1000
    });
});