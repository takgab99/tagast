<?php
include_once("connect.php");
include("lib.php");
?>

    <!DOCTYPE html>
<html lang="en" class="fix-page news-page news-all-page">

    <head>
        <?php getHead("Hírek"); ?>
    </head>

    <body id="page-top" class="index">

<?php
// Load navbar
getNavBar();
getCounter();

?>
<!-- Title -->
<section id="news-title" class="title">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 btn-group back-button">
                <a href="hirek.php">
                    <button class="btn btn-default" aria-expanded="false" type="button">< Vissza a listához</button>
                </a>
            </div>
            <div class="col-lg-10 text-center">
                <h2>— Hírek —</h2>
            </div>
        </div>
    </div>
</section>
<!-- -->
<?php
$news = "";
$newsQuery = $mysqli->query("SELECT * FROM news WHERE id = ". $_GET['id']);
while ($newsTemp = mysqli_fetch_array($newsQuery, MYSQLI_ASSOC)) {
    $news = $newsTemp;
}
?>
<section class="fix-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><?php print $news['title']; ?></h2>
                <div class="news-date"><?php print date('Y.m.d.', strtotime($news['date'])); ?></div>
            </div>
        </div>
        <?php  if ($news['image']) { ?>
        <img src="img/news/<?php print $news['image']; ?>" class="img-responsive" alt="Responsive image">
        <?php } ?>
        <div class="col-lg-12">
            <div class="news-body"><?php print $news['body']; ?></div>
        </div>
    </div>
    </div>
</section>


<?php
getContactSection();
?>

    </body>
</html>