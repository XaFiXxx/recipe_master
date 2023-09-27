<?php

if (isset($_GET['recettes'])) :
    include_once '../app/routers/dishes.php';

elseif (isset($_GET['chefs'])) :
    include_once '../app/routers/users.php';

elseif (isset($_GET['login'])) :
    include_once '../app/routers/login.php';

elseif (isset($_GET['categories']) && $_GET['categories'] === 'show' && isset($_GET['id'])) :
    include_once '../app/controllers/categoriesController.php';
    App\Controllers\CategoriesController\showAction($connexion, $_GET['id']);

elseif (isset($_GET['ingredients']) && $_GET['ingredients'] === 'show' && isset($_GET['id'])) :
    include_once '../app/controllers/ingredientsController.php';
    App\Controllers\IngredientsController\showAction($connexion, $_GET['id']);

else :
    include_once '../app/controllers/homeController.php';
    \App\Controllers\HomeController\homeAction($connexion);
endif;