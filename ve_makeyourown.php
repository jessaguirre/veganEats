<!doctype html>
<html>
<head>
<!--
     (ve_makeyourown.php)
  
   -->

   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>VeganEats</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link href="css/main.css" rel="stylesheet">
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

	<style type="text/css">
    #sortable1, #sortable2 {
     list-style-type: none;
     float: left;
     margin-right: 10px;
     background: #70A3CC;
     padding: 0;
     width: 352px;
    }
		#sortable1 li, #sortable2 li {
     margin: 0px;
     padding: 0px;
     font-size: 1.2em;
     width: 100%;
     position: relative;
    }

	</style>


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
      <a href="vegetarian.php" class = "navbar-item">Vegetarian Recipes</a> 
      <a href="glutenfree.php" class = "navbar-item">Gluten Free Recipes</a> 
      <a href="ve_makeyourown.php" class = "navbar-item">Build Your Bite</a> 
      <a href="ve_faq.html" class = "navbar-item">FAQ</a> 
      <a href="ve_contactus.html" class = "navbar-item">Contact Us</a> 
      <a href="signup.php" class = "navbar-item">Sign Up</a> 
      </div>
    </div>
  </div>  
</nav>



<div class="builder">
		<ul class='droptrue' id="sortable1">
			Ingredients
		</ul>
		<ul class='droptrue' id="sortable2" style="height: 100%;">
			Added Ingredients
		</ul>
	</div>

<form action="add_recipe.php" method="post">
	<input type="text" name="name" value="">

		<select name="recipe_type">
			<option value ="Vegetarian">Vegetarian</option>
			<option value ="Vegan">Vegan</option>
			<option value ="Glutenfree">Gluten-free</option>
		</select>

		<input type="submit" value="Submit">
  </form>
</body>

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
    var arrayLength = ingredients_array.length;
    for (var i = 0; i < arrayLength; i++) {
			var newitem = '<li class="ui-state-default">' + ingredients_array[i] + '<textarea class="ing_textbox"; style="resize: none; width:100%; height:100%;" rows="4" cols="50"></textarea></li>'
			$("#sortable1").append(newitem);
    }


</script>
