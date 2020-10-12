<?php
//logout.php
setcookie("user", "", time()-3600);
setcookie("auth", "", time()-3600);
setcookie("domain", "", time()-3600);
header("location:index.php");

?>