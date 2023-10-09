<div class="min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-5xl font-semibold mb-6">Ajout d'un livre</h1>
        <a href="recettes" class="text-blue-500 hover:underline">Retour vers la liste des livres</a>

        <form action="recettes/add/insert" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<? $recettes['id'] ?>">

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nom :</label>
                <input type="text" id="name" name="name" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Description :</label>
                <textarea id="description" name="description" class="mt-2 h-96 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="prep_time" class="block text-gray-700 font-semibold">Temps de préparation :</label>
                <input type="text" id="prep_time" name="prep_time" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="portions" class="block text-gray-700 font-semibold">Nombre de portions :</label>
                <input type="number" id="portions" name="portions" class="mt-2 px-4 py-2 w-full md:w-2/5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="picture" class="block text-gray-700 font-semibold">Télécharger une cover :</label>
                <input type="file" id="picture" name="picture" accept="image/*" class="mt-2">
            </div>

            <div class="mb-4">
                <label for="userId" class="block text-gray-700 font-semibold">Choisissez un chef :</label>
                <select id="userId" name="userId" class="mt-2 w-full md:w-2/5 border border-gray-300 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:border-blue-500">
                    <?php foreach ($chefs as $chef): ?>
                        <option value="<?php echo $chef['id']; ?>">
                            <?php echo $chef['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="typeId" class="block text-gray-700 font-semibold">Choisissez une catégorie :</label>
                <select id="typeId" name="typeId" class="mt-2 w-full md:w-2/5 border border-gray-300 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:border-blue-500">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>">
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Sélectionnez des ingrédients :</label>
                <div class="grid grid-cols-2 gap-4">
                    <?php foreach ($ingredients as $ingredient): ?>
                        <div>
                            <label for="ingredient_<?php echo $ingredient['id']; ?>" class="inline-flex items-center">
                                <input type="checkbox" id="ingredient_<?php echo $ingredient['id']; ?>" name="ingredient[]" value="<?php echo $ingredient['id']; ?>" class="form-radio text-blue-500">
                                <span class="ml-2"><?php echo $ingredient['name']; ?></span>
                            </label>
                            <input type="number" id="quantity_<?php echo $ingredient['id']; ?>" name="quantite_<?php echo $ingredient['id']; ?>" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Quantité">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Valider</button>
            </div>
        </form>
    </div>
</div>
