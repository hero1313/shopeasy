$(document).ready(function() {
    var sectionNumber = 1;
    var lineWidth = 0;

    function scrollDown($arg) {
        $($arg).click(function() {
            if (sectionNumber < 8) {
                sectionNumber = sectionNumber + 1;
                lineWidth = lineWidth + 20;
            } else {
                sectionNumber = 6
                lineWidth = 100;
            }
            $('html, body').animate({ scrollTop: $('section:nth-child(' + sectionNumber + ')').offset().top }, -1000);
            console.log(sectionNumber)
        });
    }

    $('.add-cart-btn').click(function() {
        $(".modal-prods").css('display', 'none')
        $(".modal-backdrop").css('display', 'none')
        $('html, body').animate({ scrollTop: $('section.info-section').offset().top }, -1000);
        sectionNumber = 3;
        console.log(sectionNumber)
        // alert(123);
    });

    $(".scroll-up").click(function() {
        if (sectionNumber > 1) {
            sectionNumber = sectionNumber - 1;
            lineWidth = lineWidth - 20;
        } else {
            sectionNumber = 1
            lineWidth = 0;
        }
        console.log(sectionNumber);
        $('html, body').animate({ scrollTop: $('section:nth-child(' + sectionNumber + ')').offset().top }, -1000);
    });


    $(document).on("scroll", function() {
        var pixels = $(document).scrollTop() + $('section.info-section').height();
        var pageHeight = $(document).height();
        var progress = 100 * pixels / pageHeight;
        $(".line").css("width", progress + "%");
        if ($(window).scrollTop() >= $(
                'body').offset().top + $('body').outerHeight() - window.innerHeight) {
            $(".line").css("width", "100%");
        }
    })

    scrollDown(".scroll-down")
    scrollDown(".btn-order-now")
    scrollDown(".next-btn")
    scrollDown(".btn-delivery-next")
    scrollDown(".day-label")
        // scrollDown(".add-cart-btn")

});