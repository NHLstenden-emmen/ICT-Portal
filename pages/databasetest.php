<?php 

$result = $DB->Get("SELECT * FROM docenten");

while($row = $result->fetch_assoc()){
    //print_r($row);
}

$docentenData = array(
    '1' => array(
        'docent_id' => 3,
        'voornaam' => 'Brian',
        'achternaam' => 'Ortega',
        'email' => 'erat.volutpat.Nulla@eleifend.org',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'JinWeaver',
        'wachtwoord' => 'indigo',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => ''),
    '2' => array(
        'docent_id' => 4,
        'voornaam' => 'Tanek',
        'achternaam' => 'Fischer',
        'email' => 'Suspendisse@tempus.net',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'ThaddeusMartinez',
        'wachtwoord' => 'violet',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => ''),
    '3' => array(
        'docent_id' => 5,
        'voornaam' => 'Justin',
        'achternaam' => 'Benton',
        'email' => 'luctus.ipsum.leo@Etiamvestibulummassa.co.uk',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'NoahBullock',
        'wachtwoord' => 'orange',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => ''),
    '4' => array(
        'docent_id' => 6,
        'voornaam' => 'Bruno',
        'achternaam' => 'Barrera',
        'email' => 'ante.blandit.viverra@Quisqueliberolacus.edu',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'RahimBolton',
        'wachtwoord' => 'orange',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => ''),
    '5' => array(
        'docent_id' => 7,
        'voornaam' => 'Robert',
        'achternaam' => 'Solis',
        'email' => 'Mauris@Vestibulumanteipsum.co.uk',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'AmeryWagner',
        'wachtwoord' => 'blue',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => ''),
    '6' => array(
        'docent_id' => 8,
        'voornaam' => 'Linus',
        'achternaam' => 'Delacruz',
        'email' => 'a.feugiat@aliquet.org',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'OrlandoOsborn',
        'wachtwoord' => 'yellow',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => ''),
    '7' => array(
        'docent_id' => 9,
        'voornaam' => 'Joseph',
        'achternaam' => 'Patterson',
        'email' => 'tempor.arcu.Vestibulum@erat.net',
        'telefoonnummer' => '1',
        'gebruikersnaam' => 'SolomonHenderson',
        'wachtwoord' => 'green',
        'foto' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => '')
);

?>