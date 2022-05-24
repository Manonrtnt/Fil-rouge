<?php
    class Users{
        private $table = 'users';
        public $connect;

        private $id_user;
        private $name_user;
        private $first_name_user;
        private $login_user;
        private $email_user;
        private $password_user;
        private $id_right = 2;

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

            public function getId_user(){
                return $this->id_user;
            }
        
            public function getName_user(){
                return $this->name_user;
            }
            public function setName_user($name_user){
                $this->name_user = $name_user;
            }
        
            public function getFirst_name_user(){
                return $this->first_name_user;
            }
            public function setFirst_name_user($first_name_user){
                $this->first_name_user = $first_name_user;
            }

            public function getLogin_user(){
                return $this->login_user;
            }
            public function setLogin_user($login_user){
                $this->login_user = $login_user;
            }

            public function getEmail_user(){
                return $this->email_user;
            }
            public function setEmail_user($email_user){
                $this->email_user = $email_user;
            }
        
            public function getPassword_user(){
                return $this->password_user;
            }
            public function setPassword_user($password_user){
                $this->password_user = $password_user;
            }

            public function getId_right(){
                return $this->id_right;
            }
            public function setId_right($id_right){
                return $this->id_right = $id_right;
            }

        //! CRUD --> CREATE READ UPDATE DELETE 
            //* CREATE
            public function createUser() {
                $myQuery = 'INSERT INTO
                                '.$this->table.'
                            SET
                                name_user = :name_user,
                                first_name_user = :first_name_user,
                                login_user = :login_user,
                                email_user = :email_user,
                                password_user = :password_user,
                                id_right = :id_right';

                $stmt = $this->connect->prepare($myQuery);

                // Bind parameters 
                $stmt->bindParam(':name_user', $this->name_user);
                $stmt->bindParam(':first_name_user', $this->first_name_user);
                $stmt->bindParam(':login_user', $this->login_user);
                $stmt->bindParam(':email_user', $this->email_user);
                $stmt->bindParam(':password_user', $this->password_user);
                $stmt->bindParam(':id_right', $this->id_right);

                return $stmt->execute();
            }

            //* READ all users
            public function getUsers() {
                // Store the query in a variable
                $myQuery = 'SELECT 
                                * 
                            FROM 
                                '.$this->table.' as u
                            JOIN
                                rigth_user 
                            WHERE
                                u.id_right = rigth_user.id_right';

                // Preparing the query
                $stmt = $this->connect->prepare($myQuery);

                //Execute query
                $stmt->execute();

                // Return
                return $stmt;
            }

            //* READ one user 
            public function getSingleUser() {
                $myQuery = 'SELECT * FROM '.$this->table.' JOIN right_user WHERE '.$this->table.'.id_right = right_user.id_right AND login_user = :login_user';

                $stmt = $this->connect->prepare($myQuery);
                $stmt->bindParam(":login_user", $this->login_user);
                $stmt->execute();
                return $stmt;
            }

            //* UPDATE
            public function updateUser(){
                $myQuery = 'UPDATE
                                '.$this->table.'
                            SET
                                name_user = :name_user,
                                first_name_user = :first_name_user,
                                login_user = :login_user,
                                email_user = :email_user,
                                password_user = :password_user
                            WHERE
                                id_user = :id_user';

                $stmt = $this->connect->prepare($myQuery);

                $stmt->bindParam(':name_user', $this->name_user);
                $stmt->bindParam(':first_name_user', $this->first_name_user);
                $stmt->bindParam(':email_user', $this->email_user);
                $stmt->bindParam(':password_user', $this->password_user);
                $stmt->bindParam(':login_user', $this->login_user);
                $stmt->bindParam(':id_user', $this->id_user);

                return $stmt->execute();
            }

            //* UPDATE login
            public function updateLogin($email){
                $myQuery = 'UPDATE '
                                .$this->table. '
                            SET 
                                login_user = :login_user,
                            WHERE 
                                email_user = '.$email. '';
                
                $stmt = $this->connect->prepare($myQuery);
                // var_dump($myQuery);
                $stmt->bindParam(':login_user', $this->login_user);
                // $stmt->bindParam(':email_user', $this->email_user);
                $stmt->execute();
                
                return $stmt;
            }

            //* DELETE one user
            public function deleteUser() {
                $myQuery = 'DELETE FROM '
                                .$this->table.
                            ' WHERE 
                                login_user = :login_user';

                $stmt = $this->connect->prepare($myQuery);

                $stmt->bindParam(':login_user', $this->login_user);
                return $stmt->execute();
            }

            //* VERIFY login
            public function verifyLogin() {
                $myQuery = 'SELECT
                                *
                            FROM
                                '.$this->table.'
                            WHERE
                                login_user = :login_user';

                $stmt = $this->connect->prepare($myQuery);
                $stmt->bindParam(':login_user', $this->login_user);
                $stmt->execute();
                return $stmt;
            }

            //* VERIFY email
            public function verifyEmail() {
                $myQuery = 'SELECT
                                *
                            FROM
                                '.$this->table.'
                            WHERE
                                email_user = :email_user';

                $stmt = $this->connect->prepare($myQuery);
                $stmt->bindParam(':email_user', $this->email_user);
                $stmt->execute();
                return $stmt;
            }
    }
?>