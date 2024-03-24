<?php
include("includes/config.php");
error_reporting(0);

function checkemail($useremail)
{
  include("includes/config.php");
  $sql = "SELECT email FROM agency WHERE email=:email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $useremail, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    return false;
  } else {
    return true;
  }
}


if ($_POST) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['phone'];
  $password = md5($_POST['password']);

  if (checkemail($email)) {

    $sql = "INSERT INTO agency(username,email,phone,password,date) VALUES (:username,:email,:mobile,:password, CURRENT_TIMESTAMP)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('Registration successfull);</script>";
      session_start();
      $_SESSION['user'] =  'admin';
      $_SESSION['admin_loggedin'] =  true;
      header("location:dashboard.php");
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
    }
  }
   else {
  echo "<script>alert('Email already exist,  Please try using another email.');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/sign_up.css">
  <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
  <link rel="stylesheet" href="css/signup.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

  <title>Document</title>
</head>

<body>

  <section class="sign-up-sec-new">
    <div class="sign-up-component">
      <div class="form container" id="signup-form">
        <form method="post">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
              Email address
            </label>
            <input name="email" type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
              Username
            </label>
            <input name="username" type="text" class="form-control" required aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
              Phone Number
            </label>
            <input name="phone" type="text" class="form-control" required aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
              password
            </label>
            <input name="password" type="password" class="form-control" required aria-describedby="emailHelp">
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-checkbox-input" id="exampleCheck1" required />
            <label class="form-checkbox-label" for="exampleCheck1">
              I agree your
              <a href="#" class="terms-conditions-links">Terms & Conditions</a>
            </label>
          </div>
          <button type="submit" class="btn btn-outline-secondary submit-btn-signup">
            Continue <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </button>
        </form>

      </div>
    </div>

  </section>


  <script src="https://kit.fontawesome.com/33d53d7cbd.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/script.js"></script>

</body>

</html>