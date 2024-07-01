<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
require 'db_connection.php'; 
if (!isset($_GET['id'])) {
    header("Location: accueil.php");
    exit();
}
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomArticle = $_POST['nomArticle'];
    $prixUnitaire = $_POST['prixUnitaire'];
    $dateAchat = $_POST['dateAchat'];//dir dakchi diyal l'exercice
    $idCategorie = $_POST['idCategorie'];
    if (empty($nomArticle) || empty($prixUnitaire) || empty($dateAchat) || empty($idCategorie)) {
        echo "Tous les champs sont obligatoires";
    } else {
        $stmt = $conn->prepare("UPDATE article SET nomArticle = ?, prixUnitaire = ?,
         dateAchat = ?, idCategorie = ? WHERE referenceArticle = ?");
        $stmt->bind_param("sdsis", $nomArticle, $prixUnitaire, $dateAchat, $idCategorie, $id);
        if ($stmt->execute()) {
            header("Location: accueil.php");
        } else {
            echo "Erreur lors de la modification de l'article";
        }
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM article WHERE referenceArticle = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
}
?>