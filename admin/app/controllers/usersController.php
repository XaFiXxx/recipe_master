<?php

namespace App\Controllers\UsersController;
use \App\Models\UsersModels;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/usersModels.php';
    $users = UsersModels\findAll($connexion);

    global $content, $title;
    $title = "Liste des Users";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function addFormAction(\PDO $connexion)
{
    global $content, $title;
    $title = "Liste des enregistrements";
    ob_start();
    include '../app/views/users/ajout.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion, array $data = null)
{
    include_once '../core/tools.php';
    
    // Vérifier si une image a été téléchargée
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['picture']['name'];
        $imageTemp = $_FILES['picture']['tmp_name'];
        
        // Appeler la fonction uploadImage pour gérer le téléchargement de l'image
        tools\uploadImage($imageName, $imageTemp);
    }


    include_once '../app/models/usersModels.php';
    $id = UsersModels\insert($connexion, $data);


    header ('location: ' . ADMIN_ROOT . 'users');
}