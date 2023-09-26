<?php
use \App\Controllers\UsersController;
include_once '../app/controllers/usersController.php';

switch ($_GET['pseudo']) : 
    case 'logout' : 
        UsersController\logoutAction();
    break;
endswitch;

