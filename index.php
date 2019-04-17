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
	<?php  

				if (isset($_SESSION['u_id'])) {
					echo "You are logged in!";
				}

			?>
			
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
      <a href="ve_makeyourown.php" class = "navbar-item">Build Your Bite</a> 
      <a href="ve_faq.html" class = "navbar-item">FAQ</a> 
      <a href="ve_contactus.html" class = "navbar-item">Contact Us</a> 
      <a href="signup.php" class = "navbar-item">Sign Up</a> 
      </div>
    </div>
  </div>  
</nav>
     
	 <section class = "article">
		<div class="main-text">
			<!-- <ul class="main-text-of-page"> -->
			<!-- <li class="site-welcome"></li> -->
			<!-- </ul> -->
			<h1>Enter Motto Here</h1>
      <p><strong>Welcome to the homepage of VeganEats!</strong></p>
      <img src = "homepage-welcome.jpg" alt = "Healthy Meal"> 
      <p>If you have any recipes of your own to share, check out our Build Your Bite generator where we have our custom made Recipe Creator. </p>
      <h2>Featured Recipes</h2>
      <img src = "ve1-asparagus-pizza.jpg" alt = "Asparagus Pizza"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh praesent tristique magna sit amet purus.</p>

      <div class="column">
      <a href="signup.php" class = "button is-rounded">Create an account now!</a>
    </div>
		</div>
	</section>
</body>

  <section class = "footer">
      <h3>Social Media</h3>
<div id = "social">

  <div class="columns">
  <div class="column">
  <figure class="image is-24x24">
  <img src="social-twitter.svg">
</figure>
</div>

  <div class="column">
  <figure class="image is-24x24">
  <img src="social-instagram.svg">
</figure>
</div>
</div>
</div>
   </section>
</html>
<?php 
	include_once 'footer.php';
?>
