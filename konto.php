<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>
    <header class="hintergrund">
        <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
        <li style="display: grid; grid-template-columns: 100px; grid-template-rows: 50px 50px; padding-bottom: 10px;">
            <a href="hauptseite.php"><img src="images/logo.png" width="60" height="60" alt="Logo" class="img-fluid rounded m-4" aligen="left" style="grid-row: 1 / 2"></a>
            <h1 style="grid-row: 1; grid-column: 2; text-align: left; margin-top: 20px;">Dream Beach Retreat</h1>
            <i style="grid-row: 2 ; grid-column: 2; text-align: left; margin-top: 10px; padding-top: 4px;">Entspannen, Auftanken und Genießen - Dein Rückzugsort am Strand.</i>
        </li>
    </header>

    <main>
        <div class="p-5 h-100 d-flex align-items-center justify-content-center">
            <div class="p-5 border1">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <h3>Ihre Kontodaten</h3>
                </div>
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                </div>
                <table>
                    <div class="mb-3 mt-3">
                        <tr>
                            <td><label for="email">E-Mail:</label></td>
                            <td><input type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" ></td>
                        </tr>
                    </div>
                </table>
            </div>
        </div>
    </main>

</body>

</html>