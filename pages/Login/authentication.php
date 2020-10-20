<?php
//if no cookie specified in sent-headers
if(!isset($_COOKIE["user"]) || !isset($_COOKIE["auth"]))
{   
    //Ga naar loginpagina
    header("location:login"); 
}
?>