<?php

namespace App\Controllers\DishesController;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/dishesModels.php';
    $recettes = \App\Models\DishesModel\findAll($connexion);

    global $title, $content;
    $title = "";
    ob_start();
    include '../app/views/recettes/index.php';
    $content = ob_get_clean();
}

function ShowAction(\PDO $connexion, int $id)
{
    include_once '../app/models/dishesModels.php';
    //$recettes = \App\Models\DishesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = "";
    ob_start();
    include '../app/views/recettes/show.php';
    $content = ob_get_clean();
}