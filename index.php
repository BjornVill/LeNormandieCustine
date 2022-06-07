<?php

// declare(Strict_type=1); // pour les types


if (isset($_GET['page'])){
    if ($_GET['page']==='login'){
        require './controllers/login_controller.php';
    }
}

?>