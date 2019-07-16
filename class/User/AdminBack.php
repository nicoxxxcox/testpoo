<?php
    namespace App\User;
    //require_once "User.php";

    class AdminBack extends User implements crud_userInterface
    {
        private $admin_guid;
        private $Messages = array();

        //CONSTRUCTOR
        public function __construct($name)
        {
            $this->name = $name;
            $this->setGuid(uniqid());
            $this->setAdminGuid(uniqid());
        }

        /**
         * @param mixed $guid
         */
        public function setGuid($guid)
        {
            $this->guid = $guid;
        }

        public function read()
        {
            return "Voici toutes les infos de l'admin " . $this->name . " : <br>
            nom : " . $this->name . "<br>
            guid : " . $this->guid . "<br>
            admin guid : " . $this->admin_guid . " <br>";

        }

        public function invite($admin_name)
        {
            return new AdminBack($admin_name);
        }

        /**
         * @return mixed
         */
        public function getAdminGuid()
        {
            return $this->admin_guid;
        }

        /**
         * @param mixed $admin_guid
         */
        public function setAdminGuid($admin_guid)
        {
            $this->admin_guid = $admin_guid;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getGuid()
        {
            return $this->guid;
        }

        /**
         * @return array
         */
        public function getMessages()
        {
            return $this->Messages;
        }

        /**
         * @param array $Messages
         */
        public function setMessages($Messages)
        {
            $this->Messages = $Messages;
        }

        // GETTERS & SETTERS

    }