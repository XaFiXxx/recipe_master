<?php

switch ($_GET['chefs']):
    case 'index':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\UsersController\indexAction($connexion);
    break;
    case 'show':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\UsersController\showAction($connexion, $_GET['id']);
        break;
endswitch;