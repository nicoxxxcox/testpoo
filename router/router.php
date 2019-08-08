<?php

    use App\Message\Message;
    use App\Message\MessageManager;
    use App\User\User;
    use App\User\UserManager;
    use App\Auth\Auth;


    $router = new AltoRouter();

    $router->setBasePath('/test2');


    // ROUTES
    // ici nous définissions les routes


    $router->map('GET|POST', '/login', function () {
        ob_start();
        require ROOTPATH . '/templates/login.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';
    });



    $router->map('GET|POST', '/', function () {

        // dans les cas ou l'on choisis un  pseudo créé
        if (isset($_POST['pseudo'] )  ) {
            $id = $_POST['pseudo'];
            $user = new User();
            $res_user = $user->find($id);
            if ($res_user) {
                $user->hydrate($res_user);
                $_SESSION['user']['pseudo'] = $user->getPseudo();
                $_SESSION['user']['email'] = $user->getEmail();

                $_SESSION['user']['connexion_date'] = $user->getConnexionDate();
            } else {
                unset($_SESSION['user']);
            }
        }

        if (isset($_POST['pseudo_new']) && isset($_POST['email_new'])) {
            $aUser = [];
            $aUser = array("connexionDate" => date("Y-m-d H:i:s"),
                           "email" => $_POST['email_new'],
                           "pseudo" => $_POST['pseudo_new'],
                            "password" => password_hash($_POST['password_new'] , PASSWORD_DEFAULT));
            $user = new User($aUser);

            // on demande au manager d'écrire en base le user
            $user->persist($user);

        }
        //Auth::force_connexion('/test2/login');
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

        $message = new Message();
        $a = $message->find($id);

        ob_start();
        require ROOTPATH . '/templates/message.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';
    });


    /*
    $router->map('POST' ,'/user' , function(){
        // dans les cas ou l'on choisis un  pseudo créé
        if (isset($_POST['pseudo'])) {

            $user = new User();
            $res_user = $user->find($id);
            if($res_user){
                $_SESSION['user'] = $user->hydrate($res_user);
            } else {unset($_SESSION['user']);}
        }

        if(isset($_POST['pseudo_new']) && isset($_POST['email_new'])){
            $aUser = [];
            $aUser = array("connexionDate" => date("Y-m-d H:i:s"),
                              "email" => $_POST['email_new'],
                              "pseudo" => $_POST['pseudo_new']);
            $user = new User($aUser);

            // on demande au manager d'écrire en base le user
            $user->persist($user);

            ob_start();
        require ROOTPATH . '/templates/home.php';
        $content = ob_get_clean();
        require ROOTPATH . '/templates/default.php';

        }
    });

    */


    // on match les routes
    $match = $router->match();
    if (is_array($match) && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
// no route was matched
        require ROOTPATH . '/templates/404.php';
    }

