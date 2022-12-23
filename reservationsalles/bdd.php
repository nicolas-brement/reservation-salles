<?php
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbname = 'reservationsalles';
            
        //On établit la connexion
        $bdd = mysqli_connect($servername, $username, $password, $dbname);// connexion à la base de donnée

        $request2 = $bdd->query("SELECT * FROM reservations");       // On lance la requête pour récupérer la table `reservations`
        $reserv = $request2->fetch_all();
?>