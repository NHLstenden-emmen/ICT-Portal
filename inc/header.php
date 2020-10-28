<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        
        <title>ICT Portal - <?= isset($pageTitle) ? $Core->bannerTitleText($pageTitle) : "" ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">

        <link rel="manifest" href="images/favicon/site.webmanifest">
        <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="apple-mobile-web-app-title" content="ICT portal">
        <meta name="application-name" content="ICT portal">

        <link rel="stylesheet" href="css/main/footer.css">
        <link rel="stylesheet" href="css/main/topnav.css">
        <link rel="stylesheet" href="css/main/main.css">
        <link rel="stylesheet" href="css/main/weather-icons.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <?php
            if(!isset($_GET['page']) || $_GET['page'] == ''){
                $page = 'nieuws'; //If no page specified
            } else {
                $page = $_GET['page'];
            }

            switch($page)
                {
                    case 'nieuws':
                    case 'index':
                        echo '<link rel="stylesheet" href="css/pages/nieuws.css">';
                    break;
                    case 'docenten':
                        echo '<link rel="stylesheet" href="css/pages/docenten.css">';
                    break;
                    case 'docent':
                        echo '<link rel="stylesheet" href="css/pages/docent.css">';
                    break; 
                    case 'contact':
                        echo '<link rel="stylesheet" href="css/pages/contact.css">';
                    break; 
                    default:
                        echo '<link rel="stylesheet" href="css/pages/404.css">';
                    break;
                }

        ?>
        <link rel="stylesheet" href="css/main/darkmode.css">
        <link rel="stylesheet" href="css/main/responsive.css">
    </head>
    <body <?= (!empty($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'enabled') ?  "class='darkmode'" : ""; ?>>