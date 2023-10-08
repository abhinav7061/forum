<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iforum</title>
    <style>
        .container {
            min-height: 81vh;
        }
    </style>
</head>
</head>

<body>
    <?php
    require 'templates/_dbconnect.php';
    require 'templates/navbar.php';
    require 'templates/css.php';
    require 'templates/bodyshape.php';
    ?>

    <div class="container d-flex align-items-center flex-column py-4">
        <!-- card items starts from here -->
        <?php
        $search = $_GET['search'];
        try {
            $sql = "SELECT * FROM `threads` WHERE match (thread_title, thread_desc) against ('$search')";
            //code...
            $result = mysqli_query($conn, $sql);
            $nothread = true;
            // $num_of_cards = 6;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($nothread) { ?>
                    <div class="thread-item px-4 py-3 mb-4" style="min-width:80%">
                        <h1 class="text-blue" style="font-size:26px;">The Results for the "<i class="text-danger"><?php echo $search . " "; ?>
                            </i> " is given below.
                        </h1>
                        <hr class="text-blue">
                        <p class="text-success mb-0"><b>Read it out</b></p>
                    </div>
                    <?php
                }
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
                <div class="thread-item px-4 py-4" style="min-width:80%">
                    <h1 class="text-blue" style="font-size:26px;">No Results founds for the "<i class="text-danger"><?php echo $search . " "; ?>
                        </i> ".
                    </h1>
                    <hr class="text-blue">
                    <p class="text-success"><b>Try to search another keywords</b></p>
                </div>
                <?php
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
    <?php require 'templates/footer.php'; ?>
</body>

</html>