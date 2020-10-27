<style>
.contentBlock-grid {
    grid-template-columns: unset;
}
</style>
<main class="content">
    <?php
        if(isset($_POST['moduleboekSubmit'])){
            if(isset($_POST['moduleboekID'])){

                //Gegevens uit database halen
                $downloadModuleboek = $DB->Get("SELECT * FROM vakken WHERE vak_id ='{$_POST['moduleboekID']}'");
                $moduleboekData = $downloadModuleboek->fetch_assoc();

                $fileName = $moduleboekData['vak'].' '.$moduleboekData['jaarlaag'].'-'.$moduleboekData['periode'].' - moduleboek.pdf';

                echo $Core->downloadFile($moduleboekData['moduleboek'], $fileName);
            }
        }
   
        //Jaarweergave via vakken
        if(!isset($_POST['submitOpleiding-post']) && !isset($_POST['submitOpleiding-get']) && !isset($_POST['submitJaar']) && !isset($_GET['jaar'])){
            echo '<div class="subTitle">Vakkenlijst</div>
            <p>Selecteer hier een jaar om alle klassen van het betreffende jaar te tonen.</p>
            <form method="POST">
                <select name="jaarSelectie">
                    <option value="1">Jaar 1</option>
                    <option value="2">Jaar 2</option>
                    <option value="3">Jaar 3</option>
                    <option value="4">Jaar 4</option>
                </select>
                <button type="submit" name="submitJaar">Klassen tonen</button>
            </form>';
            //Stap 1
        } 
        else if (isset($_POST['submitJaar']) || isset($_GET['jaar']) && !isset($_POST['submitOpleiding-post']) && !isset($_POST['submitOpleiding-get'])) {
            //Stap 2 (Waar GET begint)
            
            if(isset($_POST['jaarSelectie'])){
                $jaarSelectie = $_POST['jaarSelectie'];
                $submitButton = 'post';
            }
            else if(isset($_GET['jaar'])){
                $jaarSelectie = $_GET['jaar'];
                $submitButton = 'get';
            }
            echo "<div class='subTitle'>Opleidingen | Jaar {$jaarSelectie}</div>
            <p>Selecteer hier een klas alle vakken de betreffende klas te tonen.</p>";
    
            $opleidingResult = $DB->Get("SELECT * FROM opleidingen WHERE jaar = '{$jaarSelectie}' ORDER BY periode ASC");
    
            if($opleidingResult->num_rows > 0){
                echo "<form method='post'><select name='opleidingSelectie'>";
                while($opleidingData = $opleidingResult->fetch_assoc()){
                    echo "<option value='{$opleidingData['opleiding_id']}'>{$opleidingData['opleiding_naam']}</option>";
                }
                echo "</select><button type='submit' name='submitOpleiding-{$submitButton}'>vakken weergeven</button></form>";
            }
            else {
                echo "Dit jaar heeft geen klassen.";
            }
        } 
        else if (isset($_POST['submitOpleiding-post']) || isset($_POST['submitOpleiding-get'])){
        //Vakken

                for ($i=1; $i <= 4; $i++) { 
                        
                    $vakkenView = $DB->Get("SELECT *
                    FROM opleiding_vakken
                    INNER JOIN vakken
                    ON opleiding_vakken.vak_id = vakken.vak_id
                    INNER JOIN docenten_vakken 
                    ON opleiding_vakken.vak_id = docenten_vakken.vak_id
                    INNER JOIN docenten
                    ON docenten_vakken.docent_id = docenten.docent_id
                    WHERE opleiding_vakken.opleiding_id = '{$_POST['opleidingSelectie']}' AND vakken.periode = '{$i}'");

                    if($vakkenView->num_rows > 0){
                        echo '<div class="subTitle">Periode '.$i.'</div>';

                        echo '<div class="contentBlock-grid">';
                        while($vakkenData = $vakkenView->fetch_assoc()){
                            //print_R($vakkenData);
                                echo "<div class='contentBlock'>
                                <div class='contentBlock-side'></div>
                                <div class='contentBlock-content'>
                                    <p class='contentBlock-title'>{$vakkenData['vak']}</p>
                                    <div class='contentBlock-text-normal'>
                                        <table>
                                            <tr>
                                                <td><b>Vakdocent:</b></td>
                                                <td><a href='docent?docent={$vakkenData['docent_id']}'>{$vakkenData['voornaam']} {$vakkenData['achternaam']}</a></td>
                                            </tr>";

                                            if(!empty($vakkenData['blackboard'])){
                                                echo "<tr><td><b>Blackboard:</b></td><td><a href='{$vakkenData['blackboard']}'>Klik hier</a></td></tr>";
                                            }
                                            if(!empty($vakkenData['teams'])){
                                                echo "<tr><td><b>Microsoft Teamscode:</b></td><td>{$vakkenData['teams']}</td></td></tr>";
                                            }
                                            if(!empty($vakkenData['moduleboek'])){
                                                echo "<tr><td><form method='post'><input type='hidden' name='moduleboekID' value='{$vakkenData['vak_id']}'><button type='submit' name='moduleboekSubmit'>Moduleboek</button></form></td></tr>";
                                            }
                                            echo "
                                        </table>
                                    </div>
                                </div>
                            </div>";
                    }
                    echo "</div>";
                }
            }
        }
        else {
            header("Location: 404");
        }


    ?>
    </div>
</main>
