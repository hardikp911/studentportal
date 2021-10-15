<?php include('../header.php');


if (checkStudent()) {
    if (isset($_GET['sub_id'])) {





?>

        <?php
        if (isset($_POST['lec'])) {

            $selected_lec = mysqli_real_escape_string($connection, $_POST['lec']);
            $sql_new = "SELECT * FROM `lectures` WHERE `id`='$selected_lec' ";
            $result_new = mysqli_query($connection, $sql_new); ?>




        <?php
            $row_new = mysqli_fetch_assoc($result_new);
        }
        ?>






        <form class="white" style="padding: 20px;margin: 10px auto;max-width: 700px" action="" method="POST" id="myForm">
            <h4 class="center">Select a Lecture</h4>




            <select class="initialized" type="text" name="lec" onchange="this.form.submit()" style="margin-bottom:20px;display: block;">
                <option value="" disabled selected> ...Select Lecture... </option>
                <?php

                $query = "SELECT * FROM `lectures` where s_id={$_GET['sub_id']} ";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>





                        <option value='<?= $row["id"] ?>' <?php if ($row['id'] == $row_new['id']) {
                                                                echo 'selected="selected"';
                                                            } ?>><?php echo htmlspecialchars($row['name']); ?></option>





                    <?php
                    }
                    ?>
            </select>




        </form>


    <?php
                } else {
                    echo '<div class="container">' . "<h6> 0 records" . '</div>';
                }

    ?>




    <?php if (isset($row_new)) :

            if (strpos($row_new['link'], 'youtube') !== false) {
                $video_id = explode("?v=", $row_new['link']);
                $video_id = $video_id[1];
                $final_lnk = "https://www.youtube.com/embed/" . $video_id;

    ?>

            <iframe width="100%" height="600px" src="<?=$final_lnk ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


        <?php
            } else {
        ?>


            <div class='video'>
                <script type="text/javascript" src="https://content.jwplatform.com/libraries/LJ361JYj.js"></script>
                <script type="text/javascript">
                    jwplayer.key = 'ypdL3Acgwp4Uh2/LDE9dYh3W/EPwDMuA2yid4ytssfI=';
                </script>
                <div id="myElement"></div>
                <script type="text/javascript">
                    jwplayer("myElement").setup({
                        aspectratio: "16:9",
                        width: '100%',
                        aspectratio: '16:9',
                        autostart: false,
                        file: '<?= $row_new['link'] ?>',
                        abouttext: 'Portal',
                        controls: true,
                        logo: {
                            "file": "<?= $currentURL ?>/res/logo.png",
                            "hide": true,
                            "margin": "10",
                            "position": "control-bar"
                        },

                    });
                </script>
            </div>

            <?php if (!empty($row_new['d_link'])) { ?>
                <a href="<?= $row_new['d_link'] ?>" class="btn">Download This Lecture</a>

            <?php } ?>
    <?php }
        endif; ?>








<?php
    }
}

if (checkTeacher()) {
?>









<?php
}

include('../footer.php');
?>