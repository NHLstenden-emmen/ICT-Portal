<?php 
    $docentID = 3;
   
    $result = $DB->Get("SELECT docent_id, beschikbaarheid_maandag, beschikbaarheid_dinsdag, beschikbaarheid_woensdag, beschikbaarheid_donderdag, beschikbaarheid_vrijdag FROM docenten_beschikbaarheid");
	for ($i=0; $i < $result->num_rows; $i++) { 
		if($result->num_rows > 0){
			$beschikbaarheidDB = $result->fetch_assoc();
			
			foreach($beschikbaarheidDB as $key => $value){
				if(!empty($value)){
					$beginEindTijd = preg_split("/[\s,]+/", str_replace('-', '', $value));
					$beschikbaarheidOutput[$key] = $beginEindTijd;
					
				}
				else {
					$beschikbaarheidOutput[$key][0] = '';
					$beschikbaarheidOutput[$key][1] = '';
				}
			}
		?>
		<div class="beschikbareTijden" style='margin-top:20px;'>
			<h3>docenten naam</h3>
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
		}else if($result->num_rows == 0){
			echo"<h1>Er zijn geen uuren gevonden.</h1>";
		}
	}
?>