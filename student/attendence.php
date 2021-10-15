<?php include('../header.php'); 


if(checkStudent()){
    ?>



<style>
  td{
    font-weight: 600;
  }

  th{
    font-size: large;
  }
</style>


<table>
        <thead>
          <tr>
              <th>Subjects</th>
              <th>No. of Lec.</th>
              <th>PRESENT</th>
              <th>PRESENT %</th>
          </tr>
        </thead>

        <tbody>


        <?php 



$aid = $_SESSION['aid'];



$query = "SELECT * FROM `subjects`";
$res = mysqli_query($connection,$query);
$ress = mysqli_fetch_all($res,MYSQLI_ASSOC);



// $querys = "SELECT * FROM `user` where `id`=$aid ";
// $resss = mysqli_query($connection,$querys);
// $ressss = mysqli_fetch_array($resss,MYSQLI_ASSOC);

// print_r($ress);




$percentages = 0;

foreach($ress as $a){
          // Current timestamp is assumed, so these find first and last day of THIS month
          $first_day_this_month = date('Y-m-01'); // hard-coded '01' for first dayd
          $last_day_this_month  = date('Y-m-t');
          
          
          $qry = "SELECT * from attendence where student_id={$_SESSION['aid']} and ap = 'p' and teacher_id={$a['teacher_id']} and date between '$first_day_this_month' and '$last_day_this_month' ";
          $asset = mysqli_query($connection,$qry);
          $assets = mysqli_fetch_all($asset,MYSQLI_ASSOC);
          $count = mysqli_num_rows($asset);

         $percentages =  $percentages + $count*100/25 ;



        ?>






  <tr>
    
    
    <td><?= $a['name'];?></td>
    <td><?= 25;?></td>

    <td><?= $count?></td>
    <td><?= $count*4 ?>%</td>
    
    
    
    
  </tr>
  




          <?php 
        }

        // $avg_percent = $percentages / 5;



        ?>


        </tbody>
      </table>
            
      <H4>
        <!-- AVERAGE PRESENT OF ALL SUBJECTS : <?= $avg_percent ?> % -->

      </H4>



<?php
}

if(checkTeacher()){
    ?>









    <?php

}


include('../footer.php');
?>

