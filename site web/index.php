<?php
include 'include/header.php';
?>
<header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">EGC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="#">obstacles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="vues/login.php">salles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="vues/login.php">statistiques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="vues/login.php">commentaires & photos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="vues/login.php">connexion</a>
          </li>
        </ul>
      </div>
      <div class="content">
        <div class="content_accueil">
          <h1 class="title">Bienvenue chez Escape Game Corporation</h1>
          <p class="description_egc">Venez tester toutes nos salles </p>
        </div>
        <div class="content_news">
          <h1>Les NEWS</h1>
          <div class="slide_news">
            <div class="desc_news">
              <div class="col-sm-6">
                <p class="card-text"><small class="text-white font-weight-bold">2019-2020</small></p>
              </div>
              <div class="col-sm-6">
                <img src="css/images/noel.jpg" alt="" class="img_news">
              </div>
              <div class="col-sm-6">
                <p class="txt">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttest</p>
              </div>
            </div>
            <div class="desc_news">
              <div class="col-sm-6">
                <p class="card-text"><small class="text-white font-weight-bold">2019-2020</small></p>
              </div>
              <div class="col-sm-6">
                <img src="css/images/noel.jpg" alt="" class="img_news">
              </div>
              <div class="col-sm-6">
                <p class="txt">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttest</p>
              </div>
            </div>
            <div class="desc_news">
              <div class="col-sm-6">
                <p class="card-text"><small class="text-white font-weight-bold">2019-2020</small></p>
              </div>
              <div class="col-sm-6">
                <img src="css/images/noel.jpg" alt="" class="img_news">
              </div>
              <div class="col-sm-6">
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
