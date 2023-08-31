// JavaScript Document
// function scrollTopFN() {
//   let buttonAdd = document.getElementById("sticks");
//   let y = buttonAdd.scrollTop;
//   if (y == 50){
//     buttonAdd.classList.add("is-fixed");
//             }else{
//       buttonAdd.classList.remove("is-fixed")
//     }
    

// }
$(function() {
 "use strict";

    /*index : header animation*/
    $(window).on("scroll",function() {
        if ($(this).scrollTop() > 94) {
            $("header").addClass("header-fixed");
            

        }
        
        
        if($(this).scrollTop() > 800){
          $("#sticks").removeClass("dsgsdcvsd");
          
        }
        else {
          $("header").removeClass("header-fixed");
          $("#sticks").addClass("dsgsdcvsd");
          
      }
    });
    /*end header animation*/

    function responsive_dropdown () {

        /* ---- For Mobile Menu Dropdown JS Start ---- */
          $('#menu span.opener').on("click", function() {
            if ($(this).hasClass("plus")) {
              $(this).parent().find('.mobile-sub-menu').slideDown();
              $(this).removeClass('plus');
              $(this).addClass('minus');
            }
            else
            {
              $(this).parent().find('.mobile-sub-menu').slideUp();
              $(this).removeClass('minus');
              $(this).addClass('plus');
            }
            return false;
          });
        /* ---- For Mobile Menu Dropdown JS End ---- */
        /* ---- For Footer JS Start ---- */
          $('.footer-static-block .head-three, .footer-static-block span.opener').on("click", function() {
            if ($(this).parent('.footer-static-block').hasClass("active")) {
              if ( $(window).width() < 768 ){
                $(this).parent().find('.footer-block-contant').slideUp();
                $(this).parent('.footer-static-block').removeClass('active');
                $(this).parent().find('span.opener').addClass('plus');
                $(this).parent().find('span.opener').removeClass('minus');
              }
            }
            else
            { 
              if ( $(window).width() < 768 ){
                $(this).parent().find('.footer-block-contant').slideDown();
                $(this).parent('.footer-static-block').addClass('active');
                $('.footer-static-block.active span.opener').addClass('minus');
                $('.footer-static-block.active span.opener').removeClass('plus');
              }
            }
            return false;
          });
        /* ---- For Footer JS End ---- */

        /* ---- For Navbar JS Start ---- */
        $('.navbar-toggle').on("click", function(){
          var menu_id = $('#menu');
          var nav_icon = $('.navbar-toggle i');
          if(menu_id.hasClass('menu-open')){
            menu_id.removeClass('menu-open');
            nav_icon.removeClass('fa-close');
            nav_icon.addClass('fa-bars');
          }else{
            menu_id.addClass('menu-open');
            nav_icon.addClass('fa-close');
            nav_icon.removeClass('fa-bars');
          }
          return false;
        });
        /* ---- For Navbar JS End ---- */

        $('li.search-box').on('click', function(){
            $('.sidebar-search-wrap').addClass('open').siblings().removeClass('open');
            return false;
        });

        /*Search-box-close-button*/

        $('.search-closer').on('click', function() {
            var sidebar = $('.sidebar-navigation');
            var nav_icon = $('.navbar-toggle i');
            if(sidebar.hasClass('open')){
                //sidebar.removeClass('open');
            }else{
                sidebar.addClass('open');
                nav_icon.addClass('fa-search-close');
                nav_icon.removeClass('fa-search-bars');
            }

            $('.sidebar-search-wrap').removeClass('open');
            return false;
        });

    }

    /* owl slider */
    if ($(".brand-slider").length > 0) {
        $(".brand-slider").owlCarousel({
            //loop: true,
            autoplay: true,
            dots: false,
            nav: false,
            loop: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                575: {
                    items: 3,
                },
                767: {
                    items: 4,
                },
                1200: {
                    items: 6,
                },
            }
        });
    }

    if ($(".main-baner ").length > 0) {
        $(".main-baner ").owlCarousel({
            loop: true,
            autoplay: true,
            dots: true,
            nav: false,
            items: 1,
            responsiveClass: true,
            responsive: {
                767: {
                    dots: false,
                    nav: true,
                },
            }
        });
    }
    
    if ($(".main-banner, .fv").length > 0) {
      $(".main-banner, .fv").owlCarousel({
          loop: true,
          autoplay: true,
          dots: true,
          nav: false,
          items: 1,
          responsiveClass: true,
         
          responsive:{
            
            767: {
              dots: false,
              nav: true,
              items: 2
          }
   
        }
      });
  }










  if ($(".main-banner, .fvsx").length > 0) {
    $(".main-banner, .fvsx").owlCarousel({
        loop: true,
        autoplay: true,
        dots: true,
        nav: false,
        items: 1,
        responsiveClass: true,
       
        responsive:{
          
          767: {
            dots: false,
            nav: true,
            items: 3
        }
 
      }
    });
}





      if ($(".main-banner, .fvv").length > 0) {
      $(".main-banner, .fvv").owlCarousel({
          loop: true,
          autoplay: true,
          dots: true,
          nav: true,
          items: 2,
          responsiveClass: true,
         
          responsive:{
            
            767: {
              dots: true,
              nav: true,
              items: 3
          }
   
        }
      });
  }

  
  if ($(".main-banner, .catrty").length > 0) {
    $(".main-banner, .catrty").owlCarousel({
      loop: true,
            autoplay: true,
            dots: false,
            nav: true,
            loop: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                420: {
                    items: 2,
                },
                767: {
                    items: 5,
                },
                991: {
                    items: 6,
                },
            }
        });
}



    if ($(".product-slider").length > 0) {
        $(".product-slider").owlCarousel({
            loop: true,
            autoplay: true,
            dots: false,
            nav: true,
            loop: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                420: {
                    items: 2,
                },
                767: {
                    items: 3,
                },
                991: {
                    items: 4,
                },
            }
        });
    }



    if ($(".product-sliders").length > 0) {
      $(".product-sliders").owlCarousel({
          loop: true,
          autoplay: true,
          dots: false,
          nav: false,
          loop: true,
          items: 6,
          responsiveClass:false,
          responsive: {
              0: {
                  items: 6,
              },
              420: {
                  items: 6,
              },
              767: {
                  items: 6,
              },
              991: {
                  items: 6,
              },
          }
      });
  }
    
    /*end owl slider*/

    function product_page_tab () {
        $("#tabs li a").on("click", function(e){
            var title = $(e.currentTarget).attr("title");
            $("#tabs li a , .tab_content li div").removeClass("selected");
            $(".tab-"+title +", .items-"+title).addClass("selected");
            $("#items").attr("class","tab-"+title);

            return false;
        });
    }

    /* menu overlay start */
    $(".navbar-toggle").on("click", function() {
        if (!$(".navbar-collapse").hasClass("menu-open")){
            $(".overlay").fadeIn("slow")
        }
    })
    $(".overlay").on("click", function() {

      $(this).fadeOut();
      $(".navbar-collapse").removeClass("in").addClass("collapse");
      $(".navbar-toggle").click();
      return false;
    })

    $('.nav-link').on('click',function(e) {
        $('a.nav-link').removeClass('active');
        $(this).addClass('active');
        if ( $(window).width() < 991 ){
            $(".navbar-toggle").click();
            $(".overlay").fadeOut();
            $(".navbar-collapse").removeClass("in").addClass("collapse");
        }
    });
    /* menu overlay end */


  $(document).ready(function() {
    responsive_dropdown (); product_page_tab ();
  });

});

$(window).on("load", function() {
  "use strict";
    /* -------- preloader ------- */
    $('#preloader').delay(2000).fadeOut(500);
    /*------End----------*/
  
});







