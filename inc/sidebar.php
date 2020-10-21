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

    // A check if the api works as it should so you dont get a masive error
    $test = 0;
    //$data->cod != 200
    if ($test != 0) {
        echo("Er was een fout met het ophalen van de data van de weers api");
    } else {

    // get the current time
    $currentTime = time();
?>

<<<<<<< HEAD
<div class="sidebar">
    <div class="row0 row"></div> <!-- Spacing top -->
=======
<div class="sideBar">
>>>>>>> database
    <div class="row1 row">
    <?php
        if($pageTitle == "Nieuws"){
    ?>
        <div class="rowContent">
            <h3>Jaarlaagselectie</h3>
            <ul>
                <li><a href="#">Jaar 1</a></li>
                <li><a href="#">Jaar 2</a></li>
                <li><a href="#">Jaar 3</a></li>
                <li><a href="#">Jaar 4</a></li>
            </ul>
        </div>

    <?php
        } else{
            ?>
            <div class="rowContent">
                <h3>Meest gelezen berichten</h3>
                <ul>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>
            <?php
        }
    ?>
    </div>
    <div class="row2 row">
        <div class="rowContent">
        <h3>Weer</h3><br>
        <div class="weatherReport">
            <p<?php echo $data->name; ?></p>
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
    </div>
    <div class="row3 row">
        <div class="rowContent">
            <h3>Webshop</h3><br>
<<<<<<< HEAD
            <a href="https://webshop.stenden.com/"><div class="shop"></div></a>
=======
            <a href="#"><div class="shop"></div></a>
>>>>>>> database
        </div>
    </div>    
</div>
<?php
}
?>
    