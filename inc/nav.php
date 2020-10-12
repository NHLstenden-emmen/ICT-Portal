<?php $activePage = basename($_SERVER['REQUEST_URI'], ".php");?>
<ul class="nav navbar-nav">
      <li class="<?= ($activePage == 'nieuws') ? 'active':''; ?>"><a href="nieuws">nieuws</a></li>
      <li class="<?= ($activePage == 'vakken') ? 'active':''; ?>"><a href="vakken">Vakken</a></li>
      <li class="<?= ($activePage == 'docenten') ? 'active':''; ?>"><a href="docenten">docenten</a></li>
      <li class="<?= ($activePage == 'login') ? 'active':''; ?>"><a href="login/">Login</a></li>
</ul>