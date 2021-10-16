<?php include('../header.php');




$querys = "SELECT * FROM `subjects` where `teacher_id`='{$_SESSION['aid']}'";
$www = mysqli_query($connection, $querys);
$subjecT = mysqli_fetch_assoc($www);







if (isset($_POST['studentID']) && isset($_POST['date'])  && isset($_POST['ap']) && isset($_POST['teacher_id'])) {
    $querys = "UPDATE `attendence` SET `ap` = '{$_POST['ap']}' , teacher_id = {$_POST['teacher_id']} WHERE `attendence`.`student_id` = {$_POST['studentID']} and `attendence`.`date` = '{$_POST['date']}' ";
    $resss = mysqli_query($connection, $querys);
    echo $querys;
}

if (isset($_POST['sumbitDate'])) {
    $date = $_POST['date'];
    $date = date($date);



    //lectecture 
}







if (checkTeacher()) {
?>


    <h3 class="center">
        Subject - <?= $subjecT['name'] ?>
        <br>
        No of Lectures In Month = 25
    </h3>

    <div class="container row grey lighten-3 " style="padding: 20px;padding-right:100px">

        <form action="" method="POST">



            <div class="col l3">
                <label for="date"> Date </label>
                <input name="date" type="date" value="<?= $date ?    $date :   date('Y-m-d'); ?>">
            </div>



            <!-- <div class="col l3">
                <label for="nooflec">No of Lectures </label>
                <input type="number" name="nooflec">
            </div> -->


            <div class="col l3">
                <input type="submit" name="sumbitDate" value="sumbit" class="btn">

            </div>


        </form>

        <div class="col l3">
            <form action="<?= $currentURL ?>/teacher/attendencedrop.php" method="POST">
                <input name="date" type="date" value="<?= $date ?    $date :   date('Y-m-d'); ?>" style="display:none;">

                <input type="submit" name="sumbitDrop" value="Drop Selected Date Attendence" class="btn">
            </form>

        </div>

    </div>


    <table style="margin: 60px !important;">
        <thead>
            <tr>
                <th>Name</th>
                <th>PRN NO</th>
                <th>A/P</th>
            </tr>
        </thead>

        <tbody>





            <?php

            $querys = "SELECT * FROM `user` where `type`='s' order by id asc";
            $resss = mysqli_query($connection, $querys);

            $STUDENTS = mysqli_fetch_all($resss, MYSQLI_ASSOC);

            // print_r($STUDENTS);



            foreach ($STUDENTS as $s) { ?>



                <tr>

                    <td>
                        <?= $s["name"]  ?>
                    </td>


                    <td>
                        <?= $s["prn"]  ?>
                    </td>

                    <td>
                        <?php


                        $today =   $date ?    $date :   date('Y-m-d');
                        //  echo $today;


                        $querys = "SELECT * FROM `attendence` where `date`='$today' and student_id={$s['id']} and teacher_id={$_SESSION['aid']}";
                        $resss = mysqli_query($connection, $querys);
                        $res = mysqli_fetch_assoc($resss);


                        if (empty($res)) {

                            $querys = "INSERT into `attendence`(ap,date,student_id,teacher_id) values('p' , '$today' , {$s["id"]},{$_SESSION['aid']}) ";
                            $resss = mysqli_query($connection, $querys);



                            //remove unwanted ids 
                            $queryass = "  ALTER TABLE `attendence` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0; ";
                            $asasasa = mysqli_query($connection, $queryass);
                        }




                        ?>
                        <?php
                        $ap =  $res["ap"] ? $res["ap"] : 'p';
                        $html = '';

                        $s_id = $s["id"];
                        if ($ap == 'p') {
                            $html = '<button id="ap' . $s_id . '" class="apHandler waves-effect waves-light btn">PRESENT</button>';
                        } else {
                            $html = '<button id="ap' . $s_id . '"  class="apHandler red waves-effect waves-light btn">ABSENT</button>';
                        }


                        ?>

                        <?= $html ?>
                    </td>

                </tr>

            <?php } ?>




        </tbody>

    </table>






<?php

}


include('../footer.php');
?>


<script>
    $(".apHandler").on('click', function(event) {

        if ($(this).text() == 'PRESENT') {
            $(this).text('ABSENT');
            $(this).attr('class', 'apHandler red waves-effect waves-light btn');
            var ap = 'a';
        } else if ($(this).text() == 'ABSENT') {
            $(this).text('PRESENT');
            $(this).attr('class', 'apHandler waves-effect waves-light btn');
            var ap = 'p';
        }

        var sid = parseInt($(this).attr('id').substring(2));

        // console.log(sid);


        $.ajax({
            url: '<?= $currentURL ?>/teacher/attendence.php',
            method: 'POST',
            dataType: 'text',
            data: {
                studentID: sid,
                date: '<?= $date ?    $date :   date('Y-m-d'); ?>',
                ap: ap,
                teacher_id: <?= $_SESSION["aid"] ?>
            },
            success: function(response) {
                console.log(response);
            }
        });
    });
</script>