<?php
use \App\Controllers\RecettesController;
include_once '../app/controllers/recettesController.php';

switch ($_GET['recettes']) : 
    case 'index' : 
        RecettesController\indexAction($connexion);
    break;
endswitch;