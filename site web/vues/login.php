<?php
if (isset($_POST['submit'])) {
  // code...
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
      border: 3px solid #D71A35;
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
          <form action="">
             <h2 class="title_login">Connexion</h2>
             <label class="lbllogin">Login :</label>
             <input type="text" class="txtlogin" name="login" placeholder=""/>
             <label class="lbllogin">Mot de passe :</label>
             <input type="password" class="txtlogin" name="pass" placeholder=""/>
             <input type="submit" name="submit" value="Se connecter" class="btn btn-danger" id="valide"/>
           </form>
        </div>
      </div>
    </header>

  </body>
</html>