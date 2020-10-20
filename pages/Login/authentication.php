<?php
//if no cookie specified in sent-headers
if(!isset($_COOKIE["user"]) || !isset($_COOKIE["auth"]))
{   
    header("location:login.php"); 
}
?>