<?php
    use App\User\User;
    // FILE FOR TESTING

/*


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
            echo "
            <div class=\"alert alert-secondary\" role=\"alert\">
                Cet utilisateur n'existe pas
            </div>";
            $messageInfo = ob_get_clean();
        }




    }

    */