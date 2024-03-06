<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link href="layout.css" rel="stylesheet">

    <title>Restaurant</title>
</head>

<body>
    <header>
        <li class="hintergrund" style="display: grid; grid-template-columns: 100px ; grid-template-rows: 50px 50px; padding-bottom: 10px;">
            <a href="hauptseite.html"><img src="images/logo.png" width="60" height="60" alt="Logo" class="img-fluid rounded m-4" aligen="left" style="grid-row: 1 / 2"></a>
            <h1 style="grid-row: 1; grid-column: 2; text-align: left; margin-top: 20px;">Dream Beach Retreat</h1>
            <i style="grid-row: 2 ; grid-column: 2; text-align: left; margin-top: 10px; padding-top: 4px;">Entspannen,
                Auftanken und Genießen - Dein Rückzugsort am Strand.</i>
        </li>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-1">
            <div class="container-fluid" data-bs-theme="dark">
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
                        <li class="nav-item">
                            <a class="nav-link" href="wellness.php">Wellnessangebote</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="restaurant.php">Restaurant</a>
                        <li class="nav-item">
                            <a class="nav-link" href="agb.html">rechtliche Information</a>
                        </li>
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
    <main class="hintergrund">
        <h1 style="text-align: center;">Unser Restaurant</h1>

        <p>Willkommen in "BikiniBottom" - einem einzigartigen Restaurant, das Ihre Sinne auf eine kulinarische Reise
            mitnimmt! Unser Restaurant ist der perfekte Ort, um exquisiten Geschmack, gemütliche Atmosphäre und
            erstklassigen Service zu erleben.
        </p>

        <p>Die Inneneinrichtung von "BikiniBottom" spiegelt eine harmonische Mischung aus modernem Stil und zeitloser
            Eleganz wider. Der Raum ist liebevoll gestaltet, um eine warme und einladende Atmosphäre zu schaffen, die
            dazu
            einlädt, die kulinarischen Köstlichkeiten in vollen Zügen zu genießen.
        </p>

        <p>Wir bieten Ihnen viele Möglichkeiten der Zufriedenstellung mit unseren vielfältigen und kulturellen
            Speisen.<br>
            Unsere Speisekarte ist eine Huldigung an die Vielfalt der internationalen Küche, von klassischen Gerichten
            bis
            hin zu innovativen Kreationen. Die Zutaten, die wir verwenden, sind sorgfältig ausgewählt und stammen
            vorwiegend
            von lokalen Bauern und Produzenten, um die Frische und Qualität unserer Speisen zu gewährleisten.
        </p>
        <object width="100%" height="9550px" type="application/pdf" data="images/gesamt.pdf#toolbar=0" style="overflow: hidden;"></object>
        <a href="images/gesamt.pdf" target="_blank" class="btn btn-info m-1 blank">Gesamte Speisekarte</a>

    </main>
    <footer>
        <div class="bg-dark text-white pt-3 mt-2">
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