<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Programming Contests App JavaScript</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
<?php
require 'templates/navbar.php';
require 'templates/css.php';
require 'templates/bodyshape.php';
require 'templates/_dbconnect.php';
?>
    <!-- <div class="container my-4 d-flex justify-content-center"> -->
        <div class="contest-card p-4 m-3" style="min-width:90%">
            <h1 style="color:blue;text-align:center;">
                <big>
                    <h1 class="display-4">Coding Contests is held by Us with the collaboration of following company</h1>
                </big>
            </h1>
            <p class="text-white" style="font-size:18px;">This is a place, where you can see the currently happening coding contest on various platform. You can participate into that contest. </p>
            <hr class="my-4">
            <p class="text-white">I hope this will be helpfull for you.</p>
            <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
        </div>
    <!-- </div> -->


        <div id="cardContainer" class="d-flex flex-wrap p-5" style="justify-content: center;">

        </div>


    <script src="script.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
        <?php require 'templates/footer.php'; ?>
</body>

</html>