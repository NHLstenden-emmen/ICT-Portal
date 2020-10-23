<!-- Made By Kevin Smulders -->
<?php
<<<<<<< Updated upstream
=======
 
>>>>>>> Stashed changes
    //Only works when $pageTitle is called in header.php 
    if (function_exists('pageTitle')) {
    } else {
        $pageTitle = "Error";
    }
    
    // The private key
    $apiKey = "25957a1a29b039b5ca004840d8eecb9c";
    // The location to get the data from
    $cityName = "Emmen";
    // Open Weather api url
<<<<<<< Updated upstream
    $googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&units=metric&lang=NL&appid=" . $apiKey;
=======
    $googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&units=metric&lang=".$_COOKIE['lang']. "&appid=" . $apiKey;
>>>>>>> Stashed changes

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

    // get the current time
    $currentTime = time();
    
?>
<div class="sideBar">
    <?php
    // A check if the api works as it should so you dont get a masive error
    if ($data->cod != 200) {
        echo"
            <h3>Weer</h3>
            <p>Er is iets fout gegaan met het ophalen van de weer data</p>";
    } else {

    $date = date("l g:i a", $currentTime);
    //echo "<pre>";
        //print_r($data);
    echo "
        <img src='http://openweathermap.org/img/w/{$data->weather[0]->icon}.png' class='weather-icon' />    
        
        <h2>Weer</h2>
        <p class='weather-data'>Emmen</p> 

        <!-- Adds the current time so you can see when it updated for the last time -->
        <p class='weather-name'><b> Laatst geupdate:</b></p><p class='weather-data'>$date</p>

        <!-- Gets the Description about what kind of weather it is -->
        <p class='weather-name'><b> Het is:</b></p><p class='weather-data'> {$data->weather[0]->description} </p> 
        <p class='weather-name'><b>Temperatuur:</b></p><p class='weather-data'' >{$data->main->temp}°C</p>

        <!-- Get the right icon for the current weatherReport -->
        <p class='weather-name'><b>Vochtigheid:</b></p><p class='weather-data'>{$data->main->humidity}%</p>
        <p class='weather-name'><b>Wind kracht:</b></p><p class='weather-data'>{$data->wind->speed} km/h</p>";
    }?>
    
    <!--
    <div class="row2 row">
        <div class="rowContent important-pages">
            <h3>Belangrijke pagina's</h3>
            <p><a href="aanwezigen">aanwezigen docenten</a></p>
            <p><a href="vakken?jaar=1">Vakken jaar 1</a></p>
            <p><a href="nieuws?all=TRUE">Al het nieuws</a></p>
        </div>
    </div>
    <div class="row3 row">
        <div class="rowContent">
            <h3>Webshop</h3><br>
            <a href="https://www.p-p.nl/portfolio/nhl-stenden-hogeschool/" target="_blank">Ga nu naar de NHL Stenden webshop voor de GloedNieuwe dopper en meer...</a>
        </div>
    </div> -->   

</div>
