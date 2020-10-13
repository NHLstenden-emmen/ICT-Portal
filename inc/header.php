<!doctype html>
<html lang="nl">
    <head>
        <!-- normal meta data -->
        <meta charset="UTF-8">
        <meta name="description" content="ICT Portal for NHL Stenden student platform">
        <meta name="keywords" content="ICT Portal">
        <meta name="author" content="1D">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- this gets the page title from the current file -->
        <title><?= isset($pageTitle) ? $pageTitle : "ICT Portal"?></title>
        <!-- link to the js files -->
        <script src="js/main.js"></script>
        <!-- link to the css files -->
        <link rel="stylesheet" href="css/main/main.css">
        <link rel="stylesheet" href="css/main/topnav.css">
        <link rel="stylesheet" href="css/main/sidebar.css">
        <link rel="stylesheet" href="css/main/footer.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
        <!-- link page spesific stylesheets -->
        <?php
            if(!isset($_GET['page']) || $_GET['page'] == ''){
                $page = 'nieuws'; //If no page specified
            } else {
                $page = $_GET['page'];
            }

            switch($page)
                {
                    case 'nieuws':?>
                        <link rel="stylesheet" href="css/pages/nieuws.css">
                        <?php break;
                    case 'vakken':?>
                        <link rel="stylesheet" href="css/pages/vakken.css">
                        <?php break;
                    case 'docenten':?>
                        <link rel="stylesheet" href="css/pages/docenten.css">
                        <?php break;
                    case 'contact':?>
                        <link rel="stylesheet" href="css/pages/contact.css">
                        <?php break;
                    case 'login':?>
                        <link rel="stylesheet" href="css/pages/login.css">
                        <?php break;
                    case 'gebruikers':?>
                        <link rel="stylesheet" href="css/pages/gebruikers.css">
                        <?php break;
                    case 'uploadNieuws':?>
                        <link rel="stylesheet" href="css/pages/uploadNieuws.css">
                        <?php break;
                    case 'docentenEdit':?>
                        <link rel="stylesheet" href="css/pages/docentenEdit.css">
                        <?php break;
                    default:?>
                    <link rel="stylesheet" href="css/pages/404.css">
                    <?php
                }
        ?>
    </head>
    <body>


<nav class="navbar">
    <a href="/index" class="logo"><img src="css/images/default_logo_white.png" alt="ICT Portal"></a>
    <ul class="nav-links">
      <li class="nav-item <?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='/nieuws'">Nieuws</li>
      <li class="nav-item <?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='/vakken'">Vakken</li>
      <li class="nav-item <?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='/docenten'">Docenten<li>
      <li class="nav-item <?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='/contact'">Contact</li>
      <li class="nav-item <?= ($activePage == 'login') ? 'active':''; ?>" onclick="window.location.href='/login'">Login</li>
    </ul>
</nav>
<div class="jumbotron">
    <div class="jumbotron-content">
        <div class="pageTitle"><?= isset($activePage) ? ucfirst($activePage) : "ICT Portal" ?></div>
            <div class="pageSubTitle">Laatst bijgewerkt om 15:00</div>
            <div class="inputSearchField">
            <form>  

                <div class="inputWithIcon">
  <input type="text" placeholder="Zoek een trefwoord">
  <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
</div>

            </form>
        </div>
    </div>
</div>


<!--
<button onclick="myFunction()">Toggle dark mode</button>

<style>
    body {
  background-color: white;
  color: black;
}


}
</style>
<script>
    function myFunction() {
  var element = document.body;
  element.classList.toggle("dark-mode");
}
</script>-->