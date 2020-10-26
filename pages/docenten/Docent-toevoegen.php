<?php
	//Get values from POST

	if(isset($_POST['submitButton'])){
		$usernameForm = $_POST["gebruikersnaam"];
		$passwordForm = md5($_POST["wachtwoord"]); //Turn into MD5 hash

		//Select where username and password are equal to form input
		$result = $DB->Get("SELECT * FROM docenten WHERE gebruikersnaam = '$usernameForm' AND wachtwoord = '$passwordForm'");

        if($result->num_rows > 0){
            if(isset($_POST['submitAction'])){
                if(!empty($_POST['docentVoornaam'])){
                    if(!empty($_POST['docentAchternaam'])){
                        if(!empty($_POST['docentEmail'])){
                            if(!empty($_POST['docentGebruikersnaam'])){
                                if(!empty($_POST['docentWachtwoord'])){
                                    if($_POST['docentWachtwoord'] == $_POST['docentWachtwoordHerhaal']){
                                        $docentWachtwoord = md5($_POST['docentWachtwoordHerhaal']);
                                        // store the post in a var
                                        $voornaam = $_POST["docentVoornaam"];
                                        $achternaam = $_POST["docentAchternaam"];
                                        $email = $_POST["docentEmail"];
                                        $telefoonnummer = $_POST["docentTelefoonnummer"];
                                        $gebruikersnaam = $_POST["docentGebruikersnaam"];
                                        $twitter = $_POST["docentTwitter"];
                                        $linkedin = $_POST["docentLinkedin"];
                                        $instagram = $_POST["docentInstagram"];

                                        $poststatement = $DB->put("INSERT INTO `docenten`(`voornaam`, `achternaam`, `email`, `telefoonnummer`, `gebruikersnaam`, `wachtwoord`, `twitter`, `linkedin`, `instagram`) VALUES ('$voornaam', '$achternaam', '$email' , '$telefoonnummer', '$gebruikersnaam', '$docentWachtwoord', '$twitter', '$linkedin', '$instagram')");
                                            // header('Location: profiel-bewerken');
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
    }
?>

<main class="content">
	<div class='contentBlock-nohover' style="width: 100%;">
		<div class='contentBlock-side' style="width: 100%;"></div>
		<div class='contentBlock-content' style="width: 100%;">
			<div class='contentBlock-title'>
                Docent registreren
			</div>
			<div class='contentBlock-text-normal'>
                <form method="POST" enctype="multipart/form-data"> 
                    <div class="subTitle">Persoonlijke informatie</div><br />
                    <label for="docentVoornaam">Voornaam*</label><br />
                    <input type="text" placeholder="Voornaam" name="docentVoornaam" placeholder="Voornaam" style="width: 65%;" required><br />
                    
                    <label for="docentAchternaam">Achternaam*</label><br />
                    <input type="text" placeholder="Achternaam" name="docentAchternaam" placeholder="Achternaam" style="width: 65%;" required><br />
                    
                    <label for="docentEmail">Email*</label><br />
                    <input type="text" placeholder="Email" name="docentEmail" placeholder="Docent@nhlstenden.com" style="width: 65%;" required><br />
                
                    <label for="docentTelefoonnummer">Telefoonnummer</label><br />
                    <input type="text" placeholder="Telefoonnummer" name="docentTelefoonnummer" placeholder="0612345678" style="width: 65%;"><br />
                    
                    <label for="docentGebruikersnaam">Gebruikersnaam*</label><br />
                    <input type="text" placeholder="Gebruikersnaam" name="docentGebruikersnaam" placeholder="Gebruikersnaam" style="width: 65%;" required><br />
                    <br />
                    <div class="subTitle">Socials</div><br />
                    <label for="docenttwitter">Twitter</label><br />
                    <input type="text" placeholder="gebruikers naam van twitter" name="docentTwitter" placeholder="Twitter" style="width: 65%;"><br />
                    
                    <label for="docentLinkedin">Linkedin</label><br />
                    <input type="text" placeholder="gebruikers naam van linkedin" name="docentLinkedin" placeholder="Linkedin" style="width: 65%;"><br />
                    
                    <label for="docentInstagram">Instagram</label><br />
                    <input type="text" placeholder="gebruikers naam van instagram" name="docentInstagram" placeholder="Instagram" style="width: 65%;"><br />
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
		</div>
    </div>
</main>
