<?php 
    
    session_start();



    $currentURL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://" . $_SERVER['HTTP_HOST'] . str_replace(str_replace("\\","/",$_SERVER['DOCUMENT_ROOT']),'',str_replace("\\","/",strval(__DIR__)));

    // echo $currentURL;
    // print_r($_SESSION);

    include('conn.php');

    $query = "SELECT * FROM `user` WHERE `id`={$_SESSION['aid']}";
    $res = mysqli_query($connection,$query);
    $ress = mysqli_fetch_array($res,MYSQLI_ASSOC);

  
  $count = mysqli_num_rows($res);


    if(!(  (isset($_SESSION["s"]) || isset($_SESSION['t'])) && (isset($_SESSION['aid']) && ($count == 1))))

    {
        session_destroy();
        echo "<script> location.replace('login.php');</script>";

        die();
    }
    
   ?>