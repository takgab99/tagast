<?php
include("lib.php");
include("smart_resize_image.function.php");
checkLogin();


$method = $_SERVER['REQUEST_METHOD'];
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $link = mysql_connect("localhost", "root", "qwe123");
}
else {
    $link = mysql_connect("localhost", "tagaster_admin", "T4gast3r!");
}

if($method == 'POST') {
    if(isset($_POST['action']) ) {
        if($_POST['action'] == 'upload') {
            uploadImages($_POST['category'], $link);
        }
        if($_POST['action'] == 'delete') {
            delete_image($_POST['image'], $link);
        }
    }
}

function uploadImages($category, $link) {
    //Loop through each file
    for($i=0; $i<count($_FILES['upload']['name']); $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        //Make sure we have a filepath
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = "../gallery/" . str_replace(' ', '_', $_FILES['upload']['name'][$i]);
            $newFileName = str_replace(' ', '_', $_FILES['upload']['name'][$i]);
            if(file_exists($newFilePath)) {
                $newFileName =  date("m_d_G_i_s") . str_replace(' ', '_', $_FILES['upload']['name'][$i]);
                $newFilePath = "../gallery/" . $newFileName;
            }


            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $result = mysql_query("SELECT weight FROM tagaster_data.gallery_images ORDER BY weight LIMIT 0,1", $link);
                if (mysql_num_rows($result)==0){
                    $weight = 1;
                } else {
                    $weight = mysql_result($result, 0);
                }
                $weight ++;
                mysql_query("INSERT INTO tagaster_data.gallery_images (name, category_id, weight) VALUES ('" . $newFileName . "', " . $category . ", " . $weight . ")", $link);

                $size = getimagesize($newFilePath);
                if($size[0] > 1200 || $size[1] > 1200 ) {
                    smart_resize_image($newFilePath , null, 1200 , 1200 , true , $newFilePath , false , false ,100 );
                }

                $newThumbnailPath = "../gallery/thumbnail/" . $newFileName;
                smart_resize_image($newFilePath , null, 150 , 150 , true , $newThumbnailPath , false , false ,100 );
            }
        }
    }
}

function delete_image($id, $link) {
    $image = mysql_query("SELECT * FROM tagaster_data.gallery_images WHERE id = ".$id." LIMIT 0, 1", $link);
    $row = mysql_fetch_assoc($image);
    unlink('../gallery/'.$row['name']);
    unlink('../gallery/thumbnail/'.$row['name']);
    mysql_query("DELETE FROM tagaster_data.gallery_images WHERE id =".$id, $link);
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
<?php
if(isset($_POST['action']) ) {
    if ($_POST['action'] == 'update') {
        ?>
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            Kép aláírás sikeresen frissítve!
        </div>
    <?php
    }
    ?>
    <?php
    if ($_POST['action'] == 'delete') {
        ?>
        <div class="alert alert-warning" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            A Kép törlésre kerültek!
        </div>
    <?php
    }
    ?>
    <?php
    if ($_POST['action'] == 'upload') {
        ?>
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            Sikeres képfeltöltés!
        </div>
    <?php
    }
}
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel gallery">
            <div class="panel-heading">
                <div class="row">
                    <?php
                    $image = mysql_query("SELECT * FROM tagaster_data.gallery_category WHERE id = ".$_POST['category']." LIMIT 0, 1", $link);
                    $row = mysql_fetch_assoc($image);
                    ?>
                    <h1><?PHP print $row['name']; ?> - Kategória képek</h1>
                </div>
            </div>
            <div class="panel-body">
                <div class="list-group images-holder">
                    <?php
                    $images = mysql_query("SELECT * FROM tagaster_data.gallery_images WHERE category_id = ".$_POST['category']." ORDER BY weight ASC", $link);
                    while ($image = mysql_fetch_array($images, MYSQL_ASSOC)) {
                        ?>
                    <div class="list-group-item col-md-3" id="<?php print $image['id']; ?>">
                        <div class="img" style="background-image:url(<?php print '../gallery/thumbnail/' . $image['name']?>);"></div>
                        <h4><?php print $image['name']; ?></h4>


                        <div class="row description">
                            <div class="row">
                                <textarea name="description" placeholder="Kép leírás hozzáadása"><?php print $image['description']; ?></textarea>
                            </div>
                            <div class="row">
                                <button data-image="<?php print $image['id']; ?>" type="submit" class="btn btn-primary">Kép aláírás módosítása</button>
                            </div>
                        </div>

                        <form action="galleryimages.php" method="POST" class="update-description">
                            <input type="hidden" name="action" value="delete" />
                            <input type="hidden" value="<?php print $_POST['category']; ?>" name="category">
                            <input type="hidden" name="image" value="<?php print $image['id']; ?>" />
                            <button type="submit" class="btn btn-warning">Törlés</button>
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="panel-footer">
                <h3>Képek sorrendje:</h3>
                <h5>Ha módosítva lett a sorrend nyomd meg a mentés gombot!</h5>
                <h5 style="color:red;">Maximum fájlméret <?php print ini_get('upload_max_filesize'); ?>!</h5>
                <h5 style="color:red;">Egyszerre feltölthető maxiumális méret <?php print ini_get('post_max_size'); ?> !</h5>
                <button class="btn btn-primary" id="save-image-sequence">Mentés</button>
                <form action="galleryimages.php" method="POST" enctype="multipart/form-data">
                    <h3>Képek feltöltése:</h3>
                    <input type="hidden" value="<?php print $_POST['category']; ?>" name="category">
                    <input type="hidden" value="upload" name="action">
                    <input name="upload[]" type="file" multiple="multiple" />
                    <input type="submit" class="btn btn-primary" value="Képek feltöltése" />
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>