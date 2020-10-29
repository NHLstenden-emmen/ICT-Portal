<main class="content">
    <div class="subTitle"><?php echo $lang['DOCENT_LIST']; ?></div>
    <div class = "contentBlock-grid">
    <?php $result = $DB->Get("SELECT * FROM docenten");
    while($docentData = $result->fetch_assoc()){
        echo "<div class='contentBlock' onclick=".'"'."window.location.href='docent?docent={$docentData["docent_id"]}'".'"'.">
            <div class='contentBlock-side'></div>
            <div class='contentBlock-content'>";
                if(!empty($docentData['foto'])){
                    echo '<img class="docentenFoto" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docentData['foto']).'" alt="foto van '.$docentData['voornaam'].'>" /><br />';
                } else {
                    echo '<img class="docentenFoto" src="images/avatar_default.jpg" alt="Geen foto ingesteld" /><br />';
                }
                echo "<div class='docentBlok-voornaam'>{$docentData['voornaam']}</div>
                <div class='docentBlok-achternaam'>{$docentData['achternaam']}</div>
            </div>
        </div>";
    } ?>
    </div>
</main>