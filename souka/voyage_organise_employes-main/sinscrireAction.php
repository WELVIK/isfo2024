<?php
session_start(); 
require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST['villeD']) || empty($_POST['villeA']) || empty($_POST['dateVoy']) || empty($_POST['nbrePers'])) {
        echo '<script>alert("Veuillez remplir tous les champs.")</script>';
    }else{
        $villeD = $_POST['villeD'];
        $villeA = $_POST['villeA'];
        $dateVoy = $_POST['dateVoy'];
        $nbrePers = $_POST['nbrePers'];
    

        $statement = $pdo->prepare("SELECT codeDesc FROM description_voyage WHERE villeD = :villeD AND villeA = :villeA");
        $statement->execute([
            ':villeD' => $villeD,
            ':villeA' => $villeA
        ]);
        $descriptionVoyage = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($descriptionVoyage) { 
            $codeDesc = $descriptionVoyage['codeDesc'];
            
            $statement = $pdo->prepare("SELECT codeVoyage FROM voyage WHERE codeDesc = :codeDesc");
            $statement->execute([
                ':codeDesc' => $codeDesc
            ]);
            $voyage = $statement->fetch(PDO::FETCH_ASSOC);
    
            if ($voyage) { 
                $codeVoyage = $voyage['codeVoyage'];
    
                $statement = $pdo->prepare("INSERT INTO inscription (codeEmp, codeVoyage, nbrePers, dateVoy) VALUES (:codeEmp, :codeVoyage, :nbrePers, :dateVoy)");
                $statement->execute([
                    ':codeEmp' => $_SESSION['codeEmp'], 
                    ':codeVoyage' => $codeVoyage,
                    ':nbrePers' => $nbrePers,
                    ':dateVoy' => $dateVoy
                ]);
    
                header("Location: listeInscription.php");
                exit;
            }
        } else {
            echo '<script>alert("Aucune description de voyage trouvée pour ces villes.")</script>';
        }
    }
}
?>
