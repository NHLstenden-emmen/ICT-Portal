<?php
	if(isset($_POST['submitButton'])){
		$name = $_POST["contactVoornaam"]." ".$_POST["contactAchternaam"];
		$email = $_POST["contactEmail"];
		//wordwrap so it wont be one long string.
		$message = wordwrap($_POST["contactMessage"],70,"<br>\n");
		$Core->Mail($name,$email,$message);
	}

	//TODO: PHP Validatie van velden
?>
<div class='devider'>
    <div class='pageContentBlock'>
		<main class="content" style="padding: 0">
			<div class='contentBlock-nohover'>
				<div class='contentBlock-side'></div>
				<div class='contentBlock-content'>
					<p class='contentBlock-title'>Contact</p>
					<div class='contentBlock-text-normal'>
						<form method="post">
							<label for="contactVoornaam">Voornaam</label><br>
							<input type="text" name="contactVoornaam" placeholder="Voornaam" required/><br><br>

							<label for="contactAchternaam">Achternaam</label><br>
							<input type="text" name="contactAchternaam" placeholder="Achternaam" required/><br><br>

							<label for="contactEmail">Emailadres</label><br>
							<input type="text" name="contactEmail" placeholder="Emailadres" required/><br><br>

							<label for="contactMessage">Bericht</label><br>
							<textarea name="contactMessage" placeholder="Type hier uw bericht" rows="4" cols="50" required></textarea><br>
							
							<button type="submit" id="submit" name="submitButton">Verstuur</button>
						</form>
					</div>
				</div>

			</div>
		</main>
	</div>

	<div class="pageSidebarBlock">
		<div class="contactInfo">
			<p><b>Telefoonnummer:</b> <a href="tel:0612312312">0612312312</a><br /> 
			<b>Adresgegevens:</b> Van schaikweg 26<br>
			<b>Emailadres:</b> <a href="mailto:studentinfo@nhlstenden.com">studentinfo@nhlstenden.com</a><br>
			</p>
		</div>

		<div class="kaartSchool">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2413.4466515339077!2d6.910182015960468!3d52.77825362481008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b7e61f3ec72443%3A0xbe9d297b3e4fbcc7!2sNHL%20Stenden%20Hogeschool!5e0!3m2!1snl!2snl!4v1603038721287!5m2!1snl!2snl" 
				width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
</div>