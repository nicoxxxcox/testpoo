<?php
    namespace App\User;

    class BackFactory
    {
        public static function create($back , $arg = null)
        {
            $class_name = ucfirst($back) . "Back";
            return new $class_name($arg);
        }
    }