<!doctype html>
<html>
<head>
<!--
     (v2-vegetarian.php)
    Author: Nicole Blanco
    Date:   1/31/19
    Edited: Jessica Aguirre
   -->

   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>VeganEats</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link href="css/builder.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">

   <link href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  </head>

	<script>
	     $(function() {
			   $("ul.droptrue").sortable({
			       connectWith: "ul",
			   });

			   $("ul.dropfalse").sortable({
			       connectWith: "ul",
			       dropOnEmpty: false
			   });

			   $("#sortable1, #sortable2").disableSelection();
	});

	</script>
<body>
  <nav class = "navbar is-fixed-top">
    <div class ="container">
      <div class ="navbar-brand">
        <a class="navbar-item" href = "index.php">
          <img src = "navLogo.png" alt= "Logo" width="105" height="28">
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

<section class ="main-text">
<header id = "hero">
    <img src="VeganEats logo.png" alt="VeganEats" id="hero-image">
  </header>

  <form>
  <div class ="card">
  <div class ="card-content">
    <div class="media">
        <figure class="image is-48x48">
          <img src="notepad.png" alt="Healthy Icon">
        </figure>
    <div class="content">
      <h2>How to Build Your Bite:</h2>
      <ol>
      <li>Choose the ingredients you used.</li>
      <li>Type in specific quanities and instructions.</li>
      <li>Drag the ingredient boxes to the right.</li>
      <li>Pick a recipe name and category.</li>
      <li>Upload a file and hit Submit!</li>
      </ol>
  <input type="text" class="input" id="name" name="name" value="" placeholder="Recipe Name">
    <select type="text" class="select is-rounded" name="recipe_type">
      <option value ="Vegetarian">Vegetarian</option>
      <option value ="Vegan">Vegan</option>
      <option value ="Glutenfree">Gluten-free</option>
    </select>
    <br>
    <br>
    <input type="file" class="button" name="recipeImage" id="recipeImage" accept="image/*"/>
    <button type="button" class="button" onclick="post_recipe_ingredients()">Submit</button>
  </div>
  </div>
</form>
</section>

    <div class="builder">
    <div id="builder-body">
		<ul class='droptrue' id="sortable1">Ingredients</ul>
  </div>
  <div id="builder-body">
		<ul class='droptrue' id="sortable2">Added Ingredients</ul>
  </div>
	</div>
</body>
</html>

<script>

var ingredients_array = [];

load_ingredients();

function load_ingredients() {

    $.ajax({

        url: "fetch_ingredient.php",
        method: "POST",
				async: false,
        dataType: 'json',
        success: function(data) {
            data.forEach(function(ingredient) {
								ingredients_array.push(ingredient['ingredient_title']);
            });
        }
    });
}
    //Add ingredients
    var arrayLength = ingredients_array.length;
    for (var i = 0; i < arrayLength; i++) {
      var newtextarea = "<textarea class='ing_textbox'; id='" + ingredients_array[i] + "'></textarea>"
			var newitem = '<li class="ui-state-default">' + ingredients_array[i] + newtextarea + "</li>"
			$("#sortable1").append(newitem);
    }

    //Create table-ingredient relationship
    function post_recipe_ingredients() {

    var insert_ingredients = []
    var ingredient_textboxes = document.getElementsByClassName("ing_textbox");
    for (var i = 0; i < ingredient_textboxes.length; i++) {
      if (ingredient_textboxes[i].parentNode.parentNode.id == "sortable2"){
        insert_ingredients.push(ingredient_textboxes[i].id + ";" + ingredient_textboxes[i].value);
      }
    }

    //Create values ready to post
    var name = document.getElementsByName ("name")[0].value;
    var recipe_type = document.getElementsByName ("recipe_type")[0].value;
    var insert_ingredients_joined = insert_ingredients.join(',');

    var newid = "";
    $.ajax({
       url : 'add_recipe.php',
       type : 'POST',
       async: false,
       data : {name: name,recipe_type:recipe_type,insert_ingredients_joined: insert_ingredients_joined},
       //processData: false,  // tell jQuery not to process the data
       //contentType: false,  // tell jQuery not to set contentType
       success : function(data) {
         newid = data;

       },
      error: function(xhr, textStatus, errorThrown){
        alert(errorThrown);
      }
});
newid = newid.replace('"','')
newid = newid.replace('"','')
//Create formData for image
var f = $('#recipeImage')[0].files[0];
var form_data = new FormData();
form_data.append('file', f);
form_data.append('newid', newid);

$.ajax({
       url : 'uploadImage.php',
       type : 'POST',
       data : form_data,
       dataType: 'text',  // what to expect back from the PHP script, if anything
       cache: false,
       processData: false,  // tell jQuery not to process the data
       contentType: false,  // tell jQuery not to set contentType
       success : function(data) {
           location.reload(true);
       },
      error: function(xhr, textStatus, errorThrown){
        console.log(errorThrown + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
});
}

</script>
