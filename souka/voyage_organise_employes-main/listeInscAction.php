<?php

if (!isset($_SESSION['codeEmp'])) {
    header("Location: connexionEmp.php");
    exit();
}
require 'database.php';


$statement = $pdo->prepare("SELECT i.codeInsc, i.dateVoy, i.nbrePers, v.prixTicket * i.nbrePers AS totalPayer 
FROM inscription i 
JOIN voyage v ON i.codeVoyage = v.codeVoyage 
WHERE i.codeEmp = :codeEmp 
ORDER BY i.dateVoy");
$statement->execute([':codeEmp' => $_SESSION['codeEmp']]);
$inscriptions = $statement->fetchAll(PDO::FETCH_ASSOC);
?>