<style>
table {
  border-collapse: collapse;
  width: 100%;
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
<main class="content">
	<div class='contentBlock-nohover'>
		<div class='contentBlock-side'></div>
		<div class='contentBlock-content'>
			<p class='contentBlock-title'><?php echo $lang['PRESENT_TITLE']; ?></p>
			<div class='contentBlock-text-normal'>
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
							$docentNamee = "{$lang['GEEN_DOCENT_NAAM'] }";
						}
				?>
					<tr>
						<td><a href="docent?docent=<?php echo $beschikbaarheidOutput['docent_id'][0]; ?>"><?= ($docentNamee == '') ? 'Naam docent':$docentNamee; ?></a></td>
						<td>
							<?php
								if($beschikbaarheidOutput['Maandag'][0] == '') {
									echo "{$lang['DOCETNEN_VRIJ']}";
								} else {
									echo $beschikbaarheidOutput['Maandag'][0]." - ".$beschikbaarheidOutput['Maandag'][1]; 
								}
							?>
						</td>
						<td>
							<?php
								if($beschikbaarheidOutput['Dinsdag'][0] == '') {
									echo "{$lang['DOCETNEN_VRIJ']}";
								} else {
									echo $beschikbaarheidOutput['Dinsdag'][0]." - ".$beschikbaarheidOutput['Dinsdag'][1]; 
								}
							?>
						</td>
						<td>
							<?php
								if($beschikbaarheidOutput['Woensdag'][0] == '') {
									echo "{$lang['DOCETNEN_VRIJ']}";
								} else {
									echo $beschikbaarheidOutput['Woensdag'][0]." - ".$beschikbaarheidOutput['Woensdag'][1]; 
								}
							?>
						</td>
						<td>
							<?php
								if($beschikbaarheidOutput['Donderdag'][0] == '') {
									echo "{$lang['DOCETNEN_VRIJ']}";
								} else {
									echo $beschikbaarheidOutput['Donderdag'][0]." - ".$beschikbaarheidOutput['Donderdag'][1]; 
								}
							?>
						</td>
						<td>
							<?php
								if($beschikbaarheidOutput['Vrijdag'][0] == '') {
									echo "{$lang['DOCETNEN_VRIJ']}";
								} else {
									echo $beschikbaarheidOutput['Vrijdag'][0]." - ".$beschikbaarheidOutput['Vrijdag'][1]; 
								}
							?>
						</td>
					</tr>
					<?php 
					}else if($resultTimes->num_rows == 0){
						echo"<h1>{$lang['GEEN_BESCHIKBARE_DOCENTEN']}</h1>";
						break;
					}
				}
				?>
				</table>
			</div>
		</div>
	</div>
</main>