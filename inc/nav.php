<nav class="navbar">
      <div class="logo">
      <a href="/index" class="logo"><img src="css/images/default_logo_white.png" alt="ICT Portal"></a>
      </div>
      <div class="navbar_items">
            <ul>
            <li class="<?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='nieuws'">Nieuws</li>
            <li class="<?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='vakken'">Vakken</li>
            <li class="<?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='docenten'">Docenten</li>
            <li class="<?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='contact'">Contact</li>
            <li class="<?= ($activePage == 'login') ? 'active':''; ?>" onclick="window.location.href='login'">Login</li>
            <div class="divider"></div>
            <div class="darkmodeSwitch"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>
            <div id="google_translate_element"></div>

            </ul>
      </div>
</nav>


<div class="banner_image">
      <div class="banner_content-left">
            <div><?= isset($activePage) ? $activePage : "ICT Portal" ?><br/></div>
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
