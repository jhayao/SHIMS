<?php

class UserController
{
    function __construct()
    {
        //call database.php
        include_once('database.php');
        $this->createwNewView();
        //enable log
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('error_log', 'error.log');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    function getAllUser()
    {
        $db = new Connection();
        $conn = $db->connect();
        $sql = "SELECT * FROM user_accounts order by role";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    function resetPassword($userId)
    {
        try {
            if ($userId == null) {
                return;
            }
            $db = new Connection();
            $conn = $db->connect();
            $newPassword = $this->generateRandomPassword();
            $password = md5($newPassword);
            $sql = "SELECT * FROM nurse WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $email = $row['email'];
            $name = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
            $conn = $db->connect();

            $sql = "UPDATE users SET password = ? WHERE account_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $password, $userId);
            require_once('otpController.php');
            $otp = new Otp();
            $otp->sendPasswordResetNotification($email, $name, $newPassword);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo json_encode(array('status' => 'success', 'message' => 'Password reset successfully. New password sent to ' . $email));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to reset password. Please try again later.'));
        }
    }

    private function generateRandomPassword($length = 12, $includeLowercase = true, $includeUppercase = true, $includeNumbers = true, $includeSpecialChars = true)
    {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()-_=+<>?';

        $characters = '';
        if ($includeLowercase) {
            $characters .= $lowercase;
        }
        if ($includeUppercase) {
            $characters .= $uppercase;
        }
        if ($includeNumbers) {
            $characters .= $numbers;
        }
        if ($includeSpecialChars) {
            $characters .= $specialChars;
        }

        if (empty($characters)) {
            throw new Exception('No characters available for password generation. Please enable at least one character set.');
        }

        $password = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        return $password;
    }


    private function createwNewView()
    {
        $db = new Connection();
        $conn = $db->connect();
        $sql = "CREATE OR REPLACE VIEW user_accounts AS
        SELECT * FROM 
            (
                SELECT 
                    n.id,
                    concat(n.firstname, ' ', SUBSTRING(n.middlename,1,1), '. ', n.lastname) AS fullname,
                    n.assigned,
                    n.nurse_type AS role,
                    n.email,
                    s.school_name AS assignment
                FROM 
                    nurse AS n 
                INNER JOIN 
                    school AS s 
                ON 
                    s.id = n.assigned 
                WHERE 
                    n.nurse_type = 'School Nurse'
            ) AS school_nurse 
            UNION 
            SELECT * FROM 
            (
                SELECT 
                    n.id,
                    concat(n.firstname, ' ', SUBSTRING(n.middlename,1,1), ' ', n.lastname) AS fullname,
                    n.assigned,
                    n.nurse_type AS role,
                    n.email,
                    d.district_name AS assignment
                FROM 
                    nurse AS n 
                INNER JOIN 
                    district AS d 
                ON 
                    d.id = n.assigned 
                WHERE 
                    n.nurse_type = 'District Nurse'
            ) AS district_nurse 
            UNION 
            SELECT * FROM 
            (
                SELECT 
                    n.id,
                    concat(n.firstname, ' ', SUBSTRING(n.middlename,1,1), ' ', n.lastname) AS fullname,
                    n.assigned,
                    n.nurse_type AS role,
                    n.email,
                    d.division_name AS assignment
                FROM 
                    nurse AS n 
                INNER JOIN 
                    division AS d 
                ON 
                    d.id = n.assigned 
                WHERE 
                    n.nurse_type = 'Division Nurse'
            ) AS division_nurse;
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

if (isset($_POST['function'])) {

    $function = $_POST['function'];

    $user = new UserController();
    // echo $function;
    switch ($function) {
        case 'getAllUser':
            $result = $user->getAllUser();
            $userArray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($userArray, $row);
            }
            $dataTable = array('data' => $userArray, 'draw' => 1, 'recordsTotal' => count($userArray), 'recordsFiltered' => count($userArray));
            echo json_encode($dataTable);
            break;
        case 'resetPassword':
            $userId = $_POST['nurseId'];
            $user->resetPassword($userId);
            break;
    }
}
