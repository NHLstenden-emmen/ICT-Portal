<div class='devider'>
    <div class='pageContentBlock'>



    <!-- -->
    <div class="newsTop">
        <div class="kop">
            <h2>Laatste nieuwsberichten</h2>
        </div>
        
        <div class="nieuwsBlokken">
            <?php

                $result = $DB->Get("SELECT * FROM nieuws_nl");
                while($lastPost = $result->fetch_assoc()){
                    $lastPostIdEnd = $lastPost['nieuws_nl_id'];                
                }
                $lastPostIdStart = $lastPostIdEnd - 3;

                // Laatse bericht = $lastPostIdEnd
                // Eerste bericht = $lastPostIdStart
                $i = 0;
                for($x = $lastPostIdEnd; $lastPostIdEnd >= $lastPostIdStart; $lastPostIdEnd--){
                    
                    //Select from DB
                    $newsQuery = $DB->Get("SELECT * FROM nieuws_nl WHERE nieuws_nl_id = '$lastPostIdEnd'");

                    while($newsItem = $newsQuery->fetch_assoc()){
                        $id = $newsItem['nieuws_nl_id'];
                        $titel = $newsItem['titel_nederlands'];
                        $text = $newsItem['tekst_nederlands'];
                        $bijlage = $newsItem['bijlage_nederlands'];
                        $afbeelding = base64_encode($newsItem['afbeelding_nederlands']);
                        
                        ?>

                        <!-- START GENEREER NIEUWS BLOK -->
                        <div class="nieuwsGrid rand">
                            <div class="titel">
                                <h3><?php echo $titel; ?></h3>
                            </div>
                            <div class="content">
                                <div class="text">
                                    <p><?php echo $text;?></p>
                                </div>
                                <div class="image">
                                    <div class="imagePlaceholder"></div>
                                    <div class="imageSource" style="background-image: url('data:image/jpeg;base64,<?php echo $afbeelding;?>');"></div>                           
                                    <div class="imagePlaceholder"></div>
                                </div>
                            </div> 
                            <div class="metaData">
                                <div class="tijd">
                                    <p>Hier komt een tijd</p>
                                </div>
                                <div class="lees">
                                    <a href="#"><p>Lees meer<p></a>
                                </div>
                            </div>
                        </div>
                        <!-- EINDE GENEREER NIEUWS BLOK -->

                        <?php
                    }    

                }

            ?>

        </div>
    </div>


    <!-- -->
    <!-- ONDERSTE STUK NIEUWSPAGINA -->

<?php
        //Array met nieuwsberichten        

        $news = array();
        $time = array();
        $result = $DB->Get("SELECT * FROM nieuws_nl");
        while($posts = $result->fetch_assoc()){
            $titel = $posts['titel_nederlands'];    
            $tijd = $posts['nieuws_nl_id']; //VERANDEREN NAAR TIJD!
            array_push($news, $titel);
            array_push($time, $tijd);
        }

        if(isset($_GET['all']))
        {
            if($_GET['all'] == 'TRUE'){
                //Lees alle artikelen
                $total = count($news);
            ?>
                <style>
                    .more{
                        display: none;
                    }
                </style>
            <?php
            } else {
                //Lees 5 artikelen
                $total = 2;
            }
        } else{
			$total = 2;
		}
               
        $x = 0;
?>

<div class="allList">
<div class="all-news">
<h2>Alle nieuwsberichten</h2><br>
    <?php 
        while($x < $total){ 
            $titel = $news[$x];
            $tijd = $time[$x];
    ?>
        <div class="itemRow">
            <span class="dot"></span>
            <div class="newsItem">
                <p><?php echo $titel; ?></p>
            </div>
            <div class="time">
                <p><?php echo $tijd; ?></p>
            </div>
        </div>
    <?php 
        $x++;
        } 
    ?>
    </div>
    <div class="more">
        
        <a href="nieuws?all=TRUE">Lees alle artikelen</a>
	</div>
	</div>
</div>            




</div>          