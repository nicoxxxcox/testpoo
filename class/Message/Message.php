<?php

    namespace App\Message;


    /**
     * Class Message
     * The controler
     */
    class Message {

        private $id;
        private $title;
        private $content;
        private $send_date ;

        private $manager;

        private $User;


        public function __construct(array $message = null)
        {
            if($message !== null){
                $this->hydrate($message);
            }

            $this->manager = new MessageManager();

        }

        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                $method = 'set'.ucfirst($key);

                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }


        /**
         * @param $id
         * @return mixed
         * Search a message by id
         */
        public function find($id)
        {
            if($this->manager->messageExist($id)){
                $entity = $this->manager->find($id);
            } else {
                $entity = false;
            }


            return $entity;
        }

        /**
         * search all messages
         */
        public function findAll()
        {


            // instanciation d'un tableau vide
            $entities = [];
            $entities = $this->manager->findAll();
            return $entities;

        }

        /**
         * @param $message
         * Delete a message from the database.db
         */
        public  function remove($id)
        {
            $this->manager->remove($id);
        }

        /**
         * @param $message
         * Add message to the database.db
         */
        public function persist($message)
        {
            $this->manager->persist($message);
        }

        /**
         * @return string
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param string $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            $this->content = $content;
        }

        /**
         * @return DateTime
         */
        public function getSendDate()
        {
            return $this->send_date;
        }

        /**
         * @param DateTime $send_date
         */
        public function setSendDate($send_date)
        {
            $this->send_date = $send_date;
        }

        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->User;
        }

        /**
         * @param mixed $User
         */
        public function setUser($User)
        {
            $this->User = $User;
        }

        /**
         * @return mixed
         */
        public function getManager()
        {
            return $this->manager;
        }

        /**
         * @param mixed $manager
         */
        public function setManager($manager)
        {
            $this->manager = $manager;
        }







    }