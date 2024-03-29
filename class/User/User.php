<?php
    namespace App\User;

    class User
    {

        // ATTRIBUTES
        /**
         * @var string
         */
        protected $name;

        /**
         * @var string
         */
        protected $guid;

        /**
         * @var string
         */
        private $pseudo ;

        /**
         * @var string
         */
        private $email;

        /**
         * @var string
         */
        private $password;


        /**
         * @var integer
         */
        private $connexion_date;



        /**
         * @var UserManager
         */
        private $manager;

        private $users = [];

        public function __construct(array $user = null)
        {
            if($user !== null){
                $this->hydrate($user);
            }

            $this->manager = new UserManager();

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
         * Search a user by id
         */
        public function find($id)
        {
            if($this->manager->userExist($id)){
                $entity = $this->manager->find($id);
            } else {
                $entity = false;
            }
            return $entity;
        }

        public function findByEmail($email)
        {
            if($this->manager->userExist($email)){
                $entity = $this->manager->findByEmail($email);
            } else {
                $entity = false;
            }
            return $entity;
        }



        /**
         * search all users
         */
        public function findAll()
        {


            // instanciation d'un tableau vide
            $entities = [];
            $entities = $this->manager->findAll();
            return $entities;

        }

        /**
         * @param $user
         * Delete a user from the database.db
         */
        public  function remove($id)
        {
            $this->manager->remove($id);
        }

        /**
         * @param $user
         * Add user to the database.db
         */
        public function persist($user)
        {
            $this->manager->persist($user);
        }


        public function passwordVerify($password)
        {
            return password_verify($password , $this->getPassword());
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
        public function getPseudo()
        {
            return $this->pseudo;
        }

        /**
         * @param mixed $pseudo
         */
        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return DateTime
         */
        public function getConnexionDate()
        {
            return $this->connexion_date;
        }

        /**
         * @param DateTime $connexion_date
         */
        public function setConnexionDate($connexion_date)
        {
            $this->connexion_date = $connexion_date;
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