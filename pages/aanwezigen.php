<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 50px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){
	background-color: #f2f2f2;
}

th {
  background-color: var(--lightPrimaryColor);
  color: white;
}
</style>
<div class="aanwezigen">
	<h1>Op deze pagina kunt u de aanwezige docenten zien.</h1>
	<table>
		<tr>
			<th><p>Docenten Naam</p></th>
			<th><p>Maandag</p></th>
			<th><p>Dinsdag</p></th>
			<th><p>Woensdag</p></th>
			<th><p>Donderdag</p></th>
			<th><p>Vrijdag</p></th> 
		</tr>
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