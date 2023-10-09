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

function addFormAction(\PDO $connexion)
{
    include_once '../app/models/usersModels.php';
    $chefs = \App\Models\UsersModels\findAll($connexion);

    include_once '../app/models/categoriesModels.php';
    $categories = \App\Models\CategoriesModels\findAll($connexion);

    include_once '../app/models/ingredientsModels.php';
    $ingredients = \App\Models\IngredientsModels\findAll($connexion);

    global $content, $title;
    $title = "Liste des enregistrements";
    ob_start();
    include '../app/views/recettes/ajout.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion) 
{  
    include_once '../core/tools.php';
    
    //Vérifier si une image a été téléchargée
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['picture']['name'];
        $imageTemp = $_FILES['picture']['tmp_name'];
        
        // Appeler la fonction uploadImage pour gérer le téléchargement de l'image
        \core\tools\uploadImage($imageName, $imageTemp);
    }

    include_once '../app/models/recettesModels.php';
    $id = RecettesModels\insert($connexion, $_POST);
    
    include_once '../app/models/ingredientsModels.php';
    
    foreach ($_POST['ingredient'] as $ingredientID){ 
        $return = \App\Models\IngredientsModels\insertIngredientsByID($connexion, [
            'recetteID' => $id,
            'ingredientID' => $ingredientID,
            'quantity' => $_POST['quantite_'. $ingredientID]
        ]);
    }

    header ('location: ' . ADMIN_ROOT . 'recettes');
}

function deleteAction(\PDO $connexion, int $id)
{
    include_once '../app/models/ingredientsModels.php';
    $return1 = intval(\App\Models\IngredientsModels\deleteIngredientsHasDish($connexion, $id));

    include_once '../app/models/recettesModels.php';
    $return2 = intval(\App\Models\RecettesModels\delete($connexion, $id));


    header ('location: ' . ADMIN_ROOT . 'recettes');
}

function editFormAction(\PDO $connexion, int $id) 
{
     include_once '../app/models/recettesModels.php';
     $recette = \App\Models\RecettesModels\findOneById($connexion, $id);

     include_once '../app/models/usersModels.php';
    $chefs = \App\Models\UsersModels\findAll($connexion);

    include_once '../app/models/categoriesModels.php';
    $categories = \App\Models\CategoriesModels\findAll($connexion);

    include_once '../app/models/ingredientsModels.php';
    $ingredients = \App\Models\IngredientsModels\findAll($connexion);
    $ingredientsDish = \App\Models\IngredientsModels\findIngredientsByDishId($connexion, $id);
  
    GLOBAL $content, $title;
    $title = "Formulaire d'Edition";
    ob_start();
    include '../app/views/recettes/edit.php';
    $content = ob_get_clean();
}

function editAction(\PDO $connexion, int $id) 
{
    include_once '../core/tools.php';
    
    // Vérifier si une image a été téléchargée
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['cover']['name'];
        $imageTemp = $_FILES['cover']['tmp_name'];
        
        // Appeler la fonction uploadImage pour gérer le téléchargement de l'image
        tools\uploadImage($imageName, $imageTemp, $id);
    }
  

    include_once '../app/models/ingredientsModels.php';
    $return1 = intval(\App\Models\IngredientsModels\deleteIngredientsHasDish($connexion, $id));

    include_once '../app/models/recettesModels.php';
    $return2 = RecettesModels\update($connexion, $id, $_POST);
    
   
    foreach ($_POST['ingredient'] as $ingredientID){ 
        $return = \App\Models\IngredientsModels\insertIngredientsByID($connexion, [
            'recetteID' => $id,
            'ingredientID' => $ingredientID,
            'quantity' => $_POST['quantite_'. $ingredientID]
        ]);
    }

    header ('location: ' . ADMIN_ROOT . 'recettes');
}