<footer class="footer_desktop">
  <div class="bottom">
    <p>2020 &copy; | NHL Stenden Emmen - ICT Portal</p>
    <div class="footer_desktop-right">
      <ul class="siteNav">
        <li><a href="nieuws"><?php echo $lang['NAV_NIEUWS']; ?> |</a></li>
        <li><a href="vakken"><?php echo $lang['NAV_VAKKEN']; ?> |</a></li>
        <li><a href="docenten"><?php echo $lang['NAV_DOCENTEN']; ?> |</a></li>
        <li><a href="contact"><?php echo $lang['NAV_CONTACT']; ?> |</a></li>
        <li><a href="privacyPolicy"><?php echo $lang['NAV_PRIVACY_POLICY']; ?> |</a></li>
        <li><a href="termsAndConditions"><?php echo $lang['NAV_TERMS_CONDITIONS']; ?></a></li>
      </ul>
    </div>
  </div>
</footer>

<!-- Mobile Tabs -->
<div class="footer-mobile">
  <style>
  .container {
    color: var(--tekstColor);
    width: 100%;
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: auto;
    overflow-x: auto;
    background: #4ac4b3;
  }
  .mobileTab {
    border-right: 1px solid var(--tekstColor);
    grid-row: 1;
    padding: 5vw;
    text-align: center;
    font-size: 3vh;
  }
  .dropdown1 {
    border-right: 1px solid var(--tekstColor);
    grid-row: 1; 
    grid-column: 1; 
    padding: 5vw;
    text-align: center;
    font-size: 3vh;
  }

.dropdown-content1 {
    color: var(--dark);
    max-height: 0;
    transition: max-height 0.3s ease-out;
    overflow: hidden;
    background-color: #f1f1f1;
    width: auto;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 10;
    position: absolute;
    bottom: 100%;
    left: 0;
}

.dropdown1:hover .dropdown-content1 {
  max-height: 200vh;
    transition: max-height 0.3s ease-in;
  }
  .dropdown1:hover {
    background: var(--lightPrimaryColor);
    box-shadow: inset 0 1vw 0 0 var(--tekstColor);

}
.dropdown-content1 div {
    color: var(--dark);
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: 0.3s;
}
.dropdown-content1 table {
  border-spacing: 0;
}
.dropdown-content1 table td {
  padding: 14px;
}
.dropdown-content1 table tr> td:nth-child(1){
  border-left: 1vw #f1f1f1 solid;
}

.dropdown-content1 table tr.mbactive-drop > td:nth-child(1){
  border-left: 1vw var(--lightPrimaryColor) solid;
}
.dropdown-content1 table tr.mbactive-drop > td:nth-child(1) {
  font-weight: 600;
}
.dropdown-content1 table tr.mbdivider  td {
  border-bottom: 1px solid black;
  padding: 0;
}

main.content:hover .dropdown-content1 {
  max-height: 0;
}
/* DARKMODE */
body.darkmode .langSwitchMobile {
  background-color: var(--lightPrimaryColor);
}
body.darkmode .langMobile,.langMobile:hover{
  background-color: unset;
  font-size: 3vh; 
  padding: 0;
}

body.darkmode .dropdown-content1 {
  background-color: #575a5a;
  color: var(--tekstColor);

}

body.darkmode .container {
  background-color: #2e3131;
}
body.darkmode .mobileTab {
  border-right: 1px solid #3c3a3a;
}
body.darkmode .dropdown-content1 table tr.mbdivider  td {
  border-bottom: 1px solid white;
}
body.darkmode .dropdown-content1 table tr.mbactive-drop > td:nth-child(1){
  border-left: 1vw var(--darkPrimaryColor) solid;
}
body.darkmode .dropdown-content1 table tr > td:nth-child(1){
  border-left: 1vw #575a5a solid;
}

.switchMobile {
  background-color: var(--lightPrimaryColor);
  border: none;
}
.langSwitchMobile {
  background-color: var(--lightPrimaryColor);
  border-left: 1px solid var(--tekstColor);
  border: none;
}
.langMobile,.langMobile:hover{
  padding: 0;
  background-color: unset;
  font-size: 3vh; 
}
</style>


<div class="footer-mobile">

<div class='container'>
        <div class="<?= ($activePage == 'nieuws') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='nieuws'"><i class="fa fa-newspaper-o fa-lg fa-fw" aria-hidden="true"></i></div>
        <div class="<?= ($activePage == 'vakken') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='vakken'"><i class="fa fa-book fa-lg fa-fw" aria-hidden="true"></i></div>
        <div class="<?= ($activePage == 'docenten') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='docenten'"><i class="fa fa-address-book fa-lg fa-fw" aria-hidden="true"></i></div>
        <div class="<?= ($activePage == 'contact') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='contact'"><i class="fa fa-envelope-o fa-lg fa-fw" aria-hidden="true"></i></div>

<?php if($Core->AuthCheck()){?>

<div class="dropdown1 <?= ($activePage == 'nieuws') ? 'mbactive':''; ?>" onclick="" role="button">
      <span><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i></span>
      <div class="dropdown-content1">
        <table>
        <tr <?= ($activePage == 'profiel-bewerken') ? 'class="mbactive-drop"':''; ?>>
          <td onclick="window.location.href='profiel-bewerken'">Mijn profiel bewerken</td>
          </tr>
          <tr <?= ($activePage == 'beschikbaarheid') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='beschikbaarheid'">Mijn beschikbaarheid</td>
          </tr>
          <tr>

          <tr class='mbdivider'><td></td><td></td></tr>
          <tr <?= ($activePage == 'nieuwsbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='nieuwsbeheer'">Nieuwsbeheer</td>
          </tr>
          <tr <?= ($activePage == 'vakkenbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='vakkenbeheer'">Vakkenbeheer</td>
          </tr>
          <tr <?= ($activePage == 'docentbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='docentbeheer'">Docentbeheer</td>
          </tr>
          <tr <?= ($activePage == 'opleidingbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='opleidingbeheer'">Opleidingbeheer</td>
          </tr>
          <tr class='mbdivider'><td></td><td></td></tr>
        
            <td onclick="window.location.href='uitloggen'">Uitloggen</td>
          </tr>
          <tr class='mbdivider'><td></td><td></td></tr>

          <tr <?= ($activePage == 'docent') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='docent?docent=<?= $_COOKIE['userID'] ?>'"><i><?= $_COOKIE['fullUser'] ?></i></td>
          </tr>
        </table>
      </div>
</div>
        <?php }
        else {?>
        <div class="<?= ($activePage == 'login') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='login'"><i class="fa fa-sign-in fa-lg fa-fw" aria-hidden="true"></i></div>
        <?php } ?>
        <div class="mobileTab switchMobile darkmodeSwitchMobile" style="background-color: var(--lightPrimaryColor) !important"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>
        <?php
        // check if there is a cookie for lang set
				if(!isset($_COOKIE['lang'])){
					echo "<form method='post' class='mobileTab langSwitchMobile'>
						<button class='langMobile' type='submit' value='en' name='changelang'>
							<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i>
						</button>
					</form>";
				} // change the button to a dutch button cause the lang is set to english
				else if($_COOKIE['lang'] == 'en'){
					echo "<form method='post' class='mobileTab langSwitchMobile'>
						<button class='langMobile' type='submit' value='nl' name='changelang'>
							<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i>
						</button>
					</form>";
				} // change the button to a english button cause the lang is set to dutch
				else if($_COOKIE['lang'] == 'nl'){
					echo "<form method='post' class='mobileTab langSwitchMobile'>
						<button class='langMobile' type='submit' value='en' name='changelang'>
							<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i>
						</button>
					</form>";
        } 
        ?>
        
      </div>

</div>
   


</div>

<script src="js/darkmode.js"></script>
