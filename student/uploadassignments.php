
<?php include('../header.php'); 


if(checkStudent()){




if(isset($_POST['submit'])){
//       datatype = ['id'=>['int','phone','email','string','empty']]
    // name of the uploaded file
    if(!empty($_FILES['myfile']['name'])) {

        $filename = $_FILES['myfile']['name'];
//    print_r($HTTP_POST_FILES);

    // destination of the file on the server
    $destination = getcwd(). '/uploads/' . $filename;
//  echo $destination;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf'])) {
        $error[]  =  "You file extension must be .pdf";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        $error[]  =  "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $pdflink = 'superadmin/uploads/'.$filename;
//                echo "File uploaded successfully";
        } else {
            $error[]  =  "Failed To Upload, Try Again";
        }
    }
    }else{
        $pdflink = 'na';
    }

    if(!array_filter($error)) {
    $resultant = $handler->insert('teachers',
        ['id' => null, 'name' => $_POST['name'],'dept_id'=>$_POST['dept_id'], 'pdf_link' => $pdflink],
        ['name' => ['empty'], 'dept_id' => ['int','empty'],'pdf_link'=>['string','empty']]
    );

    if ($resultant === true) {
        echo '<script>location.replace("view_teacher.php")</script>';
//        echo $pdflink;
    } else {
        unlink('uploads/'.$filename);
        $error = $resultant;
    }
}

}




    ?>



<?php
}

if(checkTeacher()){
    ?>









    <?php

}


include('../footer.php');
?>

