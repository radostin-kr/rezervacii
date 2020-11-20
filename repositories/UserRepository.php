<?php
require_once dirname(dirname(__FILE__)). "/core/Db.php";
require_once ("UserRepository.php");

class UserRepository extends Db {
    function __constructor() {
        // TODO
    }

    public function addNewUser($first_name, $last_name, $email, $username, $password, $access) {
        $sql = "INSERT INTO user_credentials(id, first_name, last_name, email, username, password, access)
                VALUE (NULL, '".$first_name."', '".$last_name."', '".$email."', '".$username."', '".$access."', $password)";
        $this->connection->exec($sql);
        return true;
    }

    public function getUserCredentials($first_name, $last_name, $email, $username, $password, $access) {
        $stmt = $this->connection->prepare("SELECT 
                    * 
                FROM 
                    user_credentials
                WHERE
                    first_name = :first_name AND
                    last_name = :last_name AND
                    email = :email AND
                    username = :username AND
                    password = :password
                LIMIT 1");
        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":last_name", $last_name, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchAll();
        
        if (empty($user)) {
            return [];
        } else {
            return $user[0];
        }
    }
}