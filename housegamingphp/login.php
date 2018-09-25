<?php
  require 'conexion.php';
  session_start();
?>
<?php
  if (isset($_POST['login_hg'])) {
    if (!empty($_POST['email'] && !empty($_POST['password']))) {
        $Email=$_POST['email'];
        $Password=$_POST['password'];
    }

    //Muestra en Indexx.php el Name
    $UsFirstname=mysqli_query($Conectar,"SELECT UsNickname From user where UsEmail='$Email'");
    $Resultad=mysqli_fetch_array($UsFirstname);
    $Nam=$Resultad["UsNickname"];
    $_SESSION['userr']=$Nam;

    //Muestra en el Indexx.php el Avatar
    $Icono=mysqli_query($Conectar,"SELECT AvatarSrc From avatar INNER JOIN user ON avatar.AvatarId=user.UsAvatar where UsEmail='$Email'");
    $Imag=mysqli_fetch_array($Icono);
    $Foto=$Imag['AvatarSrc'];
    $_SESSION['Imagen']=$Foto;
    //Muestra en el Indexx.php el Avatar
    $id=mysqli_query($Conectar,"SELECT UsHGTAG From user WHERE UsEmail='$Email'");
    $result=mysqli_fetch_array($id);
    $idr=$result['UsHGTAG'];
    $_SESSION['id']=$idr;
    //Verifica la Sesion
    $result=mysqli_query($Conectar, "SELECT UsEmail, UsPassword From user where UsEmail= '$Email' and UsPassword= '$Password'");
    $filas=mysqli_num_rows($result);

    if (!$filas==0) {
      header("Location: esports.php");
    }else{
      echo "<script>alert('Error en la autentificacion');</script>";
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
    <div id="particles-js"></div>
      <header>
        <a href="index.php"><img class="logo" src="assets/images/logologin.png"></a>
        <h1 class="logo"></h1>
      </header>
        <div class="login">
            <form action="#" method="post">
                <input class="login-id-password" type="email" name="email" placeholder="Email">
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
                        <a href="signup.php">¡Crea una cuenta en HG gratis!</a>
                    </li>

                </ul>
        </div>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="Particulas/particles.js"></script>
        <script src="Particulas/particulas.js"></script>    </body>
</html>
