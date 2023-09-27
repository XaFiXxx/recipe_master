<?php
use \App\Controllers\Login;

switch ($_GET['login']):
    case 'form':
        include_once '../app/controllers/loginController.php';
        \App\Controllers\LoginController\loginFormAction($connexion);
    break;
    case 'submit':
        include_once '../app/controllers/loginController.php';
        \App\Controllers\loginController\loginAction($connexion, [
            'name' => $_POST['name'],
            'password' =>  $_POST['password'],
        ]);
        break;
endswitch;