<?php 
    $docentID = 3;
   
    $resultTimes = $DB->Get("SELECT docent_id, beschikbaarheid_maandag, beschikbaarheid_dinsdag, beschikbaarheid_woensdag, beschikbaarheid_donderdag, beschikbaarheid_vrijdag FROM docenten_beschikbaarheid");
	for ($i=0; $i < $resultTimes->num_rows; $i++) {
		if($resultTimes->num_rows > 0){
			$beschikbaarheidDB = $resultTimes->fetch_assoc();
			
			foreach($beschikbaarheidDB as $key => $value){
				if(!empty($value)){
					$beginEindTijd = preg_split("/[\s,]+/", str_replace('-', '', $value));
					$beschikbaarheidOutput[$key] = $beginEindTijd;
					
				}
				else {
					$beschikbaarheidOutput[$key][0] = '';
					$beschikbaarheidOutput[$key][1] = '';
				}
				$beschikbaarheidOutput['docent_id'][0];
			}
			//make a second db call to see the name
			$resultName = $DB->Get("SELECT voornaam, achternaam FROM docenten WHERE docent_id = ".$beschikbaarheidOutput['docent_id'][0]);
			$docentName = $resultName->fetch_assoc();
			if(!empty($docentName)){
				$docentNamee = $docentName['voornaam']." ".$docentName['achternaam'];
			}
			else {
				$docentNamee = "Geen naam gevonden";
			}
		?>
		
		<div class="beschikbareTijden" style='margin-top:20px;'>
			<h3><?= ($docentNamee == '') ? 'Naam docent':$docentNamee; ?></h3>
			<strong><p>Maandag</p></strong>
			<p>
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_maandag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_maandag'][0]; ?></span>
				/
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_maandag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_maandag'][1]; ?></span>
			</p>
			<strong><p>Dinsdag</p></strong>
			<p>
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_dinsdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_dinsdag'][0]; ?></span>
				/
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_dinsdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_dinsdag'][1]; ?></span>
			</p>
			<strong><p>Woensdag</p></strong>
			<p>
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_woensdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_woensdag'][0]; ?></span>
				/
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_woensdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_woensdag'][1]; ?></span>
			</p>
			<strong><p>Donderdag</p></strong>
			<p>
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_donderdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_donderdag'][0]; ?></span>
				/
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_donderdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_donderdag'][1]; ?></span>
			</p>
			<strong><p>Vrijdag</p></strong>
			<p>
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_vrijdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_vrijdag'][0]; ?></span>
				/
				<span><?= ($beschikbaarheidOutput['beschikbaarheid_vrijdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_vrijdag'][1]; ?></span>
			</p>

		</div>
		<?php 
		}else if($resultTimes->num_rows == 0){
			echo"<h1>Er zijn geen uuren gevonden.</h1>";
		}
	}
?>