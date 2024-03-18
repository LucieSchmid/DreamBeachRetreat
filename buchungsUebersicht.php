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
    <h3>Ihre geplanten Aufenthalte im Dream Beach Retreat:</h3>
    <?php
        require_once('db.php');
        try{
            $statement = $pdo->prepare("SELECT * FROM buchung WHERE email= '$email'");
            $statement->execute();

            $heute = time();
            $count = false;
            $stehtDa = false;

            echo "<table>";
            
            if($statement->rowCount() > 0){
                while($zeile = $statement->fetch()){
                    if(strtotime($zeile['anreise']) >  $heute){
                    // Ihr Ausgangsdatum als String
                    $date_string = $zeile['anreise'];
                    $date_string1 = $zeile['abreise'];

                    // Das Datum in ein Unix-Timestamp umwandeln
                    $timestamp = strtotime($date_string);
                    $timestamp1 = strtotime($date_string1);

                    // Array mit den deutschen Monatsnamen definieren
                    $german_month_names = array(
                        "Januar", "Februar", "März", "April", "Mai", "Juni",
                        "Juli", "August", "September", "Oktober", "November", "Dezember"
                    );

                    // Datum im gewünschten Format ausgeben
                    $formatted_date = date("d. ", $timestamp) . $german_month_names[date("n", $timestamp) - 1] . date(" Y", $timestamp);
                    $formatted_date1 = date("d. ", $timestamp1) . $german_month_names[date("n", $timestamp1) - 1] . date(" Y", $timestamp1);


                        echo "<tr>" .
                            "<td width=230;>vom <b>" . $formatted_date. "</b></td>" .
                            "<td width=200;>bis <b>" . $formatted_date1. "</b></td>" .
                            "<td width=200;>mit <b>" . $zeile['zimmer']. "</b> Zimmern</td>" .
                            "<td width=380;>für jeweils <b>" . $zeile['personenProZimmer']. " Personen pro Zimmer</b></td>" .
                            "<td width=380;>mit einer <b>" . $zeile['verpflegung']. "</b> </td>" .
                            "</tr>";
                        $stehtDa = true;
                        
                    }
                }
            }
            echo "</table>";

        }catch(PDOException $ex){
            die("Fehler beim Ausgeben der Daten in die Datenbank!");
        }
    ?>
    <h3>Ihre Sportbuchungen:</h3>
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

    <h3>Ihre Wellnessbuchungen:</h3>
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