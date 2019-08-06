<?php

    namespace App\Auth;

    class Auth
    {



        /**
         * @return bool
         * Il la session n'existe pas on la créé
         */
        public static function is_connected()
        {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            return !empty($_SESSION['user']);
        }

        public static function force_connexion($redirection_path)
        {
            if (!self::is_connected()) {
                header('Location: '. $redirection_path );
                exit();
            }
        }
    }