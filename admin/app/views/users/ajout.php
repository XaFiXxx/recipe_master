<div class="min-h-screen py-8">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-5xl font-semibold mb-6">Ajout d'un user</h1>
        <a href="users">Retour vers la liste des utilisateurs</a>

    
        <form action="users/add/insert" method="POST">
            <div class="mb-4">
                <label for="pseudo" class="block text-gray-700 font-semibold">pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <label for="email" class="block text-gray-700 font-semibold">email :</label>
                <input type="text" id="mail" name="email" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <label for="password" class="block text-gray-700 font-semibold">password :</label>
                <input type="password" id="password" name="password" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <label for="biography" class="block text-gray-700 font-semibold">Description :</label>
                <textarea id="biography" name="description" class="mt-2 h-96 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                <label for="picture" class="block text-gray-700 font-semibold">Télécharger une image :</label>
                <input type="file" id="picture" name="picture" accept="image/*" class="mt-2">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Valider</button>
            </div>
        </form>
    </div>
</div>