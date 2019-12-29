$(function() {

  var s = document.getElementById('salle1');
  var monTexte = s.innerText || s.textContent;
  fetch("http://localhost:8080/api/avis/byTauxSatisfaction/Alcatraz")
  .then(response => response.json(){
    $("#taux1").append(response.note);
  })
  .catch(error => alert("Erreur : " + error));

});
