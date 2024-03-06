<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestätigen</title>
</head>

<body>
    <h3>Willst du diesen Datensatz wirklich bestätigen?</h3>

    <?php

    $id;
    $datum;
    $vnname;
    $punkte;
    $screenshot;

    if (isset($_GET['id']) && isset($_GET['datum']) && isset($_GET['vnname']) && isset($_GET['punkte']) && isset($_GET['screenshot'])) {
        //Die Daten aus $_GET auslesen
        $id = htmlspecialchars(trim($_GET['id']));
        $datum = htmlspecialchars(trim($_GET['datum']));
        $vnname = htmlspecialchars(trim($_GET['vnname']));
        $punkte = htmlspecialchars(trim($_GET['punkte']));
        $screenshot = htmlspecialchars(trim($_GET['screenshot']));

        echo "Name: " . $vnname . "<br>" .
            "Datum: " . $datum . "<br>" .
            "Punkte: " . $punkte . "<br><br>";
    ?>

        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <input type="radio" name="sicher" value="Ja">Ja
            <input type="radio" name="sicher" value="Nein" checked>Nein<br>

            <input type="submit" name="senden" value="Senden">

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="datum" value="<?php echo $datum; ?>">
            <input type="hidden" name="vnname" value="<?php echo $vnname; ?>">
            <input type="hidden" name="punkte" value="<?php echo $punkte; ?>">
            <input type="hidden" name="screenshot" value="<?php echo $screenshot; ?>">
        </form>

    <?php
    } else if (isset($_POST['senden'])) {
        if (isset($_POST['id']) && isset($_POST['datum']) && isset($_POST['vnname']) && isset($_POST['punkte']) && isset($_POST['screenshot'])) {

            $id = $_POST['id'];
            $vnname = $_POST['vnname'];
            $punkte = $_POST['punkte'];
            $datum = $_POST['datum'];
            $screenshot = $_POST['screenshot'];

            if ($_POST['sicher'] == "Ja") {

                require_once('dbConnection.php');
                $bestaetigt = 1;

                try {
                    $statement = $pdo->prepare("UPDATE guitarwars SET bestaetigt=1 WHERE id=:id");

                    $statement->bindParam(':id', $id);

                    $statement->execute();

                    echo "Dieser Highscore wird jetzt in der Highscoreliste angezeigt.";
                    echo "<br><a href='admin.php'>Zurück zur Adminseite</a>";
                    echo "<br><a href='index.php'>Zurück zum Highscoreliste</a>";
                } catch (PDOException $e) {
                    die("Der Highscore kann nicht auf der Highscoreliste angezeigt werden.");
                }
            } else if ($_POST['sicher'] == "Nein") {
                echo "Die Daten wurden nicht bestätigt!<br>";
                echo "<a href='hsmelden2.php'>Highscore melden</a>";
                echo "| <a href='index.php'>Highscoreliste</a>";
                echo " | <a href='admin.php'>Adminseite</a>";
            }
        }
    } else {
        echo "Ihr Datensatz konnte nicht gefunden werden!";
        echo "<a href='admin.php'>Zurück</a>";
    }

    ?>
</body>

</html>