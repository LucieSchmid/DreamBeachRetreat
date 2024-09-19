<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link href="layout.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>



    <title>DreamBeachtRetreat</title>
</head>

<body>
    <header>
        <li class="hintergrund" style="display: grid; grid-template-columns: 100px ; grid-template-rows: 50px 50px; padding-bottom: 10px; ">
            <a href="hauptseite.php"><img src="images/logo.png" width="60" height="60" alt="Logo" class="img-fluid rounded m-4" aligen="left" style="grid-row: 1 / 2"></a>
            <h1 style="grid-row: 1; grid-column: 2; text-align: left; margin-top: 20px;">Dream Beach Retreat</h1>
            <i style="grid-row: 2 ; grid-column: 2; text-align: left; margin-top: 10px; padding-top: 4px;">Entspannen,
                Auftanken und Genießen - Dein Rückzugsort am Strand.</i>
        </li>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top p-1">
            <div class="container-fluid" data-bs-theme="dark">
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link dropdown-toggle" href="hauptseite.html" role="button" data-bs-toggle="dropdown">Übersicht</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#info">Informationen</a></li>
                                <li><a class="dropdown-item" href="#mission">Mission | Vision</a></li>
                                <li><a class="dropdown-item" href="#team">Team</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zimmer.php">Zimmer & Apartments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sport.php">Sportangebote</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="wellness.php">Wellnessangebote</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="restaurant.php">Restaurant</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="agb.php?lang=de">rechtliche Information</a>
                        </li>
                    </ul>
                </div>

                <?php
                if (isset($_SESSION['email'])) {
                    echo "<a href='konto.php' class='btn btn-info m-1' data-bs-toggle='modal' data-bs-target='#myModal'>Konto</a>";
                    echo " <a href='logout.php' class='btn btn-info m-1'>Logout</a>";
                } else {
                    echo "<a href='registrieren.php' class='btn btn-info m-1'>Registrieren</a>";
                    echo "<a href='login.php' class='btn btn-info m-1'>Login</a>";
                }
                ?>

                <a href='kontakt.php' class='btn btn-info m-1'>Kontakt</a>
                <a href='adminseite.php' class='btn btn-info m-1'>Admin</a>
            </div>
        </nav>


        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #212529;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #0DCAF0;">Ihr Konto</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div style="text-align: center;">
                            <a href="buchungsUebersicht.php">Ihre Buchungen</a>
                        </div>
                        <div style="text-align: center;">
                            <a href="konto.php">Ihre Kontodaten</a>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Schließen</button>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <main>
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
                    <img src="images/aussen.jpg" alt="Seite 1" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="images/tipi.jpg" alt="Seite 2" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="images/apartment.jpg" alt="Seite 3" class="d-block" style="width:100%">
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

        <div class="hintergrund mb-3 mt-3">
            <h2 class="ueberschriftHintergrund text-center" id="info">Informationen über das Retreat</h2>


            <h3>Unterkünfte</h3>
            <hr>
            <p>Die Unterkünfte in unseresn Strand-Retreats reichen von komfortablen Zimmern bis hin zu luxuriösen
                Strandvillen oder Bungalows. Viele bieten einen direkten Blick auf das Meer.
            </p>

            <!-- Gallery -->
            <div class="row" style="padding-left: 50px; padding-right: 50px;">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="images/strandvilla.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Familienzimmer" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="images/familienzimmer1.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="familienzimmer1" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="images/bungalow.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Strandvilla" />
                </div>
            </div>
            <!-- Gallery -->


            <h3>Entspannung und Erholung</h3>
            <hr>
            <p>Das Hauptziel unseres Strand-Retreats besteht darin, den Gästen eine Umgebung für Entspannung und
                Erholung zu bieten. Dies wird durch Wellness-Angebote, Yoga-Kurse, Spa-Behandlungen und ähnliche
                Aktivitäten
                erreicht.</p>

            <h3>Naturerlebnis</h3>
            <hr>
            <p>Wir nutzen die natürliche Schönheit unserer Umgebung. Gäste können Strandspaziergänge,
                Wassersportaktivitäten, oder andere Outdoor-Aktivitäten genießen.</p>

            <h3>Gastronomie</h3>
            <hr>
            <p>Wir bieten eine vielfältige Auswahl an kulinarischen Genüssen, darunter frische Meeresfrüchte und lokale
                Spezialitäten.</p>

            <h3>Veranstaltungen und Aktivitäten</h3>
            <hr>
            <p>Es werden oft Veranstaltungen und Aktivitäten angeboten, um euch, unseren Gästen, ein abwechslungsreiches
                Erlebnis zu bieten. Das kann von Strandpartys über kulturelle Veranstaltungen reichen.</p>

            <h3>Nachhaltigkeit</h3>
            <hr>
            <p>Viele moderne Strand-Retreats legen Wert auf nachhaltigen Tourismus und umweltfreundliche Praktiken, um
                die natürliche Umgebung zu schützen. Darunter sind auch wir.</p>

            <h3>Exklusivität und Privatsphäre</h3>
            <hr>
            <p>Wir zeichnen uns durch unsere exklusiven Angebote und Privatsphäre aus, wodurch Sie besondere romantische
                Ausflüge oder luxuriöse Rückzugsorte machen können.</p>

            <h3>Lage</h3>
            <hr>
            <p>Strand-Retreats befindet sich an malerischen Küstenabschnitten, oft in idyllischen Gegenden.</p>

            <!--Map-->

            <div id="meineMap" style="width: 600px; height: 400px; margin-left: 50px;">
                <script>
                    const map = L.map('meineMap').setView([35.8669603,10.6106847], 15); //[Koordinaten], Zoomfaktor

                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; DreamBeachRetreat'
                    }).addTo(map);

                    const marker = L.marker([35.8669603,10.6106847]).addTo(map)
                        .bindPopup('<img src="images/aussen.jpg" height="150" width="225"><h2 style="text-align:center">Dream Beach</h2>')
                        .openPopup();
                </script>
            </div>

            <!--Map-->
        </div>

        <div class="hintergrund">
            <h2 class="ueberschriftHintergrund text-center" id="mission">Mission | Vision</h2>
            <h3>Mission</h3>
            <hr>
            <p>Unsere Mission ist es, ein unvergleichliches Strand-Rückzugserlebnis zu bieten. Durch luxuriöse
                Unterkünfte, die Schönheit der Natur und einen persönlichen Service möchten wir eine Oase schaffen, in
                der Gäste abschalten, sich verbinden und die Essenz der Strandidylle erleben können.</p>
            <h3>Vision</h3>
            <hr>
            <p>Wir streben danach, der ultimative Ort zu sein, an dem von der Sonne verwöhnte Küsten auf Ruhe treffen
                und zeitlose Erinnerungen für jeden Gast entstehen.</p>
        </div>

        <div class="hintergrund">
            <h2 class="ueberschriftHintergrund text-center" id="team">Das sind wir</h2>
            <div class="container-fluid">
                <div class="row p-5">
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="images/angi.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Angelina Reinwald</h4>
                                <p class="card-text" style="text-align: center;">Angelina ist Teil der Geschäftsleitung. Sie gehört zum Team der
                                    drei Geschäftsführerinnen.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="images/corinna.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Corinna Wallner</h4>
                                <p class="card-text" style="text-align: center;">Corinna ist Teil der Geschäftsleitung. Sie gehört zum Team der drei
                                    Geschäftsführerinnen.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="images/lucie.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Lucie Schmid</h4>
                                <p class="card-text" style="text-align: center;">Lucie ist Teil der Geschäftsleitung. Sie gehört zum Team der drei
                                    Geschäftsführerinnen.</p>
                            </div>
                        </div>
                    </div>

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