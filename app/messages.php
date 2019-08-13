<?php

    use App\Message\Message;
    use App\View\View;

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


    $render = new View('messages');


