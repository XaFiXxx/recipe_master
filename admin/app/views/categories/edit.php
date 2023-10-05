<div class="min-h-screen py-8">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-5xl font-semibold mb-6">Modification d'un enregistrement</h1>
        <a href="categories">Retour vers la liste des enregistrements</a>

        <!-- Formulaire d'ajout de catégorie -->
        <form action="categories/edit/<?php echo $categorie['id'] ?>" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nom de la Catégorie:</label>
                <input type="text" id="name" name="name" value="<?php echo $categorie['name'] ?>" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Description :</label>
                <input type="text" id="description" name="description" value="<?php echo $categorie['description'] ?>" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Valider</button>
            </div>
        </form>
    </div>
</div>
