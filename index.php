<?php


    // load autoloader to avoid requires
    require './vendor/autoload.php';

    $auth = new App\Auth\Auth();
    $is_connected = $auth->is_connected();

    // load utility functions
    require './functions/functions.php';

    // load config file
    require './config/config.php';

    // load database config file
    require './config/database_conf.php';

    // load router
    require './router/router.php';

    



    // for testing
    require 'testing.php';



  

  
    






