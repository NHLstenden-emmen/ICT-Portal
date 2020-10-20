<div class="login">
  <div class="formulier">
    <div class="formLeft"></div>    
    <div class="form rand">
    <!-- Login Formulier met een POST method -->
      <form action="pages/login/LoginHandler.php" method="POST"> 
      <!-- Labels + Input voor het formulier -->
        <label for="gebruikersnaam">Gebruikersnaam:</label><br>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" value="" required><br>
        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="password" id="wachtwoord" name="wachtwoord" value="" required><br><br>
        <input type="submit" value="Inloggen">
      </form>
    </div>
    <div class="formRight"></div>
  </div>
</div>