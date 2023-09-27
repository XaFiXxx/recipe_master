<?php

namespace App\Controllers\UsersController;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/usersModels.php';
    $users = \App\Models\UsersModel\findAll($connexion);

    global $title, $content;
    $title = "";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function ShowAction(\PDO $connexion, int $id)
{
    include_once '../app/models/usersModels.php';
    $user = \App\Models\UsersModel\findOneById($connexion, $id);

    include_once '../app/models/dishesModels.php';
    $dishes = \App\Models\DishesModel\findAllDishesByUserID($connexion, $id);

    global $title, $content;
    $title = "";
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}