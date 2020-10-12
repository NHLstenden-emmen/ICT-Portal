<?php
//Get values from POST
$usernameForm = $_POST["gebruikersnaam"];
$passwordForm = md5($_POST["wachtwoord"]); //Turn into MD5 hash

include('config.php'); //Database connection

function Auth($length) { //Function to generate a random authentication key
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)]; //Get random INT, generate a letter and add it to string
    }
    return $randomString; //Return String value
}

$sql = "SELECT * FROM users WHERE gebruikersnaam = '$usernameForm' AND wachtwoord = '$passwordForm'"; //Select where username and password are equal to form input
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    //Add cookies to header()
    setcookie("user", $usernameForm, time()+3600, '/; samesite=strict');
    setcookie("auth", auth(128), time()+3600, '/; samesite=strict');
    setcookie("domain", $domain, time()+3600, '/; samesite=strict');
    
    header("location:../../docenten");
  }
} else { //if password and/or username are incorrect, send to login page
    header("location:../../login");
}
$conn->close(); //Close connection

?>