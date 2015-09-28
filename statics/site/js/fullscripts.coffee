$(document).ready ->

  $("a[rel^='full']").prettyPhoto
    show_title: true
    social_tools: ''
    theme: 'dark_rounded'
    overlay_gallery: false
    slideshow: false

  $("#cases-slide").carousel
    interval: false

  $("#cases-slider").slick
    prevArrow: '<span class="slick-prev ficon-arrow-l"></span>'
    nextArrow: '<span class="slick-next ficon-arrow-r"></span>'

  $(".fullanos-slide").slick
    dots: false
    speed: 300
    slidesToShow: 4
    slidesToScroll: 1
    prevArrow: '<span class="slick-prev ficon-arrow-l"></span>'
    nextArrow: '<span class="slick-next ficon-arrow-r"></span>'
    responsive: [
      {
        breakpoint: 992
        settings:
          slidesToShow: 3
          slidesToScroll: 1
      }
      {
        breakpoint: 768
        settings:
          slidesToShow: 2
          slidesToScroll: 2
      }
      {
        breakpoint: 540
        settings:
          slidesToShow: 1
          slidesToScroll: 1
      }
    ]
