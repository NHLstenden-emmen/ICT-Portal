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
}
?>