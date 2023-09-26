<?php

namespace App\Controllers\UsersController;

function dashBoardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "DashBoard";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}

function logoutAction(){
    unset($_SESSION['pseudo']);
    header('location: /BES_2_23_24/SCRIPTSERVEUR_23_24/book_hunter_2023/public/public/?');
}

