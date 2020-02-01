/*$(function() {
  var container = document.getElementById("slide_salles");
var content="";

  for (var j = 0; j < 2; j++) {

    content += '<div>';
    content += '<div class="card-deck">';
    for (var t = 0; t < 3; t++) {
        content += '<div class="card">';
        content += '<img src="css/images/noel.jpg" class="card-img-top" alt="...">';
        content += '<div class="card-body">';
        content += '<h5 class="card-title" id="salle_presentation1"></h5>';
        content += '<span class="text-muted font-italic" id="ville1"></span>';
        content += '<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>';
        content += '</div>';
        content += '</div>';

    }

    content += '</div>';
    content += '</div>';
container.innerHTML += content;
content="";
}

  fetch("http://localhost:8080/api/salle/salles")
  .then(response => response.json())
  .then(response => {
    response.forEach(function(element){
      for (var i = 1; i < response.length; i++) {
        if (i == element.salle_id) {
          $("#salle_presentation" + i).append(element.theme);
          $("#ville" + i).append(element.ville);
        }

      }
    });
  })
  .catch(error => alert("Erreur : " + error));
});*/
