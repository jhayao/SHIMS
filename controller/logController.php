<?php

class Log
{
    public function __construct()
    {
        //call database.php
        include_once ('database.php');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->createSqlView();
        //enable log
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('error_log', 'error.log');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    public function createLog($user_id, $log)
    {
        $db = new Connection();
        $conn = $db->connect();
        $sql = "INSERT INTO log (user_id, system_log, created_at) VALUES ( ? , ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $user_id, $log);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result ? 'success' : $conn->error;
    }

    public function getLogs()
    {
        $db = new Connection();
        $conn = $db->connect();
        $sql = "select * from log as l inner join combined_accounts as c on c.id = l.user_id ORDER BY l.id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    }

    private function createSqlView()
    {
        $db = new Connection();
        $conn = $db->connect();
        $sql = "CREATE OR REPLACE VIEW combined_accounts AS
        SELECT * FROM (
            SELECT u.id, n.firstname, n.middlename, n.lastname, n.email, n.nurse_type as role
            FROM users AS u
            INNER JOIN nurse AS n ON n.id = u.account_id
            WHERE u.user_type = 'nurse'
        ) AS nurse_accounts
        UNION
        SELECT * FROM (
            SELECT u.id, n.firstname, n.middlename, n.lastname, n.email, 'student' as role
            FROM users AS u
            INNER JOIN student AS n ON n.id = u.account_id
            WHERE u.user_type = 'student'
        ) AS student_accounts
        UNION
        SELECT * FROM (
            SELECT u.id, 'Admin' AS firstname, '' AS middlename, '' AS lastname, u.email, 'admin' as role
            FROM users AS u
            WHERE u.user_type = 'admin'
            LIMIT 1
        ) AS admin_account;;
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

if (isset($_POST['function'])) {

    $function = $_POST['function'];

    $log = new Log();
    switch ($function) {
        case 'addLog':
            $user_id = $_POST['user_id'];
            $log = $_POST['log'];
            $log->createLog($user_id, $log);
            break;
        case 'getLogs':
            $user_id = $_POST['user_id'];
            $log->getLogs($user_id);
            break;
    }
}
