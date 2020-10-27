
    <main class="content">

    <?php 
    if(empty($_COOKIE)){
        $_COOKIE['lang'] = 'nl';
    }

        if(!isset($_POST['allNewsSumbit']) && !isset($_GET['all']) && !isset($_GET['id'])){ // standaard
            echo '<div class="subTitle">'.$lang["NEWS_LASTNEWS"].'</div>
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
                echo $lang["NEWS_GEENNIEUWS_BERICHTEN"];
            }

            while($nieuwsData = $nieuwsResult->fetch_assoc()){
                echo "<div class='contentBlock' onclick="."window.location.href='nieuws?id={$nieuwsData["id"]}'>
                    <div class='contentBlock-side'></div>
                    <div class='contentBlock-content'>";
                        if(!empty($nieuwsData['afbeelding'])){
                            echo "<img alt={$lang['NEWS_IMAGE_ALT']} id='image-Nieuws' src='data:image/jpg;charset=utf8;base64,".base64_encode($nieuwsData['afbeelding'])."' />";
                        }
                    echo "
                    <div class='contentBlock-title'>{$nieuwsData['titel']}</div>
                        <div id='nieuws-short' class='contentBlock-text-normal'>{$nieuwsData['tekst']}</div>
                        <div class='contentBlock-date'>{$nieuwsData['datum']} | {$nieuwsData['voornaam']} {$nieuwsData['achternaam']}</div>
                    </div>
                </div>";
            } 
            
            echo "</div>";

            //Lijst van laatste 10 nieuwsberichten
            echo '<div class="subTitle">'.$lang["NEWS_LASTNEWS"].'</div>';

            $nieuwsResult10 = $DB->Get("SELECT 
                nieuws_{$_COOKIE['lang']}_id AS id,
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
                            <p><a href="nieuws?id='.$nieuwsData10['id'].'">'.$nieuwsData10['titel'].'</p>
                        </td>
                        <td class="time">
                            <p>'.$nieuwsData10['datum'].'</a></p>
                        </td></tr>';
            }
            echo '</table>';

            echo '<br /><form method="post"><button type="submit" name="allNewsSumbit">Lees alle artikelen</button></form>';
        }
        else if(isset($_POST['allNewsSumbit']) && !isset($_GET['id']) || isset($_GET['all']) == true){   // alle artikelen
            echo '<div class="subTitle">Alle nieuwsberichten</div>';

            $nieuwsResultAll = $DB->Get("SELECT 
                nieuws_{$_COOKIE['lang']}_id AS id,
                titel_{$_COOKIE['lang']} AS titel,
                datum
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC");

            if($nieuwsResultAll->num_rows == 0){
                echo $lang["NEWS_GEENNIEUWS_BERICHTEN"] . $langTitle .".";
            }

            echo '<table>';
            while($nieuwsDataAll = $nieuwsResultAll->fetch_assoc()){
                echo '<tr>
                        <td class="dotTD">
                            <span class="dotIcon"></span>
                        </td>
                        <td>
                            <p><a href="nieuws?id='.$nieuwsDataAll['id'].'">'.$nieuwsDataAll['titel'].'</p>
                        </td>
                        <td class="time">
                            <p>'.$nieuwsDataAll['datum'].'</a></p>
                        </td></tr>';
            }
            echo '</table>';
            echo "<button onclick="."window.location.href='nieuws'>{$lang["NEWS_TERUG"]}</button>";
        }
        else if(!isset($_POST['allNewsSumbit']) && isset($_GET['id']) && intval($_GET['id'])){ // 1 artikel weergeven volledig scherm
            
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
                <div id='nieuwsWeergave'class='contentBlock-content'>";
                    if(!empty($nieuwsViewData['afbeelding'])){
                        echo "<img alt='nieuws afbeelding' id='image-Nieuws-View' src='data:image/jpg;charset=utf8;base64,".base64_encode($nieuwsViewData['afbeelding'])."' />
                        <div class='contentBlock-title'>{$nieuwsViewData['titel']}</div>
                    <div id='text-view'class='contentBlock-text-normal'>";
                    }
                    else {
                        echo "
                        <div class='contentBlock-title'>{$nieuwsViewData['titel']}</div>
                        <div id='text-view' style='grid-column: 1/4;' class='contentBlock-text-normal'>";
                    }
                    echo"
                        <p>{$nieuwsViewData['tekst']}</p>
                    </div>
                    <div class='contentBlock-date-view'>
                        <p>{$nieuwsViewData['datum']} | {$lang["NEWS_GEPLAAST_DOOR"]}: {$nieuwsViewData['voornaam']} {$nieuwsViewData['achternaam']}</p>
                    </div>";
                    if(!empty($nieuwsViewData['bijlage'])){
                        echo "<form id='bijlageForm' method='post'><input type='hidden' value='{$nieuwsViewData['id']}' name='nieuwsFileID'><button id='button-Bijlage' name='attachView' type='submit'>bijlage weergeven</button></form>";
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