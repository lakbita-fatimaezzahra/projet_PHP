<?php
//charger les categorie
function getCategories($conn){

   
    $requet="SELECT * FROM categorie";
    $resultat= $conn->query($requet);
    $categorie=$resultat->fetchAll();
    return  $categorie;

}


//get produit by id
function getProduitsById($conn, $id) {
    $requet = "SELECT * FROM produit WHERE reference='$id'";
    $resultat = $conn->query($requet);
    $produit = $resultat->fetch(); 
    return $produit; 
}
//register
function addClient($conn, $data) {

$mail=$data['email'];
$pass=$data['pass'];
$passConfirme=$data['passConfirme'];
$nom = $data['nom'];
$prenom = $data['prenom'];
$telephone =$data['tele'];
$errorMail ="";
$errorPass = "";
$errorConfirme="";
if (empty($mail)) {
    $errorMail = "Champ obligatoire";
} else if (!preg_match('/^\w+@gmail\.com$/', $mail)) {
    $errorMail = "Email non valide!";
}

// Vérification du champ mot de passe
if (empty($pass)) {
    $errorPass = "Mot de passe obligatoire!";
}else if (!preg_match('/^[\d\w]{8,}$/',$pass)) {
    $errorPass = "Le mot de passe doit contenir au moins 8 caractères!";
}
else if (empty($passConfirme)) {
  $errorConfirme= "Mot de passe obligatoire!";
}
else if ($pass !== $passConfirme) {
    $errorConfirme="Les mots de passe ne correspondent pas!";
}

    if (empty($errorMail) && empty($errorPass)&& empty($errorConfirme)) {
      
$requet = "SELECT * FROM client WHERE email='$mail' AND password='$pass'";
$resultat = $conn->query($requet);
$client = $resultat->fetch(); 
if($client){
header("location:login.php") ;
}else {
    $date=date("y-m-d");
    $sql = "INSERT INTO client (nom, prenom, email,password, telephone,date_creation) VALUES (?, ?, ?, ?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $mail,$pass, $telephone,$date]);
      }
   }
else{
    return [
        'errorMail' => $errorMail,
        'errorPass' => $errorPass,
        'errorConfirme'=> $errorConfirme,
        
    ];

}


}



//fonction login
function login($conn, $email, $pass,$remembre) {
   
    $error = "";

    $errorMail = "";
    $errorPass = "";
     // Vérification du champ email
     if (empty($email)) {
        $errorMail = "Champ obligatoire";
    } else if (!preg_match('/^\w+@gmail\.com$/', $email)) {
        $errorMail = "Email non valide!";
    }

    // Vérification du champ mot de passe
    if (empty($pass)) {
        $errorPass = "Mot de passe obligatoire!";
    }
    // Si tout est correct, démarrer la session
    if (empty($errorMail) && empty($errorPass)) {
      
            $requet = "SELECT * FROM client WHERE email='$email' AND password='$pass'";
            $resultat = $conn->query($requet);
            $client = $resultat->fetch(); 
            if ($client) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $client['nom'];
                $_SESSION['prenom'] = $client['prenom'];
                $_SESSION['tele'] = $client['telephone'];
                if(!empty($remembre)){
                setcookie("mail", $email,time()+60);
                setcookie("pass", $pass,time()+60);}
            
                header("Location: home.php");
                
            } else {
                $error = "Email ou mot de pass incorrect!";
            }
        }
        return [
            'errorMail' => $errorMail,
            'errorPass' => $errorPass,
            'error' => $error
        ];
}
?>