<?php

    use App\Message\Message;
    use App\User\User;
    use App\View\View;

    if (isset($_POST['pseudo_new']) && isset($_POST['email_new'])) {
        $aUser = [];
        $aUser = array("connexionDate" => date("Y-m-d H:i:s"),
                       "email" => $_POST['email_new'],
                       "pseudo" => $_POST['pseudo_new'],
                       "password" => password_hash($_POST['password_new'], PASSWORD_DEFAULT));
        $user = new User($aUser);

// on demande au manager d'écrire en base le user
        $user->persist($user);

    }

    if (isset($_POST['logout']) && isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

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
            echo "<div class=\"alert alert-secondary\" role=\"alert\">
                Cet utilisateur n'existe pas
            </div>";
            $messageInfo = ob_get_clean();
        }




    }
    


    $render = new View('home');
    $render->assign('id' , $id);
    $message = new Message();
    $render->assign('a' , $message->find($id));
    $render->assign('back_to_messages' , $router->generate('messages'));



//Auth::force_connexion('/test2/login');
    
    // ob_start();
    // require ROOTPATH . '/templates/home.php';
    // $message = new Message();
    // $content = ob_get_clean();
    // require ROOTPATH . '/templates/default.php';