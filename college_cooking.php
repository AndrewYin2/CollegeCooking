<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="college_cooking.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>CollegeCooking - View recipes and more!</title>
    </head>
    <link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet'>
    <body style="background-image: url('background2.jpg')"></body>

        <?php
      if(isset($_SESSION['loggedin']))
      {
        echo '<a href="logouthandler.php" class="btn btn-danger">Log Out</a>';
      }
      else
      {
        echo '<a href="loginhandler.php" class="btn btn-primary">Log In</a>';
      }
      ?>

        <div class="header">
            <img src="Logo2.png" alt="logo" style="margin:auto">
            <form action="quick_search_handler.phpx" method="POST">
                <input style="font-family:Allura;font-size: 22px" type="text" class="form-control" name="search" id="search" placeholder="Quick search for a recipe:">
                <input type="submit" style="display:none">
            </form>
        </div><br>
        
        <div class="accordion" id="box" style="font-family:Allura;font-size: 22px;border-radius: 25px;">
            <h3 style="text-align:center;font-weight: bold;font-size: 50px">Features</h3>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button style="text-align:center;font-weight: bold;font-size: 30px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Advanced Search
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                <div class="accordion-body" style="background-color:white;">
                  <div class="info-text">Don't know what to make? Use this to find a recipe that fits your preferences!</div>
                  <div style="text-align:center;"><a href="search_recipe.php">Advanced Search</a></div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button style="text-align:center;font-weight: bold;font-size: 30px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Recipe Difficulty
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                <div class="accordion-body" style="background-color:white;">
                  <div class="info-text">Recipes have difficulty levels! Filter your search with your preferred difficulty level.</div>
                  <img src="difficulty.png" style="height:400px">
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button style="text-align:center;font-weight: bold;font-size: 30px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Share Your Recipes
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                <div class="accordion-body" style="background-color:white;">
                  <div class="info-text">Post and share your recipes for others to see!</div>
                  <div style="text-align:center;"><a href="new_recipe.php">Click Here to Submit a New Recipe</a></div>
                </div>
              </div>
            </div>
          </div> <br>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
