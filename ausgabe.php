<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausgabe</title>
    <link rel="stylesheet" type="text/css" href="stand.css">
</head>

<body>
    <h1>
        <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="100" height="100" /></div>
        Dream Beach Retreat

    </h1>
    <?php
    $sicher = $_POST['sicher'];
    if ($sicher == "ja") {
        //DB Verbindung
        require_once('db.php');

        //SQL-Statement aufbauen
        try {
            $statement = $pdo->prepare("INSERT INTO buchung(nachname, vorname, anschrift, ort, telefon, wieAlt, zimmer,
                       personenProZimmer,anreise, abreise, verpflegung) 
                       VALUES (:nachname, :vorname, :anschrift, :ort, :telefon, :wieAlt, :zimmer, :personenProZimmer, :anreise, :abreise, :verpflegung)");
            //alle PLatzhalter mit Werten belegen (binden)
            $statement->bindParam(":nachname", $_SESSION['nachname']);
            $statement->bindParam(":vorname", $_SESSION['vorname']);
            $statement->bindParam(":anschrift", $_SESSION['anschrift']);
            $statement->bindParam(":ort", $_SESSION['ort']);
            $statement->bindParam(":telefon", $_SESSION['tel']);
            $statement->bindParam(":wieAlt", $_SESSION['alter']);
            $statement->bindParam(":zimmer", $_SESSION['zimmerAnz']);
            $statement->bindParam(":personenProZimmer", $_SESSION['personenAnz']);
            $statement->bindParam(":anreise", $_SESSION['anreise']);
            $statement->bindParam(":abreise", $_SESSION['abreise']);
            $statement->bindParam(":verpflegung", $_SESSION['verpflegung']);

            //Statement ausführen
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Fehler beim buchen.");
        }
        echo "<h2 style='color:rgb(8,48,69)';>Vielen Dank für das bestätigen ihrer Daten. Ihre Buchung konnte erfolgreich durchgeführt werden.
        <br>Hier wartet alles nurmehr auf sie!</h2>";
        echo"<h3>Entdecken Sie unser Hotel, wo Erholung und Aktivitäten Hand in Hand gehen!<br></h3>
        <h4>Neben unseren komfortablen Unterkünften bieten wir auch ein umfangreiches Sport- und Wellnessangebot.<br>
        Von Fitnessräumen bis hin zu entspannenden Spa-Behandlungen - wir haben alles, um Ihren Aufenthalt unvergesslich zu machen.<br>
        Gönnen Sie sich eine Auszeit und erleben Sie pure Erholung bei uns im Dream Beach Retreat.</h4>";
    } else { //Wenn kunde beim Bestätigen auf nein klickt und seine EInträge ausbessern möchte
    ?>
        <h3>Keine Sorge, klicken Sie einfach auf <i>erneut buchen.</i><br></div>Ihre bisherigen Einträge
            werden nicht gespeichert. Füllen Sie einfach erneut die Felder aus.</h3>


        <form method="post">
            <input type="submit" name="erneutBuchen" value="erneut buchen" />
        </form>
    <?php

        if (isset($_POST['erneutBuchen'])) {
            $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/buchung.php';
            header('Location: ' . $pfad);
        }
    }
    ?>
</body>

</html>