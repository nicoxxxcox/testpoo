<?php

    use App\Message\Message;
    use App\Message\MessageManager;
    use App\User\User;
    use App\User\UserManager;
    use App\Auth\Auth;


    $router = new AltoRouter();


    router_base_path();


    // ROUTES

    /**
     * @desc map routes
     */
    $router->map('GET|POST' , '/' , 'index' , 'home' );
    $router->map('GET|POST' , '/messages' , 'messages' , 'messages');
    $router->map('GET|POST' , '/message/[i:id]' , 'message' , 'message');

    /**
     * @desc matching routes
     */
    // matching routes
    $match = $router->match();
    // load a 404 page if no matches
    if($match == false){
        require ROOTPATH . '/templates/404.php';
    }
    // load the function and params if is a closure
    elseif(is_callable($match['target'])){
        call_user_func_array($match['target'] , $match['params']);
    }
    // load the file of match['target']
    else {
        $uri_Data = $match['params'];
        require ROOTPATH . "/app/{$match['target']}.php";
    }

   /* // on match les routes
    $match = $router->match();
    if (is_array($match) && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
// no route was matched
        require ROOTPATH . '/templates/404.php';
    }*/

