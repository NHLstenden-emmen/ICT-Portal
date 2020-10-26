<style>
    table {
        width: 100%;
    }
    td:nth-child(1){
        width: 70%;
    }
    td:nth-child(2){
        width: 8%;
    }
</style>
<main class="content">

<div class='contentBlock-nohover'>
		<div class='contentBlock-side'></div>
		<div class='contentBlock-content'>


<?php 
    if(isset($_POST['aanpassenSubmit'])){
        if(isset($_POST['klasNaam'])){
            if(isset($_POST['klasJaarlaag'])){
                if(isset($_POST['klasPeriode'])){
                    if(isset($_POST['klasOpleiding'])){
                        if(isset($_POST['klasEditID'])){
                            $DB->Get("UPDATE klassen 
                                        SET klas_naam = '{$_POST['klasNaam']}', 
                                        jaar = '{$_POST['klasJaarlaag']}', 
                                        periode = '{$_POST['klasPeriode']}', 
                                        opleiding_id = '{$_POST['klasOpleiding']}'
                                        WHERE klas_id = '{$_POST['klasEditID']}'");
                                        header("Location: klassenBeheer");
                        }
                    } 
                } 
            } 
       }    
    }


    //Invoegen
    if(isset($_POST['submitInvoegen'])){
       if(isset($_POST['klasNaam'])){
            if(isset($_POST['klasJaarlaag'])){
                if(isset($_POST['klasPeriode'])){
                    if(isset($_POST['klasOpleiding'])){
                        $DB->Get("INSERT INTO klassen (klas_naam, jaar, periode, opleiding_id) VALUES ('{$_POST['klasNaam']}', '{$_POST['klasJaarlaag']}', '{$_POST['klasPeriode']}', '{$_POST['klasOpleiding']}')");
                        header("Location: klassenBeheer");
                    } 
                } 
            } 
       }
    }



        $docentID = intval($_COOKIE['userID']);

        //Laat de weergave pagina zien
        if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])){
            echo "<div class='contentBlock-title'>Klassenbeheer | Keuzemenu </div><div class='contentBlock-text-normal'>";
            //lijst met vakken met optie om ze aan te passen. (verwijderen)
            //knop voor nieuw vak


            //Klassen met opleiding
            $klassenResult = $DB->Get("SELECT 
                klassen.klas_id,
                klassen.klas_naam, 
                klassen.jaar, 
                klassen.periode,
                opleidingen.opleidingnaam,
                klassen.opleiding_id
                FROM klassen
                LEFT JOIN opleidingen
                ON klassen.opleiding_id = opleidingen.opleiding_id
                ORDER BY jaar ASC, periode ASC"); //Haalt alle vakken van de ID docent op.
            //print_r($klassenResult);
            echo "<table>";
            while($klassenData = $klassenResult->fetch_assoc()){
                echo "<tr>";
                    echo "<td>{$klassenData['klas_naam']}</td>";
                    if(!empty($klassenData['opleidingnaam'])){
                        echo "<td>Opleiding: {$klassenData['opleidingnaam']}</td>";
                    }
                    else {
                        echo "<td>Geen opleiding</td>";
                    }
                    echo "<td>Jaar: {$klassenData['jaar']}</td>";
                    echo "<td>Periode: {$klassenData['periode']}</td>";
                    echo "<td><form method='post'><input type='hidden' value='{$klassenData['klas_id']}' name='aanpassenID'><button type='submit' name='aanpassenPage'><i class='fa fa-pencil' aria-hidden='true'></i></button></form></td>";
                    echo "<td><form method='post'><input type='hidden' value='{$klassenData['klas_id']}' name='verwijderID'><button type='submit' name='submitDelete'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table><form method='post'><button type='submit' name='invoegenPage'>Invoegen</button></form>";

        }
        //Laat de invoegen pagina zien
        else if(isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])){
                echo '<div class="contentBlock-title">Klassenbeheer | Invoegen</div>
                        <div class="contentBlock-text-normal">
                        <form method="POST" enctype="multipart/form-data"> 
                            
                            <label for="klasNaam">Klasnaam*</label><br />
                            <input type="text" name="klasNaam" placeholder="Klasnaam" required><br />
                            
                            <label for="klasJaarlaag">Jaarlaag*</label><br />
                            <select name="klasJaarlaag">
                                <option value="1">Jaar 1</option>
                                <option value="2">Jaar 2</option>
                                <option value="3">Jaar 3</option>
                                <option value="4">Jaar 4</option>
                            </select><br />

                            <label for="klasPeriode">Periode*</label><br />
                            <select name="klasPeriode">
                                <option value="1">Periode 1</option>
                                <option value="2">Periode 2</option>
                                <option value="3">Periode 3</option>
                                <option value="4">Periode 4</option>
                            </select><br />';
                    
                            echo "<label for='klasOpleiding'>Opleiding*</label><br />";

                    $opleidingenResult = $DB->Get("SELECT * FROM opleidingen");
                    if($opleidingenResult->num_rows > 0){
                            echo "<select name='klasOpleiding'>";
                        while($opleidingData = $opleidingenResult->fetch_assoc()){
                            echo "<option value='{$opleidingData['opleiding_id']}'>{$opleidingData['opleidingnaam']}</option>";
                        }
                        echo "</select>";
                    }
                    else {
                        echo "<br />Voeg eerst een opleiding toe via het opleidingbeheer! <br />";
                    }
                    
                        echo "<br />
                        <p>Invulvakken met een * zijn verplicht</p>
                        <button type='submit' name='submitInvoegen'>opslaan</button>
                        <button type='button' onclick="."window.location.href='klassenbeheer'".">annuleren</button>
                    </form>";
    }
    //Laat de aanpassen pagina zien
    else if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && isset($_POST['aanpassenPage'])  && intval($_POST['aanpassenID'])){

        //Haal huidige data op
            $currentResult = $DB->Get("SELECT 
                klassen.klas_id,
                klassen.klas_naam, 
                klassen.jaar AS jaarlaag, 
                klassen.periode,
                opleidingen.opleidingnaam,
                klassen.opleiding_id
                FROM klassen
                LEFT JOIN opleidingen
                ON klassen.opleiding_id = opleidingen.opleiding_id
                WHERE klassen.klas_id = '{$_POST['aanpassenID']}'"); //Haalt alle vakken van de ID docent op.

        $currentData = $currentResult->fetch_assoc();

    echo '<div class="contentBlock-title">Klassenbeheer | Bewerken</div>
            <div class="contentBlock-text-normal">
            <form method="POST" enctype="multipart/form-data"> 
                            
            <label for="klasNaam">Klasnaam*</label><br />
            <input type="text" name="klasNaam" placeholder="Klasnaam" value="'.$currentData['klas_naam'].'" required><br />
            
            <label for="klasJaarlaag">Jaarlaag*</label><br />
            <select name="klasJaarlaag">';

                for ($i=1; $i <= 4; $i++) { 
                    if($i == $currentData['jaarlaag']){
                        echo '<option class="optionSelected" value="'.$currentData['jaarlaag'].'" selected>Jaar '.$currentData['jaarlaag'].' (geselecteerd)</option>';
                    }
                    else if($i != $currentData['jaarlaag']){
                        echo '<option value="'.$i.'">Jaar '.$i.'</option>';
                    }
                }

            echo '</select><br />

            <label for="klasPeriode">Periode*</label><br />
            <select name="klasPeriode">';
               
            for ($i=1; $i <= 4; $i++) { 
                if($i == $currentData['periode']){
                    echo '<option class="optionSelected" value="'.$currentData['periode'].'" selected>Periode '.$currentData['periode'].' (geselecteerd)</option>';
                }
                else if($i != $currentData['periode']){
                    echo '<option value="'.$i.'">Periode '.$i.'</option>';
                }
            }

            echo '</select><br /><label for="klasOpleiding">Opleiding*</label><br />';
                    
                    $opleidingenResult = $DB->Get("SELECT * FROM opleidingen");
                    if($opleidingenResult->num_rows > 0){
                            echo "<select name='klasOpleiding'>";
                        while($opleidingData = $opleidingenResult->fetch_assoc()){
                            if($opleidingData['opleiding_id'] == $currentData['opleiding_id']){
                                echo "<option value='{$opleidingData['opleiding_id']}' selected>{$opleidingData['opleidingnaam']} (geselecteerd)</option>";
                            }
                            else {
                                echo "<option value='{$opleidingData['opleiding_id']}'>{$opleidingData['opleidingnaam']}</option>";
                            }
                        }
                        echo "</select><br />";
                    }
                    else {
                        echo "<br />Voeg eerst een opleiding toe via het opleidingbeheer! <br />";
                    }

            echo "<input type='hidden' name='klasEditID' value='{$currentData['klas_id']}'>
                <button type='submit' name='aanpassenSubmit'>opslaan</button>
                <button type='button' onclick="."window.location.href='klassenbeheer'".">annuleren</button>
            </form>
        <br />";

    }
    //Gebruik de verwijderen pagina en controleert of de ingevoegde value wel een integer is.
    else if(!isset($_POST['invoegenPage']) && isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])  && !isset($_POST['aanpassenPage']) && intval($_POST['verwijderID'])){
        $DB->Get("DELETE FROM klassen WHERE klas_id='{$_POST['verwijderID']}'");
        header('location: klassenbeheer');
    }
    ?>
    </div>
             
			</div>
		</div>
    </div>
</main> 