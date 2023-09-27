<?php
// ROUTE DES USERS

if (isset($_GET['name'])) :
    include_once '../app/routers/login.php';
    
else :
    include_once '../app/controllers/loginController.php';
    \App\Controllers\LoginController\dashBoardAction($connexion);

endif;
