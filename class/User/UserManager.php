<?php

namespace App\User;
use App\PDO\PDOFactory;
use PDO;

class UserManager
{
    private $db;

    private $user;

    public function __construct()
        {
            $this->db =  PDOFactory::getMysqlConnexion('test' , DB_LOGIN , DB_PASSWORD);
        }

        public function UserExist($info)
        {

            if(filter_var( $info, FILTER_VALIDATE_EMAIL)) {
                $query = $this->getDb()->prepare('SELECT email FROM user WHERE email = :email');
                $query->bindValue(':email', $info , PDO::PARAM_INT);
                $query->execute();

                $entity = $query->fetch();
            }
            else {
                $query = $this->getDb()->prepare('SELECT id FROM user WHERE id = :id');
                $query->bindValue(':id', $info , PDO::PARAM_INT);
                $query->execute();

                $entity = $query->fetch();
            }

            if( !empty($entity)){
                return true;
            }
            return false;

        }

        /**
         * @param $id
         * @return mixed
         * Search a user by id
         */
        public function find($id)
        {
            $query = $this->getDb()->prepare('SELECT * FROM user WHERE id = :id');
            $query->bindValue(':id', $id , PDO::PARAM_INT);
            $query->execute();
            $entity = $query->fetch();

            return $entity;
        }

    public function findByEmail($email)
    {
        $query = $this->getDb()->prepare('SELECT * FROM user WHERE email = :email');
        $query->bindValue(':email', $email , PDO::PARAM_INT);
        $query->execute();
        $entity = $query->fetch();

        return $entity;
    }

        /**
         * search all users
         */
        public function findAll()
        {
            // instanciation d'un tableau vide
            $entities = [];

            $query = $this->getDb()->query('SELECT * FROM user ORDER BY connexion_date DESC');

            $entities = $query->fetchAll(PDO::FETCH_ASSOC);
            return $entities;

        }

        /**
         * @param $user
         * Delete a user from the database.db
         */
        public  function remove($id)
        {
            $query = $this->getDb()->prepare('DELETE FROM user WHERE id = :id');
            $query->bindValue(':id' , $id, PDO::PARAM_INT);
            $query->execute();
        }

        /**
         * @param $user
         * Add user to the database.db
         */
        public function persist($user)
        {
            $query = $this->getDb()->prepare('INSERT INTO user (pseudo , email ,password , connexion_date,guid) value (:pseudo , :email, :password , :connexion_date , :guid)');
            $query->bindValue(':pseudo' , $user->getPseudo() , PDO::PARAM_STR);
            $query->bindValue(':email' , $user->getEmail() , PDO::PARAM_STR);
            $query->bindValue(':password' , $user->getPassword() , PDO::PARAM_STR);
            $query->bindValue(':guid' , uniqid() , PDO::PARAM_STR);
            $query->bindValue(':connexion_date' , $user->getConnexionDate() );

            $query->execute();

        }

        public function password_verify($user)
        {
            $query = $this->getDb()->prepare('SELECT COUNT(*) FROM user WHERE email = :email AND password = :password');
            $query->bindValue(':email' , $user->getEmail() , PDO::PARAM_STR);
            $query->bindValue(':password' , $user->getPassword() , PDO::PARAM_STR);

            $query->execute();
        }

        /**
         * @return PDO
         */
        public function getDb()
        {
            return $this->db;
        }

        /**
         * @param PDO $db
         */
        public function setDb($db)
        {
            $this->db = $db;
        }


}