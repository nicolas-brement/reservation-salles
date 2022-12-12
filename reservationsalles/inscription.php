<?php require "bdd.php";
include "header.php" ;

if (!empty($_POST["login"]) && !empty($_POST["mdp"]) && !empty($_POST["confmdp"])){
        
    $login = htmlspecialchars($_POST["login"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $repeatpassword = htmlspecialchars(($_POST["confmdp"]));
    
     if($mdp == $repeatpassword){

       $sql= "INSERT INTO `utilisateurs` ( `login`, `password`) VALUES ('$login', '$mdp')"; // Préparation de la requete 
       $res = mysqli_query($bdd, $sql);// envoie de la requete 
   
         // header('Location: connexion.php');

     }else{
        echo " Les mots de passe ne sont pas identiques!";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8>
        <meta http-equiv="X-UA-Compatinble" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style_inscription.css">
        <title>Inscription</title>
</head>

<?php include "header.php" ?>

<body>
        <form method="POST">
        <div class="inscription"><h2><strong>Inscription</strong></h2></div>
        <br>

            <label for="Votre pseudo" class="form-label">Pseudo:</label>

            <input type="text" placeholder="Login" name="login" value="" required>
            <br>
            <label for="Mot de passe" class="form-label">Mot de passe:</label>

            <input type="password" placeholder="mdp" name="mdp" value="" required>
            <br>
            <label for="Confirmer le mot de passe" class="form-label">Confirmer le mot de passe:</label>

            <input type="password" placeholder="Confirmer le mdp" name="confmdp" required>
            <br>
            <input type="submit" name="envoi">
            </form>
     </body>

     <footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>
</html>