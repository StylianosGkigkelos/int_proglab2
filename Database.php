<?php


class Database
{
    public $conn;
    protected $query;
    public $query_count = 0;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'proglab2', '3306');
        if ($this->conn->connect_error) {
            die('Failed to connect to MySQL - ' . $this->conn->connect_error);
        }
    }

    public function register($first_name, $last_name, $email, $password, $status) {
        // The query
        $sql = "SELECT * FROM Users WHERE email='$email' limit 1";
        // Execute query and save results.
        // mysqli's query() executes a single query meaning that it protects from sql injections.
        // This protection means that prepared statements are not necessary.
        $result = $this->conn->query($sql);
        $count = $result->num_rows;

        if ($count == 1) {
            echo("Email already exists");
            header("Location: register.php");
            exit();
        }

        $this->conn->autocommit(false);

        $query = "INSERT INTO Users (first_name, last_name, email, password, status)
            Values ('$first_name', '$last_name', '$email', '$password', '$status')";

        $result = $this->conn->query($query);
        session_start();
        if ($result) {
            $this->conn->commit();
            $_SESSION['status'] = 'success';
            header("Location: login.php?msg=Reg_success");
        } else {
            $this->conn->rollback();
            $_SESSION['status'] = 'danger';
            header("Location: register.php?msg=Reg_fail");
        }
    }

    public function login($email, $password) {
        //FIXME: hash doesnt work
        //$password = hash("sha256", $password.$email);
        $sql = "SELECT * FROM Users WHERE email='$email' AND password ='$password' LIMIT 1";
        $result = $this->conn->query($sql);
        $count = $result->num_rows;

        session_start();
        if ($count == 1) {
            $row = $result->fetch_assoc();
            $userid = $row['id'];
            $_SESSION['userid'] = $userid;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['userstatus'] = $row['status'];
            header("Location: index.php");
        } else {
            $_SESSION['status'] = 'danger';
            header("Location: login.php?msg=invalid_data");
            exit();
        }
    }

    public function contact($title, $message, $userid) {
        $this->conn->autocommit(false);
        $sql = "INSERT INTO contact (title, message, userid)
            VALUES ('$title', '$message', '$userid')";
        $result = $this->conn->query($sql);
        session_start();
        if ($result) {
            $this->conn->commit();
            $_SESSION['status'] = 'success';
            header("Location: index.php");
        } else {
            $this->conn->rollback();
            $_SESSION['status'] = 'danger';
            header("Location: index.php?msg=fail");
        }


    }

    public function getAllArticles(){
        $sql = "SELECT * FROM articles";
        $result = $this->conn->query($sql);

        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        if (isset($rows))
            return $rows;
        else
            return null;
    }


    public function getArticle($articleid) {
        $sql = "SELECT * FROM articles WHERE id = '$articleid'";
        $result = $this->conn->query($sql);
        $count = $result->num_rows;
        if ($count == 1 ) {
          $_SESSION['article'] = $result;
          header("Location: article.php");
          exit();
        }
    }

    public function getArticleByID($articleid) {
        $sql = "SELECT * FROM articles WHERE id = '$articleid'";
        $result = $this->conn->query($sql);
        $result = $result->fetch_assoc();
        if (isset($result)) {
            return $result;
        }
        return null;
    }

    public function getRacesByYear($year) {
        $sql = "SELECT * FROM races WHERE year = $year";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            // Append row to rows
            $rows[] = $row;
        }
        if (isset($rows))
            return $rows;
        else
            return null;
    }

    public function getUpcomingRaces(){
        $sql = "SELECT * FROM races WHERE isupcoming= TRUE";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            // Append row to rows
            $rows[] = $row;
        }
        if (isset($rows))
            return $rows;
        else
            return null;
    }

    public function getRaceFromID($raceid) {
        $sql = "SELECT * FROM races WHERE id = $raceid LIMIT 1";
        $result = $this->conn->query($sql);
        $result = $result->fetch_assoc();
        if (isset($result)) {
            return $result;
        }
        return null;
    }

    public function getStandingsFromRace($raceid) {
        $sql = "SELECT * FROM standings WHERE raceid = $raceid ORDER BY pos ASC";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        if (isset($rows))
            return $rows;
        else
            return null;
    }

    public function getDriverById($driverid) {
        $sql = "SELECT * FROM drivers WHERE id = $driverid LIMIT 1";
        $result = $this->conn->query($sql);
        $result = $result->fetch_assoc();
        if (isset($result)) {
            return $result;
        }
        return null;

    }

    public function getConstructor($constrID) {
        $sql = "SELECT name FROM constructors WHERE id = $constrID LIMIT 1";
        $result = $this->conn->query($sql);
        $result = $result->fetch_assoc();
        if (isset($result)) {
            return $result;
        }
        return null;
    }

    public function getRaceYears() {
        $sql = "SELECT DISTINCT year FROM races";
        $result = $this->conn->query($sql);
        $result = $result->fetch_assoc();
        if (isset($result))
            return $result;
        return null;
    }

    public function getAllPhotos() {
        $sql = "SELECT * FROM photos";
        $result = $this->conn->query($sql);

        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        if (isset($rows))
            return $rows;
        else
            return null;
    }

    public function addArticle($title, $message, $photo_source){
        $sql = "INSERT INTO articles (title, message, photo_source) 
                VALUES ('$title', '$message', '$photo_source') ";
        $result = $this->conn->query($sql);
        if ($result){
            header("Location: index.php?msg=success");
        }
        else {
            header("Location: index.php?msg=fail");
        }
    }

    public function addPhoto($photo_source, $category){
        $sql = "INSERT INTO photos (photo_source, category) 
                VALUES ('$photo_source', '$category') ";
        $result = $this->conn->query($sql);
        if ($result){
            header("Location: index.php?msg=success");
        }
        else {
            header("Location: index.php?msg=fail");
        }
    }


}
