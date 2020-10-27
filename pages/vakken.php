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
        if(!isset($_POST['submitKlas-post']) && !isset($_POST['submitKlas-get']) && !isset($_POST['submitJaar']) && !isset($_GET['jaar'])){?>
            <div class="subTitle"><?php echo $lang['VAKKEN_VAKKENLIJST']; ?></div>
            <p><?php echo $lang['VAKKEN_VAKKENLIJST_SUBTITLE']; ?></p>
            <form method="POST">
                <select name="jaarSelectie">
                    <option value="1"><?php echo $lang['NAV_JAAR']; ?> 1</option>
                    <option value="2"><?php echo $lang['NAV_JAAR']; ?> 2</option>
                    <option value="3"><?php echo $lang['NAV_JAAR']; ?> 3</option>
                    <option value="4"><?php echo $lang['NAV_JAAR']; ?> 4</option>
                </select>
                <button type="submit" name="submitJaar"><?php echo $lang['VAKKEN_KLASSEN']; ?></button>
            </form>
        <?PHP } 
        else if (isset($_POST['submitJaar']) || isset($_GET['jaar']) && !isset($_POST['submitKlas-post']) && !isset($_POST['submitKlas-get'])) {
            //Stap 2 (Waar GET begint)
            
            if(isset($_POST['jaarSelectie'])){
                $jaarSelectie = $_POST['jaarSelectie'];
                $submitButton = 'post';
            }
            else if(isset($_GET['jaar'])){
                $jaarSelectie = $_GET['jaar'];
                $submitButton = 'get';
            } ?>
            <div class='subTitle'><?PHP echo $lang['VAKKEN_KLASSEN_JAAR'] ." ". $jaarSelectie ?></div>
            <p><?PHP $lang['VAKKEN_SELECT_ALLCALSSES'] ?></p>
            <?PHP
            $klasResult = $DB->Get("SELECT * FROM klassen WHERE jaar = '{$jaarSelectie}' ORDER BY periode ASC");
    
            if($klasResult->num_rows > 0){
                echo "<form method='post'><select name='klasSelectie'>";
                while($klasData = $klasResult->fetch_assoc()){
                    echo "<option value='{$klasData['klas_id']}'>{$klasData['klas_naam']}</option>";
                }
                echo "</select><button type='submit' name='submitKlas-{$submitButton}'>vakken weergeven</button></form>";
            }
            else {
                echo "{$lang['VAKKEN_NOCALSSES']}";
            }
        } 
        else if (isset($_POST['submitKlas-post']) || isset($_POST['submitKlas-get'])){
        //Vakken

                for ($i=1; $i <= 4; $i++) { 
                        
                    $vakkenView = $DB->Get("SELECT *
                    FROM klassen_vakken
                    INNER JOIN klassen
                    ON klassen_vakken.klas_id = klassen.klas_id
                    INNER JOIN vakken
                    ON klassen_vakken.vak_id = vakken.vak_id
                    INNER JOIN docenten_vakken 
                    ON klassen_vakken.vak_id = docenten_vakken.vak_id
                    INNER JOIN docenten
                    ON docenten_vakken.docent_id = docenten.docent_id
                    WHERE klassen_vakken.klas_id = '{$_POST['klasSelectie']}' AND vakken.periode = '{$i}'");


                    if($vakkenView->num_rows > 0){
                        echo "<div class='subTitle'>{$lang['VAKKEN_PERIODE']} ".$i."</div>";

                        echo '<div class="contentBlock-grid">';
                        while($vakkenData = $vakkenView->fetch_assoc()){
                                echo "<div class='contentBlock'>
                                <div class='contentBlock-side'></div>
                                <div class='contentBlock-content'>
                                    <p class='contentBlock-title'>{$vakkenData['vak']}</p>
                                    <div class='contentBlock-text-normal'>
                                        <table>
                                            <tr>
                                                <td><b>{$lang['VAKKEN_VAKDOCENT'] }:</b></td>
                                                <td><a href='docent?docent={$vakkenData['docent_id']}'>{$vakkenData['voornaam']} {$vakkenData['achternaam']}</a></td>
                                            </tr>";
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
