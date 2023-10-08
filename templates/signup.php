<?php
session_start();
include '_dbconnect.php';
$current_url = $_POST['current_url'];
$url = "/forum/index.php";
$signup = "false";
$error = "session did not match";
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['randomcheck'] == $_SESSION['randomcheck']) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['dob'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $error = "this email address is already in use";
        header("Location: $url?signup=false&error=$error");
        exit();
    }
    if ($password == $confirm_password) {
        try {
            $query = "INSERT INTO `users` (`user_id`,`user_name`,`user_email`, `user_password`, `user_phone`, `user_dob`, `user_gender`, `time`) VALUES (NULL, '$name', '$email', '$password', '$phone_number', '$dob', '$gender', current_timestamp());";
            $result = mysqli_query($conn, $query);
            $signup_time = time();
            header("Location: $url?signup=true&signup_time= $signup_time");
            exit();
        } catch (Exception $e) {
            $error = "error->" . $e->getMessage();
        }
    } else {
        $error = "passwords do not match";
    }
}
header("Location: $url?signup=false&error=$error");
session_destroy();
session_unset();
?>