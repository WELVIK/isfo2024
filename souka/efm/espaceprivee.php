<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: authentifier.php");
    exit();
}

require 'db_connection.php';

$login = $_SESSION['login'];
$stmt = $conn->prepare("SELECT nom, prenom FROM administrateurs WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->bind_result($nom, $prenom);
$stmt->fetch();
$stmt->close();

$heure = date('H');
if ($heure < 18) {
    $message = "Bonjour";
} else {
    $message = "Bonsoir";
}

echo $message . ", " . $nom . " " . $prenom . "!";

$result = $conn->query("SELECT * FROM stagiaires");

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Filière</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nom'] . "</td>";
    echo "<td>" . $row['prenom'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['filiere'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
