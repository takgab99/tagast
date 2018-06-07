<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $link = mysql_connect("localhost", "root", "qwe123");
}
else {
    $link = mysql_connect("localhost", "tagaster_admin", "T4gast3r!");
}

header('Content-Type: application/json');
if( $_POST['action'] == 'sequence') {
    changeSequence(json_decode($_POST['idsort']), $link);
}
if( $_POST['action'] == 'description-update') {
    update_description($_POST['image'], $_POST['description'], $link);
}

function update_description($image, $description, $link) {
    $mysqli->query("UPDATE tagaster_data.gallery_images SET description = '". $description . "' WHERE id =". $image, $link);
}

function changeSequence ($array, $link) {
    $count = 0;
    foreach($array as $item) {
        $count++;
        $mysqli->query("UPDATE tagaster_data.gallery_images SET weight = '". $count . "' WHERE id =". $item, $link);
    }
}
