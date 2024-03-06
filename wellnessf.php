<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellnessformular</title>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="standf.css">
</head>

<body>
    <header>
        <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
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
                <br>
                <label>Wellness-Art:</label><br><br>

                <?php
                require_once('db.php');
                try {
                    $statement = $pdo->prepare("SELECT * FROM wellnessf");
                    $statement->execute();

                    if ($statement->rowCount() > 0) {
                        while ($row = $statement->fetch()) {
                            echo '<input type="radio" name="art" value="' . $row['art'] . '">';

                            echo 'Art: ' . $row['art'] . '<br>';
                            echo 'Preis: ' . $row['preis'] . '€<br>';
                            echo 'Uhrzeit: ' . $row['uhrzeit'] . '<br><br>';
                        }
                    } else {
                        echo "Keine Wellness-Angebote gefunden.";
                    }
                } catch (PDOException $ex) {
                    die("Fehler beim Ausgeben der Daten!");
                }

                ?>

                <input type="submit" value="Buchen" name="buchen" class="button">

            </form>


    <?php
        }
    }

    ?>

</body>

</html>