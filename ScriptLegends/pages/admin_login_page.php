<?php
require 'config.php';
if (!empty($_SESSION["uid"])) {
  header("Location: login.php");
}
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
      $_SESSION["login"] = true;
      $_SESSION["uid"] = $row["uid"];
      header("Location: dashboard_home.php");
    } else {
      echo
        "<script> alert('Wrong Password'); </script>";
    }
  } else {
    echo
      "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./Assets/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="./Assets/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <title>Login</title>
</head>
<style>
  body {
    background-image: url(img/ass/background.jpg);
  }

  .container {
    background-color: rgb(255, 255, 255, 0.1);
    width: 700px;
    margin: auto;
    margin-top: 200px;
    border-radius: 10px;
  }

  h1 {
    text-align: center;
  }
</style>

<body>
  <div class="container">
    <h1 class="text-info">Login</h1><br>

    <form action="" method="post" autocomplete="off" class="text-white" style="width: 500px; margin:auto;">
      <div class="form-group">
        <label for="usr">Name</label>
        <input type="text" class="form-control" id="usr" name="name">
      </div>

      <div class="form-group">
        <label for="password">Password </label>
        <input type="password" class="form-control" name="password" id="password" required value="">
      </div><br>


      <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Login</button><br>

      <p class="text-center">Don't have an account? &nbsp; <a class="text-warning"
          href="admin_register.php">Register</a></p><br>
    </form>

  </div>
</body>

</html>