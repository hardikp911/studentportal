<?php
error_reporting(1);
$host = 'ypty5a7p9v40.us-east-1.psdb.cloud';
   $dbname = 'somegumtank';
   $dbpassword = 'pscale_pw_3JfhnMKhW8kqcul9NgvHL5NQ4Dne7dhPdYG5WsrKwmc';
   $dbuser = 'prukj4mw7ohw';


  $connection = mysqli_init();
  $connection->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
  $connection->real_connect($host,$dbuser,$dbpassword,$dbname);
//   $connection->close();

   
    // Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
else {
   //   echo 'successfull';
}
?>
