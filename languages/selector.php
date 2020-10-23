<?php

//check if cookie is set
if(isSet($_COOKIE['lang'])) {
	$lang = $_COOKIE['lang'];
}
// this is the main language
else {
	setcookie("lang", "nl", time()+3600);
}

//when the language changes set cookie or change it
if(!empty(isset($_POST['changelang']))){
	//$lang = $_POST["changelang"];
	
	//setcookie("lang", $_POST["changelang"]);
	setcookie("lang", $_POST["changelang"], time()+ (3600 * 24 * 30));
	header("Refresh:0");
}

switch ($lang) {
	case 'en':
	$lang_file = 'lang.en.php';
	break;

	case 'nl':
	$lang_file = 'lang.nl.php';
	break;

	default:
	$lang_file = 'lang.nl.php';

}

include_once 'languages/'.$lang_file;
?>