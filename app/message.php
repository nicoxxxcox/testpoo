<?php

    use App\Message\Message;
    use App\View\View;

        // come from routing parameters
        $id = $uri_Data['id'];

        $message = new Message();

        $render = new View('header');

        var_dump($render);
        $render = new View('message');
        $render->assign('id' , $id);
        $render->assign('a' , $message->find($id));
        $render->assign('back_to_messages' , $router->generate('messages'));
        var_dump($render);
        new View('footer');
        var_dump($render);

        /*ob_start();
        require ROOTPATH . '/templates/message.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';*/
