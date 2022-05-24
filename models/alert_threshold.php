<?php
    class Alert{
        private $table = 'alert_threshold';
        private $connect;

        private $id_threshold;
        private $date_threshold;
        private $minumum_threshold;
        private $maximum_threshold;

        private $id_user;

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
    
        public function getId_threshold(){
            return $this->id_threshold;
        }
    
        public function getDate_threshold(){
            return $this->date_threshold;
        }
    
        public function setDate_threshold($date_threshold){
            $this->date_threshold = $date_threshold;
        }
    
        public function getMinumum_threshold(){
            return $this->minumum_threshold;
        }
    
        public function setMinumum_threshold($minumum_threshold){
            $this->minumum_threshold = $minumum_threshold;
        }
    
        public function getMaximum_threshold(){
            return $this->maximum_threshold;
        }
    
        public function setMaximum_threshold($maximum_threshold){
            $this->maximum_threshold = $maximum_threshold;
        }
    
        public function getId_user(){
            return $this->id_user;
        }

    }
?>