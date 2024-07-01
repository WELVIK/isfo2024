// login.php
<?php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=Veuillez saisir un email et un mot de passe");
        exit();
    }
    $stmt = $conn->prepare("SELECT * FROM tableName WHERE email = :email AND passe = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $_SESSION['email'] = $email;
        header("Location: accueil.php");
        exit();
    } else {
        header("Location: login.php?error=Email ou mot de passe incorrect");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>login</h2>
    <form action="login.php" method="post">
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Mot de Passe:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Connecter">
    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red'>" . $_GET['error'] . "</p>";
    }
    ?>
</body>
</html>