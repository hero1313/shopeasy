$(document).ready(function () {
    $('.btn-start').click(function() {
        $('html, body').animate({
            scrollTop: $('p.results').offset().top - 120
        }, -1000);
    });
    $('.add-cart-btn').click(function() {
        $(".modal-prods").css('display', 'none')
        $(".modal-backdrop").css('display', 'none')
        $('html, body').animate({
            scrollTop: $('section.info-section').offset().top - 120
        }, -1000);

    });
    $('.info-btn').click(function() {
        if($("section.additional-section").length){
            $('html, body').animate({
                scrollTop: $('section.additional-section').offset().top - 120
            }, -1000);
        }
        else if($("section.delivery-date").length){
            $('html, body').animate({
                scrollTop: $('section.delivery-date').offset().top - 120
            }, -1000);
        }
        else{
            $('html, body').animate({
                scrollTop: $('section.delivery-method-section').offset().top - 120
            }, -1000);
        }
    });
    $('.aditional-next').click(function() {
        if($("section.delivery-date").length){
            $('html, body').animate({
                scrollTop: $('section.delivery-date').offset().top - 120
            }, -1000);
        }
        else{
            $('html, body').animate({
                scrollTop: $('section.delivery-method-section').offset().top - 120
            }, -1000);
        }
    });
    $('.day-label').click(function() {
        $('html, body').animate({
            scrollTop: $('section.delivery-method-section').offset().top - 120
        }, -1000);
    });
    $('.delivery-label').click(function() {
        $('html, body').animate({
            scrollTop: $('section.payments').offset().top - 120
        }, -1000);
    });

    $(".burger").click(function () {
        $(".navigation").toggle()
    });

    $(".cover").click(function () {
        $(".navigation").toggle()
    });
    $(".close-nav").click(function () {
        $(".navigation").toggle()
    });

});