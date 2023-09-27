<?php
if(!isset($_SESSION['name'])) :
    header ('location: ' . PUBLIC_ROOT);
endif;