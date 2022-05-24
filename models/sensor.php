<?php
    class Sensor{
        private $table = 'sensor';
        private $connect;

        private $id_sensor;
        private $name_sensor;
        private $function_sensor;

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
    
        public function getConnect(){
            return $this->connect;
        }
    
        public function getId_sensor(){
            return $this->id_sensor;
        }
    
        public function getName_sensor(){
            return $this->name_sensor;
        }
    
        public function setName_sensor($name_sensor){
            $this->name_sensor = $name_sensor;
        }
    
        public function getFunction_sensor(){
            return $this->function_sensor;
        }
    
        public function setFunction_sensor($function_sensor){
            $this->function_sensor = $function_sensor;
        }
    }
?>