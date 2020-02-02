$(function() {


/************************************************************************/
/***************Affiche les avis lors du clique de chaque bouton**********/
/************************************************************************/

      $('#button_salle0').on("click",function() {
        var salle = document.getElementById('salle0');
        var monTexte = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + monTexte)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(element){
            $("#avis_salle0").append("<h6>" + element.note + "/5" + " " + element.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle1').on("click",function() {
        var salle = document.getElementById('salle1');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle1").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle2').on("click",function() {
        var salle = document.getElementById('salle2');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle2").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle3').on("click",function() {
        var salle = document.getElementById('salle3');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle3").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle4').on("click",function() {
        var salle = document.getElementById('salle4');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle4").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle5').on("click",function() {
        var salle = document.getElementById('salle5');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle5").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle6').on("click",function() {
        var salle = document.getElementById('salle6');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle6").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle7').on("click",function() {
        var salle = document.getElementById('salle7');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle7").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })

      $('#button_salle8').on("click",function() {
        var salle = document.getElementById('salle8');
        var lasalle = salle.innerText || salle.textContent;
        fetch("http://localhost:8080/api/avis/byTheme/" + lasalle)
        .then(response => response.json())
        .then(response => {
          response.forEach(function(e){
            $("#avis_salle8").append("<h6>" + e.note + "/5" + " " + e.commentaire + "</h6><br>");
          });
        })
        .catch(error => alert("Erreur : " + error));

      })
});
