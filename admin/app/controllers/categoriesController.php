<?php

namespace App\Controllers\CategoriesController;
use \App\Models\CategoriesModels;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModels.php';
    $categories = CategoriesModels\findAll($connexion);

    global $content, $title;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function addFormAction(\PDO $connexion)
{
    global $content, $title;
    $title = "Liste des enregistrements";
    ob_start();
    include '../app/views/categories/ajout.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModels.php';
    $id = CategoriesModels\insert($connexion, $_POST);
    header ('location: ' . ADMIN_ROOT . 'categories');
}

function deleteAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModels.php';
    $return = intval(CategoriesModels\delete($connexion, $id));
    header ('location: ' . ADMIN_ROOT . 'categories');
}

function editFormAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModels.php';
    $categorie = CategoriesModels\findOneById($connexion, $id);

    GLOBAL $content, $title;
    $title =  "Modification de l'enregistrement :";
    ob_start();
    include '../app/views/categories/edit.php';
    $content = ob_get_clean();
}

function editAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModels.php';
    $return = CategoriesModels\update($connexion, $id, $_POST);
    header ('location: ' . ADMIN_ROOT . 'categories');
}