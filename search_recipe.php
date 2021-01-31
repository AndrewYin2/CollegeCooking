<!-- <?php session_start(); ?> -->
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="new_recipe.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>CollegeCooking - View recipes and more!</title>
    </head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <body style="background-image: url('background.jpg')">
        <div style="text-align:center"><a href="college_cooking.html">
            <img src="Logo2.png" alt="logo" style="margin:auto;width:350px">
        </a></div>

        <div id="box" style="font-family:Indie Flower;border-radius: 25px;">
        <div id="form">
            <h1 id="form-title">Search for a Recipe</h1><br>
            <label>Choose a recipe based on your preferences!</label><br><br>
            
            <form action="new_recipe_handler.php" method="POST">
                <meta charset="UTF-8">

                <label for="rname">Recipe Name:</label><br>
                <input type="text" class="form-control" id="rname" name="rname" placeholder="Ex: Eggs Benedict"><br>
                
                <label for="time">Prep Time Range:</label><br>
                <input type="number" class="form-control" id="minTime" name="minTime" min="1" placeholder="Enter minimum time in minutes..."><br>
                <input type="number" class="form-control" id="maxTime" name="maxTime" min="minTime" placeholder="Enter maximum time in minutes..."><br>

                <label for="calories">Calorie Range:</label><br>
                <input type="number" class="form-control" id="minCalories" name="minCalories" min="1" placeholder="Enter minimum calories per serving..." ><br>
                <input type="number" class="form-control" id="maxCalories" name="maxCalories" min="minCalories" placeholder="Enter maximum calories per serving..." ><br>

                <label for="ings">Ingredients:</label><br>
                <input type="text" id="ings" name="ings" placeholder="Ex: Eggs, English Muffins, etc.">
                <input hidden type="text" id="ingnames" name="ingnames" placeholder="hidden value">
                <input style="font-family:Arial" class="btn btn-outline-primary btn-sm" type = "button" value="+" id="addIng"/>
                <input style="font-family:Arial" class="btn btn-outline-primary btn-sm" type = "button" value="-" id="removeIng"/>
                <ul id="ingList"></ul>
                <script>
                    document.getElementById("addIng").onclick = function() {
                        var text = document.getElementById("ings").value;
                        var textNode = document.createTextNode(text);
                        var li = document.createElement("li");
                        li.appendChild(textNode);
                        document.getElementById("ingList").appendChild(li);
                        document.getElementById("ings").value = "";
                        document.getElementById("ingnames").value += text + ", ";
                    };

                    document.getElementById("removeIng").onclick = function() {
                        var list = document.getElementById("ingList");
                        var len = document.getElementById("ingnames").value.length - (list.lastChild.innerHTML.length + 2);
                        document.getElementById("ingnames").value = document.getElementById("ingnames").value.substring(0, len);
                        list.removeChild(list.lastChild);
                    };
                </script>

                <label for="difficulty">Choose a Difficulty Level:</label><br>
                <select name="difficulty" id="difficulty">
                    <option value="easy">Easy 👶</option>
                    <option value="intermediate">Intermediate 😀</option>
                    <option value="hard">Hard 👨‍🍳</option>
                </select><br><br>
                
                <label for="price">Choose a Price Level:</label><br>
                <select name="price" id="price">
                    <option value="cheap">💲</option>
                    <option value="medium">💲💲</option>
                    <option value="expensive">💲💲💲</option>
                </select>
                <br><br>

                <input class="btn btn-primary" type="submit" value="Submit Recipe">
                <input class="btn btn-primary" type="reset">
                
            </form>
        </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
