<?php

namespace App\Controllers\DishesController;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/dishesModels.php';
    $recettes = \App\Models\DishesModel\findAll($connexion);

    global $title, $content, $scripts;
    $scripts .= '<script src="js/olders/index.js"></script>';
    $title = "";
    ob_start();
    include '../app/views/recettes/index.php';
    $content = ob_get_clean();
}

function ShowAction(\PDO $connexion, int $id)
{
    include_once '../app/models/dishesModels.php';
    $recettes = \App\Models\DishesModel\findBaseInformations($connexion, $id);
    $ingredients = \App\Models\DishesModel\findIngredientsByDishes($connexion, $id);
    $commentaries = \App\Models\DishesModel\findCommentariesByDishes($connexion, $id);



    global $title, $content;
    $title = "";
    ob_start();
    include '../app/views/recettes/show.php';
    $content = ob_get_clean();
}

function searchAction(\PDO $connexion, string $search)
{
   

    global $title, $content;
    $title = "Résultat pour";
    ob_start();
    include '../app/views/recettes/show.php';
    $content = ob_get_clean();
}


