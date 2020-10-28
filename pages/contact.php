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
		<main class="content">
			<div class='contentBlock-nohover'>
				<div class='contentBlock-side'></div>
				<div class='contentBlock-content'>
					<p class='contentBlock-title'><?php echo $lang['CONTACT_CONTACT']; ?></p>
					<div class='contentBlock-text-normal'>
						<form method="post">
							<label for="contactVoornaam"><?php echo $lang['CONTACT_VOORNAAM']; ?></label><br>
							<input type="text" name="contactVoornaam" id="contactVoornaam" placeholder="<?php echo $lang['CONTACT_VOORNAAM']; ?>" required/><br><br>

							<label for="contactAchternaam"><?php echo $lang['CONTACT_ACHTERNAAM']; ?></label><br>
							<input type="text" name="contactAchternaam" id="contactAchternaam" placeholder="<?php echo $lang['CONTACT_ACHTERNAAM']; ?>" required/><br><br>

							<label for="contactEmail"><?php echo $lang['CONTACT_EMAIL']; ?></label><br>
							<input type="text" name="contactEmail" id="contactEmail" placeholder="<?php echo $lang['CONTACT_EMAIL']; ?>" required/><br><br>

							<label for="contactMessage"><?php echo $lang['CONTACT_BERICHT']; ?></label><br>
							<textarea name="contactMessage" id="contactMessage" placeholder="<?php echo $lang['CONTACT_BERICHT']; ?>" rows="4" cols="50" required></textarea><br>
							
							<button type="submit" id="submit" name="submitButton"><?php echo $lang['CONTACT_BERICHT']; ?></button>
						</form>
					</div>
				</div>

			</div>
		</main>
		<div class="contactsidebar">
			<div class="contactInfo">
				<p><b><?php echo $lang['CONTACT_TELL']; ?>:</b><br> <a href="tel:0612312312">0612312312</a><br /> 
				<b><?php echo $lang['CONTACT_ADRES']; ?>:</b><br> Van schaikweg 26 Emmen<br>
				<b><?php echo $lang['CONTACT_EMAIL']; ?>:</b><br> <a href="mailto:studentinfo@nhlstenden.com">studentinfo@nhlstenden.com</a><br>
				</p>
			</div>

			<div class="kaartSchool">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2413.4466515339077!2d6.910182015960468!3d52.77825362481008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b7e61f3ec72443%3A0xbe9d297b3e4fbcc7!2sNHL%20Stenden%20Hogeschool!5e0!3m2!1snl!2snl!4v1603038721287!5m2!1snl!2snl" ></iframe>
			</div>
		</div>
	</div>
</div>