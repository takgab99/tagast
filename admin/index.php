<?php
include("lib.php");
checkLogin("frontpage");

$error = 0;
$name = '';
$pass = '';
// Check if the login was correct.
if (isset($_POST['name']) && isset($_POST['pass'])) {
    if ($_POST['name'] == "admin" && $_POST['pass'] == "b4b4szoba") {
        $_SESSION['tagasOkumene'] = 1;
        $_SESSION['tagasOkumene_lastAccess'] = time();
        header('Location: manage.php');
        die();
    }
    else {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $error = 1;
    }
}
else {
}
?><html>
<?php
getHead();
?>

<body>

    <h2 class="text-center">Belépés az admin felületre</h2>
    <?php if ($error) {
            ?>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                Hibás bejelentkezési adatok!
            </div>
        </div>
    </div>
    <?php
}
?>
    <form action="index.php" method="POST" class="col-md-12">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="input-group input-group-xs">
                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                    <input name="name" type="text" class="form-control" placeholder="Név" aria-describedby="sizing-addon1" value="<?php print $name; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="input-group input-group-md">
                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
                    <input name="pass" type="password" class="form-control" placeholder="Jelszó" aria-describedby="sizing-addon1" value="<?php print $pass; ?>">
                </div>
            </div>
        </div>
        <div class="row text-center">
            <button type="submit" class="btn btn-default btn-md">
                Belépés
            </button>
        </div>
    </form>

</body>
</html>