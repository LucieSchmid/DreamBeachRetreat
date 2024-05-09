<?php
$lang = $_GET["lang"]; // GET Variable setzen

if ($lang == "") {
    $lang = "de"; // Wenn die Variable $lang leer aufgerufen wird, lassen wir uns eine Sprache vor definieren! 
}
include("lang_" . $lang . ".agb.php"); // Includieren der lang_de.php, Wenn $lang Variable leer ist!
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>AGBs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>
</head>

<body class=m-3>
    <div style="text-align: right">
        <a href="?lang=de">Deutsch</a> | <a href="?lang=en">Englisch</a>
    </div>
    <header>
        <i class="fas fa-arrow-left" data-bs-toggle="tooltip" data-bs-placement="right" title="Klicken Sie hier um zurückzukehren!" onclick="history.back()"></i>
    </header>
    <div style="margin-right: 500px;">

    <p><?php echo $ausgabe ?></p>

    </div>
</body>

</html>