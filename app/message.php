<?php

    use App\Message\Message;

        // come from routing parameters
        $id = $uri_Data['id'];

        $message = new Message();
        $a = $message->find($id);

        ob_start();
        require ROOTPATH . '/templates/message.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';
