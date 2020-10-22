<footer class="footer_desktop">
  <div class="bottom">
        <p>2020 &copy; | NHL Stenden Emmen - ICT Portal</p>
        <div class="footer_desktop-right">
        <ul class="siteNav">
          <li><a href="nieuws">Nieuws |</a></li>
          <li><a href="vakken">Vakken |</a></li>
          <li><a href="docenten">Docenten |</a></li>
          <li><a href="contact">Contact</a></li>
        </ul>
  	</div>
</footer>

<!-- Mobile Tabs -->
<div class="footer-mobile">
  <div class="scrollmenu">
    <div class="darkmodeSwitchMobile" style="font-size: 24px; background-color: #318C91 !important"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>
    <div class="<?= ($activePage == 'nieuws') ? 'mbactive':''; ?>" onclick="window.location.href='nieuws'"><i class="fa fa-newspaper-o fa-lg fa-fw" aria-hidden="true"></i></div>
    <div class="<?= ($activePage == 'vakken') ? 'mbactive':''; ?>" onclick="window.location.href='vakken'"><i class="fa fa-book fa-lg fa-fw" aria-hidden="true"></i></div>
    <div class="<?= ($activePage == 'docenten') ? 'mbactive':''; ?>" onclick="window.location.href='docenten'"><i class="fa fa-id-card-o fa-lg fa-fw" aria-hidden="true"></i></div>
    <div class="<?= ($activePage == 'contact') ? 'mbactive':''; ?>" onclick="window.location.href='contact'"><i class="fa fa-envelope-o fa-lg fa-fw" aria-hidden="true"></i></div>
    <?php if($Core->AuthCheck()){?>
      <div class="<?= ($activePage == 'uploadNieuws') ? 'mbactive':''; ?>" onclick="window.location.href='uploadNieuws'"><i class="fa fa-pencil fa-lg fa-fw" aria-hidden="true"></i></div>
      <div class="<?= ($activePage == 'profiel-bewerken') ? 'mbactive':''; ?>" onclick="window.location.href='profiel-bewerken'"><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i></div>
      <div class="<?= ($activePage == 'beschikbaarheid') ? 'mbactive':''; ?>" onclick="window.location.href='beschikbaarheid'"><i class="fa fa-users fa-lg fa-fw" aria-hidden="true"></i></div>
      <div class="<?= ($activePage == 'logout') ? 'mbactive':''; ?>" onclick="window.location.href='logout'"><i class="fa fa-sign-out fa-lg fa-fw" aria-hidden="true"></i></div>
			<?php }

			else {?>
        <div class="<?= ($activePage == 'login') ? 'mbactive':''; ?>" onclick="window.location.href='login'"><i class="fa fa-sign-in fa-lg fa-fw" aria-hidden="true"></i></div>
			<?php } ?>
  </div>
</div>

<script src="js/darkmode.js"></script>
