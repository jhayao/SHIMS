<?php
class ReportController
{
    function __construct()
    {
        //call database.php
        include_once('database.php');

        //enable log
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }

    function getAllReport()
    {
        $conn = new Connection();
        $query = "SELECT * FROM `report`";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function addReport()
    {

    }

    function printPdf()
    {
        require_once('../view/include/fpdf/templates/ex.php');
        $ex = new Ex();
        $ex->test();
    }


    function generateReport(array $data)
    {

        
        $file = '../assets/dompdf/autoload.inc.php';
        $htmlFile = '../assets/dompdf/template.html';
        $htmlTemplate = file_get_contents($htmlFile);
        
       
        // echo $htmlTemplate;
        // exit;
        require_once($file);
        // use Dompdf\Dompdf;
      
        $dompdf = new \Dompdf\Dompdf();;
        



        $startLoop = strpos($htmlTemplate, '<!-- start loop -->') + strlen('<!-- start loop -->');
        $endLoop = strpos($htmlTemplate, '<!-- end loop -->');
        $tableTemplate = substr($htmlTemplate, $startLoop, $endLoop - $startLoop);
        // echo $tableTemplate;
        // exit;
        $tableLoop = '';
        foreach ($data as $key => $value) {
            $tableTemp = $tableTemplate;
            $tableTemp = str_replace('{height}', $value['height'], $tableTemp);
            $tableTemp = str_replace('{temperature}', $value['temperature'], $tableTemp);
            $tableTemp = str_replace('{weight}', $value['weight'], $tableTemp);
            $tableTemp = str_replace('{BMI}', $value['BMI'], $tableTemp);
            $tableTemp = str_replace('{heart_rate}', $value['heart_rate'], $tableTemp);
            $tableTemp = str_replace('{height_for_age}', $value['height_for_age'], $tableTemp);
            $tableTemp = str_replace('{vision_screening}', $value['vision_screening'], $tableTemp);
            $tableTemp = str_replace('{auditory_screening}', $value['auditory_screening'], $tableTemp);
            $tableTemp = str_replace('{skin_scalp}', $value['skin_scalp'], $tableTemp);
            $tableTemp = str_replace('{eyes_ear_nose}', $value['eyes_ear_nose'], $tableTemp);
            $tableTemp = str_replace('{mouth_throat_neck}', $value['mouth_throat_neck'], $tableTemp);
            $tableTemp = str_replace('{lungs_heart}', $value['lungs_heart'], $tableTemp);
            $tableTemp = str_replace('{abdomen}', $value['abdomen'], $tableTemp);
            $tableTemp = str_replace('{deformities}', $value['deformities'], $tableTemp);
            $tableTemp = str_replace('{immunization}', $value['immunization'], $tableTemp);
            $tableTemp = str_replace('{iron_supplementation}', $value['iron_supplementation'] == '1' ? 'Yes' : 'No', $tableTemp);
            $tableTemp = str_replace('{deworming}', $value['deworming'] == '1' ? 'Yes' : 'No', $tableTemp);
            $tableTemp = str_replace('{sbfp_beneficiary}', $value['sbfp_beneficiary'] == '1' ? 'Yes' : 'No', $tableTemp);
            $tableTemp = str_replace('{fourps_beneficiary}', $value['fourps_beneficiary'] == '1' ? 'Yes' : 'No', $tableTemp);
            $tableTemp = str_replace('{menarche}', $value['menarche'] == '1' ? 'Yes' : 'No', $tableTemp);
            $tableTemp = str_replace('{others}', $value['others'], $tableTemp);
            $tableTemp = str_replace('{date}', date("F j, Y, g:i a", strtotime($value['created_at'])), $tableTemp);
            $tableLoop .= $tableTemp;
            // echo $tableTemp;
        }
        
        $htmlTemplate = str_replace($tableTemplate, $tableLoop, $htmlTemplate);
        require_once('studentController.php');
        // require_once('nurseController.php');
        // $nurseController = new Nurse();

        $studController = new Student();
        $studentData = $studController->getStudentById($data[0]['student_id'])->fetch_assoc();
        $htmlTemplate = str_replace('{student_name}', $studentData['lastname'] . ', ' . $studentData['firstname'] . ' ' . $studentData['middlename'], $htmlTemplate);
        $htmlTemplate = str_replace('{student_id}', $data[0]['student_id'], $htmlTemplate);
        $htmlTemplate = str_replace('{school_id}', $studentData['school_id'], $htmlTemplate);
        $htmlTemplate = str_replace('{school_name}', $studentData['school_name'], $htmlTemplate);
        $htmlTemplate = str_replace('{address}', $studentData['street'] . ', ' . $studentData['barangay'] . ', ' . $studentData['city'] . ', ' . $studentData['province'], $htmlTemplate);
        $htmlTemplate = str_replace('{dob}', date("F j, Y", strtotime($studentData['dob'])), $htmlTemplate);
        $htmlTemplate = str_replace('{contact}', $studentData['contact'], $htmlTemplate);   
        $htmlTemplate = str_replace('{sex}', $studentData['sex'], $htmlTemplate);
        $nurseName = $_SESSION['userInfo']['firstname'] . ' ' . $_SESSION['userInfo']['middlename'] . ' ' . $_SESSION['userInfo']['lastname'];
        // $nurseName = . /
        $htmlTemplate = str_replace('{nurse_name}',$nurseName , $htmlTemplate);
        // echo json_encode($_SESSION['userInfo']['firstname']);
        // exit();
        $dompdf->loadHtml($htmlTemplate);
        // $dompdf->setOptions($options);
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream("report.pdf", array("Attachment" => 0));
    }

    function getReportbyStudentId(){
        $studentId = $_GET['student_id'];
       
        $query = "SELECT * FROM `information` WHERE student_id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $studentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;

    }
}


//listen to get
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $reportController = new ReportController();
    switch ($action) {
        // case 'generateReport':
        //     $reportController->generateReport();
        //     break;
        case 'getReportbyStudentId':
            $result = $reportController->getReportbyStudentId();
            $reportArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($reportArray, $row);
            }
            $reportController->generateReport($reportArray);
            break;
        case 'getAllReport':
            $result = $reportController->getAllReport();
            $reportArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($reportArray, $row);
            }
            echo json_encode($reportArray);
            break;
        case 'printPdf':
            // echo "test";
            // return;
            $reportController->printPdf();
            break;
    }
}

?>