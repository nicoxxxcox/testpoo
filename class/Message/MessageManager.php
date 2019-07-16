<?php
    namespace App\Message;

    //require_once ROOTPATH . '/class/PDO/PDOFactory.php';

    use App\PDO\PDOFactory;
    use PDO;

    class MessageManager
    {
        private $db;

        private $message ;

        public function __construct()
        {
            $this->db =  PDOFactory::getMysqlConnexion('test' , 'root' , '');
        }

        public function messageExist($id)
        {
            $query = $this->getDb()->prepare('SELECT id FROM message WHERE id = :id');
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
         * Search a message by id
         */
        public function find($id)
        {
            $query = $this->getDb()->prepare('SELECT * FROM message WHERE id = :id');
            $query->bindValue(':id', $id , PDO::PARAM_INT);
            $query->execute();
            $entity = $query->fetch();

            return $entity;
        }

        /**
         * search all messages
         */
        public function findAll()
        {
            // instanciation d'un tableau vide
            $entities = [];

            $query = $this->getDb()->query('SELECT * FROM message ORDER BY send_date DESC');

            $entities = $query->fetchAll(PDO::FETCH_ASSOC);
            return $entities;

        }

        /**
         * @param $message
         * Delete a message from the database.db
         */
        public  function remove($id)
        {
            $query = $this->getDb()->prepare('DELETE FROM message WHERE id = :id');
            $query->bindValue(':id' , $id, PDO::PARAM_INT);

            $query->execute();
        }

        /**
         * @param $message
         * Add message to the database.db
         */
        public function persist($message)
        {


            $query = $this->getDb()->prepare('INSERT INTO message (title , content , send_date) value (:title , :content , :send_date)');
            $query->bindValue(':title' , $message->getTitle() , PDO::PARAM_STR);
            $query->bindValue(':content' , $message->getContent() , PDO::PARAM_STR);
            $query->bindValue(':send_date' , $message->getSendDate() );

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



        //public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null);
        //public function findOneBy(array $criteria);
        //public function getClassName();






    }