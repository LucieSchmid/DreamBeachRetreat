<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="standf.css">
</head>

<body>
    <header>
        <h1>
            <div style="float:left; padding:5px;"> <img class="runde-ecken" src="images/logo.png" width="150" height="150" /></div>
            Dream Beach Retreat
        </h1>
    </header>


    <?php

    ?>


    <h2>Kontaktformular</h2><br>
    <i>Bitte geben Sie, falls Sie Beschwerden oder Wünsche haben, diese in diesem Formular an.</i>
    <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        <br>
        <table>
            <tr>
                <td><label for="nachname">(*)Nachname:</label></td>
                <td><input type="text" id="nachname" class="larger-input" name="nachname" required></td>
            </tr>

            <tr>
                <td><label for="vorname">(*)Vorname:</label></td>
                <td><input type="text" class="larger-input" id="vorname" name="vorname" required></td>
            </tr>

            <tr>
                <td><label>(*)E-Mail:</label></td>
                <td><input type="email" class="larger-input" id="email" name="email" required></td>
            </tr>

            <tr>
                <td><label>(*)Nachricht:</label></td>
                <td><input type="text-area" class="larger-input" id="area" name="area" required></td>
            </tr>

            <tr>
                <td><label>Bild (falls nötig)</label></td>
                <td><input type="file" class="larger-input" id="datei" name="datei"></td>
            </tr>

        </table>

        <br>
        <i>(*) Pflichtfeld</i>
        <br><br>
        
        <input type="submit" class="button" value="Absenden" name="senden">

    </form>


</body>

</html>