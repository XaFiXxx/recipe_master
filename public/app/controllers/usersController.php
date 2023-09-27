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