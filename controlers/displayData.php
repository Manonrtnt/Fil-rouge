<?php
//* SELECT DATA TEMPERATURE AND HUMIDITY FROM TABLE
    // //! ACCESS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    
    //! INCLUDE 
    include('../models/record_data.php');
    include('../models/sensor.php');
    include('../utils/db_config.php');

    $dataJson = [];
    
    $dataTemperature = new Record_data();
    $data_temperature = $dataTemperature->dataTemperatureCollect();

    $dataHumidity = new Record_data();
    $data_humidity = $dataHumidity->dataHumidityCollect();

    function arrayData($data){
        $arrayAllData = [];
        $i = 0;
        while ($rowData = $data->fetch()){
            $i +=1;
            $arrayData = array(
                        'n°' => $i,
                        'data' => $rowData['data_record'],
                        'date' => $rowData['date_record'],
                        'time' => $rowData['time_record']      
            );
            array_push($arrayAllData, $arrayData);
        }
        return $arrayAllData;
    }

    $arrayTemperature = arrayData($data_temperature);
    $arrayHumidity = arrayData($data_humidity);

    $dataJson = array(
        'temperatureSensor' => $arrayTemperature,
        'humiditySensor' => $arrayHumidity
    );
    echo json_encode($dataJson);
?>

//! TESTS
<?php
    //* SELECT ALL DATA FROM TABLE
    // //! ACCESS
    // header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Methods: POST");
    
    // //! INCLUDE 
    // include('../models/record_data.php');
    // include('../models/sensor.php');
    // include('../utils/db_config.php');

    // $dataJson = [];

    // $data_record = new Record_data;
    // $data = $data_record->displayTemp2();

    // while ($rowData = $data->fetch()){
    //     $dataTemp = array(
    //         // 'id' => intval($rowData['id_record'], 10),
    //         'Data' => $rowData['data_record'],
    //         'Date' => $rowData['date_record']
    //     );
    //     $countData = array(
    //         ''.$rowData['id_record'].'' => $dataTemp
    //     );
    //     array_push($dataJson, $countData);
    // }
    // echo json_encode($dataJson);
?>
<?php
    //* SELECT ALL DATA FROM TABLE
    // //! ACCESS
    // header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Methods: POST");
    
    // //! INCLUDE 
    // include('../models/record_data.php');
    // include('../models/sensor.php');
    // include('../utils/db_config.php');

    // $dataJson = [];

    // $data_record = new Record_data;

    // $data = $data_record->displayTemp2();

    // while ($rowData = $data->fetch()){
    //     $dataTemp = array(
    //         // 'id' => intval($rowData['id_record'], 10),
    //         'Data' => $rowData['data_record'],
    //         'Date' => $rowData['date_record']
    //     );
    //     $countData = array(
    //         ''.$rowData['id_record'].'' => $dataTemp
    //     );
    //     array_push($dataJson, $countData);
    // }
    // echo json_encode($dataJson);
?>
<?php
    //* SELECT DATA TEMP FROM TABLE
    // //! ACCESS
    // header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Methods: POST");
    
    // //! INCLUDE 
    // include('../models/record_data.php');
    // include('../models/sensor.php');
    // include('../utils/db_config.php');

    // $dataJson = [];

    // $data_record = new Record_data();
    // $name_sensor = "DHT11";

    // $data = $data_record->dataTempCollect();

    // while ($rowData = $data->fetch()){
    //     $dataTemp = array(
    //         // 'id' => intval($rowData['id_record'], 10),
    //         'Data' => $rowData['data_record'],
    //         'Date' => $rowData['date_record'],
    //         'Sensor' => $rowData['name_sensor'],
    //         'Function' => $rowData['function_sensor']
    //     );
    //     $countData = array(
    //         'Information' => $dataTemp
    //     );
    //     array_push($dataJson, $countData);
    // }
    // echo json_encode($dataJson);
?>
<?php
    // //! ACCESS
    // header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Methods: POST");
    
    // //! INCLUDE 
    // include('../models/record_data.php');
    // include('../models/sensor.php');
    // include('../utils/db_config.php');

    // $success = 0;
    // $msg = "An error occurred in the php";
    // $dataJson = [];

    // $data_record = new Record_data;

    // $data = $data_record->displayTemp2();

    // while ($rowData = $data->fetch()){
    //     extract($rowData);

    //     foreach ($row as $rowData){
    //         $dataJson['id_data'] = intval($rowData['id_record'], 10);
    //         $dataJson['data_record'] = $rowData['data_record'];
    //         $dataJson['date_record'] = $rowData['date_record'];
    //     }
    // }

    // echo json_encode($dataJson);
?>
<?php
    // //! ACCESS
    // header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Methods: POST");
    
    // //! INCLUDE 
    // include('../models/record_data.php');
    // include('../models/sensor.php');
    // include('../utils/db_config.php');

    // $success = 0;
    // $msg = "An error occurred in the php";
    // $dataJson;

    // $data_record = new Record_data;

    // $data = $data_record->displayTemp2();

    // while ($rowData = $data->fetch()){
    //     // extract($rowData);

    //     $i=1;
    //     $dataTemp = array(
    //         'id' => intval($rowData['id_record'], 10),
    //         'Data' => $rowData['data_record'],
    //         'Date' => $rowData['date_record']
    //     );

    //     $dataJson = array(
    //         ''.$i.'' => $dataTemp
    //     ); 
    //     $i .= 1;
    // }

    // echo json_encode($dataJson);
?>