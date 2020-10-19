<div class="footer">

<div class="scrollmenu">
                <div class="darkmodeSwitchMobile" style="font-size: 24px; background-color: #318C91 !important"><i class="fa fa-adjust fa-lg fa-fw" aria-hidden="true"></i></div>
                <div class="<?= ($activePage == 'nieuws') ? 'active':''; ?>" onclick="window.location.href='/nieuws'"><i class="fa fa-newspaper-o fa-lg fa-fw" aria-hidden="true"></i></div>
                <div class="<?= ($activePage == 'vakken') ? 'active':''; ?>" onclick="window.location.href='/vakken'"><i class="fa fa-book fa-lg fa-fw" aria-hidden="true"></i></div>
                <div class="<?= ($activePage == 'docenten') ? 'active':''; ?>" onclick="window.location.href='/docenten'"><i class="fa fa-id-card-o fa-lg fa-fw" aria-hidden="true"></i></div>
                <div class="<?= ($activePage == 'contact') ? 'active':''; ?>" onclick="window.location.href='/contact'"><i class="fa fa-envelope-o fa-lg fa-fw" aria-hidden="true"></i></div>
                <div class="<?= ($activePage == 'login') ? 'active':''; ?>" onclick="window.location.href='/login'"><i class="fa fa-sign-in fa-lg fa-fw" aria-hidden="true"></i></div>

  </div>
</div>
<!-- Mobile Tabs -->
<script src="js/darkmode.js"></script>

</body>
</html>