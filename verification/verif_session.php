<?php
session_start();
/*
si la variable de session login n'existe pas cela siginifie que le visiteur
n'a pas de session ouverte, il n'est donc pas loggé ni autorisé à
acceder à l'espace membres
*/

if(!isset($_SESSION['mail'])) {
    header('Location: ../index.php');
    exit;
}
?>