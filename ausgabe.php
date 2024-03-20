<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausgabe</title>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="standf.css">
</head>

<body>
    <header>
        <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
        <h1>
            <div style="float:left; padding:5px;"><a href="hauptseite.php"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></a></div>
            Dream Beach Retreat
        </h1>
    </header>
    <?php
    $sicher = $_POST['sicher'];
    if ($sicher == "ja") {

        // Konfiguration für die E-Mail
        $empfaenger = "schmid.lucie@hakspittal.at"; // Die E-Mail-Adresse des Administrators
        $betreff = "Neue Buchung"; // Betreff der E-Mail
        $absender = $_SESSION['email'];
        $mailtext = "<br>Es wurde eine neue Buchung getätigt. <br><br> Die Daten sind:
                        <table>
                            <tr>
                                <td>Name:</td> 
                                <td>" . $_SESSION['nachname'] . " " . $_SESSION['vorname'] . "</td>
                            </tr>
                            <tr>
                                <td>Anreise:</td>
                                <td>" . $_SESSION['anreise'] . "</td>
                            </tr>
                            <tr>
                                <td>Abreise:</td>
                                <td>" . $_SESSION['abreise'] . "</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>" . $_SESSION['email'] . "<td>
                            <tr>
                        </table>"; // Nachricht der E-Mail
        $antwortan  = "schmid.lucie@hakspittal.at";

       echo $empfaenger . " " . $betreff . " " . $absender . " " . $mailtext;

        // Senden der E-Mail
        mail( $empfaenger,
                $betreff,
                $mailtext,
                "From: $absender\n Reply-To: $antwortan");
        echo "Mail wurde gesendet!";

        //DB Verbindung
        require_once('db.php');

        //SQL-Statement aufbauen
        try {
            $statement = $pdo->prepare("INSERT INTO buchung(nachname, vorname, anschrift, ort, telefon, wieAlt, zimmer,
                       personenProZimmer,anreise, abreise, verpflegung, email) 
                       VALUES (:nachname, :vorname, :anschrift, :ort, :telefon, :wieAlt, :zimmer, :personenProZimmer, :anreise, :abreise, :verpflegung, :email)");
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

            $statement->bindParam(":email", $_SESSION['email']);

            //Statement ausführen
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Fehler beim buchen.");
        }
        echo "<h3 style='color:rgb(255,255,255)';>Vielen Dank für das Bestätigen ihrer Daten. Ihre Buchung konnte erfolgreich durchgeführt werden.
        <br>Hier wartet alles nurmehr auf sie!</h3>";
        echo "<h3>Entdecken Sie unser Hotel, wo Erholung und Aktivitäten Hand in Hand gehen!<br></h3>
        <h4>Neben unseren komfortablen Unterkünften bieten wir auch ein umfangreiches Sport- und Wellnessangebot.<br>
        Von Fitnessräumen bis hin zu entspannenden Spa-Behandlungen - wir haben alles, um Ihren Aufenthalt unvergesslich zu machen.<br>
        Gönnen Sie sich eine Auszeit und erleben Sie pure Erholung bei uns im Dream Beach Retreat.</h4>";

        echo "Schauen Sie sich auf unserer Homepage gerne nach unseren Zusatzangeboten um. Haben wir ihr Interesse geweckt?
        <br> Dann buchen Sie sich doch gleich ihr Zusatzangebot GRATIS zu ihrem Aufenthalt hinzu.
        <br>
        <br>
        <a link href='wellnessf.php' style='color:#A0EEFE'>Klicken Sie hier </a>, um unser Wellnessangebot zu nutzen.
        <br>
        <a link href='sportf.php' style='color:#A0EEFE'>Klicken Sie hier </a>, um unser Sportangebot zu nutzen.";
    } else { //Wenn kunde beim Bestätigen auf nein klickt und seine EInträge ausbessern möchte
    ?>
        <h3>Keine Sorge, klicken Sie einfach auf <i>erneut buchen.</i><br></div>Ihre bisherigen Einträge
            werden nicht gespeichert. Füllen Sie einfach erneut die Felder aus.</h3>


        <form method="post">
            <input type="submit" name="erneutBuchen" value="erneut buchen" class="button" />
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