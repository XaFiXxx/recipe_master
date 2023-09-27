<?php

namespace App\Controllers\HomeController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/dishesModels.php';
    $recettes = \App\Models\DishesModel\findPopularDishes($connexion);
    $randomDishes = \App\Models\DishesModel\randOneDishes($connexion);

    include_once '../app/models/usersModels.php';
    $topUser = \App\Models\UsersModel\getTopUser($connexion);
    $topDishesByUser = \App\Models\DishesModel\getTopDishesByUserID($connexion, $topUser['user_id']);

    global $title, $content;
    $title = "";
    ob_start();
    include '../app/views/home/home.php';
    $content = ob_get_clean();
}