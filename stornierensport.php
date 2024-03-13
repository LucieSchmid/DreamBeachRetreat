<?php
require_once("autorisieren.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="standf.css">
    <title>Stornieren</title>
</head>

<body>
    <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
    <header>
        <div style="float:left; padding:5px; padding-bottom:0px;"><a href="hauptseite.php"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></a></div>
        <h1>Dream Beach Retreat</h1>
    </header>

    <h2 style="margin: 0px;">Buchung stornieren</h2>

    <?php
    $id = null;

    if (isset($_POST['senden'])) {
        if (empty($_POST['auswahl'])) {
            echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
        } else {

            if ($_POST['auswahl'] == "ja") {
                require_once('db.php');

                if (isset($_POST['id'])) {
                    $id = $_POST['id'];

                    try {
                        $statement = $pdo->prepare("DELETE FROM sportb WHERE id = ?");
                        $statement->execute([$id]);

                        echo "<br><br><p>Buchung erfolgreich storniert.</p>";
                        echo "<a href='adminseite.php'>Zurück zur Adminseite</a>";
                        exit(); // Beenden Sie das Skript nach der erfolgreichen Aktion.
                    } catch (PDOException $ex) {
                        die("Fehler beim Löschen des Datensatzes: " . $ex->getMessage());
                    }
                }
            } else if ($_POST['auswahl'] == "nein") {
                echo "<br><br>Buchung wurde nicht storniert.<br>";
                echo "<a href='adminseite.php'> Zurück </a>";
                exit();
            }
        }
    }
    ?>

    <h3>Sind Sie sich sicher, dass Sie diese Buchung stornieren wollen?</h3>

    <form method="POST" action="stornierensport.php">

        <input type="radio" value="ja" name="auswahl"> Ja
        <input type="radio" value="nein" name="auswahl" checked> Nein <br><br>

        <!-- Verwenden Sie die GET-Variable direkt im Hidden-Feld -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">

        <input type="submit" value="Senden" name="senden">

    </form>
</body>

</html>