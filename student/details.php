<?php include('../header.php'); 


if(checkStudent()){
    ?>




        <?php 



$aid = $_SESSION['aid'];



$querys = "SELECT * FROM `user` where `id`=$aid ";
$resss = mysqli_query($connection,$querys);
$ressss = mysqli_fetch_array($resss,MYSQLI_ASSOC);

// print_r($ressss);

?>


<div class="row">





<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
   Name
</div>
<div style="font-size:16px;"><?php echo $ressss['name'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>









<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
   PRN NO.
</div>
<div style="font-size:16px;"><?php echo $ressss['prn'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>









<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
  Mobile No.
</div>
<div style="font-size:16px;"><?php echo $ressss['phone'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>






<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
  Email id.
</div>
<div style="font-size:16px;"><?php echo $ressss['email'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>












</div>









<?php
}

if(checkTeacher()){
    ?>







<?php 



$aid = $_SESSION['aid'];



$querys = "SELECT * FROM `user` where `id`=$aid ";
$resss = mysqli_query($connection,$querys);
$ressss = mysqli_fetch_array($resss,MYSQLI_ASSOC);

// print_r($ressss);

?>


<div class="row">





<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
   Name
</div>
<div style="font-size:16px;"><?php echo $ressss['name'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>









<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
   PRN NO.
</div>
<div style="font-size:16px;"><?php echo $ressss['prn'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>









<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
  Mobile No.
</div>
<div style="font-size:16px;"><?php echo $ressss['phone'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>






<div class="col s12 l4 m6">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
  Email id.
</div>
<div style="font-size:16px;"><?php echo $ressss['email'] ?></div>
<p style="font-size:18px;"></p>
</div>

</div>












</div>












    <?php

}


include('../footer.php');
?>

