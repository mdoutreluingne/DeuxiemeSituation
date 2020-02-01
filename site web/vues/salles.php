<div class="salles" id="salles">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Nos différentes salles</h2>
      </div>
      <div class="slide_salles" id="slide_salles">
        <?php
        $json = file_get_contents("http://localhost:8080/api/salles/countSalle");
        $parsee = json_decode($json, true);
        $m=0;

        for ($i=0; $i < 2; $i++) {
          echo '<div>';
          echo '<div class="card-deck">';
          for ($j=0; $j < 3; $j++) {
            $m++;
            echo '
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation'. $m .'"></h5>
                <span class="text-muted font-italic" id="ville' . $m .'"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>';

          }
          echo '</div>';
          echo '</div>';
        }
         ?>
        <!--
        <div>
          <div class="card-deck">
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation1"></h5>
                <span class="text-muted font-italic" id="ville1"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation2"></h5>
                <span class="text-muted font-italic" id="ville2"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation3"></h5>
                <span class="text-muted font-italic" id="ville3"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="card-deck">
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation4"></h5>
                <span class="text-muted font-italic" id="ville4"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation5"></h5>
                <span class="text-muted font-italic" id="ville5"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation6"></h5>
                <span class="text-muted font-italic" id="ville6"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="card-deck">
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation7"></h5>
                <span class="text-muted font-italic" id="ville7"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation8"></h5>
                <span class="text-muted font-italic" id="ville8"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
            <div class="card">
              <img src="css/images/noel.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" id="salle_presentation9"></h5>
                <span class="text-muted font-italic" id="ville9"></span>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</div>
