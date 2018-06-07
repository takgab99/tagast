<?php
include_once("connect.php");
include("lib.php");
?>

<!DOCTYPE html>
<html lang="en" class="fix-page videos-page">

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
            <div class="col-lg-12 text-center">
                <h2>— Videók —</h2>
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
        $itemsPerPage = 10;
        $fromNo = ($pageNo-1) * $itemsPerPage;
        $toNo = $pageNo * $itemsPerPage;
        $result = $mysqli->query("SELECT * FROM videos");
        $numVideos = mysqli_num_rows($result);

//        getPager($pageNo, $itemsPerPage, $numVideos);

        $videosQuery = $mysqli->query("SELECT * FROM videos ORDER BY date DESC LIMIT $fromNo, $toNo");
        $numPageVideos = mysqli_num_rows($videosQuery);
        $actualVideosNum = 1;
        while ($videos = mysqli_fetch_array($videosQuery, MYSQLI_ASSOC)) {
            // If this is the last row on this page.
            if ($numPageVideos == $actualVideosNum) {
                $lastRowClass= " last";
            }
            $actualVideosNum++;
            ?>
            <div class="row videos-short-row<?php print $lastRowClass; ?>">
                <?php if ($videos['video']) {
                    $colVideoClass = "col-lg-7";
                    $colVideosClass = "col-lg-5";
                    ?>
                    <div class="<?php print $colVideoClass; ?> video-container">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="560" height="315" src="<?php print str_replace("youtube.com/watch?v=", "youtube.com/embed/", $videos['video']); ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <?php print $desc; ?>
                    </div>
                <?php
                }

                else {
                    $colVideosClass = "col-lg-12";

                }
                ?>
                <div class="<?php print $colVideosClass; ?>">
                    <h2><?php print $videos['title']; ?></h2>
                    <div class="videos-date"><?php print date('Y.m.d.', strtotime($videos['date'])); ?></div>
                    <div class="videos-short-body"><?php print trim_text($videos['body'], 350, $ellipses = true, $strip_html = true); ?>
                        <a href="video.php?id=<?php print $videos['id']; ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div>

        <?php
        }

//        getPager($pageNo, $itemsPerPage, $numVideos);
        ?>
    </div>
</section>

<?php
getContactSection();
?>

</body>
</html>