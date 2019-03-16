<?php 
	include_once 'header.php';
 ?>
<!doctype html>
<html>
<head>
<!--
    Home Page (ve_home.php)
    Author: Nicole Blanco
    Date:   1/31/19
    Edited: Jessica Aguirre
   -->

   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>VeganEats</title>
   <link href="css/main.css" rel="stylesheet">
</head>


<body>
	<?php  

				if (isset($_SESSION['u_id'])) {
					echo "You are logged in!";
				}

			?>
	<header>
		<img src="VeganEats logo.png" alt="VeganEats">
	</header>

	<nav class = "nav">
		<ul>
			<li><a href="index.php" class="Home" >Home</a></li>
			<li><a href="ve_aboutus.html" class = "AboutUs">About Us</a></li>
			<li><a href="ve_vegan.html" class = "VeganRecipes">Vegan Recipes</a></li>
			<li><a href="ve_vegetarian.html" class = "VegetarianRecipes">Vegetarian Recipes</a></li>
			<li><a href="ve_glutenfree.html" class = "GlutenFreeRecipes">Gluten Free Recipes</a></li>
			<li><a href="ve_makeyourown.html" class = "BuildYourBite">Build Your Bite</a></li>
			<li><a href="ve_faq.html" class = "FAQ">FAQ</a></li>
			<li><a href="ve_contactus.html" class = "ContactUs">Contact Us</a></li>
			<li><a href="ve_login.html" class = "Login">Log In</a></li>
			<li><a href="ve_signup.html" class = "SignUp">Sign Up</a></li>
		</ul>
	</nav>
     
	 <section class = "article">
		<div class="main-text">
			<!-- <ul class="main-text-of-page"> -->
			<!-- <li class="site-welcome"></li> -->
			<!-- </ul> -->
			<p>Welcome to the homepage of VeganEats! If you have any recipes of your own to share, check out our Build Your Bite generator where we have our custom made Recipe Creator. Create an account now!</p>
		</div>
	</section>
</body>

  <section class = "footer">
      <h3>Social Media</h3>
<div id = "social">
<ul>
<li><a href="#">Twitter</a></li>
<li><a href="#">Instagram</a></li>
</ul>
</div>
   </section>
</html>
<?php 
	include_once 'footer.php';
?>