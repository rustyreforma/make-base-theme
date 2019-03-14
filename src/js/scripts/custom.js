jQuery(function($) {
    $(".siema").slick({
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        adaptiveHeight: true,
        nextArrow: "<span class='next ion-chevron-right'></span>",
        prevArrow: "<span class='next ion-chevron-left'></span>",
        fade: true,
        centerMode: true,
        easing: "ease"
    });
    // fadeinUp animation on scroll
    // Function which adds the 'animated' class to any '.animatable' in view
    var doAnimations = function() {
        // Calc current offset and get all animatables
        var offset = $(window).scrollTop() + $(window).height(),
            $animatables = $(".animatable");

        // Unbind scroll handler if we have no animatables
        if ($animatables.length == 0) {
            $(window).off("scroll", doAnimations);
        }

        // Check all animatables and animate them if necessary
        $animatables.each(function(i) {
            var $animatable = $(this);
            if ($animatable.offset().top + $animatable.height() - 20 < offset) {
                $animatable.removeClass("animatable").addClass("animated");
                setTimeout(function() {
                    $animatable.removeClass("fadeInUp"); // fadeInUp class removed after 2 secs so it may not affect the modal css.
                }, 2000);
            }
        });
    };

    // Hook doAnimations on scroll, and trigger a scroll
    $(window).on("scroll", doAnimations);
    $(window).trigger("scroll");

    // END fadeinUp animation on scroll
    if ($(window).width() < 768) {
        $(".sandwich").click(function() {
            if ($(".mobile").hasClass("dropped")) {
                $(".mobile").slideUp();
                $(".mobile").removeClass("dropped");
            } else {
                $(".mobile").slideDown();
                $(".mobile").addClass("dropped");
            }
        });

        $(".strip")
            .find("br")
            .remove();
    }

    // smooth vertical scrolling
    if (window.addEventListener)
        window.addEventListener("DOMMouseScroll", wheel, false);
    window.onmousewheel = document.onmousewheel = wheel;

    function wheel(event) {
        var delta = 0;
        if (event.wheelDelta) delta = event.wheelDelta / 120;
        else if (event.detail) delta = -event.detail / 3;

        handle(delta);
        if (event.preventDefault) event.preventDefault();
        event.returnValue = false;
    }

    var goUp = true;
    var end = null;
    var interval = null;

    function handle(delta) {
        var animationInterval = 20; //lower is faster
        var scrollSpeed = 20; //lower is faster

        if (end == null) {
            end = $(window).scrollTop();
        }
        end -= 20 * delta;
        goUp = delta > 0;

        if (interval == null) {
            interval = setInterval(function() {
                var scrollTop = $(window).scrollTop();
                var step = Math.round((end - scrollTop) / scrollSpeed);
                if (
                    scrollTop <= 0 ||
                    scrollTop >=
                        $(window).prop("scrollHeight") - $(window).height() ||
                    (goUp && step > -1) ||
                    (!goUp && step < 1)
                ) {
                    clearInterval(interval);
                    interval = null;
                    end = null;
                }
                $(window).scrollTop(scrollTop + step);
            }, animationInterval);
        }
    }
    // END smooth vertical scrolling

    // SMOOTH anchor scrolling
    // Add smooth scrolling to all links
    $("a").on("click", function(event) {
        window.wasScrolled = true;
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $("html, body").animate(
                {
                    scrollTop: $(hash).offset().top
                },
                800,
                function() {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                }
            );
        } // End if
    });
    // END SMOOTH anchor scrolling

    // FORM realtime validation
    // $(':input[type="submit"]').prop("disabled", true);
    // setInterval(function() {
    //     var isValidForm = true;

    //     $("form")
    //         .find("input.wpcf7-validates-as-required, textarea")
    //         .each(function() {
    //             if (!this.value.trim()) {
    //                 isValidForm = false;
    //             }

    //             // if (
    //             //     !this.value.trim() == false &&
    //             //     !$('input[type="checkbox"]').is(":checked")
    //             // ) {
    //             //     isValidForm = false;
    //             // }
    //         });
    //     $("form")
    //         .find(':input[type="submit"]')
    //         .prop("disabled", !isValidForm);
    // }, 100);
});
