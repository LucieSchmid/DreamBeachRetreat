<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stand.css" />
    <title>Document</title>
</head>

<body>

    <?php


    if (!isset($_SESSION['email'])) {
        echo "Sie müssen sich zuerst anmelden. <a href='login.php'>Hier geht es zum Login.</a>";
    } else {
        if (isset($_POST['buchen'])) {
            if ((empty($_POST['wasser']) && empty($_POST['land']))) {
                echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
            } else {

                $wasser = $_POST['wasser'];
                $land = $_POST['land'];
                $email = $_SESSION['email'];

                echo "<h1>Dream Beach Retreat - Sportbuchung</h1>";
                echo "<p>Vielen Dank für Ihre Buchung!</p><br>";


                echo $_SESSION['email'] . "<br>";



                require_once('db.php');


                try {

                    $statement = $pdo->prepare("INSERT INTO sportb (email, art) VALUES (:email, :art)");

                    $statement->bindParam(':email', $email);
                    $statement->bindParam(':art', $art);

                    $statement->execute();
                } catch (PDOException $ex) {
                    die("Fehler beim Einfügen der Daten in die Datenbank!");
                }
            }
        } else {
    ?>


            <h1>Sport-Angebote</h1>
            <p style="font-style: italic" ;>Hinweis: </p>
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

                <label>Wassersport:</label><br>
                <input type="checkbox" value="Stand-up Paddeln" name="wasser">Stand-up Paddeln<br>
                Wochentag: Samstags<br>
                Uhrzeit: 10:00 Uhr<br>
                Preis: 25.00€<br><br>
                <input type="checkbox" value="Segeln" name="wasser">Segeln<br>
                Wochentag: Freitags<br>
                Uhrzeit: 14:00 Uhr<br>
                Preis: 25.00€<br><br>
                <input type="checkbox" value="Surfen" name="wasser">Surfen<br>
                Wochentag: Donnerstags<br>
                Uhrzeit: 10:00 Uhr<br>
                Preis: 25.00€
                <br><br><br><br>

                <label>Landsport:</label><br>
                <input type="checkbox" value="Volleyball" name="land">Volleyball<br>
                Wochentag: Montags<br>
                Uhrzeit: 15:00 Uhr<br>
                Preis: 20.00€<br><br>
                <input type="checkbox" value="Tennis" name="land">Tennis<br>
                Wochentag: Dienstags<br>
                Uhrzeit: 16:00 Uhr<br>
                Preis: 20.00€<br><br>
                <input type="checkbox" value="Basketball" name="land">Basketball<br>
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