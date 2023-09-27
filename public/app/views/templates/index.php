<!DOCTYPE html>
<html lang="fr">
  <head>
   <?php include '../app/views/templates/partials/_head.php' ?>
  </head>
  <body
    class="bg-gray-100 text-gray-800 font-sans leading-normal tracking-normal"
  >
  <?php include '../app/views/templates/partials/_header.php' ?>

    <!-- Main -->
    <div class="container mx-auto flex flex-wrap pt-4 pb-12 text-gray-800">
      <!-- Filters -->
      <?php include '../app/views/templates/partials/_aside.php' ?>

      <!-- Main content -->
      <?php include '../app/views/templates/partials/_main_content.php' ?>
    </div>

    <?php include '../app/views/templates/partials/_scripts.php' ?>

    <!-- Footer -->
    <?php include '../app/views/templates/partials/_footer.php' ?>
  </body>
</html>
