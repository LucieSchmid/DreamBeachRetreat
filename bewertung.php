<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewertungsformular</title>
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

    if (isset($_POST['senden'])) {
        if (empty($_POST['rating']) || empty($_POST['nachricht'])) {
            echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
        } else {

            $bewertung = $_POST['rating'];
            $nachricht = $_POST['nachricht'];

            require_once('db.php');

            try {

                $stmt = $pdo->prepare("INSERT INTO bewertung (sterne, kommentar) VALUES (:rating, :nachricht)");

                $stmt->bindParam(':rating', $bewertung);
                $stmt->bindParam(':nachricht', $nachricht);

                $stmt->execute();

                echo "<h2>Bewerten Sie uns</h2><br>";
                echo "Wir bedanken uns für Ihre ehrliche Bewertung!<br>";
                echo "<a href='hauptseite.php'>Hier kommen Sie zurück zu der Hauptseite.</a>";
                exit();
            } catch (PDOException $ex) {
                die("Fehler beim Einfügen der Daten in die Datenbank!");
            }
        }
    } else {
    ?>

        <h2>Bewerten Sie uns</h2><br>
        <form method="post" action="bewertung.php">

            <label for="rating">Bewertung:</label>
            <select id="rating" name="rating" required>
                <option value="1">1 Stern</option>
                <option value="2">2 Sterne</option>
                <option value="3">3 Sterne</option>
                <option value="4">4 Sterne</option>
                <option value="5">5 Sterne</option>
            </select><br><br>

            <label for="nachricht">Kommentar:</label><br>
            <textarea class="nachricht" id="nachricht" name="nachricht" rows="4" cols="50" required></textarea><br><br>

            <input type="submit" class="button" value="Bewertung absenden" name="senden">
        </form>


    <?php
    }
    ?>
</body>

</html>