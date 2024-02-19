<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stand1.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>
            <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></div>
            Dream Beach Retreat
        </h1>
    </header>

    <?php

    $wasserOption;
    $landOption;


    if (!isset($_SESSION['email'])) {
        echo "Sie müssen sich zuerst anmelden. <a href='login.php'>Hier geht es zum Login.</a>";
    } else {
        if (isset($_POST['buchen'])) {
            if (empty($_POST['wasser']) && empty($_POST['land'])) {
                echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
            } else {

                $email = $_SESSION['email'];


                echo "<h2>Dream Beach Retreat - Sportbuchung</h2>";
                echo "<p>Vielen Dank für Ihre Buchung!</p>";

                echo $_SESSION['email'] . "<br>";


                require_once('db.php');


                try {

                    //ausgewählte Optionen in die Datenbank eintragen
                    if (!empty($_POST['wasser'])) {

                        foreach ($_POST['wasser'] as $wasserOption) {

                            // Abfrage, um Uhrzeit, Wochentag und Preis für die Sportart abzurufen
                            $query = $pdo->prepare("SELECT wochentag, uhrzeit, preis FROM sportf WHERE art = :art");
                            $query->bindParam(':art', $wasserOption);
                            $query->execute();
                            $row = $query->fetch(PDO::FETCH_ASSOC);


                            echo "Sportart:" . $wasserOption . "<br>";
                            echo "Wochentag: " . $row['wochentag'] . "<br>";
                            echo "Uhrzeit: " . $row['uhrzeit'] . "<br>";
                            echo "Preis: " . $row['preis'] . "€<br><br>";


                            $preis = $row['preis'];
                            $uhrzeit = $row['uhrzeit'];
                            $wochentag = $row['wochentag'];

                            // Option in die Datenbank eintragen
                            $statement = $pdo->prepare("INSERT INTO sportb (email, art, preis, uhrzeit, wochentag) VALUES (:email, :art, :preis, :uhrzeit, :wochentag)");
                            $statement->bindParam(':email', $email);
                            $statement->bindParam(':art', $wasserOption);
                            $statement->bindParam(':preis', $preis);
                            $statement->bindParam(':uhrzeit', $uhrzeit);
                            $statement->bindParam(':wochentag', $wochentag);
                            $statement->execute();
                        }
                    }

                    if (!empty($_POST['land'])) {
                        foreach ($_POST['land'] as $landOption) {
                            // Abfrage, um Uhrzeit, Wochentag und Preis für die Sportart abzurufen
                            $query = $pdo->prepare("SELECT wochentag, uhrzeit, preis FROM sportf WHERE art = :art");
                            $query->bindParam(':art', $landOption);
                            $query->execute();
                            $row = $query->fetch(PDO::FETCH_ASSOC);

                            // Informationen aus der Abfrage ausgeben
                            echo "Sportart:" . $landOption . "<br>";
                            echo "Wochentag: " . $row['wochentag'] . "<br>";
                            echo "Uhrzeit: " . $row['uhrzeit'] . "<br>";
                            echo "Preis: " . $row['preis'] . "€<br><br>";

                            $preis = $row['preis'];
                            $uhrzeit = $row['uhrzeit'];
                            $wochentag = $row['wochentag'];

                            //in Datenbank eintragen
                            $statement = $pdo->prepare("INSERT INTO sportb (email, art, preis, uhrzeit, wochentag) VALUES (:email, :art, :preis, :uhrzeit, :wochentag)");
                            $statement->bindParam(':email', $email);
                            $statement->bindParam(':art', $landOption);
                            $statement->bindParam(':preis', $preis);
                            $statement->bindParam(':uhrzeit', $uhrzeit);
                            $statement->bindParam(':wochentag', $wochentag);

                            $statement->execute();
                        }
                    }
                } catch (PDOException $ex) {
                    die("Fehler beim Einfügen der Daten in die Datenbank!");
                }
            }
        } else {
    ?>


            <h2>Sport-Angebote</h2><br>

            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

                <label>Wassersport:</label><br>
                <input type="checkbox" value="Stand-up Paddeln" name="wasser[]">Stand-up Paddeln<br>
                Wochentag: Samstags<br>
                Uhrzeit: 10:00 Uhr<br>
                Preis: 25.00€<br><br>
                <input type="checkbox" value="Segeln" name="wasser[]">Segeln<br>
                Wochentag: Freitags<br>
                Uhrzeit: 14:00 Uhr<br>
                Preis: 25.00€<br><br>
                <input type="checkbox" value="Surfen" name="wasser[]">Surfen<br>
                Wochentag: Donnerstags<br>
                Uhrzeit: 10:00 Uhr<br>
                Preis: 25.00€
                <br><br><br><br>

                <label>Landsport:</label><br>
                <input type="checkbox" value="Volleyball" name="land[]">Volleyball<br>
                Wochentag: Montags<br>
                Uhrzeit: 15:00 Uhr<br>
                Preis: 20.00€<br><br>
                <input type="checkbox" value="Tennis" name="land[]">Tennis<br>
                Wochentag: Dienstags<br>
                Uhrzeit: 16:00 Uhr<br>
                Preis: 20.00€<br><br>
                <input type="checkbox" value="Basketball" name="land[]">Basketball<br>
                Wochentag: Mittwochs<br>
                Uhrzeit: 09:00 Uhr<br>
                Preis: 20.00€
                <br><br><br>

                <input type="submit" value="Buchen" name="buchen">

            </form>


    <?php
        }
    }
    ?>

</body>

</html>