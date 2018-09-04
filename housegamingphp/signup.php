<?php
  include('conexion.php');
  if (isset($_POST['create_account'])) {

    $Ciudad=$_POST['city'];
    $Nombre=$_POST['name'];
    $Apellido=$_POST['lastname'];
    $FechaNac=$_POST['datebirth'];
    $Email=$_POST['email'];
    $Password=$_POST['password'];
    $Phone=$_POST['phone'];
    $DocType=$_POST['doctype'];
    $Document=$_POST['document'];
    $Avatar=1;

      $Insert="INSERT into user(UsFirstname, UsLastname, UsBirthday, UsCity, UsEmail, UsPassword, UsPhone, UsDocType, UsDocument, UsAvatar)values ('$Nombre','$Apellido','$FechaNac','$Ciudad','$Email','$Password','$Phone','$DocType','$Document','$Avatar')";
    if (empty($Nombre || $Apellido || $Email|| $Password || $Phone || $Document)) {
      echo "<script> alert('Llene todos los campos ');window.location='signup.php'</script>";
      exit;
    }else{
      if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Correo electronico Incorrecto'); window.location='signup.php'</script>";
        exit;
      }else{
        if (!$FechaNac <>0) {
          echo "<script> alert('Fecha Incorrecta '); window.location='signup.php'</script>";
          exit;
        }
      }
    }

    $IN=mysqli_query($Conectar,$Insert);

    if ($IN) {
      echo "<script> alert('Registrado exitosamente'); window.location='login.php'</script>";
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

        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="assets/css/signup.css">
    </head>
    <body>
<div id="particles-js"></div>
          <header>
            <a href="index.php"><img class="logo" src="assets/images/logologin.png"></a>
            <h1 class="Crear">Crear una cuenta</h1>
          </header>

          <div class="options-register">
            <button type="button" name="facebook">
                <i class="icon fab fa-facebook-f"></i><span>acebook</span>
            </button>
            <button type="button" name="google">
                  <i class="icon fab fa-google"></i><span>oogle</span>
            </button>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="form-register" method="post">
          <div class="creation-container grid-parent">

              <div class="container-inputs">
              <fieldset>
                <select class="set-all-sel" name="city" >
                    <option value="mosquera">Mosquera</option>
                    <option value="madrid">Madrid</option>
                    <option value="funza">Funza</option>
                </select>
                <input class="set-side" type="text" name="name" placeholder="Nombre" value="<?php if(isset($Nombre)) echo"$Nombre"?>"/>
                <input class="set-side"  type="text" name="lastname" placeholder="Apellido" value="<?php if(isset($Apellido)) echo"$Apellido"?>"/>
              </fieldset>

              <fieldset>
                <input class="set-all" type="date" name="datebirth" placeholder="Fecha de Nacimiento" value="<?php if(isset($FechaNac)) echo"$FechaNac"?>"/>
              </fieldset>

              <fieldset >
                <input class="set-all" type="email" name="email" placeholder="Correo electrónico" value="<?php if(isset($Email)) echo"$Email"?>"/>
                <input class="set-all" type="password" name="password" placeholder="Contraseña">
                <input class="set-all" type="password" name="passwordconf" placeholder="Confirmar contraseña">
              </fieldset>

              <fieldset>
                <input  class="set-all" type="phone" name="phone" placeholder="Teléfono" value="<?php if(isset($Phone)) echo"$Phone"?>"/>
              </fieldset>
              <fieldset>
                <select class="set-sideb" name="doctype">
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                </select>
                <input class="set-sideb" type="text" name="document" placeholder="Documento">
              </fieldset>

                </div>
                <div class="container-actionbtn">
                <input type="checkbox" name="terms" value="">
                <label class="terms">I agree to the <a href="#">Terms of Use</a> and I have read and acknowledge the <a class="Privacidad" href="#">Politica de privacidad</a></label>
                <input class="free-account" type="submit" name="create_account" value="Create a free account">
                <a href="login.php"><button class="free-login" type="button" name="login">¿Ya tienes una cuenta?</button></a>
              </div>
              </form>
              </div>
                <!-- Aquie usted decide el estilo como lo quiere si usa el boton o la etiqueta <a> para colocarle
                    la accion de ir al login -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="Particulas/particles.js"></script>
        <script src="Particulas/particulas.js"></script>
    </body>
</html>
