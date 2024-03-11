<?php
require_once("autorisieren.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="standf.css">
    <title>Buchungen</title>
</head>

<body>
    <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
    <header>
        <div style="float:left; padding:5px; padding-bottom:0px;"><a href="hauptseite.php"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></a></div>
        <h1>Dream Beach Retreat</h1>
    </header>

    <h2 style="margin: 0px;">Die ganzen Buchungen</h2>

    <h4>Alle Sportbuchungen</h4>

    <?php


    require_once('db.php');
    try {
        $statement = $pdo->prepare("SELECT * FROM sportb");
        $statement->execute();

        echo "<table>";
        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                echo "<tr>" .
                    "<td width=25;>" . $zeile['id'] . " </td>" .
                    "<td width=200;>" . $zeile['email'] . " </td>" .
                    "<td width=200;>" . $zeile['art'] . "</td>" .
                    "<td width=150;>" . $zeile['wochentag'] . "s" . "</td>" .
                    "<td width=200;>" . "um " . $zeile['uhrzeit'] . " Uhr" . " </td>" .
                    "<td width=425;>" . "gebucht am " . $zeile['zeitBuchung'] . " Uhr" . " </td>" .
                    "<td width=75;>"  . $zeile['preis'] . " €" . " </td>" .
                    "<td><a href='stornierensport.php?id=" . $zeile['id'] . "'>Stornieren</a></td>" .

                    "</tr>";
            }
        }
        echo "</table>";
    } catch (PDOException $ex) {
        die("Fehler beim Ausgeben der Daten in die Datenbank!");
    }
    ?>

    <h4>Alle Wellnessbuchungen</h4>
    <?php
    require_once('db.php');
    try {
        $statement = $pdo->prepare("SELECT * FROM wellnessb");
        $statement->execute();

        echo "<table>";
        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                echo "<tr>" .
                    "<td width=25;>" . $zeile['id'] . " </td>" .
                    "<td width=200;>" . $zeile['email'] . "</td>" .
                    "<td width=200;>" . $zeile['art'] . "</td>" .
                    "<td width=300;>" . " jeden Tag um " . $zeile['uhrzeit'] . " Uhr" . "</td>" .
                    "<td width=75;>" . $zeile['preis'] . " €" . "</td>" .
                    "<td><a href='stornierenwellness.php?id=" . $zeile['id'] . "'>Stornieren</a></td>" .
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