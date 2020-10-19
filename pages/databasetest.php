<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/main/darkmode.css">
<link rel="stylesheet" href="css/main/responsive.css">
<link rel="stylesheet" href="css/main/topnav.css">
<link rel="stylesheet" href="css/main/main.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
			</ul>
		</div>
    </nav>
    
	<div class="banner_image">
		<div class="banner_content-left">
			<div><?= isset($activePage) ? $activePage : "ICT Portal" ?><br/>
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
        </div>
        <div class="banner_content-right">
			<div>Only I can change my life.<br/>
				<span>No one can do it for me.</span>
			</div>
		</div>
	</div>

<main class="content">
<div class="subTitle">Jaar 1</div>

    <button class="dark-mode-toggle">Toggle dark mode</button>
</main>

