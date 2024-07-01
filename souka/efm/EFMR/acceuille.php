// accueil.php
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
require 'db_connect.php';
echo "<h2>Bonjour, " . $_SESSION['email'] . "</h2>";
echo "<h3>Liste des voitures</h3>";
echo "<table border='1'>
<tr>
<th>Matricule</th>
<th>Marque</th>
<th>Prix Achat</th>
<th>Date Achat</th>
<th>Type Carburant</th>
</tr>";
$stmt = $conn->query("SELECT Voiture.matriculeV, Voiture.marque, Voiture.prixAchat, Voiture.dateAchat,
                      TypeCarburant.typeCarb FROM Voiture 
                      INNER JOIN TypeCarburant ON Voiture.idTypecarb = TypeCarburant.idType");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
    <td>{$row['matriculeV']}</td>
    <td>{$row['marque']}</td>
    <td>{$row['prixAchat']}</td>
    <td>{$row['dateAchat']}</td>
    <td>{$row['typeCarb']}</td>
    </tr>";
}
echo "</table>";
echo '<a href="ajout_voiture.php">Ajouter Voiture</a>';
?>