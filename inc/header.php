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
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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

<?php $activePage = basename($_SERVER['REQUEST_URI'], ".php");?>

<nav class="navbar">
    <a href="/index" class="logo"><img src="css/images/default_logo_white.png" alt="ICT Portal"></a>
    <ul class="nav-links">
      <li class="nav-item <?= ($activePage == 'nieuws') ? 'active':''; ?>"><a href="/nieuws">Nieuws</a></li>
      <li class="nav-item <?= ($activePage == 'vakken') ? 'active':''; ?>"><a href="/vakken">Vakken</a></li>
      <li class="nav-item <?= ($activePage == 'docenten') ? 'active':''; ?>"><a href="/docenten">Docenten</a></li>
      <li class="nav-item <?= ($activePage == 'contact') ? 'active':''; ?>"><a href="/contact">Contact</a></li>
      <li class="nav-item <?= ($activePage == 'login') ? 'active':''; ?>"><a href="/login">Login</a></li>
    </ul>
</nav>
