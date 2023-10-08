<!DOCTYPE html>
<html lang="en">
<?php 
require '_dbconnect.php';
session_start();
function getFirstLetters($sentence)
{
    $words = explode(" ", $sentence); // Split the sentence into words

    $firstLetters = array_map(function ($word) {
        return substr($word, 0, 1); // Get the first letter of each word
    }, $words);

    return implode("", $firstLetters); // Join the first letters into a string
}
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    $loggedin = true;
    $user_profile = getFirstLetters($user_name);
} else {
    $loggedin = false;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation bar design usign html & css & javascript</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>
    <!-- <link rel="stylesheet" href="navcss.php"> -->
    <?php require 'css.php'; ?>
</head>

<body>
    <!--Signup Modal -->

    <!--Login Modal -->
    <?php
    include 'loginModal.php';
    include 'signupModal.php';
    ?>
    <header class="header-area">
        <div class="header-container">
            <div class="site-logo">
                <a href="/forum">Coder<span>Abhi</span></a>
            </div>
            <div class="mobile-nav">
                <i class="fas fa-bars"></i>
            </div>
            <div class="site-nav-menu">
            <ul class="primary-menu">
                    <!--<li><a href="/" class="active">Home</a></li>
                     <li><a href="#">About</a></li>
                    <li><a href="#">Works</a></li>   <?php if ($selected == "profile") echo 'class="active"'; ?>-->
            <?php  
             $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
            ?>
                    <li><a href="/forum" <?php if ($curPageName == "index.php") echo 'class="active"'; ?>>Home</a></li>
                    <li><a href="/forum/codingContest.php" <?php if ($curPageName == "codingContest.php") echo 'class="active"'; ?>>Coding_Contest</a></li>
                    <li><a href="/forum/contact.php" <?php if ($curPageName == "contact.php") echo 'class="active"'; ?>>Contact</a></li>
                    <li style="cursor: pointer;">
                        <a data-bs-toggle="dropdown" aria-expanded="false"  title="click to see categories" <?php if ($curPageName == "threadlist.php" || $curPageName =="threads.php") echo 'class="active"'; ?>>Category</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <?php
                            try {
                                $sql = "SELECT * FROM `category` LIMIT 7";
                                $result = mysqli_query($conn, $sql);
                                $num_of_row = mysqli_num_rows($result);
                                $count = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $count++;
                                    $cat_id = $row['id'];
                                    ?>
                                    <li  title="click to read about <?php echo $row['title']; ?>"><a class="dropdown-item py-0" href="threadlist.php?catid=<?php echo $cat_id; ?>">
                                    <i class="mx-2 programming lang-<?php echo $row['title']; ?>"></i><?php echo $row['title']; ?>
                                        </a></li>
                                    <?php
                                    if ($num_of_row>$count) {
                                        echo '<hr class="my-2">';
                                    }
                                }
                            } catch (Exception $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <div class="search-form">
                            <form class="search" role="search" method="get" action="search.php">
                                <input type="search" class="searchinput" placeholder="<?php if (isset($_GET['search']) && $_SERVER['PHP_SELF'] == "/forum/search.php") {
                                    echo $_GET['search'];
                                } else {
                                    echo 'Search';
                                } ?>" name="search" minlength="2" required>
                                <!-- <button class="search_btn"><i id="searchicon" class="fa fa-search ga-fp"></i></button> -->
                                <div class="vertical-line"></div>
                                <button id="searchicon" class="fa fa-search ga-fp"></button>
                                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button> -->
                            </form>
                        </div>
                    </li>
                    <!-- <div class="dropdown border-top">
                        <a href="#"
                            class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="24"
                                height="24">
                        </a>
                        <ul class="dropdown-menu text-small shadow" style="">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div> -->
                    <?php
                    if ($loggedin) {
                        echo '<li style="cursor: pointer;" title="click to see your profile">
                                    <button type="button" class="user_profile" data-bs-toggle="dropdown"
                                    aria-expanded="true"><a class="text-white text-decoration-none">' .
                            $user_profile . '</a></button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item active text-center" href="#">' . $user_name . '</a></li>
                                        <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                                        <li><a class="dropdown-item" href="templates/update_profile.php">Update Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                        <li><a class="dropdown-item" href="templates/logout.php">Logout</a></li>
                                        </li>
                                    </ul>
                              </li>
                              ';
                    } else {
                        echo '<li>
                                    <input type="button" value="Login" class="styleBtn styleBtn-pink" data-bs-toggle="modal"
                                        data-bs-target="#loginModal">
                                </li>
                                <li>
                                    <input type="button" value="Signup" class="styleBtn styleBtn-pink" data-bs-toggle="modal"
                                        data-bs-target="#signupModal">
                                </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- <center>
            <div class="buttons">
                <input type="button" value="Login" class="styleBtn">
                <input type="button" value="Register" class="styleBtn">
            </div>
        </center> -->
    </header>

    <?php
    $logedin_time = time();
    if (isset($_GET['signup']) && $_GET['signup'] == "true" && $_SESSION['signup_time'] == $logedin_time) {
        echo '<div class="px-3 mt-3"><div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Successfully Signup!</strong> click here to <a class="text-blue " data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
    }
    if (isset($_GET['login']) && $_GET['login'] == "true" && $_GET['login_time'] == $logedin_time) {
        echo '<div class="px-3 mt-3"><div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Successfully Login!</strong> at '.$logedin_time . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
    }
    if (isset($_GET['signup']) && $_GET['signup'] == "false") {
        echo '<div class="px-3 mt-3 alert alert-dismissible fade show" role="alert"><div class="alert-danger">
            <strong>Signup Failed!</strong> Because of ' . $_GET['error'] . ' click here to <a class="text-blue " data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
    }
    if (isset($_GET['login']) && $_GET['login'] == "false") {
        echo '<div class="px-3 mt-3"><div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failed!</strong> Because of ' . $_GET['error'] . ' click here to <a class="text-blue " data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".mobile-nav i").click(function () {
                $(".site-nav-menu").toggleClass("mobile-menu");
            });
        });
    </script>
</body>

</html>