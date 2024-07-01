<?php 
    require ('database.php');
    // remplir la liste deroulante (ville de depart et ville d arrivé)
    $statement = $pdo->prepare('SELECT DISTINCT villeD FROM description_voyage ');
    $statement->execute();
    $villesD = $statement->fetchAll(PDO::FETCH_ASSOC);

     // remplir la liste deroulante (ville de depart et ville d arrivé)
    $statement = $pdo->prepare('SELECT DISTINCT villeA FROM description_voyage ');
    $statement->execute();
    $villesA = $statement->fetchAll(PDO::FETCH_ASSOC);