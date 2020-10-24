<div class='devider'>
    <div class='pageContentBlock'>
        <main class="content">

<?php 
    if($Core->AuthCheck()){

    $docentID = intval($_COOKIE['userID']);
   
    //$result = $DB->Get("SELECT * FROM docenten WHERE docent_id = '".$docentID."'");
    //$docentData = $result->fetch_assoc();
 

    if(empty($_GET['action'])){
        echo "<div class='subTitle'>Vakkenbeheer | Keuzemenu </div>
               ";
        //lijst met vakken met optie om ze aan te passen. (verwijderen)
        //knop voor nieuw vak

        $vakkenResult = $DB->Get("	SELECT vakken.vak_id, vakken.vak, vakken.jaarlaag, vakken.periode 
        FROM docenten_vakken INNER JOIN vakken 
        ON docenten_vakken.vak_id = vakken.vak_id 
        WHERE docent_id = '{$docentID}'
        ORDER BY vakken.jaarlaag ASC, vakken.periode ASC"); //Haalt alle vakken van de ID docent op.

        echo "<table>";
        while($vakkenData = $vakkenResult->fetch_assoc()){
            echo "<tr>";
                echo "<td>{$vakkenData['vak']}</td>";
                echo "<td>Jaar {$vakkenData['jaarlaag']}</td>";
                echo "<td>Periode {$vakkenData['periode']}</td>";
                echo "<td><a href='vakkenbeheer?action=aanpassen&id={$vakkenData['vak_id']}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
                echo "<td><a href='vakkenbeheer?action=verwijderen&id={$vakkenData['vak_id']}'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
            echo "</tr>";
        }
        echo "</table> <button  onclick="."window.location.href='?action=invoegen'>Invoegen</button>";

    }
    else if(!empty($_GET['action'])){
        if($_GET['action'] == 'verwijderen'){
            if(isset($_GET['id']) && intval($_GET['id'])){
                $DB->Get("DELETE FROM vakken WHERE vak_id='{$_GET['id']}'");
            }
        }

        if($_GET['action'] == 'invoegen'){

?>
    <div class="subTitle">Vakkenbeheer | Invoegen</div>
        <hr style="width: 30%"  />

    <form method="POST" enctype="multipart/form-data"> 
        <div class="subTitle">Vakinformatie</div>
        
        <label for="vakNaam">Vak*</label><br />
        <input type="text" name="vakNaam" placeholder="Vaknaam" style="width: 65%;" required><br />
        
        <label for="vakJaarlaag">Jaarlaag*</label><br />
        <select name="vakJaarlaag" style="width: 65%;">
            <option value="1">Jaar 1</option>
            <option value="2">Jaar 2</option>
            <option value="3">Jaar 3</option>
            <option value="4">Jaar 4</option>
        </select><br />

        <label for="vakPeriode">Periode*</label><br />
        <select name="vakPeriode" style="width: 65%;">
            <option value="1">Periode 1</option>
            <option value="2">Periode 2</option>
            <option value="3">Periode 3</option>
            <option value="4">Periode 4</option>
        </select><br />


        <div class="subTitle">Opleiding</div>
        <?php 
            $opleidingResult = $DB->Get("SELECT * FROM opleidingen");
            
            echo "<label for='vakPeriode'>Opleiding*</label><br />
                    <select name='vakOpleiding'>";
            while($opleidingData = $opleidingResult->fetch_assoc()){
                echo "<option value='{$opleidingData['opleiding_id']}'>{$opleidingData['opleidingnaam']}</option>";
            }
            echo "</select><br />";
        ?>


        <div class="subTitle">Docent(en)</div>
        <?php 
            $docentResult = $DB->Get("SELECT docent_id, voornaam, achternaam FROM docenten");
            
            echo "<label for='vakDocent'>Docent*</label><br />
                    <select name='vakDocent'>";
            while($docentData = $docentResult->fetch_assoc()){
                echo "<option value='{$docentData['docent_id']}'>{$docentData['voornaam']} {$docentData['achternaam']}</option>";
            }
            echo "</select><br />";
        ?>


        <div class="subTitle">Vakbestanden</div><br />
            <label for="vakBoek">Moduleboek (.pdf)</label><br />
            <input type="file" name="vakBoek" style="width: 65%;"><br />
            
        <p>Vakken met een * zijn verplicht</p>
        <button type="submit" name="submitInvoegen">invoegen</button>
    </form>
    <?php 
        if(isset($_POST['submitInvoegen'])){
            if(isset($_POST['vakNaam'])){
                
                if(empty($_FILES["vakBoek"]["name"])){
                    //Geen moduleboek
                    $vakNaam = $_POST['vakNaam'];
                    $vakJaarlaag = $_POST['vakJaarlaag'];
                    $vakPeriode = $_POST['vakPeriode'];
                    
                    $insertResult = $DB->Get("INSERT INTO 
                                            vakken (vak, jaarlaag, periode)
                                            VALUES ('{$vakNaam}', '{$vakJaarlaag}', '{$vakPeriode}')");//>vakken
                }
                else {
                    //Moduleboek toegevoegd

                    $fileName = basename($_FILES["vakBoek"]["name"]); 
                       
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                    
                    if($fileType == 'pdf'){ 
                        $vakNaam = $_POST['vakNaam'];
                        $vakJaarlaag = $_POST['vakJaarlaag'];
                        $vakPeriode = $_POST['vakPeriode'];
                        
                        $pdf = $_FILES['vakBoek']['tmp_name']; 
                        $pdfContent = addslashes(file_get_contents($pdf)); 


                        $insertResult = $DB->Get("INSERT INTO 
                                                vakken (vak, jaarlaag, periode, moduleboek)
                                                VALUES ('{$vakNaam}', '{$vakJaarlaag}', '{$vakPeriode}', '{$pdfContent}')");//>vakken 
                    }
                    else {
                        echo "Je mag alleen een .pdf bestand uploaden.";
                    } 
                }
                    $vakID = $DB->LastID();
                    $vakDocent = $_POST['vakDocent'];

                    $DB->Get("INSERT INTO docenten_vakken (docent_id, vak_id) VALUES ('{$vakDocent}','{$vakID}')");
                    // vak_id wordt gegenereerd door db dus moet eerst worden opgehaald uit db
            }
            else {
                echo "Vaknaam is niet ingevuld.";
            }
        }


        }
        else if($_GET['action'] == 'aanpassen') {
            // naar keuze menu
        }
    }

    }
    else {
        header("Location: nieuws");
    }   
    ?>
        </div>
</main> 
    </div>