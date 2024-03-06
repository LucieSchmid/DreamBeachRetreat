<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link href="layout.css" rel="stylesheet">

    <title>Wellnessangebote</title>
</head>

<body>
    <header>
        <li class="hintergrund" style="display: grid; grid-template-columns: 100px ; grid-template-rows: 50px 50px; padding-bottom: 10px">
            <a href="hauptseite.php"><img src="images/logo.png" width="60" height="60" alt="Logo" class="img-fluid rounded m-4" aligen="left" style="grid-row: 1 / 2"></a>
            <h1 style="grid-row: 1; grid-column: 2; text-align: left; margin-top: 20px;">Dream Beach Retreat</h1>
            <i style="grid-row: 2 ; grid-column: 2; text-align: left; margin-top: 10px; padding-top: 4px;">Entspannen,
                Auftanken und Genießen - Dein Rückzugsort am Strand.</i>
        </li>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-1">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="hauptseite.php">Übersicht</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zimmer.php">Zimmer & Apartments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sport.php">Sportangebote</a>
                        </li>

                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link dropdown-toggle" href="wellness.php" role="button" data-bs-toggle="dropdown">Wellnessangebote</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#gm">Ganzkörpermassage</a></li>
                                <li><a class="dropdown-item" href="#thai">Thai-Massage</a></li>
                                <li><a class="dropdown-item" href="#ruck">Rückenmassage</a></li>
                                <li><a class="dropdown-item" href="#fuss">Fußmassage</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="restaurant.php">Restaurant</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="agb.html">rechtliche Information</a>
                        </li>
                    </ul>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo " <a href='logout.php' class='btn btn-info m-1'>Logout</a>";
                    } else {
                        echo "<a href='registrieren.php' class='btn btn-info m-1'>Registrieren</a>";
                        echo "<a href='login.php' class='btn btn-info m-1'>Login</a>";
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/massage1.jpg" alt="Seite 1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="images/massage.jpg" alt="Seite 2" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="images/massage2.jpg" alt="Seite 3" class="d-block" style="width:100%">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <main class="m-4">
        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center" id="gm">Ganzkörpermassage</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/ganz.jpg" alt="Ganzkörpermassage" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Dieses Ganzkörpermassage ist perfekt um alleine zu entspannen.
                    <h5>Serviceleistung</h5>
                    <ul>
                        <li>Maximal 1 Person</li>
                        <li>Massage mit Lavendelöl</li>
                    </ul>
                    <h5>Dauer | Uhrzeit und Datum:</h5>
                    <ul>
                        <li>1 Stunde</li>
                        <li>19 Uhr</li>
                        <li>Jeden Tag</li>
                    </ul>
                    <h5>Preis</h5>
                    <ul>
                        <li>45€ pro Stunde</li>
                    </ul>
                    <a href="wellnessf.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center" id="thai">Thai-Massage</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/thai.jpg" alt="Thai-Massage" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Dieses Thai-Massage ist perfekt um alleine oder zu zweit zu entspannen.
                    <h5>Serviceleistung</h5>
                    <ul>
                        <li>Maximal 2 Person</li>
                        <li>Massage mit Lavendelöl</li>
                    </ul>
                    <h5>Dauer | Uhrzeit und Datum:</h5>
                    <ul>
                        <li>1,5 Stunde</li>
                        <li>20 Uhr</li>
                        <li>Jeden Tag</li>
                    </ul>
                    <h5>Preis</h5>
                    <ul>
                        <li>30€ pro Stunde</li>
                    </ul>
                    <a href="wellnessf.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>


        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center" id="ruck">Rückenmassage</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/rücken.jpg" alt="Rückenmassage" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Dieses Rückenmassage ist perfekt um alleine zu entspannen.
                    <h5>Serviceleistung</h5>
                    <ul>
                        <li>Maximal 1 Person</li>
                        <li>Massage mit Lavendelöl</li>
                    </ul>
                    <h5>Dauer | Uhrzeit und Datum:</h5>
                    <ul>
                        <li>1 Stunde</li>
                        <li>21 Uhr</li>
                        <li>Jeden Tag</li>
                    </ul>
                    <h5>Preis</h5>
                    <ul>
                        <li>25€ pro Stunde</li>
                    </ul>
                    <a href="wellnessf.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center" id="fuss">Fußmassage</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/fuss.jpg" alt="Fussmassage" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Dieses Fußmassage ist perfekt um alleine zu entspannen.
                    <h5>Serviceleistung</h5>
                    <ul>
                        <li>Maximal 1 Person</li>
                        <li>Massage mit Lavendelöl</li>
                    </ul>
                    <h5>Dauer | Uhrzeit und Datum:</h5>
                    <ul>
                        <li>30 Minuten</li>
                        <li>20:30 Uhr</li>
                        <li>Jeden Tag</li>
                    </ul>
                    <h5>Preis</h5>
                    <ul>
                        <li>25€ pro Stunde</li>
                    </ul>
                    <a href="wellnessf.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <div class="bg-dark text-white pt-3 mt-5">
            <div>
                <div class="text-center">
                    <p>Hier findest du uns noch:</p>
                </div>
                <div class="text-center verlinkungen">
                    <a link href="https://www.instagram.com/DreamBeachRetreat" target="_blank"><i class="fa fa-instagram" style="font-size:24px"></i></a>
                    <i class="bi bi-instagram">DreamBeachRetreat</i>
                    <a link href="https://www.facebook.com/DreamBeachRetreat" target="_blank"><i class="fa fa-facebook" style="font-size:24px"></i></a>
                    <i class="bi bi-instagram">DreamBeachRetreat</i>
                    <a link href="https://www.pinterest.at/DreamBeachRetreat/"><i class="fa fa-pinterest"></i></a>
                    <i class="bi bi-instagram">DreamBeachRetreat</i>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>