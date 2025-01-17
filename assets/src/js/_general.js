jQuery.noConflict();

(function ($) {

  $(document).ready(function () {


    
    const $siteMain = $('#main');
    const $assistBox = $('.assist-box');
    
    if ($assistBox.length) { // Only run if .assist-box exists
      const mainTop = $siteMain.offset().top;
      const mainHeight = $siteMain.outerHeight();
      const assistBoxHeight = $assistBox.outerHeight();
      const stickyStart = mainTop + 20; // Adjust as needed
      const stickyEnd = mainTop + mainHeight - assistBoxHeight - 20;
    
      $(window).on('scroll', function () {
        const scrollTop = $(window).scrollTop();
    
        if (scrollTop > stickyStart && scrollTop < stickyEnd) {
          $assistBox.css({
            position: 'fixed',
            top: '20px',
          });
        } else if (scrollTop <= stickyStart) {
          $assistBox.css({
            position: 'absolute',
            top: '20px',
          });
        } else {
          $assistBox.css({
            position: 'absolute',
            top: `${mainHeight - assistBoxHeight - 20}px`,
          });
        }
      });
    }
    


    $('.product-main-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      asNavFor: '.product-slider',
    });

    // Thumbnail Slider
    $('.product-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.product-main-slider',
      focusOnSelect: true,
      arrows: true,
      centerMode: true,
      prevArrow: '<button type="button" class="slick-prev"></button>',
      nextArrow: '<button type="button" class="slick-next"></button>',
    });

    // Fancybox for Lightbox
    Fancybox.bind('[data-fancybox="gallery"]', {
      Thumbs: false,
      buttons: [
        "prev",
        "next",
        "close"
      ],
    });

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
      slidesToShow: 3,      
      slidesToScroll: 1,    
      infinite: false
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

    Fancybox.bind('[data-fancybox="gallery-moto"]');
    
    document.querySelector('.show-more-btn').addEventListener('click', function() {
      const tableContainer = document.querySelector('.table-container');
      tableContainer.classList.toggle('expanded');  // Toggle the "expanded" class
      // Optionally change the button text to "Show Less" if expanded
      if (tableContainer.classList.contains('expanded')) {
          this.textContent = 'Skrij';
      } else {
          this.textContent = 'Prikaži več';
      }
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