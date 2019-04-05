<?php 
	include_once 'header.php';
 ?>
<!doctype html>
<html>
<head>
<!--
    Sign Up Page (ve_signup.html)
    Author: Nicole Blanco
    Date:   1/31/19
   -->

   <meta charset="utf-8" />
   <title>Vegie Eats</title>

</head>
<body>
  <header>
	<a href="index.php"><img src="#" alt="Vegie Eats banner" />
	 <link href="#.css" rel="stylesheet" type="text/css">
	<nav>
		<ul>
			<li><a href="index.php" class="Home" >Home</a></li>
			<li><a href="aboutus.html" class = "AboutUs">About Us</a></li>
			<li><a href="vegan.html" class = "VeganRecipes">Vegan Recipes</a></li>
			<li><a href="vegetarian.html" class = "VegetarianRecipes">Vegetarian Recipes</a></li>
			<li><a href="glutenfree.html" class = "GlutenFreeRecipes">Gluten Free Recipes</a></li>
			<li><a href="makeyourown.html" class = "MakeYourOwn">Make Your Own</a></li>
			<li><a href="faq.html" class = "FAQ">FAQ</a></li>
			<li><a href="contactus.html" class = "ContactUs">Contact Us</a></li>
		</ul>
	</nav>
     </header>
     <article>
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
		</article>
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
