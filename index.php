<?php
    use App\Auth\Auth;

    // load autoloader to avoid requires
    require './vendor/autoload.php';




    // load utility functions
    require './functions/functions.php';

    // load config file
    require './config/config.php';

    // load database config file
    require './config/database_conf.php';

    // load router
    require './router/router.php';

    //  Auth::force_connexion($router->generate('home'));

    



    // for testing
    require 'testing.php';



  

  
    






