<nav class="navbar">
	<div class="logo">
		<a href="nieuws" class="logo"><img src="css/images/default_logo_white.png" alt="ICT Portal" style="width: 100px;"></a>
	</div>
	<div class="navbar_items">
		<ul>
			<li class="<?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='nieuws'">Nieuws</li>
			<li class="<?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='vakken'">Vakken</li>
			<li class="<?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='docenten'">Docenten</li>
			<li class="<?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='contact'">Contact</li>
			<?php if($Core->AuthCheck()){?>
				<div class="navDropdown">
					<li class="dropbtn" style="text-transform: none;" onclick="window.location.href='docent?docent=<?= $_COOKIE['userID'] ?>'">
						<i class="fa fa-user fa-lg fa-fw" aria-hidden="true" ></i><strong><?= $_COOKIE['fullUser']; ?></strong>
					</li>
					<div class="dropdown-content">
						<a href="uploadNieuws">Upload Nieuws</a>
						<a href="profiel-bewerken">profiel bewerken</a>
						<a href="beschikbaarheid">beschikbaarheid</a>
						<a href="logout">Uitloggen</a>

					</div>
				</div>
			<?php }
		
			else {?>    
			<li class="<?php ($activePage == 'login') ? 'active':''; ?>" onclick="window.location.href='login'">Login</li>
			<?php } ?>
			<div class="divider"></div>
			<div class="darkmodeSwitch"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>

		</ul>
	</div>
</nav>
    
<div class="banner_image">
	<div class="grid-container">
		<div class="Titel">
			<div class="bannerTitle"><?= isset($activePage) ? $activePage : "ICT Portal" ?></div>
			<p>Tekst.</p>
		</div>
	<div class="Populair zoom colorBlock"></div>
	<div class="Mededelingen zoom colorBlock" onclick="window.location.href='nieuws'"><div class="headerBlock"><p>Belangrijke<br>mededelingen</p></div></div>
	<div class="Contact zoom colorBlock" onclick="window.location.href='contact'"><div class="headerBlock"><p>Contact</p></div></div>
	<div class="Jaar-4 zoom colorBlock" onclick="window.location.href='vakken'"><div class="headerBlock"><p>Jaar 4</p></div></div>
	<div class="Jaar-3 zoom colorBlock" onclick="window.location.href='vakken'"><div class="headerBlock"><p>Jaar 3</p></div></div>
	<div class="Jaar-2 zoom colorBlock" onclick="window.location.href='vakken'"><div class="headerBlock"><p>Jaar 2</p></div></div>
	<div class="Jaar-1 zoom colorBlock" onclick="window.location.href='vakken'"><div class="headerBlock"><p>Jaar 1</p></div></div>
	</div>
</div>
