<?php
class Checkup
{
    function __construct()
    {
        include_once ('database.php');
        require_once ('logController.php');
        require ('studentController.php');
        // error_reporting(E_ALL);
        // ini_setW('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }

    function getAllCheckupbySchoolId()
    {
        $school_id = isset($_POST['schoolId']) ? $_POST['schoolId'] : '';

        $conn = new Connection();
        $query = "select information.id, CONCAT(student.firstname,' ', student.middlename, ' ', student.lastname) as studentName, CONCAT(nurse.firstname,' ',nurse.middlename,' ',nurse.lastname) as nurseName,information.* from student inner join information on student.id = information.student_id inner join nurse on nurse.id = information.nurse_id where student.school_id = ?";
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

    function getAllCheckup()
    {
        $conn = new Connection();
        $query = "select information.id, CONCAT(student.firstname,' ', student.middlename, ' ', student.lastname) as studentName, CONCAT(nurse.firstname,' ',nurse.middlename,' ',nurse.lastname) as nurseName,information.height,information.temperature, information.weight, information.created_at from student inner join information on student.id = information.student_id inner join nurse on nurse.id = information.nurse_id;";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function getCheckupbyStudentId()
    {
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        $conn = new Connection();
        $query = "select information.id, CONCAT(student.firstname,' ', student.middlename, ' ', student.lastname) as studentName, CONCAT(nurse.firstname,' ',nurse.middlename,' ',nurse.lastname) as nurseName,information.height,information.temperature, information.weight, information.created_at, information.findings,information.prescription from student inner join information on student.id = information.student_id inner join nurse on nurse.id = information.nurse_id where student.id = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function addCheckup()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $nurse_id = "";
        $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
        // print_r($_SESSION['userInfo']);
        if ($userType == 'nurse') {
            $nurse_id = $_SESSION['userInfo']['id'];
        } else {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => "Only Nurse account are allowed to add new checkup information", 'errorCode' => '0');
            return json_encode($errorMessageArray);
        }
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        $school_id = isset($_POST['school_id']) ? $_POST['school_id'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';

        $heart_rate = isset($_POST['heart_rate']) ? $_POST['heart_rate'] : '';
        $bmi = isset($_POST['bmi']) ? $_POST['bmi'] : '';
        $height_for_age = isset($_POST['height_for_age']) ? $_POST['height_for_age'] : '';
        $vision_screening = isset($_POST['vision_screening']) ? $_POST['vision_screening'] : '';
        $auditory_screening = isset($_POST['auditory_screening']) ? $_POST['auditory_screening'] : '';
        $skin_scalp = isset($_POST['skin_scalp']) ? $_POST['skin_scalp'] : '';
        $eyes_ear_nose = isset($_POST['eyes_ear_nose']) ? $_POST['eyes_ear_nose'] : '';
        $mouth_throat_neck = isset($_POST['mouth_throat_neck']) ? $_POST['mouth_throat_neck'] : '';
        $others_mouth_throat_neck = isset($_POST['others_mouth_throat_neck']) ? $_POST['others_mouth_throat_neck'] : '';
        $lungs_heart = isset($_POST['lungs_heart']) ? $_POST['lungs_heart'] : '';
        $others_lungs_heart = isset($_POST['others_lungs_heart']) ? $_POST['others_lungs_heart'] : '';
        $abdomen = isset($_POST['abdomen']) ? $_POST['abdomen'] : '';
        $others_abdomen = isset($_POST['others_abdomen']) ? $_POST['others_abdomen'] : '';
        $deformities = isset($_POST['deformities']) ? $_POST['deformities'] : '';
        $deformities_input = isset($_POST['deformities_input']) ? $_POST['deformities_input'] : '';
        $immunization = isset($_POST['immunization']) ? $_POST['immunization'] : '';
        $iron_supplementation = isset($_POST['iron_supplementation']) ? $_POST['iron_supplementation'] : '';
        $deworming = isset($_POST['deworming']) ? $_POST['deworming'] : '';
        $sbfp_beneficiary = isset($_POST['sbfp_beneficiary']) ? $_POST['sbfp_beneficiary'] : '';
        $fourps_beneficiary = isset($_POST['fourps_beneficiary']) ? $_POST['fourps_beneficiary'] : '';
        $menarche = isset($_POST['menarche']) ? $_POST['menarche'] : '';
        $others = isset($_POST['others']) ? $_POST['others'] : '';

        $iron_supplementation = $iron_supplementation == 'check' ? '1' : '0';
        $deworming = $deworming == 'check' ? '1' : '0';
        $sbfp_beneficiary = $sbfp_beneficiary == 'check' ? '1' : '0';
        $fourps_beneficiary = $fourps_beneficiary == 'check' ? '1' : '0';
        $menarche = $menarche == 'check' ? '1' : '0';

        $skin_scalp = implode(",", $skin_scalp);
        $eyes_ear_nose = implode(",", $eyes_ear_nose);
        $mouth_throat_neck = strtolower($mouth_throat_neck) == 'others' ? $others_mouth_throat_neck : $mouth_throat_neck;
        $lungs_heart = strtolower($lungs_heart) == 'others' ? $others_lungs_heart : $lungs_heart;
        $abdomen = strtolower($abdomen) == 'others' ? $others_abdomen : $abdomen;
        $deformities = strtolower($deformities) == 'congenital' ? $deformities_input : $deformities;

        $conn = new Connection();
        $query = "INSERT INTO `information`(`id`, `student_id`, `nurse_id`, `school_id`, `height`, `temperature`, `weight`, `BMI`, `heart_rate`, `height_for_age`, `vision_screening`, `auditory_screening`, `skin_scalp`, `eyes_ear_nose`, `mouth_throat_neck`, `lungs_heart`, `abdomen`, `deformities`, `immunization`, `iron_supplementation`, `deworming`, `sbfp_beneficiary`, `fourps_beneficiary`, `menarche`, `others`) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssssssssssssssssss", $student_id, $nurse_id, $school_id, $height, $temperature, $weight, $bmi, $heart_rate, $height_for_age, $vision_screening, $auditory_screening, $skin_scalp, $eyes_ear_nose, $mouth_throat_neck, $lungs_heart, $abdomen, $deformities, $immunization, $iron_supplementation, $deworming, $sbfp_beneficiary, $fourps_beneficiary, $menarche, $others);
        try {

            $stmt->execute();
            $stmt->close();
            $conn->close();
            $log = new Log();
            $student = new Student();
            $studentInfo = $student->getStudentsById($student_id);
            $studentInfo = $studentInfo->fetch_assoc();
            $log->createLog($_SESSION['userID'], "Added new checkup information for student : " . $studentInfo['firstname'] . " " . $studentInfo['middlename'] . " " . $studentInfo['lastname']);
            return json_encode(array('success' => 'true'));
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }
    }

    function deleteCheckup()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "DELETE FROM `information` WHERE `id` = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        try {

            $stmt->execute();
            $stmt->close();
            $conn->close();
            $log = new Log();
            $log->createLog($_SESSION['userID'], "Deleted checkup information.");
            return json_encode(array('success' => 'true'));
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }
    }


    function editCheckup()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $conn = new Connection();
        $query = "SELECT inf.*,stud.school_id,sch.division_id,sch.district_id FROM `information` as inf inner join student as stud on stud.id = inf.student_id inner join school as sch on sch.id = stud.school_id where inf.id  = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        try {

            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            // print_r(json_encode($result->fetch_assoc()));
            return $result;
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }
    }

    function updateCheckup()
    {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $id = isset($_POST['id']) ? $_POST['id'] : '';


        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        $school_id = isset($_POST['school_id']) ? $_POST['school_id'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';

        $heart_rate = isset($_POST['heart_rate']) ? $_POST['heart_rate'] : '';
        $BMI = isset($_POST['bmi']) ? $_POST['bmi'] : '';
        $height_for_age = isset($_POST['height_for_age']) ? $_POST['height_for_age'] : '';
        $vision_screening = isset($_POST['vision_screening']) ? $_POST['vision_screening'] : '';
        $auditory_screening = isset($_POST['auditory_screening']) ? $_POST['auditory_screening'] : '';
        $skin_scalp = isset($_POST['skin_scalp']) ? $_POST['skin_scalp'] : '';
        $eyes_ear_nose = isset($_POST['eyes_ear_nose']) ? $_POST['eyes_ear_nose'] : '';
        $mouth_throat_neck = isset($_POST['mouth_throat_neck']) ? $_POST['mouth_throat_neck'] : '';
        $others_mouth_throat_neck = isset($_POST['others_mouth_throat_neck']) ? $_POST['others_mouth_throat_neck'] : '';
        $lungs_heart = isset($_POST['lungs_heart']) ? $_POST['lungs_heart'] : '';
        $others_lungs_heart = isset($_POST['others_lungs_heart']) ? $_POST['others_lungs_heart'] : '';
        $abdomen = isset($_POST['abdomen']) ? $_POST['abdomen'] : '';
        $others_abdomen = isset($_POST['others_abdomen']) ? $_POST['others_abdomen'] : '';
        $deformities = isset($_POST['deformities']) ? $_POST['deformities'] : '';
        $deformities_input = isset($_POST['deformities_input']) ? $_POST['deformities_input'] : '';
        $immunization = isset($_POST['immunization']) ? $_POST['immunization'] : '';
        $iron_supplementation = isset($_POST['iron_supplementation']) ? $_POST['iron_supplementation'] : '';
        $deworming = isset($_POST['deworming']) ? $_POST['deworming'] : '';
        $sbfp_beneficiary = isset($_POST['sbfp_beneficiary']) ? $_POST['sbfp_beneficiary'] : '';
        $fourps_beneficiary = isset($_POST['fourps_beneficiary']) ? $_POST['fourps_beneficiary'] : '';
        $menarche = isset($_POST['menarche']) ? $_POST['menarche'] : '';
        $others = isset($_POST['others']) ? $_POST['others'] : '';

        $iron_supplementation = $iron_supplementation == 'check' ? '1' : '0';
        $deworming = $deworming == 'check' ? '1' : '0';
        $sbfp_beneficiary = $sbfp_beneficiary == 'check' ? '1' : '0';
        $fourps_beneficiary = $fourps_beneficiary == 'check' ? '1' : '0';
        $menarche = $menarche == 'check' ? '1' : '0';

        $skin_scalp = implode(",", $skin_scalp);
        $eyes_ear_nose = implode(",", $eyes_ear_nose);
        $mouth_throat_neck = strtolower($mouth_throat_neck) == 'others' ? $others_mouth_throat_neck : $mouth_throat_neck;
        $lungs_heart = strtolower($lungs_heart) == 'others' ? $others_lungs_heart : $lungs_heart;
        $abdomen = strtolower($abdomen) == 'others' ? $others_abdomen : $abdomen;
        $deformities = strtolower($deformities) == 'congenital' ? $deformities_input : $deformities;


        $conn = new Connection();
        $query = "UPDATE `information` SET  `height`=?, `temperature`=?, `weight`=?, `BMI`=?, `heart_rate`=?, `height_for_age`=?, `vision_screening`=?, `auditory_screening`=?, `skin_scalp`=?, `eyes_ear_nose`=?, `mouth_throat_neck`=?, `lungs_heart`=?, `abdomen`=?, `deformities`=?, `immunization`=?, `iron_supplementation`=?, `deworming`=?, `sbfp_beneficiary`=?, `fourps_beneficiary`=?, `menarche`=?, `others`=? WHERE `id`=?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssssssssssssssi", $height, $temperature, $weight, $BMI, $heart_rate, $height_for_age, $vision_screening, $auditory_screening, $skin_scalp, $eyes_ear_nose, $mouth_throat_neck, $lungs_heart, $abdomen, $deformities, $immunization, $iron_supplementation, $deworming, $sbfp_beneficiary, $fourps_beneficiary, $menarche, $others, $id);
        try {

            $stmt->execute();
            $stmt->close();
            $conn->close();
            $log = new Log();
            $student = new Student();
            $studentInfo = $student->getStudentsById($student_id);
            $studentInfo = $studentInfo->fetch_assoc();
            $log->createLog($_SESSION['userID'], "Updated checkup information for student : " . $studentInfo['firstname'] . " " . $studentInfo['middlename'] . " " . $studentInfo['lastname']);
            return json_encode(array('success' => 'true'));
        } catch (Exception $e) {
            $errorMessageArray = array('success' => 'false', 'errorMessage' => $stmt->error, 'errorCode' => $stmt->errno);
            return json_encode($errorMessageArray);
        }
    }

    function getCheckupDateByStudentId()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
        $conn = new Connection();
        $query = "SELECT `id`, `created_at` FROM `information` WHERE `student_id` = ?";
        $connection = new Connection();
        $conn = $connection->connect();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }
}

//listen all post request
if (isset($_POST['function'])) {
    $action = $_POST['function'];
    $checkup = new Checkup();
    switch ($action) {
        case 'getCheckupDateByStudentId':
            // echo "test";
            $result = $checkup->getCheckupDateByStudentId();
            $checkupArray = array();
            while ($row = $result->fetch_assoc()) {
                $row['created_at'] = date("F j, Y, g:i a", strtotime($row['created_at']));
                array_push($checkupArray, $row);
            }
            echo json_encode($checkupArray);
            break;
        case 'addCheckup':
            echo $checkup->addCheckup();
            break;
        case 'deleteCheckup':
            echo $checkup->deleteCheckup();
            break;
        case 'editCheckup':
            $result = $checkup->editCheckup();
            $editDistrict = array();
            $row = $result->fetch_assoc();
            echo json_encode($row);
            break;
        case 'updateCheckup':
            echo $checkup->updateCheckup();
            break;
        case 'getAllCheckupbySchoolId':
            $result = $checkup->getAllCheckupbySchoolId();
            $checkupArray = array();
            while ($row = $result->fetch_assoc()) {
                $row['created_at'] = date("F j, Y", strtotime($row['created_at']));
                array_push($checkupArray, $row);
            }
            $dataTable = array('data' => $checkupArray, 'draw' => 1, 'recordsTotal' => count($checkupArray), 'recordsFiltered' => count($checkupArray));
            echo json_encode($dataTable);
            break;
        case 'getAllCheckup':
            $result = $checkup->getAllCheckup();
            $checkupArray = array();
            while ($row = $result->fetch_assoc()) {

                array_push($checkupArray, $row);
            }
            $dataTable = array('data' => $checkupArray, 'draw' => 1, 'recordsTotal' => count($checkupArray), 'recordsFiltered' => count($checkupArray));
            echo json_encode($dataTable);
            break;
        case 'getCheckupbyStudentId':
            $result = $checkup->getCheckupbyStudentId();
            $checkupArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($checkupArray, $row);
            }
            // $dataTable = array('data'=>$checkupArray,'draw'=>1,'recordsTotal'=>count($checkupArray),'recordsFiltered'=>count($checkupArray));
            echo json_encode($checkupArray);
            break;
    }
}
?>