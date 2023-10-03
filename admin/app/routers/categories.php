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
endswitch;