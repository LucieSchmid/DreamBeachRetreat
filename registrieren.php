<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <header class="hintergrund">
        <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
        <li style="display: grid; grid-template-columns: 100px; grid-template-rows: 50px 50px; padding-bottom: 10px;">
            <a href="hauptseite.html"><img src="images/logo.png" width="60" height="60" alt="Logo" class="img-fluid rounded m-4" aligen="left" style="grid-row: 1 / 2"></a>
            <h1 style="grid-row: 1; grid-column: 2; text-align: left; margin-top: 20px;">Dream Beach Retreat</h1>
            <i style="grid-row: 2 ; grid-column: 2; text-align: left; margin-top: 10px; padding-top: 4px;">Entspannen, Auftanken und Genießen - Dein Rückzugsort am Strand.</i>
        </li>
    </header>

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



    <div class="p-5 h-100 d-flex align-items-center justify-content-center">
        <div class="p-5 border1">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
            </div>
            <div class="h-100 d-flex align-items-center justify-content-center">
                <h3>Registrieren</h3>
            </div>
            <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                <table>
                    <tr>
                        <td><label for="email">E-Mail:</label></td>
                        <td><input type="email" class="larger-input" name="email" id="email" value="<?php if (!empty($auth_email)) {
                                                                                                        echo "$auth_email";
                                                                                                    } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="passwort">Passwort:</label></td>
                        <td><input type="password" class="larger-input" id="passwort" name="passwort"></td>
                    </tr>
                    <tr>
                        <td><label for="passwortWH">Passwort (Wiederholung):</label></td>
                        <td><input type="password" class="larger-input" id="passwortWH" name="passwortWH"></td>
                    </tr>
                </table>

                <br>
                <div>
                    <p class="mt-5">Schon ein Konto? Dann klicke <a href="login.php">hier</a>.</p>
                </div>
                <input type="submit" value="Registrieren" name="registrieren" class="button">
            </form>
        </div>
    </div>
</body>

</html>