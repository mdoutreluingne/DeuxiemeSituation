<?php
include 'include/header.php';
?>
  <header>
    <div class="container-fluid">
      <div class="row">
        <?php
        include 'include/navbar.php';
        ?>
        <div class="content">
          <div class="content_accueil">
            <h1 class="title">Bienvenue chez Escape Game Corporation</h1>
            <p class="description_egc">Plongez dans un monde digne des plus grands films, résistez au stress et à l’angoisse oppressante qui vous entourent, déjouez les plus grandes énigmes et sortez indemnes … Ou presque … De cette aventure !</p>
            <p class="description_egc">Vous avez 60 minutes, pas une de plus pour vous échapper de ces rooms ...</p>
            <p class="description_egc" id="color_accueil">C’est à vous de jouer !</p>
          </div>
          <div class="content_news">
            <div class="slide_news">
              <div class="desc_news">
                <div class="col-sm-4">
                  <h5>Titre</h5>
                  <p class="card-text"><small class="text-white font-weight-bold">2019-2020</small></p>
                </div>
                <div class="col-sm-4">
                  <img src="css/images/noel.jpg" alt="" class="img_news">
                </div>
                <div class="col-sm-4">
                  <p class="txt">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttest</p>
                </div>
              </div>
              <div class="desc_news">
                <div class="col-sm-4">
                  <h5>Titre</h5>
                  <p class="card-text"><small class="text-white font-weight-bold">2019-2020</small></p>
                </div>
                <div class="col-sm-4">
                  <img src="css/images/noel.jpg" alt="" class="img_news">
                </div>
                <div class="col-sm-4">
                  <p class="txt">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttest</p>
                </div>
              </div>
              <div class="desc_news">
                <div class="col-sm-4">
                  <h5>Titre</h5>
                  <p class="card-text"><small class="text-white font-weight-bold">2019-2020</small></p>
                </div>
                <div class="col-sm-4">
                  <img src="css/images/noel.jpg" alt="" class="img_news">
                </div>
                <div class="col-sm-4">
                  <p class="txt">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttest</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

<?php
include 'vues/obstacles.php';
include 'vues/salles.php';
include 'vues/stat.php';
include 'vues/comm_avis.php';
?>

<?php
include 'include/footer.php';
?>
