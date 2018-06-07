<?PHP
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $link = mysqli_connect("localhost", "root", "qwe123");
}
else {
    $link = mysqli_connect("localhost", "tagaster_admin", "T4gast3r!");
}
$result = $mysqli->query("SELECT * FROM tagaster_data.gallery_images WHERE category_id = ".$_POST['category']." ORDER BY weight ASC", $link);
$rows = array();
header('Content-Type: application/json');
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);