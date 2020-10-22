<main class="content">
	<div class='contentBlockContactPage'>
		<div class='contentBlock-side'></div>
		<div class='contentBlock-content'>
			<div class='contentBlock-title'>Contact</div>
			<div class='contentBlock-text'>
				<form class="myForm" method="post">
					<label for="fname">Voornaam</label>
					<input type="text" name="fname" placeholder="Voornaam" required/><br>
					<input type="text" id="lname" name="lname" placeholder="Achternaam" required/><br>
					<input type="text" id="email" name="email" placeholder="Emailadres" required/><br>
					<textarea id="subject" name="message" placeholder="Type hier uw bericht" rows="4" cols="50" required></textarea><br>
					<button type="submit" id="submit" name="submit">Verstuur</button>

				</form>
				<?php
						if(!empty(array_key_exists('submit', $_POST))){
							$name = $_POST["fname"]." ".$_POST["lname"];
							$email = $_POST["email"];
							//wordwrap so it wont be one long string.
							$message = wordwrap($_POST["message"],70,"<br>\n");
							mailingfunction($name,$email,$message);
						}
					?>
			</div>
		</div>
	</div>
	<div class="contactInfo">
		<p>Telefoonnummer: <a href="tel:0612312312">0612312312</a><br /> 
		Adresgegevens: Van schaikweg 26<br>
		Emailadres: secretariaat@deschool.nl<br>
		</p>
	</div>
	
	<div class="kaartSchool">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2413.4466515339077!2d6.910182015960468!3d52.77825362481008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b7e61f3ec72443%3A0xbe9d297b3e4fbcc7!2sNHL%20Stenden%20Hogeschool!5e0!3m2!1snl!2snl!4v1603038721287!5m2!1snl!2snl" width="300" height="225" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>

</main>

<?php
function mailingfunction($name,$email,$message){
	$headers = "From: noreply@ICTPortal.com" . "\r\n" .
	"Bcc:".$email;

	if(empty($email || $message)) {
		$msgerror = '<span class="error"> Vul alle velden in</span>';
		// check if name is valid
	} else if (!preg_match("/^[a-zA-Z-' ]{2,}$/",$name)) {
		$msgerror = "Vul uw voor en achternaam in. Alleen letters en spaties zijn toegestaan";
		// check if email is valid
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msgerror = "Dit is geen geldige e mailadres";
	}  else {
		$msgerror = '';
	}
	echo $msgerror;
	mail("studentinfo@nhlstenden.com","This is a mail from ICT PORTAL","From:".$name."<br>Email:".$email."<br><br>".$message );
}
?>