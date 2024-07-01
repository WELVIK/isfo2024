<?php
    require ('database.php');
    $title = "L'affichage des details du voyage ";
    require 'masterPage.php';
    require 'afficherDetailsAction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <!-- component -->
<!-- This is an example component -->
<div class=" flex items-center justify-center px-4">
    
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
        <div class="p-4 border-b">
            <h2 class="text-2xl text-blue-500 font-bold">
                Détails d'inscription
            </h2>
            <p class="text-sm text-gray-500">
                Personal details and application. 
            </p>
        </div>
        <div>
            <?php if ($details): ?>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">Date de Voyage:  </p>
                    <p> <?= $details['dateVoy'] ?> </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">Ville de départ: </p>
                    <p><?= $details['villeD'] ?></p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">Ville d'arrivée:</p>
                    <p><?= $details['villeA'] ?></p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">Heure de départ:</p>
                    <p><?= $details['heureDepart'] ?></p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">Heure d'arrivée:</p>
                    <p><?= ($details['heureArrivee'] )?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
</body>
</html>