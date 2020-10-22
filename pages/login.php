 <?php
//Get values from POST

if($Core->AuthCheck()){
  //Al ingelogd dus ga naar nieuwspagina.
  header("location: nieuws");
}

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
      setcookie("fullUser", $row['voornaam']. " ".$row['achternaam'], time()+3600);

      header("location: nieuws");
    }
  } else { //if password and/or username are incorrect, send to login page
    header("location: login?e=1");
  }
}

?>



<main class="content">
			<div class='contentBlock-nohover' style="width: 100%; height: 300px;">
				<div class='contentBlock-side' style="width: 100%;"></div>
				<div class='contentBlock-content' style="width: 100%;">
					<div class='contentBlock-title'>
						Inloggen
					</div>
					<div class='contentBlock-text-normal'>
          <form method="POST"> 
              <label for="gebruikersnaam">Gebruikersnaam</label><br>
              <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" required> <br>
              <br>
              <label for="wachtwoord">Wachtwoord</label><br>
              <input type="password" name="wachtwoord" placeholder="*********" required><br><br>

              <button type="submit" name="submitButton">Inloggen</button>
						</form>
					</div>
				</div>
		</div>
</main>