<?php
//if no cookie specified in sent-headers
if(!isset($_COOKIE["user"]) || !isset($_COOKIE["auth"]) || !isset($_COOKIE["domain"]))
{   
    header("location:login.php"); 
}
?>