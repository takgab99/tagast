<?php
include("lib.php");
checkLogin();


$method = $_SERVER['REQUEST_METHOD'];

if ($_SERVER['HTTP_HOST'] == "localhost") {
    $link = mysql_connect("localhost", "root", "qwe123");
}
else {
    $link = mysql_connect("localhost", "tagaster_admin", "T4gast3r!");
}

if($method == 'POST') {
    $action = $_POST['action'];
    if($action == 'delete') {
        delete_category($_POST['category'], $link);
    }
    if($action == 'create') {
        create_category($_POST['category'], $link);
    }

}

function delete_category($id, $link) {
    $images = $images = mysql_query("SELECT * FROM tagaster_data.gallery_images WHERE category_id = ".$id, $link);
    while ($image = mysql_fetch_array($images, MYSQL_ASSOC)) {
        unlink("../gallery/" . $image['name']);
        unlink("../gallery/thumbnail/" . $image['name']);
    }
    mysql_query("DELETE FROM tagaster_data.gallery_images WHERE category_id =".$id, $link);
    mysql_query("DELETE FROM tagaster_data.gallery_category WHERE id =".$id, $link);
}

function create_category($name, $link) {
    $result = mysql_query("SELECT weight FROM tagaster_data.gallery_category ORDER BY weight LIMIT 0,1", $link);
    if (mysql_num_rows($result)==0){
        $weight = 1;
    } else {
        $weight = mysql_result($result, 0);
    }
    mysql_query("INSERT INTO tagaster_data.gallery_category (name, weight) VALUES ('".$name."', ".$weight.")", $link);
}

?>

<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<?php
getHead();
?>
<body>
<?php
getNavbar();
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel gallery">
            <div class="panel-heading">
                <div class="row">
                    <h2> Galéria</h2>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <h3>Album létrehozása</h3>

                    <form action="gallery.php" method="POST">
                        <input name="category" placeholder="Kategória neve" type="text">
                        <input type="hidden" name="action" value="create" />
                        <button type="submit">Létrehozás</button>
                    </form>
                </div>
                <div class="row list-group">
                    <h3>Albumok</h3>
                    <?php
                    $categories = mysql_query("SELECT * FROM tagaster_data.gallery_category ORDER BY weight ASC", $link);
                    while ($category = mysql_fetch_array($categories, MYSQL_ASSOC)) {
                        ?>
                        <div class="list-group-item">
                            <?php
                            $image = mysql_query("SELECT * FROM tagaster_data.gallery_images WHERE category_id = ".$category['id']." ORDER BY weight ASC LIMIT 0, 1", $link);
                            $row = mysql_fetch_assoc($image);
                            if($row['name'] == null) {
                                $row['name'] = '../gallery/no-image.png';
                            } else {
                                $row['name'] = '../gallery/' . $row['name'];
                            }
                            ?>
                            <div class="img" style="background-image:url(<?php print $row['name']; ?>)"></div>
                            <h2><?php print $category['name']; ?></h2>
                            <form action="gallery.php" method="POST">
                                <input type="hidden" name="action" value="delete" />
                                <input type="hidden" name="category" value="<?php print $category['id']; ?>" />
                                <button type="submit" class="btn btn-warning">Törlés</button>
                            </form>
                            <form action="galleryimages.php" method="POST">
                                <input type="hidden" name="category" value="<?php print $category['id']; ?>" />
                                <button class="btn btn-primary" type="submit">Album szerkesztése</button>
                            </form>
                            <div class="clearer"></div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>