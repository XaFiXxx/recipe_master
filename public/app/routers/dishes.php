<?php

switch ($_GET['recettes']):
    case 'index':
        include_once '../app/controllers/dishesController.php';
        \App\Controllers\DishesController\indexAction($connexion);
    break;
endswitch;