<?php
$servername = "localhost";
if ($_SERVER[HTTP_HOST] == "localhost") {
    $username = "root";  // tagaster_admin / root
    $password = "qwe123";  // T4gast3r! / qwe123
    $database = "tagaster_data";
}
else {
    $username = "tagaster_admin";  // tagaster_admin / root
    $password = "T4gast3r!";  // T4gast3r! / qwe123
    $database = "tagaster_data";
}

$conn = mysql_connect($servername, $username,$password) or die("HIBA");
mysql_set_charset('utf8',$conn);
if (!mysql_select_db($database, $conn)) { // tagaster_data / tagaster
    echo 'Could not select database.....' . mysql_error();
    exit;
}
//echo "Connected successfully";
?>
