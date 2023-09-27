<?php

if (isset($_GET['recettes'])) :
    include_once '../app/routers/dishes.php';
else :
    include_once '../app/controllers/homeController.php';
    \App\Controllers\HomeController\homeAction($connexion);
endif;