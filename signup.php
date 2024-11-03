<?php 
      
     
      include "./include/accessData.php";
      if (isset($_POST['valide'])) {
        $data = array(
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "pass" => $_POST['password'],
            "passConfirme"=>$_POST['Confirme'],
            "tele" => $_POST['tele']
        );
      include "./include/fonction.php";
    addClient($conn,$data);
    $errors =  addClient($conn,$data);
    $errorMail = $errors['errorMail'];
    $errorPass = $errors['errorPass'];
    $errorConFirme = $errors['errorConfirme'];
  
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="images/logo-fb.png" type="">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
    <title>Electo-Shop</title>
   
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
       <img src="./images/logo-fb.png" alt="" width="100" height="100">
      <h1 class="text-white h3"> Account Register</h1>
      </div>
      <form class="mt-4" method="post">
   
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input type="text"  name="nom"class="form-control" placeholder="Nom" value="<?=@$_POST['nom']?>" >
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input type="text"  name="prenom"class="form-control" placeholder="Prenom"value="<?=@$_POST['prenom']?>" >
        </div>
        <span  style="color:red"><?PHP if(isset($errorMail)){echo $errorMail;}?></span>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-envelope"></span>
          <input type="text" name="email"class="form-control" placeholder=" Addresse mail" value="<?=@$_POST['email']?>" >
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-phone"></span>
          <input type="text" name="tele" class="form-control" placeholder="Telephone" value="<?=@$_POST['tele']?>" >
        </div>
        <span style="color:red" ><?PHP if(isset($errorPass)){echo $errorPass;}?></span>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" name="password"class="form-control" placeholder="Mot de pass">
        </div>
        <span style="color:red"><?php if (isset($errorConFirme)) echo $errorConFirme; ?></span>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" name="Confirme" class="form-control" placeholder="Confirmation Mot de pass">
        </div>
        <div class="d-grid mb-4">
          <button type="submit" name="valide" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
        <div class="mt-4 text-center">
          <span class="text-white">Already a member?</span>
          <a href="login.php">Login</a>
        </div>
      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>