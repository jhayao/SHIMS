<?php

class Division
{

    //constructor function
    function __construct()
    {
        //call database.php
        include_once('database.php');
        require_once('logController.php');
        // enable log
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('error_log', 'error.log');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    function getAllDivision()
    {
        $conn = new Connection();
        $query = "SELECT * FROM division WHERE archived = 0";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }


    function addDivision()
    {
        isset($_POST['division_name']) ? $division_name = $_POST['division_name'] : $division_name = '';
        isset($_POST['address']) ? $address = $_POST['address'] : $address = '';
        $conn = new Connection();
        $query = "INSERT INTO division (division_name, address) VALUES (?, ?)";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $division_name, $address);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        $log = new Log();
        $log->createLog($_SESSION['userID'], 'Added new division: ' . $division_name);
        return $result ? 'success' : $conn->error;
    }



    function editDivision()
    {
        $id = $_POST['id'];

        $query = "SELECT * FROM division WHERE id = ?";
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

    private function getDivisionDetails($id)
    {
        $query = "SELECT * FROM division WHERE id = ?";
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

    function deleteDivision()
    {
        $id = $_POST['id'];
        $divisionDetails = $this->getDivisionDetails($id);
        $divisionDetails = $divisionDetails->fetch_assoc();
        $query = "DELETE FROM division WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        $log = new Log();
        $log->createLog($_SESSION['userID'], 'Deleted division: ' . $divisionDetails['division_name']);
        return $result ? 'success' : $conn->error;
    }

    function updateDivision()
    {
        isset($_POST['id']) ? $id = $_POST['id'] : $id = '';
        isset($_POST['division_name']) ? $division_name = $_POST['division_name'] : $division_name = '';
        isset($_POST['address']) ? $address = $_POST['address'] : $address = '';
        $conn = new Connection();
        $query = "UPDATE division SET division_name = ?, address = ? WHERE id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $division_name, $address, $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        $log = new Log();
        $log->createLog($_SESSION['userID'], 'Updated division: ' . $division_name);
        return $result ? 'success' : $conn->error;
    }

    function archivedDivision($id = null)
    {
        if ($id == null) {
            $id = $_POST['id'];
        }
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "UPDATE `division` SET `archived` = '1' WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function unarchivedDivision($id = null)
    {
        if ($id == null) {
            $id = $_POST['id'];
        }
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "UPDATE `division` SET `archived` = '0' WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    function getAllDivisionArchived()
    {
        $conn = new Connection();
        $query = "SELECT * FROM division WHERE archived = 1";
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

    $division = new Division();
    switch ($function) {
        case 'archivedDivision':
            echo $division->archivedDivision();
            break;
        case 'unarchivedDivision':
            echo $division->unarchivedDivision();
            break;
        case 'getAllDivisionArchived':
            $result = $division->getAllDivisionArchived();
            $divisionArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($divisionArray, $row);
            }
            $dataTable = array('data' => $divisionArray, 'draw' => 1, 'recordsTotal' => count($divisionArray), 'recordsFiltered' => count($divisionArray));
            echo json_encode($dataTable);
            break;
        case 'addDivision':
            echo $division->addDivision();
            break;
        case 'getAllDivision':
            $result = $division->getAllDivision();
            $divisionArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($divisionArray, $row);
            }
            $dataTable = array('data' => $divisionArray, 'draw' => 1, 'recordsTotal' => count($divisionArray), 'recordsFiltered' => count($divisionArray));
            echo json_encode($dataTable);
            break;
        case 'editDivision':
            $result = $division->editDivision();
            $editDivision = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'updateDivision':
            echo $division->updateDivision();
            break;
        case 'deleteDivision':
            echo $division->deleteDivision();
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
