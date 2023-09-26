<div class="min-h-screen py-8">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-5xl font-semibold mb-6">Ajout d'un user</h1>
        <a href="users">Retour vers la liste des utilisateurs</a>

    
        <form action="users/edit/<?php echo $user['id'] ?>" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">email :</label>
                <input type="text" id="mail" name="email" value="<?php echo $user['email'] ?>" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <label for="password" class="block text-gray-700 font-semibold">password :</label>
                <input type="text" id="password" name="password" value="<?php echo $user['password'] ?>" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <label for="pseudo" class="block text-gray-700 font-semibold">pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" value="<?php echo $user['pseudo'] ?>" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Valider</button>
            </div>
        </form>
    </div>
</div>