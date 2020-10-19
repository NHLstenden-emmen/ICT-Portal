<?php
//Get values from POST

if(isset($_POST['submitButton'])){

$usernameForm = $_POST["gebruikersnaam"];
$passwordForm = md5($_POST["wachtwoord"]); //Turn into MD5 hash

 //Select where username and password are equal to form input
$result = $DB->Get("SELECT * FROM docenten WHERE gebruikersnaam = '$usernameForm' AND wachtwoord = '$passwordForm'");

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      //Add cookies to header()
      date_default_timezone_set('Europe/Amsterdam');
      setcookie("user", $usernameForm, time()+10800, '/; samesite=strict');
      setcookie("auth", $Core->AuthKey(128), time()+10800, '/; samesite=strict');
      setcookie("domain", $domain, time()+10800, '/; samesite=strict');
      
      header("location: /docenten");
    }
  } else { //if password and/or username are incorrect, send to login page
      header("location: /login");
  }
}
?>


<div class="login">
  <div class="formulier">
    <div class="formLeft"></div>
    <!-- Login Formulier -->
    <div class="form rand">
      <form method="POST"> 
        <label for="gebruikersnaam">Gebruikersnaam:</label><br>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" value="" required><br>
        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="password" id="wachtwoord" name="wachtwoord" value="" required><br><br>
        <input type="submit" value="Inloggen" name="submitButton">
      </form>
    </div>
    <div class="formRight"></div>
  </div>
</div>