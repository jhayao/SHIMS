<?php
class ReportController
{
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
        require_once ('../view/include/fpdf/templates/ex.php');
        $ex = new Ex();
        $ex->test();
    }


    function generateReportGroup($array)
    {

        $daterange = $_POST['daterange'];
        $bmi = $_POST['bmi'];
        $height_for_age = $_POST['height_for_age'];
        $vision_screening = $_POST['vision_screening'];
        $auditory_screening = $_POST['auditory_screening'];
        $mouth_throat_neck = $_POST['mouth_throat_neck'];
        $lungs_heart = $_POST['lungs_heart'];
        $others_lungs_heart = $_POST['others_lungs_heart'];
        $abdomen = $_POST['abdomen'];
        $deformities = $_POST['deformities'];
        $deformities_input = $_POST['deformities_input'];
        $immunization = $_POST['immunization'];
        $iron_supplementation = $_POST['iron_supplementation'];
        $deworming = $_POST['deworming'];
        $sbfp_beneficiary = $_POST['sbfp_beneficiary'];
        $fourps_beneficiary = $_POST['fourps_beneficiary'];
        $menarche = $_POST['menarche'];

        $file = '../assets/dompdf/autoload.inc.php';
        $htmlFile = '../assets/dompdf/group.html';
        $htmlTemplate = file_get_contents($htmlFile);


        // echo $htmlTemplate;
        // exit;
        require_once ($file);
        // use Dompdf\Dompdf;

        $dompdf = new \Dompdf\Dompdf();

        $startLoop = strpos($htmlTemplate, '<!-- start loop -->') + strlen('<!-- start loop -->');
        $endLoop = strpos($htmlTemplate, '<!-- end loop -->');
        $tableTemplate = substr($htmlTemplate, $startLoop, $endLoop - $startLoop);

        $COUNT = 1;
        if ($array->num_rows > 0) {


            foreach ($array as $key => $value) {

                $tblTemp = $tableTemplate;
                $tblTemp = str_replace('{count}', $COUNT, $tableTemplate);
                $tblTemp = str_replace('{name}', $value['name'], $tblTemp);
                $tblTemp = str_replace('{sex}', $value['sex'], $tblTemp);
                $tblTemp = str_replace('{dob}', $value['dob'], $tblTemp);
                $tblTemp = str_replace('{email}', $value['email'], $tblTemp);

                $COUNT = $COUNT + 1;
                $tableLoop = $tableLoop . $tblTemp;

                // $tableTemp = str_replace
            }
        } else {
            $tblTemp = str_replace('{count}', $COUNT, $tableTemplate);
            $tblTemp = str_replace('{name}', $value['name'], $tblTemp);
            $tblTemp = str_replace('{sex}', $value['sex'], $tblTemp);
            $tblTemp = str_replace('{dob}', $value['dob'], $tblTemp);
            $tblTemp = str_replace('{email}', $value['email'], $tblTemp);
            $tableLoop = '<tr>
                    <td colspan="5" style="text-align: center;">No Students available</td>
                </tr>';
        }

        $htmlTemplate = str_replace($tableTemplate, $tableLoop, $htmlTemplate);
        $htmlTemplate = str_replace('{date}', $daterange, $htmlTemplate);
        $htmlTemplate = str_replace('{bmi}', $bmi, $htmlTemplate);
        $htmlTemplate = str_replace('{height_for_age}', $height_for_age, $htmlTemplate);
        $htmlTemplate = str_replace('{vision_screening}', $vision_screening, $htmlTemplate);
        $htmlTemplate = str_replace('{auditory_screening}', $auditory_screening, $htmlTemplate);
        $htmlTemplate = str_replace('{mouth_throat_neck}', $mouth_throat_neck, $htmlTemplate);
        $htmlTemplate = str_replace('{lungs_heart}', $lungs_heart, $htmlTemplate);
        $htmlTemplate = str_replace('{others_lungs_heart}', $others_lungs_heart, $htmlTemplate);
        $htmlTemplate = str_replace('{abdomen}', $abdomen, $htmlTemplate);
        $htmlTemplate = str_replace('{deformities}', $deformities, $htmlTemplate);
        $htmlTemplate = str_replace('{deformities_input}', $deformities_input, $htmlTemplate);
        $htmlTemplate = str_replace('{immunization}', $immunization, $htmlTemplate);
        $htmlTemplate = str_replace('{iron_supplementation}', $iron_supplementation, $htmlTemplate);
        $htmlTemplate = str_replace('{deworming}', $deworming, $htmlTemplate);
        $htmlTemplate = str_replace('{sbfp_beneficiary}', $sbfp_beneficiary, $htmlTemplate);
        $htmlTemplate = str_replace('{fourps_beneficiary}', $fourps_beneficiary, $htmlTemplate);
        $htmlTemplate = str_replace('{menarche}', $menarche, $htmlTemplate);
        $htmlTemplate = str_replace('{date}', date("F j, Y, g:i a"), $htmlTemplate);
        // echo $htmlTemplate;
        $nurseName = $_SESSION['userInfo']['firstname'] . ' ' . $_SESSION['userInfo']['middlename'] . ' ' . $_SESSION['userInfo']['lastname'];
        // $nurseName = . /
        $htmlTemplate = str_replace('{nurse_name}', $nurseName, $htmlTemplate);
        // echo json_encode($_SESSION['userInfo']['firstname']);
        // exit();
        $dompdf->loadHtml($htmlTemplate);
        // $dompdf->setOptions($options);
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream("report.pdf", array("Attachment" => 0));

    }
    function generateReport(array $data)
    {

        // echo json_encode($data);
        $file = '../assets/dompdf/autoload.inc.php';
        $htmlFile = '../assets/dompdf/template.html';
        $htmlTemplate = file_get_contents($htmlFile);


        // echo $htmlTemplate;
        // exit;
        require_once ($file);
        // use Dompdf\Dompdf;

        $dompdf = new \Dompdf\Dompdf();
        ;




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
        require_once ('studentController.php');
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
        $htmlTemplate = str_replace('{nurse_name}', $nurseName, $htmlTemplate);
        // echo json_encode($_SESSION['userInfo']['firstname']);
        // exit();
        $dompdf->loadHtml($htmlTemplate);
        // $dompdf->setOptions($options);
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream("report.pdf", array("Attachment" => 0));
    }

    function getReportbyStudentId()
    {
        $studentId = $_POST['student'];
        $checkup_date = $_POST['checkup_date'];
        if ($checkup_date != "0") {
            $query = "SELECT * FROM `information` WHERE student_id = ? and id = $checkup_date";
        } else {
            $query = "SELECT * FROM `information` WHERE student_id = ?";
        }

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

    function getReportGroup()
    {
        // set a variable for each posted data
        $report = $_POST['report'];
        $daterange = $_POST['daterange'];
        $bmi = $_POST['bmi'];
        $height_for_age = $_POST['height_for_age'];
        $vision_screening = $_POST['vision_screening'];
        $auditory_screening = $_POST['auditory_screening'];
        $mouth_throat_neck = $_POST['mouth_throat_neck'];
        $lungs_heart = $_POST['lungs_heart'];
        $others_lungs_heart = $_POST['others_lungs_heart'];
        $abdomen = $_POST['abdomen'];
        $deformities = $_POST['deformities'];
        $deformities_input = $_POST['deformities_input'];
        $immunization = $_POST['immunization'];
        $iron_supplementation = $_POST['iron_supplementation'];
        $deworming = $_POST['deworming'];
        $sbfp_beneficiary = $_POST['sbfp_beneficiary'];
        $fourps_beneficiary = $_POST['fourps_beneficiary'];
        $menarche = $_POST['menarche'];
        if ($report == 2) {
            if ($daterange != "") {
                $daterange = explode(' - ', $daterange);
                $start = date('Y-m-d', strtotime($daterange[0]));
                $end = date('Y-m-d', strtotime($daterange[1]));
                $daterange = "AND created_at BETWEEN '$start' AND '$end'";
            } else {
                $daterange = '';
            }
        } else if ($report == 3) {
            $parts = explode(' ', $daterange);
            $year = intval($parts[1]);
            $quarter = str_replace('Q', '', $parts[0]);
            $daterange = "AND QUARTER(created_at) = $quarter AND YEAR(created_at) = $year";
        } else if ($report == 4) {
            $daterange = "AND YEAR(created_at) = $daterange ";
        }


        $bmi = $bmi != "" ? "AND BMI = '$bmi'" : '';
        $height_for_age = $height_for_age != "" ? "AND height_for_age = '$height_for_age'" : '';
        $vision_screening = $vision_screening != "" ? "AND vision_screening = '$vision_screening'" : '';
        $auditory_screening = $auditory_screening != "" ? "AND auditory_screening = '$auditory_screening'" : '';
        $mouth_throat_neck = $mouth_throat_neck != "" ? "AND mouth_throat_neck = '$mouth_throat_neck'" : '';
        $lungs_heart = $lungs_heart != "" ? "AND lungs_heart = '$lungs_heart'" : '';
        $others_lungs_heart = $others_lungs_heart != "" ? "AND others_lungs_heart = '$others_lungs_heart'" : '';
        $abdomen = $abdomen != "" ? "AND abdomen = '$abdomen'" : '';
        $deformities = $deformities != "" ? "AND deformities = '$deformities'" : '';
        $deformities_input = $deformities_input != "" ? "AND deformities_input = '$deformities_input'" : '';
        $immunization = $immunization != "" ? "AND immunization = '$immunization'" : '';
        $iron_supplementation = $iron_supplementation != "" ? "AND iron_supplementation = '$iron_supplementation'" : '';
        $deworming = $deworming != "" ? "AND deworming = '$deworming'" : '';
        $sbfp_beneficiary = $sbfp_beneficiary != "" ? "AND sbfp_beneficiary = '$sbfp_beneficiary'" : '';
        $fourps_beneficiary = $fourps_beneficiary != "" ? "AND fourps_beneficiary = '$fourps_beneficiary'" : '';
        $menarche = $menarche != "" ? "AND menarche = '$menarche'" : '';


        $sql = "SELECT student.*, CONCAT(student.firstname , ' ',student.middlename, ' ' , student.lastname) as `name` FROM `information` inner join student on student.id = information.student_id WHERE 1 $daterange $bmi $height_for_age $vision_screening $auditory_screening $mouth_throat_neck $lungs_heart $others_lungs_heart $abdomen $deformities $deformities_input $immunization $iron_supplementation $deworming $sbfp_beneficiary $fourps_beneficiary $menarche group by student.id";
        // echo $sql;
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($sql);
        // $stmt->bind_param('s', $studentId);
        $stmt->execute();
        $result = $stmt->get_result();

        // $result = "";
        // echo json_encode($result);
        $stmt->close();
        $conn->close();
        return $result;

    }

    function reportGenerator()
    {
        $report = $_POST['report'];
        // $student = $_POST['student'];
        // $checkup_date = $_POST['checkup_date'];

        // echo $report;

        if ($report == 2 || $report == 3 || $report == 4) {
            $result = $this->getReportGroup();
            $this->generateReportGroup($result);
            // $this->generateReportGroup();
        } else {
            $result = $this->getReportbyStudentId();
            $reportArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($reportArray, $row);
            }
            $this->generateReport($reportArray);
            // break;
            // $this->getReportbyStudentId();
        }
    }
}


//listen to get
if (isset($_POST['function'])) {
    $action = $_POST['function'];
    $reportController = new ReportController();
    switch ($action) {
        case 'generateReport':
            $reportController->reportGenerator();
            break;
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