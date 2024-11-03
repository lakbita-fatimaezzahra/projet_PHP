<?PHP
$server="localhost";
$user="root";
$password="";
$database="e_commerce";


try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    // set the PDO error mode to exception
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>