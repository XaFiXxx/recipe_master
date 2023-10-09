<main class="w-full md:w-3/4 p-3">
        <!-- Recipe Detail -->
        <section class="bg-white rounded-lg shadow-lg p-6 mb-6">
          <!-- Recipe Image -->
          <img
            class="w-full h-96 object-cover rounded-t-lg"
            src="pictures/<?php echo $recettes['picture'];  ?>"
            alt="Nom de la recette"
          />

          <!-- Recipe Info -->
          <div class="p-4">
            <h1 class="text-3xl font-bold mb-4"><?php echo $recettes['nom_recette'];  ?></h1>
            <div class="flex items-center mb-4">
              <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
              ></span>
              <span>4.9</span>
              <span class="ml-4 text-gray-700"
                ><i class="fas fa-clock"></i><?php echo $recettes['duree_preparation'];  ?></span
              >
            </div>
            <p class="text-gray-700 mb-4">
            <?php echo $recettes['description_recette'];  ?>
            </p>
            <div class="flex items-center mb-4">
              <span class="text-gray-700 mr-2">Par <?php echo $recettes['nom_auteur'];  ?></span>
              <span class="text-gray-500"
                ><i class="fas fa-comment"></i> <?php echo $recettes['nombre_commentaires'];  ?> commentaires</span
              >
            </div>
          </div>

          <!-- Ingredients -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
            <?php foreach ($ingredients as $ingredient) :  ?>
            <ul class="list-disc pl-5">
              <li><?php echo $ingredient['quantite'] . ' ' . $ingredient['unite'] . ' de ' . $ingredient['nom_ingredient']; ?></li>
            </ul>
            <?php endforeach;  ?>
          </div>

          <!-- Comments -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
            <!-- Comment -->
            <?php  foreach($commentaries as $commentary) : ?>
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <img
                  src="pictures/<?php echo $commentary['picture'] ?>"
                  alt="Nom de l'utilisateur"
                  class="w-10 h-10 rounded-full mr-2"
                />
                <span class="font-bold"><?php echo $commentary['nom_utilisateur'] ?></span>
              </div>
              <p class="text-gray-700">
              <?php echo $commentary['contenu_commentaire'] ?>
              </p>
            </div>
            <?php endforeach; ?>
          </div>
        </section>
      </main>