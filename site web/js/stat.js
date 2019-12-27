$(function() {
  fetch("http://localhost:8080/api/themes")
      .then(response => response.json())
      .then(response => {
          response.forEach(function(element){
            for (var i = 0; i < response.length; i++) {
              if (i == element.id) {
                $("#salle" + i).append(element.nom);
              }
            }

          });
      })
      .catch(error => alert("Erreur : " + error));

  $('#button_salle1').on("click",function() {
        fetch("http://localhost:8080/api/avis")
            .then(response => response.json())
            .then(response => {
                response.forEach(function(element){
                    $("#avis_salle1").append("<span>" + element.commentaire + "</span><br>");
                });
            })
            .catch(error => alert("Erreur : " + error));

	})




});
