<?php
use \App\Controllers\CategoriesController;
include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']) : 
    case 'index' : 
        CategoriesController\indexAction($connexion);
    break;
    case 'addform' : 
        CategoriesController\addFormAction($connexion);
    break;
    case 'add' : 
        CategoriesController\addAction($connexion);
    break;
    case 'delete' : 
        CategoriesController\deleteAction($connexion, $_GET['id']);
    break;
    case 'editform' : 
        CategoriesController\editFormAction($connexion, $_GET['id']);
    break;
    case 'edit' : 
        CategoriesController\editAction($connexion, $_GET['id']);
    break;
endswitch;