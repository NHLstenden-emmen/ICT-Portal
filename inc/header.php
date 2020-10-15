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

        <link rel="stylesheet" href="css/main/darkmode.css">



        <link rel="stylesheet" href="css/main/sidebar.css">
        <link rel="stylesheet" href="css/main/footer.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
    <img src="/css/images/jumbotron.jpg">

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

            

<button id="dark-mode-toggle">Toggle dark mode</button>
<!--
<style>
    body {
  background-color: white;
  color: black;
}


}
</style>-->
<script>
// check for saved 'darkMode' in localStorage
let darkMode = localStorage.getItem('darkMode'); 

const darkModeToggle = document.querySelector('#dark-mode-toggle');

const enableDarkMode = () => {
  // 1. Add the class to the body
  $('body').addClass('darkmode');
  $('input[type=text]').addClass('darkmode');
  $('.inputWithIcon').addClass('darkmode');
  $('button').addClass('darkmode');

  // 2. Update darkMode in localStorage
  localStorage.setItem('darkMode', 'enabled');
}

const disableDarkMode = () => {
  // 1. Remove the class from the body
  $('body').removeClass('darkmode');
  $('input[type=text]').removeClass('darkmode');
  $('.inputWithIcon').removeClass('darkmode');
  $('button').removeClass('darkmode');

  // 2. Update darkMode in localStorage 
  localStorage.setItem('darkMode', null);
}
 
// If the user already visited and enabled darkMode
// start things off with it on
if (darkMode === 'enabled') {
  enableDarkMode();
}

// When someone clicks the button
darkModeToggle.addEventListener('click', () => {
  // get their darkMode setting
  darkMode = localStorage.getItem('darkMode'); 
  
  // if it not current enabled, enable it
  if (darkMode !== 'enabled') {
    enableDarkMode();
  // if it has been enabled, turn it off  
  } else {  
    disableDarkMode(); 
  }
});

</script>