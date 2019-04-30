<?php
  session_start();
?>

<!doctype html>
<html>
<head>
<!--
    Custom Recipe Page (veggie_recipe.php)
    Author: Jessica Aguirre

   -->

   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>VeganEats</title>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="css/recipe.css" rel="stylesheet">
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
        <span class="navbar-burger burger" data-target="navMenu">
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
	   	<h1>Check Out Our Featured Vegetarian Dishes</h1>

	 <div class="card-content">
    <div class="media">
      <div class="media-center">
        <figure class="image is-square">
          <img id="rec_image" alt="Loading Image...">
        </figure>
      </div>
    </div>
      <div class="media-content">
        <h3 id="recipe_title">Loading Title...</h3>
        <div id="recipe_desc">Loading Description...</div>
    </div>

  <h2>Rate and Leave a Comment!</h2>
  <!-- <div class="container"> -->
    <div class="main-text">
      <div class="control">
   <form method="POST" id="comment_form">
   <select id="recipe-select" name="recipe-select" class="select" onchange="change_recipe()"></select>
 </div>
        <div id="starContainer">
            <i id="star1" class="fa fa-star"></i>
            <i id="star2" class="fa fa-star-o star"></i>
            <i id="star3" class="fa fa-star-o star"></i>
            <i id="star4" class="fa fa-star-o star"></i>
            <i id="star5" class="fa fa-star-o star"></i>
        </div>

    <div class="form-group">
     <textarea class="textarea has-fixed-size" name="comment_content" id="comment_content" class="form-control" placeholder="Comment on a recipe here!" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="button" value="Submit"/>
    </div>
   <span id="comment_message"></span>
   <div id="display_comment"></div>
  </div>
</div>
</section>
</body>

<br>
<br>
<h1 style="font-size: 1.33em">Google Searches for "vegetarian" Have Gained Massive Interest.</h1>
<h2 style="font-size: 1.2em">Check out the stats below:</h2>
<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/1754_RC01/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("GEO_MAP", {"comparisonItem":[{"keyword":"vegan","geo":"US","time":"2012-01-01 2018-01-01"},{"keyword":"vegetarian","geo":"US","time":"2012-01-01 2018-01-01"},{"keyword":"gluten free","geo":"US","time":"2012-01-01 2018-01-01"}],"category":0,"property":""}, {"exploreQuery":"date=2012-01-01%202018-01-01&geo=US&q=vegan,vegetarian,gluten%20free","guestPath":"https://trends.google.com:443/trends/embed/"}); </script> 

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

  <div class="contact">
    <h4 align="right">Contact Us</h4>
    <p align="right">Email: veganEats@mail.com</p>
    <p align="right">Tel: 1800-555-5555</p>
    </div>
   </section>
</html>

<script>
$(document).ready(function(){
   //Object that is used to fill the "recipes-box" and "ddlViewBy"
  $(".star").mouseenter((e) => {
	const count = $(e.target).attr("id").match(/\d+/)[0];

		if ($(e.target).hasClass("fa-star-o")) {
			for (var countup = 0; countup <= count; countup++) {
				$("#star"+countup).removeClass("fa-star-o");
			  $("#star"+countup).addClass("fa-star");
			}
		}
		else {
			for (var countdown = 5; countdown >= count; countdown--) {
				$("#star"+countdown).removeClass("fa-star");
				 $("#star"+countdown).addClass("fa-star-o");
			 }
		 }
	});


	$('#comment_form').on('submit', function(event){
		event.preventDefault();
		var form_data = $(this).serialize();

		const stars = $("#starContainer").children();
		var ammountOfFilledInStars = 0;

		for (var i = 0; i < stars.length; i++) {
			if ($(stars[i]).hasClass("fa-star")) {
			ammountOfFilledInStars = $(stars[i]).attr("id").match(/\d+/)[0]
			}
		 }
		form_data += "&rating=" + ammountOfFilledInStars;
		console.log('form data: '+form_data);
		$.post({
			type: "POST",
			url:"add_comment.php",
			data:form_data,
			success:function(data)
			{
				console.log('return data: '+data);
				if(data.error != '')
				{
					$('#comment_form')[0].reset();
					$('#comment_message').html(data.error);
					$('#comment_id').val('0');
				}
			}
		});
	});

	$(document).on('click', '.reply', function(){
		var comment_id = $(this).attr("id");
		$('#comment_id').val(comment_id);
	});

});


//Create drop down option for every recipe
$.ajax({

    url: "recipePHP/fetch_vegetarian.php",
    method: "GET",
    dataType: 'json',
    success: function(data) {
        data.forEach(function(sql_recipe) {

            var key = sql_recipe['recipe_id'];
            var value = sql_recipe['recipe_title'];

            $('#recipe-select').append('<option value="' + key + '">' + value + '</option>');

        });
        //Load newest recipe
        change_recipe();
    }
});

//Load new info on changing recipe
function change_recipe(){

  var select = document.getElementById("recipe-select");
  var id = select.value

  $.ajax({

  url: "recipePHP/get_recipe_byID.php",
  method: "POST",
  data: {id : id},
  dataType: 'json',
  success: function(data) {
      data.forEach(function(sql_recipe) {

          var title = sql_recipe['recipe_title'];
          document.getElementById("recipe_title").innerHTML = title;
      });
  }
  });

//Set image
$.ajax({

url: "recipePHP/get_image_byID.php",
method: "POST",
data: {id : id},
dataType: 'json',
success: function(data) {
    data.forEach(function(sql_recipe) {
        document.getElementById("rec_image").src = "uploadedImages/" + id + "/" + sql_recipe['image_name']
    });
}
});

$.ajax({

url: "recipePHP/get_desc_byID.php",
method: "POST",
data: {id : id},
dataType: 'json',
success: function(data) {
  document.getElementById("recipe_desc").innerHTML = "";
    data.forEach(function(sql_recipe) {

      var node = document.createElement("LI");
      var textnode = document.createTextNode(sql_recipe['ingredient_name'] + ": " + sql_recipe['description']);
      node.appendChild(textnode);
      document.getElementById("recipe_desc").appendChild(node);
    });
}
});


//Load comments
var recipeID = document.getElementById("display_comment")
document.getElementById("display_comment").innerHTML = ""
$.ajax({
   url:"fetch_comment.php",
   method:"POST",
   data: {id : id},
   dataType: 'json',
   success:function(data)
   {
       data.forEach(function(comment){
              console.log(comment['comment_id'])


              var node = document.createElement("LI");
              var textnode = document.createTextNode(comment["user_username"] + ": " + comment["comment"]);
              node.appendChild(textnode);

            recipeID.appendChild(node);

             for (var i = 1; i <= comment['rating']; i++) {

                var newtag = document.createElement("i");
                newtag.classList.add('fa');
                 newtag.classList.add('fa-star');
                 recipeID.appendChild(newtag);


            }

            if ((comment['rating'] - 5) != 0) {
                for (var i = comment['rating']; i < 5; i++) {
                  var newtag = document.createElement("i");
                newtag.classList.add('fa');
                 newtag.classList.add('fa-star-o');
                 recipeID.appendChild(newtag);
                }
            }

       });
   }
  });
}

</script>
