<?php

    use App\Message\Message;
    use App\User\User;
    use App\View\View;


if(isset($_POST['email_login'] , $_POST['password_login'])){

    $email = $_POST['email_login'];
    $user = new User();
    $res_user = $user->findByEmail($email);
    if($res_user){
        $user->hydrate($res_user);
        if($user->passwordVerify($_POST['password_login'])){
            $_SESSION['user']['pseudo'] = $user->getPseudo();
            $_SESSION['user']['email'] = $user->getEmail();
        }

    }
    else{
        ob_start();
        ?> <div class="alert alert-secondary" role="alert">
            Cet utilisateur n'existe pas ou le mot de passe est incorrect
        </div>
        <? $messageInfo = ob_get_clean();
    }



}

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


