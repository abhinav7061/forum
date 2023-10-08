<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iforum</title>
</head>
</head>

<body>
    <?php
    require 'templates/navbar.php';
    require 'templates/css.php';
    require 'templates/bodyshape.php';
    require 'templates/_dbconnect.php';
    ?>
    <!-- carousel starts from here -->
    <div id="carouselExampleCaptions" class="carousel-fade carousel Slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/random/1400x300?coding,mackbook" style="filter:brightness(0.7); height:40vh;"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1400x300/?coding,Gaming" style="filter:brightness(0.7); height:40vh;"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1400x300/?coding,Laptop" style="filter:brightness(0.7); height:40vh;"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="card-container">
        <!-- For the element of the background -->
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <!-- card items starts from here -->
        <?php
        try {
            $sql = "SELECT * FROM `category`";
            //code...
            $result = mysqli_query($conn, $sql);
            // $num_of_cards = 6;
            while ($row = mysqli_fetch_assoc($result)) {
                $cat_id = $row['id'];
                ?>
                <div class="card-item my-3 px-4 py-4">
                    <h3 class="text-blue"><i class="programming lang-<?php echo $row['title']; ?>"></i><a
                            href="threadlist.php?catid=<?php echo $cat_id; ?>" class="text-decoration-none"><?php echo $row['title']; ?></a> </h3>
                    <p class="card-text">
                        <?php echo substr($row['description'], 0, 100); ?> ...
                    </p>
                    <a href="threadlist.php?catid=<?php echo $cat_id; ?>">
                        <button class="styleBtn styleBtn-black">Read More</button>
                    </a>
                </div>
                <?php
                // $num_of_cards--;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
    <?php require 'templates/footer.php'; ?>
</body>

</html>