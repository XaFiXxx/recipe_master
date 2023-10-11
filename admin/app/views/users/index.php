<div class="container mt-5">
        <h1>Liste des users</h1>
        <div class="mb-4">
            <a href="users/add/form" class="btn btn-primary">Ajouter un user</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Biographie</th>
                    <th>Image</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['biography']; ?></td>
                    <td><?php echo $user['picture']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                    <td class="p-3">
                        <a href="users/edit/form/<?php echo $user['id']; ?>" class="text-blue-600 hover:underline mr-2">Modifier</a>
                        <a href="users/delete/<?php echo $user['id']; ?>" id="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')" class="text-red-600 hover:underline">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>