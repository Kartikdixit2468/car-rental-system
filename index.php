<?php
session_start();
include('includes/config.php');

if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
  header("location:admin/dashboard.php");
  exit;
}

// Check if the session variable is set
if (isset($_SESSION['task_success']) && $_SESSION['task_success'] == true) {
  // Display a JavaScript alert
  echo '<script>alert("Your Car Booked Successfully!");</script>';
  // Unset or clear the session variable to avoid showing the alert again on subsequent visits
  unset($_SESSION['task_success']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Document</title>
</head>

<body>

  <?php
  include('includes/header.php');
  ?>

  <section id="home">
    <div class="text-content left-content">
      <h1><span>Looking</span> to rent a car ?</h1>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit labore
        harum ab asperiores praesentium unde porro cum hic magni iure
        assumenda quod et atque nesciunt?
      </p>
      <div class="car-rent-btn">
        <button type="button" class="btn btn-warning">Ride Now</button>
      </div>
    </div>

    <div class="car-ui-design right-content">
      <div class="rectangle-car-background"></div>
      <img id="car-image-home-sec" src="assets/images/image (1).png" alt="" />
    </div>
  </section>


  <section id="cars-available">
    <div class="heading">Available Cars</div>
    <div class="car-card-holder">



      <?php
      $sql = "SELECT * FROM tbcars";

      // Prepare the statement
      $stmt = $dbh->prepare($sql);

      // Execute the statement
      $stmt->execute();

      // Fetch all rows as an associative array
      $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Output the fetched rows
      foreach ($cars as $car) {      ?>

        <div class="product-card">
          <a href="book_car.php?vhid=<?php echo htmlentities($car['id']); ?>" class="product-tumb">
            <img src="admin\img\vehicleimages\<?php echo $car['vimg'] ?>" alt="">
          </a>
          <div class="product-details">
            <span class="product-catagory"><?php echo $car['model'] ?></span>
            <h4><a>Veh. No. : <?php echo $car['veh_number'] ?> || No. of seats : <?php echo $car['seats'] ?></a></h4>
            <div class="product-bottom-details">
              <div class="product-price"><?php echo $car['rent'] ?>$</div>
              <div class="product-links">
                <a href="#"><i class="fa fa-heart"></i></a>
              </div>
            </div>
          </div>
        </div>

      <?php  }

      ?>


    </div>
  </section>

  <?php
  include('includes/footer.php');
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/script.js"></script>
</body>

</html>