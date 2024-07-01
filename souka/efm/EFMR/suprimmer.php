<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
require 'db_connection.php'; 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM article WHERE referenceArticle = ?");
    $stmt->bind_param("s", $id);
    if ($stmt->execute()) {
        header("Location: accueil.php");
    } else {
        echo "Erreur lors de la suppression de l'article";
    }
} else {
    header("Location: accueil.php");
}
?>