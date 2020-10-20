<?php
setcookie("user", "", time()-10800); //Remove cookie
setcookie("auth", "", time()-10800);
setcookie("domain", "", time()-10800);

header("location:index.php"); //Goto login page
?>