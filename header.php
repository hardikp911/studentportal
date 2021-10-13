<?php include('session.php'); ?>
<?php

function checkTeacher()
{
  if ($_SESSION['type'] == 't') {
    return true;
  } else {
    return false;
  }
}


function checkStudent()
{
  if ($_SESSION['type'] == 's') {
    return true;
  } else {
    return false;
  }
}
?>


<!DOCTYPE html>
<html lang="en">



<head>
  <link rel="apple-touch-icon" href="/uploads/cropped-logo.png">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" media="(prefers-color-scheme: light)" content="white">
  <meta name="title" content="Portal">
  <meta name="description" content="PortalBank of data,education">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://pwfree.github.io/">
  <meta property="og:title" content="Portal">
  <meta property="og:description" content="PortalBank of data,education">
  <meta property="og:image" content="/uploads/cropped-logo.png">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://pwfree.github.io/">
  <meta property="twitter:title" content="Portal">
  <meta property="twitter:description" content="PortalBank of data,education">
  <meta property="twitter:image" content="/uploads/cropped-logo.png">


  <!-- font awesome -->
  <style>
    table {
      margin: 10px !important;
    }

    nav {
      position: fixed;
      top: 0;
      z-index: 99999;
    }


    body {
      margin-top: 100px !important;
    }



    .btn {
      margin: 20px;
    }

    a {
      margin-left: 2px;
    }


    .tabs .tab a {
      color: black !important;
      font-weight: bold;
      font-size: 10px !important;
    }

    .row {
      margin-bottom: 5px !important;
    }

    .brand {
      color: black !important;
      font-weight: 500;
      font-size: 13.5px;
    }


    a.brand-logo.brand {
      font-size: 20px;
    }


    .brand-btn {
      background-color: #cbb007 !important;
    }

    .brand-btn:focus {
      background-color: #6e6000 !important;
    }

    label {
      font-weight: 600;
      width: 100px;
      font-size: .9em !important;
    }





    header,
    main,
    footer {
      padding-left: 300px;
    }

    @media only screen and (max-width: 992px) {

      header,
      main,
      footer {
        padding-left: 0px;
      }
    }



    .docs-footer {
      margin-top: 40px;
      background-color: transparent !important;
      border-top: 1px solid rgba(0, 0, 0, 0.14);
      color: inherit;
    }

    object#front-page-logo {
      width: 280px;
      margin-left: -26px;
    }


    ul.sidenav.sidenav-fixed li.logo {
      text-align: center;
      margin-top: 32px;
      margin-bottom: 136px;
    }


    .neu {
      padding: 2em;
      border-radius: 1em;
      border: none;
      background-color: #eaeaea;
      outline: none;
      transition: all 0.1s ease;
      box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15), -5px -5px 10px white;
    }

    .neu:active {
      box-shadow: inset 5px 5px 10px rgba(0, 0, 0, 0.15), inset -5px -5px 10px white;
    }
  </style>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- icon @ favicon -->
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins|Quattrocento+Sans" rel="stylesheet" />
  <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/hls.js"></script>
  <!--   <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/demo.css" />
 -->

  <title>Student Portal</title>

</head>




<body>

  <div class="progress" style="margin:0!important">
    <div class="indeterminate"></div>
  </div>

  <header>
    <nav class="white">

      <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
        <li><a style="display:none;" class="sidenav-close" href="#!"></a></li>
        </li>

        <li class="logo"><a id="logo-container" href="/" class="brand-logo">



            <!-- <img src="res/logo.png" alt="Your browser does not support SVG"></a></li> -->
            <object id="front-page-logo" type="image/svg+xml" data="<?php echo $currentURL ?>/res/logo.svg" alt="Your browser does not support SVG">Your browser does not support SVG</object>



        <li class="divider" tabindex="-1"></li>



        <li><a href="<?php echo $currentURL ?>/dash.php"><i class="material-icons">home</i>Home</a></li>












        <?php if ($_SESSION['s']) {  ?>


          <li><a href="<?php echo $currentURL ?>/student/attendence.php"><i class="material-icons">school</i>Attendence</a></li>
          <li><a href="<?php echo $currentURL ?>/student/details.php"><i class="material-icons">info</i>My Details</a></li>
          <li><a href="<?php echo $currentURL ?>/student/assignments.php"><i class="material-icons">assignment</i>Assignments</a></li>
          <li><a href="<?php echo $currentURL ?>/student/addnote.php"><i class="material-icons">note_add</i>Add note</a></li>


          <li><a href="<?php echo $currentURL ?>/logout.php"><i class="material-icons">logout</i>logout</a></li>


        <?php } ?>


        <?php if ($_SESSION['t']) {  ?>
          <li><a href="<?php echo $currentURL ?>/teacher/attendence.php"><i class="material-icons">school</i>Add Attendence of Today</a></li>
          <li><a href="<?php echo $currentURL ?>/teacher/checkleave.php"><i class="material-icons">school</i>Check Leave Notes</a></li>

          <li><a href="<?php echo $currentURL ?>/student/details.php"><i class="material-icons">info</i>My Details</a></li>
          <li><a href="<?php echo $currentURL ?>/logout.php"><i class="material-icons">logout</i>logout</a></li>
          <?php } ?>



        <!-- <li><a class="supera brand" href="view_teacher.php">View Teachers</a> </li> -->


        <li class="divider" tabindex="-1"></li>

      </ul>

      <a tabindex="-5" href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-down"><i class="material-icons brand">menu</i></a>


      <div class="nav-wrapper" style="width:95% ;margin-left:20px;">
        <a tabindex="-5" href="/" class="brand-logo brand">
          <?php echo $_SESSION['t'] ?  'Teacher' :  'Student' ?> Portal
        </a>
      </div>
    </nav>

  </header>


  <div id="content">
    <main id="mainContent">