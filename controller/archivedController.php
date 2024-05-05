<?php

class Archived
{
    public function __construct()
    {
        include_once ('database.php');
    }

    public function viewArchived()
    {
        $conn = new Connection();
        $query = "SELECT * FROM
        (
            SELECT s.id AS id, CONCAT(s.firstname, ' ', s.middlename, ' ', s.lastname) AS 'name', 'student' AS 'Origin' 
            FROM student AS s  
            WHERE s.archived = 1
        ) AS student 
        UNION 
        SELECT * FROM 
        (
            SELECT n.id AS id, CONCAT(n.firstname, ' ', n.middlename, ' ', n.lastname) AS 'name', 'nurse' AS 'Origin' 
            FROM nurse AS n 
            WHERE n.archived = 1
        ) AS nurse;
        ";
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

    $student = new Archived();
    switch ($function) {

        case 'getAllArchived':
            $result = $student->viewArchived();
            $studentArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($studentArray, $row);
            }
            $dataTable = array('data' => $studentArray, 'draw' => 1, 'recordsTotal' => count($studentArray), 'recordsFiltered' => count($studentArray));
            echo json_encode($dataTable);
            break;

    }
}