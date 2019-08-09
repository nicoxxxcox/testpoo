<?php

    use App\Message\Message;
    use App\User\User;

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
//Auth::force_connexion('/test2/login');
    ob_start();
    require ROOTPATH . '/templates/home.php';
    $message = new Message();
    $content = ob_get_clean();
    require ROOTPATH . '/templates/default.php';