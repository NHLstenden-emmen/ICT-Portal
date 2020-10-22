
		<?php

		$docentID = intval($_GET['docent']);
		$result = $DB->Get("SELECT * FROM docenten WHERE docent_id = '".$docentID." LIMIT 1'"); //Haalt alle gegevens van de ID docent op.
		$docent = $result->fetch_assoc();

		?>


<main class="content">

<?php  

echo "<div class='contentBlock-nohover'>
        <div class='contentBlock-side'></div> 
   		 	<div class='contentBlock-content'>";

    if(!empty($docent['foto'])){
        echo '<img class="docentenFoto" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docent['foto']).'" alt="foto van '.$docent['voornaam'].'>" /><br />';
    } else {
        echo '<img class="docentenFoto" src="css/images/avatar_default.jpg" alt="Geen foto ingesteld" /><br />';
    }
    
    // waarom zijn die hieronder geen <p>
    echo "
    <p class='docentBlok-naam'>{$docent['voornaam']} {$docent['achternaam']}</p>
    
    <div class='icons'> ";
        if (!empty($docent['telefoonnummer'])) {
            echo "<a class='telefoonnummer'><img src='https://www.flaticon.com/svg/static/icons/svg/254/254407.svg'>
            <span class='telefoonnummerhover'>{$docent['telefoonnummer']}</span></a>";
        }
        if (!empty($docent['email'])) {
            echo "<a href='mailto:{$docent['email']}' ><i class='fa fa-envelope fa-3x' aria-hidden='true'></i></a>";
        }
        if (!empty($docent['twitter'])) {
            echo "<a href='https://twitter.com/{$docent['twitter']}'  target='_blank'><img src='https://www.flaticon.com/svg/static/icons/svg/254/254406.svg'></a>";
        }
        if (!empty($docent['linkedin'])) {
            echo "<a href='https://linkedin.com/{$docent['linkedin']}'  target='_blank'><img src='https://www.flaticon.com/svg/static/icons/svg/1051/1051333.svg'></a>";
        }
        if (!empty($docent['instagram'])) {
        echo "<a href='https://instagram.com/{$docent['instagram']}' target='_blank'><img src='https://www.flaticon.com/svg/static/icons/svg/1384/1384031.svg'></a>";
        }
        echo "
    </div>
</div>
</div>";

?>



<?php
        /*
			echo "

			<div class= 'content'>
				<div class='green'>
				</div>
				<div class='white'>";
					if(!empty($docent['foto'])){
						echo '<img class="fotodocent" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docent['foto']).'" alt="foto van '.$docent['voornaam'].'>" /><br />';
					} else {
						echo '<img class="fotodocent" src="css/images/avatar_default.jpg" alt="Geen foto ingesteld" /><br />';
					}
					echo "
					<div class='tekst'>	
						<h1 class ='dcnaam'>{$docent['voornaam']} <br> {$docent['achternaam']}</h1>
						<p>Jaarinfo & vakken</p>
					</div>
					<div class='icons'> ";
					
						if (!empty($docent['telefoonnummer'])) {
							echo "<a class='telefoonnummer'><img src='https://www.flaticon.com/svg/static/icons/svg/254/254407.svg'>
							<span class='telefoonnummerhover'>{$docent['telefoonnummer']}</span></a>";
						}
						if (!empty($docent['email'])) {
							echo "<a href='mailto:{$docent['email']}' ><img src='https://www.flaticon.com/svg/static/icons/svg/1946/1946389.svg'></a>";
						}
						if (!empty($docent['twitter'])) {
							echo "<a href='https://twitter.com/{$docent['twitter']}'  target='_blank'><img src='https://www.flaticon.com/svg/static/icons/svg/254/254406.svg'></a>";
						}
						if (!empty($docent['linkedin'])) {
							echo "<a href='https://linkedin.com/{$docent['linkedin']}'  target='_blank'><img src='https://www.flaticon.com/svg/static/icons/svg/1051/1051333.svg'></a>";
						}
						if (!empty($docent['instagram'])) {
							echo "<a href='https://instagram.com/{$docent['instagram']}' target='_blank'><img src='https://www.flaticon.com/svg/static/icons/svg/1384/1384031.svg'></a>";
						}
						echo "

					</div>
				</div>
			</div>";*/
		?>
 