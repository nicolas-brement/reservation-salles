<?php include 'bdd.php'; 

    // On récupère l'id de la réservation
    $idReserv = $_GET['id'];
    
    // On créé la requête qui va croiser les deux tables de la BDD
    $request3 = $bdd->query("SELECT * FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id=$idReserv");
    $reservation=$request3->fetch_all();
    
    
  

    // On récupère certaines infos de la bdd pour les afficher
    $jour = date('d/m/Y', strtotime($reserv[0][3]));
    $hdebut = date('H:i', strtotime($reservation[0][3]));
    $hfin = date('H:i', strtotime($reserv[0][4]));
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Réservation</title>
    </head>

    <body>
        <header><?php include 'header.php' ?></header>

        <main class="flex-column">
            <div class="flex-column" id="reservation">
                <h6>Réservation effectuée par <br><?= $reservation[0][7]; ?></h6>
                <p id="text">Titre:<p id="text1"><?= $reservation[0][1]; ?></p></p>

                <p id="text">Description:<p id="text1"><?= $reservation[0][2]; ?></p></p>

                <p id="text">Le:<p id="text1"><?= $jour; ?></p>
                <p id="text">De:<p id="text1"><?= $hdebut; ?> à <?= $hfin; ?></p>
            </div>
        </main>

       <footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="images/git.png"></a></footer>
    </body>
</html>