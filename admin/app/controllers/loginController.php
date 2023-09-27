<?php

namespace App\Controllers\LoginController;

function dashBoardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "DashBoard";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}

function logoutAction(){
    unset($_SESSION['name']);
    header('location: ' . PUBLIC_ROOT);
}

