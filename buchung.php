<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="standf.css">
    <title>Buchungen</title>
</head>

<body>
    <header>
        <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
    </header>
    <?php
    if (!isset($_SESSION['email'])) {
        echo "Sie müssen sich zuerst anmelden. <a href='login.php'>Hier geht es zum Login.</a>";
    } else {
    ?>
        <header>
            <h1>
                <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></div>
                Dream Beach Retreat
            </h1>
        </header>
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
                $_SESSION['nachname'] = trim(htmlspecialchars($_POST['nachname']));
                $_SESSION['vorname'] = trim(htmlspecialchars($_POST['vorname']));
                $_SESSION['anschrift'] = trim(htmlspecialchars($_POST['anschrift']));
                $_SESSION['ort'] = trim(htmlspecialchars($_POST['ort']));
                $_SESSION['tel'] = trim(htmlspecialchars($_POST['tel']));
                $_SESSION['alter'] = trim(htmlspecialchars($_POST['alter']));
                $_SESSION['zimmerAnz'] = trim(htmlspecialchars($_POST['zimmerAnz']));
                $_SESSION['personenAnz'] = trim(htmlspecialchars($_POST['personenAnz']));
                $_SESSION['verpflegung'] = trim(htmlspecialchars($_POST['verpflegung']));
                $_SESSION['anreise'] = trim(htmlspecialchars($_POST['anreiseDatum'])) . " " . trim(htmlspecialchars($_POST['anreiseZeit']));
                $_SESSION['abreise'] = trim(htmlspecialchars($_POST['abreiseDatum'])) . " " . trim(htmlspecialchars($_POST['abreiseZeit']));

        ?>
                <form enctype="multipart/form-data" method="post" action="ausgabe.php">
                    <h3> Vielen Dank für ihre Buchung!<br>Wir freuen uns sehr dass sie sich für einen Urlaub
                        bei Dream Beach Retreat entschieden haben.</h3>
                    Bitte kontrollieren Sie nochamls folgende Daten auf ihre Richtigkeit.<br>Dies ist ein essentieler
                    Schritt für die reibungslose Abwicklung ihrer Urlaubsbuchung:
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>Ihr Zuname lautet </td>
                            <td><?php echo $_SESSION['nachname']; ?> </td>
                        </tr>
                        <tr>
                            <td>Ihr Vorname lautet </td>
                            <td><?php echo $_SESSION['vorname']; ?> </td>
                        </tr>
                        <tr>
                            <td>Ihre Anschrift lautet </td>
                            <td><?php echo $_SESSION['anschrift']; ?> </td>
                        </tr>
                        <tr>
                            <td>Ihr Wohnort lautet </td>
                            <td><?php echo $_SESSION['ort']; ?> </td>
                        </tr>
                        <tr>
                            <td>Ihre Telefonnummer lautet </td>
                            <td><?php echo $_SESSION['tel']; ?> </td>
                        </tr>
                        <tr>
                            <td>Sie sind </td>
                            <td><?php echo $_SESSION['alter'] . " Jahre alt"; ?> </td>
                        </tr>
                        <tr>
                            <td>Sie wollen </td>
                            <td><?php echo $_SESSION['zimmerAnz'] . " Zimmer buchen"; ?> </td>
                        </tr>
                        <tr>
                            <td>Welche jeweils </td>
                            <td><?php echo $_SESSION['personenAnz'] . " Personen beherbergt"; ?> </td>
                        </tr>
                        <tr>
                            <td>Sie wünschen sich eine </td>
                            <td><?php echo $_SESSION['verpflegung']; ?> </td>
                        </tr>
                        <tr>
                            <td>Ihr Urlaub beginnt am </td>
                            <td><?php echo $_SESSION['anreise']; ?> </td>
                        </tr>
                        <tr>
                            <td>Ihr Urlaub endet am </td>
                            <td><?php echo $_SESSION['abreise']; ?> </td>
                        </tr>
                    </table>
                    <br>
                    <input type="radio" name="sicher" value="ja"> Ja, folgende Daten sind richtig
                    <br>
                    <input type="radio" name="sicher" value="nein"> Nein, die folgenden Daten sind nicht richtig
                    <br>
                    <input type="submit" name="bestaetigen" class="button" value="Bestätigen">
                </form>
            <?php
            }
        } else {
            ?>
            <div style="font-size: 25;">
                Buchen Sie jetzt! Sie sind nur noch wenige Mausklicks davon entfernt,
                den Urlaub Ihrer Träume zu erleben. Damit wir Ihren Aufenthalt so traumhaft wie möglich gestalten können,
                bitten wir Sie, uns einige Wünsche für Ihren Urlaub mitzuteilen.
            </div>

            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">
                <p>Bitte beantworten Sie folgende Fragen:</p>
                <table>
                    <tr>
                        <td><label for="nachname"> Wie lautet ihr Zuname? </label></td>
                        <td><input type="text" id="nachname" class="larger-input" name="nachname" value="<?php if (!empty($nachname)) {
                                                                                                                echo "$nachname";
                                                                                                            } ?>" required></td>

                    </tr>
                    <tr>
                        <td><label for="vorname">Wie lautet ihr Vorname? </label></td>
                        <td><input type="text" class="larger-input" id="vorname" name="vorname" required></td>
                    </tr>
                    <tr>
                        <td><label for="anschrift">Wie lautet ihre Anschrift(Straße & Hausnummer(Stockwerk/Tür))? </label></td>
                        <td><input type="text" class="larger-input" id="anschrift" name="anschrift" required></td>
                    </tr>
                    <tr>
                        <td><label for="ort">In welchem Ort wohnen Sie (Wohnort & PLZ)? </label></td>
                        <td><input type="text" class="larger-input" id="ort" name="ort" required></td>
                    </tr>
                    <tr>
                        <td><label for="tel">Wie lautet ihre Telefonnummer? </label></td>
                        <td><input type="text" class="larger-input" id="tel" name="tel" required></td>
                    </tr>
                    <tr>
                        <td><label for="alter">Wie alt sind Sie? </label></td>
                        <td><input type="number" class="larger-input" id="alter" name="alter" min="18" required></td>
                    </tr>
                    <tr>
                        <td><label for="zimmerAnz">Wie viele Zimmer wollen Sie buchen? </label></td>
                        <td><input type="number" class="larger-input" id="zimemrAnz" name="zimmerAnz" min="1" required></td>
                    </tr>
                    <tr>
                        <td><label for="personenAnz">Wie viele Personen sollten diese Zimmer jeweils beherbergen? </label></td>
                        <td><input type="number" class="larger-input" id="personenAnz" name="personenAnz" min="1" required></td>
                    </tr>
                    <tr>
                        <td><label for="verpflegung">Welche Art der Verpflegung wünschen Sie?</label></td>
                        <td><input type="radio" id="verpflegung" name="verpflegung" value="Vollpension" required> Vollpension
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
                <input type="submit" name="submit" value="Jetzt buchen" class="button">
            </form>
    <?php
        }
    }
    ?>
</body>

</html>