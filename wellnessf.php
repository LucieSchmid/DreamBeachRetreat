<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $art;


    if (!isset($_SESSION['email'])) {
        echo "Sie müssen sich zuerst anmelden. <a href='login.php'>Hier geht es zum Login.</a>";
    } else {
        if (isset($_POST['buchen'])) {
            if (empty($_POST['art'])) {
                echo "<h2>Die Pflichtfelder wurden nicht ausgefüllt.</h2>";
            } else {

                $art = $_POST['art'];
                $email = $_SESSION['email'];

                echo "<h1>Dream Beach Retreat - Wellnessbuchung</h1>";
                echo "<p>Vielen Dank für Ihre Buchung!</p><br>";


                require_once('db.php'); 

                



                echo $_SESSION['email'] . "<br>";
                echo $art;


                try {

                    $statement = $pdo->prepare("SELECT preis FROM wellnessf WHERE art = $art");

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



        <h1>Wellness-Angebote</h1>
        <p>Hinweis: Die Wellnessangebote gibt es an egal welchen Wochentag zur Verfügung.</p>
        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <label>Wellness-Art:</label><br>
            <input type="radio" name="art" value="Massage (alles)">Massage (alles)<br>Preis: 45,00€ <br>Uhrzeit: 19:00 Uhr<br><br>
            <input type="radio" name="art" value="Tai-Massage" checked>Tai-Massage <br>Preis: 30,00€<br>Uhrzeit: 20:00 Uhr<br><br>
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