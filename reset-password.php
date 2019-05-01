<?php 
  include_once 'header.php';
 ?>
<!doctype html>
<html>
<head>

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
  <nav class = "navbar is-fixed-top">
    <div class ="container">
      <div class ="navbar-brand">
        <a class="navbar-item" href = "index.php">
          <img src = "navLogo.png" alt= "Logo">
        </a>
        <span class="navbar-burger" data-target="navMenu">
          <span></span>
          <span></span>
        </span>
      </div>
    <div id="navMenu" class="navbar-menu">
      <div class="navbar-end"> 
      <a href="ve_aboutus.html" class = "navbar-item">About Us</a> 
      <a href="vegan.php" class = "navbar-item">Vegan Recipes</a> 
      <a href="vegetarian.php" class = "navbar-item">Vegetarian Recipes</a> 
      <a href="glutenfree.php" class = "navbar-item">Gluten Free Recipes</a> 
      <a href="builder.php" class = "navbar-item">Build Your Bite</a> 
      <a href="ve_faq.html" class = "navbar-item">FAQ</a> 
      <a href="signup.php" class = "navbar-item">Sign Up</a> 
      </div>
    </div>
  </div>  
</nav>
     
   <section class = "article">
    <header id = "hero">
    <img src="VeganEats logo.png" alt="VeganEats" id="hero-image">
  </header>
  <section class="main-container">
    <div class="main-text">
      <h1>Forgot Password</h1>
      <p>Check your inbox for instructions on how to reset your password.</p>
      <form class="form-resetpwd" action="includes/reset-request.inc.php" method="post">
        <input type="text" class="input" name="email" placeholder="Please enter your email.">
        <button type="submit" class = "button is-rounded" name="reset-request-submit">Reset Password</button>
        <br>
        <br>
      </form>
      </div>
    </section>
  </section>

      <?php
  
  /* If reset request is successful you get a email */
  
        if (isset($_GET["reset"])) {
          if ($_GET["reset"] == "success") {
            echo '<p class="signupsuccess">Check your e-mail!</p>';
          }
        }
      ?>

    <!-- footer -->
   <section class = "footer">
      <h3>Social Media</h3>
  <div id = "social">
    <div class="columns">

    <div class="column">
    <figure class="image is-32x32">
    <img src="social-twitter.svg">
  </figure>
  </div>

    <div class="column">
    <figure class="image is-32x32">
    <img src="social-instagram.svg">
  </figure>
  </div>

  </div>
  </div>
     </section>
</body>
</html>

<?php
  require 'footer.php';
?>
