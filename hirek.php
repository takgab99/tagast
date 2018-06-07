<?php
include_once("connect.php");
include("lib.php");
?>

<!DOCTYPE html>
<html lang="en" class="fix-page news-page">

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
                <div class="col-lg-12 text-center">
                    <h2>— Hírek —</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="fix-section">
        <div class="container">
<!-- -->
<?php
if (isset($_GET['page'])) {
    $pageNo = $_GET['page'];
}
else {
    $pageNo = 1;
}
$itemsPerPage = 3;
$fromNo = ($pageNo-1) * $itemsPerPage;
$toNo = $pageNo * $itemsPerPage;
$result = $mysqli->query("SELECT * FROM news");
$numNews = mysqli_num_rows($result);

getPager($pageNo, $itemsPerPage, $numNews);

$newsQuery = $mysqli->query("SELECT * FROM news ORDER BY date DESC LIMIT $fromNo, $toNo");
$numPageNews = mysqli_num_rows($newsQuery);
$actualNewsNum = 1;
$lastRowClass = '';
while ($news = mysqli_fetch_array($newsQuery, MYSQLI_ASSOC)) {
    // If this is the last row on this page.
    if ($numPageNews == $actualNewsNum) {
        $lastRowClass= " last";
    }
    $actualNewsNum++;
    ?>
            <div class="row news-short-row<?php print $lastRowClass; ?>">
                <?php if ($news['image']) {
                    $colImgClass = "col-lg-3";
                    $colnewsClass = "col-lg-9";
                    ?>
                    <div class="<?php print $colImgClass; ?>">
                        <img src="img/news/<?php print $news['image']; ?>" class="img-responsive news-short-image" alt="Responsive image">
<!--                        --><?php //print $desc; ?>
                    </div>
                <?php
                }

                else {
                    $colnewsClass = "col-lg-12";

                }
                ?>
                <div class="<?php print $colnewsClass; ?>">
                    <h2><?php print $news['title']; ?></h2>
                    <div class="news-date"><?php print date('Y.m.d.', strtotime($news['date'])); ?></div>
                    <div class="news-short-body"><?php print trim_text($news['body'], 350, $ellipses = true, $strip_html = false); ?>
                    <a href="hir.php?id=<?php print $news['id']; ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div>

            <?php
}

getPager($pageNo, $itemsPerPage, $numNews);
?>
        </div>
    </section>


<?php
getContactSection();
?>


</body>
</html>