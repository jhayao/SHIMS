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
        //enable log
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // ini_set('error_log', 'error.log');
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
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

    public function getLogs($user_id)
    {
        $db = new Connection();
        $conn = $db->connect();
        $sql = "SELECT * FROM log  ORDER BY created_at DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
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
