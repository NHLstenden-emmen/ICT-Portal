<main class="content">
    <div class='contentBlock-nohover'>
				<div class='contentBlock-side'></div>
				<div class='contentBlock-content'>
					<div class='contentBlock-title'>Nieuws bericht plaatsen</div>
						<div class='contentBlock-text-normal'>
							<form method="post">
                                
								<label for="titel_nl">Titel</label><br>
								<input type="text" name="titel_nl" placeholder="Titel" required/><br><br>
								
                                <label for="tekst_nl">Nieuws Bericht</label><br>
								<textarea name="tekst_nl" placeholder="Type hier uw nieuws bericht" rows="8" cols="50" required></textarea><br>
								
                                <label for="bijlage_nl">Bijlage</label><br>
								<input type="file" name="bijlage_nl" /><br><br>

								<label for="afbeelding_nl">Afbeelding</label><br>
								<input type="file" name="afbeelding_nl" /><br><br>


								
								<button type="submit" id="submit" name="submitButton">Plaatsen</button>
							</form>
                            <?php 
                                // Datum vandaag, voor in database evt.
                                $datumVandaag = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
                            
                                if(isset($_POST["submitButton"])){
                                    $titel = $_POST["titel_nl"];
                                    $tekst = $_POST["tekst_nl"];
                                    $bijlage = $_POST["bijlage_nl"];
                                    $afbeelding = $_POST["afbeelding_nl"];
                                    
                                    /* eventueel om te controleren of alles opgevangen word
                                    echo "$titel <br>";
                                    echo "$tekst <br>";
                                    echo "$bijlage <br>";
                                    echo "$afbeelding <br>";
                                    echo $datumVandaag;
                                    */
                                }
                            ?>
						</div>
				</div>
		</div>
</main>