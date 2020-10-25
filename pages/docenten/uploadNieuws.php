<main class="content">
    <div class='contentBlock-nohover'>
				<div class='contentBlock-side'></div>
				<div class='contentBlock-content'>
					<div class='contentBlock-title'>Nieuws bericht plaatsen</div>
						<div class='contentBlock-text-normal'>
							<form method="post" enctype="multipart/form-data">
                                
								<label for="titel_nl">Titel</label><br>
								<input type="text" name="titel_nl" placeholder="Titel" required /><br><br>
								
                                <label for="tekst_nl">Nieuws Bericht</label><br>
								<textarea name="tekst_nl" placeholder="Type hier uw nieuws bericht" rows="8" cols="50" required ></textarea><br>
								
                                <label for="bijlage_nl">Bijlage</label><br>
								<input type="file" name="bijlage_nl" id="bijlage_nl" /><br><br>

								<label for="afbeelding_nl">Afbeelding</label><br>
								<input type="file" name="afbeelding_nl" id="afbeelding_nl"/><br><br>


								
								<button type="submit" id="submit" name="submitButton">Plaatsen</button>
							</form>
                            <?php 
                                // Datum vandaag, voor in database evt.
                                $datumVandaag = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
                            
                                if(isset($_POST["submitButton"])){
                                    $titel = $_POST["titel_nl"];
                                    $tekst = $_POST["tekst_nl"];
                                    $bijlage = $_FILES["bijlage_nl"];
                                    $afbeelding = $_FILES["afbeelding_nl"];
                                    $errors = [];
                                    $uploadOk = 1;
                                    
                                    if(!empty($titel) && !empty($tekst)){
                                       //Image check
                                        $fileName = basename($_FILES["afbeelding_nl"]["name"]); 
                                            
                                        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                                            
                                        $allowTypes = array('jpg','png','jpeg','gif'); 
                                        if(in_array($fileType, $allowTypes)){ 
                                            $image = $_FILES['afbeelding_nl']['tmp_name']; 
                                            $imgContent = addslashes(file_get_contents($image));
                                        }else {
                                            $uploadOk = 0;
                                            array_push($errors, "Bestand is geen afbeelding");
                                        }
                                        //bijlage check
                                        $bijlageName = basename($_FILES["bijlage_nl"]["name"]); 
                                            
                                        $bijlageType = pathinfo($bijlageName, PATHINFO_EXTENSION); 
                                            
                                        $allowBijlages = array('pdf'); 
                                        if(in_array($bijlageType, $allowBijlages)){ 
                                            $bijlage = $_FILES['bijlage_nl']['tmp_name']; 
                                            $imgContent = addslashes(file_get_contents($bijlage));
                                        }else {
                                            $uploadOk = 0;
                                            array_push($errors, "Bestand is geen pdf");
                                        }
                                        // Bij verkeerde bestand error weergeven
                                        if($uploadOk == 0){
                                            foreach($errors as $error){
                                                echo $error . "<br>";
                                            }
                                        }else{
                                            //Actie uitvoeren
                                        }
                                        
                                    }else{
                                        if(empty($titel)){
                                           array_push($errors, "Geen titel ingevuld");
                                        }
                                        if(empty($tekst)){
                                            array_push($errors, "Geen bericht ingevuld");
                                        }
                                        if(empty($bijlage)){
                                            array_push($errors, "Geen bijlage gekozen");
                                        }
                                        if(empty($afbeelding)){
                                            array_push($errors, "Geen afbeelding gekozen");
                                        }
                                        foreach($errors as $error){
                                                echo $error . "<br>";
                                            }
                                        
                                        
                                    }                                
                                }
                            ?>
						</div>
				</div>
		</div>
</main>