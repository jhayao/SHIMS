<?php

class Student
{

    //constructor function
    function __construct()
    {
        //call database.php
        include_once ('database.php');
        require_once ('logController.php');
        //enable log
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }

    function getAllStudent()
    {
        $conn = new Connection();
        $query = "SELECT * FROM student where archived = 0";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function getStudentbySchoolId()
    {
        $school_id = isset($_POST['school_id']) ? $_POST['school_id'] : '';
        $conn = new Connection();
        $query = "SELECT * FROM student WHERE school_id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $school_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function getStudentById($id = null)
    {
        if ($id == null)
            $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "select s.school_name,d.district_name,dv.division_name,st.* from school s , district d, division dv, student st where s.id = st.school_id and d.id = s.district_id and dv.id = s.division_id and st.id = ?";
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

    function archivedStudent($id = null)
    {
        if ($id == null)
            $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "UPDATE student SET archived = '1' WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        $studentDetails = $this->getStudentsById($id);
        $student = $studentDetails->fetch_assoc();
        $log = new Log();
        $log->createLog($_SESSION['userID'], 'Archived Student ' . $student['firstname'] . ' ' . $student['lastname']);
        return $result ? 'success' : $conn->error;
    }

    function unarchivedStudent($id = null)
    {
        if ($id == null)
            $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "UPDATE student SET archived = '0' WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        $studentDetails = $this->getStudentsById($id);
        $student = $studentDetails->fetch_assoc();
        $log = new Log();
        $log->createLog($_SESSION['userID'], 'Unarchived Student ' . $student['firstname'] . ' ' . $student['lastname']);
        return $result ? 'success' : $conn->error;
    }

    function addStudent()
    {
        //get post parameteres
        // print_r($_POST);
        isset($_POST['id']) ? $id = $_POST['id'] : $id = '';
        isset($_POST['firstname']) ? $firstname = $_POST['firstname'] : $firstname = '';
        isset($_POST['middlename']) ? $middlename = $_POST['middlename'] : $middlename = '';
        isset($_POST['lastname']) ? $lastname = $_POST['lastname'] : $lastname = '';
        isset($_POST['sex']) ? $sex = $_POST['sex'] : $sex = '';
        isset($_POST['dob']) ? $dob = $_POST['dob'] : $dob = '';
        isset($_POST['contact']) ? $contact = $_POST['contact'] : $contact = '';
        isset($_POST['guardian']) ? $guardian = $_POST['guardian'] : $guardian = '';
        isset($_POST['street']) ? $street = $_POST['street'] : $street = '';
        isset($_POST['barangay']) ? $barangay = $_POST['barangay'] : $barangay = '';
        isset($_POST['city']) ? $city = $_POST['city'] : $city = '';
        isset($_POST['province']) ? $province = $_POST['province'] : $province = '';
        isset($_POST['postal']) ? $postal = $_POST['postal'] : $postal = '';
        isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
        isset($_POST['type']) ? $school_id = $_POST['type'] : $school_id = '';


        //insert querry and prepare statement
        $query = "INSERT INTO `student`(`firstname`, `middlename`, `lastname`, `sex`, `dob`, `contact`, `email`,`guardian`, `street`, `barangay`, `city`, `province`, `postal`,`school_id`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = new Connection();
        $connection = $conn->connect();
        $stmt = $connection->prepare($query);
        // echo $dob;
        $stmt->bind_param("ssssssssssssss", $firstname, $middlename, $lastname, $sex, $dob, $contact, $email, $guardian, $street, $barangay, $city, $province, $postal, $school_id);
        try {
            $stmt->execute();
            include_once ('loginController.php');
            $id = $connection->insert_id;
            $loginController = new Login();
            $log = new Log();
            $log->createLog($_SESSION['userID'], 'Added Student ' . $firstname . ' ' . $lastname);
            if ($email != null || $email != '') {
                if ($loginController->createUserWhenCreated($lastname, $email, $contact, 'student', $id)) {
                    $stmt->close();
                    return json_encode(array('success' => 'true'));
                } else {
                    $stmt->close();
                    return json_encode(array('success' => 'false'));
                }
            } else {
                $stmt->close();
                return json_encode(array('success' => 'true'));
            }
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }
        // $query = "INSERT INTO nurse (firstname, lastname, email, sex, contact, middlename, street, barangay, city, province, postal,nurse_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        // $conn = new Connection();
    }

    function editStudent()
    {
        $id = $_POST['id'];

        $query = "SELECT * FROM student WHERE id = ?";
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


    function updateStudent()
    {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $guardian = $_POST['guardian'];
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postal = $_POST['postal'];
        $school_id = $_POST['type'];

        $query = "UPDATE student SET firstname=?, middlename=?, lastname=?, sex=?, dob=?, contact=?, email=?, guardian=?, street=?, barangay=?, city=?, province=?, postal=? WHERE id=?";
        $conn = new Connection();
        $connection = $conn->connect();
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssssssssssssi", $firstname, $middlename, $lastname, $sex, $dob, $contact, $email, $guardian, $street, $barangay, $city, $province, $postal, $id);
        try {
            $stmt->execute();
            $stmt->close();
            $log = new Log();
            $log->createLog($_SESSION['userID'], 'Updated Student ' . $firstname . ' ' . $lastname);
            return json_encode(array('success' => 'true'));
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }
    }


    function deleteStudent()
    {
        $id = $_POST['id'];
        $studentDetails = $this->getStudentsById($id);
        $student = $studentDetails->fetch_assoc();
        $query = "DELETE FROM student WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();

        $log = new Log();
        $log->createLog($_SESSION['userID'], 'Deleted Student ' . $student['firstname'] . ' ' . $student['lastname']);
        return $result ? 'success' : $conn->error;
    }

    private function getStudentsById($id)
    {
        $conn = new Connection();
        $query = "SELECT * FROM student WHERE id = ?";
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
    function getAllArchived()
    {
        $conn = new Connection();
        $query = "SELECT * FROM student where archived = 1";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

}

if (isset($_POST['function'])) {

    $function = $_POST['function'];

    $student = new Student();
    switch ($function) {
        case 'getStudentById':
            $result = $student->getStudentById();
            $editStudent = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'getStudentbySchoolId':
            $result = $student->getStudentbySchoolId();
            $studentArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($studentArray, $row);
            }
            $dataTable = array('data' => $studentArray, 'draw' => 1, 'recordsTotal' => count($studentArray), 'recordsFiltered' => count($studentArray));
            echo json_encode($dataTable);
            break;
        case 'addStudent':
            echo $student->addStudent();
            break;
        case 'getAllStudent':
            $result = $student->getAllStudent();
            $studentArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($studentArray, $row);
            }
            $dataTable = array('data' => $studentArray, 'draw' => 1, 'recordsTotal' => count($studentArray), 'recordsFiltered' => count($studentArray));
            echo json_encode($dataTable);
            break;
        case 'editStudent':
            $result = $student->editStudent();
            $editStudent = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'updateStudent':
            echo $student->updateStudent();
            break;
        case 'deleteStudent':
            echo $student->deleteStudent();
            break;
        case 'archivedStudent':
            echo $student->archivedStudent();
            break;
        case 'unarchivedStudent':
            echo $student->unarchivedStudent();
            break;
        case 'getAllArchived':
            $result = $student->getAllArchived();
            $studentArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($studentArray, $row);
            }
            $dataTable = array('data' => $studentArray, 'draw' => 1, 'recordsTotal' => count($studentArray), 'recordsFiltered' => count($studentArray));
            echo json_encode($dataTable);
            break;
    }
}

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    $nurse = new Student();
    switch ($function) {
        case 'unarchivedNurse':
            echo $nurse->unarchivedStudent($_GET['id']);
            break;

    }
}
?>