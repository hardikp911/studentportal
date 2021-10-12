<?php 
    
    session_start();

    if(!isset($_SESSION["t"]))
    {
        echo "<script> location.replace('login.php');</script>";
        die();
    }else{
        echo "<script> location.replace('dash.php');</script>";

    }
    
   ?>