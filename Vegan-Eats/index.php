<?php 
	include_once 'header.php';
 ?>
<!doctype html>
<html>
<head>
<!--
    Home Page (ve_home.html)
    Author: Nicole Blanco
    Date:   1/31/19
   -->

   <meta charset="utf-8" />
   <title>VeganEats</title>


		</div>
	</section>
	</head>
	<body>
	<section class="main-container">
		<div class="main-wrapper">
		<?php  

				if (isset($_SESSION['u_id'])) {
					echo "You are logged in!";
				}

			?>
  <header>
	 <a href="ve_home.html"><img src="VeganEats logo.png" alt="Vegie Eats banner" />
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
		<div class="main-text">
			<ul class="main-text-of-page">
				<li class="site-welcome">Welcome to VeganEats!</li>
			</ul>
					<p>Welcome to VeganEats! If you have any recipes of your own to share, 
					look at our Make Your Own web page where we have our custom made Recipe Creator. 
					Create and share your recipes with other users in this all natural environment. </p>
		</div>
	<article>
  <footer>
      <h3>Social Media</h3>
<nav>
<ul>
<li><a href="#">Twitter</a></li>
<li><a href="#">Instagram</a></li>
</ul>
</nav>
   </footer>
</html>

<?php 
	include_once 'footer.php';
?>