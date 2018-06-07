<?php
include_once("connect.php");
include("lib.php");
?>

<!DOCTYPE html>
<html lang="en" class="fix-page videos-page videos-all-page">

<head>
    <?php getHead("Videók"); ?>
</head>

<body id="page-top" class="index">

<?php
// Load navbar
getNavBar();
getCounter();

?>
<!-- Title -->
<section id="videos-title" class="title">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 btn-group back-button">
                <a href="videok.php">
                    <button class="btn btn-default" aria-expanded="false" type="button">< Vissza a listához</button>
                </a>
            </div>
            <div class="col-lg-10 text-center">
                <h2>— Videók —</h2>
            </div>
        </div>
    </div>
</section>
<!-- -->
<?php
$videos = "";
$videosQuery = $mysqli->query("SELECT * FROM videos WHERE id = ". $_GET['id']);
while ($videosTemp = mysqli_fetch_array($videosQuery, MYSQLI_ASSOC)) {
    $videos = $videosTemp;
}
?>
<section class="fix-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><?php print $videos['title']; ?></h2>
                <div class="videos-date"><?php print date('Y.m.d.', strtotime($videos['date'])); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
        <?php  if ($videos['video']) { ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" src="<?php print str_replace("youtube.com/watch?v=", "youtube.com/embed/", $videos['video']); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="videos-body"><?php print $videos['body']; ?></div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php
getContactSection();
?>

</body>
</html>