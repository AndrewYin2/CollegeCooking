<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Bootstrap Assignment</title>
</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
          <span>Need an account?</span>&nbsp;&nbsp;
          <a href="registration.php" class="btn btn-success">Register</a>
    </nav>
  </div>

  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">LOGIN</h1>
      <hr class="my-4">
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <form action="loginhandler.php" method="POST">
        <br>
        <div class="form-row">
          <label for="username">Username</label>
          <div class="form-group col-md-12">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>
        </div>
        <div class="form-row">
          <label for="password">Password</label>
          <div class="form-group col-md-12">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        <?php
        if (isset($_SESSION['message']))
        {
          echo '<div class="alert alert-danger" role="alert">';
          echo $_SESSION['message'];
          echo '</div>';
          unset($_SESSION['message']);
        }
      ?>
      </form>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>
