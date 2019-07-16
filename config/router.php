<?php

    use App\Message\Message;
    use App\Message\MessageManager;

    $router = new AltoRouter();

    $router->setBasePath('/test2');

    // ROUTES
    // ici nous définissions les routes


    $router->map('GET' , '/' ,function(){


        ob_start();
        require ROOTPATH . '/templates/home.php';
        $message = new Message();
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';
});



    $router->map('GET|POST', '/messages', function () {




        if (isset($_POST['title'])) {
            $aMessage = [];
            $aMessage = array("sendDate" => date("Y-m-d H:i:s"),
                              "title" => $_POST['title'],
                              "content" => $_POST['content']);
            $message = new Message($aMessage);

            // on demande au manager d'écrire en base le message
            $message->persist($message);

        }

        if (isset($_POST['del'])) {

            $message = new Message();
            $message->remove($_POST['id']);
        }
        ob_start();
        require ROOTPATH . '/templates/messages.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';
    });

    $router->map('GET', '/message/[i:id]', function ($id) {

        $message= new Message();
        $a = $message->find($id);

        ob_start();
        require ROOTPATH . '/templates/message.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';
    });




    // on match les routes
    $match = $router->match();




    if (is_array($match) && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
// no route was matched
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }

