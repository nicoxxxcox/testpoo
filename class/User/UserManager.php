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

        public function UserExist($id)
        {
            $query = $this->getDb()->prepare('SELECT id FROM user WHERE id = :id');
            $query->bindValue(':id', $id , PDO::PARAM_INT);
            $query->execute();

            $entity = $query->fetch();
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


            $query = $this->getDb()->prepare('INSERT INTO user (pseudo , email , connexion_date) value (:pseudo , :email , :connexion_date)');
            $query->bindValue(':pseudo' , $user->getPseudo() , PDO::PARAM_STR);
            $query->bindValue(':email' , $user->getEmail() , PDO::PARAM_STR);
            $query->bindValue(':connexion_date' , $user->getConnexionDate() );

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