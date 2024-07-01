<?php

session_start();

if (!isset($_SESSION['codeEmp'])){
   header("Location: connexionEmp.php");
   exit();
}

if (isset($_SESSION['nom']) && isset($_SESSION['fonction'])) {
    $nom_employe = $_SESSION['nom'];
    $fonction_employe = $_SESSION['fonction'];
}

?>

    <!-- component -->
<nav class="bg-white shadow dark:bg-gray-800">
    <div class="container flex items-center justify-center p-6 mx-auto text-gray-600 capitalize dark:text-gray-300">
        <a href="connexionEmp.php" class="text-gray-800 dark:text-gray-200 border-b-2 border-blue-500 mx-1.5 sm:mx-6">home</a>

        <a href="sinscrire.php" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">S'inscrire</a>

        <a href="listeInscription.php" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">Liste de voyages</a>

        <a href="deconnexion.php" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">Se deconnecter</a>

    </div>
</nav>
<!-- component -->
<div class='flex items-center justify-center bg-gray-0'>
        <div class='max-w-md mx-auto space-y-6'>
            <!-- Component starts here -->
            <h2 class="flex flex-row flex-nowrap items-center my-8">
                <span class="flex-grow block border-t border-black" aria-hidden="true" role="presentation"></span>
                <span class="flex-none block mx-4 px-4 py-2.5 text-xl leading-none font-medium uppercase bg-black text-white">
                    <?php echo $title ?>
                </span>
                <span class="flex-grow block border-t border-black" aria-hidden="true" role="presentation"></span>
            </h2>
            <!-- Component ends here -->
            <div class="text-center">
                <h3 class="text-xl font-bold"><?php if(isset($_SESSION['nom'])) {echo ($nom_employe);} ?></h3>
                <h4 class="text-sm text-blue-800"><?php if(isset($_SESSION['fonction'])) {echo ($fonction_employe);} ?></h4>
            </div>
        </div>
</div>
