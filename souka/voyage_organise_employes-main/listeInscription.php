<?php
    require ('database.php');
    $title = "Liste d'inscription ";
    require 'masterPage.php';
    require 'listeInscAction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Locations en cours</title>
</head>
<body>


    <table class="min-w-full border-collapse block md:table mt-6">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Code Inscription</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Date de Voyage</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Nombre de personnes inscrites</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Total à payer</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Action</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            <?php foreach ($inscriptions as $inscription): ?>
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-center text-blue-700 font-bold block md:table-cell"><?php echo $inscription['codeInsc'] ;?></td>
                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><?php echo $inscription['dateVoy']  ;?></td>
                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><?php echo $inscription['nbrePers']  ;?></td>
                    <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><?php echo $inscription['totalPayer'] ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-center text-red-500 font-bold underline block md:table-cell"><a href="afficherDetails.php?codeInsc=<?= $inscription['codeInsc'] ?>">Afficher</a></td>

                </tr>	
            <?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>