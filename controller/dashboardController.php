<?php
class Dashboard
{
    private $db;
    public function __construct()
    {
        include_once('database.php');

    }

    public function getNumberofStudents()
    {
        $query = $this->db->query('select id from student;');
        $result = $query->fetch_assoc();
        return $result->num_rows;
    }
    public function getNumberofNurse()
    {
        $query = $this->db->query('select id from nurse;');
        $result = $query->fetch_assoc();
        return $result->num_rows;
    }

    public function generateRandomColor(int $count)
    {
        $colors = [];

        for ($i = 0; $i < $count; $i++) {
            $colors[$i] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
        $colors[0] = "#5D87FF";
        return $colors;
    }

    public function getMonthlyCheckups()
    {
        $month = date('m');
        $year = date('Y');
        $days = date('t', mktime(0, 0, 0, $month, 1, $year));

        for ($i = 1; $i <= $days; $i++) {
            $day = $year . '-' . $month . '-' . $i;
            $data = $this->getDataByDay($day);
            $count = $data->num_rows;
            $result[$i] = $count;
        }
        return json_encode($result);
    }

    public function getDaysinMonth(){
        $month = date('m');
        $year = date('Y');
        $days = date('t', mktime(0, 0, 0, $month, 1, $year));
        $d= "[";
        for ($i = 1; $i <= $days; $i++) {
            $i!=$days ?  $d .= '"' . $year . '-' . $month . '-' . $i . '"' . "," : $d .= '"' . $year . '-' . $month . '-' . $i . '"'.  "]";
            
        }
        return $d;
    }
    public function getDataByDay($day)
    {
        $connection = new Connection();
        $conn = $connection->connect();
        $query = "SELECT * FROM information WHERE DATE(created_at) = ?";
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
            $query = "SELECT student.id FROM student, information WHERE student.id = information.student_id AND DATE(information.created_at) = DATE_SUB(CURDATE(), INTERVAL $x MONTH);";
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
            $query = "SELECT student.id from student where id not in (SELECT student.id FROM student, information WHERE student.id = information.student_id AND DATE(information.created_at) = DATE_SUB(CURDATE(), INTERVAL $x MONTH));";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $healthy[$x] = $result->num_rows;
        }

        $stmt->close();
        $conn->close();
        return $healthy;
    }
}

//listen to post with 'function' as parameter
if (isset($_POST['function'])) {
    $function = $_POST['function'];
    // echo $function;
    $dashboard = new Dashboard();
    // session_start();
    //call function based on parameter
    switch ($function) {
        case 'getNumberofStudents':
            echo ($dashboard->getNumberofStudents());
            break;
        case 'getNumberofNurse':
            echo ($dashboard->getNumberofNurse());
            break;
        case 'getNumberofSchool':
            echo ($dashboard->getNumberofSchool());
            break;
        case 'getNumberofDailyCheckups':
            echo ($dashboard->getNumberofDailyCheckups());
            break;
        case 'getNumberofTotalCheckups':
            echo ($dashboard->getNumberofTotalCheckups());
            break;
        case 'getNumberofSicked':
            echo ($dashboard->getNumberofSicked());
            break;
        case 'getNumberofHealthy':
            echo ($dashboard->getNumberofHealthy());
            break;
        case 'studentHealth':
            echo ($dashboard->studentHealth());
            break;
    }
}