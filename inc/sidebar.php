<!-- Made By Kevin Smulders -->
<?php
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
    $googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&units=metric&lang=NL&appid=" . $apiKey;

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
    <div class="row1 row weer">
        <?php
            // A check if the api works as it should so you dont get a masive error
            if ($data->cod != 200) {?>
                <h3>Weer</h3>
                <p>Er is iets fout gegaan met het ophalen van de weer data</p>
            <?php } else {?>
        <div class="rowContent">
        <h3>Weer</h3><br>
        <p<?php echo $data->name; ?></p>
        <div class="time">
            <!-- Adds the current time so you can see when it updated for the last time -->
            <div><strong> Laatst geupdate:</strong> <?php echo date("l g:i a", $currentTime); ?></div>
            <!-- Gets the Description about what kind of weather it is -->
            <div><strong> Het is:</strong> <?php echo($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <div><strong>Temperatuur:</strong> <br> <?php echo $data->main->temp; ?>°</div>
            <!-- Get the right icon for the current weatherReport -->
            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
        </div>
        <div class="extra information">
            <div><strong>Vochtigheid:</strong> <?php echo $data->main->humidity; ?> %</div>
            <div><strong>Wind kracht:</strong> <?php echo $data->wind->speed; ?> km/h</div>
        </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="row2 row">
        <div class="rowContent important-pages">
            <h3>Belangrijke pagina's</h3>
            <p><a href="http://localhost/ICT-Portal/vakken?jaar=1">Vakken jaar 1</a></p>
            <p><a href="http://localhost/ICT-Portal/nieuws?all=TRUE">Al het nieuws</a></p>
            <p><a href="http://localhost/ICT-Portal/contact">Contact</a></p>
        </div>
    </div>
    <div class="row3 row">
        <div class="rowContent">
            <h3>Webshop</h3><br>
            <a href="https://webshop.stenden.com/" target="_blank"><div class="shop"></div></a>
        </div>
    </div>    
</div>
    