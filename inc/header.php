<!DOCTYPE html>

<html lang="nl">
    <head>
        <!-- normal meta data -->
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <title><?= isset($pageTitle) ? $pageTitle : "ICT Portal"?></title>

        <link rel="stylesheet" href="css/main/darkmode.css">
        <link rel="stylesheet" href="css/main/responsive.css">
        <link rel="stylesheet" href="css/main/topnav.css">
        <link rel="stylesheet" href="css/main/main.css">
        <link rel="stylesheet" href="css/main/footer.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div class="logo">
            <a href="/index" class="logo"><img src="css/images/default_logo_white.png" alt="ICT Portal"></a>
		</div>
		<div class="navbar_items">
			<ul>
                <li class="<?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='/nieuws'">Nieuws</li>
                <li class="<?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='/vakken'">Vakken</li>
                <li class="<?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='/docenten'">Docenten</li>
                <li class="<?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='/contact'">Contact</li>
                <li class="<?= ($activePage == 'login') ? 'active':''; ?>" onclick="window.location.href='/login'">Login</li>
                <div class="divider"></div>
                <div class="darkmodeSwitch"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>

			</ul>
		</div>
    </nav>
    
	<div class="banner_image">
		<div class="banner_content-left">
			<div><?= isset($paginaTitel) ? $paginaTitel : "ICT Portal" ?><br/></div>
                <span>Laatst bijgewerkt om 15:00</span><br />
                <div class="inputSearchField">
                    <form>  
                        <div class="inputWithIcon">
                            <input type="text" placeholder="Zoek een trefwoord">
                            <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="banner_content-right">
			<div>Vakkenblok.<br/>
				<span>Span Vakkenblok.</span>
			</div>
		</div>
        </div>

	</div>