<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" type="text/css" href="standf.css">
</head>

<body>
    <header>
        <header>
            <h1>
                <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></div>
                Dream Beach Retreat
            </h1>
        </header>

        <h2>Registrierung</h2>
        <br>
        <p>Bitte gib eine gültige E-Mail-Adresse und ein sicheres Passwort ein, um Dich für das Resort zu registrieren.</p>

        <?php

        $auth_email;

        if (isset($_POST['registrieren'])) {
            if (empty($_POST['email']) || empty($_POST['passwort']) || empty($_POST['passwortWH'] || ($_POST['passwort'] != $_POST['passwortWH']))) {
                echo "Bitte füllen Sie alle Felder!";
            } else {
                $auth_email = $_POST['email'];
                $auth_passwort = $_POST['passwort'];
                $auth_passwortWH = $_POST['passwortWH'];
                $passwort_hash = password_hash($auth_passwort, PASSWORD_DEFAULT);

                if ($auth_passwort != $auth_passwortWH) {
                    echo "Die Passwörter stimmen nicht überein!";
                } else {

                    try {
                        require_once('db.php');

                        $stmt = $pdo->prepare("SELECT email FROM kunden WHERE email = :email");

                        $stmt->bindParam(':email', $auth_email);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            echo "<i><b style='color: red'>Ihre Email " . $auth_email . " existiert bereits!<br> Bitte geben Sie eine andere Email ein!</b></i>";
                        } else {

                            $stmt = $pdo->prepare("INSERT INTO kunden (email, passwort) VALUES (:email, :passwort)");

                            $stmt->bindParam(':email', $auth_email);
                            $stmt->bindParam(':passwort', $passwort_hash);

                            $stmt->execute();
                            echo "Registrierung erfolgreich!";

                            $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
                            header('Location: ' . $pfad);
                        }
                    } catch (PDOException $e) {
                        die("Registrierung fehlgeschlagen!");
                    }
                }
            }
        }
        ?>

        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <h3>Anmeldedaten</h3>
            <table>
                <tr>
                    <th><label for="email">E-Mail:</label></th>
                    <td><input type="email" class="larger-input" name="email" id="email" value="<?php if (!empty($auth_email)) {
                                                                                                    echo "$auth_email";
                                                                                                } ?>">
                    </td>
                </tr>

                <tr>
                    <th><label for="passwort">Passwort:</label></th>
                    <td><input type="password" class="larger-input" id="passwort" name="passwort"></td>

                <tr>
                    <th><label for="passwortWH">Passwort (Wiederholung):</label></th>
                    <td><input type="password" class="larger-input" id="passwortWH" name="passwortWH"></td>
                </tr>
            </table>

            <br>

            <input type="submit" value="Registrieren" name="registrieren" class="button">
        </form>
</body>

</html>