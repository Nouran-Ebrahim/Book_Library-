<?php
include "connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $pass = $_POST["pass"];
  $_SESSION["name"] = $name;
  $_SESSION["pass"] = $pass;
  $_SESSION["email"] = $email;
  $adminPassword = $conn->query("SELECT pass FROM admin_info ")->fetchAll(pdo::FETCH_COLUMN);  //one COLUMNS 
  $adminName = $conn->query("SELECT `name` FROM admin_info ")->fetchAll(pdo::FETCH_COLUMN);  //one COLUMNS 
  $email = $conn->query("SELECT `email` FROM admin_info ")->fetchAll(pdo::FETCH_COLUMN);  //one COLUMNS 
  if (isset($_SESSION["name"]) && isset($_SESSION["pass"]) && isset($_SESSION["email"])) {
    if ((in_array($_SESSION['name'], $adminName)) && (in_array($_SESSION['pass'], $adminPassword)) && (in_array($_SESSION['email'], $email))) {
      header("location:admin.php");
      exit();
    } else {
      echo '<script>alert("Your Password or Admin Name or Email is not correct")</script>';
      header("REFRESH:0.5;URL=check.php");
      exit();
    }
  } else {
    echo "no session";
    header("location:check.php");
    exit();
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Library</title>
  <link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
  <link rel='stylesheet' type='text/css' href='../css/style.css'>
  <link rel='stylesheet' type='text/css' href='../bootstrap-icons-1.7.2/bootstrap-icons.css'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Book Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link " aria-current="page" href="index.php">User</a>
          <a class="nav-link active" href="check.php">Admin</a>
        </div>
      </div>
    </div>
  </nav>
  <form class="row g-3 fr" method="POST" style="background-color: white;">
    <div class="col-md-6">
      <label for="formGroupExampleInput" class="form-label">Name</label>
      <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="please enter the admin name" required>
    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input name="email" type="email" placeholder="please enter the admin email" required class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Password</label>
      <input name="pass" type="password" placeholder="please enter the admin password" required class="form-control" id="inputPassword4">
    </div>


    <div class="col-12">
      <button type="submit" class="btn btn-primary bt" style="background-color: rgba(33,37,41,1);">Login</button>
    </div>
  </form>
  <div class="footer">

    <div class="created">
      Created By
    </div>
    <div class="name">
      Nouran Ebrahim El Mohamady
    </div>

    <div class="icon">
      <a href="https://www.linkedin.com/in/eng-nouran-el-mohamady/"><i class="fab fa-linkedin-in"></i></a>
    </div>




  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>