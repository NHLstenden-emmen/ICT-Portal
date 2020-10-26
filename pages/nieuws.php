
    <main class="content">

    <?php 
    

    if(empty($_COOKIE)){
        $_COOKIE['lang'] = 'nl';
    }

        if(!isset($_GET['all']) && !isset($_GET['id'])){
            echo '<div class="subTitle">Laatste nieuwsberichten</div>
                     <div class = "contentBlock-grid">';

             $nieuwsResult = $DB->Get("SELECT 
                    SUBSTRING(tekst_{$_COOKIE['lang']}, 1, 450) AS tekst,
                    nieuws_{$_COOKIE['lang']}_id AS id,
                    titel_{$_COOKIE['lang']} AS titel,
                    afbeelding_{$_COOKIE['lang']} AS afbeelding,
                    nieuws.datum AS datum,
                    docenten.voornaam,
                    docenten.achternaam                    
                    FROM nieuws_{$_COOKIE['lang']}
                    INNER JOIN nieuws 
                    ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                    INNER JOIN docenten
                    ON nieuws.docent_id = docenten.docent_id
                    ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC
                    LIMIT 4");

            if($nieuwsResult->num_rows == 0){
                echo "Er zijn nog geen nieuwsberichten geplaatst in het {$langTitle}.";
            }

            while($nieuwsData = $nieuwsResult->fetch_assoc()){
                echo "<div class='contentBlock' onclick="."window.location.href='nieuws?id={$nieuwsData["id"]}'>
                    <div class='contentBlock-side'></div>
                    <div class='contentBlock-content' style='display: grid;grid-template-rows: 20% 70% 5% 5%;grid-template-columns: 70% 30%;'>";
                        if(!empty($nieuwsData['afbeelding'])){
                            echo "<img style='grid-row: 2;grid-column: 2;border-radius: 50%;width: 10vw;margin-top: -1.5vw;height: 10vw;object-fit: cover;' src='data:image/jpg;charset=utf8;base64,".base64_encode($nieuwsData['afbeelding'])."' />";
                        }
                    echo "
                    <div class='contentBlock-title' style='grid-row: 1'>{$nieuwsData['titel']}</div>
                        <div class='contentBlock-text-normal' style='grid-row: 2;grid-column: 1/2;margin-top: 2vw;'>{$nieuwsData['tekst']}</div>
                        <div class='contentBlock-date' style='grid-row: 3;margin: 0;margin-left: 2vw;/* margin-top: 1vw; */'>{$nieuwsData['datum']} | {$nieuwsData['voornaam']} {$nieuwsData['achternaam']}</div>
                    </div>
                </div>";
            } 
            
            echo "</div>";

            //Lijst van laatste 5 nieuwsberichten
            echo '<div class="subTitle">Alle nieuwsberichten</div>';

            $nieuwsResult10 = $DB->Get("SELECT 
                titel_{$_COOKIE['lang']} AS titel,
                datum
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC
                LIMIT 10");

            if($nieuwsResult10->num_rows == 0){
                echo "Er zijn nog geen nieuwsberichten geplaatst in het {$langTitle}.";
            }

            echo '<table>';
            while($nieuwsData10 = $nieuwsResult10->fetch_assoc()){
                echo '<tr>
                        <td class="dotTD">
                            <span class="dotIcon"></span>
                        </td>
                        <td>
                            <p>'.$nieuwsData10['titel'].'</p>
                        </td>
                        <td class="time">
                            <p>'.$nieuwsData10['datum'].'</p>
                        </td></tr>';
            }
            echo '</table>';

            echo '<br /><form method="post"><button type="submit" name="allNewsSumbit">Lees alle artikelen</button></form>';
        }
        else if(isset($_GET['all'])  && !isset($_GET['id']) && $_GET['all'] == true){
            echo '<div class="subTitle">Alle nieuwsberichten</div>';

            $nieuwsResultAll = $DB->Get("SELECT 
                titel_{$_COOKIE['lang']} AS titel,
                datum
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC");

            if($nieuwsResultAll->num_rows == 0){
                echo "Er zijn nog geen nieuwsberichten geplaatst in het {$langTitle}.";
            }

            echo '<table>';
            while($nieuwsDataAll = $nieuwsResultAll->fetch_assoc()){
                echo '<tr>
                        <td class="dotTD">
                            <span class="dotIcon"></span>
                        </td>
                        <td>
                            <p>'.$nieuwsDataAll['titel'].'</p>
                        </td>
                        <td class="time">
                            <p>'.$nieuwsDataAll['datum'].'</p>
                        </td></tr>';
            }
            echo '</table>';
            echo "<button onclick="."window.location.href='nieuws'>terug</button>";
        }
        else if(!isset($_POST['allNewsSumbit']) && isset($_GET['id']) && intval($_GET['id'])){
            
                $nieuwsViewResult = $DB->Get("SELECT 
                nieuws_{$_COOKIE['lang']}_id AS id,
                tekst_{$_COOKIE['lang']} AS tekst,
                titel_{$_COOKIE['lang']} AS titel,
                afbeelding_{$_COOKIE['lang']} AS afbeelding,
                bijlage_{$_COOKIE['lang']} AS bijlage,

                nieuws.datum AS datum,
                docenten.voornaam,
                docenten.achternaam                    
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                INNER JOIN docenten
                ON nieuws.docent_id = docenten.docent_id
                WHERE nieuws.nieuws_id = {$_GET['id']}
                LIMIT 1");

                $nieuwsViewData = $nieuwsViewResult->fetch_assoc();
                if($nieuwsViewResult->num_rows == 1){
              echo "<div class='contentBlock-nohover'>
              <div class='contentBlock-side'></div>
              <div class='contentBlock-content' style='display: grid;grid-template-rows:auto auto 40%;grid-template-columns: 70% 30%;'>
              <div class='contentBlock-title'>{$nieuwsViewData['titel']}<p class='contentBlock-date-view'>{$nieuwsViewData['datum']} | Geplaatst door: {$nieuwsViewData['voornaam']} {$nieuwsViewData['achternaam']}</p></div>
                  <div class='contentBlock-text-normal' style='grid-row: 2;grid-column: 1/3;'>
                    {$nieuwsViewData['tekst']}";
                  if(!empty($nieuwsViewData['bijlage'])){
                    echo "<form method='post'><input type='hidden' value='{$nieuwsViewData['id']}' name='nieuwsFileID'><button style='margin-top: 1vw;'type='submit' name='attachView' style='grid-row: 3;grid-column: 1/3;'>bijlage weergeven</button></form>";
                }
                echo "</div>
                </div>
            </div>";
            }
            else {
                header("Location: 404");
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
    ?>
    
    </div>
</main>