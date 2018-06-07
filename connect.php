<?php
$servername = "localhost";
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $username = "root";  // tagaster_admin / root
    $password = "qwe123";  // T4gast3r! / qwe123
    $database = "tagaster2017";
}
else {
    $username = "tagaster_admin";  // tagaster_admin / root
    $password = "T4gast3r!";  // T4gast3r! / qwe123
    $database = "tagaster_data";
}

//$conn = mysqli_connect($servername, $username,$password,$database) or die("HIBA");
$mysqli = new mysqli($servername, $username,$password,$database);
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}
mysqli_set_charset($mysqli, 'utf8');
//if (!mysql_select_db($database, $conn)) { // tagaster_data / tagaster
//    echo 'Could not select database.....' . mysql_error();
//    exit;
//}
//echo "Connected successfully";
?>
