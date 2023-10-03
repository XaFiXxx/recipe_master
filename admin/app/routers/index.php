<?php
// ROUTE DES USERS

if (isset($_GET['name'])) :
    include_once '../app/routers/login.php';

elseif (isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';    

elseif (isset($_GET['recettes'])) :
    include_once '../app/routers/recettes.php';   
    
else :
    include_once '../app/controllers/loginController.php';
    \App\Controllers\LoginController\dashBoardAction($connexion);

endif;
