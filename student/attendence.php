<?php include('../header.php'); 


if(checkStudent()){
    ?>




<table>
        <thead>
          <tr>
              <th>Name</th>
              <th>PRN NO</th>
              <th>Date</th>
              <th>Subjects</th>
              <th>No. of Lec.</th>
              <th>A/P</th>
          </tr>
        </thead>

        <tbody>


        <?php 



$aid = $_SESSION['aid'];



$query = "SELECT * FROM `attendence` where student_id=$aid ";
$res = mysqli_query($connection,$query);
$ress = mysqli_fetch_array($res,MYSQLI_ASSOC);



$querys = "SELECT * FROM `user` where `id`=$aid ";
$resss = mysqli_query($connection,$querys);
$ressss = mysqli_fetch_array($resss,MYSQLI_ASSOC);

// print_r($ressss);



        foreach($ress as $a){





        ?>





          <tr>


          <td><?php echo $ressss['name'];?></td>
          <td><?php echo $ressss['pnr'];?></td>




          </tr>





          <?php 
        }
        ?>


        </tbody>
      </table>
            



<?php
}

if(checkTeacher()){
    ?>









    <?php

}


include('../footer.php');
?>

