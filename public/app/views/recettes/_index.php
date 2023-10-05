<?php
// variables disponibles : 
//    $recettes

?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <!-- Recipe Card -->
<?php foreach ($recettes as $recette) :  ?>
<article
              class="bg-white rounded-lg overflow-hidden shadow-lg relative"
            >
              <img
                class="w-full h-48 object-cover"
                src="pictures/<?php echo $recette['picture'] ?>"
                alt="Recipe Image"
              />
              <div class="p-4">
                <h3 class="text-xl font-bold mb-2"><?php echo $recette['dish_name'] ?></h3>
                <div class="flex items-center mb-2">
                  <span class="text-yellow-500 mr-1"
                    ><i class="fas fa-star"></i
                  ></span>
                  <span><?php echo $recette['average_rating'] ?></span>
                </div>
                <p class="text-gray-600"><?php echo core\tools\truncate($recette['description'], 160); ?></p>
                <div class="flex items-center mt-4">
                  <span class="text-gray-700 mr-2">Par <?php echo $recette['user_name'] ?></span>
                  <span class="text-gray-500"
                    ><i class="fas fa-comment"></i> <?php echo $recette['number_of_comments'] ?> commentaires</span
                  >
                </div>
                <a
                  href="recettes/<?php echo $recette['id'] ?>/<?php echo core\tools\slugify($recette['dish_name']); ?>"
                  class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                >
                  Voir la recette
                </a>
              </div>              
            </article>
            <?php endforeach; ?>
</div>
