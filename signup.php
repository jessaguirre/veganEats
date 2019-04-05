<?php 
	include_once 'header.php';
 ?>
<!doctype html>
<html>
<head>
<!--
    Home Page
    Author: Nicole Blanco
    Date:   1/31/19
    Edited: Jessica Aguirre
   -->

   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>VeganEats</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link href="css/main.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
</head>

<body>
  <header>
    <img src="VeganEats logo.png" alt="VeganEats">
  </header>

  <nav class = "navbar is-fixed-top">
    <div class ="container">
      <div class ="navbar-brand">
        <a class="navbar-item" href = "index.php" style = "font-weight:bold;">VeganEats</a>

        <span class="navbar-burger" data-target="navMenu">
          <span></span>
          <span></span>
        </span>
      </div>
    <div id="navMenu" class="navbar-menu">
      <div class="navbar-end"> 
      <a href="ve_aboutus.html" class = "navbar-item">About Us</a> 
      <a href="vegan.php" class = "navbar-item">Vegan Recipes</a> 
      <a href="v2-vegetarian.php" class = "navbar-item">Vegetarian Recipes</a> 
      <a href="glutenfree.php" class = "navbar-item">Gluten Free Recipes</a> 
      <a href="ve_makeyourown.html" class = "navbar-item">Build Your Bite</a> 
      <a href="ve_faq.html" class = "navbar-item">FAQ</a> 
      <a href="ve_contactus.html" class = "navbar-item">Contact Us</a> 
      <a href="ve_login.html" class = "navbar-item">Log In</a> 
      </div>
    </div>
  </div>  
</nav>
     
   <section class = "article">
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Signup</h2>
			<ul>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<li><input type="text" name="first" placeholder="Firstname"></li>
				<li><input type="text" name="last" placeholder="Lastname"></li>
				<li><input type="text" name="email" placeholder="E-mail"></li>
				<li><input type="text" name="uid" placeholder="Username"></li>
				<li><input type="password" name="pwd" placeholder="Password"></li>
				<button type="submit" name="submit">Sign up</button>
			</form>
			</ul>
		</div>
		</section>
	</section>
	  <footer>
	<h3>Social Media</h3>
		<nav>
		<ul>
		<li><a href="#">Twitter</a></li>
		<li><a href="#">Instagram</a></li>
		</ul>
		</nav>
</footer>
</body>
</html>

<?php 
	include_once 'footer.php';
?>
