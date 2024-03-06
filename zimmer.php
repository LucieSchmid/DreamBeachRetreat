<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link href="layout.css" rel="stylesheet">

    <title>Zimmer&Apartments</title>
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
                        <li class="nav-item dropdown" data-bs-theme="dark">
                            <a class="nav-link dropdown-toggle" href="zimmer.php" role="button" data-bs-toggle="dropdown">Zimmer & Apartments</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#zimmer">Zimmer</a></li>
                                <li><a class="dropdown-item" href="#apartments">Apartments</a></li>
                            </ul>
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
                            <a class="nav-link" href="agb.php">rechtliche Information</a>
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
    <main>
        <p class="hintergrund" style="text-align: center;">Sehr geehrte/r Kunde/Kundin, wir möchten Sie darauf hinweisen, dass wenn Sie ein Zimmer
            bzw. ein Apartment
            buchen,
            <br>
            Sie auch inklusiv die Sport- und Wellnessangebote nutzen können, natürlich ist es kein muss.
        </p>

        <h1 class="zimmer" style="color: white" id="zimmer">Zimmer</h1>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Einzelzimmer</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/EZ.jpg" alt="Einzelzimmer" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Dieses Einzelzimmer ist perfekt für einen ruhigen Entspannenden Urlaub alleine.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 1 Person</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>


        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Doppelzimmer</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/DZ.jpg" alt="Doppelzimmer" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Diese Doppelzimmer ist perfekt für einen ruhigen, entspannten Urlaub mit Freunden.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 1 Person</li>
                        <li>getrennte Betten</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Doppelzimmer</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/doppelzimmer.jpg" alt="Doppelzimmer" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Diese Doppelzimmer ist perfekt für einen ruhigen, entspannten und romantischen Urlaub zu zweit.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 2 Person</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Familienzimmer</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/familienzimmer.jpg" alt="Doppelzimmer" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Diese Familienzimmer ist perfekt für einen ruhigen, entspannten und spannenden Urlaub mit der Familie.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 4 Person</li>
                        <li>Zwei Zimmer mit Durchgangstür</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Familienzimmer</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/familienzimmer1.jpg" alt="Familienzimmer" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Diese Familienzimmer ist perfekt für einen ruhigen, entspannten und spannenden Urlaub mit der Familie.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 5 Person</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <h1 class="zimmer" id="apartments">Häuser | Apartments</h1>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Apartment</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/apartment1.jpg" alt="Apartment" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Diese Apartment ist perfekt für einen ruhigen, entspannten und spannenden Urlaub mit der Familie oder Freunden.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 6 Person</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>



        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Bungalow</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/bungalow.jpg" alt="Bungalow" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Dieser Bungalow ist perfekt für einen ruhigen, entspannten und spannenden Urlaub mit der Familie oder mit Freunden.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 8 Person</li>
                        <li>Meerblick</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
                </div>
            </div>
        </div>

        <div class="container p-2 hinterZimmer">
            <div class="row">
                <h2 class="text-center">Strandvilla</h2>
                <div class="col-12 col-md-6 pt-3">
                    <img src="images/strandvilla.jpg" alt="Strandvilla" class="img-fluid rounded">
                </div>
                <div class="col-12 col-md-5 p-2">
                    Diese Strandvilla ist perfekt für einen ruhigen, entspannten und spannenden Urlaub mit der Familie oder mit Freunden.
                    <h5>Serviceleistungen und Ausstattung:</h5>
                    <ul>
                        <li>Maximal 10 Person</li>
                        <li>Meerblick</li>
                        <li>Pool</li>
                        <li>Badezimmer mit Dusche</li>
                        <li>Küche <br>Kühlschrank mit Tiefkühlmöglichkeit, Kaffeemaschine, ...</li>
                        <li>Klimaanlage</li>
                        <li>Terrasse oder Balkon</li>
                        <li>Haartrockner</li>
                        <li>W-LAN</li>
                    </ul>
                    <a href="buchung.php" class="btn btn-info">Jetzt buchen</a>
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