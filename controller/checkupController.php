<?php
class Checkup
{
    function __construct(){
        include_once('database.php');
        
        // error_reporting(E_ALL);
        // ini_setW('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }

    function getAllCheckup(){
        $conn = new Connection();
        $query = "select information.id, CONCAT(student.firstname,' ', student.middlename, ' ', student.lastname) as studentName, CONCAT(nurse.firstname,' ',nurse.middlename,' ',nurse.lastname) as nurseName,information.height,information.temperature, information.weight, information.created_at from student inner join information on student.id = information.student_id inner join nurse on nurse.id = information.nurse_id;";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function addCheckup(){
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        $nurse_id = isset($_POST['nurse_id']) ? $_POST['nurse_id'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $temperature =  isset($_POST['temperature']) ? $_POST['temperature'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
        // $created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';

        $conn = new Connection();
        $query = "INSERT INTO `information`(`id`, `student_id`, `nurse_id`, `height`, `temperature`, `weight`) VALUES (NULL,?,?,?,?,?)";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $student_id, $nurse_id, $height, $temperature, $weight);

        try{
            
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return json_encode(array('success'=>'true'));
        }catch(Exception $e){
            $errorMessageArray = array('success'=>'false','errorMessage'=>$stmt->error, 'errorCode'=>$stmt->errno);
            return json_encode($errorMessageArray);
        }
    }

    function deleteCheckup(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "DELETE FROM `information` WHERE `id` = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        try{
            
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return json_encode(array('success'=>'true'));
        }catch(Exception $e){
            $errorMessageArray = array('success'=>'false','errorMessage'=>$stmt->error, 'errorCode'=>$stmt->errno);
            return json_encode($errorMessageArray);
        }
    }

    function editCheckup(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "SELECT * FROM `information` WHERE `id` = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        try{
            
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            return $result;
        }catch(Exception $e){
            $errorMessageArray = array('success'=>'false','errorMessage'=>$stmt->error, 'errorCode'=>$stmt->errno);
            return json_encode($errorMessageArray);
        }
    }

    function updateCheckup(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        $nurse_id = isset($_POST['nurse_id']) ? $_POST['nurse_id'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $temperature =  isset($_POST['temperature']) ? $_POST['temperature'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
        $conn = new Connection();
        $query = "UPDATE `information` SET `student_id`=?,`nurse_id`=?,`height`=?,`temperature`=?,`weight`=? WHERE `id`=?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $student_id, $nurse_id, $height, $temperature, $weight, $id);
        try{
            
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return json_encode(array('success'=>'true'));
        }catch(Exception $e){
            $errorMessageArray = array('success'=>'false','errorMessage'=>$stmt->error, 'errorCode'=>$stmt->errno);
            return json_encode($errorMessageArray);
        }
    }
}

//listen all post request
if(isset($_POST['function'])){
    $action = $_POST['function'];
    $checkup = new Checkup();
    switch($action){
        case 'addCheckup':
            echo $checkup->addCheckup();
            break;
        case 'deleteCheckup':
            echo $checkup->deleteCheckup();
            break;
        case 'editCheckup':
            echo $checkup->editCheckup();
            break;
        case 'updateCheckup':
            echo $checkup->updateCheckup();
            break;
        case 'getAllCheckup':
            $result = $checkup->getAllCheckup();
            $checkupArray = array();
            while($row = $result->fetch_assoc()){
                array_push($checkupArray, $row);
            }
            $dataTable = array('data'=>$checkupArray,'draw'=>1,'recordsTotal'=>count($checkupArray),'recordsFiltered'=>count($checkupArray));
            echo json_encode($dataTable);
            break;
    }
}
?>