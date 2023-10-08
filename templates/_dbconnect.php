<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpass = "";
$db = "forum";
$ab=4;
try {
    $conn = mysqli_connect($dbservername, $dbusername, $dbpass, $db);
    ?>
    <script>console.log("databse connected sucessfully")</script>
    <?php
} catch (Exception $e) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> Could not connect to database.' . $e->getMessage() . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
?>