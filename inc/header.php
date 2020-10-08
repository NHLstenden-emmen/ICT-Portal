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
                    default:?>
                    <link rel="stylesheet" href="css/pages/404.css">
                    <?php
                }
        ?>
    </head>
    <body>