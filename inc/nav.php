<nav class="navbar">
	<div class="logo">
		<a href="nieuws" class="logo"><img src="images/default_logo_white.png" alt="ICT Portal" style="width: 100px;"></a>
	</div>
	<div class="navbar_items">
		<ul>
			<li class="<?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='nieuws'">Nieuws</li>
			<li class="<?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='vakken'">Vakken</li>
			<li class="<?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='docenten'">Docenten</li>
			<li class="<?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='contact'">Contact</li>
			<?php if($Core->AuthCheck()) { ?>
				
				<div class='navDropdown'>
					<li class='dropbtn' style='text-transform: none;' onclick="."window.location.href='docent?docent=<?php $_COOKIE["userID"] ?>'>
						<i class='fa fa-user fa-lg fa-fw' aria-hidden='true' ></i><strong><?php $_COOKIE['fullUser'] ?></strong>
					</li>
					<div class='dropdown-content'>
						<a href='uploadNieuws'>Nieuws beheren	</a>
						<a href='profiel-bewerken'>Mijn profiel</a>
						<a href='beschikbaarheid'>Mijn beschikbaarheid</a>
						<hr	/>
						<a href='vakkenbeheer'>Vakkenbeheer</a>
						<a href='Docent-toevoegen'>Docent toevoegen</a>
						<hr />
						<a href='uitloggen'>Uitloggen</a>
						</form>
					</div>
				</div>
 			<?php }
		
			else { 
				echo "<li class='".(($activePage == "login") ?  "active":"")."' onclick="."window.location.href='login'>Login</li>";
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
			<div class="bannerTitle"><?= isset($activePage) ? $activePage : "ICT Portal" ?></div>
			<p><?= isset($pageSubtitleText) ? $pageSubtitleText : "" ?></p>
		</div>
	
		<div onclick="window.open('https://www.buienradar.nl/weer/Emmen/','_blank')" class="Populair zoom colorBlock weatherWidget">
				<div class="weahterIcon"><i class='wi wi-owm-<?= $Core->weatherData()->weather[0]->id ?>'></i></div>
				<div class="weatherTemp">
					<?= (strlen($Core->weatherData()->main->temp) > 2) ? substr($Core->weatherData()->main->temp, 0, 2): ''; ?>
				</div>
				<div class="weatherTempIcon">°C</div>
				<div class="weatherCity"><?= $Core->weatherData()->name ?></div>
				<div class="weatherDesc"><?= $Core->weatherData()->weather[0]->description ?></div>
		</div>
			<div onclick="window.location.href='nieuws?all=TRUE'" class="Mededelingen zoom colorBlock"><div class="headerBlock"><p>Belangrijke<br>mededelingen</p></div></div>
			<div onclick="window.location.href='aanwezigen'" class="Contact zoom colorBlock"><div class="headerBlock"><p>Aanwezigen docenten</p></div></div>
			<div onclick="window.location.href='vakken?jaar=4'" class="J4 zoom colorBlock"><div class="headerBlock"><p>Jaar 4</p></div></div>
			<div onclick="window.location.href='vakken?jaar=3'" class="J3 zoom colorBlock"><div class="headerBlock"><p>Jaar 3</p></div></div>
			<div onclick="window.location.href='vakken?jaar=2'" class="J2 zoom colorBlock"><div class="headerBlock"><p>Jaar 2</p></div></div>
			<div onclick="window.location.href='vakken?jaar=1'" class="J1 zoom colorBlock"><div class="headerBlock"><p>Jaar 1</p></div></div>
	</div>
</div>