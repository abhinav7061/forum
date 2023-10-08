<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iforum</title>
</head>
<!-- //INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('1', 'unable to install pyaudio.', 'I am not able to install pyaudio in the window.', '1', '0', '2023-05-07 13:18:47.000000'); -->

<body>
    <?php
    session_start();
    require 'templates/navbar.php';
    require 'templates/css.php';
    require 'templates/bodyshape.php';
    require 'templates/_dbconnect.php';
    ?>
    <?php
    $cat_id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE id = '$cat_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <!-- forum introduction div -->
    <div class="container my-4 d-flex justify-content-center">
        <div class="card-item px-4 py-4" style="min-width:100%">
            <h1 class="text-blue" style="font-size:26px;">welcome to
                <?php echo $row['title']; ?> forum<b class="text-success" style="font-size:12px;"> The current date and
                    time is
                    <?php
                    use \Datetime;

                    $now = new DateTime();
                    echo $now->format('Y-m-d H:i:s'); // MySQL datetime format
                    ?>
                </b>
            </h1>
            <p class="text-white">
                <?php echo $row['description']; ?>
            </p>
            <hr class="text-blue">
            <p class="text-white">This is a peer-to-peer Forum for sharing the knowledge of coding and programming
                languages</p>
            <button class="styleBtn styleBtn-pink btn" type="button">Example button</button>
        </div>
    </div> <!-- forum introduction div ends here-->
    <!-- div for the browse and ask Questions start from here -->
    <div class="container mb-4">
        <h1 class="text-danger text-decoration-underline">Browse Questions</h1>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <?php
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = '$cat_id';";
            $result = mysqli_query($conn, $sql);
            $nothread = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $nothread = false; ?>
                <!-- thread list starts from here -->
                <div class="d-flex align-items-center thread-item px-3 py-2 my-2" style="min-width:70%">
                    <div class="flex-shrink-0">
                        <img src="defult_user.jpeg" alt="..." class="rounded rounded-4" style="width:40px">
                    </div>
                    <div class="flex-grow-1 ms-3 text-white"> <a
                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="threads.php?threadid=<?php echo $row['thread_id']; ?>">
                            <h5 class="text-blue my-0">
                                <?php echo $row['thread_title']; ?>
                            </h5>
                        </a>
                        <?php echo substr($row['thread_desc'], 0, 140) . "...<br>";
                        $user_id = $row['thread_user_id'];
                        $sql = "SELECT * FROM `users` WHERE user_id ='$user_id';";
                        $run_query = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_assoc($run_query);
                        echo '<p class="text-success mb-0" style="font-size:10px;"><b>Posted by: ' . $rows['user_name'] . '</b></p>';
                        ?>
                    </div>
                </div> <!-- thread list end here -->
                <?php
            }
            // showing this if no threads found on the forum for this thread category
            if ($nothread) { ?>
                <div class="container my-4 d-flex justify-content-center">
                    <div class="thread-item px-4 py-4" style="min-width:80%">
                        <h1 class="text-blue" style="font-size:26px;">No Questions for this forum yet
                        </h1>
                        <hr class="text-blue">
                        <p class="text-success"><b>Be the first to ask the question</b></p>
                        <button class="styleBtn styleBtn-pink btn" type="button">Example button</button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <h1 class="text-danger text-decoration-underline my-2">Ask Questions</h1>
        <?php
        // inserting new threads into the databases
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['randcheck'] == $_SESSION['rand'] && isset($_SESSION['user_name'])) {
            $thread_title = htmlspecialchars($_POST['thread_title']);
            $thread_desc = htmlspecialchars($_POST['thread_desc']);
            $user_name = $_SESSION['user_name'];
            $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$thread_title', '$thread_desc', '$cat_id', '$user_id', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Successfully Uploaded your question!</strong> Hey you have asked = "' . $thread_title . '" and discription = "' . $thread_desc . '".
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>
        <div class="container my-4 d-flex justify-content-center">
            <div class="thread-item px-4 py-4" style="min-width:70%">
                <?php if (isset($_SESSION['user_name'])) { ?>
                    <form action="/forum/threadlist.php?catid=<?php echo $cat_id; ?>" method="post">
                        <?php
                        // $rand = rand();
                        $rand = time();
                        $_SESSION['rand'] = $rand;
                        ?>
                        <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
                        <div class="mb-3">
                            <label for="thread_title" class="form-label text-blue" style="font-size:18px"><b>Problem
                                    Title</b></label>
                            <input type="text" class="form-control" id="thread_title" aria-describedby="emailHelp"
                                name="thread_title" required>
                            <div id="emailHelp" class="form-text text-white">Keep your title as short as possible</div>
                        </div>
                        <div class="mb-3">
                            <label for="thread_desc" class="form-label text-blue" style="font-size:18px"><b>Discribe your
                                    problem</b></label>
                            <textarea class="form-control" id="thread_desc" rows="3" name="thread_desc" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php } else {
                    echo '<p class="text-success mb-0"><b>Login To Ask Question click here to <a class="text-blue " data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer;">Login</a>
                    </b></p>';
                }
                ?>
            </div>
        </div>
    </div><!-- div for the browse and ask Questions ends here -->
    <?php require 'templates/footer.php'; ?>
</body>

</html>