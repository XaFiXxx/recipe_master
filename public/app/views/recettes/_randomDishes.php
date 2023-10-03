<section class="relative mb-6">
          <img
            class="w-full h-96 object-cover"
            src="<?php echo $randomDishes['picture'];  ?>"
            alt="Featured Recipe Image"
          />
          <div
            class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
          >
            <h1 class="text-3xl font-bold mb-2 text-white">
              <?php echo  $randomDishes['dish_name']; ?>
            </h1>
            <div class="flex items-center mb-4">
              <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
              ></span>
              <span class="text-white"><?php echo  $randomDishes['average_rating']; ?></span>
            </div>
            <p class="text-gray-300 mb-4">
            <?php echo core\tools\truncate($randomDishes['description'], 360);?>
            </p>
            <div class="flex items-center mb-4">
              <span class="text-gray-400 mr-2"><?php echo  $randomDishes['user_name']; ?></span>
              <span class="text-gray-500"
                ><i class="fas fa-comment"></i> <?php echo  $randomDishes['number_of_comments']; ?> commentaires</span
              >
            </div>
            <a
                  href="recettes/<?php echo $randomDishes['id'] ?>/<?php echo core\tools\slugify($randomDishes['dish_name']); ?>"
                  class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                >
                  Voir la recette
                </a>
          </div>
        </section>