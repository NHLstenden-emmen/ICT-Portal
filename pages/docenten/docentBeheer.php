<main class="content">

<div class='contentBlock-nohover docentenbeheer'>
		<div class='contentBlock-side'></div>
		<div class='contentBlock-content'>


<?php
    //Toevoegen
    if(isset($_POST['submitInvoegen'])){

        $exsitsResult = $DB->Get("SELECT * FROM docenten WHERE gebruikersnaam = '{$_POST['docentGebruikersnaam']}' OR email = '{$_POST['docentEmail']}' LIMIT 1");
		//Select where username and password are equal to form input
        if(!empty($_POST['docentVoornaam'])){
            if(!empty($_POST['docentAchternaam'])){
                if(!empty($_POST['docentEmail'])){
                    if(!empty($_POST['docentGebruikersnaam'])){
                        if($exsitsResult->num_rows == 0){
                            if(!empty($_POST['docentWachtwoord'])){
                                if($_POST['docentWachtwoord'] == $_POST['docentWachtwoordHerhaal']){
                                    $docentWachtwoord = md5($_POST['docentWachtwoordHerhaal']);
                                    if(!empty($_FILES["docentFoto"]["name"])) { 
                                        $fileName = basename($_FILES["docentFoto"]["name"]); 
                                        
                                        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                                        
                                        $allowTypes = array('jpg','png','jpeg','gif'); 
                                        if(in_array($fileType, $allowTypes)){ 
                                        $image = $_FILES['docentFoto']['tmp_name']; 
                                        $imgContent = addslashes(file_get_contents($image)); 
                                        $DB->Get("INSERT INTO docenten
                                                (voornaam, 
                                                achternaam, 
                                                email, 
                                                telefoonnummer,
                                                gebruikersnaam,
                                                wachtwoord,
                                                twitter,
                                                linkedin,
                                                instagram,
                                                foto)
                                                VALUES
                                                ('{$_POST['docentVoornaam']}',
                                                '{$_POST['docentAchternaam']}',
                                                '{$_POST['docentEmail']}',
                                                '{$_POST['docentTelefoonnummer']}', 
                                                '{$_POST['docentGebruikersnaam']}',
                                                '{$docentWachtwoord}',
                                                '{$_POST['docentTwitter']}',
                                                '{$_POST['docentLinkedin']}',
                                                '{$_POST['docentInstagram']}',
                                                '{$imgContent}'
                                                )");
                                                header("Location: docentbeheer");
                                        }
                                    }
                                    else {
                                        $DB->Get("INSERT INTO docenten
                                        (voornaam, 
                                        achternaam, 
                                        email, 
                                        telefoonnummer,
                                        gebruikersnaam,
                                        wachtwoord,
                                        twitter,
                                        linkedin,
                                        instagram)
                                        VALUES
                                        ('{$_POST['docentVoornaam']}',
                                        '{$_POST['docentAchternaam']}',
                                        '{$_POST['docentEmail']}',
                                        '{$_POST['docentTelefoonnummer']}', 
                                        '{$_POST['docentGebruikersnaam']}',
                                        '{$docentWachtwoord}',
                                        '{$_POST['docentTwitter']}',
                                        '{$_POST['docentLinkedin']}',
                                        '{$_POST['docentInstagram']}'
                                        )");
                                    }

                                    $lastID = $DB->LastID();
                                    $DB->Get("INSERT INTO docenten_beschikbaarheid (docent_id) VALUES ('{$lastID}')");
                                    header("Location: docentbeheer");
                                }
                                else {
                                    echo $lang['DOCENTBEHEER_ERRORLOG_WWG'];
                                }
                            }
                            else {
                                echo $lang['DOCENTBEHEER_ERRORLOG_WWM'];
                            }
                        }
                        else {
                            echo $lang['DOCENTBEHEER_ERRORLOG_MAIL'];
                        }
                    }
                else {
                        echo $lang['DOCENTBEHEER_ERRORLOG_GB'];
                }
            }
            else {
                echo $lang['DOCENTBEHEER_ERRORLOG_GMAIL'];
            }
        }
        else {
            echo $lang['DOCENTBEHEER_ERRORLOG_NA'];
        }
    }
    else {
        echo $lang['DOCENTBEHEER_ERRORLOG_NV'];
    }   
}

        $docentID = intval($_COOKIE['userID']);

        //Laat de weergave pagina zien
        if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete'])){
            echo "<div class='contentBlock-title'>{$lang["DOCENTEN_BEHEER_KEUZEMENU"]} </div><div class='contentBlock-text-normal'>";

            $docentenResult = $DB->Get("SELECT *FROM docenten WHERE docent_id != '{$docentID}' ORDER BY docent_id ASC "); //Haalt alle docenten op

            echo "<table>";
            while($docentenData = $docentenResult->fetch_assoc()){
                echo "<tr>";
                    echo "<td>{$docentenData['voornaam']} {$docentenData['achternaam']}</td>";
                    echo "<td><form method='post'><input type='hidden' value='{$docentenData['docent_id']}' name='verwijderID'><button type='submit' name='submitDelete'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table><form method='post'><button type='submit' name='invoegenPage'>{$lang["NIEUWS_BEHEER_INVOEGEN"]}</button></form>";

        }
        //Laat de invoegen pagina zien
        else if(isset($_POST['invoegenPage']) && !isset($_POST['submitDelete'])){ ?>
        <div class='contentBlock-title'><?php echo $lang["DOCENTEN_BEHEER_ADD"]?> </div><div class='contentBlock-text-normal'>
        <img src='images/avatar_default.jpg' style='color: var(--tekstColor); display: block; border-radius: 50%; object-fit: cover; margin: 2vw; height: 30vw; width: 30vw; max-width: 65%;'>
            <form method='POST' enctype='multipart/form-data'> 
                <label for='docentVoornaam'><?PHP echo  $lang["DOCENTEN_BEHEER_FOTO"]?></label><br />
                <input type='file' name='docentFoto'><br />
                <br />
                <div class='subTitle'><?PHP echo $lang["DOCENTEN_BEHEER_PF_INFO"]?></div><br />
                <label for='docentVoornaam'><?PHP echo $lang["CONTACT_VOORNAAM"]?>*</label><br />
                <input type='text' name='docentVoornaam' placeholder='<?PHP echo $lang["CONTACT_VOORNAAM"]?>' required><br />
                
                <label for='docentAchternaam'><?PHP echo $lang["CONTACT_ACHTERNAAM"]?>*</label><br />
                <input type='text' name='docentAchternaam' placeholder='<?PHP echo $lang["CONTACT_VOORNAAM"]?>' required><br />
                
                <label for='docentEmail'><?PHP echo $lang["CONTACT_EMAIL"]?>*</label><br />
                <input type='text' name='docentEmail' placeholder='Docent@nhlstenden.com' required><br />
            
                <label for='docentTelefoonnummer'><?PHP echo $lang["CONTACT_TELL"]?></label><br />
                <input type='text' name='docentTelefoonnummer' placeholder='0612345678'><br />
                
                <label for='docentGebruikersnaam'><?PHP echo $lang["DOCENTEN_BEHEER_GEBRUIKERSNAAM"]?>*</label><br />
                <input type='text' name='docentGebruikersnaam' placeholder='<?PHP echo $lang["DOCENTEN_BEHEER_GEBRUIKERSNAAM"]?>' required><br />
                <br />
                <div class='subTitle'><?PHP echo $lang["DOCENTEN_BEHEER_SOCIAL"]?></div><br />
                <label for='docenttwitter'>
<?PHP echo $lang["DOCENTEN_BEHEER_SOCIAL_TWITTER"]?></label><br />
                <input type='text' name='docentTwitter' placeholder='Twitter'><br />
                
                <label for='docentLinkedin'>
<?PHP echo $lang["DOCENTEN_BEHEER_SOCIAL_LINKEDIN"]?></label><br />
                <input type='text' name='docentLinkedin' placeholder='Linkedin'><br />
                
                <label for='docentInstagram'>
<?PHP echo $lang["DOCENTEN_BEHEER_SOCIAL_INSTA"]?></label><br />
                <input type='text' name='docentInstagram' placeholder='Instagram'><br />
                <br />
                <div class='subTitle'>
<?PHP echo $lang["DOCENTEN_BEHEER_BEVEILIGING"]?></div><br />
                <label for='docentWachtwoord'>
<?PHP echo $lang["DOCENTEN_BEHEER_WACHTWOORD"]?>*</label><br />
                <input type='password' name='docentWachtwoord' placeholder='<?PHP echo $lang["DOCENTEN_BEHEER_WACHTWOORD"]?>' required><br />

                <label for='docentWachtwoordHerhaal'>
<?PHP echo $lang["DOCENTEN_BEHEER_WACHTWOORD_HERHALEN"]?>*</label><br />
                <input type='password' name='docentWachtwoordHerhaal' placeholder='<?PHP echo $lang["DOCENTEN_BEHEER_WACHTWOORD_HERHALEN"]?>' required><br />

                <p>
<?PHP echo $lang["DOCENTEN_BEHEER_VERPLICHT"]?></p>
                <button type='submit' name='submitInvoegen'>
<?PHP echo $lang["BESCHIKBAARHEID_SAVE"]?></button>
                <button type='button' onclick="."window.location.href='docentbeheer'".">
<?PHP echo $lang["DOCENTEN_BEHEER_ANNULEREN"]?></button>
            </form>
        <?PHP
    }
    else if(!isset($_POST['invoegenPage']) && isset($_POST['submitDelete']) && intval($_POST['verwijderID'])){
        $DB->Get("DELETE FROM docenten WHERE docent_id='{$_POST['verwijderID']}'");
        header('location: docentbeheer');
    }
    ?>
            </div>
        </div>
    </div>
</main> 