<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            padding: 50px;
            min-height: 80vh;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: rgb(245, 13, 90);
            font-size: 16px;
            border-radius: 15px;
            /*margin: 20px 10px !important;*/
            backdrop-filter: blur(10px) !important;
            background-color: rgba(33, 33, 78, 0.1) !important;
            box-shadow: 0px 0px 20px rgba(19, 2, 255, 0.438) !important;
            border-top: 1px solid rgba(21, 4, 255, 0.575) !important;
            border-left: 1px solid rgba(17, 1, 255, 0.568) !important;
            backdrop-filter: blur(5px) !important;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            color: #e5e5e5;
            background-color: #06cfb4;
        }

        tr:nth-child(even) {
            background-color: #06cfb4bb;
            ;
        }

        tr:hover {
            background-color: #028b79;
        }
    </style>
    <title>Forum Profile</title>
</head>

<body>
    <?php
    include 'templates/_dbconnect.php';
    include 'templates/navbar.php';
    include 'templates/bodyshape.php';
    session_start();
    $user_name = $_SESSION['user_name'];
    $sql = "SELECT * FROM `users` WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    ?>
    <div class="container d-flex justify-content-center align-item-center">
        <table>
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>
                        <?php echo $row['user_name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <?php echo $row['user_email']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <?php echo $row['user_password']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>
                        <?php echo $row['user_phone']; ?>
                    </td>
                </tr>
                <tr>
                    <th>D.O.B.</th>
                    <td>
                        <?php echo $row['user_dob']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <?php echo $row['user_gender']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>