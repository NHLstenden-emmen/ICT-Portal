<style>
    table {
        width: 100%;
    }
    td:nth-child(1){
        width: 90%;
    }
    td:nth-child(2){
        width: 5%;
    }
    input {
        width: 65%;
    }
</style>

<main class="content">

<div class='contentBlock-nohover'>
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
                                            //$DB->Get("UPDATE docenten SET foto = '{$imgContent}' WHERE docent_id = '{$docentID}'");
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
                                    echo "Nieuwe docent toevoegen mislukt: Wachtwoorden niet gelijk";
                                }
                            }
                            else {
                                echo "Nieuwe docent toevoegen mislukt: Geen Wachtwoord ingevoerd.";
                            }
                        }
                        else {
                            echo "Nieuwe docent toevoegen mislukt: Deze mail of gebruikersnaam wordt al gebruikt!";
                        }
                    }
                else {
                        echo "Nieuwe docent toevoegen mislukt: Geen Gebruikersnaam ingevoerd.";
                }
            }
            else {
                echo "Nieuwe docent toevoegen mislukt: Geen Email ingevoerd.";
            }
        }
        else {
            echo "Nieuwe docent toevoegen mislukt: Geen achternaam ingevoerd.";
        }
    }
    else {
        echo "Nieuwe docent toevoegen mislukt: Geen voornaam ingevoerd.";
    }   
}

        $docentID = intval($_COOKIE['userID']);

        //Laat de weergave pagina zien
        if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete'])){
            echo "<div class='contentBlock-title'>Docentenbeheer | Keuzemenu </div><div class='contentBlock-text-normal'>";

            $docentenResult = $DB->Get("SELECT *FROM docenten WHERE docent_id != '{$docentID}' ORDER BY docent_id ASC "); //Haalt alle docenten op

            echo "<table>";
            while($docentenData = $docentenResult->fetch_assoc()){
                echo "<tr>";
                    echo "<td>{$docentenData['voornaam']} {$docentenData['achternaam']}</td>";
                    echo "<td><form method='post'><input type='hidden' value='{$docentenData['docent_id']}' name='verwijderID'><button type='submit' name='submitDelete'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table><form method='post'><button type='submit' name='invoegenPage'>Invoegen</button></form>";

        }
        //Laat de invoegen pagina zien
        else if(isset($_POST['invoegenPage']) && !isset($_POST['submitDelete'])){
        echo "<div class='contentBlock-title'>Docentenbeheer | Toevoegen </div><div class='contentBlock-text-normal'>
        <img src='images/avatar_default.jpg' style='color: var(--tekstColor); display: block; border-radius: 50%; object-fit: cover; margin: 2vw; height: 30vw; width: 30vw; max-width: 65%;'>
            <form method='POST' enctype='multipart/form-data'> 
                <label for='docentVoornaam'>Foto (standaardavatar)</label><br />
                <input type='file' name='docentFoto'><br />
                <br />
                <div class='subTitle'>Persoonlijke informatie</div><br />
                <label for='docentVoornaam'>Voornaam*</label><br />
                <input type='text' name='docentVoornaam' placeholder='Voornaam' required><br />
                
                <label for='docentAchternaam'>Achternaam*</label><br />
                <input type='text' name='docentAchternaam' placeholder='Achternaam' required><br />
                
                <label for='docentEmail'>Email*</label><br />
                <input type='text' name='docentEmail' placeholder='Docent@nhlstenden.com' required><br />
            
                <label for='docentTelefoonnummer'>Telefoonnummer</label><br />
                <input type='text' name='docentTelefoonnummer' placeholder='0612345678'><br />
                
                <label for='docentGebruikersnaam'>Gebruikersnaam*</label><br />
                <input type='text' name='docentGebruikersnaam' placeholder='Gebruikersnaam' required><br />
                <br />
                <div class='subTitle'>Socials</div><br />
                <label for='docenttwitter'>Twitter</label><br />
                <input type='text' name='docentTwitter' placeholder='Twitter'><br />
                
                <label for='docentLinkedin'>Linkedin</label><br />
                <input type='text' name='docentLinkedin' placeholder='Linkedin'><br />
                
                <label for='docentInstagram'>Instagram</label><br />
                <input type='text' name='docentInstagram' placeholder='Instagram'><br />
                <br />
                <div class='subTitle'>Beveiliging</div><br />
                <label for='docentWachtwoord'>Wachtwoord*</label><br />
                <input type='password' name='docentWachtwoord' placeholder='Wachtwoord' required><br />

                <label for='docentWachtwoordHerhaal'>Wachtwoord herhalen*</label><br />
                <input type='password' name='docentWachtwoordHerhaal' placeholder='Wachtwoord herhalen' required><br />

                <p>Invulvakken met een * zijn verplicht</p>
                <button type='submit' name='submitInvoegen'>opslaan</button>
                <button type='button' onclick="."window.location.href='docentbeheer'".">annuleren</button>
            </form>";
    }
    else if(!isset($_POST['invoegenPage']) && isset($_POST['submitDelete']) && intval($_POST['verwijderID'])){
        $DB->Get("DELETE FROM docenten WHERE docent_id='{$_POST['verwijderID']}'");
        header('location: docentbeheer');
    }
    ?>
    </div>
             
			</div>
		</div>
    </div>
</main> 