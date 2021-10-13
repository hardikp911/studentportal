<?php include('header.php'); 


if(checkStudent()){
    ?>








<?php
}

if(checkTeacher()){
    ?>









    <?php
}




?>

<b>
<h3 class="header center black-text " style="font-weight: 600;">Welcome To MIT-WPU</h3>
</b>


<h4 class="header center black-text  " style="font-weight: 400;"> <a style="color:green ">Hello..</a> <?php echo $_SESSION['t'] ? $_SESSION['t'] : $_SESSION['s'] ;?></h4>

<br>

<div id="index-banner" class="parallax-container">

    <div class="">
        <img src="res/dash.jpg" alt="Unsplashed background img 1" style="opacity: 1;"></div>
  </div>


<?php


include('footer.php');
?>