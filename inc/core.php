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
		if(!isset($_COOKIE['lang'])){
			$lang = 'nl';
		} // change the button to a dutch button cause the lang is set to english
		else if($_COOKIE['lang'] == 'en'){
			$lang = 'en';
		} // change the button to a english button cause the lang is set to dutch
		else if($_COOKIE['lang'] == 'nl'){
			$lang = 'nl';
		}
				
		// The private key
		$apiKey = "25957a1a29b039b5ca004840d8eecb9c";
		// The location to get the data from
		$cityName = "Emmen";
		// Open Weather api url
		$googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&units=metric&lang=".$lang."&appid=" . $apiKey;

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

	//Deze functie heeft een resultaat (directe longblob uit DB), en een bestandmaam nodig van de query voordat hij kan werken
	function downloadFile($queryResult, $fileName){

		ob_end_clean();
            
		//Bestandsnaam genereren aan de hand van waarden uit database
			
		//Headers genereren voor export pdf + pdf downloaden door echo
		header('Content-type: application/x-download');
		header('Content-Disposition: attachment; filename="'.$fileName.'"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.strlen($queryResult));
		
		return $queryResult;

	}


	function bannerTitleText($pageTitle){
		global $lang;
		switch ($pageTitle) {
			case 'nieuws':
                $pageTitle = $lang['NEWS_BANNERTITLE'];
                break;
            case 'vakken':
                $pageTitle = $lang['VAKKEN_BANNERTITLE'];
                break;
			case 'docenten':
				$pageTitle = $lang['DOCENTEN_BANNERTITLE'];
				break;
			case 'docent':	
                $pageTitle = $lang['DOCENT_BANNERTITLE'];
                break;
            case 'contact':
                $pageTitle = $lang['CONTACT_BANNERTITLE'];
                break;
            case 'aanwezigheid':
                $pageTitle = $lang['AANWEZIGHEID_BANNERTITLE'];
                break;
            case 'login':
                $pageTitle = $lang['LOGIN_BANNERTITLE'];
				break;
			//Docentenpaginas
            case 'nieuwsbeheer':
                $pageTitle = $lang['NEWSMANAGEMENT_TITLE'];
                break;
            case 'profiel bewerken':
                $pageTitle = $lang['PROFILE_EDIT_BANNERTITLE'];
                break;
            case 'docentbeheer':
                $pageTitle = $lang['DOCENTMANAGEMENT_TITLE'];
                break;
            case 'beschikbaarheid':
                $pageTitle = $lang['BESCHIKBAARHEID_TITLE'];
                break;
            case 'vakkenbeheer':
                $pageTitle = $lang['SUBJECTMANAGEMENT_TITLE'];
                break;
            case 'opleidingbeheer':
                $pageTitle = $lang['EDUCATIONMANAGEMENT_TITLE'];
                break;
            default:
				$pageTitle = $pageTitle;
		}
			return $pageTitle;
	}
	
	function subTitleText($pageTitle){
		global $lang, $DB;
		switch ($pageTitle) {
			case 'nieuws':
				$bijgewerktTime = $DB->Get("SELECT datum FROM nieuws ORDER BY datum DESC LIMIT 1");
				if($bijgewerktTime->num_rows > 0){
					$pageSubtitle = $lang['NEWS_LASTUPDATE'].'<br />'.$bijgewerktTime->fetch_assoc()['datum'];
				}
				else {
					$pageSubtitle = $lang['NEWS_NOLAST_UPDATE'] ;
				}
                break;
            case 'vakken':
                $pageSubtitle = $lang['VAKKEN_SUBTITLE'];
                break;
			case 'docenten':
			case 'docent':	
                $pageSubtitle = $lang['DOCENT_SUBTITLE'];
                break;
            case 'contact':
                $pageSubtitle = $lang['CONTACT_SUBTITLE'];
                break;
            case 'aanwezigheid':
                $pageSubtitle = $lang['AANWEZIGHEID_SUBTITLE'];
                break;
            case 'login':
                $pageSubtitle = $lang['LOGIN_SUBTITLE'];
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
		mail("noreply@serverict.nl","This is a mail from ICT PORTAL","From:".$name."<br>Email:".$email."<br><br>".$message,$headers );
	}
}
?>