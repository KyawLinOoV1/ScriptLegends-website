<?php
require 'config.php';
if (!empty($_SESSION["uid"])) {
  header("Location: Register.php");
}
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirm_password"];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name' OR email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
      "<script> alert('Username or Email Has Already Taken'); </script>";
  } else {
    if ($password == $confirmpassword) {
      $query = "INSERT INTO user VALUES('','$name','$email','$password', '$confirmpassword')";
      mysqli_query($conn, $query);
      echo
        "<script> alert('Registration Successful'); </script>";
      header("Location: admin_login_page.php");

    } else {
      echo
        "<script> alert('Password Does Not Match'); </script>";
    }
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
  <title>Registration</title>
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
    <h1>Registration</h1>
    <form action="" method="post" autocomplete="off" class="text-white" style="width: 500px; margin:auto" ;>
      <div class="form-group">
        <label for="usr">Name</label>
        <input type="text" class="form-control" id="usr" name="name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required value="">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" required value="">
      </div>

      <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" required value="">
      </div><br>

      <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Register</button>
    </form>
    <br>
    <p class="text-center">Already have an account? &nbsp; <a class="text-warning" href="admin_login_page.php">Login
        Now</a></p><br>
  </div>
</body>

</html>