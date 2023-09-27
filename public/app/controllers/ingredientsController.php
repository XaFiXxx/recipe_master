<?php

namespace App\Controllers\IngredientsController;

function ShowAction(\PDO $connexion, int $id)
{
    include_once '../app/models/ingredientsModels.php';
    $ingredients = \App\Models\IngredientsModel\findOneById($connexion, $id);

    include_once '../app/models/dishesModels.php';
    $recettes = \App\Models\DishesModel\findAllDishesByIngredientsId($connexion, $id);
    
    global $title, $content;
    $title = $ingredients['name'];
    ob_start();
    include '../app/views/ingredients/show.php';
    $content = ob_get_clean();
}