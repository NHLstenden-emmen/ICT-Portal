<?php

//check if cookie is set
if(isSet($_COOKIE['lang'])) {
	$lang = $_COOKIE['lang'];
}
// this is the main language
else {
	$lang = 'nl';
}

//when the language changes set cookie or change it
if(!empty(isset($_POST['changelang']))){
	$lang = $_POST["changelang"];
	
	setcookie("lang", $lang);
	setcookie("lang", $lang, time()+ (3600 * 24 * 30));
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