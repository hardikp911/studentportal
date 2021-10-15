
<?php include('../header.php'); 


?>

<?php

if(checkTeacher()){

    if(isset($_POST['submit'])){

        if(empty($_POST['link']) || empty($_POST['name'])){
            $err = 'Check Form';
        }else{
            $sent = "Successfully inserted";
        }
       
        $qrry = " SELECT id from subjects where teacher_id={$_SESSION['aid']}";
        $ress = mysqli_query($connection ,$qrry);   
        $idofsubject = mysqli_fetch_assoc($ress);
        $idofsubject =  $idofsubject['id'];




            $qry = "INSERT INTO lectures values (null,$idofsubject,'{$_POST['link']}','{$_POST['dlink']}','{$_POST['name']}');";
            $res = mysqli_query($connection ,$qry);   
    }

   
    ?>


<div class="err">
    <?= $err ?>
</div>



<div class="send">
    <?= $send ?>
</div>


<form action="" method="POST">


    <label for="name">Name of lecture</label>
    <input type="text" name="name">



    <label for="link">Link Of lecture</label>
    <input type="text" name="link">

    <label for="link">Download Link Of lecture</label>
    <input type="text" name="dlink">


    <input type="submit" name="submit" class="btn" value="add Lecture">
</form>


<?php
}

if(checkStudent()){
    ?>









    <?php

}


include('../footer.php');
?>

