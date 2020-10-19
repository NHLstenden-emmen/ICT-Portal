<?php
    // The private key
    $apiKey = "api key";
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

    // A check if the api works as it should so you dont get a masive error
    if ($data->cod != 200) {
        echo("Er was een fout met het ophalen van de data van de weers api");
    } else {

    // get the current time
    $currentTime = time();
?>
<div class="sidebar">
    <div class="weatherReport">
        <h2>Het weer in <?php echo $data->name; ?></h2>
        <div class="time">
            <!-- Adds the current time so you can see when it updated for the last time -->
            <div>Laatst geupdate: <?php echo date("l g:i a", $currentTime); ?></div>
            <!-- Gets the Description about what kind of weather it is -->
            <div>Het is: <?php echo($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <span class="min-temperature">
                <!-- Gets a max temp -->
                <?php echo $data->main->temp_max; ?>°
                /
                <!-- Gets a min temp -->
                <?php echo $data->main->temp_min; ?>°
            </span>
            <!-- Get the right icon for the current weatherReport -->
            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
        </div>
        <div class="extra information">
            <div>Temperatuur: <?php echo $data->main->temp; ?>°</div>
            <div>Vochtigheid: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind kracht: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
</div>
<?php
}
?>
