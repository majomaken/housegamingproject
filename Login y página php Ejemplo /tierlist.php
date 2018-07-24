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
<html>
<head>
	<title>Divs class</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Eater" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/learndivs.css">
</head>

<body>
	<?php if(!empty($user)): ?>
		<header>
			<h1>Support Tier List</h1>
			<p><h2>Champion Difficulty</h2></p>
			<p>
				<strong><span style="color:green">Green Circle</span></strong><span style="color:white"> = Easy</span><br>
				<strong><span style="color:yellow">Yellow Circle</span></strong><span style="color:white"> = Medium</span>
				<strong><span style="color:red">Red Circle</span></strong><span style="color:white"> = Hard</span>
			</p>
		</header>
			<section>
		<div id="divprincipal">

		<!-- div1 -->
				<div class="divp">
					<div id="d1">
						<h3>Morgana</h3>
					</div>
				</div>

		<!-- div2 -->
				<div class="divp">
					<div id="d2">
						<h3>Brand</h3>
					</div>
				</div>
		<!-- div3 -->
				<div class="divp">
					<div id="d3">
						<h3>Pyke</h3>
					</div>
				</div>
		<!-- div4 -->
				<div class="divp">
					<div id="d4">
						<h3>Soraka</h3>
					</div>
				</div>
		<!-- div5 -->
				<div class="divp">
					<div id="d5">
						<h3>Alistar</h3>
					</div>
				</div>
		<!-- div6 -->
				<div class="divp">
					<div id="d6">
						<h3>Nami</h3>
					</div>
				</div>
		<!-- div7 -->
				<div class="divp">
					<div id="d7">
						<h3>Zyra</h3>
					</div>
				</div>
		<!-- div8 -->
				<div class="divp">
					<div id="d8">
						<h3>Fiddlesticks</h3>
					</div>
				</div>
		<!-- div9 -->
				<div class="divp">
					<div id="d9">
						<h3>Bard</h3>
					</div>
				</div>
		<!-- div9 -->
				<div class="divp">
					<div id="d10">
						<h3>Taric</h3>
					</div>
				</div>
		</div>
			</section>
		<footer>
				<strong><a href="logout.php">Logout</a></strong>
		</footer>
	<?php else: ?>
		<h1>Welcome to League</h1>

		<a href="login.php">Login</a> or
		<a href="signup.php">SignUp</a>
	<?php endif; ?>

</body>
</html>
