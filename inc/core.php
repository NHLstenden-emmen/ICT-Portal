<?php
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
	

	function Logout() { 

		if($this->AuthCheck()){
			setcookie("auth", "", time()-3600);
			setcookie("fullUser", "", time()-3600);
			setcookie("user", "", time()-3600); //Remove cookie
			setcookie("userID", "", time()-3600);

			return true;
		}
		else {
			return false;
    }
	}

	function weatherData(){
				
		// The private key
		$apiKey = "25957a1a29b039b5ca004840d8eecb9c";
		// The location to get the data from
		$cityName = "Emmen";
		// Open Weather api url
		$googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&units=metric&lang=".$_COOKIE['lang']. "&appid=" . $apiKey;

		// Create the call for the api
		$curl = curl_init();

		// He only gets the result nothing else
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_URL, $googleApiUrl);

		// saves the response in a var
		$response = curl_exec($curl);
			
		// closes the connection
		curl_close($curl);

		// converts the response into a PHP variable
		$data = json_decode($response);

		if ($data->cod != 200) {
			return "<p>Er is iets fout gegaan met het ophalen van het weerbericht!</p>";
		}
		else {
			return $data;
		}
	}


	function subTitleText($pageTitle){
		global $lang;
		switch ($pageTitle) {
			case 'nieuws':
                $pageSubtitle = "Test";
                break;
            case 'vakken':
                $pageSubtitle = "";
                break;
            case 'docenten':
                $pageSubtitle = "";
                break;
            case 'docent':
                $pageSubtitle = "";
                break;
            case 'contact':
                $pageSubtitle = "";
                break;
            case 'aanwezigen':
                $pageSubtitle = "";
                break;
            case 'login':
                $pageSubtitle = "";
                break;
            case 'uitloggen':
                $pageSubtitle = "";
                break;
            case 'uploadNieuws':
                $pageSubtitle = "";
                break;
            case 'profiel-bewerken':
                $pageSubtitle = "";
                break;
            case 'beschikbaarheid':
                $pageSubtitle = "";
                break;
            // disclaimers
            case 'privacyPolicy':
                $pageSubtitle = "";
                break;
            case 'termsAndConditions':
                $pageSubtitle = "";
                break;
            default:
				$pageSubtitle = "";
		}
			return $pageSubtitle;
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