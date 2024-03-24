<?php
include('includes/config.php');
session_start();
// error_reporting(0);
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    header("location:/admin/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

        <link rel="stylesheet" href="assets/css/table.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>RayBuy.com</title>
    </head>

<body>


    <?php
    include("includes/header.php");
?>

    <section class="booking-table">
        <div class="rows">

            <table>
                <tr>
                    <th>ID</th>
                    <th>vehicle_id</th>
                    <th>From Date Point</th>
                    <th>To Date</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>

<?php

    $username = $_SESSION['user'];
    $sql = "SELECT * from bookings WHERE username=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
    ?>

                <tr>
                    <th><?php echo htmlentities($result->id); ?></th>
                    <th><?php echo htmlentities($result->vehicle_id); ?></th>
                    <th><?php echo htmlentities($result->from_date); ?></th>
                    <th><?php echo htmlentities($result->to_date); ?></th>
                    <th><?php echo htmlentities($result->message); ?></th>
                    <th><?php echo htmlentities($result->status); ?></th>
                </tr>

        <?php
        }}
        ?>

            </table>
        </div>
        <div class="input-group-btn">
            <center>
                <a href="index.php"><button type="button" class="btn btn-danger"><b>Go back</b></button></a>
            </center>
        </div>
    </section>



    <?php
    include("includes/footer.php");
    ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>