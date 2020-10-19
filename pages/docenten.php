
<link rel="stylesheet" href="../css/pages/docenten.css">


<main class="content">
  <div class="subTitle">Docenten</div>
	<div class = "contentBlock-grid" style="">

    <?php
    $result = $DB->Get("SELECT * FROM docenten");
    
    while($row = $result->fetch_assoc()){
echo "<div class='contentBlock'>
        <div class='contentBlock-side'></div>
        <div class='contentBlock-content'>
            <div class='contentBlock-title'>
                Hallo
            </div>
            <div class='contentBlock-text'>
                test
            </div>
            <div class='contentBlock-info'>
                <div class='contentBlock-date'>
                    vandaag om 15:09
                </div>
                <div class='contentBlock-link'>
                    <a href=''>Lees meer</a>
                </div>
            </div>
        </div>
        </div>";
    }
?>

  </div>
</main> 

