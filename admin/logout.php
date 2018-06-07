<?php
include("lib.php");
unset($_SESSION['tagasOkumene_lastAccess']);
unset($_SESSION['tagasOkumene']);

header('Location: index.php');
die();
?>
