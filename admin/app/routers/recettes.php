<?php
use \App\Controllers\RecettesController;
include_once '../app/controllers/recettesController.php';

switch ($_GET['recettes']) : 
    case 'index' : 
        RecettesController\indexAction($connexion);
    break;
    case 'addform' : 
        RecettesController\addFormAction($connexion);
    break;
    case 'add' : 
        RecettesController\addAction($connexion);
    break;
    case 'delete' : 
        RecettesController\deleteAction($connexion, $_GET['id']);
    break;
    case 'editform' : 
        RecettesController\editFormAction($connexion, $_GET['id']);
    break;case 'edit' : 
        RecettesController\editAction($connexion, $_GET['id']);
    break;
endswitch;