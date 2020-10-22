<div class="aanwezigen">
	<h1><?php echo $lang['PRESENT_TITLE']; ?></h1>
	<table>
		<tr>
			<th><p><?php echo $lang['PRESENT_Teachers_Name']; ?></p></th>
			<th><p><?php echo $lang['PRESENT_Monday']; ?></p></th>
			<th><p><?php echo $lang['PRESENT_Tuesday']; ?></p></th>
			<th><p><?php echo $lang['PRESENT_Wednesday']; ?></p></th>
			<th><p><?php echo $lang['PRESENT_Thursday']; ?></p></th>
			<th><p><?php echo $lang['PRESENT_Friday']; ?></p></th> 
		</tr>
	<?php 
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
		<tr>
			<td><a href="docent?docent=<?php echo $beschikbaarheidOutput['docent_id'][0]; ?>"><?= ($docentNamee == '') ? 'Naam docent':$docentNamee; ?></a></td>
			<td>
				<?= ($beschikbaarheidOutput['beschikbaarheid_maandag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_maandag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['beschikbaarheid_maandag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_maandag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['beschikbaarheid_dinsdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_dinsdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['beschikbaarheid_dinsdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_dinsdag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['beschikbaarheid_woensdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_woensdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['beschikbaarheid_woensdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_woensdag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['beschikbaarheid_donderdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_donderdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['beschikbaarheid_donderdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_donderdag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['beschikbaarheid_vrijdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_vrijdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['beschikbaarheid_vrijdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['beschikbaarheid_vrijdag'][1]; ?>
			</td>
		</tr>
		<?php 
		}else if($resultTimes->num_rows == 0){
			echo"<h1>Er zijn geen docneten aanwezig</h1>";
		}
	}
	?>
	</table>
</div>