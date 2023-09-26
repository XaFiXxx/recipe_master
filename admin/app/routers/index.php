<?php
// ROUTE DES USERS

if (isset($_GET['pseudo'])) :
    include_once '../app/routers/users.php';
    
else :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashBoardAction($connexion);

endif;
