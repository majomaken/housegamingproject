<?php

  session_start();


  if (isset($_SESSION['userr'])) {
    header('Location: /test3');
  }

  require 'conexion.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $Email=$_POST['email'];
        $Password=$_POST['password'];
    $result=mysqli_query($Conectar, "SELECT UsHGTAG, UsEmail, UsPassword From user where UsEmail= '$Email' and UsPassword= '$Password'");

    $filas=mysqli_num_rows($result);
    $message = '';
    if (!$filas==0) {
      $_SESSION['userr'] = $filas['UsHGTAG'];
      header("Location: index.php");
    } else{
        $message = 'Sorry, Those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script type="text/javascript" src="assets/js/all.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/login.css">
        <title>Login</title>
    </head>
    <body>
      <header>
        <h1 class="logo"><img  src="images/logologin.png" alt=""></h1>
      </header>
      <?php if (!empty($message)) : ?>
        <p><?= $message ?> </p>
      <?php endif; ?>
        <div class="login">
            <form action="login.php" method="post">
                <input class="login-id-password" name="email" type="email" placeholder="Email">
                <input class="login-id-password" type="password" name="password" placeholder="Password">
                <input class="login-hg" type="submit" name="login_hg" value="Let's Go!">
            </form>
            <div class="thirdparty-line">
<span>OR LOG IN WITH</span>
</div>
            <div class="options-login">
              <button type="button" name="facebook">
                  <i class="icon fab fa-facebook-f"></i><span>acebook</span>
              </button>
              <button type="button" name="google">
                    <i class="icon fab fa-google"></i><span>oogle</span>
              </button>
            </div>

                <ul id="help-links">
                    <li>
                        <a href="signup.php">Crea una cuenta de HG gratis</a>
                    </li>

                    <li>
                        <a href="#">¿No puedes iniciar sesión?</a>
                    </li>
                </ul>
        </div>
        <a><?=  $_SESSION['userr']; ?></a>
    </body>
</html>
