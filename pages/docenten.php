<<<<<<< HEAD
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
<br>
<div class = "docentenvakken">
	
	<?php
	foreach ($docentenData as $docent) {
		?>
		<div class="docent rand" id=<?php echo $docent['docent_id']; ?>>
			<div class="items">
				<img class='docentenfoto' src='<?php echo "gerjan.jpg"; ?>' alt='<?php echo "Foto van $docent[voornaam]"; ?>'>                    
				<p><b><?php echo $docent['voornaam']." ".$docent['achternaam']; ?></b></p>
				<p><?php echo $docent['telefoonnummer']; ?></p>
			</div>
		</div>
		<?php
	}
	?>
</div>
=======

<link rel="stylesheet" href="../css/pages/docenten.css">


<main class="content">
    <div class="left_content">

        <div class="subTitle">Docenten</div>
	        <div class = "contentBlock-grid" style="">

    <?php
    $result = $DB->Get("SELECT * FROM docenten");
    
    while($docentData = $result->fetch_assoc()){
    
    $docentenLink = 'window.location.href="/docent?docent='.$docentData['docent_id'].'"';
    echo "<div class='contentBlock' onclick='{$docentenLink}'>
        <div class='contentBlock-side'></div>
        <div class='contentBlock-content'>";
       
            if(!empty($docentData['foto'])){
                echo '<img class="docentenFoto" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docentData['foto']).'" alt="foto van '.$docentData['voornaam'].'>" /><br />';
            } else {
                echo '<img class="docentenFoto" src="css/images/avatar_default.jpg" alt="Geen foto ingesteld" /><br />';
            }

            echo "<div class='docentBlok-voornaam'>{$docentData['voornaam']}</div>
                 <div class='docentBlok-achternaam'>{$docentData['achternaam']}</div>
        </div>
        </div>";
    }
?>
    </div>
  </div>
</main> 

>>>>>>> database
