<?php
    class DbConfig {
        //* I create the private attributes necessary for the connection
        private $host = "127.0.0.1";
        private $database_name = "fil_rouge";
        private $username = "root";
        private $password = "root";

        // l'attribut suivant sera lui en public
        // pour permettre aux autres classes d'accéder à la connexion 
        // de la fonction de connection à la base de données
        //* I create the connect attribute in public to allow classes to access the connection made by the getConnection method
        public $connect;

        // je crée la fonction pour appeler le système de connexion à ma BDD
        // celle-ci va permettre d'injecter mes attributs en private dans 
        // l'attribut qui est en public. 
        //* Public method for connexion to bdd
        public function getConnection() {
            $this->connect = null;
            try {
                $this->connect = new PDO("mysql:host=".$this->host."; dbname=".$this->database_name, $this->username, $this->password);
                $this->connect->exec("set names utf8");
            } catch(PDOException $exception) {
                echo "Database could not be connected:".$exception->getMessage();
            }
            return $this->connect;
        }
    }
?>