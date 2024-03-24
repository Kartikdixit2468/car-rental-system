<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<script>alert('You're already logged in, No need to login again!');</script>";
    header("location:index.php");
    exit;
}
else if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true){
	header("location:/admin/dashboard.php");
	exit;
}

// Check if the session variable is set
if (isset($_SESSION['login-msg']) && $_SESSION['login-msg'] == true) {
    // Display a JavaScript alert
    echo '<script>alert("Please Login to your account first!");</script>';
    // Unset or clear the session variable to avoid showing the alert again on subsequent visits
    unset($_SESSION['login-msg']);
  }
  
if ($_POST) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT email,password,name FROM users WHERE email=:email and password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['user'] = $_POST['email'];
        // $_SESSION['name']=$results->FullName;
        $_SESSION['loggedin'] = true;
        $currentpage = 'index.php';
        echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    } else {

        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/sign_up.css">
    <link rel="stylesheet" href="assets/css/sign_in.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>

    <?php
    include('includes/header.php');
    ?>

    <section id="sign-in">
        <div id="ad">
            <div class="heading-signin">
                <p>Welcome Back,</p>
            </div>
            <div class="text-signin">
                <p>Sign-in to continue access page</p>
            </div>
        </div>
        <div id="form">
            <div class="login-box">
                <h2>Login</h2>
                <form method="POST" action="user_login.php">
                    <div class="user-box">
                        <input class="input-field-signin" type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <input class="input-field-signin" type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="continue-btn">
                        <button type="submit" id='continue-btn-inside'>
                            Continue <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                    <a href="admin/index.php">
                        <button type="button" class="btn agency-login-btn">Agency Login ?</button>
                    </a>
                </form>
            </div>
        </div>
    </section>

    <?
    include('includes/footer.php')
    ?>

    <?php
    include('includes/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>