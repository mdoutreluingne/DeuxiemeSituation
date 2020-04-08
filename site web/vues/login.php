<?php
require "../vendor/autoload.php";

use App\model\dao;
use App\model\daoUser;

$dao = new dao();
$daoUser = new daoUser();

if (isset($_POST['submit'])) {

  //Récupère l'utilisateur avec son id
  $leUser = $daoUser->getUserById(1);
  $login = htmlspecialchars($_POST['login']); //N'execute pas les balises html
  $password = htmlspecialchars($_POST['pass']); //N'execute pas les balises html
  $password = md5($password); //Crypte le mdp saisie en md5

  //Test si l'utilisateur est Annecy-comptabilite
  if ($leUser[0]->getLogin() == $login) {
    //Test si le mot de passe est correct
    if ($leUser[0]->getMdp() == $password) {
        session_start();
        $_SESSION['id'] = $leUser[0]->getId();
        header('Location: ../admin/index.php');
    }
    else {
      $msg = '<div class="alert alert-danger text-center" role="alert">Mot de passe incorrect</div>';
    }
  }
  else {
    $msg = '<div class="alert alert-danger text-center" role="alert">Login incorrect</div>';
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    body,html,header,h1 {
      padding: 0px;
      margin: 0px;
    }

    body,html,header {
      width: 100%;
      height: 100%;
    }

    header {
      background: url("../css/images/login.jpg") no-repeat center center;
      background-size: cover;
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

    form {
      width: 450px;
      margin: auto;
      padding: 10px 20px;
      background-color: rgba(0,0,0,0.90);
      border-radius: 4px;
    }

    h2 {
      color: #fff;
      text-align: center;
      font-size: 30px;
    }

    input, textarea {
      width: 100%;
      margin-bottom: 20px;
      padding: 7px;
      box-sizing: border-box;
      font-size: 17px;
      border: none;
    }

    #valide {
      color: #fff;
      font-size: 20px;
      padding: 10px;
    }

    .txtlogin {
      border: 2px solid #D71A35;
      box-sizing: border-box;
      border-radius: 4px;
      float: left;
    }

    .lbllogin {
      font-family: Roboto;
      font-style: normal;
      font-size: 20px;
      line-height: 42px;
      color: #FFFFFF;
      float: left;
    }

    .title_login {
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    @media (max-width: 480px) {
      form {
        width: 100%;
      }
    }
    </style>
  </head>
  <body>

    <header>
      <div class="wrapper">
        <div class="content">
          <form action="" method="post">
             <h2 class="title_login">Connexion</h2>
             <label class="lbllogin">Login :</label>
             <input type="text" class="txtlogin" name="login" placeholder=""/>
             <label class="lbllogin">Mot de passe :</label>
             <input type="password" class="txtlogin" name="pass" placeholder=""/>
             <input type="submit" name="submit" value="Se connecter" class="btn btn-danger" id="valide"/>
             <?php if(isset($msg)) {echo $msg;}  ?>
           </form>
        </div>
      </div>
    </header>

    <script type="text/javascript">
    //Fait disparaitre l'alert après 3sec
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 2500);
    </script>

  </body>
</html>
