<?php 
    $paginaTitel = "test";
    //Feike's Login systeem
    $docentID = 6;
   

    $result = $DB->Get("SELECT beschikbaarheid_maandag, beschikbaarheid_dinsdag, beschikbaarheid_woensdag, beschikbaarheid_donderdag, beschikbaarheid_vrijdag FROM docenten_beschikbaarheid WHERE docent_id = '".$docentID."'");


    if($result->num_rows > 0){
        $beschikbaarheidDB = $result->fetch_assoc();
        
        foreach($beschikbaarheidDB as $key => $value){
            if(!empty($value)){
                $beginEindTijd = preg_split("/[\s,]+/", str_replace('-', '', $value));
                $beschikbaarheidOutput[$key] = $beginEindTijd;
                
            }
            else {
                $beschikbaarheidOutput[$key][0] = '';
                $beschikbaarheidOutput[$key][1] = '';
            }
        }
    }
    else if($result->num_rows == 0){
        $DB->Get("INSERT INTO docenten_beschikbaarheid (docent_id) VALUES ($docentID)");
        header('Location: beschikbaarheid');
    }


if(isset($_POST['submitAction'])){
    if($result->num_rows > 0){
        //Update
        if(!empty($_POST['beschikbaarheidMaandagBegin']) || !empty ($_POST['beschikbaarheidMaandagEind'])){
            $beschikbaarheidMaandag = $_POST['beschikbaarheidMaandagBegin']. ' - ' . $_POST['beschikbaarheidMaandagEind'];
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_maandag = '{$beschikbaarheidMaandag}' WHERE docent_id = '{$docentID}'");
        } else {
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_maandag = NULL WHERE docent_id = '{$docentID}'");
        }

        if(!empty($_POST['beschikbaarheidDinsdagBegin']) || !empty ($_POST['beschikbaarheidDinsdagEind'])){
            $beschikbaarheidDinsdag = $_POST['beschikbaarheidDinsdagBegin']. ' - ' . $_POST['beschikbaarheidDinsdagEind'];
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_dinsdag = '{$beschikbaarheidDinsdag}' WHERE docent_id = '{$docentID}'");
        } else {
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_dinsdag = NULL WHERE docent_id = '{$docentID}'");
        }

        if(!empty($_POST['beschikbaarheidWoensdagBegin']) || !empty ($_POST['beschikbaarheidWoensdagEind'])){
            $beschikbaarheidWoensdag = $_POST['beschikbaarheidWoensdagBegin']. ' - ' . $_POST['beschikbaarheidWoensdagEind'];
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_woensdag = '{$beschikbaarheidWoensdag}' WHERE docent_id = '{$docentID}'");
        } else {
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_woensdag = NULL WHERE docent_id = '{$docentID}'");
        }

        if(!empty($_POST['beschikbaarheidDonderdagBegin']) || !empty ($_POST['beschikbaarheidDonderdagEind'])){
            $beschikbaarheidDonderdag = $_POST['beschikbaarheidDonderdagBegin']. ' - ' . $_POST['beschikbaarheidDonderdagEind'];
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_donderdag = '{$beschikbaarheidDonderdag}' WHERE docent_id = '{$docentID}'");
        } else {
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_donderdag = NULL WHERE docent_id = '{$docentID}'");
        }

        if(!empty($_POST['beschikbaarheidVrijdagBegin']) || !empty ($_POST['beschikbaarheidVrijdagEind'])){
            $beschikbaarheidVrijdag = $_POST['beschikbaarheidVrijdagBegin']. ' - ' . $_POST['beschikbaarheidVrijdagEind'];
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_vrijdag = '{$beschikbaarheidVrijdag}' WHERE docent_id = '{$docentID}'");
        } else {
            $DB->Get("UPDATE docenten_beschikbaarheid SET beschikbaarheid_vrijdag = NULL WHERE docent_id = '{$docentID}'");
        }
        
        header('Location: beschikbaarheid');

    }
}


?>
<main class="content">
    <div class="subTitle">Beschikbaarheid bewerken</div>
    
    <form method="POST"> 

        <label for="beschikbaarheidMaandag_begin">Maandag</label><br />
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_maandag'][0] ?>" name="beschikbaarheidMaandagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_maandag'][1] ?>" name="beschikbaarheidMaandagEind" style="width: 25%;"><br>
        
        <label for="beschikbaarheidDinsdag">Dinsdag</label><br />
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_dinsdag'][0] ?>" name="beschikbaarheidDinsdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_dinsdag'][1] ?>" name="beschikbaarheidDinsdagEind" style="width: 25%;"><br />

        <label for="beschikbaarheidWoensdag">Woensdag</label><br />
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_woensdag'][0] ?>" name="beschikbaarheidWoensdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_woensdag'][1] ?>" name="beschikbaarheidWoensdagEind" style="width: 25%;"><br />

        <label for="beschikbaarheidDonderdag">Donderdag</label><br />
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_donderdag'][0] ?>" name="beschikbaarheidDonderdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_donderdag'][1] ?>" name="beschikbaarheidDonderdagEind" style="width: 25%;"><br />

        <label for="beschikbaarheidVrijdag">Vrijdag</label><br />
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_vrijdag'][0] ?>" name="beschikbaarheidVrijdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['beschikbaarheid_vrijdag'][1] ?>" name="beschikbaarheidVrijdagEind" style="width: 25%;"><br />

        <button type="submit" name="submitAction">opslaan</button>
        
    </form>
    
<!--
- standaard waarde in de database moet nog weg
-->

</main> 