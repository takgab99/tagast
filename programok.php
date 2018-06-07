<?php
include_once("connect.php");
include("lib.php");
?>

<!DOCTYPE html>
<html lang="en" class="fix-page programs-page">

<head>
    <link href='js/jquery-ui-1.9.2/css/custom-theme/jquery-ui-1.9.2.custom.min.css' rel='stylesheet' type='text/css'>
    <?php getHead(); ?>
    <script src="js/programok.js"></script>
    <script src="js/jquery-ui-1.9.2/js/jquery-ui-1.9.2.custom.min.js"></script>
</head>

<style>
	.ui-accordion-content{
    height: auto !important;
	}
</style>

<body id="page-top" class="index">

<?php
// Load navbar
getNavBar();
getCounter();


$day_names = array();
$day_names[1] = "Szeptember 8. Péntek";
$day_names[2] = "Szeptember 9. Szombat";
$day_names[3] = "Szeptember 10. Vasárnap";
if (isset($_GET['nap'])) $actDay = $_GET['nap'];
else $actDay = 0;

?>
<!-- Title -->
<section id="programs-title" class="title">
	<div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Programok, helyszínek —</h2>
            </div>
        </div>
    </div>
</section>
<!-- -->

<section class="fix-section">
    <div class="container">
        <div class="row">
            <div class="submenu">
                <?php
                $activeMenu = array('', '' ,'' ,'');
                $activeMenu[$actDay] = 'active';
                ?>
                <div class="submenu-item <?php print $activeMenu[0]; ?>"><a href="programok.php">TELJES PROGRAM</a></div>
                <div class="submenu-item <?php print $activeMenu[1]; ?>"><a href="?nap=1">PÉNTEK/08</a></div>
                <div class="submenu-item <?php print $activeMenu[2]; ?>"><a href="?nap=2">SZOMBAT/09</a></div>
                <div class="submenu-item <?php print $activeMenu[3]; ?>"><a href="?nap=3">VASÁRNAP/10</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">


<?php

if (!isset($_GET['nap'])) {
    include("programok_teljes.php");
}
else {
    include("programok_pentek.php");
}
?>



            </div>
        </div>

        <div class="row">
            <div class="page-scroll text-center link-to-top">
                <a href="#page-top">vissza az oldal tetejére</a>
            </div>
        </div>
    </div>
</section>


<div id="go-top"><a href="#top">Tetejére <span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></a></div>

<?php
getContactSection();
?>

</body>
</html>

