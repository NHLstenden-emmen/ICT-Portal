  <footer class="footer_desktop">
    <div class="bottom">
      <div class="footer_desktop-left">
        <p>2020 &copy; | NHL Stenden Emmen - ICT Portal | 
          <a class='icon-footer' href='https://twitter.com/nhlstenden' target='_blank'><i class='fa fa-twitter' aria-hidden='true'></i></a> 
          <a class='icon-footer' href='https://www.linkedin.com/school/nhlstenden/' target='_blank'><i class='fa fa-linkedin' aria-hidden='true'></i></a> 
          <a class='icon-footer' href='https://www.instagram.com/nhlstenden/?hl=nl' target='_blank'><i class='fa fa-instagram' aria-hidden='true'></i></a> 
        </p>
      </div>
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
 
<div class='mobileContainer'>
        <div class="<?= ($activePage == 'nieuws') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='nieuws'"><i class="fa fa-newspaper-o fa-lg fa-fw" aria-hidden="true"></i></div>
        <div class="<?= ($activePage == 'vakken') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='vakken'"><i class="fa fa-book fa-lg fa-fw" aria-hidden="true"></i></div>
        <div class="<?= ($activePage == 'docent') ? 'mbactive':''; ?><?= ($activePage == 'docenten') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='docenten'"><i class="fa fa-address-book fa-lg fa-fw" aria-hidden="true"></i></div>
        <div class="<?= ($activePage == 'contact') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='contact'"><i class="fa fa-envelope-o fa-lg fa-fw" aria-hidden="true"></i></div>

<?php if($Core->AuthCheck()){
 
  if (($activePage == 'profiel-bewerken')||($activePage == 'beschikbaarheid')||($activePage == 'nieuwsbeheer')||($activePage == 'vakkenbeheer')||($activePage == 'docentbeheer')||($activePage == 'docent')){
    $activeDropdown = True;
  } else {
    $activeDropdown = False;
  }
?>
<div class="<?= ($activeDropdown == True) ? 'mbactive':''; ?> dropdown-mobile mobileTab " onclick="" role="button">
      <span><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i></span>
      <div class="dropdown-content-mobile">
        <table>
          <tbody>
        <tr <?= ($activePage == 'profiel-bewerken') ? 'class="mbactive-drop"':''; ?>>
          <td onclick="window.location.href='profiel-bewerken'"><?= $lang['NAV_PF_EDIT'] ?></td>
          </tr>
          <tr <?= ($activePage == 'beschikbaarheid') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='beschikbaarheid'"><?= $lang['NAV_MY_BESCHIKBAARHEID'] ?></td>
          </tr>
          <tr class='mbdivider'><td></td></tr>
          <tr <?= ($activePage == 'nieuwsbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='nieuwsbeheer'"><?= $lang['NAV_NIEUWS_OVERVIEUW'] ?></td>
          </tr>
          <tr <?= ($activePage == 'vakkenbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='vakkenbeheer'"><?= $lang['NAV_VAKKENBEHEER'] ?></td>
          </tr>
          <tr <?= ($activePage == 'docentbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='docentbeheer'"><?= $lang['NAV_DOCENTENBEHEER'] ?></td>
          </tr>
          <tr <?= ($activePage == 'opleidingbeheer') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='opleidingbeheer'"><?= $lang['NAV_OPLEIDINGBEHEER'] ?></td>
          </tr>
          <tr class='mbdivider'><td></td></tr>
          <tr>
            <td onclick="window.location.href='uitloggen'"><?= $lang['NAV_UITLOGGEN'] ?></td>
          </tr>
          <tr class='mbdivider'><td></td></tr>

          <tr <?= ($activePage == 'docent') ? 'class="mbactive-drop"':''; ?>>
            <td onclick="window.location.href='docent?docent=<?= $_COOKIE['userID'] ?>'"><i><?= $_COOKIE['fullUser'] ?></i></td>
          </tr>
          </tbody>
        </table>
      </div>
</div>
        <?php }
        else {?>
        <div class="<?= ($activePage == 'login') ? 'mbactive':''; ?> mobileTab" onclick="window.location.href='login'"><i class="fa fa-sign-in fa-lg fa-fw" aria-hidden="true"></i></div>
        <?php } ?>
        <div class="mobileTab switchMobile darkmodeSwitchMobile"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>
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
   



<?php
if (!empty($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'enabled'){
	?>
		<script>
			const items = [
			'input',
			'textarea',
			'button',
			'select',
      'option'
			];

			$.each(items, function(index, value) {
				$(value).each(function() {
					$( this ).addClass( "darkmode" );
				});
			});
		</script>
<?php } ?>
<script src="js/darkmode.js"></script>
