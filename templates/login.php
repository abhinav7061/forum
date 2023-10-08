<?php
include '_dbconnect.php';
$url = "/index.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email' AND `user_password` = '$password'";
    try {
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            session_start();
            $login_time = time();
            $row = mysqli_fetch_array($result);
            $_SESSION['user_name'] = $row['user_name'];
            header("Location: $url?login=true&login_time=$login_time");
            $logedin_time=Null;
            exit();
        } else {
            $error = "wrong credentials";
        }
    } catch (Throwable $th) {
        $error = $th->getMessage();
    }
}
header("Location: $url?login=false&error=$error");
?>