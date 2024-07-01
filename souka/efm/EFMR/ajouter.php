// ajout_voiture.php
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
require 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricule = $_POST['matricule'];
    $marque = $_POST['marque'];
    $prix = $_POST['prix'];//dir dakchi diyal l'exercice
    $date = $_POST['date'];
    $carburant = $_POST['carburant'];
    $stmt = $conn->prepare("INSERT INTO Voiture (matriculeV, marque, prixAchat, 
    dateAchat, idTypecarb) VALUES (:matricule, :marque, :prix, :date, :carburant)");
    $stmt->bindParam(':matricule', $matricule);
    $stmt->bindParam(':marque', $marque);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':carburant', $carburant);
    if ($stmt->execute()) {
        echo "Voiture ajoutée avec succès";
    } else {
        echo "Erreur lors de l'ajout de la voiture";
    }
}
?>