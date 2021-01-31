<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Bootstrap Assignment</title>
</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
          <span>Already have an account?</span>&nbsp;&nbsp;
          <a href="login.php" class="btn btn-primary">Login</a>
    </nav>
  </div>

  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">REGISTER</h1>
      <hr class="my-4">
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <form action="registrationhandler.php" method="POST">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>
