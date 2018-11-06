<?php
require_once 'KLogger.php';
date_default_timezone_set('America/Denver');

class Dao {

    private $host = "us-cdbr-iron-east-01.cleardb.net";
    private $db = "heroku_1d0943612eadba3";
    private $user = "b7d31b12435278";
    private $pass = "ade1cdb5";
    private $log;

    public function __construct () {
        $this->log = new KLogger("log.txt", KLogger::INFO);
    }

    public function getConnection () {
        try {
            $conn= new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
        } catch (Exception $e) {
            $this->log->LogFatal($e);
        }
        return $conn;
    }

    public function checkDuplicateUser($username, $email) {
        try {
            $conn = $this->getConnection();
            $sql = "SELECT 1 FROM users WHERE username= :username and email= :email";
            $q = $conn->prepare($sql);
            $q->bindParam(":username", $username);
            $q->bindParam(":email", $email);
            $q->execute();
            if($q->rowCount() == 1) {
                return 1;
            } else if ($q->rowCount() > 1) {
                echo "<script type='text/javascript'>alert('Duplicates in DB');</script>";
                exit;
            }
        } catch (Exception $e) {
            $this->log->LogFatal($e);
        }
        return 0;
    }

    public function userExists($username, $password) {
        try{
            $conn = $this->getConnection();
            $hash = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
            $sql = "SELECT 1 FROM users WHERE username= :username and password= :hash";
            $q = $conn->prepare($sql);
            $q->bindParam(":username", $username);
            $q->bindParam(":hash", $hash);
            $q->execute();
            if ($q->rowCount() == 1) {
                $this->log->LogInfo("User logged in:[{$username}] [" . date("Y-m-d h:i:s A"). "]");
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            $this->log->LogFatal($e);
        }
        return 0;
    }

    public function createUser ($username, $email, $password) {
        $this->log->LogInfo("User created:[{$username}] [{$email}] [" . date("Y-m-d h:i:s A"). "]");
        $conn = $this->getConnection();
        $hash = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
        $saveQuery =
            "INSERT INTO users 
            (username, email, password)
            VALUES
            (:username, :email, :hash)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $q->bindParam(":email", $email);
        $q->bindParam(":hash", $hash);
        $q->execute();
    }

    public function getProjects ($user) {
        $this->log->LogDebug("Getting {$user}'s projects");
        $conn = $this->getConnection();
        $sql = "select * from project where collaborators like concat('%', :user, '%')";
        $q = $conn->prepare($sql);
        $q->bindParam(":user", $user);
        $q->execute();
        // For the moment get what we have in the user's table, need to get some dummy projects in the projects table
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMyProjects ($user) {
        $this->log->LogDebug("Getting {$user}'s projects");
        $conn = $this->getConnection();
        $sql = "select * from project where project_ID = (select ID from users where username = :user) order by ID;";
        $q = $conn->prepare($sql);
        $q->bindParam(":user", $user);
        $q->execute();
        // For the moment get what we have in the user's table, need to get some dummy projects in the projects table
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSharedProjects ($user) {
        $this->log->LogDebug("Getting shared projects");
        $conn = $this->getConnection();
        $sql = "select * from project where collaborators like concat('%', :user, '%') and project_owner != :user;";
        $q = $conn->prepare($sql);
        $q->bindParam(":user", $user);
        $q->execute();
        // For the moment get what we have in the user's table, need to get some dummy projects in the projects table
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}