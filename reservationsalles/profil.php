<?php include "bdd.php" ; 
include "header.php";
$login = $_SESSION['login'];

if(!empty($_SESSION)) { 
    $query = "SELECT * FROM utilisateurs WHERE login='$login'";
    $sql = $bdd->query($query);
    $result = $sql->fetch_assoc(); 
    $login_bdd = $result['login']; 
    $password = $result['password'];

    if (isset($_POST['submit'])) { 
        if ($login != $_POST['login']) {
            $sql3 = "UPDATE `utilisateurs` SET login='{$_POST['login']}' WHERE login='$login'";
            $result3 = $bdd->query($sql3);
            echo "Votre login a bien été changé par:" . $_POST['login'] . "<br>";
        }if ($password != $_POST['password']) {
            $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql4 = "UPDATE `utilisateurs` SET password='$new_password' WHERE password='$password'";
            $result4 = $bdd->query($sql4);
            echo "Votre mot de passe a bien été changé par:" . $_POST['password'] . "<br>";
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Page de profil</title>
</head>

<div class="profil"><h2><strong>Votre profil</strong></h2></div>

<body>
<section class="formulaire">
    <h1 id="texte_profil"><?php echo 'Bonsoir ' . $_SESSION['login'];?> </h1>

    <br>
    <br>
    <section id="tableau">
        <table>
            <form method="post">
                <thead>
                <th>Login</th>
                <th>Password</th>
                </thead>
                <tbody>
                <tr>
                    <td><input id="input_profil" name="login" placeholder="<?php echo $result['login'] ?>"required></td>
                    <td><input id="input_profil" name="password" placeholder="<?php echo $result['password'] ?>"required></td>
                </tr>
                </tbody>
            <tfoot>


                <button class="modifier" type="submit" name="submit">Modifier</button>
            </tfoot>
            </form>
        </table>
    </section>


</section>

<footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="images/git.png"></a></footer>

</body>
</html>