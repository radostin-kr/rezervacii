<?php
require_once "Db.php";
require_once dirname(dirname(__FILE__)). "/repositories/UserRepository.php";

echo "<h1>Welcome page</h>";
/**
 * Class Authentication
 */
class Authentication {
    private $username;
    private $password;

    private $userRepository;

    function __construct() {
        $this->userRepository = new UserRepository();
    }

    /**
     * Login to the system
     * @param $usr
     * @param $pwd
     */
    public function login($usr, $pwd) {
        $this->username = $usr;
        $this->password = $pwd;

        $userFromDb = $this->userRepository->getUserCredentials($this->username, $this->password);

        if (!empty($userFromDb)) {
            $_SESSION["uid"] = $userFromDb["id"];
            header("Location: ../homepage.php");
        } else {
            header("Location: index.php");
        }
    }

    /**
     * Logout of the system
     */
    public function logout() {
        $_SESSION["uid"] = "";
        session_destroy();
        header("Location: index.php");
    }

    public function validToken($token) {
        return ($token === "abc1234");
    }
}