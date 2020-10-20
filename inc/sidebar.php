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
    $test = 0;
    //$data->cod != 200
    if ($test != 0) {
        echo("Er was een fout met het ophalen van de data van de weers api");
    } else {

    // get the current time
    $currentTime = time();
?>
<!-- Moet weg -->
<style>
    .sidebar{
        width: 15%;
        background: red;
        height: max-content;
        font-family: sans-serif;
    }

    .weatherReport{
        display: none;
    }

    .row{
        width: 100%;
        height: 200px;
        background: #F8F8F8;
    }

    h3{
        margin: 0;
    }

    .rowContent{
        padding: 15px;
    }

    .rowContent ul{
        list-style-type: none;
        padding: 0;
    }

    .shop{
        width: 75%;
        height: 100px;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAN0AAAC6CAIAAAClV9+vAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAxhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDM0MiwgMjAxMC8wMS8xMC0xODowNjo0MyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDRDc5Q0IyNzQzREMxMUU4QjBGQ0E4RUZDRjJEQzc5OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDRDc5Q0IyODQzREMxMUU4QjBGQ0E4RUZDRjJEQzc5OSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkNENzlDQjI1NDNEQzExRThCMEZDQThFRkNGMkRDNzk5IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkNENzlDQjI2NDNEQzExRThCMEZDQThFRkNGMkRDNzk5Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+rfD41QAAElNJREFUeNrsnQtwG+WdwLWrXcmyLcuv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');
        background-position: center;
        background-size: cover;
    }

    a{
        text-decoration: none;
        color: black;
    }

    
</style>


<div class="sidebar">
    <div class="row1 row">
        <div class="rowContent">
            <h3>Jaarlaagselectie</h3>
            <ul>
                <li><a href="#">Jaar 1</a></li>
                <li><a href="#">Jaar 2</a></li>
                <li><a href="#">Jaar 3</a></li>
                <li><a href="#">Jaar 4</a></li>
            </ul>
        </div>
    </div>
    <div class="row2 row">
        <div class="rowContent">
        <h3>Weer</h3><br>
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
    </div>
    <div class="row3 row">
        <div class="rowContent">
            <h3>Webshop</h3><br>
            <a href="#"><div class="shop"></div></a>
        </div>
    </div>    
</div>
<?php
}
?>
