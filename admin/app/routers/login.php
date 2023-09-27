<?php
use \App\Controllers\LoginController;
include_once '../app/controllers/loginController.php';

switch ($_GET['name']) : 
    case 'logout' : 
        LoginController\logoutAction();
    break;
endswitch;

