<?php
/* 
------------------
Language: English
 
How to use 
- make a var with the translation
$lang['TEST'] = 'TEST';
- call the translated on the place where you want the translation
<?php echo $lang['VAKKEN_VAKKENLIJST']; ?>
------------------
*/
 
$lang = array();
 
// nav info
$lang['NAV_NIEUWS'] = 'News';
$lang['NAV_VAKKEN'] = 'Subjects';
$lang['NAV_DOCENTEN'] = 'Teachers';
$lang['NAV_CONTACT'] = 'Contact';
$lang['NAV_BELANGRIJKE_MELDINGEN'] = 'Important notices';
$lang['NAV_AANWEZIGHEID'] = 'Precense';//Availability
$lang['NAV_PRIVACY_POLICY'] = 'Privacy policy';
$lang['NAV_TERMS_CONDITIONS'] = 'Terms & Conditions';
$lang['NAV_JAAR'] = 'Grade';
 
// nav teachers
$lang['NAV_PF_EDIT'] = 'Edit my profile';
$lang['NAV_MY_BESCHIKBAARHEID'] = 'Edit availability';//My availability
$lang['NAV_NIEUWS_OVERVIEUW'] = 'News management';
$lang['NAV_VAKKENBEHEER'] = 'Subject management';
$lang['NAV_DOCENTENBEHEER'] = 'Teacher management';
$lang['NAV_OPLEIDINGBEHEER'] = 'Education management';//niet tevreden
$lang['NAV_UITLOGGEN'] = 'Sign out ';
$lang['NAV_LOGIN'] = 'Sign in';
 
 
// aanwezigen / teacher
$lang['PRESENT_TITLE'] = 'Precense';//Availability
$lang['PRESENT_BESCHIKBAARHEID'] = 'Precense';//waar wordt this gebruikt
$lang['PRESENT_Teachers_Name'] = 'Teachers Name';
$lang['PRESENT_Monday'] = 'Monday';
$lang['PRESENT_Tuesday'] = 'Tuesday';
$lang['PRESENT_Wednesday'] = 'Wednesday';
$lang['PRESENT_Thursday'] = 'Thursday';
$lang['PRESENT_Friday'] = 'Friday';
$lang['GEEN_BESCHIKBARE_DOCENTEN'] = 'There are no teachers present';
$lang['DOCENTEN_VRIJ'] = 'Vacant';
$lang['GEEN_DOCENT_NAAM'] = 'No name found';
$lang['GEEN_DOCENT_VAKKEN'] = 'Subjects';
$lang['GEEN_DOCENT_NONEXISTENT'] = "This teacher doesn't exists.";
$lang['GEEN_DOCENT_GEEN_VAKKEN'] = "This teacher doesn't teach any subjects (yet).";
$lang['DOCENT_LIST'] = 'Teachers list';
 
// login
$lang['GEEN_GEBRUIKERSNAAM'] = 'User name';
$lang['GEEN_WACHTWOORD'] = 'Password';
$lang['GEEN_INLOGGEN'] = 'Sign in';
 
//subjects
$lang['VAKKEN_KLASSEN_JAAR'] = 'Subjects | Grade';
$lang['VAKKEN_PERIODE'] = 'Period';
$lang['VAKKEN_VAKKENLIJST'] = 'Subjects list';
$lang['VAKKEN_VAKKENLIJST_SUBTITLE'] = 'Select a grade to show all classes of that grade.';
$lang['VAKKEN_KLASSEN'] = 'Show subjects';
$lang['VAKKEN_VAKDOCENT'] = 'Subject teacher';
$lang['VAKKEN_NOCALSSES'] = 'This grade has no subjects.';
$lang['VAKKEN_SELECT_ALLCALSSES'] = 'Select a class to show all subjects of that class.';
 
// contact 
$lang['CONTACT_CONTACT'] = 'Contact';
$lang['CONTACT_VOORNAAM'] = 'First name';
$lang['CONTACT_ACHTERNAAM'] = 'Last name';
$lang['CONTACT_EMAIL'] = 'E-mail address';
$lang['CONTACT_BERICHT'] = 'Message';
$lang['CONTACT_VERSTUUR'] = 'Send';
$lang['CONTACT_TELL'] = 'Phone number';
$lang['CONTACT_ADRES'] = 'Address data';
$lang['CONTACT_EMAIL'] = 'E-mail address';
 
//nieuws
$lang["NEWS_LASTNEWS"] = 'Latest news articles';
$lang["NEWS_ALL_NEWS"] = 'All news articles';
$lang["NEWS_GEPLAAST_DOOR"] = 'Written by';
$lang["NEWS_TERUG"] = 'Back';
$lang["NEWS_GEENNIEUWS_BERICHTEN"] = "There aren't any news articles yet.";
$lang["NEWS_IMAGE_ALT"] = "News image";

//Teachers
$lang["BESCHIKBAARHEID_EDIT"] = 'Edit availability';
$lang["BESCHIKBAARHEID_SAVE"] = 'Save';
 
//Teachers Beheer
$lang["DOCENTEN_BEHEER_ADD"] = 'Teachers management | Add';
$lang["DOCENTEN_BEHEER_KEUZEMENU"] = 'Teachers management | Selection menu';
$lang["DOCENTEN_BEHEER_FOTO"] = 'Picture (standaardavatar)';
$lang["DOCENTEN_BEHEER_PF_INFO"] = 'Personal Information';
$lang["DOCENTEN_BEHEER_GEBRUIKERSNAAM"] = 'User name';
$lang["DOCENTEN_BEHEER_SOCIAL"] = 'Socials';
$lang["DOCENTEN_BEHEER_SOCIAL_TWITTER"] = 'twitter';
$lang["DOCENTEN_BEHEER_SOCIAL_LINKEDIN"] = 'linkedin';
$lang["DOCENTEN_BEHEER_SOCIAL_INSTA"] = 'instagram';
$lang["DOCENTEN_BEHEER_BEVEILIGING"] = 'Security';
$lang["DOCENTEN_BEHEER_WACHTWOORD"] = 'Password';
$lang["DOCENTEN_BEHEER_WACHTWOORD_HERHALEN"] = 'Repeat password';
$lang["DOCENTEN_BEHEER_VERPLICHT"] = 'The boxes with a * are required';
$lang["DOCENTEN_BEHEER_ANNULEREN"] = 'Cancel';
 
//nieuws  management
$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_START"] = 'Error while uploading';
$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END"] = 'News: only jpg, png, jpeg and gif are allowed as an image!';
$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END_TEKST"] = 'News: No text set';
$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END_TITLE"] = 'News: No title set';
$lang["NIEUWS_BEHEER_KEUZEMENU"] = 'Nieuws management | Selection menu';
$lang["NIEUWS_BEHEER_FOUTMELDING_ENGELS"] = 'Change the language of the site to enter dutch news articles!';
$lang["NIEUWS_BEHEER_MISSING_NEWS"] = "There aren't any news articles yet.";
$lang["NIEUWS_BEHEER_NIEUWSBERICHT"] = 'News article';
$lang["NIEUWS_BEHEER_BIJLAGE"] = 'Attachment';
$lang["NIEUWS_BEHEER_AFBEELDING"] = 'Image';
$lang["NIEUWS_BEHEER_TITLE"] = 'Title';
$lang["NIEUWS_BEHEER_VAKKEN_AANPASSEN"] = 'Subjects management | Change';//adjust
$lang["NIEUWS_BEHEER_NIKS_GEUPLOAD"] = 'No attachment';
$lang["NIEUWS_BEHEER_WEERGEVEN"] = 'View';
$lang["NIEUWS_BEHEER_DOCENT"] = 'Teacher';
$lang["NIEUWS_BEHEER_AANPASSEN"] = 'Change';
$lang["NIEUWS_BEHEER_POSTER"] = 'posted by';
$lang["NIEUWS_BEHEER_INVOEGEN"] = 'Insert';
$lang["NIEUWS_BEHEER_INVOEGEN_TITEL"] = "Nieuws management | Insert ";
$lang["NIEUWS_BEHEER_PLAATSEN"] = 'Submit';
$lang["NIEUWS_BEHEER_ANNULEREN"] = 'Cancel';

//profiel
$lang["PROFIEL_ERRORS_WWG"] = 'Passwords differ.';
$lang["PROFIEL_ERRORS_WWI"] = 'No Password set.';
$lang["PROFIEL_ERRORS_GB"] = 'No User name set.';
$lang["PROFIEL_ERRORS_EM"] = 'No Email set.';
$lang["PROFIEL_ERRORS_AI"] = 'No last name set.';
$lang["PROFIEL_ERRORS_VI"] = 'No first name set.';
$lang["PROFIEL_INFO_PI"] = 'Personal information';
$lang["PROFIEL_INFO_FOTO"] = 'Picture of the teacher';
 
//Vakkenbeheer
$lang["VAKKEN_BEHEER_KEUZEMENU"] = 'Subject management | Selection menu';
$lang["VAKKEN_BEHEER_INVOEGEN"] = 'Subject management | Insert';
$lang["VAKKEN_BEHEER_INFORMATIE"] = 'Subject information';
$lang["VAKKEN_BEHEER_VAKNAAM"] = 'Subject name';
$lang["VAKKEN_BEHEER_JAARLAAG"] = 'Grade';
$lang["VAKKEN_BEHEER_PERIODE"] = 'Period';
$lang["VAKKEN_BEHEER_KLASSEN"] = 'Class';
$lang["VAKKEN_BEHEER_DOCENTEN"] = 'Teacher(s)';
$lang["VAKKEN_BEHEER_BESTANDEN"] = 'Files';
$lang["VAKKEN_BEHEER_MODULEBOEK"] = 'module book';
$lang["VAKKEN_BEHEER_BEWERKEN"] = 'Subject management | Change';
$lang["VAKKEN_BEHEER_JAAR"] = "Grade";
$lang["VAKKEN_BEHEER_MEERDERE"] = "Select multiple with CTRL";
$lang["VAKKEN_BEHEER_GESELECTEERD"] = "Selected";
$lang["VAKKEN_BEHEER_WEERGEVEN"] = "View";
$lang["VAKKEN_BEHEER_VERPLICHT"] = "The boxes with a * are required";
$lang["VAKKEN_BEHEER_OPSLAAN"] = "Save";
$lang["VAKKEN_BEHEER_ANNULEREN"] = "Cancel";
//extra
$lang['404_PAGE_DESC'] = 'Click here to go back to the home page';
$lang['NOTLOGEDIN_TITLE'] = 'This page is solely for teachers.';
 
//opleidingbeheer
$lang['OPLEIDINGBEHEER_INVOEG_TITLE'] = 'Training management | Insert';
$lang['OPLEIDINGBEHEER_BEWERKEN_TITLE'] = 'Training management | edit';
$lang['OPLEIDINGBEHEER_OPLEIDINGNAAM'] = 'Education name';
$lang['OPLEIDINGBEHEER_OPLEIDING'] = 'Education';
$lang['OPLEIDINGBEHEER_JAARLAAG'] = 'Annual layer';

//docentbeheer
$lang['DOCENTBEHEER_ERRORLOG_WWG'] = 'Failed to add new teacher: Passwords not equal';
$lang['DOCENTBEHEER_ERRORLOG_WWM'] = 'Failed to add new teacher: No Password entered.';
$lang['DOCENTBEHEER_ERRORLOG_MAIL'] = 'Failed to add new teacher: This email or username is already used!';
$lang['DOCENTBEHEER_ERRORLOG_GB'] = 'Failed to add new teacher: No Username entered.';
$lang['DOCENTBEHEER_ERRORLOG_GMAIL'] = 'Failed to add new teacher: No Email entered.';
$lang['DOCENTBEHEER_ERRORLOG_NA'] = 'Failed to add new teacher: No last name entered.';
$lang['DOCENTBEHEER_ERRORLOG_NV'] = 'Failed to add new teacher: No first name entered.';

?>

