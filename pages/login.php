<div class="login">
  <div class="formulier">
    <div class="formLeft"></div>
    <!-- Login Formulier -->
    <div class="form">
      <form action="/pages/login/LoginHandler.php" method="POST"> 
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