<?php

class District
{

    //constructor function
    function __construct()
    {
        //call database.php
        include_once ('database.php');

        //enable log
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }

    function getAllDistrict()
    {
        $conn = new Connection();
        $query = "SELECT dist.id,dist.district_name,dist.address,divi.division_name,divi.id as 'division_id' FROM `district` dist inner join `division` divi  WHERE dist.division_id = divi.id;";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function addDistrict()
    {
        isset($_POST['district_name']) ? $district_name = $_POST['district_name'] : $district_name = '';
        isset($_POST['address']) ? $address = $_POST['address'] : $address = '';
        isset($_POST['division_id']) ? $division_id = $_POST['division_id'] : $division_id = '';
        $conn = new Connection();
        $query = "INSERT INTO `district`(`id`, `district_name`, `address`, `division_id`) VALUES (null, ?, ?, ?)";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $district_name, $address, $division_id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function editDistrict()
    {
        $id = $_POST['id'];

        $query = "SELECT * FROM district WHERE id = ?";
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

    function deleteDistrict()
    {
        $id = $_POST['id'];
        $query = "DELETE FROM district WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function updateDistrict()
    {
        isset($_POST['id']) ? $id = $_POST['id'] : $id = '';
        isset($_POST['district_name']) ? $district_name = $_POST['district_name'] : $district_name = '';
        isset($_POST['address']) ? $address = $_POST['address'] : $address = '';
        isset($_POST['division_id']) ? $division_id = $_POST['division_id'] : $division_id = '';
        $conn = new Connection();
        $query = "UPDATE district SET district_name = ?, address = ?, division_id= ? WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $district_name, $address, $division_id, $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }
    function getDistrictsByDivisionName()
    {
        $divisionId = $_POST['division_id'] ?? 0;
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT district.* FROM district INNER JOIN division ON district.division_id = division.id WHERE division.id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $divisionId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

}

if (isset($_POST['function'])) {

    $function = $_POST['function'];

    $district = new District();
    switch ($function) {
        case 'addDistrict':
            echo $district->addDistrict();
            break;
        case 'getAllDistrict':
            $result = $district->getAllDistrict();
            $districtArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($districtArray, $row);
            }
            $dataTable = array('data' => $districtArray, 'draw' => 1, 'recordsTotal' => count($districtArray), 'recordsFiltered' => count($districtArray));
            echo json_encode($dataTable);
            break;
        case 'editDistrict':
            $result = $district->editDistrict();
            $editDistrict = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'updateDistrict':
            echo $district->updateDistrict();
            break;
        case 'deleteDistrict':
            echo $district->deleteDistrict();
            break;
        case 'getDistrictsByDivisionName':
            $result = $district->getDistrictsByDivisionName();
            $districtArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($districtArray, $row);
            }
            $dataTable = array('data' => $districtArray, 'draw' => 1, 'recordsTotal' => count($districtArray), 'recordsFiltered' => count($districtArray));
            echo json_encode($dataTable);
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