<!DOCTYPE html>
<html>
  <head>
    <title>Erreur 404 - Page introuvable</title>
    <link rel="shortcut icon" href="favicon.ico">
    <style type="text/css">
    @font-face {
        font-family: titre;
        src: url(css/fonts/404.otf);
    }

    body,html, header {
      margin: 0px;
      padding: 0px;
      width: 100%;
      height: 100%;
    }

    header {
      background: linear-gradient(rgba(0, 0, 0, 0.40),rgba(0, 0, 0, 0.40)),url("css/images/404.jpg") no-repeat center center;
      background-size: cover;
      color: white;
    }

    h1 {
      text-transform: uppercase;
      letter-spacing: 10px;
      font-size: 85px;
      font-family: titre;
      white-space:nowrap;
    }

    .titre {
      white-space:nowrap;
      display: block;
    }

    .chiffre::first-letter {
      color: #eb3b5a;
    }

    .wrapper {
      display: table;
      width: 100%;
      height: 100%;
    }

    .content {
      display: table-cell;
      text-align: center;
      vertical-align: middle;
    }

    a {
      text-decoration: none;
      color: #eb3b5a;
    }

    p {
      font-size: 25px;
      letter-spacing: 1px;
    }
  </style>
  </head>
<body>
  <header>
    <div class="wrapper">
      <div class="content">
        <div class="titre">
          <h1>Erreur 404</h1>
        </div>
        <p>On dirait que vous avez du mal à trouver la sortie.</p>
        <p>Laissez-moi-vous donner un indice pour sortir de cette escape game <a href="index.php">[Revenir à l'accueil]</a></p>
      </div>
    </div>
  </header>

</body>
</html>
