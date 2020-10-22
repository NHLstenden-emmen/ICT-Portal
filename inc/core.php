<?php
/**
*
*/
class Core
{

	function AuthCheck()
	{
		if(isset($_COOKIE["user"]) || isset($_COOKIE["userID"]) || isset($_COOKIE["auth"]) || isset($_COOKIE['fullUser']))
		{   
			return true;
		}
		else {
			return false;
		}	
	}

	function AuthKey($length) { //Function to generate a random authentication key
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)]; //Get random INT, generate a letter and add it to string
		}
		return $randomString; //Return String value
	}

	function Logout(){
		setcookie("user", "", time()-3600); //Remove cookie
		setcookie("userID", "", time()-3600);
		setcookie("auth", "", time()-3600);
		setcookie("fullUser", "", time()-3600);

		header("location: index.php"); //Goto login page
	}

	
	function Mail($name,$email,$message){
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
		mail("studentinfo@nhlstenden.com","This is a mail from ICT PORTAL","From:".$name."<br>Email:".$email."<br><br>".$message,$headers );
	}
}
?>