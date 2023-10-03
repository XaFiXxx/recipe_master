<?php

namespace App\Controllers\CategoriesController;
use \App\Models\CategoriesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModels.php';
    $categories = CategoriesModel\findAll($connexion);

    global $content, $title;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}