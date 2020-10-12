<?php

$usernameForm = $_POST["gebruikersnaam"];
$passwordForm = md5($_POST["wachtwoord"]);

//echo $usernameForm.$passwordForm;
$domain = 'localhost';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function Auth($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


$sql = "SELECT * FROM users WHERE gebruikersnaam = '$usernameForm' AND wachtwoord = '$passwordForm'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    setcookie("user", $usernameForm, time()+3600, '/; samesite=strict');
    setcookie("auth", auth(128), time()+3600, '/; samesite=strict');
    setcookie("domain", $domain, time()+3600, '/; samesite=strict');
    
    header("location:pagina.php");
  }
} else {
  echo "Geen resulaten";
}
$conn->close();

?>