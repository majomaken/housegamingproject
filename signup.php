<?php
  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['city']))) {
    $sql = "INSERT INTO users (email, `password`, city) VALUES (:email, :password, :city)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':city',$_POST['city']);

    if ($stmt->execute()) {
      $message = 'Successfully created user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <?php require 'partials/styles.php' ?>
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <?php if (!empty($message)): ?>
      <p> <?= $message ?> </p>
    <?php  endif; ?>

    <h1>SignUp</h1>
    <span> or <br> <a href="login.php">Login</a></span>

    <form action="signup.php" method="post">
      <input type="email" name="email" placeholder="Enter your mail">
      <input type="password" name="password" placeholder="Enter password">
      <input type="text" name="city" placeholder="Enter your city">
      <input type="submit" value="Send">
    </form>

  </body>
</html>
