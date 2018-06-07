<?php
session_start();

function checkLogin($frontPage = 0) {
    if (isset($_SESSION['tagasOkumene_lastAccess'])) {
        // If the login was more than 1 hour.
        if (time() - $_SESSION['tagasOkumene_lastAccess'] > 3000) {
            unset($_SESSION['tagasOkumene_lastAccess']);
            unset($_SESSION['tagasOkumene']);

            header('Location: index.php');
            die();
        }
        else {
            if ($frontPage) {
                header('Location: manage.php');
                die();
            }
        }
    }
    else {
        if (!$frontPage) {
            header('Location: index.php');
            die();
        }
    }
}

function getHead() {
    ?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script src="js/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/gallery.js"></script>

        <!-- these js/css includes are ONLY to make the calendar widget work (fldDateMet);
             these includes are not necessary for the class to work!! -->
        <!--    <link rel="stylesheet" href="includes/jquery.ui.all.css">-->
        <script src="manage/includes/jquery.ui.core.js"></script>
        <script src="manage/includes/jquery.ui.widget.js"></script>


        <link rel="stylesheet" href="tagaster-admin.css">
        <link rel="stylesheet" href="css/gallery.css">
            <!-- BOOTSTRAP Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce_src.js" ></script >
        <script type="text/javascript">
            //function loadTinyMCE by Stéphane Delaune
            function loadTinyMCE(id, them){
                tinyMCE.init({
                    mode : "exact",
                    elements : id,
                    theme : them,
                    entity_encoding : "raw"
                });
            }
        </script >

        <title>Tágastér - admin felület</title>
    </head>

<?php
}


function getNavbar() {
    ?>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="manage.php">Tágastér admin</a>
            </div>
            <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="programok.php">Programok</a>
                    </li>
                    <li class="">
                        <a href="hirek.php">Hírek</a>
                    </li>
                    <li class="">
                        <a href="videok.php">Videók</a>
                    </li>
                    <li>
                        <a href="rolunk.php">Rólunk</a>
                    </li>
                    <li>
                        <a href="slider.php">Slider</a>
                    </li>
                    <li>
                        <a href="gallery.php">Galéria</a>
                    </li>
                    <li class="logout-li">
                        <a href="logout.php"><button type="submit" class="btn btn-default navbar-btn">Kijelentkezés</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
}
?>