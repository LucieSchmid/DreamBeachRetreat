<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="stand1.css">
</head>

<body>
    <header>
        <h1>
            <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></div>
            Dream Beach Retreat
        </h1>
    </header>

    <?php

    $art;
    $preis;

    if (!isset($_SESSION['email'])) {
        echo "Sie müssen sich zuerst anmelden. <a href='login.php'>Hier geht es zum Login.</a>";
    } else {
        if (isset($_POST['buchen'])) {
            if (empty($_POST['art'])) {
                echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
            } else {

                $art = $_POST['art'];
                $email = $_SESSION['email'];

                echo "<h2>Dream Beach Retreat - Wellnessbuchung</h2>";
                echo "<p>Vielen Dank für Ihre Buchung!</p><br>";


                echo $_SESSION['email'] . "<br>";
                echo $art . "<br>";

                require_once('db.php');


                //Ausgeben der Daten aus der anderen Datenbank
                try {
                    $statement = $pdo->prepare("SELECT preis, uhrzeit FROM wellnessf WHERE art = :art");
                    $statement->bindParam(':art', $art);
                    $statement->execute();

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    $preis = $row['preis'];
                    $uhrzeit = $row['uhrzeit'];

                    echo $preis . "€ <br>";
                    echo $uhrzeit . " Uhr <br>";

                    //Daten eintragen in die Datenbank
                    try {

                        $statement = $pdo->prepare("INSERT INTO wellnessb (email, art, preis, uhrzeit) VALUES (:email, :art, :preis, :uhrzeit)");

                        $statement->bindParam(':email', $email);
                        $statement->bindParam(':art', $art);
                        $statement->bindParam(':preis', $preis);
                        $statement->bindParam(':uhrzeit', $uhrzeit);

                        $statement->execute();
                    } catch (PDOException $ex) {
                        die("Fehler beim Eintragen der Daten in die Datenbank.");
                    }
                } catch (PDOException $e) {
                    die("Fehler beim Ausgeben der Daten.");
                }
            }
        } else {
    ?>


            <h2>Wellness-Angebote</h2><br>
            <i>Hinweis: Die Wellnessangebote gibt es an egal welchen Wochentag zur Verfügung.</i>
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

                <label>Wellness-Art:</label><br>
                <input type="radio" name="art" value="Massage (alles)">Massage (alles)<br>Preis: 45,00€ <br>Uhrzeit: 19:00 Uhr<br><br>
                <input type="radio" name="art" value="Thai-Massage" checked>Tai-Massage <br>Preis: 30,00€<br>Uhrzeit: 20:00 Uhr<br><br>
                <input type="radio" name="art" value="Rückenmassage">Rückenmassage <br>Preis: 25,00€<br>Uhrzeit: 21:00 Uhr<br><br>
                <input type="radio" name="art" value="Fußmassage"> Fußmassage<br> Preis: 25,00€<br>Uhrzeit: 20:30 Uhr
                <br><br>

                <input type="submit" value="Buchen" name="buchen">

            </form>


    <?php
        }
    }
    ?>

</body>

</html>