<?php
setcookie("user", "", time()-3600); //Remove cookie
setcookie("auth", "", time()-3600);
setcookie("userID", "", time()-3600);

header("location:index.php"); //Goto login page
?>