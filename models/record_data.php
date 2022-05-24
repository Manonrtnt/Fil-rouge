<?php
    class Record_data{
        private $table = 'record_data';
        private $tableSensor = 'sensor';
        private $connect;

        private $id_record;
        private $date_record;
        private $time_record;
        private $data_record;
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
        public function getId_record(){
            return $this->id_record;
        }
    
        public function getDate_record(){
            return $this->date_record;
        }
    
        public function setDate_record($date_record){
            $this->date_record = $date_record;
        }
    
        public function getData_record(){
            return $this->data_record;
        }
    
        public function setData_record($data_record){
            $this->data_record = $data_record;
        }

        //! METHODS
        //* Display all data from table record_data
        public function collectAllData(){
            $myQuery = 'SELECT * FROM '.$this->table.'';

            $stmt = $this->connect->prepare($myQuery);
            $stmt->execute();
            return $stmt;
        }
        
        //* Display data from table record_data where function sensor = temperature and data between < d-day + d-4 >
        public function dataTemperatureCollect(){
            $myQuery = 'SELECT 
                                date_record,
                                time_record, 
                                data_record, 
                                name_sensor, 
                                function_sensor 
                        FROM 
                            '.$this->table.'
                        JOIN 
                            '.$this->tableSensor.'
                        WHERE  
                            '.$this->tableSensor.'.id_sensor = '.$this->table.'.id_sensor
                        AND 
                            function_sensor = "Temperature sensor" 
                        AND 
                            date_record BETWEEN  
                                "'.date("Y-m-d", strtotime("-4 days")).'"
                            AND
                                "'.date("Y-m-d").'" 
                        ORDER BY date_record DESC, time_record DESC';

            $stmt = $this->connect->prepare($myQuery);
            // var_dump($myQuery);
            $stmt->execute();
            return $stmt;
        }

        //* Display data from table record_data where function sensor = humidity and data between < d-day + d-4 >
        public function dataHumidityCollect(){
            $myQuery = 'SELECT 
                                date_record,
                                time_record, 
                                data_record, 
                                name_sensor, 
                                function_sensor 
                        FROM 
                            '.$this->table.'
                        JOIN 
                            '.$this->tableSensor.'
                        WHERE  
                            '.$this->tableSensor.'.id_sensor = '.$this->table.'.id_sensor
                        AND 
                            function_sensor = "Humidity sensor" 
                        AND 
                            date_record BETWEEN  
                                "'.date("Y-m-d", strtotime("-4 days")).'"
                            AND
                                "'.date("Y-m-d").'" 
                        ORDER BY date_record DESC, time_record DESC';;

            $stmt = $this->connect->prepare($myQuery);
            // var_dump($myQuery);
            $stmt->execute();
            return $stmt;
        }

    }
?>