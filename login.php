<?php
session_start();

require_once("user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = User::getUserByUsername($username);
    if ($user && $user->password === $password) {
        $_SESSION["user"] = $user;
        header("Location: list_nhanvien.php"); 
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>