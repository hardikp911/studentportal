




<?php include('../header.php'); 


if(checkStudent()){
    ?>



<?php
}

if(checkTeacher()){
    
if(isset($_POST['sumbitDrop'])){
    $date = $_POST['date'];
    $date = date($date);    


    $querys = "DELETE FROM `attendence`  where date='$date' and teacher_id={$_SESSION['aid']}";
    $resss = mysqli_query($connection, $querys);


                                //remove unwanted ids 
                                $queryass = "  ALTER TABLE `attendence` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;";
                                $asasasa = mysqli_query($connection, $queryass);

    if($resss){
        echo "<script> location.replace('attendence.php');</script>";

    }


//lectecture 
}


    ?>









    <?php

}


include('../footer.php');
?>
