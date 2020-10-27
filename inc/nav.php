<nav class="navbar">
	<div class="logo">
		<a href="nieuws" class="logo"><img src="images/default_logo_white.png" alt="ICT Portal" style="width: 100px;"></a>
	</div>
	<div class="navbar_items">
		<ul>
			<li class="<?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='nieuws'"><?php echo $lang['NAV_NIEUWS']; ?></li>
			<li class="<?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='vakken'"><?php echo $lang['NAV_VAKKEN']; ?></li>
			<li class="<?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='docenten'"><?php echo $lang['NAV_DOCENTEN']; ?></li>
			<li class="<?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='contact'"><?php echo $lang['NAV_CONTACT']; ?></li>
			<?php if($Core->AuthCheck()) { 
				
				echo "<div class='navDropdown'>
				<li class='dropbtn' style='text-transform: none;' onclick="."window.location.href='docent?docent={$_COOKIE["userID"]}'>
					<i class='fa fa-user fa-lg fa-fw' aria-hidden='true' ></i><strong>{$_COOKIE['fullUser']}</strong>
				</li>
				<div class='dropdown-content'>
					<a href='profiel-bewerken'>{$lang['NAV_PF_EDIT']}</a>
					<a href='beschikbaarheid'>{$lang['NAV_MY_BESCHIKBAARHEID']}</a>
					<hr	/>
					<a href='nieuwsbeheer'>{$lang['NAV_NIEUWS_OVERVIEUW']}</a>
					<a href='vakkenbeheer'>{$lang['NAV_VAKKENBEHEER']}</a>
					<a href='docentbeheer'>{$lang['NAV_DOCENTENBEHEER']}</a>
					<a href='opleidingbeheer'>{$lang['NAV_OPLEIDINGBEHEER']}</a>
					<hr />
					<a href='uitloggen'>{$lang['NAV_UITLOGGEN']}</a>
				</div>
			</div>";
 			}
		
			else { 
				echo "<li class='".(($activePage == "login") ?  "active":"")."' onclick="."window.location.href='login'>{$lang['NAV_LOGIN']}</li>";
			 } 
			 
			?>
				<!-- DARKMODESWITCH -->
				<div class="divider"></div>
				<button class="darkmodeSwitch"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></button>
				<!-- END DARKMODESWITCH -->

				<?php
				// check if there is a cookie for lang set
				if(!isset($_COOKIE['lang'])){
					echo "<form method='post'>
						<button type='submit' value='en' class='languageSwitch' name='changelang'>
							<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i> EN
						</button>
					</form>";
				} // change the button to a dutch button cause the lang is set to english
				else if($_COOKIE['lang'] == 'en'){
					echo "<form method='post'>
						<button type='submit' value='nl' class='languageSwitch' name='changelang'>
							<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i> NL
						</button>
					</form>";
				} // change the button to a english button cause the lang is set to dutch
				else if($_COOKIE['lang'] == 'nl'){
					echo "<form method='post'>
						<button type='submit' value='en' class='languageSwitch' name='changelang'>
							<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i> EN
						</button>
					</form>";
				}
				?>
		</ul>
	</div>
</nav>
    
<div class="banner_image">
	<div class="grid-container">
		<div class="Titel">
			<div class="bannerTitle"><?= isset($pageTitle) ? $pageTitle : "ICT Portal" ?></div>
			<p class="bannerSubTitle"><?= isset($pageSubtitleText) ? $pageSubtitleText : "" ?></p>
		</div>
	
		<div onclick="window.location.href='https://www.buienradar.nl/weer/Emmen/NL/2756136'" class="Populair zoom colorBlock weatherWidget">
				<div class="weahterIcon"><i class='wi wi-owm-<?= $Core->weatherData()->weather[0]->id ?>'></i></div>
					<?php 
						//tempratuur in 2 getallen
					
						if(strlen($Core->weatherData()->main->temp) == 5){
							echo '<div class="weatherTemp">'.substr($Core->weatherData()->main->temp, 0, 2).'</div>';
						}
						//tempratuur in 1 getal
						else if(strlen($Core->weatherData()->main->temp) == 4){
							echo '<div class="weatherTemp" style="margin-left: 3vw;">'.substr($Core->weatherData()->main->temp, 0, 1).'</div>';
						}
						?>

				<div class="weatherTempIcon">°C</div>
				<div class="weatherCity"><?= $Core->weatherData()->name ?></div>
				<div class="weatherDesc"><?= $Core->weatherData()->weather[0]->description ?></div>
		</div>
			<div onclick="window.location.href='nieuws?all=TRUE'" class="Mededelingen zoom colorBlock"><div class="headerBlock"><p><?php echo $lang['NAV_BELANGRIJKE_MELDINGEN']; ?></p></div></div>
			<div onclick="window.location.href='aanwezigheid'" class="Contact zoom colorBlock" style="display: grid;grid-template-columns: auto 40%;grid-template-rows: 50% 50%;"><div style="grid-row: 1;grid-column: 1;font-size: 3.4vw;margin-left: 3.7vw;"><i class="fa fa-clock-o" aria-hidden="true"></i></div><div style="grid-row: 1;grid-column: 1/2;font-size: 1vw;margin-top: 4.9vw;margin-left: 0.2vw;"><?php echo $lang['NAV_AANWEZIGHEID']; ?></div></div>
			<div onclick="window.location.href='vakken?jaar=4'" class="J4 zoom colorBlock" style="display: grid;grid-template-columns: auto 40%;grid-template-rows: auto auto;"><div style="grid-row: 1;grid-column: 1/3;font-size: 2vw;margin-top: 4.3vw;margin-left: 0.3vw;"><?php echo $lang['NAV_JAAR']; ?></div><div style="grid-row: 1;grid-column: 2;font-size: 4vw;">4</div></div>
			<div onclick="window.location.href='vakken?jaar=3'" class="J3 zoom colorBlock" style="display: grid;grid-template-columns: auto 40%;grid-template-rows: auto auto;"><div style="grid-row: 1;grid-column: 1/3;font-size: 2vw;margin-top: 4.3vw;margin-left: 0.3vw;"><?php echo $lang['NAV_JAAR']; ?></div><div style="grid-row: 1;grid-column: 2;font-size: 4vw;">3</div></div>
			<div onclick="window.location.href='vakken?jaar=2'" class="J2 zoom colorBlock" style="display: grid;grid-template-columns: auto 40%;grid-template-rows: auto auto;"><div style="grid-row: 1;grid-column: 1/3;font-size: 2vw;margin-top: 4.3vw;margin-left: 0.3vw;"><?php echo $lang['NAV_JAAR']; ?></div><div style="grid-row: 1;grid-column: 2;font-size: 4vw;">2</div></div>
			<div onclick="window.location.href='vakken?jaar=1'" class="J1 zoom colorBlock" style="display: grid;grid-template-columns: auto 40%;grid-template-rows: auto auto;"><div style="grid-row: 1;grid-column: 1/3;font-size: 2vw;margin-top: 4.3vw;margin-left: 0.3vw;"><?php echo $lang['NAV_JAAR']; ?></div><div style="grid-row: 1;grid-column: 2;font-size: 4vw;">1</div>
		</div>
	</div>
</div>