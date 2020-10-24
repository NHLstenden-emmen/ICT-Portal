<?php 
    if($Core->AuthCheck()){

    $docentID = intval($_COOKIE['userID']);
   
    $result = $DB->Get("SELECT * FROM docenten WHERE docent_id = '".$docentID."'");
    $docentData = $result->fetch_assoc();
 
if($result->num_rows > 0){
    if(isset($_POST['submitAction'])){
        if(!empty($_POST['docentVoornaam'])){
            if(!empty($_POST['docentAchternaam'])){
                if(!empty($_POST['docentEmail'])){
                    if(!empty($_POST['docentGebruikersnaam'])){
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
                                        $DB->Get("UPDATE docenten SET foto = '{$imgContent}' WHERE docent_id = '{$docentID}'");
                                    }
                                } 
                                    

                                $updateStatement = $DB->Get("UPDATE docenten SET 
                                    voornaam = '{$_POST["docentVoornaam"]}', 
                                    achternaam = '{$_POST["docentAchternaam"]}', 
                                    email = '{$_POST["docentEmail"]}',
                                    telefoonnummer = '{$_POST["docentTelefoonnummer"]}',
                                    gebruikersnaam = '{$_POST["docentGebruikersnaam"]}',
                                    wachtwoord = '{$docentWachtwoord}',
                                    twitter = '{$_POST["docentTwitter"]}',
                                    linkedin = '{$_POST["docentLinkedin"]}',
                                    instagram = '{$_POST["docentInstagram"]}'
                                        WHERE docent_id = '{$docentID}'");

                                    header('Location: profiel-bewerken');

                            }
                            else {
                                echo "Wachtwoorden niet gelijk";
                            }
                        }
                        else {
                            echo "Geen Wachtwoord ingevoerd.";
                        }
                    }
                    else {
                        echo "Geen Gebruikersnaam ingevoerd.";
                    }
                }
                else {
                    echo "Geen Email ingevoerd.";
                }
            }
            else {
                echo "Geen achternaam ingevoerd.";
            }
        }
        else {
            echo "Geen voornaam ingevoerd.";
        }   
    }
}
?>
<main class="content">

    <div class="subTitle">Profiel bewerken</div>

    <form method="POST" enctype="multipart/form-data"> 
        <?php 
        if(!empty($docentData['foto'])){
            echo '<img class="bewerkenFoto" style="max-width: 65%;" src="data:image/jpg;charset=utf8;base64,'.base64_encode($docentData['foto']).'" alt="foto van '.$docentData['voornaam'].'>" /><br />';
        } else {
            echo '<label for="docentFoto">Foto</label><br />';
        }
        ?>
        <input type="file" name="docentFoto" style="width: 65%;"><br />
        <br />
        <div class="subTitle">Persoonlijke informatie</div><br />
        <label for="docentVoornaam">Voornaam*</label><br />
        <input type="text" value="<?= $docentData['voornaam'] ?>" name="docentVoornaam" placeholder="Voornaam" style="width: 65%;" required><br />
        
        <label for="docentAchternaam">Achternaam*</label><br />
        <input type="text" value="<?= $docentData['achternaam'] ?>" name="docentAchternaam" placeholder="Achternaam" style="width: 65%;" required><br />
        
        <label for="docentEmail">Email*</label><br />
        <input type="text" value="<?= $docentData['email'] ?>" name="docentEmail" placeholder="Docent@nhlstenden.com" style="width: 65%;" required><br />
       
        <label for="docentTelefoonnummer">Telefoonnummer</label><br />
        <input type="text" value="<?= $docentData['telefoonnummer'] ?>" name="docentTelefoonnummer" placeholder="0612345678" style="width: 65%;"><br />
        
        <label for="docentGebruikersnaam">Gebruikersnaam*</label><br />
        <input type="text" value="<?= $docentData['gebruikersnaam'] ?>" name="docentGebruikersnaam" placeholder="Gebruikersnaam" style="width: 65%;" required><br />
        <br />
        <div class="subTitle">Socials</div><br />
        <label for="docenttwitter">Twitter</label><br />
        <input type="text" value="<?= $docentData['twitter'] ?>" name="docentTwitter" placeholder="Twitter" style="width: 65%;"><br />
        
        <label for="docentLinkedin">Linkedin</label><br />
        <input type="text" value="<?= $docentData['linkedin'] ?>" name="docentLinkedin" placeholder="Linkedin" style="width: 65%;"><br />
        
        <label for="docentInstagram">Instagram</label><br />
        <input type="text" value="<?= $docentData['instagram'] ?>" name="docentInstagram" placeholder="Instagram" style="width: 65%;"><br />
        <br />
        <div class="subTitle">Beveiliging</div><br />
        <label for="docentWachtwoord">Wachtwoord*</label><br />
        <input type="password" name="docentWachtwoord" placeholder="Wachtwoord" style="width: 65%;" required><br />

        <label for="docentWachtwoordHerhaal">Wachtwoord herhalen*</label><br />
        <input type="password" name="docentWachtwoordHerhaal" placeholder="Wachtwoord herhalen" style="width: 65%;" required><br />


        <p>Vakken met een * zijn verplicht</p>
        <button type="submit" name="submitAction">opslaan</button>
    </form>
    </div>
</main> 
    <?php 
}
else {
    header("Location: nieuws");
}   
?>