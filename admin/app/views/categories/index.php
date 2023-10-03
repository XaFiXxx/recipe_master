<div class="container mx-auto p-8 ">
        <h1><?php echo $title ?></h1>
        <!-- Bouton pour ajouter une nouvelle catégorie -->
        <div class="mb-4">
            <a href="categories/add/form" class="btn btn-primary">Ajouter une Catégorie</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date de Création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <!-- Exemple de ligne de catégorie -->
                    <tr>
                        <td class="p-3"><?php echo $category['id']; ?></td>
                        <td class="p-3"><?php echo $category['name']; ?></td>
                        <td class="p-3"><?php echo $category['description']; ?></td>
                        <td class="p-3"><?php echo $category['created_at']; ?></td>
                        <td class="p-3">
                        <a href="categories/edit/form/<?php echo $category['id']; ?>" class="text-blue-600 hover:underline mr-2">Modifier</a>
                        <a href="categories/delete/<?php echo $category['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')" class="text-red-600 hover:underline">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>