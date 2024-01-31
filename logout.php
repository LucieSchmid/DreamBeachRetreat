<?php
session_start();

if (isset($_SESSION['email'])) {

    $_SESSION = array();
    session_destroy();
}

$pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/hauptseite.html';
header('Location: ' . $pfad);

?>