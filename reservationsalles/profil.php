<?php include "bdd.php" ; 
include "header.php";
$login = $_SESSION['login'];


if(!empty($_SESSION)){
    $query = "SELECT * FROM utilisateurs WHERE login='$login'";
    $sql = $bdd->query($query);
    $result = $sql->fetch_assoc(); 
    $login_bdd = $_SESSION['login']; 

    if(isset($_POST['login'])) { 
        if ($login != $_POST['login']) { 
            $sql1 = "UPDATE `utilisateurs` SET login='{$_POST['login']}' WHERE login='$login'";
            $result1 = $bdd->query($sql1);
            echo "Votre nom a bien été changé par:" . $_POST['login'] ."<br>";
        }
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_profil.css">
    <title>Page de profil</title>
</head>

<body>
<section class="formulaire">
    <h1 id="texte_profil"><?php echo 'Bonsoir ' . $_SESSION['login'];?> </h1>

    <br>
    <br>
    <section id="tableau">
        <table>
            <form method="post">
                <tbody>
                <td>Nom</td>
                <td><input id="input_profil" name="login" placeholder="Pseudo <?php echo $result['login'] ?>"required></td>
                <td>Mot de passe</td>
                <td><input id="input_profil" name="password" placeholder="Mot de passe <?php echo $result['password'] ?>"required></td>
                </tbody>
            <tfoot>
                <button class="delete" type="submit" name="delete">Supprimer mon compte</button>
                <br>
                <button class="modifier" type="submit" name="submit">Modifier</button>
            </tfoot>
            </form>
        </table>
    </section>


</section>

<footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>
</html>
    