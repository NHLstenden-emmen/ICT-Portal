    <!-- -->

    <main class="content">



    <?php 

        if(!isset($_POST['allNewsSumbit'])){
            echo '<div class="subTitle">Laatste nieuwsberichten</div>
                     <div class = "contentBlock-grid">';

             $nieuwsResult = $DB->Get("SELECT 
                    SUBSTRING(tekst_{$_COOKIE['lang']}, 1, 150) AS tekst,
                    titel_{$_COOKIE['lang']} AS titel,
                    afbeelding_{$_COOKIE['lang']} AS afbeelding,
                    nieuws.datum AS datum,
                    docenten.voornaam,
                    docenten.achternaam,
                    klassen.klas_naam
                    FROM nieuws_{$_COOKIE['lang']}
                    INNER JOIN nieuws 
                    ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                    INNER JOIN docenten
                    ON nieuws.docent_id = docenten.docent_id
                    INNER JOIN klassen
                    ON nieuws.klas_id = klassen.klas_id
                    ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC
                    LIMIT 4");

            while($nieuwsData = $nieuwsResult->fetch_assoc()){
                echo "<div class='contentBlock'>
                    <div class='contentBlock-side'></div>
                    <div class='contentBlock-content' style='display: grid;grid-template-rows: 20% 55% 25%;grid-template-columns: 70% 30%;'>
                    <div class='contentBlock-title'>{$nieuwsData['titel']}</div>
                        <div class='contentBlock-text-normal' style='grid-row: 2;grid-column: 1/3;margin-top: 2vw;'>{$nieuwsData['tekst']}</div>
                        <div class='contentBlock-date' style='grid-row: 3;margin: 0;margin-left: 2vw;margin-top: 1vw;'>{$nieuwsData['datum']} | {$nieuwsData['voornaam']} {$nieuwsData['achternaam']}</div>
                        <div class='contentBlock-link' style='grid-row: 3;grid-column: 2;margin: 0;margin-top: 1vw;'>Lees meer</div>
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
        else if(isset($_POST['allNewsSumbit'])){
            echo '<div class="subTitle">Alle nieuwsberichten</div>';

            $nieuwsResultAll = $DB->Get("SELECT 
                titel_{$_COOKIE['lang']} AS titel,
                datum
                FROM nieuws_{$_COOKIE['lang']}
                INNER JOIN nieuws 
                ON nieuws.nieuws_id = nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id
                ORDER BY nieuws_{$_COOKIE['lang']}.nieuws_{$_COOKIE['lang']}_id ASC");

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
    ?>
    
    </div>
</main>