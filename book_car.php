<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    header("location:/admin/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sign_up.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/bookingpage.css">
    <title>Document</title>
</head>

<body>

    <?php
    include("includes/header.php");



    $vhid = intval($_GET['vhid']);
    $sql = "SELECT *  from tbcars where id=:vhid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_INT);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $car) {
    ?>

            <section class="car-section">
                <div class="car-details">

                    <div class="car-image">
                        <img src="admin\img\vehicleimages\<?php echo $car->vimg ?>" alt="car">
                    </div>
                    <div class="text-car">
                        <div class="group">
                            <div class="car-item car-model">
                                <H3>MODEL: </H3>
                                <H5><?php echo $car->model ?></H5>
                            </div>
                            <div class="car-item car-number">
                                <H3>NUMBER: </H3>
                                <H5><?php echo $car->veh_number ?></H5>
                            </div>
                        </div>
                        <div class="group">
                            <div class="car-item car-seats">
                                <H3>SEATS: </H3>
                                <H5><?php echo $car->seats ?></H5>
                            </div>
                            <div class="car-item car-rent">
                                <H3>RENT/DAY: </H3>
                                <H5><?php echo $car->rent ?>$</H5>
                            </div>
                        </div>
                    </div>

                </div>

        <div class="card book-form container">
            <div class="card-header">
                <h2>Input User</h2>
            </div>
            <div class="card-body">
                <form method="post" action="book_car.php">
                    <label for="email">From:</label>
                    <input type="text" id="email" placeholder="From Date(dd/mm/yyyy)" name="fromdate" required>

                    <label for="phone">To:</label>
                    <input type="text" id="phone" placeholder="To Date(dd/mm/yyyy)" name="todate" required>

                    <label for="name">Message:</label>
                    <input type="text" placeholder="message" id="name" name="message" required>

                    <input type="hidden" name="car-id" value="<?php echo $vhid ?>" required>


                    <div class="card-footer">
                        <button type="submit" class=" btn btn-danger book-btn">Book</button>
                    </div>

                </form>
            </div>

        </div>

            </section>
            <?php
        }
    }
        ?>
            <?php

            if ($_POST) {

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                    $username = $_SESSION['user'];
                    $fromdate = $_POST['fromdate'];
                    $todate = $_POST['todate'];
                    $message = $_POST['message'];
                    $veh_id = $_POST['car-id'];
                    $sql = "INSERT INTO bookings (username, vehicle_id, from_date, to_date, message, status) VALUES (:username,:vehicle_id,:fromdate,:todate, :message, 'pending')";

                    $query = $dbh->prepare($sql);
                    $query->bindParam(':username', $username, PDO::PARAM_STR);
                    $query->bindParam(':vehicle_id', $veh_id, PDO::PARAM_STR);
                    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
                    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
                    $query->bindParam(':message', $message, PDO::PARAM_STR);
                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();
                    if ($lastInsertId) {
                        // Once the task is successfully completed, set a session variable
                        $_SESSION['task_success'] = true;

                        // Redirect the user to another route
                        header("Location: index.php");
                        exit; // Make sure to exit after the redirect
                    } else {
                        echo "<script>alert('Something went wrong. Please try again');</script>";
                    }
                } else {
                    $_SESSION['login-msg'] = true;

                    header("Location: user_login.php");

                }
            }

            ?>


</body>

</html>