<?php
// head and nav information
$PageTitle="New Page Title";
include 'inc/header.php';
include 'inc/nav.php';
include 'inc/sidebar.php';?>
<!-- the body -->
<div class="content">
    <?php
    if(!isset($_GET['page']) || $_GET['page'] == ''){
        $page = 'home'; //If no page specified
    } else {
        $page = $_GET['page'];
    }

    switch($page)
        {
            case 'home':
                include 'pages/home.php'; //file path of your home page
                break;
            case 'vakken':
                include 'pages/vakken.php';
                break;
            case 'docenten':
                include 'pages/docenten.php';
                break;
            default:
                include 'pages/404.php'; //If any page that doesn't exists, then get back to home.
        }
    ?>
</div>
<?php include 'inc/footer.php';?>