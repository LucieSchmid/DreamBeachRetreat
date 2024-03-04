<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="login.css">


<body>
    <header>
        <!-- <h1>
            <div style="float:left; padding-top:5px; margin: 0px;"><a href="hauptseite.html"> <img class="runde-ecken" src="images/logo.png" /></a></div>
            Dream Beach Retreat</h1>
            <h2 style="padding-top: 0px; margin: 0px;">Login</h2>
        -->
        <li class="hintergrund" style="display: grid; grid-template-columns: 100px ; grid-template-rows: 50px 50px; padding-bottom: 10px; ">
            <a href="hauptseite.html"><img src="images/logo.png" width="60" height="60" alt="Logo" class="img-fluid rounded m-4" aligen="left" style="grid-row: 1 / 2"></a>
            <h1 style="grid-row: 1; grid-column: 2; text-align: left; margin-top: 20px;">Dream Beach Retreat</h1>
            <i style="grid-row: 2 ; grid-column: 2; text-align: left; margin-top: 10px; padding-top: 4px;">Entspannen, Auftanken und Genießen - Dein Rückzugsort am Strand.</i>
        </li>

    </header>
    <?php

    $formular_anzeigen = true;
    $id;

    if (isset($_SESSION['email'])) {
        echo "<h2>Sie sind schon angemeldet.</h2><br>
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
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <div class="p-5 h-100 d-flex align-items-center justify-content-center">
                <div class="p-5 border1">
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </div>
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <h3>Login</h3>
                    </div>
                    <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                        <table>
                            <div class="mb-3 mt-3">
                                <tr>
                                    <td><label for="email">E-Mail:</label></td>
                                    <td><input type="email" id="email" name="email" value="" placeholder="Email eingeben" required></td>
                                </tr>
                            </div>
                            <div class="mb-3">
                                <tr>
                                    <td><label for="passwort">Passwort:</label></td>
                                    <td><input type="password" id="passwort" name="passwort" placeholder="Passwort eingeben" required></td>
                                <tr>
                            </div>
                        </table>
                        <div>
                            <p class="mt-5">Noch kein Konto? Dann klicke <a href="registrieren.php">hier</a></p>
                        </div>
                        <input type="submit" value="Login" name="login" class="button">
                    </form>
                </div>
            </div>
    <?php
        }
    }
    ?>

</body>

</html>