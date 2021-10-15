
<?php include('../header.php'); 


if(checkStudent()){
    ?>



<?php
}



if(checkTeacher()){


if(isset($_POST['deleteTheNote'])){
    $quserys = "delete FROM `notes` where id = {$_POST['idofnote']}";
$as = mysqli_query($connection,$quserys);
}

$querys = "SELECT * FROM `notes`";
$resss = mysqli_query($connection,$querys);
$ressss = mysqli_fetch_all($resss,MYSQLI_ASSOC);

// print_r($ressss);

?>


<div class="row">



<?php foreach($ressss as $a) { ?>

<div class="col s12 l12 m12">
 <div style="margin:10px; padding:10px; " class="card white lighten-1 neu saveHistory">

<div style="font-size:20px;color:blue">
   Note - <?= $a["notes"] ?>
</div>
<div style="font-size:16px;">Date - <?= $a["date"] ?></div>
<p style="font-size:18px;"></p>
<form action="" method="POST">
    <input style="float:right" type="submit" name="deleteTheNote" value="Delete Note" class="btn" >
    <input type="text" name="idofnote" value="<?= $a["id"]?>" style="display:none">
</form>
</div>





</div>



</div>











    <?php
}
}


include('../footer.php');
?>

