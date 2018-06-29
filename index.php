<?php
include_once("connect.php");
include("lib.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tágas Tér Fesztivál - 2017.</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/gallery.css" rel="stylesheet">
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
    <![endif]-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/tagaster.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/jquery.countdown.js"></script>

</head>

<body id="page-top" class="index index-body">

<?php
getNavBar("main");
getCounter("main");
?>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Bible verse 
                    <div class="text-fix">
                        <p class="bible-verse">"Tágas térre vitt ki engem, megmentett, mert gyönyörködik bennem."</p>
                        <p class="bible-verse-location">/Zsoltárok 18:20/</p>
                    </div>-->
                    <!-- Indicators -->
                    <?php
                    $query = $mysqli->query("SELECT * FROM slider ORDER BY weight ASC");
                    $numQuery = mysqli_num_rows($query);
                    ?>
                    <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i<$numQuery; $i++) {
                    ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php print $i; ?>"<?php if ($i==0) print " class='active'"; ?>></li>
                        <?php
                    }
                        ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- <div class="item active">
                            <img src="img/slider-kepek-igevers.JPG" alt="...">
                            <!--<div class="carousel-caption">
                                "Tágas térre vitt ki engem,megmentett,mert gyönyörködik bennem."<br>
                                /Zsoltárok 18:20/
                            </div>
                        </div>-->
                        <?php
                        $first = TRUE;
                        while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        ?>
                        <div class="item<?php if ($first) { print " active"; $first = FALSE; } ?>">
                            <img src="img/slider/<?php print $item['image']; ?>" alt="<?php print $item['text']; ?>" style="margin: auto;">
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <img src="img/nyil_balra.png" class="glyphicon glyphicon-chevron-left">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <img src="img/nyil_jobbra.png" class="glyphicon glyphicon-chevron-right">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="registration">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Regisztráció —</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p><b>Szeptember 15</b>-én a belépés jegyvásárláshoz és regisztrációhoz kötött. Jegyedet megvásárolhatod a <a href="http://jegy.hu" target="_blank">www.jegy.hu</a> oldalon.</p>

                <p><b>Szeptember 16</b>-án a belépés ingyenes!</p>

                <p style="margin-top: 20px;"><b>Add meg a jegyen szereplő regisztrációs kódodat:</b></p>

                <form id="ticket-register" action="regisztracio.php" method="POST" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control ticket-id-lg" name="ticket-pre-register" placeholder="Írd ide a kódot">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Tovább"></input>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Donate
<section id="donate">
	<div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Támogatás —</h2>
            </div>
        </div>
      <div class="row">
					<div class="col-lg-12 text-center">
                <p>Amennyiben szeretné támogatni a Fesztiválunkat, azt a következő számlaszámra történő utalással teheti meg: </p>

<p style="font-weight: bold">Keresztyén Szeretetszolgálat Alapítvány<br>
​11600006-00000000-57626239​</p>
<p>Fontos,hogy a közleménybe írja bele: <b>Tágas Tér Fesztivál 2017</b></p>
            </div>
  		</div>
  </div>
</section> -->

<!-- News Grid Section -->
<section id="news">
    <div class="container">
        <div class="row">
<!--            <div class="col-sm-3 text-center">-->
<!--						</div>-->
            <div class="col-sm-6 text-center">
                <h2>— Videók —</h2>
                <div class="row">
                    <div class="col-sm-12 portfolio-item text-center">
                        <?php
                        /* $videosQuery = $mysqli->query("SELECT video FROM videos ORDER BY date DESC LIMIT 0,1");
                        $video = mysql_fetch_assoc($videosQuery); */
                        ?>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="420" height="236" src="<?php /* print str_replace("youtube.com/watch?v=", "youtube.com/embed/", $video["video"]); */?>https://youtube.com/embed/JkbawGfR2nY" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- div class="btn-group">
                            <a href="videok.php">
                                <button class="btn btn-default btn-dark" type="button" aria-expanded="false">
                                    További videók >
                                </button>
                            </a>
                        </div -->
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-center news-summary">
                <h2>— Hírek —</h2>
                    <?php
                    $newsQuery = $mysqli->query("SELECT * FROM news ORDER BY date DESC LIMIT 0,3");
                    while ($news = mysqli_fetch_array($newsQuery, MYSQLI_ASSOC)) {
                        ?>
                        <div class="row text-left">
                            <h3><?php print $news['title']; ?></h3>
                            <div class="news-date"><?php print date('Y.m.d.', strtotime($news['date'])); ?></div>
                            <div class="news-short-body"><?php print (trim_text($news['body'], 380, $ellipses = true, $strip_html = false)); ?>
                                <a href="hir.php?id=<?php print $news['id']; ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                            </div>

                        </div>

                    <?php
                    }
                    ?>
                <div class="btn-group">
                    <a href="hirek.php">
                        <button class="btn btn-default btn-dark" type="button" aria-expanded="false">
                            Több hír >
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-sm-3 text-center">
						</div>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-sm-2 portfolio-item text-center">-->
<!--            </div>-->
<!--            <div class="col-sm-8 portfolio-item text-center">-->
<!--                <p><b>2015. szeptember 25-én</b> felbolydul az Újszegedi Liget és környéke. Kezdetét veszi a Tágas Tér Fesztivál három napos rendezvénye, amely új színbe öltözteti szeptember utolsó hétvégéjét. Egy találkozásra hívunk mindenkit, ahol kinyílik a tér és láthatóvá válik egy élhető, egy szerethető Szeged. Koncertek, előadások, kiállítások, bemutatók, sok-sok játék és sport: ez a Tágas Tér Fesztivál. E téren bárki elfér, akárki megtalálja a helyét és mindenki talál magának olyan programot, ahol jól érzi magát. Csatlakozzon a sok-sok ezer szegedihez és találkozzunk a Tágas Téren!</p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-8 col-lg-offset-2 text-center">-->
<!--                <div class="btn-group">-->
<!--                    <a href="rolunk.php">-->
<!--                        <button class="btn btn-default" type="button" aria-expanded="false">-->
<!--                            Részletek >-->
<!--                        </button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="row">
            <div class="page-scroll text-center link-to-top">
                <a href="#page-top">vissza az oldal tetejére</a>
            </div>
        </div>

    </div>
</section>

<!-- About Grid Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Rólunk —</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 portfolio-item text-center">
            </div>
            <div class="col-md-8 portfolio-item text-center">
                <p>Küldetésünk</p>

                <p><i>„Izsák szolgái a völgyben is ástak, és megtalálták ott az élő víz kútját. De ott is civakodni kezdtek Gerár pásztorai Izsák pásztoraival: »Miénk a víz!« Ezért arról, ami ott történt, elnevezte a kutat Eszeknek (azaz Civakodásnak), mivel civakodtak vele. Másikat is ástak, amiatt is civakodtak, ezért elnevezte azt Szitnának (azaz Ellenségeskedésnek). Erre elment onnan, és ásott egy másik kutat. Emiatt nem civakodtak, elnevezte tehát Rehobótnak (azaz Tágas térnek) mondván: »Most tágas teret adott az Úr nekünk, s megadta, hogy sokasodjunk ezen a földön.”</i></p>

                <p>A Tágas Tér az a hely, ahol minden ember találkozhat. Egy hely, ahová eljövünk az élő vízért és ahol megosztjuk egymással azokat a javakat, amelyeket az Úr adott számunkra. Mindannyiunk szívében ott rejlenek a Lélek ajándékai, amelyek arra várnak, hogy használjuk őket a reánk bízottak javára. A Tágas Tér azért jött létre, hogy keresd, elhozd és átadd azt, ami benned van.</p>

                <p>Az egyház akkor tudott igazán sokat adni Krisztusból, amikor tagjai elfogadták a küldetést, amit az Úrtól kaptak. A mai világnak arra van szüksége, hogy őszintén, bátran és Istenre figyelve el kezdjük használni a bennünk lévő adományokat.</p>

                <p>Megtaláltuk az élő víz kútját és Jézus most arra hív bennünket, hogy együtt, egységben járuljunk oda hozzá meríteni a vízből. Ha azt szeretnénk, hogy sokasodjon az Úr népe, akkor egységben, egymásra figyelve, egymástól tanulva kell végeznünk küldetésünket.</p>

                <p>Merítsünk a kútból és tegyük termővé a kietlen pusztaságot!</p>

                <h3>Mérföldkövek:</h3>

                <h4>2015</h4>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/VgDLEvNB34E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                <iframe src="https://player.vimeo.com/video/142774077?title=0&byline=0&portrait=0" width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <h4>2017</h4>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/JkbawGfR2nY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/P6MoHY-f8OM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

            </div>
        </div>
        <div class="row">
            <!-- div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="btn-group">
                    <a href="rolunk.php">
                        <button class="btn btn-default" type="button" aria-expanded="false">
                            Részletek >
                        </button>
                    </a>
                </div>
            </div -->
            <div class="col-sm-12 portfolio-item text-center question">
                <p>Kérdésed van? Írj nekünk: <a href="mailto:tagasterfesztival@gmail.com">tagasterfesztival@gmail.com</a></p>
            </div>
        </div>

        <div class="row">
            <div class="page-scroll text-center link-to-top">
                <a href="#page-top">vissza az oldal tetejére</a>
            </div>
        </div>

    </div>
</section>

<div class="page-scroll">
    <a href="#programs">
        <img class="arrow-down" src="img/feher_nyil2.png" alt="">
    </a>
</div>

<!-- Programs Section -->
<section class="success" id="programs">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Program —</h2>
                <p>Helyszín: Ifjúsági ház, Szeged</p>
            </div>
        </div>
        <p></p>

        <div class="row">
            <div class="col-md-4 col-md-offset-2 col-sm-6 programs-item text-center">
                <p><b>SZEPTEMBER 15. DE.</b></p>
                <span>9:00 | Református Egyetemi Dicsőítők<br>
                    <i>Czagány Gábor</i> • <i>Martin Smith</i></span>
                <p></p>
                <p><b>SZEPTEMBER 15. DU.</b></p>
                <span>13:00 | 1. szeminárium<br>
                    <i>László Viktor</i> • <i>Püski Dániel</i><br>
                    • <i>Matt Edwards</i> • <i>Gál Dávid</i><br></span>
<p></p>
                <span>15:30 | 2. szeminárium<br>
                    <i>Dobner Illés</i> • <i>Sipos Márk</i><br>
                    • <i>Matt Edwards</i> • <i>Botár Balázs</i><br></span>
<p></p>
                <span>17:00 | Esti dicsőítés<br>
                    <i>Szegedi Baptista Ifjúsági Dicsőítők</i> • <i>Martin Smith Band</i></span>
            </div>
            <div class="col-md-4 col-sm-6 programs-item text-center">
                <p><b>SZEPTEMBER 16. DE.</b></p>
                <span>10:00 | Felekezetközi istentisztelet<br>
                    <i>Kyle Eckhart</i> • <i>Dobner Illés</i></span>
<p></p>
                <p><b>SZEPTEMBER 16. DU.</b></p>
                <span>13:00 | Szeminárium<br>
                    <i>K.Ö.D.</i> • <i>Ferenczy Csaba és Valkai Ildikó</i> • <i>SzabadOn</i><br></span>

                <span>19:00 | Esti dicsőítés<br>
                    <i>Sipos Márk</i> • <i>Csiszér László és zenekara</i></span>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="btn-group">
                    <a href="programok.php">
                        <button class="btn btn-default programs-button" type="button" aria-expanded="false">
                            Részletes programtáblázat >
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="page-scroll text-center link-to-top">
                <a href="#page-top">vissza az oldal tetejére</a>
            </div>
        </div>
    </div>
</section>

<div class="page-scroll text-center">
    <a href="#partners">
        <img class="arrow-down" src="img/feher_nyil2.png" alt="">
    </a>
</div>

<!-- Partners Section -->
<section id="partners" class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Kezdeményező közösségek —</h2>
            </div>
        </div>
				<div class="row partner-icons">
            <div class="col-sm-2 portfolio-item">
            </div>
            <div class="col-sm-8 portfolio-item">
							<div class="partner-link-wrapper">
								<a href="http://uniref-szeged.hu" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/szegedi_reformatus_egyetemi_gyulekezet_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://szeged.lutheran.hu" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/szegedi_evangelikus_egyhazkozseg_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://baptistaszeged.hu" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/szegedi_baptista_gyulekezet_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://www.fokolare.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/fokolare_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://www.fogadalmitemplom.hu/" class="partner-link" target="_blank" data-toggle="modal" >
									<img src="img/sponsors/2017/plebania_logo.png" class="img-responsive" alt="" style="height: 125px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://www.ujremeny.hu/szeged" class="partner-link" target="_blank" data-toggle="modal" >
									<img src="img/sponsors/2017/szegedi_baptista_gyulekezet_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<!-- div class="partner-link-wrapper">
								<a href="http://www.szeged-csanad.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/szeged-csanadi-egyhazmegye.png" class="img-responsive" alt="">
								</a>
							</div -->
            </div>
            <div class="col-sm-2 portfolio-item">
            </div>
				</div>
<div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Támogatók —</h2>
            </div>
        </div>
        <div class="row partner-icons">
            <div class="col-sm-2 portfolio-item">
            </div>
            <div class="col-sm-8 portfolio-item">
							<div class="partner-link-wrapper">
								<a href="http://www.nka.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/NKA_csak_logo_rgb.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://del.lutheran.hu/nyitolap" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/deli_evangelikus_egyhazkerulet_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://www.szeged-csanad.egyhazmegye.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/szeged_csanadi_egyhazmegye_logo.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://reformacio2017.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/ref_500.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="https://www.it-services.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/itsh.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://recruitmentsolutions.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/rs.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://kezdolap.plasmacentrum.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/vascularplazma.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://www.coopszeged.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/coop_szeged_zrt_logo.png" class="img-responsive" alt="" style="height: 84px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="https://www.otpbank.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/otp.png" class="img-responsive" alt="" style="height: 92px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://www.mediamotion.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/jarmureklam.png" class="img-responsive" alt="" style="height: 109px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://civil.info.hu/web/nea" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/nemzeti_egyutmukodesi_alap.png" class="img-responsive" alt="" style="width: 320px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="https://szeka.ujevangelizacio.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/katolikus_alapitvany.png" class="img-responsive" alt="" style="width: 190px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="https://www.fornetti.hu/mainpage_hu" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/fornetti.png" class="img-responsive" alt="" style="width: 125px;">
								</a>
							</div>
            </div>
            <div class="col-sm-2 portfolio-item">
            </div>
				</div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>— Partnerek —</h2>
            </div>
        </div>
				<div class="row partner-icons">
            <div class="col-sm-2 portfolio-item">
            </div>
            <div class="col-sm-8 portfolio-item">
							<div class="partner-link-wrapper">
								<a href="http://ujszulottmentokszeged.com/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/ujszulott.png" class="img-responsive" alt="" style="height: 100px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://szakkepzesszeged.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/szegedi-szakkepzes.png" class="img-responsive" alt="">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://sctt.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/sctt.png" class="img-responsive" alt="">
								</a>
							</div>	
							<div class="partner-link-wrapper">
								<a href="http://sportkoalicio.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/sport.png" class="img-responsive" alt="">
								</a>
							</div>	
							<div class="partner-link-wrapper">
								<a href="http://www.szegedsport.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/furdo.png" class="img-responsive" alt="" style="height: 93px;">
								</a>
							</div>
							<div class="partner-link-wrapper">
								<a href="http://rendezvenyhaz.morahalom.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/aranyszom.png" class="img-responsive" alt="" style="height: 93px;">
								</a>
							</div>		
							<div class="partner-link-wrapper">
								<a href="http://www.parakletos.hu/" class="partner-link" target="_blank" data-toggle="modal">
									<img src="img/sponsors/2017/parakletoslogo.png" class="img-responsive" alt="" style="height: 93px;">
								</a>
							</div>						
            </div>
            <div class="col-sm-2 portfolio-item">
            </div>
				</div>
        <div class="row">
            <div class="page-scroll text-center link-to-top">
                <a href="#page-top">vissza az oldal tetejére</a>
            </div>
        </div>
    </div>
</section>

<div class="page-scroll">
    <a href="#contact">
        <img class="arrow-down" src="img/feher_nyil2.png" alt="">
    </a>
</div>
<!-- Gallery Section -->
<!-- section id="gallery">
    <h1>Galéria</h1>
    <div class="row gallery">
        <?php
        $categories = $mysqli->query("SELECT * FROM `gallery_category` ORDER BY weight ASC");
        while ($category = mysqli_fetch_array($categories, MYSQLI_ASSOC)) {
            $image = $mysqli->query("SELECT * FROM tagaster_data.gallery_images WHERE category_id = ".$category['id']." ORDER BY weight ASC LIMIT 0, 1");
            $katpic = mysqli_fetch_assoc($image);
            if($katpic['name'] != null) {
                ?>
                <div class="category" data-category="<?php print $category['id']; ?>">
                    <div class="img" style="background-image:url(gallery/thumbnail/<?php print $katpic['name']?>);"></div>
                    <h3><?php print $category['name']; ?></h3>
                </div>

                <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
</section -->
<!-- Contact Section -->

<section id="contact">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 text-center">
                <img src="img/logo-fekete.png" class="img-responsive" alt="">
                <div class="col-sm-12 text-left" id="contact-text">
                    <p>Cím: 6724 Szeged, Hétvezér utca 5.</p>
                    <p>E-mail: tagasterfesztival@gmail.com</p>
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
                <p>© Tágas Tér Fesztivál 2017</p>
            </div>
        </div>
        <div class="row">
            <div class="page-scroll text-center link-to-top">
                <a href="#page-top">vissza az oldal tetejére</a>
            </div>
        </div>
    </div>
</section>




<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2 style="margin-bottom: 40px;">— A Tágas Tér Fesztiválról —</h2>
                        <!-- <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt=""> -->
                        <p>A szegedi egyházi közösségek <b>2015. szeptember 25. és 27.</b> között egy nagyszabású és egyedülálló, három napos találkozást szerveznek a Várossal. Mindez egy fesztivál formájában valósul meg, ahol koncerteken, előadásokon, kiállításokon, fórumbeszélgetéseken, színdarabokon, sporteseményeken és sok más eseményen keresztül kinyílik egy olyan tér, ahol számtalan, egy élhetőbb Szegedért dolgozó intézmény illetve kezdeményezés mutatkozik majd meg.</p>
                        <p>A három napos rendezvény fő gerincét azok a programok adják, amelyeket részint maguk az egyházi közösségek és szervezetek, részint pedig az általuk meghívott vendégek vezetnek le. E programok mögött önkéntesek százainak munkája van ott. Legyen bár szó egy beszélgetésről, egy műhelymunkáról, vagy akár egy sporteseményről a cél ugyanaz: kezdeményezni, megvalósítani és ennek segítségével értékeket felmutatni.</p>
                        <p>A Tágas Tér Fesztivál másik pillérjét a péntek, valamint szombat esti programok jelentik. Ezek igazi fesztiváli események lesznek, olyan nagyszínpadi produkciók, amelyek méltán számíthatnak sok ezer szegedi és nem szegedi figyelmére. E produkciók és előadások üzenete szervesen csatlakozik az egész Fesztivál mondanivalójához: a tágas téren mindenkinek jut elég hely.</p>
                        <p>A programok ingyenesek, azaz jellegüktől és befogadó méretüktől függően bárki szabadon becsatlakozhat. Lesznek kifejezetten családoknak, illetve gyerekeknek szóló programok; számítunk a kultúra és tudomány iránt érdeklődőkre; megismerhetjük a legkülönfélébb társadalmi és jótékonysági kezdeményezéseket, de azok is otthon fogják magukat érezni, akik egyszerűen csak lazítani szeretnének.</p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Bezárás</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
