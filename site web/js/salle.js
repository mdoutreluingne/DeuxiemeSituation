$(function() {
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
});
