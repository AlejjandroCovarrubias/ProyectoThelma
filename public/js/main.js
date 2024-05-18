 (function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);

    //show menu
    /*
    var showMenuProfileCustom = function () {
        $('#menu-opciones').fadeIn();
    }

    var hideMenuProfileCustom = function () {
        $('#menu-opciones').fadeOut();
    }

    var showMenuProfileCustom2 = function () {
        $("#menu-opciones").fadeIn(0);
    }

    var hideMenuProfileCustom2 = function () {
        $("#menu-opciones").fadeOut(0);
    }


    $('#perfil-icon').mouseenter(showMenuProfileCustom);
    $('#perfil-icon').mouseleave(hideMenuProfileCustom);

    $('#menu-opciones').mouseenter(showMenuProfileCustom2);
    $('#menu-opciones').mouseleave(hideMenuProfileCustom2);
*/
$(document).ready(function() {
    $('#perfil-icon').click(function(event) {
        event.stopPropagation();
        $('#menu-opciones').toggle();
    });

    $(document).click(function() {
        $('#menu-opciones').hide();
    });

    $('.cerrar-menu').click(function() {
        $('#menu-opciones').hide();
    });
});




    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', 0); //Antes -55 para mover el navbar hacia arriba
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        } 
    });
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });

    $(document).ready(function(){				

        $("#follow-button").click(function(){
          if ($("#follow-button").text() == "+ Follow"){
            // *** State Change: To Following ***      
            // We want the button to squish (or shrink) by 10px as a reaction to the click and for it to last 100ms    
            $("#follow-button").animate({ width: '-=10px' }, 100, 'easeInCubic', function () {});
            
            // then now we want the button to expand out to it's full state
            // The left translation is to keep the button centred with it's longer width
            $("#follow-button").animate({ width: '+=45px', left: '-=15px' }, 600, 'easeInOutBack', function () { 
              $("#follow-button").css("color", "#fff");
              $("#follow-button").text("Following");
      
              // Animate the background transition from white to green. Using JQuery Color
              $("#follow-button").animate({
                backgroundColor: "#2EB82E",
                borderColor: "#2EB82E"
              }, 1000 );
            });
          }else{
            
            // *** State Change: Unfollow ***     
            // Change the button back to it's original state
            $("#follow-button").animate({ width: '-=25px', left: '+=15px' }, 600, 'easeInOutBack', function () { 
              $("#follow-button").text("+ Follow");
              $("#follow-button").css("color", "#3399FF");
              $("#follow-button").css("background-color", "#ffffff");
              $("#follow-button").css("border-color", "#3399FF");
            });
          }
        }); 
      });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);


