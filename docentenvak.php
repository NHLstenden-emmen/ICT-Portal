<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="Docenten.css">
	</head>
	<body>
		<h1>Docenten</h1>
		<div class = "docentenvakken">
			
			<?php

			$docent = ['docent_id'=> '1', 'voornaam' => 'Gerjan', 'achternaam' => 'van Oenen', 'foto' => 'gerjan.jpg', 'vakken' => 'PHP' ] ;
			$i = 0;
			while($i<= 6){
				$i++;
				echo "
				<div class = 'docentenvak' id= '$docent[docent_id]'>
					<div class = 'green'>
					</div>
					<div class = 'white'>
						<img class='docentenfoto' src='$docent[foto]' alt='Foto van $docent[voornaam]'>
						<p><b>$docent[voornaam] $docent[achternaam] </b></p>
						<p>$docent[vakken]</p>
					</div>
				</div>";
			}
			?>
		</div>
	</body>
</html>