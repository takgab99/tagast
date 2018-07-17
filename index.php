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

    <title>Tágas Tér Konferencia</title>

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
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>

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
            <div class="col-lg-12 intro-image-container text-center">
                <img src="img/logo-keretes-feher-kicsi.png">
                <div class="subtitle">Szeptember 15-16.</div>
                <div class="subtitle">IH Rendezvényközpont, Szeged</div>
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
                <p><b>Szeptember 15</b>-én a belépés jegyvásárláshoz és regisztrációhoz kötött.<br>
                    Jegyedet megvásárolhatod <a href="https://www.jegy.hu/program/tagas-ter-konferencia-2018-szombati-napijegy-martin-smith-uk-94741/459255" target="_blank">ITT</a> vagy
                    <a href="https://tagas-ter-konferencia-2018-szombati-napijegy-martin-smit.broadway.hu/2018-09-15-08-00" target="_blank">ITT</a>!
                </p>

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

                <p><i>„Izsák szolgái a völgyben is ástak, és megtalálták ott az élő víz kútját. De ott is civakodni kezdtek Gerár pásztorai Izsák pásztoraival: »Miénk a víz!« Ezért arról, ami ott történt, elnevezte a kutat Eszeknek (azaz Civakodásnak), mivel civakodtak vele. Másikat is ástak, amiatt is civakodtak, ezért elnevezte azt Szitnának (azaz Ellenségeskedésnek). Erre elment onnan, és ásott egy másik kutat. Emiatt nem civakodtak, elnevezte tehát Rehobótnak (azaz Tágas térnek) mondván: »Most tágas teret adott az Úr nekünk, s megadta, hogy sokasodjunk ezen a földön.”<br>1Móz/Gen 26,19-22. </i></p>

                <p>A Tágas Tér az a hely, ahol minden ember találkozhat. Egy hely, ahová eljövünk az élő vízért és ahol megosztjuk egymással azokat a javakat, amelyeket az Úr adott számunkra. Mindannyiunk szívében ott rejlenek a Lélek ajándékai, amelyek arra várnak, hogy használjuk őket a reánk bízottak javára. A Tágas Tér azért jött létre, hogy keresd, elhozd és átadd azt, ami benned van.</p>

                <p>Az egyház akkor tudott igazán sokat adni Krisztusból, amikor tagjai elfogadták a küldetést, amit az Úrtól kaptak. A mai világnak arra van szüksége, hogy őszintén, bátran és Istenre figyelve el kezdjük használni a bennünk lévő adományokat.</p>

                <p>Megtaláltuk az élő víz kútját és Jézus most arra hív bennünket, hogy együtt, egységben járuljunk oda hozzá meríteni a vízből. Ha azt szeretnénk, hogy sokasodjon az Úr népe, akkor egységben, egymásra figyelve, egymástól tanulva kell végeznünk küldetésünket.</p>

                <p>Merítsünk a kútból és tegyük termővé a kietlen pusztaságot!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 portfolio-item text-center">

                <h3>Mérföldkövek:</h3>

                <div class="row">
                    <h4>2015</h4>
                    <div class="col-md-6 portfolio-item text-center">
                        <iframe width="500" height="281" src="https://www.youtube.com/embed/VgDLEvNB34E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6 portfolio-item text-center">
                        <iframe src="https://player.vimeo.com/video/142774077?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>

                <div class="row">
                    <h4>2017</h4>
                    <div class="col-md-6 portfolio-item text-center">
                        <iframe width="500" height="281" src="https://www.youtube.com/embed/JkbawGfR2nY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6 portfolio-item text-center">
                        <iframe width="500" height="281" src="https://www.youtube.com/embed/P6MoHY-f8OM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
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
                <p>Kérdésed van? Írj nekünk: <a href="mailto:info@tagaster.hu">info@tagaster.hu</a></p>
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
                <span>9:00 | Reggeli dicsőítés és főelőadások<br><i>Református Egyetemi Dicsőítők</i><br>
                     • <i>Czagány Gábor</i> • <i>Martin Smith</i></span>
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
                <span>19:00 | Esti dicsőítés<br>
                    <i>Szegedi Baptista Ifjúsági Dicsőítők</i> • <i>Martin Smith Band</i></span>
            </div>
            <div class="col-md-4 col-sm-6 programs-item text-center">
                <p><b>SZEPTEMBER 16. DE.</b></p>
                <span>10:00 | Felekezetközi istentisztelet<br>
                    <i>Kyle Eckhart</i> • <i>Dobner Illés</i></span>
<p></p>
                <p><b>SZEPTEMBER 16. DU.</b></p>
                <span>13:00 | Szeminárium<br>
                    <i>K.Ö.D.</i> • <i>Ferentzi Csaba és Valkai Ildikó</i> • <i>SzabadOn</i><br></span>

                <span>19:00 | Esti dicsőítés<br>
                    <i>Sipos Márk</i> • <i>Csiszér László és zenekara</i></span>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="btn-group">
                    <a href="programok.php">
                        <!--<button class="btn btn-default programs-button" type="button" aria-expanded="false">
                            Részletes programtáblázat >
                        </button>-->
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

<!--<div class="page-scroll text-center">-->
<!--    <a href="#partners">-->
<!--        <img class="arrow-down" src="img/feher_nyil2.png" alt="">-->
<!--    </a>-->
<!--</div>-->

<div class="page-scroll">
    <a href="#contact">
        <img class="arrow-down" src="img/feher_nyil2.png" alt="">
    </a>
</div>

<!-- Contact Section -->

<?php
print getContactSection();
?>

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
