<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/docenten.css">
		<?php
        $docentenData = array(
                '1' => array(
                    'docent_id' => 3,
                    'voornaam' => 'Gerjan',
                    'achternaam' => 'van Oenen',
                    'email' => 'erat.volutpat.Nulla@eleifend.org',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'JinWeaver',
                    'wachtwoord' => 'indigo',
                    'foto' => 'Gerjan van Oenen.jpg',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => ''),
                '2' => array(
                    'docent_id' => 4,
                    'voornaam' => 'Tanek',
                    'achternaam' => 'Fischer',
                    'email' => 'Suspendisse@tempus.net',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'ThaddeusMartinez',
                    'wachtwoord' => 'violet',
                    'foto' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => ''),
                '3' => array(
                    'docent_id' => 5,
                    'voornaam' => 'Justin',
                    'achternaam' => 'Benton',
                    'email' => 'luctus.ipsum.leo@Etiamvestibulummassa.co.uk',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'NoahBullock',
                    'wachtwoord' => 'orange',
                    'foto' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => ''),
                '4' => array(
                    'docent_id' => 6,
                    'voornaam' => 'Bruno',
                    'achternaam' => 'Barrera',
                    'email' => 'ante.blandit.viverra@Quisqueliberolacus.edu',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'RahimBolton',
                    'wachtwoord' => 'orange',
                    'foto' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => ''),
                '5' => array(
                    'docent_id' => 7,
                    'voornaam' => 'Robert',
                    'achternaam' => 'Solis',
                    'email' => 'Mauris@Vestibulumanteipsum.co.uk',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'AmeryWagner',
                    'wachtwoord' => 'blue',
                    'foto' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => ''),
                '6' => array(
                    'docent_id' => 8,
                    'voornaam' => 'Linus',
                    'achternaam' => 'Delacruz',
                    'email' => 'a.feugiat@aliquet.org',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'OrlandoOsborn',
                    'wachtwoord' => 'yellow',
                    'foto' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => ''),
                '7' => array(
                    'docent_id' => 9,
                    'voornaam' => 'Joseph',
                    'achternaam' => 'Patterson',
                    'email' => 'tempor.arcu.Vestibulum@erat.net',
                    'telefoonnummer' => '1',
                    'gebruikersnaam' => 'SolomonHenderson',
                    'wachtwoord' => 'green',
                    'foto' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'instagram' => '')
            );
            ?>
	</head>
	<body>
		<h1>Docenten</h1>
		<div class = "docentenvakken">
			
			<?php
			foreach ($docentenData as $docent) { //Herhaalt totdat alle docenten hun eigen vierkantje hebben
				echo "
				<a href='docent.php?docent=$docent[docent_id]'>
                    <div class = 'docentenvak' id= '$docent[docent_id]'>
					    <div class = 'green'>
					    </div>
					    <div class = 'white'>
						    <img class='docentenfoto' src='Images/$docent[foto]' alt='Foto van $docent[voornaam]'>
						    <p><b>$docent[voornaam] $docent[achternaam] </b></p>
						    <p>$docent[wachtwoord]</p>
					    </div>
				    </div>
                </a>";
			}
			?>
		</div>
	</body>
</html>