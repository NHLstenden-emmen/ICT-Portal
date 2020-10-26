<style>
    table {
        width: 100%;
    }
    td:nth-child(1){
        width: 90%;
    }
    td:nth-child(2){
        width: 5%;
    }
    input {
        width: 65%;
    }
</style>

<main class="content">

<div class='contentBlock-nohover'>
		<div class='contentBlock-side'></div>
		<div class='contentBlock-content'>


<?php 
    /* Action Handlers */
if($Core->AuthCheck()){

    //Toevoegen
    if(isset($_POST['submitInvoegen'])){
        if(isset($_POST['opleidingNaam'])){
            $DB->Get("INSERT INTO opleidingen (opleidingnaam) VALUES ('{$_POST['opleidingNaam']}')");
        }
    }

    //Aanpassen
    if(isset($_POST['aanpassenSubmit'])){
        if(isset($_POST['opleidingNaam'])){
            $DB->Get("UPDATE opleidingen SET opleidingnaam = '{$_POST['opleidingNaam']}' WHERE opleiding_id = '{$_POST['opleidingID']}'");
        }
    }
        $docentID = intval($_COOKIE['userID']);

        //Laat de weergave pagina zien
        if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])){
            echo "<div class='contentBlock-title'>Opleidingbeheer | Keuzemenu </div><div class='contentBlock-text-normal'>";

            $opleidingResult = $DB->Get("SELECT * FROM opleidingen"); //Haalt alle docenten op
            if($opleidingResult->num_rows > 0){
            echo "<table>";
            while($opleidingData = $opleidingResult->fetch_assoc()){
                echo "<tr>";
                    echo "<td>{$opleidingData['opleidingnaam']}</td>";
                    echo "<td><form method='post'><input type='hidden' value='{$opleidingData['opleiding_id']}' name='aanpassenID'><button type='submit' name='aanpassenPage'><i class='fa fa-pencil' aria-hidden='true'></i></button></form></td>";
                    echo "<td><form method='post'><input type='hidden' value='{$opleidingData['opleiding_id']}' name='verwijderID'><button type='submit' name='submitDelete'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table>";
            }
            else {
                echo "Er zijn nog geen opleidingen ingevoegd.";
            }
    
                echo "<form method='post'><button type='submit' name='invoegenPage'>Toevoegen</button></form>";

        }
        //Laat de invoegen pagina zien
        else if(isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])){
        echo "<div class='contentBlock-title'>Opleidingbeheer | Toevoegen </div><div class='contentBlock-text-normal'>
            <form method='POST'> 
                
                <label for='opleidingNaam'>Opleidingnaam*</label><br />
                <input type='text' name='opleidingNaam' placeholder='Opleidingnaam' required><br />

                <p>Vakken met een * zijn verplicht</p>
                <button type='submit' name='submitInvoegen'>opslaan</button>
                <button type='button' onclick="."window.location.href='opleidingbeheer'".">annuleren</button>
            </form>";
    }
    else if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && isset($_POST['aanpassenPage']) && intval($_POST['aanpassenID'])){
       
    $currentResult = $DB->Get("SELECT * FROM opleidingen WHERE opleiding_id = {$_POST['aanpassenID']}"); //Haalt alle docenten op
    $currentData = $currentResult->fetch_assoc();
       
        echo "<div class='contentBlock-title'>Opleidingbeheer | Toevoegen </div><div class='contentBlock-text-normal'>
        <form method='POST'> 
            
            <label for='opleidingNaam'>Opleidingnaam*</label><br />
            <input type='text' name='opleidingNaam' placeholder='Opleidingnaam' value='{$currentData['opleidingnaam']}' required><br />
            <input type='hidden' name='opleidingID' value='{$currentData['opleiding_id']}'><br />

            <p>Vakken met een * zijn verplicht</p>
            <button type='submit' name='aanpassenSubmit'>opslaan</button>
            <button type='button' onclick="."window.location.href='opleidingbeheer'".">annuleren</button>
        </form>";
    }
    else if(!isset($_POST['invoegenPage']) && !isset($_POST['aanpassenPage']) && isset($_POST['submitDelete']) && intval($_POST['verwijderID'])){
        $DB->Get("DELETE FROM opleidingen WHERE opleiding_id='{$_POST['verwijderID']}'");
        header('location: opleidingbeheer');
    }

}
    else {
        //Niet ingelogd, dus ga naar de nieuwspagina.
        header("Location: nieuws");
    }   
    ?>
    </div>
             
			</div>
		</div>
    </div>
</main> 