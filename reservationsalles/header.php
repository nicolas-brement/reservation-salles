<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<?php
session_start();
if (!empty($_SESSION['login'])){
    echo '<header>
        <ul>
            <li><a href="index.php">ACCUEIL</a></li>
            <li><a href="profil.php">PROFIL</a></li>
            <li><a href="livre-or.php">LIVRE D\'OR</a></li>
             <li><a href="commentaire.php">ÉCRIRE UN COMMENTAIRE</a></li>
            <li><a href="logout.php" class="button_deconnexion">DÉCONNEXION</a></li>
        </ul>
    </header>';
}else{
    echo '
        <header>
            <ul>
                <li><a href="index.php" id="accueil">ACCUEIL</a></li>
                 <li><a href="livre-or.php">LIVRE D\'OR</a></li>
                <li><a href="connexion.php" class="button_connect">CONNEXION</a></li>
                <li><a href="inscription.php" class="button_inscription">INSCRIPTION</a></li>
                
            </ul>
        </header>';
}
?>