<!DOCTYPE html>
<html lang="nl">
    <head>
        <!-- normal meta data -->
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <title><?php echo "ICT Portal - ". $activePage ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?Php include 'inc/favicon.php'; ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        
        <link rel="stylesheet" href="css/main/footer.css">
        <link rel="stylesheet" href="css/main/topnav.css">
        <link rel="stylesheet" href="css/main/sidebar.css">
        <link rel="stylesheet" href="css/main/main.css">

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
        <link rel="stylesheet" href="css/main/darkmode.css">
        <link rel="stylesheet" href="css/main/responsive.css">
    </head>
    <body>
