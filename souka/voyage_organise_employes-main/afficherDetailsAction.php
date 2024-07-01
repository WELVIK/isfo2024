<?php

if (!isset($_SESSION['codeEmp'])) {
    header("Location: connexionEmp.php");
    exit();
}
require 'database.php';

if (isset($_GET['codeInsc'])) {
    $codeInsc = $_GET['codeInsc'];
    
    $statement = $pdo->prepare("SELECT i.dateVoy, d.villeD, d.villeA, v.heureDepart, ADDTIME(v.heureDepart, v.duree ) AS heureArrivee 
    FROM inscription i 
    JOIN voyage v ON i.codeVoyage = v.codeVoyage 
    JOIN description_voyage d ON v.codeDesc = d.codeDesc 
    WHERE i.codeInsc = :codeInsc ");
    $statement->execute([':codeInsc' => $codeInsc]);
    $details = $statement->fetch(PDO::FETCH_ASSOC);
    
}
?>