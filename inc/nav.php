<nav class="navbar">
	<div class="logo">
		<a href="nieuws"><img src="images/default_logo_white.png" alt="ICT Portal"></a>
	</div>
	<div class="navbar_items">
		<div class="topul">
			<a class="topli <?= ($activePage == 'nieuws') ? 'active':''; ?>" href='nieuws'><?php echo $lang['NAV_NIEUWS']; ?></a>
			<a class="topli <?= ($activePage == 'vakken') ? 'active':''; ?>" href='vakken'><?php echo $lang['NAV_VAKKEN']; ?></a>
			<a class="topli <?= ($activePage == 'docenten') ? 'active':''; ?>" href='docenten'><?php echo $lang['NAV_DOCENTEN']; ?></a>
			<a class="topli <?= ($activePage == 'contact') ? 'active':''; ?>" href='contact'><?php echo $lang['NAV_CONTACT']; ?></a>
			<?php if($Core->AuthCheck()) { 
				
				echo "<div class='navDropdown'>
				<li class='dropbtn' style='text-transform: none;' onclick=".'"'."window.location.href='docent?docent={$_COOKIE["userID"]}'".'"'.">
					<i class='fa fa-user fa-lg fa-fw' aria-hidden='true' ></i><strong>{$_COOKIE['fullUser']}</strong>
				</a>
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
				echo "<li class='".(($activePage == "login") ?  "active":"")."' onclick=".'"'."window.location.href='login'".'"'.">{$lang['NAV_LOGIN']}</li>";
			 } 
			 
			?>
			<!-- DARKMODESWITCH -->
			<li class="divider"></li>
			<li class="darkmodeSwitch"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></li>
			<!-- END DARKMODESWITCH -->
			<li style='padding: 0'>
			<?php
			// check if there is a cookie for lang set
			if(!isset($_COOKIE['lang'])){
				echo "<form method='post' id='langSwitch'>
					<button type='submit' value='en' class='languageSwitch' name='changelang'>
						<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i> EN
					</button>
			</form>
			";
			} // change the button to a dutch button cause the lang is set to english
			else if($_COOKIE['lang'] == 'en'){
				echo "<form method='post' id='langSwitch'>
					<button type='submit' value='nl' class='languageSwitch' name='changelang'>
						<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i> NL
					</button>
			</form>
			";
			} // change the button to a english button cause the lang is set to dutch
			else if($_COOKIE['lang'] == 'nl'){
				echo "<form method='post' id='langSwitch'>
					<button type='submit' value='en' class='languageSwitch' name='changelang'>
						<i class='fa fa-language fa-lg fa-fw' aria-hidden='true'></i> EN
					</button>
			</form>
			";
			}
			?>
</li>
		</ul>
	</div>
</nav>
    
<div class="banner_image">
	<div class="grid-container">
		<div class="Titel">
			<div class="bannerTitle"><?= isset($pageTitle) ? $Core->bannerTitleText($pageTitle) : "ICT Portal" ?></div>
			<p class="bannerSubTitle"><?= isset($pageSubtitleText) ? $pageSubtitleText : "" ?></p>
		</div>
	
		<div onclick="window.location.href='https://www.buienradar.nl/weer/Emmen/NL/2756136'" class="Populair zoom colorBlock weatherWidget">
				<div class="weahterIcon"><i class='wi wi-owm-<?= $Core->weatherData()->weather[0]->id ?>'></i></div>
					<?php 
						//tempratuur in 2 getallen
						$weatherTemp = explode(".", $Core->weatherData()->main->temp);

						 if(strlen($weatherTemp['0']) == 2  && strpos($weatherTemp[0], '-') !== true){
							echo '<div class="weatherTemp">'.$weatherTemp['0'].'</div>';
						}
						//tempratuur in 1 getal
						else if(strlen($weatherTemp['0']) == 1){
							echo '<div class="weatherTemp" style="margin-left: 3vw;">'.$weatherTemp['0'].'</div>';
						}
						else if(strlen($weatherTemp['0']) == 2 && strpos($weatherTemp[0], '-') !== false){
							echo '<div class="weatherTemp" style="margin-left: 2vw;">'.$weatherTemp['0'].'</div>';
						}
						?>

				<div class="weatherTempIcon">°C</div>
				<div class="weatherCity"><?= $Core->weatherData()->name ?></div>
				<div class="weatherDesc"><?= $Core->weatherData()->weather[0]->description ?></div>
		</div>

		<div class="Mededelingen zoom colorBlock jaarBlock" onclick="window.location.href='nieuws?all=true'">
				<div class='mededelingenBlock'>
					<i aria-hidden="true" class="fa fa-bell-o"></i>
				</div>
				<div class='mededelingenText'>
				<?php echo $lang['NAV_BELANGRIJKE_MELDINGEN']; ?></div>
			</div>

			<div class="Contact zoom colorBlock jaarBlock" onclick="window.location.href='aanwezigheid'">
				<div class='contactBlock'>
					<i aria-hidden="true" class="fa fa-clock-o"></i>
				</div>
				<div class='contactText'>
					<?php echo $lang['NAV_AANWEZIGHEID']; ?>
				</div>
			</div>
			<div class="J4 zoom colorBlock jaarBlock" onclick="window.location.href='vakken?jaar=4'">
				<div class='jaarBlockGrid'>
					<?php echo $lang['NAV_JAAR']; ?>
				</div>
				<div class='jaarBlockText'>
					4
				</div>
			</div>
			<div class="J3 zoom colorBlock jaarBlock" onclick="window.location.href='vakken?jaar=3'">
				<div class='jaarBlockGrid'>
					<?php echo $lang['NAV_JAAR']; ?>
				</div>
				<div class='jaarBlockText'>
					3
				</div>
			</div>
			<div class="J2 zoom colorBlock jaarBlock" onclick="window.location.href='vakken?jaar=2'">
				<div class='jaarBlockGrid'>
					<?php echo $lang['NAV_JAAR']; ?>
				</div>
				<div class='jaarBlockText'>
					2
				</div>
			</div>
			<div class="J1 zoom colorBlock jaarBlock" onclick="window.location.href='vakken?jaar=1'">
				<div class='jaarBlockGrid'>
					<?php echo $lang['NAV_JAAR']; ?>
				</div>
				<div class='jaarBlockText'>
					1
				</div>
			</div>
		</div>
	</div>