<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=article8prod', $user, $pass,[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ] );
?>