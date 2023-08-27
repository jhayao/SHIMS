<?php
    class Login{
        public function __construct(){
            include_once('database.php');
                // error_reporting(E_ALL);
            // ini_set('display_errors', 1);
            // ini_set('error_log', 'error.log');
            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);
        }

        //create new add function for login
        public function addLogin(){
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : ''; 
            $passwordMd5 = md5($password);
            $account_id = isset($_POST['account_id']) ? $_POST['account_id'] : '';
            $db = new Connection();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO `users`(`id`, `email`, `password`, `user_type`,`account_id`) VALUES (NULL,?,?,?, ?)");
            $stmt->bind_param("ssss", $email, $passwordMd5, $user_type,$account_id);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return json_encode(array('success'=>'true'));
        }

        public function updateLogin(){
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
            return json_encode(array('success'=>'true'));
        }

        public function  loginUser(){
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
            // print_r($result);
            
            return $result;
        }

        public function getUser(){
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

        public function getUserInfo($userType,$userId){
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
            }
            else if ($userType == 'nurse') {
                $db = new Connection();
                $conn = $db->connect(); 
                $stmt = $conn->prepare("SELECT * FROM `nurse` WHERE `id`=?");
                $stmt->bind_param("s", $userId);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                $conn->close();
                return $result;
            }
            else if ($userType=='student'){
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
    if(isset($_POST['function'])){
        $function = $_POST['function'];
        $login = new Login();
        // session_start();
        //call function based on parameter
        switch($function){
            case 'addLogin':
                echo ($login->addLogin());
                break;
            case 'loginUser':
                $result = $login->loginUser();
                // print_r($result->fetch_assoc());
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    // print_r($row);
                    $account_id = $row['account_id'] ?? '';
                    $user_type = $row['user_type'];
                    if($user_type == 'admin'){
                        echo json_encode(array('success'=>'true','user_type'=>$user_type));
                        $_SESSION['user_type'] = $user_type;
                        $_SESSION['userInfo'] = null;
                        return;
                    }
                    $result = $login->getUserInfo($user_type,$account_id);
                    $row = $result->fetch_assoc();
                    // print_r(session_status());
                    // echo session_id();
                    
                    $_SESSION['user_type'] = $user_type;
                    $_SESSION['userInfo'] = $row;
                    //count $row
                    if($row){
                        echo json_encode(array('success'=>'true','user_type'=>$user_type,'userInfo'=>$row));
                    }
                    else{
                        echo json_encode(array('success'=>'false'));
                    }
                    // print_r(session_status());
                    // echo json_encode($_SESSION);
                    // echo json_encode(array('success'=>'true','user_type'=>$user_type,'userInfo'=>$row));
                }else{
                    echo json_encode(array('success'=>'false'));
                }
                break;
        }
    }
?>