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
        if(isset($_POST['opleidingNaam'])){
            if(isset($_POST['opleidingJaarlaag'])){
                if(isset($_POST['opleidingPeriode'])){
                    if(isset($_POST['opleidingEditID'])){
                        $DB->Get("UPDATE opleidingen 
                                SET opleiding_naam = '{$_POST['opleidingNaam']}', 
                                jaar = '{$_POST['opleidingJaarlaag']}', 
                                periode = '{$_POST['opleidingPeriode']}'
                                WHERE opleiding_id = '{$_POST['opleidingEditID']}'");
                                header("Location: opleidingbeheer");
                    }
                } 
            } 
       }    
    }

    //Invoegen
    if(isset($_POST['submitInvoegen'])){
       if(isset($_POST['opleidingNaam'])){
            if(isset($_POST['opleidingJaarlaag'])){
                if(isset($_POST['opleidingPeriode'])){
                        $DB->Get("INSERT INTO opleidingen (opleiding_naam, jaar, periode) VALUES ('{$_POST['opleidingNaam']}', '{$_POST['opleidingJaarlaag']}', '{$_POST['opleidingPeriode']}')");
                        header("Location: opleidingbeheer");
                } 
            } 
       }
    }



        $docentID = intval($_COOKIE['userID']);

        //Laat de weergave pagina zien
        if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])){
            echo "<div class='contentBlock-title'>Opleidingen | Keuzemenu </div><div class='contentBlock-text-normal'>";
            //lijst met vakken met optie om ze aan te passen. (verwijderen)
            //knop voor nieuw vak


            //Klassen met opleiding
            $klassenResult = $DB->Get("SELECT 
                opleidingen.opleiding_id,
                opleidingen.opleiding_naam, 
                opleidingen.jaar, 
                opleidingen.periode
                FROM opleidingen
                ORDER BY jaar ASC, periode ASC"); //Haalt alle vakken van de ID docent op.

            echo "<table>";
            while($klassenData = $klassenResult->fetch_assoc()){
                echo "<tr>";
                    echo "<td>{$klassenData['opleiding_naam']}</td>";
                    echo "<td>Jaar: {$klassenData['jaar']}</td>";
                    echo "<td>Periode: {$klassenData['periode']}</td>";
                    echo "<td><form method='post'><input type='hidden' value='{$klassenData['opleiding_id']}' name='aanpassenID'><button type='submit' name='aanpassenPage'><i class='fa fa-pencil' aria-hidden='true'></i></button></form></td>";
                    echo "<td><form method='post'><input type='hidden' value='{$klassenData['opleiding_id']}' name='verwijderID'><button type='submit' name='submitDelete'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table><form method='post'><button type='submit' name='invoegenPage'>Invoegen</button></form>";

        }
        //Laat de invoegen pagina zien
        else if(isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])){
                echo '<div class="contentBlock-title">Opleidingbeheer | Invoegen</div>
                        <div class="contentBlock-text-normal">
                        <form method="POST" enctype="multipart/form-data"> 
                            
                            <label for="opleidingNaam">Opleidingnaam*</label><br />
                            <input type="text" name="opleidingNaam" placeholder="Opleidingnaam" required><br />
                            
                            <label for="opleidingJaarlaag">Jaarlaag*</label><br />
                            <select name="opleidingJaarlaag">
                                <option value="1">Jaar 1</option>
                                <option value="2">Jaar 2</option>
                                <option value="3">Jaar 3</option>
                                <option value="4">Jaar 4</option>
                            </select><br />

                            <label for="opleidingPeriode">Periode*</label><br />
                            <select name="opleidingPeriode">
                                <option value="1">Periode 1</option>
                                <option value="2">Periode 2</option>
                                <option value="3">Periode 3</option>
                                <option value="4">Periode 4</option>
                            </select><br />';
                    
                    
                        echo "<br />
                        <p>Invulvakken met een * zijn verplicht</p>
                        <button type='submit' name='submitInvoegen'>opslaan</button>
                        <button type='button' onclick="."window.location.href='opleidingbeheer'".">annuleren</button>
                    </form>";
    }
    //Laat de aanpassen pagina zien
    else if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && isset($_POST['aanpassenPage'])  && intval($_POST['aanpassenID'])){

        //Haal huidige data op
            $currentResult = $DB->Get("SELECT 
                opleidingen.opleiding_id,
                opleidingen.opleiding_naam, 
                opleidingen.jaar AS jaarlaag, 
                opleidingen.periode
                FROM opleidingen
                WHERE opleidingen.opleiding_id = '{$_POST['aanpassenID']}'"); //Haalt alle vakken van de ID docent op.

        $currentData = $currentResult->fetch_assoc();

    echo '<div class="contentBlock-title">Opleidingbeheer | Bewerken</div>
            <div class="contentBlock-text-normal">
            <form method="POST" enctype="multipart/form-data"> 
                            
            <label for="opleidingNaam">Opleiding*</label><br />
            <input type="text" name="opleidingNaam" placeholder="Opleiding" value="'.$currentData['opleiding_naam'].'" required><br />
            
            <label for="opleidingJaarlaag">Jaarlaag*</label><br />
            <select name="opleidingJaarlaag">';

                for ($i=1; $i <= 4; $i++) { 
                    if($i == $currentData['jaarlaag']){
                        echo '<option class="optionSelected" value="'.$currentData['jaarlaag'].'" selected>Jaar '.$currentData['jaarlaag'].' (geselecteerd)</option>';
                    }
                    else if($i != $currentData['jaarlaag']){
                        echo '<option value="'.$i.'">Jaar '.$i.'</option>';
                    }
                }

            echo '</select><br />

            <label for="opleidingPeriode">Periode*</label><br />
            <select name="opleidingPeriode">';
               
            for ($i=1; $i <= 4; $i++) { 
                if($i == $currentData['periode']){
                    echo '<option class="optionSelected" value="'.$currentData['periode'].'" selected>Periode '.$currentData['periode'].' (geselecteerd)</option>';
                }
                else if($i != $currentData['periode']){
                    echo '<option value="'.$i.'">Periode '.$i.'</option>';
                }
            }

            echo '</select><br />';
                    

            echo "<input type='hidden' name='opleidingEditID' value='{$currentData['opleiding_id']}'>
                <button type='submit' name='aanpassenSubmit'>opslaan</button>
                <button type='button' onclick="."window.location.href='opleidingbeheer'".">annuleren</button>
            </form>
        <br />";

    }
    //Gebruik de verwijderen pagina en controleert of de ingevoegde value wel een integer is.
    else if(!isset($_POST['invoegenPage']) && isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage'])  && !isset($_POST['aanpassenPage']) && intval($_POST['verwijderID'])){
        $DB->Get("DELETE FROM opleidingen WHERE opleiding_id='{$_POST['verwijderID']}'");
        header('location: opleidingbeheer');
    }
    ?>
    </div>
             
			</div>
		</div>
    </div>
</main> 