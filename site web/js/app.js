$(document).ready(function(){
  $('.slide_news').slick({
    accessibility: false,
    arrows: false,
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2500,

  });
  $('.slide_salles').slick({
    accessibility: false,
    arrows: false,
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2500,

  });

  /* Cache la navbar si scroll vers le bas */
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      $( "#navbar" ).show();
    } else {
      $( "#navbar" ).hide();
    }
    prevScrollpos = currentScrollPos;
  }

});
