<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
//    include "/var/www/krumo/class.krumo.php";
}

// Get site url.
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $root = "http://localhost/tagaster/";
}
else {
    $root = "http://tagaster.hu/";
}
define("SITE_URL", $root);




function getNavBar($main = "") {
    $mainPageLink = "./";
    $mainPath = "./";
    if ($main) {
        $mainPageLink = "#page-top";
        $mainPath = "";
    }
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php print $mainPageLink; ?>">
                    <img src="img/logo-feher-kicsi.png" style="float: left;">
                    <div id="navbar-title">Tágas Tér</div>
                    <div id="navbar-date">SZEGED, 2018.09.15-16.</div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div style="margin-top: -10px; float:right">
                    <a href="https://www.instagram.com/tagas_ter/" target="_blank" style="padding-bottom: 0px; float: left; margin-right: 10px;">
                        <img src="img/instagram-ikon.png" class="img-responsive contact-icon" style="width: 25px">
                    </a>
                    <a href="https://www.facebook.com/tagaster" target="_blank" style="padding-bottom: 0px; float: right;">
                        <img src="img/facebook_ikon.png" class="img-responsive contact-icon" style="width: 25px;">
                    </a>
                </div><br>
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#page-top">Főoldal</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#registration">Regisztráció</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#news">Hírek</a>
                    </li>
                    <li class="page-scroll" id="menu-about">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#about">Rólunk</a>
                    </li>
                    <li class="page-scroll" id="menu-programs">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#programs">Programok</a>
                    </li>
                    <!-- li class="page-scroll" id="menu-gallery">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#gallery">Galéria</a>
                    </li -->
                    <li class="page-scroll" id="menu-contact">
                        <a href="<?php SITE_URL ?><?php print $mainPath; ?>#contact">Kapcsolat</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php
}



function getHead($title = "") {
    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
        if ($title) $title = $title . " - Tágas Tér Fesztivál";
        else $title = "Tágas Tér Fesztivál";
    ?>
    <title><?php print $title; ?></title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="tagaster.css" rel="stylesheet">

    <!-- Custom Fonts
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- Custom Fonts Tagaster -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<!--    For scrolling links-->
<!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
<!--    <script src="js/classie.js"></script>-->
<!--    <script src="js/cbpAnimatedHeader.js"></script>-->

    <script src="js/tagaster.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <?php
}


function getCounter($main = "") {
    $wrapperClass = "counter-static-page";
    if ($main) {
        $wrapperClass = "counter-main-page";
    }
    ?>
    <!-- div id="counter-wrapper">
        <div id="counter-toggle"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></div>
        <div id="counter-days" class="digit"><div id="counter-days-num" class="counter-num"></div><div class="counter-tag">nap</div></div>
        <div id="counter-hours" class="digit"><div id="counter-hours-num" class="counter-num"></div><div class="counter-tag">óra</div></div>
        <div id="counter-minutes" class="digit"><div id="counter-minutes-num" class="counter-num"></div><div class="counter-tag">perc</div></div>
        <div id="counter-seconds" class="digit"><div id="counter-seconds-num" class="counter-num"></div><div class="counter-tag">másodperc</div></div>
    </div -->
    <?php
}

function getContactSection() {
?>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 text-center logo-container">
                    <img src="img/logo-feher-kicsi.png" class="img-responsive" alt="">
                    <div id="navbar-title">Tágas Tér</div>
                    <div id="navbar-date">SZEGED, 2018.09.15-16.</div>
                    <div class="col-sm-12 text-left" id="contact-text">
                        <p>Cím: 6724 Szeged, Hétvezér utca 5.</p>
                        <p>E-mail: info@tagaster.hu</p>

                        <a href="https://www.instagram.com/tagas_ter/" target="_blank" style="padding-bottom: 0px; float: left; margin-right: 10px;">
                            <img src="img/instagram-ikon.png" class="img-responsive contact-icon" style="width: 25px">
                        </a>
                        <a href="https://www.facebook.com/tagaster" target="_blank" style="padding-bottom: 0px;">
                            <img src="img/facebook_ikon.png" class="img-responsive contact-icon" style="width: 25px;">
                        </a>
                    </div>

                </div>
                <div class="col-sm-6 text-center">
                    <h2 class="text-left">Írj nekünk!</h2>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="text" class="form-control" placeholder="Név" id="name" required data-validation-required-message="Kérem, adja meg a nevét.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="email" class="form-control" placeholder="E-mail cím" id="email" required data-validation-required-message="Kérem, adja meg az e-mail címét.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <textarea rows="5" class="form-control" placeholder="Üzenet" id="message" required data-validation-required-message="Kérem, írja le az üzenetet."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success">küld ></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row" id="labjegyzet">
                <div class="col-sm-12 text-center">
                    <hr>
                    <p>© Tágas Tér Konferencia 2018</p>
                </div>
            </div>
            <div class="row">
                <div class="page-scroll text-center link-to-top">
                    <a href="#page-top">vissza az oldal tetejére</a>
                </div>
            </div>
        </div>
    </section>

<?php
}

function getPager($pageNo, $itemsPerPage, $numNews) {
    if ($numNews % $itemsPerPage) {
        $lastPage = floor($numNews / $itemsPerPage)+1;
    }
    else {
        $lastPage = floor($numNews / $itemsPerPage);
    }
?>
    <nav class="text-center">
        <ul class="pagination">
            <?php if ($pageNo == 1) {
                $firstLiClass = "disabled";
                $firstLiLink = "#";
            }
            else {
                $firstLiLink = "?page=".($pageNo-1);
            }
            ?>
            <li class="<?php print $firstLiClass; ?>">
                <a href="<?php print $firstLiLink; ?>" aria-label="Előző">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
    <?php
            for ($i = 1; $i <= $lastPage; $i++) {
                if ($i == $pageNo) {
                    print "<li class='active'><a href='#'>$i</a></li>";
                }
                else {
                    print "<li class=''><a href='?page=$i'>$i</a></li>";
                }
            }
           if ($pageNo == $lastPage) {
               $lastLiClass = "disabled";
               $lastLiLink = "#";
           }
            else {
                $lastLiLink = "?page=".($pageNo+1);
            }
            ?>
                <li class="<?php print $lastLiClass; ?>">
                    <a href="<?php print $lastLiLink; ?>" aria-label="Következő">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
<?php
}


function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }

    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }

    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);

    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }

    return $trimmed_text;
}

function getGalleryCategories() {
    $response = '';
    $result = $mysqli->query("SELECT `category`, `thumb` FROM `gallery` GROUP BY `category` ORDER BY `category` ASC");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $response += 'asdf';
    }

    mysqli_free_result($result);

    if($response == '' ){
        return '<h1>A galéria jelenleg üres!</h1>';
    } else {
        return $response;
    }
}


?>

