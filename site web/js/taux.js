/*$(function() {

  var i = 0;

  fetch("http://localhost:8080/api/avis/byTauxSatisfaction")
      .then(response => response.json())
      .then(response => {
          response.forEach(function(element){
            $("#taux" + i).append(Math.round(element.taux) + "%");
              i++;
          });
      })
      .catch(error => alert("Erreur : " + error));

});*/
