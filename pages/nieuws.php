
<?php 
	$blokken = 4;
	$string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
	$result = substr($string, 0, 100)."...";
?>
<br><br>
<div class="blocks">
<h2>Uitgelicht nieuws</h2>
<div class="uitgelicht">
	<?php
	for($x=0; $x < $blokken; $x++){
	?>
	<div class="item rand">
		<div class="titel"><h3>Titel</h3></div>
		<div class="message">
			<div class="text">
				<?php echo $result; ?>	
			</div>
			<div class="image"></div>
		</div>
		<div class="meta">
			<div class="time"><p>21-10-2020 om 15:00</p></div>
			<div class="meer"><p>Lees meer</p></div>
		</div>
	</div>
	<?php
	}
	?>
</div>
</div>

<?php


        //Array met nieuwsberichten        
        $news = array("Item 1", "Item 2", "Item 3", "Item 4", "Item 5", "Item 6", "Item 7", "Item 8", "Item 9", "Item 10", "Item 11", "Item 12", "Item 13");

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
                $total = 5;
            }
        } else{
			$total = 5;
		}
               
        $x = 0;
?>

<div class="allList">
<div class="all-news">
<h2>Alle nieuwsberichten</h2><br>
    <?php 
        while($x < $total){ 
            $value = $news[$x];
    ?>
        <div class="itemRow">
            <span class="dot"></span>
            <div class="newsItem">
                <p><?php echo $value; ?></p>
            </div>
            <div class="time">
                <p>10 uur</p>
            </div>
        </div>
    <?php 
        $x++;
        } 
    ?>
    </div>
    <div class="more">
        <!-- <center> moet ik nog even met css doen, maar even geen zin -->
        <center><a href="nieuws?all=TRUE">Lees alle artikelen</a></center>
	</div>
	</div>
