<?php

namespace App\Controllers\CategoriesController;

function ShowAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModels.php';
    $categories = \App\Models\CategoriesModel\findOneById($connexion, $id);

    include_once '../app/models/dishesModels.php';
    $recettes = \App\Models\DishesModel\findAllDishesByCategoriesId($connexion, $id);
    
    global $title, $content;
    $title = $categories['name'];
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
}