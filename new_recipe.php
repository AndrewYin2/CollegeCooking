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
        <div style="text-align:center"><a href="college_cooking.php">
            <img src="Logo2.png" alt="logo" style="margin:auto;width:350px">
        </a></div>

        <div id="box" style="font-family:Indie Flower;border-radius: 25px;">
        <div id="form">
            <h1 id="form-title">Submit Your Own Recipe!</h1><br>
            <label>Enter your own creations here for others to see!</label><br><br>
            
            <form action="new_recipe_handler.php" method="POST" enctype="multipart/form-data">
                <meta charset="UTF-8">

                <label for="rname">Recipe Name:</label><br>
                <input type="text" class="form-control" id="rname" name="rname" placeholder="Ex: Eggs Benedict" required><br>
                
                <label for="time">Prep Time:</label><br>
                <input type="number" class="form-control" id="time" name="time" min="1" placeholder="Enter time in minutes..." required><br>

                <label for="calories">Calories:</label><br>
                <input type="number" class="form-control" id="calories" name="calories" min="1" placeholder="Enter calories per serving..." required><br>

                <label for="ings">Ingredients:</label><br>
                <input type="text" id="ings" name="ings" placeholder="Ex: Eggs, English Muffins, etc.">
                <input hidden type="text" id="ingnames" name="ingnames" placeholder="hidden value" required>
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
                
                
                <label for="inames">Instructions:</label><br>
                <input type="text" id="step" name="step" placeholder="Ex: Beat two eggs.">
                <input hidden type="text" id="inames" name="inames" placeholder="hidden value" required>
                <input style="font-family:Arial" class="btn btn-outline-primary btn-sm" type = "button" value="+" id="addInstr"/>
                <input style="font-family:Arial" class="btn btn-outline-primary btn-sm" type = "button" value="-" id="removeInstr"/>
                <ol id="instrList"></ol>
                <script>
                    document.getElementById("addInstr").onclick = function() {
                        var text = document.getElementById("step").value;
                        var textNode = document.createTextNode(text);
                        var li = document.createElement("li");
                        li.appendChild(textNode);
                        document.getElementById("instrList").appendChild(li);
                        document.getElementById("step").value = "";
                        document.getElementById("inames").value += text + ", ";
                    };

                    document.getElementById("removeInstr").onclick = function() {
                        var list = document.getElementById("instrList");
                        var len = document.getElementById("inames").value.length - (list.lastChild.innerHTML.length + 2);
                        document.getElementById("inames").value = document.getElementById("inames").value.substring(0, len);
                        list.removeChild(list.lastChild);
                    };
                </script>

                <label for="difficulty">Choose a Difficulty Level:</label><br>
                <select name="difficulty" id="difficulty">
                    <option value="Easy">Easy</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Hard">Hard</option>
                </select><br><br>
                
                <label for="price">Choose a Price Level:</label><br>
                <select name="price" id="price">
                    <option value="$">Cheap</option>
                    <option value="$$">Moderate</option>
                    <option value="$$$">Expensive</option>
                </select>
                <br><br>

                <label for="pic">Select a Picture:</label><br>
                <input type="file" id="pic" name="pic" accept="image/*" required>

                <input class="btn btn-primary" type="submit" value="Submit Recipe">
                <input class="btn btn-primary" type="reset">
                
            </form>
        </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
