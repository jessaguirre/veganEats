<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <title>login system</title> -->
	<link href="css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
</head>
<body>
	
	<header id="header" class="">
		<nav>
			<div class="main-wrapper">
				<div class="nav-login">
				<!-- <a href= "#"class="forgot">forgot password?</a> -->
					<?php
						if (isset($_SESSION['u_id'])) {
							echo '<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name = "submit">Logout</button>
								</form>';
						} else {
							echo 	'<form action="includes/login.inc.php" method="POST">
									<input type="text" name="uid" placeholder="Username/e-mail">
									<input type="password" name="pwd" placeholder="password">
									<button type="submit" name="submit">Login</button>
									</form>
									<a href="signup.php" class = "hvr-pop">Sign up</a>';
						}
					?>
				</div>
			</div>
		</nav>
	</header><!-- /header -->
	<div class="shadow"></div>