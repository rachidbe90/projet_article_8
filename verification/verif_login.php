<?php
session_start();
include ('../db/connexion.php');
$mail=$_POST['email'];
$pass=$_POST['mdp'];

if(isset($_POST) && !empty($mail) && !empty($pass)) {

    $data1 = $dbh->query("SELECT EMAIL, PASSWORD, NOM_STATUT FROM `personne` 
JOIN statut on statut.ID_STATUT = personne.ID_STATUT where EMAIL='".$mail."'")->fetchAll();

    if (!empty($data1)) {
        foreach ($data1 as $data) {
            if ($data['PASSWORD'] != $pass) {
                header('Location: ../index.php?erreur=1'); // On inclut l'erreur le formulaire d'identification
                exit;
            } else {
                $_SESSION['mail'] = $mail;
                $_SESSION['profil'] = $data['NOM_STATUT'];

                header('Location: ../index.php');
                exit;
                
            }
        }
    } else {
        echo '<p>Vous avez oublié de remplir un champ.</p>';
        header('Location: ../index.php?erreur=2'); // On inclut le formulaire d'identification
        exit;
    }
}
?>
