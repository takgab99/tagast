<?php
include_once("connect.php");
include("lib.php");
?>

    <!DOCTYPE html>
<html lang="en" class="fix-page about-page">

    <head>
        <?php getHead("Rólunk"); ?>
    </head>

    <body id="page-top" class="index">

<?php
// Load navbar
getNavBar();
getCounter();

?>

    <!-- Title -->
    <section id="about-title" class="title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>— Rólunk —</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- -->
<?php
$abouts = $mysqli->query("SELECT * FROM about");
while ($about = mysqli_fetch_array($abouts, MYSQLI_ASSOC)) {
    $desc = $about['description'];
}
?>
<section class="fix-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php print $desc; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">
            <div class="btn-group">
                <a href="programok.php">
                    <button class="btn btn-sm programs-button" type="button" aria-expanded="false" style="cursor: none">
                        Részletes programtáblázat >
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>


<?php
getContactSection();
?>

    </body>
</html>