$(document).ready(function(){

  if($('.np-gallary__tabContant--list').length > 0){
    $('.np-gallary__tabContant--list').each(function(){
      $(this).magnificPopup({
        delegate:'a',
        type: 'image',
        mainClass: 'mfp-with-zoom',
        gallery:{
            enabled:true
          },

        zoom: {
          enabled: true,

          duration: 300, // duration of the effect, in milliseconds
          easing: 'ease-in-out', // CSS transition easing function

          opener: function(openerElement) {

            return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
      }
      });
    })

  }

  $(".np-gallary__tabList li a").on("click", function () {
    var relTab = $(this).attr("rel");
    $(".np-gallary__tabList li").removeClass("current");
    $(".np-gallary__tabList li a").removeClass("current");
    $(".np-gallary__tabContant").removeClass("current");
    $(this).parent().addClass("current");
    $(this).addClass("current");
    $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .find("#" + relTab)
      .addClass("current");
  });


  if($('.np-partner__slid').length > 0){
    $('.np-partner__slid').slick({
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


  if($('#myDatePicker').length > 0){
    flatpickr('#myDatePicker', {
      "minDate": new Date().fp_incr(1),
      dateFormat: "d - m - Y"
  });

  }

  if($('#ap__goalsDetails').length > 0){
    $('#ap__goalsDetails').each(function(){
      $(this).magnificPopup({
        delegate: 'a',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
          beforeOpen: function() {
             this.st.mainClass = this.st.el.attr('data-effect');
          }
        },
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
      });
    });

  }

});