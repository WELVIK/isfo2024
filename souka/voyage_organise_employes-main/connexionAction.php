<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require 'database.php';
    $statement = $pdo ->prepare('SELECT * FROM employe WHERE user= :user AND pwd = :pwd');
    $statement -> execute([
        ':user' => $_POST['user'],
        ':pwd' => $_POST['pwd']
    ]);
    $employe = $statement ->fetch(PDO::FETCH_ASSOC);
    if($employe){
        $_SESSION["codeEmp"] = $employe['codeEmp'];
        $_SESSION["nom"] = $employe['nom'];
        $_SESSION["fonction"] = $employe['fonction'];
        header("Location: sinscrire.php");
        exit;
    }else{
        
        header('Location: connexionEmp.php');
        
    }
    exit;
}


?>
