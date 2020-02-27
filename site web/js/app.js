$(document).ready(function(){
  $('.slide_news').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    accessibility: false,
    arrows: false,
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2500,

  });
  $('.slide_salles').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
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

  /* Timer */

  var min=60,sec=0,dse=0;
  var tmp=(min*60+sec)*10+dse;

  var chrono=setInterval(function (){
       min=Math.floor(tmp/600);
       sec=Math.floor((tmp-min*600)/10);
       tmp--;
       $('.compte_a_rebours').text('00:'+min+':'+sec);
  },100);

});
