<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausgabe</title>
    <link rel="stylesheet" type="text/css" href="stand.css">
</head>

<body>
    <?php
    $sicher = $_POST['sicher'];
    if ($sicher == "ja") {
        //DB Verbindung
        require_once('db.php');

        //SQL-Statement aufbauen
        try {
            $statement = $pdo->prepare("INSERT INTO buchung(nachname, vorname, anschrift, ort, telefon, wieAlt, zimmer,
                       personenProZimmer,anreise, abreise, verpflegung) 
                       VALUES (:nachname, :vorname, :anschrift, :ort, :telefon, :wieAlt, :zimmer, :personenProZimmer, :anreise, :abreise, :verpflegung)");
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

            //Statement ausführen
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Fehler beim buchen.");
        }
        echo "<h2>Vielen Dank für das bestätigen ihrer Daten. Ihre Buchung konnte erfolgreich durchgeführt werden.
        Hier wartet alles nurmehr auf sie!</h2>";
    }else{
        
    }
    ?>
</body>

</html>