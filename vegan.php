<!doctype html>
<html>
<head>
<!--
    Home Page (v2-vegetarian.php)
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
    <div class="gluten-free">
      <ul class="gluten-free-ul-class">
        <li class="gluten-free-li-class"></li>
      </ul>
          <h1> Vegan Recipes </h1>
          <!--8 Gluten Free Recipes will go below this line. Create a box for each one for now.-->
          <dl id="recipes-box">
            
          </dl> 
          <dl id="rating-box"></dl> 
          <dl id="comment-box"></dl>
    </div>
  

  <h2>Comment on a Recipe</h2>
  <br/>
  <div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
    </div>
       <div class="form-group">
        <select name="selected_recipe" id="ddlViewBy">
        </select>
       </div>
        <div class="form-group">
            <select name="rating" id="ratingViewBy">
            </select>
        </div>
       
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
  </section>
 </body>

  <!-- footer -->
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

<script>
$(document).ready(function(){
   //Object that is used to fill the "recipes-box" and "ddlViewBy"
   var selectValues = {
          'Vegan_Mac_and_Cheese': 'Super Healthy',
          'Spring_Vegetable_Lo_Mein': 'Veggilicious',
          'Butternut_Squash_Linguine': 'Creamy and delicious',
          'Vegan_Burrito_Bowl': 'Super easy and flavorful'
        };
        
        //The ID of the DL that is used to put the Recipes in       
        var recipesbox = $('#recipes-box');
        //# means id
        //The ID of the select where the recipies need to go into
        var recipesSelectBox = $('#ddlViewBy');
          
          //Foreach loop that loops throught the Object that contains the deired values to write
          $.each(selectValues, function(key,value) {
          //This sdds the "DT" tags in the recipesbox, and filles them with the key "The left part of the object" for both the ID and the text
            var id = key.replace(" ", "");
            
            recipesbox.append(
                $('<div></div>')
                .attr("id", id)
                .attr("class", "recipe_div")
            );
              $('#'+id).append(
                $('<dt></dt>')
              .text(key)
            );
          //This adds the "DD" tags below the "DT" tags that are created above with the value "The right part of the object" for the text of the "DD"
            $('#'+id).append(
                $('<dd></dd>')
              .text(value)
            );
    
            recipesSelectBox.append(
                $('<option></option>')
                .attr("value",key.trim())
              .text(key)
                  );
          });

        //Object that is used to fill the "recipes-box" and "ddlViewBy"
      var ratingValues = {
          '5 Stars':'5 Stars',
          '4 Stars':'4 Stars',
          '3 Stars':'3 Stars',
          '2 Stars':'2 Stars',
          '1 Stars':'1 Stars'
        };
        
      //The ID of the DL that is used to put the Recipes in       
      var ratingbox = $('#rating-box');
      
      //The ID of the select where the recipies need to go into
      var ratingSelectBox = $('#ratingViewBy');
        
        //Foreach loop that loops throught the Object that contains the deired values to write
        $.each(ratingValues, function(key,value) {   
        //Adds options to the select value
              ratingSelectBox.append(
                $('<option></option>')
                .attr("value",key.trim())
              .text(key)
          );
        });
 
      $('#comment_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        
        $.ajax({
        url:"add_comment.php",
        method:"POST",
        data:form_data,
        dataType:"JSON",
        success:function(data)
        {
            console.log(data);
          if(data.error != '')
          {
          $('#comment_form')[0].reset();
          $('#comment_message').html(data.error);
          $('#comment_id').val('0');
          load_comment();
          }
        }
        })
      });

 load_comment();
 
 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   dataType: 'json',
   success:function(data)
   {
       data.forEach(function(recipe){
              var recipeID = $("#"+recipe['recipe_name'].replace(" ", "")); //removes spaces
              
            recipeID.append(
              $('<dt></dt>')
              .text(recipe["comment_sender_name"])
            );
            recipeID.append(
             $('<dt></dt>')
              .text(recipe["comment"])
            );
             recipeID.append(
                $('<dd></dd>')
              .text(recipe['rating'])
            ); 
       });
   }
  });
 }
 
$(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
});
</script>

