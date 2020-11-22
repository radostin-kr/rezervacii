<?php
echo "<h1>Book.me</h1>";
include_once dirname(__FILE__). "/html_files/signup.html";
require_once dirname(__FILE__). "/repositories/UserRepository.php";

$userRepository = new UserRepository();
if (!empty($_POST) &&
    isset($_POST["first_name"]) &&
    !empty($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    !empty($_POST["last_name"]) &&
    isset($_POST["email"]) &&
    !empty($_POST["email"]) &&
    isset($_POST["username"]) &&
    !empty($_POST["username"]) &&
    isset($_POST["password"]) &&
    !empty($_POST["password"]))
    // isset($_POST["confirm_password"]) &&
    // !empty($_POST["confirm_password"]))
{
    $userRepository = new UserRepository();

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = hash("sha512", $password);
    // $confirm_password = $_POST["confirm_password"];
    // $hashedPassword = hash("sha512", $confirm_password);
    print_r($first_name);
    print_r($last_name);
    print_r($email);
    print_r($username);
    print_r($password);
    // print_r($confirm_password);
    if ($userRepository->addNewUser($first_name, $last_name, $email, $username, $hashedPassword)) {
        header("Location: welcome.php");
    }
}


// require_once dirname(__FILE__). "../signup.html";