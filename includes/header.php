<?php
error_reporting(0);
?>
<header>
  <div class="head-logo logo">
    <img class="navbar-brand" src="assets/images/logo-removebg-preview.png" alt="logo" />
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="toggler">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="dropdown-menu dropdown-menu-end navbar-nav me-auto mb-2 mb-lg-0" aria-labelledby="navbarDropdown">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#cars-available">Available Cars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Contact</a>
          </li>
        </ul>
        <div class="profile-ico register-login-btn head-btn nav-btn-sign-in">
          <button>Sign In</button>
        </div>
      </div>
    </div>
  </nav>
  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
    <li class="nav-item dropdown head-btn-sign-in">
          <a class="nav-link dropdown-toggle" id="user-icon" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user"></i>
          </a>
          <ul class="dropdown-menu">
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="booked.php">Booked Cars</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            <li><hr class="dropdown-divider"></li>

          </ul>
        </li>
    <?php }
    else{
      ?>
      <div class="register-login-btn head-btn-sign-in">
      <a href="register.php"><button class="sign-up-btn">Sign up</button></a>
      <a href="user_login.php"><button class="sign-in-btn">Sign In</button></a>
    </div>
  
    <?php
    }
    ?>

</header>
<script src="https://kit.fontawesome.com/33d53d7cbd.js" crossorigin="anonymous"></script>
