<?php
class School
{
    function __construct()
    {
        //call database.php
        include_once ('database.php');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //enable log
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }
    function addSchool()
    {
        $school_name = $_POST['school_name'] ?? '';
        $address = $_POST['address'] ?? '';
        $division_id = $_POST['division_id'] ?? '';
        $district_id = $_POST['district_id'] ?? '';
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "INSERT INTO `school`(`id`, `school_name`, `address`, `division_id`, `district_id`) VALUES (null, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $school_name, $address, $division_id, $district_id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function getAllSchool()
    {
        // print_r($_SESSION['userInfo']);
        $nurse_type = $_SESSION['userInfo']['nurse_type'] ?? "";
        $assigned = $_SESSION['userInfo']['assigned'] ?? "";
        $where = "";
        if ($nurse_type == 'Division Nurse') {
            $where = "AND sch.division_id = " . $assigned;
        } else if ($nurse_type == 'District Nurse') {
            $where = "AND sch.district_id = " . $assigned;
        } else if ($nurse_type == 'School Nurse') {
            $where = "AND sch.id = " . $assigned;
        }

        $conn = new Connection();
        $query = "SELECT sch.id,sch.school_name,sch.address,divi.division_name,dist.district_name,dist.id as 'district_id', divi.id as 'division_id' FROM `school` sch inner join `division` divi inner join `district` dist WHERE sch.division_id = divi.id AND sch.district_id = dist.id " . $where . ";";

        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }



    function editSchool()
    {
        $id = $_POST['id'];
        $query = "SELECT * FROM school WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function updateSchool()
    {
        $id = $_POST['id'];
        $school_name = $_POST['school_name'] ?? '';
        $address = $_POST['address'] ?? '';
        $division_id = $_POST['division_id'] ?? '';
        $district_id = $_POST['district_id'] ?? '';
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "UPDATE `school` SET `school_name`=?,`address`=?,`division_id`=?,`district_id`=? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssiii", $school_name, $address, $division_id, $district_id, $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function deleteSchool()
    {
        $id = $_POST['id'];
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "DELETE FROM `school` WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function getSchoolbyDistrictId()
    {
        $district_id = isset($_POST['district_id']) ? $_POST['district_id'] : '';
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT * FROM `school` WHERE district_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $district_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;

    }

}

if (isset($_POST['function'])) {
    $function = $_POST['function'];
    $school = new School();
    switch ($function) {
        case 'getSchoolbyDistrictId':
            $result = $school->getSchoolbyDistrictId();
            $schoolArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($schoolArray, $row);
            }
            $dataTable = array('data' => $schoolArray, 'draw' => 1, 'recordsTotal' => count($schoolArray), 'recordsFiltered' => count($schoolArray));
            echo json_encode($dataTable);
            break;
        case 'addSchool':
            echo $school->addSchool();
            break;
        case 'getAllSchool':
            $result = $school->getAllSchool();
            $schoolArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($schoolArray, $row);
            }
            $dataTable = array('data' => $schoolArray, 'draw' => 1, 'recordsTotal' => count($schoolArray), 'recordsFiltered' => count($schoolArray));
            echo json_encode($dataTable);
            break;
        case 'editSchool':
            $result = $school->editSchool();
            // $result = $district->editDistrict();
            // $editDistrict = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'updateSchool':
            echo $school->updateSchool();
            break;
        case 'deleteSchool':
            echo $school->deleteSchool();
            break;
    }
}
?>