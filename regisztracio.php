<?php
include_once("connect.php");
include("lib.php");
?>

<!DOCTYPE html>
<html lang="en" class="fix-page registration-page">

<head>
    <link href='js/jquery-ui-1.9.2/css/custom-theme/jquery-ui-1.9.2.custom.min.css' rel='stylesheet' type='text/css'>
    <?php getHead(); ?>
    <!--<script src="js/programok.js"></script>-->
    <script src="js/jquery-ui-1.9.2/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/regisztracio.js"></script>
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

?>
<!-- Title -->
<section id="registration-title" class="title">
	<div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Regisztráció —</h2>
            </div>
        </div>
    </div>
</section>
<!-- -->

<?php
$ticket_id = isset($_POST['ticket-pre-register']) ? $_POST['ticket-pre-register'] : '';
?>
<section class="fix-section">
    <div class="container">
        <div id="register-success"></div>
        <div class="row">
            <form id="register-form">
                <div class="form-group">
                    <label for="ticket-register-id">Jegyen szereplő kód:</label>
                    <input type="text" class="form-control ticket-id-lg" id="ticket-register-id" value="<?php print $ticket_id; ?>">
                    <label for="ticket-register-name">Nevem</label>
                    <input type="text" class="form-control ticket-id-lg" id="ticket-register-name" placeholder="pl. Kiss Aladár">
                    <p class="help-block text-danger"></p>
                    <label for="ticket-register-city">Honnan jöttem</label>
                    <input type="text" class="form-control ticket-id-lg" id="ticket-register-city" placeholder="pl. Kiskunfélegyháza">
                    <label for="ticket-register-community">Közösségem</label>
                    <input type="text" class="form-control ticket-id-lg" id="ticket-register-community" placeholder="pl. Szegedi Református Egyetemi Gyülekezet">
                    <label for="sel1">Választott délutáni szeminárium</label><br>
                    <label for="sel1">1. szemináriumi blokk (13:30-15:00)</label>
                    <select class="form-control" id="ticket-register-first-seminar">
                        <option value="laszlo">Dicsőítés: László Viktor (a dicsőítő szolgálat perspektívái)</option>
                        <option value="matt">Evangelizáció: Matt Edwards (kihívások az evangelizációban)</option>
                        <option value="puski">Gyülekezetalapítás és közösségszervezés: Püski Dániel (nemzetközi impulzusok)</option>
                        <option value="gal">Szeretetszolgálat: Gál Dávid (globális távlatok)</option>
                    </select>
                    <label for="sel1">2. szemináriumi blokk (15:30-17:00)</label>
                    <select class="form-control" id="ticket-register-second-seminar">
                        <option value="dobner">Dicsőítés: Dobner Illés és Éva (dicsőítés a helyi közösségben)</option>
                        <option value="matt">Evangelizáció: Matt Edwards (egyéni evangelizáció)</option>
                        <option value="sipos">Gyülekezetalapítás és közösségszervezés: Sipos Márk (helyi dimenziók)</option>
                        <option value="botar">Szeretetszolgálat: Botár Balázs (helyi kezdeményezések)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Jóváhagy</button>
            </form>
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

