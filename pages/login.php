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
      setcookie("user", $usernameForm, time()+3600);
      setcookie("userID", $row['docent_id'], time()+3600);
      setcookie("auth", $Core->AuthKey(128), time()+3600);

      header("location:../../docenten");
    }
  } else { //if password and/or username are incorrect, send to login page
    header("location:../../login");
  }
}

print_r($Core->AuthCheck());
?>



<link rel="stylesheet" href="../css/pages/login.css">

<main class="content">
<div class="left_content">
  <div class="subTitle">Login</div>

<div class="login">
  <div class="formulier">
<<<<<<< HEAD
    <div class="formLeft"></div>    
    <div class="form rand">
    <!-- Login Formulier met een POST method -->
      <form action="pages/login/LoginHandler.php" method="POST"> 
      <!-- Labels + Input voor het formulier -->
=======
    <div class="formLeft"></div>
    <div class="form rand">
      <form method="POST"> 
>>>>>>> database
        <label for="gebruikersnaam">Gebruikersnaam:</label><br>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br>
        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="password" id="wachtwoord" name="wachtwoord" required><br><br>
        <button type="submit" name="submitButton">Inloggen</button>
      </form>
    </div>
    <div class="formRight"></div>
  </div>
</div>

    
  </div>
</div>
</main>

