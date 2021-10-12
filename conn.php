<?php
error_reporting(0);
   $host = 'localhost';
   $dbname = 'student_portal';
   $dbpassword = '';
   $dbuser = 'root';

    $connection = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

    // Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " + mysqli_connect_error();
    exit();
}
else {
    //  echo 'successfull';
}
?>