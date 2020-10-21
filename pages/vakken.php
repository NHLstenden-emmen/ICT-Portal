<<<<<<< Updated upstream
<div class="vakken">
    die saaie vakken je weet wel
</div>
=======
<main class="content">
    <div class="left_content">

    <?php 

    if(isset($_POST['submitVakken'])){
        //Query voor alle vakken uit dat jaar.

        echo "<div class='subTitle'>Jaar {$_POST['jaarSelectie']} | Vakken</div>
        <div class = 'contentBlock-grid'>";


        $result = $DB->Get("SELECT * FROM docenten");
        
        while($docentData = $result->fetch_assoc()){
        
        $docentenLink = 'window.location.href="vak?vak='.$docentData['docent_id'].'"';
        echo "<div class='contentBlock' onclick='{$docentenLink}'>
            <div class='contentBlock-side'></div>
            <div class='contentBlock-content'>
            <div class='contentBlock-title'>Vaknaam</div>
            <div class='contentBlock-text'>Vakbeschrijving</div>
            </div>
            </div>";
        }
        echo "</div>";
    }
    else {
?>
        <div class="subTitle">Vakkenlijst</div>
        <p>Selecteer hier een jaar om alle vakken van het betreffende jaar te tonen.</p>
        <form method="POST">
        <select name="jaarSelectie">
            <option value="1">Jaar 1</option>
            <option value="2">Jaar 2</option>
            <option value="3">Jaar 3</option>
            <option value="4">Jaar 4</option>
        </select>
        <button type="submit" name="submitVakken">opslaan</button>
        </form>
<?php      
    }
    ?>
    </div>
</main>
>>>>>>> Stashed changes
