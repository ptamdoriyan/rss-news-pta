$(document).ready(function () {
  $(".product-list").slick({
    arrows: true,
    dots: true,
    slidesToShow: 2,
    // slidesToScroll: 1,
    centerMode: true,
  centerPadding: '60px',
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1.050,
          // slidesToScroll: 1,
          centerMode: true,
        centerPadding: '40px',
        },
      },

      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
      
    ],
    // nextArrow:
    //   '<div class="nextArrowBtn"><i class="icon lni lni-chevron-right"></i></div>',
    // prevArrow:
    //   '<div class="prevArrowBtn"><i class="icon lni lni-chevron-left"></i></div>',
  });
});
