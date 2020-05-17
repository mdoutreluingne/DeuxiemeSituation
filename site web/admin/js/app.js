$(function() {
  //Formulaire de news caché
  $(".add_news").hide();
  $(".delete_news").hide();
  

  //Affiche la div lors du clique sur le bouton ajouter des actualités
  $("#button_addnews").on("click",function() {
    $(".add_news").toggle();
    $(".delete_news").toggle();
  })
  
  //Affiche la div lors du clique sur le bouton supprimer des actualités
  $("#button_deletenews").on("click",function() {
		$(".delete_news").toggle();
  })
  

});

//Fait disparaitre l'alert après 3sec
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
  });
}, 3000);
