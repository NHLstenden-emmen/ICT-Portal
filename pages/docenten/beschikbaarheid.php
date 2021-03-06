<?php 
    $docentID = intval($_COOKIE['userID']);
    $result = $DB->Get("SELECT Maandag, Dinsdag, Woensdag, Donderdag, Vrijdag FROM docenten_beschikbaarheid WHERE docent_id = '".$docentID."'");
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
            if(!empty($_POST['beschikbaarheidMaandagBegin']) && !empty ($_POST['beschikbaarheidMaandagEind'])){
                $beschikbaarheidMaandag = $_POST['beschikbaarheidMaandagBegin']. ' - ' . $_POST['beschikbaarheidMaandagEind'];
                $DB->Get("UPDATE docenten_beschikbaarheid SET Maandag = '{$beschikbaarheidMaandag}' WHERE docent_id = '{$docentID}'");
            } else {
                $DB->Get("UPDATE docenten_beschikbaarheid SET Maandag = NULL WHERE docent_id = '{$docentID}'");
            }
            if(!empty($_POST['beschikbaarheidDinsdagBegin']) && !empty ($_POST['beschikbaarheidDinsdagEind'])){
                $beschikbaarheidDinsdag = $_POST['beschikbaarheidDinsdagBegin']. ' - ' . $_POST['beschikbaarheidDinsdagEind'];
                $DB->Get("UPDATE docenten_beschikbaarheid SET Dinsdag = '{$beschikbaarheidDinsdag}' WHERE docent_id = '{$docentID}'");
            } else {
                $DB->Get("UPDATE docenten_beschikbaarheid SET Dinsdag = NULL WHERE docent_id = '{$docentID}'");
            }
            if(!empty($_POST['beschikbaarheidWoensdagBegin']) && !empty ($_POST['beschikbaarheidWoensdagEind'])){
                $beschikbaarheidWoensdag = $_POST['beschikbaarheidWoensdagBegin']. ' - ' . $_POST['beschikbaarheidWoensdagEind'];
                $DB->Get("UPDATE docenten_beschikbaarheid SET Woensdag = '{$beschikbaarheidWoensdag}' WHERE docent_id = '{$docentID}'");
            } else {
                $DB->Get("UPDATE docenten_beschikbaarheid SET Woensdag = NULL WHERE docent_id = '{$docentID}'");
            }
            if(!empty($_POST['beschikbaarheidDonderdagBegin']) && !empty ($_POST['beschikbaarheidDonderdagEind'])){
                $beschikbaarheidDonderdag = $_POST['beschikbaarheidDonderdagBegin']. ' - ' . $_POST['beschikbaarheidDonderdagEind'];
                $DB->Get("UPDATE docenten_beschikbaarheid SET Donderdag = '{$beschikbaarheidDonderdag}' WHERE docent_id = '{$docentID}'");
            } else {
                $DB->Get("UPDATE docenten_beschikbaarheid SET Donderdag = NULL WHERE docent_id = '{$docentID}'");
            }
            if(!empty($_POST['beschikbaarheidVrijdagBegin']) && !empty ($_POST['beschikbaarheidVrijdagEind'])){
                $beschikbaarheidVrijdag = $_POST['beschikbaarheidVrijdagBegin']. ' - ' . $_POST['beschikbaarheidVrijdagEind'];
                $DB->Get("UPDATE docenten_beschikbaarheid SET Vrijdag = '{$beschikbaarheidVrijdag}' WHERE docent_id = '{$docentID}'");
            } else {
                $DB->Get("UPDATE docenten_beschikbaarheid SET Vrijdag = NULL WHERE docent_id = '{$docentID}'");
            }
            header('Location: beschikbaarheid');
        }
    }
?>
<main class="content">
    
<div class='contentBlock-nohover'>
    <div class='contentBlock-side'></div>
    <div class='contentBlock-content'>
    <p class='contentBlock-title'><?PHP echo $lang["BESCHIKBAARHEID_EDIT"]?></p>

    <div class='contentBlock-text-normal'>
    <form method="POST"> 
        <label for="beschikbaarheidMaandag_begin"><?PHP echo $lang["PRESENT_Monday"]?></label><br />
        <input type="time" id="beschikbaarheidMaandag_begin" value="<?= $beschikbaarheidOutput['Maandag'][0] ?>" name="beschikbaarheidMaandagBegin" style="width: 25%;">
        <input type="time"  value="<?= $beschikbaarheidOutput['Maandag'][1] ?>" name="beschikbaarheidMaandagEind" style="width: 25%;"><br>
        <label for="beschikbaarheidDinsdag_begin"><?PHP echo $lang["PRESENT_Tuesday"]?></label><br />
        <input type="time" id="beschikbaarheidDinsdag_begin" value="<?= $beschikbaarheidOutput['Dinsdag'][0] ?>" name="beschikbaarheidDinsdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['Dinsdag'][1] ?>" name="beschikbaarheidDinsdagEind" style="width: 25%;"><br />
        <label for="beschikbaarheidWoensdag_begin"><?PHP echo $lang["PRESENT_Wednesday"]?></label><br />
        <input type="time" id="beschikbaarheidWoensdag_begin" value="<?= $beschikbaarheidOutput['Woensdag'][0] ?>" name="beschikbaarheidWoensdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['Woensdag'][1] ?>" name="beschikbaarheidWoensdagEind" style="width: 25%;"><br />
        <label for="beschikbaarheidDonderdag_begin"><?PHP echo $lang["PRESENT_Thursday"]?></label><br />
        <input type="time" id="beschikbaarheidDonderdag_begin" value="<?= $beschikbaarheidOutput['Donderdag'][0] ?>" name="beschikbaarheidDonderdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['Donderdag'][1] ?>" name="beschikbaarheidDonderdagEind" style="width: 25%;"><br />
        <label for="beschikbaarheidVrijdag_begin"><?PHP echo $lang["PRESENT_Friday"]?></label><br />
        <input type="time" id="beschikbaarheidVrijdag_begin" value="<?= $beschikbaarheidOutput['Vrijdag'][0] ?>" name="beschikbaarheidVrijdagBegin" style="width: 25%;">
        <input type="time" value="<?= $beschikbaarheidOutput['Vrijdag'][1] ?>" name="beschikbaarheidVrijdagEind" style="width: 25%;"><br />
        <button type="submit" name="submitAction"><?PHP echo $lang["BESCHIKBAARHEID_SAVE"]?></button>
    </form>
</div></div></div>
</main>