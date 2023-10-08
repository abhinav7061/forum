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
    $threadid = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = '$threadid';";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="container my-4 d-flex justify-content-center">
            <div class="card-item px-4 py-4" style="min-width:100%">
                <h1 class="text-blue" style="font-size:26px;">
                    <?php echo $row['thread_title']; ?>
                </h1>
                <hr class="text-blue">
                <p class="text-white">
                    <?php echo $row['thread_desc']; ?>
                </p>
                <p class="text-success"><b>
                    <!-- Posted by: Abhi -->
                    <?php 
                            $user_id = $row['thread_user_id'];
                            $sql = "SELECT * FROM `users` WHERE user_id ='$user_id';";
                            $run_query = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($run_query);
                            echo "Posted by: " . $rows['user_name'];
                            ?>
                </b></p>
                <button class="styleBtn styleBtn-pink btn" type="button">Example button</button>
            </div>
        </div>
        <?php
    } ?>

    <!-- div for the browse and ask Questions start from here -->
    <div class="container mb-4">
        <h1 class="text-danger text-decoration-underline">Discussions</h1>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <?php
            $thread_id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE comment_thread_id = '$thread_id';";
            $result = mysqli_query($conn, $sql);
            $nothread = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $nothread = false; ?>
                <!-- thread comments starts from here -->
                <div class="d-flex align-items-center thread-item px-3 py-2 my-2" style="min-width:70%">
                    <div class="flex-shrink-0">
                        <img src="defult_user.jpeg" alt="..." class="rounded rounded-4" style="width:40px">
                    </div>
                    <div class="flex-grow-1 ms-3 text-white">
                        <!-- <a
                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="threads.php?threadid=<?php echo $row['thread_id']; ?>"> -->
                        <h6 class=" text-blue my-0">
                            <!-- User -->
                            <?php 
                            $user_id = $row['user_id'];
                            $sql = "SELECT * FROM `users` WHERE user_id ='$user_id';";
                            $run_query = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($run_query);
                            echo $rows['user_name'];
                            ?>
                        </h6>
                        <p class="mb-0">
                            <?php echo substr($row['comment_content'], 0, 140); ?> ...
                        </p>
                        <!-- </a> -->
                    </div>
                </div> <!-- thread comments end here -->
                <?php
            }
            // showing this if no threads found on the forum for this thread category
            if ($nothread) { ?>
                <div class="container my-4 d-flex justify-content-center">
                    <div class="thread-item px-4 py-4" style="min-width:80%">
                        <h1 class="text-blue" style="font-size:26px;">No Discussions for this thread yet
                        </h1>
                        <hr class="text-blue">
                        <p class="text-success"><b>Be the first persion to start discussions.</b></p>
                        <button class="styleBtn styleBtn-pink btn" type="button">Example button</button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <h1 class="text-danger text-decoration-underline my-2">Post a comment</h1>
        <?php
        // inserting new threads into the databases
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['randumcheck'] == $_SESSION['randum'] && isset($_SESSION['user_name'])) {
            $comment_content = htmlspecialchars($_POST['comment_content']);
            $thread_id = $_GET['threadid'];
            $user_name  = $_SESSION['user_name'];
            $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            // INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_thread_id`, `user_id`, `comment_time`) VALUES (NULL, 'As this is your first java problem so solve this  you can do it easily. and ask more questions.', '4', '0', '2023-05-11 17:32:11.000000');
            // $sql = "INSERT INTO `comments` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$thread_title', '$thread_desc', '$cat_id', '0', current_timestamp());";
            $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_thread_id`, `user_id`, `comment_time`) VALUES (NULL, '$comment_content', '$thread_id', '$user_id', current_timestamp());";
            $comment_uploaded = mysqli_query($conn, $sql);
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Successfully Uploaded your answer!</strong> Hey you have answered = "' . $comment_content . '"
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>
        <div class="container my-4 d-flex justify-content-center">
            <div class="thread-item px-4 py-4" style="min-width:70%">
                <?php if (isset($_SESSION['user_name'])) { ?>
                    <form action="/forum/threads.php?threadid=<?php echo $thread_id; ?>" method="post">
                        <?php
                        // $randum = randum();
                        $randum = time();
                        $_SESSION['randum'] = $randum;
                        ?>
                        <input type="hidden" value="<?php echo $randum; ?>" name="randumcheck" />
                        <div class="mb-3">
                            <label for="comment_content" class="form-label text-blue" style="font-size:18px"><b>Write Your
                                    Post</b></label>
                            <textarea class="form-control" id="comment_content" rows="3" name="comment_content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php } else {
                    echo '<p class="text-success mb-0"><b>Login To Be Able To Post click here to <a class="text-blue " data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer;">Login</a></button></b></p>';
                } ?>
            </div>
        </div>
    </div><!-- div for the browse and ask Questions ends here -->
    <?php require 'templates/footer.php'; ?>

</body>

</html>