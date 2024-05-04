<?php

class Nurse
{

    //constructor function
    function __construct()
    {
        //call database.php
        include_once ('database.php');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //enable log
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('error_log', 'error.log');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    function getAllNurse()
    {

        try {
            $nurseArray = array();
            $query = "SELECT *
            FROM (
                SELECT n.*, s.school_name 
                FROM nurse AS n
                INNER JOIN school AS s ON s.id = n.assigned
                    WHERE n.nurse_type = 'School Nurse'
                ) AS s
                UNION
                SELECT *
                FROM (
                    SELECT n.*, d.district_name
                    FROM nurse AS n
                    INNER JOIN district AS d ON d.id = n.assigned
                    WHERE n.nurse_type = 'District Nurse'
                ) AS d
                UNION
                SELECT *
                FROM (
                    SELECT n.*, di.division_name
                    FROM nurse AS n
                    INNER JOIN division AS di ON di.id = n.assigned
                    WHERE n.nurse_type = 'Division Nurse'
                ) AS di;";
            $connection = new Connection();
            $conn = $connection->connect();
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    function addNurse()
    {
        //get post parameteres

        isset($_POST['nurse_firstname']) ? $nurse_firstname = $_POST['nurse_firstname'] : $nurse_firstname = '';
        isset($_POST['nurse_lastname']) ? $nurse_lastname = $_POST['nurse_lastname'] : $nurse_lastname = '';
        isset($_POST['nurse_email']) ? $nurse_email = $_POST['nurse_email'] : $nurse_email = '';
        isset($_POST['nurse_sex']) ? $nurse_sex = $_POST['nurse_sex'] : $nurse_sex = '';
        isset($_POST['nurse_contact']) ? $nurse_contact = $_POST['nurse_contact'] : $nurse_contact = '';
        isset($_POST['nurse_middlename']) ? $nurse_middlename = $_POST['nurse_middlename'] : $nurse_middlename = '';
        isset($_POST['nurse_street']) ? $nurse_street = $_POST['nurse_street'] : $nurse_street = '';
        isset($_POST['nurse_barangay']) ? $nurse_barangay = $_POST['nurse_barangay'] : $nurse_barangay = '';
        isset($_POST['nurse_city']) ? $nurse_city = $_POST['nurse_city'] : $nurse_city = '';
        isset($_POST['nurse_province']) ? $nurse_province = $_POST['nurse_province'] : $nurse_province = '';
        isset($_POST['nurse_postal']) ? $nurse_postal = $_POST['nurse_postal'] : $nurse_postal = '';
        isset($_POST['nurse_type']) ? $nurse_type = $_POST['nurse_type'] : $nurse_type = '';
        isset($_POST['assigned']) ? $assigned = $_POST['assigned'] : $assigned = '';

        //insert querry and prepare statement

        $query = "INSERT INTO nurse (firstname, lastname, email, sex, contact, middlename, street, barangay, city, province, postal,nurse_type,assigned) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        // $conn = new Connection();
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssssss", $nurse_firstname, $nurse_lastname, $nurse_email, $nurse_sex, $nurse_contact, $nurse_middlename, $nurse_street, $nurse_barangay, $nurse_city, $nurse_province, $nurse_postal, $nurse_type, $assigned);
        // $stmt->execute();

        try {
            $stmt->execute();
            include_once ('loginController.php');
            $id = $conn->insert_id;
            $loginController = new Login();
            if ($loginController->createUserwhenCreated($nurse_lastname, $nurse_email, $nurse_contact, 'nurse', $id)) {
                $stmt->close();
                return 'success';
            } else {
                $stmt->close();
                return $conn->error;
            }
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }

        // $result = $stmt->execute();
        // $stmt->close();
        // $conn->close();
        // return $result ? 'success' : $conn->error;
    }

    function editNurse($id = null)
    {
        if ($id == null)
            $id = $_POST['id'];

        $query = "SELECT * FROM nurse WHERE id = ?";
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



    function updateNurse()
    {
        isset($_POST['id']) ? $nurse_id = $_POST['id'] : '';
        isset($_POST['nurse_firstname']) ? $nurse_firstname = $_POST['nurse_firstname'] : $nurse_firstname = '';
        isset($_POST['nurse_lastname']) ? $nurse_lastname = $_POST['nurse_lastname'] : $nurse_lastname = '';
        isset($_POST['nurse_email']) ? $nurse_email = $_POST['nurse_email'] : $nurse_email = '';
        isset($_POST['nurse_sex']) ? $nurse_sex = $_POST['nurse_sex'] : $nurse_sex = '';
        isset($_POST['nurse_contact']) ? $nurse_contact = $_POST['nurse_contact'] : $nurse_contact = '';
        isset($_POST['nurse_middlename']) ? $nurse_middlename = $_POST['nurse_middlename'] : $nurse_middlename = '';
        isset($_POST['nurse_street']) ? $nurse_street = $_POST['nurse_street'] : $nurse_street = '';
        isset($_POST['nurse_barangay']) ? $nurse_barangay = $_POST['nurse_barangay'] : $nurse_barangay = '';
        isset($_POST['nurse_city']) ? $nurse_city = $_POST['nurse_city'] : $nurse_city = '';
        isset($_POST['nurse_province']) ? $nurse_province = $_POST['nurse_province'] : $nurse_province = '';
        isset($_POST['nurse_postal']) ? $nurse_postal = $_POST['nurse_postal'] : $nurse_postal = '';
        isset($_POST['nurse_type']) ? $nurse_type = $_POST['nurse_type'] : $nurse_type = '';
        isset($_POST['assigned']) ? $assigned = $_POST['assigned'] : $assigned = '';

        //update Query
        $query = "UPDATE nurse SET firstname=?, lastname=?, email=?, sex=?, contact=?, middlename=?, street=?, barangay=?, city=?, province=?, postal=?, nurse_type=?, assigned=? WHERE id=?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssssssi", $nurse_firstname, $nurse_lastname, $nurse_email, $nurse_sex, $nurse_contact, $nurse_middlename, $nurse_street, $nurse_barangay, $nurse_city, $nurse_province, $nurse_postal, $nurse_type, $assigned, $nurse_id);
        $result = $stmt->execute();
        // $stmt->close();

        return $result ? 'success' : $conn->error;

    }

    function deleteNurse()
    {
        $id = $_POST['id'];
        $query = "DELETE FROM nurse WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

}

if (isset($_POST['function'])) {

    $function = $_POST['function'];

    $nurse = new Nurse();
    switch ($function) {
        case 'test':
            $result = $nurse->getAllNurse();
            $nurseArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($nurseArray, $row);
            }
            echo json_encode($nurseArray);
            break;
        case 'addNurse':
            echo $nurse->addNurse();
            break;
        case 'getAllNurse':
            $result = $nurse->getAllNurse();
            $nurseArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($nurseArray, $row);
            }
            $dataTable = array('data' => $nurseArray, 'draw' => 1, 'recordsTotal' => count($nurseArray), 'recordsFiltered' => count($nurseArray));
            echo json_encode($dataTable);
            break;
        case 'editNurse':
            $result = $nurse->editNurse();
            $editNurse = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'updateNurse':
            echo $nurse->updateNurse();
            break;
        case 'deleteNurse':
            echo $nurse->deleteNurse();
            break;
    }
}

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    $nurse = new Nurse();
    switch ($function) {
        case 'editNurse':
            $result = $nurse->editNurse();
            $editNurse = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;

    }
}
?>