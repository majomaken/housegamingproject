<?php
  include('conexion.php');
  if (isset($_POST['create_account'])) {

    $Nombre=$_POST['name'];
    $Apellido=$_POST['lastname'];
    $nick = $_POST['nickname'];
    $year=$_POST['datebirthyear'];
    $month = $_POST['datebirthmonth'];
    $day = $_POST['datebirthday'];
    $Ciudad=$_POST['city'];
    $Email=$_POST['email'];
    $Password=$_POST['password'];
    $Passwordconf= $_POST['passwordconf'];
    $Phone=$_POST['phone'];
    $Terms = $_POST['terms'];
    $Avatar=1;

    if (empty($Nombre || $Apellido || $nick || $Email|| $Password || $Phone )) {
      echo "<script> alert('Llene todos los campos ');window.location='signup.php'</script>";
      exit;
    }else{
      if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Correo electronico Incorrecto'); window.location='signup.php'</script>";
        exit;
      }else{
        for ($i=5; $i < 18; $i++) {
        if ($year == "200".$i."") {
          echo "<script> alert('Lo sentimos, solo se pueden registar mayores de 14 años '); window.location='signup.php'</script>";
          exit;
        }
      }
      }
    }
    if ($Password !== $Passwordconf) {
      echo "<script> alert('Las contraseñas no coinciden! '); window.location='signup.php'</script>";
      exit;
    }
    if (isset($Terms)) {
      $date = "$year.'-'.$month.'-'.$day";
      $Terms = 1;
      $Insert="INSERT into user(UsFirstname, UsLastname, UsNickname, UsBirthday, UsCity, UsEmail, UsPassword, UsPhone, UsAvatar, UsConditions) VALUES ('$Nombre','$Apellido', '$nick','$date','$Ciudad','$Email','$Password','$Phone', '$Avatar', '$Terms')";
      $IN=mysqli_query($Conectar,$Insert);
      if ($IN) {
        echo "<script> alert('Registrado exitosamente'); window.location='login.php'</script>";
      }
    } else {
      echo "<script> alert('Debe aceptar los terminos y condiciones'); window.location='signup.php'</script>";
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
                <input class="set-side" type="text" name="lastname" placeholder="Apellido" value="<?php if(isset($Apellido)) echo"$Apellido"?>"/>
                <input class="set-all" type="text" name="nickname" placeholder="Nick" value="<?php if(isset($nick)) echo"$nick"?>">
              </fieldset>

              <fieldset>
                <legend>Fecha de nacimiento</legend>
                <select class="set-sided" name="datebirthyear">
                      <option value="2018">2018</option>
                       <option value="2017">2017</option>
                       <option value="2016">2016</option>
                       <option value="2015">2015</option>
                       <option value="2014">2014</option>
                       <option value="2013">2013</option>
                       <option value="2012">2012</option>
                       <option value="2011">2011</option>
                       <option value="2010">2010</option>
                       <option value="2009">2009</option>
                       <option value="2008">2008</option>
                       <option value="2007">2007</option>
                       <option value="2006">2006</option>
                       <option value="2005">2005</option>
                       <option value="2004">2004</option>
                       <option value="2003">2003</option>
                       <option value="2002">2002</option>
                       <option value="2001">2001</option>
                       <option value="2000">2000</option>
                       <option value="1999">1999</option>
                       <option value="1998">1998</option>
                       <option value="1997">1997</option>
                       <option value="1996">1996</option>
                       <option value="1995">1995</option>
                       <option value="1994">1994</option>
                       <option value="1993">1993</option>
                       <option value="1992">1992</option>
                       <option value="1991">1991</option>
                       <option value="1990">1990</option>
                       <option value="1989">1989</option>
                       <option value="1988">1988</option>
                       <option value="1987">1987</option>
                       <option value="1986">1986</option>
                       <option value="1985">1985</option>
                       <option value="1984">1984</option>
                       <option value="1983">1983</option>
                       <option value="1982">1982</option>
                       <option value="1981">1981</option>
                       <option value="1980">1980</option>
                       <option value="1979">1979</option>
                       <option value="1978">1978</option>
                       <option value="1977">1977</option>
                       <option value="1976">1976</option>
                       <option value="1975">1975</option>
                       <option value="1974">1974</option>
                       <option value="1973">1973</option>
                       <option value="1972">1972</option>
                       <option value="1971">1971</option>
                       <option value="1970">1970</option>
                       <option value="1969">1969</option>
                       <option value="1968">1968</option>
                       <option value="1967">1967</option>
                       <option value="1966">1966</option>
                       <option value="1965">1965</option>
                       <option value="1964">1964</option>
                       <option value="1963">1963</option>
                       <option value="1962">1962</option>
                       <option value="1961">1961</option>
                       <option value="1960">1960</option>
                       <option value="1959">1959</option>
                       <option value="1958">1958</option>
                       <option value="1957">1957</option>
                       <option value="1956">1956</option>
                       <option value="1955">1955</option>
                       <option value="1954">1954</option>
                       <option value="1953">1953</option>
                       <option value="1952">1952</option>
                       <option value="1951">1951</option>
                       <option value="1950">1950</option>
                       <option value="1949">1949</option>
                       <option value="1948">1948</option>
                       <option value="1947">1947</option>
                       <option value="1946">1946</option>
                       <option value="1945">1945</option>
                </select>
                <select class="set-sided" name="datebirthmonth">
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                </select>
                <input class="set-sided" type="number" name="datebirthday" placeholder="Dia" value="<?php if(isset($FechaNac)) echo"$FechaNac"?>"/>
              </fieldset>

              <fieldset >
                <input class="set-all" type="email" name="email" placeholder="Correo electrónico" value="<?php if(isset($Email)) echo"$Email"?>"/>
                <input class="set-all" type="password" name="password" placeholder="Contraseña">
                <input class="set-all" type="password" name="passwordconf" placeholder="Confirmar contraseña">
              </fieldset>

              <fieldset>
                <input  class="set-all" type="phone" name="phone" placeholder="Teléfono" value="<?php if(isset($Phone)) echo"$Phone"?>"/>
              </fieldset>


                </div>
                <div class="container-actionbtn">
                <input type="checkbox" name="terms" value="">
                <label class="terms">Estoy de acuerdo con los <a href="#">Terminos y condiciones</a> además he leído y conozco las <a class="Privacidad" href="privacy.php">Politicas de privacidad</a>.</label>
                <input class="free-account" type="submit" name="create_account" value="¡Crear una cuenta gratis!">
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
