// JavaScript Document

$(document).ready(function(){

  $(window).scroll(function() {
    if ($(this).scrollTop() > 50){
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }

  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 50){
        $('.headerMob').addClass("sticky");
    }
    else{
        $('.headerMob').removeClass("sticky");
    }

  });

  if($('.ap__banner__slider').length > 0){
    $('.ap__banner__slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      fade:true,
      speed: 1000,

      // autoplay: true,
      // autoplaySpeed: 1500,

    });
  }

  if($('.ap__teamListing').length > 0){
    $('.ap__teamListing').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 1500,
      responsive: [

        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,

          }
        },

        ]
    });
  }

  if($('.ap__actionSlider').length > 0){
    $('.ap__actionSlider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 1500,

    });
  }

  if($('.ap__goalsSlider').length > 0){
    $('.ap__goalsListing').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 1500,
      responsive: [

        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,

          }
        },

        ]
    });
  }

  var $toggleButton = $('.toggle-button'),
	$menuWrap = $('.menu-wrap'),
	$sidebarArrow = $('.sidebar-menu-arrow');

	$toggleButton.on('click', function() {
	$(this).toggleClass('button-open');
	$menuWrap.toggleClass('menu-show');
	});

  $sidebarArrow.click(function() {
	$(this).next().slideToggle(300);
	});

  $('.mainDrop > a').on("click", function() {

    if($(this).hasClass('active')){

      $(this).removeClass('active');
      $(this).siblings('.ap__dropMenu').hide();

    }else{
      $('.mainDrop > a').removeClass('active');
      $(this).addClass("active");
      $(".ap__dropMenu").hide();
      $(this).siblings(".ap__dropMenu").show();
    }

    return false;
  });

  if($('.popup-youtube').length > 0){
    $('.popup-youtube').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,

      fixedContentPos: false
    });
  }
  $('.counter').each(function() {
    var $this = $(this),
        countTo = $this.attr('data-count');

    $({ countNum: $this.text()}).animate({
      countNum: countTo
    },

    {

      duration: 8000,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
        //alert('finished');
      }

    });



  });
});


