<?php
    // head and nav information
    $activePage = basename($_SERVER['REQUEST_URI'], ".php");

    include 'inc/core.php';
    include 'inc/mysql.php';

    $DB = new MySQL();
    $Core = new Core();


    include 'inc/header.php';
    include 'inc/nav.php';
    echo "<div class='devider'>";
        echo"<div class='pageContentBlock'>";
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
                case 'logout':
                    include 'pages/logout.php';
                    break;
                case 'uploadNieuws':
                    include 'pages/docenten/uploadNieuws.php';
                    break;
                case 'profiel-bewerken':
                    include 'pages/docenten/profiel.php';
                    break;
                case 'Beschikbaarheid':
                    include 'pages/docenten/beschikbaarheid.php';
                    break;
                default:
                    include 'pages/404.php'; //If any page that doesn't exists, then get back to home.
            }
        echo "</div>";
        
        echo"<div class='pageSidebarBlock'>";
        include 'inc/sidebar.php';
        echo"</div>";
    echo "</div>";

    include 'inc/footer.php';
?>
