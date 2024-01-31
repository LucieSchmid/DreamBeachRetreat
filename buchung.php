<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="stand.css">
    <title>Buchungen</title>
</head>

<body>

    <h1>
        <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="100" height="100" /></div>
        Dream Beach Retreat
    </h1>
    <?php
    if (isset($_POST['submit'])) {
        //kontrollieren ob überhsaupt DAten da sind
        if (
            empty($_POST['nachname']) || empty($_POST['vorname']) || empty($_POST['anschrift']) || empty($_POST['ort'])
            || empty($tel = $_POST['tel']) || empty($_POST['alter']) || empty($_POST['zimmerAnz']) || empty($_POST['personenAnz'])
            || empty($_POST['verpflegung']) || empty($_POST['anreiseDatum']) || empty($_POST['anreiseZeit'])
            || empty($_POST['abreiseDatum']) || empty($_POST['abreiseZeit'])
        ) {
        //Wenn ja dass den Benutzer melden
            echo "Bitte geben Sie die nötigen Daten ein. Umso mehr wir über ihre Wünsche wissen, desto besser können wir
            ihren Urlaub planen.";
        } else {
        //Wenn alles da ist weitermachen
            //auspacken
            $nachname = trim(htmlspecialchars($_POST['nachname']));
            $vorname = trim(htmlspecialchars($_POST['vorname']));
            $anschrift = trim(htmlspecialchars($_POST['anschrift']));
            $ort = trim(htmlspecialchars($_POST['ort']));
            $tel = trim(htmlspecialchars($_POST['tel']));
            $alter = trim(htmlspecialchars($_POST['alter']));
            $zimmerAnz = trim(htmlspecialchars($_POST['zimmerAnz']));
            $personenAnz = trim(htmlspecialchars($_POST['personenAnz']));
            $verpflegung = trim(htmlspecialchars($_POST['verpflegung']));
            $anreise = trim(htmlspecialchars($_POST['anreiseDatum'])) . " " . trim(htmlspecialchars($_POST['anreiseZeit']));
            $abreise = trim(htmlspecialchars($_POST['abreiseDatum'])) . " " . trim(htmlspecialchars($_POST['abreiseZeit']));

            //DB Verbindung
            require_once('db.php');

            //SQL-Statement aufbauen
            try{   
                $statement = $pdo->prepare("INSERT INTO buchung(nachname, vorname, anschrift, ort, telefon, wieAlt, zimmer,
                personenProZimmer,anreise, abreise, verpflegung) 
                VALUES (:nachname, :vorname, :anschrift, :ort, :telefon, :wieAlt, :zimmer, :personenProZimmer, :anreise, :abreise, :verpflegung)");
                //alle PLatzhalter mit Werten belegen (binden)
                $statement->bindParam(":nachname", $nachname);
                $statement->bindParam(":vorname", $vorname);
                $statement->bindParam(":anschrift", $anschrift);
                $statement->bindParam(":ort", $ort);
                $statement->bindParam(":telefon", $tel);
                $statement->bindParam(":wieAlt", $alter);
                $statement->bindParam(":zimmer", $zimmerAnz);
                $statement->bindParam(":personenProZimmer", $personenAnz);
                $statement->bindParam(":anreise", $anreise);
                $statement->bindParam(":abreise", $abreise);
                $statement->bindParam(":verpflegung", $verpflegung);

                //Statement ausführen
               $statement-> execute();

               }catch(PDOException $e){
                   echo $e->getMessage();
               die("Fehler beim buchen.");
           }
   
           echo"<h2> Buchung erfolgreich!</h2>";
   
        }
    } else {
    ?>
        <h3>
            Buchen Sie jetzt! Sie sind nur noch wenige Mausklicks davon entfernt,
            den Urlaub Ihrer Träume zu erleben. Damit wir Ihren Aufenthalt so traumhaft wie möglich gestalten können,
            bitten wir Sie, uns einige Wünsche für Ihren Urlaub mitzuteilen.
        </h3>

        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">
            <p>Bitte beantworten Sie folgende Fragen:</p>
            <table>
                <tr>
                    <td><label for="nachname"> Wie lautet ihr Zuname? </label></td>
                    <td><input type="text" id="nachname" name="nachname" required></td>
                </tr>
                <tr>
                    <td><label for="vorname">Wie lautet ihr Vorname? </label></td>
                    <td><input type="text" id="vorname" name="vorname" required></td>
                </tr>
                <tr>
                    <td><label for="anschrift">Wie lautet ihre Anschrift(Straße & Hausnummer(Stockwerk/Tür))? </label></td>
                    <td><input type="text" id="anschrift" name="anschrift" required></td>
                </tr>
                <tr>
                    <td><label for="ort">In welchem Ort wohnen Sie (Wohnort & PLZ)? </label></td>
                    <td><input type="text" id="ort" name="ort" required></td>
                </tr>
                <tr>
                    <td><label for="tel">Wie lautet ihre Telefonnummer? </label></td>
                    <td><input type="text" id="tel" name="tel" required></td>
                </tr>
                <tr>
                    <td><label for="alter">Wie alt sind Sie? </label></td>
                    <td><input type="number" id="alter" name="alter" min="18" required></td>
                </tr>
                <tr>
                    <td><label for="zimmerAnz">Wie viele Zimmer wollen Sie buchen? </label></td>
                    <td><input type="number" id="zimemrAnz" name="zimmerAnz" min="1" required></td>
                </tr>
                <tr>
                    <td><label for="personenAnz">Wie viele Personen sollten diese Zimmer jeweils beherbergen? </label></td>
                    <td><input type="number" id="personenAnz" name="personenAnz" min="1" required></td>
                </tr>
                <tr>
                    <td><label for="verpflegung">Welche Art der Verpflegung wünschen Sie?</label></td>
                    <td><input type="radio" id="verpflegung" name="verpflegung" value="vollpension" required> Vollpension
                        <br>
                        <input type="radio" id="verpflegung" name="verpflegung" value="Halbpension" required> Halbpension
                    </td>
                </tr>
                <tr>
                    <td><label for="anreise">Wann beginnt ihr Urlaub bei Dream Beach Retreat? </label></td>
                    <td><input type="date" id="anreise" name="anreiseDatum" required />
                        <input type="time" id="anreise" name="anreiseZeit" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="abreise">Wann endet ihr Urlaub bei Dream Beach Retreat? </label></td>
                    <td><input type="date" id="abreise" name="abreiseDatum" required />
                        <input type="time" id="abreise" name="abreiseZeit" required />
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="jetzt buchen">
        </form>
    <?php
    }
    ?>
</body>

</html>