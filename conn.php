<?php
error_reporting(0);
   $host = 'anqe8cs5ccj9.ap-south-2.psdb.cloud';
   $dbname = 'student_database';
   $dbpassword = 'pscale_pw_UG9qS4r0i3ueFVou8QkfCRZajenztwNDiDB8dUdQPF0';
   $dbuser = '99lmdzna9tlr';
  
  $connection = mysqli_init();
  $connection->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
  $connection->real_connect($host,$dbuser,$dbpassword,$dbname);
//   $connection->close();

   
    // Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " + mysqli_connect_error();
    exit();
}
else {
    //  echo 'successfull';
}
?>
