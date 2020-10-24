<main class="content">
    <?php
    if(isset($_POST['submitVakken']) || isset($_GET['jaar'])){
        //Query voor alle vakken uit dat jaar.
        if(isset($_POST['jaarSelectie'])){
            $jaarSelectie = $_POST['jaarSelectie'];
        }
        else if(isset($_GET['jaar'])){
            $jaarSelectie = $_GET['jaar'];
        }
        echo "<div class='subTitle'>Jaar {$jaarSelectie} | Vakken</div>
        <div class = 'contentBlock-grid'>";
        $result = $DB->Get("SELECT * FROM vakken WHERE jaarlaag = '{$jaarSelectie}' ORDER BY periode ASC");
        while($vakData = $result->fetch_assoc()){
            if(isset($_GET['vak'])){
                
                //Alle output buffers leegmaken

                //Gegevens uit database halen
                $downloadBoek = $DB->Get("SELECT * FROM vakken WHERE vak_id = '{$_GET['vak']}'");
                $downloadFetch = $downloadBoek->fetch_assoc();
                if(!empty($downloadFetch['moduleboek'])){
                    $fileName = $downloadFetch['vak'].' '.$downloadFetch['jaarlaag'].'-'.$downloadFetch['periode'].' - moduleboek.pdf';
                    echo $Core->downloadFile($downloadFetch['moduleboek'], $fileName);
                }
                else {
                    header('Location: vakken');
                }
            }
        $vakkenLink = 'window.location.href="vakken?jaar='.$vakData['jaarlaag'].'&vak='.$vakData['vak_id'].'"';
        echo "<div class='contentBlock' onclick='{$vakkenLink}'>
            <div class='contentBlock-side'></div>
            <div class='contentBlock-content'>
            <div class='contentBlock-title'>{$vakData['vak']}</div>
            <div class='contentBlock-text'>Periode: {$vakData['periode']}</div>
            </div>
            </div>";
        }
        echo "</div>";
    }
    else { ?>
            <div class="subTitle">Vakkenlijst</div>
            <p>Selecteer hier een jaar om alle vakken van het betreffende jaar te tonen.</p>
            <form method="POST">
                <select name="jaarSelectie">
                    <option value="1">Jaar 1</option>
                    <option value="2">Jaar 2</option>
                    <option value="3">Jaar 3</option>
                    <option value="4">Jaar 4</option>
                </select>
                <button type="submit" name="submitVakken">Vakken tonen</button>
            </form>
        <?php      
    } ?>
    </div>
</main>
