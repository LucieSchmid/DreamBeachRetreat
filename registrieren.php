<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" type="text/css" href="stand.css">
</head>

<body>
<header>
<h1>
        <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="100" height="100" /></div>
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
        <label for="email">E-Mail:</label>
        <input type="email" name="email" id="email" value="<?php if (!empty($auth_email)) {
                                                                echo "$auth_email";
                                                            } ?>"><br>

        <label for="passwort">Passwort:</label>
        <input type="password" id="passwort" name="passwort"><br>

        <label for="passwortWH">Passwort (Wiederholung):</label>
        <input type="password" id="passwortWH" name="passwortWH"><br>

        <br>

        <input type="submit" value="Registrieren" name="registrieren">
    </form>
</body>

</html>