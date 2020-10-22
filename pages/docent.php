
<?php
	$docentID = intval($_GET['docent']);
	$result = $DB->Get("SELECT * FROM docenten WHERE docent_id = '".$docentID." LIMIT 1'"); //Haalt alle gegevens van de ID docent op.
	$docent = $result->fetch_assoc();
?>
<main class="content">
    <div class="left_content">
        <?php  
    	echo "<div class='contentBlock' onclick='{$docentenLink}'>
        <div class='contentBlock-side'></div>
        <div class='contentBlock-content'>";
            if(!empty($docent['foto'])){
                echo '<img class="docentenFoto" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docent['foto']).'" alt="foto van '.$docent['voornaam'].'>" /><br />';
            } else {
                echo '<img class="docentenFoto" src="images/avatar_default.jpg" alt="Geen foto ingesteld" /><br />';
            }
            echo "<div class='docentBlok-voornaam'>{$docent['voornaam']}</div>
                 <div class='docentBlok-achternaam'>{$docent['achternaam']}</div>
        </div>
        </div>";
		?>
    </div>
</main>

