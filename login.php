
<?php 

session_start();
session_destroy();


    
?>
<?php
include "./include/accessData.php";

$errorMail = $errorPass = $error = "";
    if (isset($_POST['login'])) {
        $email = $_POST['emailName'];
        $pass = $_POST['passName'];
       @$remembre=$_POST['remembre'];
        include "./include/fonction.php";
    
        $errors = login($conn, $email, $pass,$remembre);
        $errorMail = $errors['errorMail'];
        $errorPass = $errors['errorPass'];
        $error = $errors['error'];
      
      }
       

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="./images/logo-fb.png" type="">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
    <title>Electro-Shop</title>
    <style></style>
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
      <img src="./images/logo-fb.png" alt="" width="100" height="100">
      <h1 class="text-white h3"> Account Login</h1>
      </div>
      <form class="mt-4" method="post">
      <span  style="color:red"><?PHP if(isset($errorMail)){echo $errorMail;}?></span>
      <span style="color:red"><?PHP if(isset($error)){echo $error;}?></span>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input type="text"  name="emailName" class="form-control" value="<?PHP if(isset($_COOKIE['mail'])){echo @$_COOKIE['mail'];}?>"placeholder="Addresse mail">
        </div>
        <span  style="color:red"><?PHP if(isset($errorPass)){echo $errorPass;}?></span>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" name="passName" class="form-control" placeholder="Mot de pass" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];}?>">
       
        </div>
      
        <div class="d-grid mb-4">
          <button type="submit" name="login"class="btn btn-primary btn-lg">Sign in</button>
        </div>
        
       
        <div class="mt-4 text-center">
          <span class="text-white">Don't have an account?</span>
      
          <a href="signup.php">Sign Up</a>
          <label for="check" class="text-white">Remember me</label>
          <input type="checkbox" name="remembre" id="check">
        </div>
      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>