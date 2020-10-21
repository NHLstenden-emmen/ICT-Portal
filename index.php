<?php
    // head and nav information
    $activePage = basename($_SERVER['REQUEST_URI'], ".php");

    include 'inc/core.php';

    include 'inc/mysql.php';

    include 'inc/header.php';
    //include 'inc/nav.php';
    //include 'inc/sidebar.php';

    $DB = new MySQL();
    $Core = new Core();

    if(empty($_GET['page'])){
        $pageTitle = 'nieuws'; //If no page specified
    } else {
        $pageTitle = $_GET['page'];
    }
    //print_R($pageTitle);
    switch($pageTitle)
        {
            case 'databasetest':
                include 'pages/databasetest.php'; //file path of your home/nieuws page
                break;
            case 'nieuws':
                include 'pages/nieuws.php'; //file path of your home/nieuws page
                break;
            case 'vakken':
                include 'pages/vakken.php';
                break;
            case 'docenten':
                include 'pages/docenten.php';
                break;
            case 'docent':
                include 'pages/docent.php';
                break;
            case 'contact':
                include 'pages/contact.php';
                break;
            case 'login':
                include 'pages/login.php';
                break;
            case 'uploadNieuws':
                include 'pages/uploadNieuws.php';
                break;
            case 'docenten/profiel':
                include 'pages/docenten/profiel.php';
                break;
            case 'docentenBeschikbaarheid':
                include 'pages/docentenBeschikbaarheid.php';
                 break;
            default:
                include 'pages/404.php'; //If any page that doesn't exists, then get back to home.
        }

    include 'inc/footer.php';
?>