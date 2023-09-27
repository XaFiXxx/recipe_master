<?php
// variables disponibles : 
//    $users

?>

<h2 class="text-2xl font-bold mb-4">Liste des chefs</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <!-- User Card -->
  <?php foreach ($users as $user) : ?>
    <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
      <img
        class="w-full h-48 object-cover"
        src="pictures/<?php echo $user['user_picture']; ?>"
        alt="User Image"
      />
      <div class="p-4">
        <h3 class="text-xl font-bold mb-2"><?php echo $user['user_name']; ?></h3>
        <p class="text-gray-600"><?php echo $user['user_biography']; ?></p>
        <div class="flex items-center mt-2">
          <span class="text-gray-700 mr-2">
            <?php echo $user['total_recipes']; ?> recettes
          </span>
        </div>
        <a
          href="chefs/<?php echo $user['user_id'] ?>/<?php echo core\tools\slugify($user['user_name']); ?>"
          class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >
          Voir le détail du chef
        </a>
      </div>
    </article>
  <?php endforeach; ?>
</div>





<div class="flex justify-center items-center mt-10">
  <a
    href="recipe.html"
    class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
  >
    Load More...
  </a>
</div>