<?php
class Dashboard
{
    private $db;
    public function __construct()
    {
        include_once('database.php');

    }


    public function generateRandomColor(int $count)
    {
        $colors = [];

        for ($i = 0; $i < $count; $i++) {
            $colors[$i] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
        $colors[0] = "#5D87FF";
        $colors[1] = "#49BEFF";
        return $colors;
    }

    public function getMonthlyCheckups() : array
    {
        $month = date('m');
        $year = date('Y');
        $days = date('t', mktime(0, 0, 0, $month, 1, $year));

        for ($i = 1; $i <= $days; $i++) {
            $day = $year . '-' . $month . '-' . $i;
            $data = $this->getDataByDay($day);
            while ($row = $data->fetch_assoc()) {
                $result[$day][$row['school_name']] = $row['count'];
            }
        }
        return $result;
    }

    public function getDaysinMonth()
    {
        $month = date('m');
        $year = date('Y');
        $days = date('t', mktime(0, 0, 0, $month, 1, $year));
        $d = "[";
        for ($i = 1; $i <= $days; $i++) {
            $i != $days ? $d .= '"' . $year . '-' . $month . '-' . $i . '"' . "," : $d .= '"' . $year . '-' . $month . '-' . $i . '"' . "]";
        }
        return $d;
    }

    public function getAllSchools(){
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT school_name FROM school;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        $schools = [];
        while ($row = $result->fetch_assoc()) {
            $schools[] = $row['school_name'];
        }
        return $schools;
    }
    public function getDataByDay($day)
    {
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT school.school_name, COUNT(information.id) AS count  FROM school  LEFT JOIN information ON school.id = information.school_id AND DATE(information.created_at) = ? GROUP BY school.id;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $day);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public function getCheckupCountsBySchool()
    {
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT school.school_name, COUNT(information.id) as count FROM school LEFT JOIN student ON school.id = student.school_id LEFT JOIN information ON student.id = information.student_id GROUP BY school.school_name;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }
    public function getNumberofSchool()
    {
        $query = $this->db->query('select id from school;');
        $result = $query->fetch_assoc();
        return $result->num_rows;
    }

    public function getNumberofDailyCheckups()
    {
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT id FROM information where DATE(information.created_at) = DATE(CURDATE());";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result->num_rows;
    }

    public function getNumberofTotalCheckups()
    {
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT id FROM information;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result->num_rows;
    }

    public function getNumberofSicked()
    {
        $connection = new Connection();
        $conn = $connection->connect();
        $sicked = [];
        for ($x = 4; $x >= 0; $x--) {
            $query = "SELECT count(student.id) FROM student, information WHERE student.id = information.student_id AND MONTH(information.created_at) = MONTH(DATE_SUB(CURDATE(), INTERVAL $x MONTH)) GROUP BY student.id;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $sicked[$x] = $result->num_rows;
        }
        // echo json_encode($healthy);
        $stmt->close();
        $conn->close();
        return $sicked;
    }

    public function studentHealth()
    {
        $healthy = $this->getNumberofHealthy();
        $sicked = $this->getNumberofSicked();
        $studentHealth = array('healthy' => $healthy, 'sicked' => $sicked);
        return json_encode($studentHealth);

    }
    public function getNumberofHealthy()
    {


        $connection = new Connection();
        $conn = $connection->connect();
        $healthy = [];
        for ($x = 4; $x >= 0; $x--) {
            $query = "SELECT count(student.id) from student where id not in (SELECT student.id FROM student, information WHERE student.id = information.student_id AND MONTH(information.created_at) = MONTH(DATE_SUB(CURDATE(), INTERVAL $x MONTH))) GROUP BY student.id;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $healthy[$x] = $result->num_rows;
        }

        $stmt->close();
        $conn->close();
        return $healthy;
    }

    public function getMonthlyCheckupCounts(){
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT COUNT(information.id) as count FROM information  WHERE MONTH(information.created_at) = MONTH(CURRENT_DATE()) AND YEAR(information.created_at) = YEAR(CURRENT_DATE());";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        $checkupCounts = [];
        return $row = $result->fetch_assoc();
    }
}
?>