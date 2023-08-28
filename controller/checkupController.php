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
        $query = "select information.id, CONCAT(student.firstname,' ', student.middlename, ' ', student.lastname) as studentName, CONCAT(nurse.firstname,' ',nurse.middlename,' ',nurse.lastname) as nurseName,information.height,information.temperature, information.weight, information.created_at, information.findings from student inner join information on student.id = information.student_id inner join nurse on nurse.id = information.nurse_id;";
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
        session_start();
        $nurse_id ="";
        $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
        // print_r($_SESSION['userInfo']);
        if($userType=='nurse'){
            $nurse_id = $_SESSION['userInfo']['id'];
        }
        else {
            $errorMessageArray = array('success'=>'false','errorMessage'=>"Only Nurse account are allowed to add new checkup information", 'errorCode'=>'0');
            return json_encode($errorMessageArray);
        }
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        // $nurse_id = isset($_POST['nurse_id']) ? $_POST['nurse_id'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $temperature =  isset($_POST['temperature']) ? $_POST['temperature'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
        $findings = isset($_POST['findings']) ? $_POST['findings'] : '';
        // $created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';

        $conn = new Connection();
        $query = "INSERT INTO `information`(`id`, `student_id`, `nurse_id`, `height`, `temperature`, `weight`,`findings`) VALUES (NULL,?,?,?,?,?,?)";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $student_id, $nurse_id, $height, $temperature, $weight, $findings);

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
        $query = "SELECT inf.*,stud.school_id,sch.division_id,sch.district_id FROM `information` as inf inner join student as stud on stud.id = inf.student_id inner join school as sch on sch.id = stud.school_id where inf.id  = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        try{
            
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            // print_r(json_encode($result->fetch_assoc()));
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
        $findings = isset($_POST['findings']) ? $_POST['findings'] : '';
        $conn = new Connection();
        $query = "UPDATE `information` SET `student_id`=?,`height`=?,`temperature`=?,`weight`=?,`findings` = ? WHERE `id`=?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $student_id, $height, $temperature, $weight,$findings, $id);
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
            $result = $checkup->editCheckup();
            $editDistrict = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
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