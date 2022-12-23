<?php include "header.php" ;

include "bdd.php"; 
$request = $bdd -> query("SELECT * FROM utilisateurs");
$result_fetch_all = $request -> fetch_all();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Admin</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
</head>


<div id="table-admin">

<h6>Informations base de données</h6>

<table>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>password</th>
    <tr>

<?php

foreach($result_fetch_all as $ligne){
    echo "<tr>";
    foreach($ligne as $champ){
        echo "<td>" . $champ ."</td>";
    }
    echo "</tr>";
}
?>
</table>
</div>

<footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="images/git.png"></a></footer>

</html>

