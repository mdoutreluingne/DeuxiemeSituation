$(function() {

  var s = document.getElementById('salle1');
  var monTexte = s.innerText || s.textContent;

  fetch("http://localhost:8080/api/avis/byTauxSatisfaction/Alcatraz")
      .then(response => response.json())
      .then(response => {
          response.forEach(function(element){
            $("#taux1").append(Math.round(element['1']) + "%");

          });
      })
      .catch(error => alert("Erreur : " + error));

});
