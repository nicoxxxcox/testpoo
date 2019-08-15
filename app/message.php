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

        // come from routing parameters
        $id = $uri_Data['id'];

        $message = new Message();

        $render = new View('header');
        $render = new View('message');
        $render->assign('id' , $id);
        $render->assign('a' , $message->find($id));
        $render->assign('back_to_messages' , $router->generate('messages'));

        new View('footer');


        /*ob_start();
        require ROOTPATH . '/templates/message.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';*/
