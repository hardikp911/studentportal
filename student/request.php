
<?php include('../header.php'); 


?>
<style>
textarea.materialize-textarea {
    background-color: antiquewhite;
}
</style>
<?php

if(checkStudent()){

    if(isset($_POST['submit'])){
        $date = date('Y-m-d');

        $qrry = " SELECT * from notes where s_id={$_SESSION['aid']} and date='$date' ";
        $ress = mysqli_query($connection ,$qrry);   
        $count = mysqli_num_rows($ress);




        if($count < 2){
            $qry = "INSERT INTO notes values (null,'{$_POST['note']}','$date',{$_SESSION['aid']});";
            $res = mysqli_query($connection ,$qry);   
        // echo $qry;
        $send = "SucessFullY Inserted";

        }else{
            $err = "Maximum Limit Reached";
        }



    }
    ?>


<div class="err">
    <?= $err ?>
</div>



<div class="send">
    <?= $send ?>
</div>


<form action="" method="POST">
    <label for="note">Add Note</label>
    <textarea name="note" style="height: 400px;" class="materialize-textarea" style="padding:20px">

    </textarea>

    <input type="submit" name="submit" class="btn" value="add note for teachers">
</form>


<?php
}

if(checkTeacher()){
    ?>









    <?php

}


include('../footer.php');
?>

