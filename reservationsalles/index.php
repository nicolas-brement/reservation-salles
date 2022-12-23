<?php include "bdd.php"; 
include "header.php"; ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Planning2</title>
    </head>
    <body>
        <?php 
            if (!empty($_SESSION['login'])){
               echo "<h1> Bonjour" . " " . ($_SESSION['login']) .  "</h1>" . 
                 "<br> <h3>Réservez votre luxueuse suite avec spa, piscine et jacuzzi! </h3>" ; }
            else
                { echo "<h4>Veuillez vous connecter ou vous inscrire pour réserver votre suite luxueuse avec spa, piscine et jacuzzi</h4>"; 
                }
        ?>
        <h2>
            <a href="#"><img id="img_spa" src="images/chambre-spa.jpeg" alt="image de présentation"></a>


<footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="images/git.png"></a></footer>

</body>
</html>