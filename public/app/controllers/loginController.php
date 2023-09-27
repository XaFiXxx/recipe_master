<?php
namespace App\Controllers\LoginController;

use App\Models\LoginModels;

function loginFormAction(\PDO $connexion) {
global $content, $title;
$title = TITRE_LOGIN_FORM;
ob_start();
include '../app/views/login/loginForm.php';
$content = ob_get_clean();
}

function loginAction(\PDO $connexion, array $data = null) {
    include '../app/models/loginModels.php';
    $name = LoginModels\findOneByLogin($connexion, $data);
    
    if($name && password_verify($data['password'], $name['password'])):
        $_SESSION['name'] = $name;
        header('location: ' . ADMIN_ROOT);
    else:
        header('location: ' . PUBLIC_ROOT . 'login/form');
    endif;
    }