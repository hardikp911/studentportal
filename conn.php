<?php
error_reporting(0);
 $host = 'ypty5a7p9v40.us-east-1.psdb.cloud';
   $dbname = 'somegumtank';
   $dbpassword = 'pscale_pw_sq5Hx2_aUU9-qVtM1ilsyXGGIlxAWmwIyElFx3dFi4Q';
   $dbuser = 'oqqy0onp3adc';


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
