<<<<<<< Updated upstream
<div class="docenten">
    <h1>Docenten</h1>
    <div class = "docentenvakken">
        <div class = "docentenvak" id="1">
=======
<main class="content">
    <div class="left_content">

        <div class="subTitle">Docenten</div>
	        <div class = "contentBlock-grid" style="">

    <?php
    $result = $DB->Get("SELECT * FROM docenten");
>>>>>>> Stashed changes
    
            <div class = "green">
        
            </div>
            <div class = "white">
        
            </div>
        </div>
        <div class = "docentenvak" id="2">
    
<<<<<<< Updated upstream
            <div class = "green">
        
            </div>
            <div class = "white">
        
            </div>
=======
    $docentenLink = 'window.location.href="docent?docent='.$docentData['docent_id'].'"';
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
>>>>>>> Stashed changes
        </div>
    </div>
</div>