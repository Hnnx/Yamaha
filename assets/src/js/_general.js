jQuery.noConflict();

(function ($) {

  $(document).ready(function () {

    $('.slick-carousel').slick({
      autoplay: false,
      autoplaySpeed: 3000,  // Set the autoplay interval to 3 seconds
      dots: true,           // Show dots for navigation
      arrows: false,        // Remove arrows for navigation
      infinite: true,       // Enable infinite loop of slides
      slidesToShow: 1,      // Show one slide at a time
      slidesToScroll: 1,    // Scroll one slide at a time
    });

    $('.slick-features').slick({
      autoplay: false,
      dots: true,           
      arrows: true,        
      slidesToShow: 2,      
      slidesToScroll: 1,    
      centerMode: true,
    });

    // Menu
    $('.menu-item-has-children > a').on('click', function (e) {
      e.preventDefault(); // Prevent the link from navigating
      const parent = $(this).parent(); // Get the parent element
      // Close other open menus
      $('.menu-item-has-children.open').not(parent).removeClass('open');
      // Toggle the current menu
      parent.toggleClass('open');
    });

    // Close the menu when clicking outside
    $(document).on('click', function (e) {
      // If the click is outside the menu
      if (!$(e.target).closest('.menu-item-has-children').length) {
        $('.menu-item-has-children.open').removeClass('open');
      }
    });

    let isMobile = false;
    if (window.matchMedia('(max-width: 767px)').matches) {
      isMobile = true;
    } else {
      isMobile = false;
    }


    // Hide or show navbar on scroll
    var lastScrollTop = 0;

    $(window).on('scroll', function () {

      const $mainNav = $('#nav');
      var scrollTop = $(window).scrollTop();

      if (!isMobile) {
        if (scrollTop > lastScrollTop) {
          $mainNav.addClass('hide');
        } else {
          $mainNav.removeClass('hide');
        }
      }

      lastScrollTop = scrollTop;

    });

    //MOBILE MENU TRIGGER
    var burger = $("#burger");

    if (burger.length) {
      burger.on("click", function () {

        $('#nav').toggleClass('mobile-active');
        $("#body").toggleClass("noscroll");
      });
    }

    // Adds fancybox function to wp-gallery and image elements
    (function () {

      $('.wp-block-image').each(function (i) {
        var imageNum = i + 1;

        var s_url = $(this).find('img').attr('src');
        $(this).attr('data-fancybox', 'image-' + imageNum);
        $(this).attr('href', s_url);

      });

      $('.wp-block-gallery').each(function (index) {
        var galleryNum = index + 1;

        $(this).find('.wp-block-image').each(function () {

          var url = $(this).find('img').attr('src');

          $(this).attr('data-fancybox', 'page-gallery-' + galleryNum);
          $(this).attr('href', url);

        });
      });

    })();


  });

})(jQuery);

class General {
  constructor() {
    this.init();
  }


  init() {
    this.setupIntersectionObserver();
    this.initSwiper();

    Fancybox.bind('[data-fancybox="gallery-moto"]');
  
  }

  initSwiper() {

    var swiper = new Swiper(".thumb", {
      spaceBetween: 20,
      slidesPerView: 4,
      watchSlidesProgress: true,
      navigation: {
        nextEl: ".swiper-next", // Selector for the next arrow
        prevEl: ".swiper-prev", // Selector for the previous arrow
      },
    });

    var swiper2 = new Swiper(".main", {
      spaceBetween: 15,
      slidesPerView: 2,
      centeredSlides: true,
      centerInsufficientSlides: true,
      freeMode: false,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });

   
  }


  setupIntersectionObserver() {

    const slideBoxes = document.querySelectorAll('.slide-box');

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view', 'animate__fadeInRight');
          observer.unobserve(entry.target); // Stop observing after animation starts
        }
      });
    }, {
      threshold: 1
    });

    slideBoxes.forEach(slideBox => {
      observer.observe(slideBox);
    });

    // Select the #featured-grid element for animation
    const featuredGrid = document.querySelector('#featured-grid');

    if (featuredGrid) {
      const gridObserver = new IntersectionObserver((entries, gridObserver) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view', 'animate__fadeIn', 'animate__slow');
            gridObserver.unobserve(entry.target); // Stop observing after animation starts
          }
        });
      }, {
        threshold: 0.5 // Fully in view
      });

      gridObserver.observe(featuredGrid);
    }


  }
}

export default General;


