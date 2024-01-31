<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
</head>

<body>

    <?php

    $formular_anzeigen = true;
    $id;

    if (isset($_SESSION['email'])) {
        echo "<h1>Sie sind schon angemeldet.</h1>
        Klicken Sie <a href='hauptseite.html'>hier</a> um auf die Startseite wieder zurückzukehren.<br>
        oder Klicken Sie <a href='logout.php'>hier</a>, um sich auszuloggen.";
        $formular_anzeigen = false;
    } else {


        if (isset($_POST['login'])) {
            if (empty($_POST['email']) || empty($_POST['passwort'])) {
                echo "Bitte füllen Sie das Formular vollständig aus!";
            } else {

                $auth_email = htmlspecialchars(trim($_POST['email']));
                $auth_passwort = htmlspecialchars(trim($_POST['passwort']));

                require_once("db.php");

                try {
                    $statement = $pdo->prepare("SELECT id, email, passwort FROM kunden WHERE email = :email");
                    $statement->bindParam(":email", $auth_email);
                    $statement->execute();
                } catch (PDOException $e) {
                    die("Login nicht möglich!");
                }

                if ($statement->rowCount() > 0) {

                    $row = $statement->fetch();
                    $gespeichertesPWD = $row['passwort'];
                    $id = $row['id'];
                    $email = $row['email'];

                    if (password_verify($auth_passwort, $gespeichertesPWD)) {

                        if (password_needs_rehash($gespeichertesPWD, PASSWORD_DEFAULT)) {

                            $neuesPWD = password_hash($auth_passwort, PASSWORD_DEFAULT);

                            try {
                                $statement = $pdo->prepare("UPDATE kunden SET passwort = :passwort WHERE email = :email");

                                $statement->bindParam(':passwort', $neuesPWD);
                                $statement->bindParam(':email', $auth_email);
                                $statement->execute();
                            } catch (PDOException $e) {
                                die("ES ist ein Fehler beim Speichern des neuen Hashwertes aufgetreten!");
                            }
                            echo "<h3>Die Daten (Passwort) wurden aktualisiert!</h3>";
                        }

                        echo "Login erfolgreich";

                        $formular_anzeigen = false;


                        $_SESSION['id'] = $id;
                        $_SESSION['email'] = $email;


                        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/hauptseite.html';
                        header('Location: ' . $pfad);
                    } else {
                        echo "Überprüfen Sie Ihr Passwort";
                        $formular_anzeigen = true;
                    }
                } else {
                    echo "Ihre E-Mail-Adresse ist nicht registriert.";
                    $formular_anzeigen = true;
                }
            }
        }

        if ($formular_anzeigen) {

    ?>
            <h1>Login</h1>
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                <p>Solltest Du noch nicht registriert sein, dann klicke <a href="registrieren.php">hier</a></p>

                <h3>Anmeldedaten</h3>

                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" value="" required><br>
                <label for="passwort">Passwort:</label>
                <input type="password" id="passwort" name="passwort" required><br><br>

                <input type="submit" value="Login" name="login">
            </form>

    <?php
        }
    }
    ?>

</body>

</html>