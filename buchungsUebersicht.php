<?php
session_start();
/*diese Seite dient asl Überischt für den Kunden
hier kann er all seine Buchungen (Aufenthalt, Sport, Wellness)
im Überblick behalten*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="standf.css">
    <title>Deine Buchungen</title>
</head>

<body>
    <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
    <header>
        <div style="float:left; padding:5px; padding-bottom:0px;"><a href="hauptseite.php"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></a></div>
        <h1>Dream Beach Retreat</h1>
    </header>

    <h2 style="margin: 0px;">Ihre Buchungen</h2>
    <h4>Verschaffen Sie sich ganz einfache einen Überblick über ihre getätigten Buchungen.<br>
        Hier finden Sie genaue Informationen über die Destination und den Zeitpunkt ihrer Buchungen.
    </h4>

    <?php
    $email = $_SESSION['email'];
    echo "Buchungen von: $email";
    ?>
    <h4>Ihre Sportbuchungen</h4>
    <?php
    require_once('db.php');
    try {
        $statement = $pdo->prepare("SELECT * FROM sportb WHERE email= '$email'");
        $statement->execute();

        echo "<table>";
        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                echo "<tr>" .
                    "<td width=200;>" . $zeile['art'] . "</td>" .
                    "<td width=150;>" . $zeile['wochentag'] . "s" . "</td>" .
                    "<td>" . "um " . $zeile['uhrzeit'] . " Uhr" . " </td>" .
                    "</tr>";
            }
        }
        echo "</table>";
    } catch (PDOException $ex) {
        die("Fehler beim Ausgeben der Daten in die Datenbank!");
    }
    ?>

    <h4>Ihre Wellnessbuchungen</h4>
    <?php
    require_once('db.php');
    try {
        $statement = $pdo->prepare("SELECT * FROM wellnessb WHERE email= '$email'");
        $statement->execute();

        echo "<table>";
        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                echo "<tr>" .
                    "<td width=200;>" . $zeile['art'] . "</td>" .
                    "<td>" . " jeden Tag um " . $zeile['uhrzeit'] . " Uhr" . "</td>" .
                    "</tr>";
            }
        }
        echo "</table>";
    } catch (PDOException $ex) {
        die("Fehler beim Ausgeben der Daten in die Datenbank!");
    }
    ?>

</body>

</html>