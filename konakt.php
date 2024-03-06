<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktformular</title>

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

    require_once('appKonstanten.php');


    if (isset($_POST['senden'])) {
        if (empty($_POST['vorname']) || empty($_POST['nachname']) || empty($_POST['email']) || empty($_POST['nachricht'])) {
            echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
        } else {

            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $email = $_POST['email'];
            $nachricht = $_POST['nachricht'];

            //Auslesen der Daten vom File
            $screenshot_name = $_FILES['screenshot']['name'];
            $screenshot_typ = $_FILES['screenshot']['type'];
            $screenshot_groesse = $_FILES['screenshot']['size'];
            $screenshot_temp_name = $_FILES['screenshot']['tmp_name'];


            if (($screenshot_typ == 'image/jpeg' || $screenshot_typ == 'image/png' || $screenshot_typ == 'image/gif') &&
                $screenshot_groesse > 0 && $screenshot_groesse <= GW_MAXDATEIGROESSE
            ) {

                $ziel = GW_IMAGEPFAD . $screenshot_name;

                //Verschieben der Datei aus dem temorären Ordner in den Zielordner auf dem Webserver
                //Die Funktion move_uploaded_file liefert TRUE zurück, wenn das File in den Zielordner verschoben wurde,
                //andernfalls wird FALSE zurückgegeben.
                if (move_uploaded_file($screenshot_temp_name, $ziel)) {

                    try {
                        //Verbindungsaufbau und INSERT in die Datenbank
                        require_once('db.php');

                        //INSERT vorbereiten
                        $stmt = $pdo->prepare("INSERT INTO kontakt (vorname, nachname, email, nachricht, screenshot) VALUES (:vorname, :nachname, :email, :nachricht, :screenshot)");
                        //Platzhalter mit Werten belegen
                        $stmt->bindParam(':vorname', $vorname);
                        $stmt->bindParam(':nachname', $nachname);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':nachricht', $nachricht);
                        $stmt->bindParam(':screenshot', $screenshot_name);


                        //Ausführen des Statements
                        $stmt->execute();

                        //Am Server aufräumen - Datei aus Temp-Ordner entfernen
                        if (file_exists($screenshot_temp_name)) {

                            //Löschen
                            unlink($screenshot_temp_name);
                        }


                        echo "<h2>Kontaktaufnahme </h2>";
                        echo "<p>Vielen Dank für Ihre Nachricht</p>";
                        echo $nachname . " " . $vorname . "<br>";

                        echo "<a link href='hauptseite.php'>Zurück zur Hauptseite</a>";
                    } catch (PDOException $e) {
                        echo "Der neue Highscore konnte nicht gespeichert werden.";
                    }
                } else {
                    echo "Die Datei konnte nicht hochgeladen werden";
                }
            } else {
                echo "Bitte wählen Sie eine geeignete Bilddatei aus.";
            }
        }
    } else {

    ?>


        <h2>Kontaktformular</h2><br>
        <i>Bitte geben Sie, falls Sie Beschwerden oder Wünsche haben, diese in diesem Formular an.</i>
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <br>
            <table>
                <tr>
                    <td><label for="nachname">(*)Nachname:</label></td>
                    <td><input type="text" id="nachname" class="larger-input" name="nachname" required></td>
                </tr>

                <tr>
                    <td><label for="vorname">(*)Vorname:</label></td>
                    <td><input type="text" class="larger-input" id="vorname" name="vorname" required></td>
                </tr>

                <tr>
                    <td><label>(*)E-Mail:</label></td>
                    <td><input type="email" class="larger-input" id="email" name="email" required></td>
                </tr>

                <tr>
                    <td><label>(*)Nachricht:</label></td>
                    <td><textarea class="nachricht" name="nachricht" required></textarea></td>
                </tr>

                <tr>
                    <td><label>Bild (falls nötig)</label></td>
                    <td><input type="file" class="larger-input" id="screen" name="screenshot"></td>
                </tr>

            </table>

            <br>
            <i>(*) Pflichtfeld</i>
            <br><br>

            <input type="submit" class="button" value="Absenden" name="senden">

        </form>

    <?php
    }

    ?>


</body>

</html>