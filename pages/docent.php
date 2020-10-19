<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/docent.css">
		<?php
        $_GET['docent'];
		$docent = array(
                    'docent_id' => 3,
                    'voornaam' => 'Gerjan',
                    'achternaam' => 'van Oenen',
                    'email' => 'erat.volutpat.Nulla@eleifend.org',
                    'telefoonnummer' => '0612345678',
                    'gebruikersnaam' => 'JinWeaver',
                    'wachtwoord' => 'indigo',
                    'foto' => 'Gerjan van Oenen.jpg',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => '');
		?>
	</head>
	<body>
		<?php
			echo "
			<h1>$docent[voornaam] $docent[achternaam]</h1>
			<div class= 'content'>
				<div class='green'>
				</div>
				<div class='white'>
					<img class='fotodocent' src='images/$docent[foto]' alt='foto van $docent[voornaam] $docent[achternaam]'>
					<div class='tekst'>	
						<p>Jaarinfo & vakken</p>
					</div>
					<div class='icons'>	
						
						<a href='$docent[email]'><img src='https://www.flaticon.com/svg/static/icons/svg/1946/1946389.svg'></a>
						<a href='$docent[twitter]'><img src='https://www.flaticon.com/svg/static/icons/svg/254/254406.svg'></a>
						<a href='$docent[linkedin]'><img src='https://www.flaticon.com/svg/static/icons/svg/1051/1051333.svg'></a>
						<a href='$docent[instagram]'><img src='https://www.flaticon.com/svg/static/icons/svg/1384/1384031.svg'></a>".( 
						("$docent[telefoonnummer]"!=='' )?"<a href='$docent[telefoonnummer]'><img src='https://www.flaticon.com/svg/static/icons/svg/254/254407.svg'></a>"
						: "")."
						 
					</div>
				</div>
			</div>";
		?>
	</body>
</html>