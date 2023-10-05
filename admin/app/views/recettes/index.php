<div class="container mt-5">
        <h1>Liste des recettes</h1>
        <div class="mb-4">
            <a href="recettes/add/form" class="btn btn-primary">Ajouter une recette</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>description</th>
                    <th>temps préparation</th>
                    <th>portions</th>
                    <th>picture</th>
                    <th>Date de Création</th>
                    <th>Chef</th>
                    <th>Catégorie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recettes as $recette): ?>
                    <tr>
                    <td><?php echo $recette['recID']; ?></td>
                    <td><?php echo $recette['recName']; ?></td>
                    <td><?php echo core\tools\truncate($recette['recDescription'], 160); ?></td>
                    <td><?php echo $recette['prep_time']; ?></td>
                    <td><?php echo $recette['portions']; ?></td>
                    <td><?php echo $recette['recPicture']; ?></td>
                    <td><?php echo $recette['created_at']; ?></td>
                    <td><?php echo $recette['userName']; ?></td>
                    <td><?php echo $recette['catName']; ?></td>
                    <td class="p-3">
                        <a href="recettes/edit/form/<?php echo $recette['recID']; ?>" class="text-blue-600 hover:underline mr-2">Modifier</a>
                        <a href="recettes/delete/<?php echo $recette['recID']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')" class="text-red-600 hover:underline">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>