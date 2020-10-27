<style>
    table {
        width: 100%;
    }
    td:nth-child(1){
        width: 70%;
    }
    td:nth-child(2){
        width: 20%;
    }
    input, select {
        width: 90%;
    }
</style>
<main class="content">

<div class='contentBlock-nohover'>
		<div class='contentBlock-side'></div>
		<div class='contentBlock-content'>


<?php 
    $docentID = intval($_COOKIE['userID']);

    if(isset($_POST['aanpassenSubmit'])){
        if(!empty($_POST['nieuwsTitel'])){
            if(!empty($_POST['nieuwsTekst'])){

            $DB->Get("UPDATE nieuws SET docent_id = '{$_POST['nieuwsDocent']}', datum = CURRENT_TIMESTAMP WHERE nieuws_id = {$_POST['nieuwsFileID']}");
                $LastID = $DB->LastID();
                
                $imgContent = "NULL";
                $fileTypeImgDB = "NULL";

                $attachContentAtt = "NULL";
                $fileTypeAttDB = "NULL";

                if(!empty($_FILES["nieuwsAfbeelding"]["name"])){
                    //Insertstatement als afbeelding megegeven is

                    $fileNameImg = basename($_FILES["nieuwsAfbeelding"]["name"]); 

                    $fileTypeImg = pathinfo($fileNameImg, PATHINFO_EXTENSION); 

                    $fileTypeImgDB = "'".pathinfo($fileNameImg, PATHINFO_EXTENSION)."'"; 

                    $allowTypesImg = array('jpg','png','jpeg','gif'); 
                    if(in_array($fileTypeImg, $allowTypesImg)){ 
                        $image = $_FILES['nieuwsAfbeelding']['tmp_name']; 
                        $imgContent = "'".addslashes(file_get_contents($image))."'";
                
                        //Daarna taalspecifieke tabel
           
                    } 
                    else {
                        echo "{$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_START"]} {$langTitle} {$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END"]}";
                    }
                }
 
                if(!empty($_FILES["nieuwsBijlage"]["name"])){
                    //Insertstatement als bijlage megegeven is

                    $fileNameAtt = basename($_FILES["nieuwsBijlage"]["name"]); 

                    $fileTypeAtt = pathinfo($fileNameAtt, PATHINFO_EXTENSION); 

                    $fileTypeAttDB = "'".pathinfo($fileNameAtt, PATHINFO_EXTENSION)."'"; 

                    $allowTypesAtt = array('pdf','doc','docx','jpg','png','jpeg','gif'); 
                    if(in_array($fileTypeAtt, $allowTypesAtt)){ 
                        $attachmentAtt = $_FILES['nieuwsBijlage']['tmp_name']; 
                        $attachContentAtt = "'".addslashes(file_get_contents($attachmentAtt))."'";
                    } 
                    else {
                        echo "Fout bij uploaden {$langTitle} nieuws: Alleen pdf, doc, docx, jpg, png, jpeg en gif zijn toegestaan voor een bijlage!";
                    }
                }
                    $DB->Get("UPDATE nieuws_{$_COOKIE['lang']} 
                              SET tekst_{$_COOKIE['lang']} = '{$_POST['nieuwsTekst']}',
                                  titel_{$_COOKIE['lang']} =  '{$_POST['nieuwsTitel']}',
                                  afbeelding_{$_COOKIE['lang']} = {$imgContent},
                                  afbeelding_{$_COOKIE['lang']}_type = {$fileTypeImgDB},
                                  bijlage_{$_COOKIE['lang']} = {$attachContentAtt},
                                  bijlage_{$_COOKIE['lang']}_type ={$fileTypeAttDB}
                                  WHERE nieuws_{$_COOKIE['lang']}_id = {$_POST['nieuwsFileID']}");
                    header("Location: nieuwsbeheer");
            }
            else {
                echo "Fout bij uploaden {$langTitle} nieuws: Geen tekst ingevoerd";
            }
        }
        else {
            echo "Fout bij uploaden {$langTitle} nieuws: Geen titel ingevoerd";
        }
    }

   //Invoegen
   if(isset($_POST['submitInvoegen'])){
        if(!empty($_POST['nieuwsTitel'])){
            if(!empty($_POST['nieuwsTekst'])){

                $DB->Get("INSERT INTO nieuws (docent_id) VALUES ('{$docentID}')");
           
                $LastID = $DB->LastID();

                $imgContent = "NULL";
                $fileTypeImgDB = "NULL";

                $attachContentAtt = "NULL";
                $fileTypeAttDB = "NULL";

                if(!empty($_FILES["nieuwsAfbeelding"]["name"])){
                    //Insertstatement als afbeelding megegeven is

                    $fileNameImg = basename($_FILES["nieuwsAfbeelding"]["name"]); 

                    $fileTypeImg = pathinfo($fileNameImg, PATHINFO_EXTENSION); 

                    $fileTypeImgDB = "'".pathinfo($fileNameImg, PATHINFO_EXTENSION)."'"; 

                    $allowTypesImg = array('jpg','png','jpeg','gif'); 
                    if(in_array($fileTypeImg, $allowTypesImg)){ 
                        $image = $_FILES['nieuwsAfbeelding']['tmp_name']; 
                        $imgContent = "'".addslashes(file_get_contents($image))."'";
                
                        //Daarna taalspecifieke tabel
           
                    } 
                    else {
                        echo "{$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_START"]} {$langTitle} {$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END"]}";
                    }
                }
 
                if(!empty($_FILES["nieuwsBijlage"]["name"])){
                    //Insertstatement als bijlage megegeven is

                    $fileNameAtt = basename($_FILES["nieuwsBijlage"]["name"]); 

                    $fileTypeAtt = pathinfo($fileNameAtt, PATHINFO_EXTENSION); 

                    $fileTypeAttDB = "'".pathinfo($fileNameAtt, PATHINFO_EXTENSION)."'"; 

                    $allowTypesAtt = array('pdf','doc','docx','jpg','png','jpeg','gif'); 
                    if(in_array($fileTypeAtt, $allowTypesAtt)){ 
                        $attachmentAtt = $_FILES['nieuwsBijlage']['tmp_name']; 
                        $attachContentAtt = "'".addslashes(file_get_contents($attachmentAtt))."'";
                    } 
                    else {
                        echo "{$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_START"]} {$langTitle} {$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END"]}";
                    }
                }
                    $DB->Get("INSERT INTO nieuws_{$_COOKIE['lang']} 
                        (nieuws_{$_COOKIE['lang']}_id,
                        tekst_{$_COOKIE['lang']}, 
                        titel_{$_COOKIE['lang']},
                        afbeelding_{$_COOKIE['lang']},
                        afbeelding_{$_COOKIE['lang']}_type,
                        bijlage_{$_COOKIE['lang']},
                        bijlage_{$_COOKIE['lang']}_type)
                    VALUES 
                    ('{$LastID}',
                    '{$_POST['nieuwsTekst']}',
                    '{$_POST['nieuwsTitel']}',
                    {$imgContent},
                    {$fileTypeImgDB},
                    {$attachContentAtt},
                    {$fileTypeAttDB}
                    )");
                    header("Location: nieuwsbeheer");
            }
            else {
                echo "{$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_START"]} {$langTitle} {$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END_TEKST"]}";
            }
        }
        else {
            echo "{$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_START"]} {$langTitle} {$lang["NIEUWS_BEHEER_FOUT_UPLOADEN_END_TITLE"]}";
        }
    }

    //Afbeelding downloaden
    if(isset($_POST['imgView'])){
        if(isset($_POST['nieuwsFileID'])){

            //Gegevens uit database halen
            $downloadAttachment = $DB->Get("SELECT 
                                    titel_{$_COOKIE['lang']} AS titel,
                                    afbeelding_{$_COOKIE['lang']} AS afbeelding,
                                    afbeelding_{$_COOKIE['lang']}_type AS extensie,
                                    nieuws.datum AS datum,
                                    docenten.voornaam,
                                    docenten.achternaam                                    
                                    FROM nieuws_{$_COOKIE['lang']}
                                    INNER JOIN nieuws 
                                    ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                                    INNER JOIN docenten
                                    ON nieuws.docent_id = docenten.docent_id
                                    WHERE nieuws.nieuws_id = {$_POST['nieuwsFileID']}
                                    LIMIT 1");
            $attachmentData = $downloadAttachment->fetch_assoc();

            $fileName = '('.$attachmentData['datum'].') '.$attachmentData['titel'].' ['.$attachmentData['voornaam'].' '.$attachmentData['achternaam'].'] - afbeelding.'.$attachmentData['extensie'];

            echo $Core->downloadFile($attachmentData['afbeelding'], $fileName);
        }
    }
  
    //Bijlage downloaden
    if(isset($_POST['attachView'])){
        if(isset($_POST['nieuwsFileID'])){

            //Gegevens uit database halen
            $downloadAttachment = $DB->Get("SELECT 
                                    titel_{$_COOKIE['lang']} AS titel,
                                    bijlage_{$_COOKIE['lang']} AS bijlage,
                                    bijlage_{$_COOKIE['lang']}_type AS extensie,
                                    nieuws.datum AS datum,
                                    docenten.voornaam,
                                    docenten.achternaam                                    
                                    FROM nieuws_{$_COOKIE['lang']}
                                    INNER JOIN nieuws 
                                    ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                                    INNER JOIN docenten
                                    ON nieuws.docent_id = docenten.docent_id
                                    WHERE nieuws.nieuws_id = {$_POST['nieuwsFileID']}
                                    LIMIT 1");
            $attachmentData = $downloadAttachment->fetch_assoc();

            $fileName = '('.$attachmentData['datum'].') '.$attachmentData['titel'].' ['.$attachmentData['voornaam'].' '.$attachmentData['achternaam'].'] - nieuwsbijlage.'.$attachmentData['extensie'];

            echo $Core->downloadFile($attachmentData['bijlage'], $fileName);
        }
    }
  
        //Laat de weergave pagina zien
        if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['attachView']) && !isset($_POST['aanpassenPage'])){
            
    
            echo '<div class="contentBlock-title">'.$lang["NIEUWS_BEHEER_KEUZEMENU"].'</div>
            <div class="contentBlock-text-normal"><p><b>'.$lang["NIEUWS_BEHEER_FOUTMELDING_ENGELS"].'</b></p>';
            
            $nieuwsResult = $DB->Get("SELECT 
                nieuws.nieuws_id,
                titel_{$_COOKIE['lang']} AS titel,
                nieuws.datum AS datum,
                docenten.voornaam,
                docenten.achternaam
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                INNER JOIN docenten
                ON nieuws.docent_id = docenten.docent_id
                ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC");

            if($nieuwsResult->num_rows == 0){
                echo $lang['NIEUWS_BEHEER_MISSING_NEWS'].' '. $langTitle;
            }
            
            echo "<table>";
            while($nieuwsData = $nieuwsResult->fetch_assoc()){
                echo "<tr>";
                    echo "<td>{$nieuwsData['titel']} ({$lang["NIEUWS_BEHEER_POSTER"]}: {$nieuwsData['voornaam']} {$nieuwsData['achternaam']})</td>";
                    echo "<td>{$nieuwsData['datum']}</td>";
                    echo "<td><form method='post'><input type='hidden' value='{$nieuwsData['nieuws_id']}' name='aanpassenID'><button type='submit' name='aanpassenPage'><i class='fa fa-pencil' aria-hidden='true'></i></button></form></td>";
                    echo "<td><form method='post'><input type='hidden' value='{$nieuwsData['nieuws_id']}' name='verwijderID'><button type='submit' name='submitDelete'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table><form method='post'><button type='submit' name='invoegenPage'>{$lang["NIEUWS_BEHEER_INVOEGEN"]}</button></form>";

        }
        //Laat de invoegen pagina zien
        else if(isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && !isset($_POST['boekView']) && !isset($_POST['aanpassenPage'])){
                echo "<div class='contentBlock-title'>Nieuwsbeheer | Invoegen </div>
                <div class='contentBlock-text-normal'>
                <form method='post' enctype='multipart/form-data'>
                        <label for='nieuwsTitel'>{$lang["NIEUWS_BEHEER_TITLE"]}</label><br>
                        <input type='text' name='nieuwsTitel' placeholder='{$lang["NIEUWS_BEHEER_TITLE"]}' required /><br><br>
                        
                        <label for='nieuwsTekst'>".$lang["NIEUWS_BEHEER_NIEUWSBERICHT"]."</label><br>
                        <textarea name='nieuwsTekst' placeholder='".$lang["NIEUWS_BEHEER_NIEUWSBERICHT"]."' rows='8' cols='50' required ></textarea><br>
                        
                        <label for='nieuwsBijlage'>".$lang["NIEUWS_BEHEER_BIJLAGE"]."</label><br>
                        <input type='file' name='nieuwsBijlage' /><br><br>

                        <label for='nieuwsAfbeelding'>".$lang["NIEUWS_BEHEER_AFBEELDING"]."</label><br>
                        <input type='file' name='nieuwsAfbeelding' /><br><br>
                        <button type='submit' name='submitInvoegen'>{$lang[NIEUWS_BEHEER_PLAATSEN]}</button>
                        <button type='button' onclick="."window.location.href='nieuwsbeheer'".">{$lang["NIEUWS_BEHEER_ANNULEREN"]}</button>
                    </form>";
    }
    //Laat de aanpassen pagina zien
    else if(!isset($_POST['invoegenPage']) && !isset($_POST['submitDelete']) && isset($_POST['aanpassenPage']) && !isset($_POST['attachView']) && intval($_POST['aanpassenID'])){

        //Haal huidige data op
        
        $currentResult = $DB->Get("SELECT 
                nieuws.nieuws_id,
                tekst_{$_COOKIE['lang']} AS tekst,
                titel_{$_COOKIE['lang']} AS titel,
                afbeelding_{$_COOKIE['lang']} AS afbeelding,
                bijlage_{$_COOKIE['lang']} AS bijlage,
                nieuws.datum AS datum,
                docenten.voornaam,
                docenten.achternaam,
                docenten.docent_id
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                INNER JOIN docenten
                ON nieuws.docent_id = docenten.docent_id
                WHERE nieuws.nieuws_id = {$_POST['aanpassenID']}
                LIMIT 1");


        $currentData = $currentResult->fetch_assoc();

        echo "<div class='contentBlock-title'>".$lang["NIEUWS_BEHEER_VAKKEN_AANPASSEN"]." ($langTitle)</div>
            <div class='contentBlock-text-normal'>
            <form method='post' enctype='multipart/form-data'>
                <label for='nieuwsTitel'>".$lang["NIEUWS_BEHEER_TITLE"]."</label><br>
                <input value='{$currentData['titel']}' type='text' name='nieuwsTitel' placeholder='".$lang["NIEUWS_BEHEER_TITLE"]."' required /><br><br>
                
                <label for='nieuwsTekst'>".$lang["NIEUWS_BEHEER_NIEUWSBERICHT"]."</label><br>
                <textarea  name='nieuwsTekst' placeholder='".$lang["NIEUWS_BEHEER_NIEUWSBERICHT"]."' rows='8' cols='50' required >{$currentData['tekst']}</textarea><br>";
                
                if(empty($currentData['bijlage'])){
                    echo "<label for='nieuwsBijlage'>{$lang["NIEUWS_BEHEER_BIJLAGE"]}</label> <b>".$lang["NIEUWS_BEHEER_NIKS_GEUPLOAD"]."</b><br />";
                }
                else {
                    echo "<label for='nieuwsBijlage'>{$lang["NIEUWS_BEHEER_BIJLAGE"]}</label>
                            <button type='submit' name='attachView' style='padding: 0.3vw;'>".$lang["NIEUWS_BEHEER_WEERGEVEN"]."</button></label><br />";
                }
                echo "<input type='file' name='nieuwsBijlage' /><br><br>";


                if(empty($currentData['afbeelding'])){
                    echo "<label for='nieuwsAfbeelding'>{$lang["NIEUWS_BEHEER_AFBEELDING"]}</label> <b>".$lang["NIEUWS_BEHEER_NIKS_GEUPLOAD"]."</b><br />";
                }
                else {
                    echo "<label for='nieuwsAfbeelding'>{$lang["NIEUWS_BEHEER_AFBEELDING"]}</label>
                            <button type='submit' name='imgView' style='padding: 0.3vw;'>".$lang["NIEUWS_BEHEER_WEERGEVEN"]."</button></label><br />";
                }
                echo "
                <input type='file' name='nieuwsAfbeelding' /><br /><br />";
           
                echo "<label for='nieuwsDocent'>".$lang["NIEUWS_BEHEER_DOCENT"]."*</label><br />
                        <select name='nieuwsDocent'>";

                $docentResult = $DB->Get("SELECT docent_id, voornaam, achternaam FROM docenten");

                while($docentData = $docentResult->fetch_assoc()){
                    if($docentData['docent_id'] == $currentData['docent_id']){
                        echo "<option class='optionSelected' value='{$currentData['docent_id']}' selected>{$currentData['voornaam']} {$currentData ['achternaam']} (geselecteerd)</option>";
                    }
                    else {
                        echo "<option value='{$docentData['docent_id']}'>{$docentData['voornaam']} {$docentData['achternaam']}</option>";
                    }
                }
                echo "</select><br />
                <input type='hidden' name='nieuwsFileID' value='{$currentData['nieuws_id']}'>
                <button type='submit' name='aanpassenSubmit'>".$lang["NIEUWS_BEHEER_AANPASSEN"]."</button>
                <button type='button' onclick="."window.location.href='nieuwsbeheer'".">".$lang["DOCENTEN_BEHEER_ANNULEREN"]."</button>
            </form>";
    }
    //Gebruik de verwijderen pagina en controleert of de ingevoegde value wel een integer is.
    else if(!isset($_POST['invoegenPage']) && isset($_POST['submitDelete']) && !isset($_POST['aanpassenPage']) && !isset($_POST['attachView']) && !isset($_POST['aanpassenPage']) && intval($_POST['verwijderID'])){
        $DB->Get("DELETE FROM nieuws WHERE nieuws_id='{$_POST['verwijderID']}'");
        header('location: nieuwsbeheer');
    }
    ?>
    </div>
             
			</div>
		</div>
    </div>
</main> 