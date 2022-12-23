<?php
include 'bdd.php';// connexion à ma base de donnée
?> 


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Réserver</title>
</head>
<body>
    <header><?php include 'header.php' ?></header>

    <?php     // Page uniquement accesible pour la personne connecté
    if($_SESSION['login'] === NULL){
        header('location: bdd.php');
    }

    date_default_timezone_set('Europe/Paris');        //On définit le fuseau horraire correspondant
    $currentDate = date('Y-m-d');                     // On récupère la date et l'heure

    // Je déclare mes variables pour les messages d'érreurs
    $msgTitre = "";
    $msgDate = "";
    $msgHeure = "";
    $msgDescription = "";
    $msgReservation = "";
    ?>

    <main class="flex-row">
            <div class="flex-column" id="form-container">
                <h5>Formulaire de réservation</h5>
                <form Method="POST" class="flex-column2">
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" id="titre" placeholder="Min. 5 caractères">
                    <?= $msgTitre ?>

                    <label for="date">Début de la réservation :</label>
                    <input type="date" name="date" id="date" min="<?php echo $currentDate ?>">
                    <?= $msgDate ?>

                    <div>
                        <label for="hdebut">Heure de début :</label><br>
                        <select name="hdebut" id="hdebut">  <option value="08">08:00</option>  
                                                            <option value="09">09:00</option>  
                                                            <option value="10">10:00</option>  
                                                            <option value="11">11:00</option>  
                                                            <option value="12">12:00</option>  
                                                            <option value="13">13:00</option>  
                                                            <option value="14">14:00</option>  
                                                            <option value="15">15:00</option>  
                                                            <option value="16">16:00</option>  
                                                            <option value="17">17:00</option>  
                                                            <option value="18">18:00</option>  
                        </select>
                    </div>
                    
                    <div>
                        <label for="hfin">Heure de Fin :</label><br>
                        <select name="hfin" id="hfin">  <option value="09">09:00</option>  
                                                        <option value="10">10:00</option>  
                                                        <option value="11">11:00</option>  
                                                        <option value="12">12:00</option>  
                                                        <option value="13">13:00</option>  
                                                        <option value="14">14:00</option>  
                                                        <option value="15">15:00</option>  
                                                        <option value="16">16:00</option>  
                                                        <option value="17">17:00</option>  
                                                        <option value="18">18:00</option>  
                                                        <option value="19">19:00</option>  
                        </select>
                    </div>
                    <?= $msgHeure ?>

                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Min. 10 caractères"></textarea>
                    <?= $msgDescription ?>

                    <input type="submit" id="mybutton" value="Réserver" >
                    <?= $msgReservation ?>
                </form>
            </div>
        </main>
        <footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="images/git.png"></a></footer>
    </body>
</html>

<!--PHP-->

<?php      

    if ($_POST != NULL){

        // On récupère les données du formulaire et celles en session
        $titre = $_POST['titre'];
        $date = $_POST['date'];
        $hD = $_POST['hdebut'];
        $hF = $_POST['hfin'];
        $description = $_POST['description'];
        $id_user = $_SESSION['id'];
        var_dump($_SESSION['id']);
        $testDay = date('l', strtotime($date));

        // Si le titre fait plus de 5 caractères
        if(isset($titre)  && strlen($titre) >= 5){
        
            $currentDate = date('Y-m-d');
            $currentDate = strtotime($currentDate);
            $date2 = strtotime($date);
            
            // Si la date actuelle n'est pas superieur à la date choisie
            if($currentDate <= $date2){
                // Si la date choisie n'est ni un samedi ni un dimanche
                if($testDay != "Saturday" && $testDay != "Sunday"){

                    // Si la description n'es pas vide et fait plus de 10 caractères
                    if(isset($description) && strlen($description) >= 10){
        
                        // Si l'heure de fin n'est pas inferieure à celle du début
                        if((int)$hF > (int)$hD){
                  
    
                            $hdebut = $date . ' ' . $hD . ':00' . ':00';
                            $hfin = $date . ' ' . $hF . ':00' . ':00';
                            
                            // On vérifie si ces horaires sont disponibles
                            // $checkDate = true;
                            // for($i=0; isset($reserv[$i][3]); $i++){
                            //     if($reserv[$i][3] === $hdebut){
                            //         $checkDate = false;
                            //         break;
                            //     }
                            // }

                            // S'ils sont disponibles
                            // if($checkDate){
                                $requestInsert = $bdd->query("INSERT INTO reservations (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$description', '$hdebut', '$hfin', '$id_user')");
                                $msgReservation = "<p id='msgok'> Votre réservation a bien été prise en compte</p>";
                                echo 'Réservation effectuée';
        
                                // }

                            //Sinon message d'erreur
                           //////   }
                        }
                        
                        //Sinon message d'erreur
                        else{
                            $msgHeure = "<p id='msgerror'>!! Les horaires souhaités ne sont pas disponibles !!</p>";
                        }
                    }

                    //Sinon message d'erreur
                    else{
                        $msgDescription = "<p id='msgerror'>!! La description est trop courte !!</p>";
                    }
                }

                //Sinon message d'erreur
                else{
                    $msgDate = "<p id='msgerror'>!! La salle n'est pas disponible le Week-end !!</p>";
                }
            // }
            
            // //Sinon message d'erreur
            // else{
            //     $msgDate = "<p id='msgerror'>!! La date choisie n'est pas disponible !!</p>";
            // }
        }
        //Sinon message d'erreur
        else{
            $msgTitre = "<p id='msgerror'>!! Le titre est trop court !!</p>";
        }
    }
}
?>
