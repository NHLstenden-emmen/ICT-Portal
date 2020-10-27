<main class="content">
<?php

	$docentID = intval($_GET['docent']);
	$result = $DB->Get("SELECT * FROM docenten WHERE docent_id = '".$docentID." LIMIT 1'"); //Haalt alle gegevens van de ID docent op.
	$docent = $result->fetch_assoc();
	if($result->num_rows > 0) {

	echo "
		<div class='contentBlock-nohover'>

			<div class='contentBlock-side'></div> 
			
			<div class='contentBlock-content'>";

				if(!empty($docent['foto'])){
					echo '<img class="docentenWeergaveFoto" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docent['foto']).'" alt="foto van '.$docent['voornaam'].'>" />';
				} else {
					echo '<img class="docentenWeergaveFoto" src="images/avatar_default.jpg" alt="Geen foto ingesteld" />';
				}
		
				echo "<p class='docentBlok-naam'>{$docent['voornaam']}</p>
				<p class='docentBlok-achternaam'>{$docent['achternaam']}</p>";
					 

				$beschikbaarheidResult = $DB->Get("SELECT 
					Maandag, 
					Dinsdag, 
					Woensdag, 
					Donderdag, 
					Vrijdag  
					FROM docenten_beschikbaarheid 
					WHERE docent_id = '{$docentID}' LIMIT 1");

				if ($beschikbaarheidResult->num_rows > 0) {
					$beschikbaarheidData = $beschikbaarheidResult->fetch_assoc();
					//Beschikbaarheid
					echo "<p class='docentBlok-beschikbaarheid'>
							<b>{$lang['PRESENT_BESCHIKBAARHEID']}</b><i><br />";


					foreach ($beschikbaarheidData as $key => $value) {
						
						$beschikbaarheidOutput = $key.": ";
						if (empty($value)) {
							$beschikbaarheidOutput.= "{$lang['DOCENTEN_VRIJ']}<br /> ";
						} else {
							$beschikbaarheidOutput.= $value. "<br /> ";
						}
						echo $beschikbaarheidOutput;
					}
				}

					print_r($beschikbaarheidResult->fetch_assoc());
					echo "</i></p>";
				echo "<p class='docentBlok-vakken'><b>{$lang['GEEN_DOCENT_VAKKEN']}</b><br /><i>";
						
				$vakkenResult = $DB->Get("	SELECT vakken.vak, vakken.jaarlaag, vakken.periode 
											FROM docenten_vakken INNER JOIN vakken 
											ON docenten_vakken.vak_id = vakken.vak_id 
											WHERE docent_id = '{$docentID}'
											ORDER BY vakken.jaarlaag ASC, vakken.periode ASC"); //Haalt alle vakken van de ID docent op.
				
				if($vakkenResult->num_rows > 0) {
					while($vakkenData = $vakkenResult->fetch_assoc()){
						echo $vakkenData['vak']. " (Jaar {$vakkenData['jaarlaag']} P{$vakkenData['periode']})<br />";
					}
				}
				else {
					echo "{$lang['GEEN_DOCENT_GEEN_VAKKEN']}";
				}

				echo "</i></p>

				<hr class='mobileDivider'>
				<div class='docentBlok-Icons'>";

					if (!empty($docent['telefoonnummer'])) {
					echo "<a href='tel:{$docent['telefoonnummer']}' class='telefoonnummer'><i class='fa fa-phone' aria-hidden='true'></i>
					<span class='telefoonnummerhover'>{$docent['telefoonnummer']}</span></a>";
					}
					if (!empty($docent['email'])) {
						echo "<a href='mailto:{$docent['email']}' ><i class='fa fa-envelope' aria-hidden='true'></i></a>";
					}
					if (!empty($docent['twitter'])) {
						echo "<a href='https://twitter.com/{$docent['twitter']}' target='_blank'><i class='fa fa-twitter' aria-hidden='true'></i></a>";
					}
					if (!empty($docent['linkedin'])) {
						echo "<a href='https://linkedin.com/{$docent['linkedin']}' target='_blank'><i class='fa fa-linkedin' aria-hidden='true'></i></a>";
					}
					if (!empty($docent['instagram'])) {
					echo "<a href='https://instagram.com/{$docent['instagram']}' target='_blank'><i class='fa fa-instagram' aria-hidden='true'></i></a>";
					}

				echo "  

				</div>

			</div>

		</div>";
	}
	else {
		echo "<h1>{$lang['GEEN_DOCENT_NONEXISTENT']}</h1>";
		//404
	}
?>
</main>