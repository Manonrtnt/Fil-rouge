<?php
    class Right{
        private $table = 'right_user';
        private $connect;

        private $id_right;
        private $name_right;

        //! CONNECTION DATABASE
        public function __construct()
        {
            $this->connect = new DbConfig();
            $this->connect = $this->connect->getConnection();
        }

        //! GETTERS SETTERS 
        public function getTable(){
            return $this->table;
        }
    
        public function getId_right(){
            return $this->id_right;
        }
        public function setId_right($id_right){
            $this->id_right = $id_right;
        }
    
        public function getName_right(){
            return $this->name_right;
        }
    
        public function setName_right($name_right){
            $this->name_right = $name_right;
        }

        //! CRUD --> CREATE READ UPDATE DELETE 
        //! CREATE
        public function createRight() {
            $myQuery = 'INSERT INTO
                            '.$this->table.'
                        SET
                            name_right = :name_right';

            $stmt = $this->connect->prepare($myQuery);

            // Bind parameters 
            $stmt->bindParam(':name_right', $this->name_right);

            return $stmt->execute();
        }

        //! READ all users
        public function getRight() {
            // Store the query in a variable
            $myQuery = 'SELECT 
                            * 
                        FROM 
                            '.$this->table.' ';

            // Preparing the query
            $stmt = $this->connect->prepare($myQuery);

            //Execute query
            $stmt->execute();

            // Return
            return $stmt;
        }

        //! READ one user 
        public function getSingleRight() {
            $myQuery = 'SELECT 
                            * 
                        FROM 
                            '.$this->table.'
                        WHERE 
                            name_right = :name_right';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->bindParam(":name_right", $this->name_right);
            $stmt->execute();
            return $stmt;
        }

        //! UPDATE
        public function updateRight(){
            $myQuery = 'UPDATE
                            '.$this->table.'
                        SET
                            name_right = :name_right,
                        WHERE
                            name_right = :name_right2';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':name_right', $this->name_right);
            $stmt->bindParam(':name_right2', $this->name_right);

            return $stmt->execute();
        }

        //! DELETE (login)
        public function deleteUser() {
            $myQuery = 'DELETE FROM '.$this->table.' WHERE name_right = '.$this->name_right.'';

            $stmt = $this->connect->prepare($myQuery);

            $stmt->bindParam(':name_right', $this->name_right);

            return $stmt->execute();
        }
    }
?>