<?php

switch ($_GET['chefs']):
    case 'index':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\UsersController\indexAction($connexion);
    break;
endswitch;