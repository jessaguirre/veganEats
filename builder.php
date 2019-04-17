<!DOCTYPE html>
<html>
<head>
	<title>Recipe Builder</title>
	<link href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.10.2.js">
	</script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js">
	</script>
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
    }

	</style>
</head>
<body>

	<div class="builder">
		<ul class='droptrue' id="sortable1">
			<p>Ingredients</p> <!--Items added here-->
		</ul>
		<ul class='droptrue' id="sortable2" style="height: 100%;">
			<p>Added Ingredients</p>
		</ul>
	</div>

<form action="add_recipe.php" method="post">
	<input type="text" name="name" value="">

		<select name="recipe_type">
			<option>Vegetarian</option>
			<option>Vegan</option>
			<option>Gluten-free</option>
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
</html>
