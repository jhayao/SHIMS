<?php

require_once ('otpController.php');
class Login
{
    public function __construct()
    {
        include_once ('database.php');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }


    public function changePassword()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $userID = isset($_POST['userID']) ? $_POST['userID'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $oldPassword = isset($_POST['oldPassword']) ? $_POST['oldPassword'] : '';
        $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
        $oldPasswordMd5 = md5($oldPassword);
        $passwordMd5 = md5($password);
        if ($confirmPassword == $password) {
            if (strlen($password) < 8) {
                // $_SESSION['notyMessage'] = 'Password must be at least 8 characters';
                return json_encode(array('success' => 'false', 'message' => 'Password must be at least 8 characters'));
            }
            if ($this->checkCurrentPassword($oldPasswordMd5, $userID) > 0) {
                $db = new Connection();
                $conn = $db->connect();
                $stmt = $conn->prepare("UPDATE `users` SET `password`=? WHERE `id`=?");
                $stmt->bind_param("si", $passwordMd5, $userID);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                $_SESSION['notyMessage'] = 'Password changed successfully';
                return json_encode(array('success' => 'true', 'message' => 'Password changed successfully'));
            } else {
                // $_SESSION['notyMessage'] = 'Current password is not correct';
                return json_encode(array('success' => 'false', 'message' => 'Current password is not correct'));
            }
        } else {
            // $_SESSION['notyMessage'] = 'Password does not match';
            return json_encode(array('success' => 'false', 'message' => 'Password does not match'));
        }

    }

    public function checkCurrentPassword($password, $userID)
    {
        $db = new Connection();
        $conn = $db->connect();
        $stmt = $conn->prepare('SELECT * FROM `users` where password = ? and id = ?');
        $stmt->bind_param('si', $password, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }
    //create new add function for login
    public function addLogin()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';
        $passwordMd5 = md5($password);
        $account_id = isset($_POST['account_id']) ? $_POST['account_id'] : '';
        $db = new Connection();
        $conn = $db->connect();
        $stmt = $conn->prepare("INSERT INTO `users`(`id`, `email`, `password`, `user_type`,`account_id`) VALUES (NULL,?,?,?, ?)");
        $stmt->bind_param("ssss", $email, $passwordMd5, $user_type, $account_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return json_encode(array('success' => 'true'));
    }

    public function updateLogin()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';
        $passwordMd5 = md5($password);
        $db = new Connection();
        $conn = $db->connect();
        $stmt = $conn->prepare("UPDATE `users` SET `email`=?,`password`=?,`user_type`=? WHERE `id`=?");
        $stmt->bind_param("ssss", $email, $passwordMd5, $user_type, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return json_encode(array('success' => 'true'));
    }

    public function loginUser()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $passwordMd5 = md5($password);
        $db = new Connection();
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email`=? AND `password`=?");
        $stmt->bind_param("ss", $email, $passwordMd5);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public function getUser()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $db = new Connection();
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `id`=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    public function createUserWhenCreated(string $lastname, string $email, string $contact, string $user_type, int $id, string $firstname = null)
    {
        $db = new Connection();
        $conn = $db->connect();
        $password = $lastname . '_' . $contact;
        $passwordMd5 = md5($password);
        // $passwordMd5 = $password;
        $stmt = $conn->prepare("INSERT INTO `users`(`id`, `email`, `password`, `user_type`,`account_id`) VALUES (NULL,?,?,?, ?)");
        $stmt->bind_param("ssss", $email, $passwordMd5, $user_type, $id);
        $name = $firstname . ' ' . $lastname;
        if ($stmt->execute()) {
            if (isset($email)) {
                $emailTemplate = new OTP();
                $emailTemplate->sendPasswordNotification($email, $name, $password);
            }
            return true;
        } else {
            return false;
        }

    }

    public function getUserInfo($userType, $userId)
    {
        if ($userType == 'admin') {
            $db = new Connection();
            $conn = $db->connect();
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `id`=?");
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            return $result;
        } else if ($userType == 'nurse') {
            $db = new Connection();
            $conn = $db->connect();
            $stmt = $conn->prepare("SELECT * FROM `nurse` WHERE `id`=?");
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            return $result;
        } else if ($userType == 'student') {
            $db = new Connection();
            $conn = $db->connect();
            $stmt = $conn->prepare("SELECT * FROM `student` WHERE `id`=?");
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            return $result;
        }
    }
}



//listen to post with 'function' as parameter
if (isset($_POST['function'])) {
    $function = $_POST['function'];
    $login = new Login();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //call function based on parameter
    switch ($function) {
        case 'addLogin':
            echo ($login->addLogin());
            break;
        case 'loginUser':
            $result = $login->loginUser();
            // print_r($result->fetch_assoc());
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $account_id = $row['account_id'] ?? '';
                $user_type = $row['user_type'];
                $user_id = $row['id'] ?? '';
                $_SESSION['userID'] = $user_id;
                // echo $user_id;
                // echo json_encode($row);
                if ($user_type == 'admin') {
                    echo json_encode(array('success' => 'true', 'user_type' => $user_type));
                    $_SESSION['user_type'] = $user_type;
                    $fullname = "Admin";
                    require_once ('../controller/otpController.php');
                    $template = new Otp();
                    $template->sendMail('gemmarie.canlom@nmsc.edu.ph', $fullname);
                    $_SESSION['userInfo'] = array('id' => '5', 'firstname' => 'Admin', 'middlename' => '', 'lastname' => '', 'email' => 'gemmarie.canlom@nmsc.edu.ph', 'sex' => 'Male', 'contact' => '', 'street' => '', 'barangay' => '', 'city' => '', 'province' => 'Misamis Occidental', 'postal' => '7207', 'nurse_type' => 'admin', 'assigned' => '0');
                    return;
                }
                $result = $login->getUserInfo($user_type, $account_id);
                $row = $result->fetch_assoc();
                // print_r(session_status());
                // echo session_id();

                $_SESSION['user_type'] = $user_type;

                $_SESSION['userInfo'] = $row;
                $_SESSION['userInfo']['isVerified'] = false;
                //count $row
                if ($row) {
                    require_once ('../controller/otpController.php');
                    $template = new Otp();
                    $name = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                    $template->sendMail($row['email'], $name);
                    echo json_encode(array('success' => 'true', 'user_id' => $user_id, 'user_type' => $user_type, 'userInfo' => $row));
                } else {
                    echo json_encode(array('success' => 'false'));
                }
                // print_r(session_status());
                // echo json_encode($_SESSION);
                // echo json_encode(array('success'=>'true','user_type'=>$user_type,'userInfo'=>$row));
            } else {
                echo json_encode(array('success' => 'false'));
            }
            break;
        case 'changePassword':
            echo $login->changePassword();
    }
}
?>