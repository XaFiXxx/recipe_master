<?php

namespace App\Controllers\RecettesController;
use \App\Models\RecettesModels;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/recettesModels.php';
    $recettes = RecettesModels\findAll($connexion);

    global $content, $title;
    $title = "Liste des recettes";
    ob_start();
    include '../app/views/recettes/index.php';
    $content = ob_get_clean();
}