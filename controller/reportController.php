<?php
    class ReportController{
        function __construct(){
            //call database.php
            include_once('database.php');
            
            //enable log
            // error_reporting(E_ALL);
            // ini_set('display_errors', 1);
            // ini_set('error_log', 'error.log');
            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);
        }

        function getAllReport(){
            $conn = new Connection();
            $query = "SELECT * FROM `report`";
            $connection = new Connection();
            $conn = $connection->connect();
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            return $result;
        }

        function addReport(){
            
        }

        function printPdf(){
            require_once ('../view/include/fpdf/templates/ex.php');
            $ex = new Ex();
            $ex->test();
        }
        
    }


    //listen to get
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $reportController = new ReportController();
        switch($action){
            case 'getAllReport':
                $result = $reportController->getAllReport();
                $reportArray = array();
                while($row = $result->fetch_assoc()){
                    array_push($reportArray, $row);
                }
                echo json_encode($reportArray);
                break;
            case 'printPdf':
                // echo "test";
                // return;
                $reportController->printPdf();
                break;
        }
    }

?>