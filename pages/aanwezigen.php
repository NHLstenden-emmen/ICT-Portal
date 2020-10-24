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

    $resultTimes = $DB->Get("SELECT docent_id, Maandag, Dinsdag, Woensdag, Donderdag, Vrijdag FROM docenten_beschikbaarheid");
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
				<?= ($beschikbaarheidOutput['Maandag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['Maandag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['Maandag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['Maandag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['Dinsdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['Dinsdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['Dinsdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['Dinsdag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['Woensdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['Woensdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['Woensdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['Woensdag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['Donderdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['Donderdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['Donderdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['Donderdag'][1]; ?>
			</td>
			<td>
				<?= ($beschikbaarheidOutput['Vrijdag'][0] == '') ? 'Vrij':$beschikbaarheidOutput['Vrijdag'][0]; ?>
				/
				<?= ($beschikbaarheidOutput['Vrijdag'][1] == '') ? 'Vrij':$beschikbaarheidOutput['Vrijdag'][1]; ?>
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