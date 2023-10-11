<?php
use \App\Controllers\UsersController;
include_once '../app/controllers/usersController.php';

switch ($_GET['users']) : 
    case 'index' : 
        UsersController\indexAction($connexion);
    break;
    case 'addform' : 
        UsersController\addFormAction($connexion);
    break;
    case 'add' : 
        UsersController\addAction($connexion, [
            'pseudo' =>  $_POST['pseudo'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'description' => $_POST['description'],
            'picture' => $_FILES['picture']
        ]);
    break;
endswitch;