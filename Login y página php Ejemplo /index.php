<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password, city FROM users WHERE id=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
      $user = $results;
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <?php require 'partials/styles.php' ?>
  </head>
  <body>

    <?php require 'partials/header.php' ?>

      <?php if(!empty($user)): ?>
        <?php header('Location: tierlist.php');?>
      <?php else: ?>
        <h1>Welcome to League</h1>

        <a href="login.php">Login</a> or
        <a href="signup.php">SignUp</a>
      <?php endif; ?>


  </body>
</html>
