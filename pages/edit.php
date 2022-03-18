<?php
include "connect.php";
session_start();
if (isset($_SESSION["name"]) == false) {
    header("location:index.php");
    exit();
}
$slected = $_GET['id'];
$stm = $conn->query("SELECT * FROM books WHERE id = $slected");
$row = $stm->fetch();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = trim($_POST['number']);
    $title = trim($_POST['title']);
    $auther =trim( $_POST['auther']);
    $edion = trim($_POST['edion']);
    $submission = trim($_POST['submission']);
    $update = " UPDATE books
    SET `number` = '$num'
    ,`title` = ' $title'
    ,`auther` = ' $auther'
    ,`edition` = '$edion'
    ,`submission` = ' $submission'
    WHERE `id` ='$slected'";
    $conn->exec($update);
    header("location:admin.php");
    exit();
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
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Book Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Hello <?php echo $_SESSION["name"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Add Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LogOut</a>
                    </li>
                </ul>
                <form method="post" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="book_name" required>
                    <button name="search" class="btn btn-outline-success bt" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <form class="row g-3 fr" method="POST" style="background-color: white;">
        <div class="col-md-6">
            <label for="formGroupExampleInput" class="form-label">Number</label>
            <input type="number" name="number" value="<?php echo $row['number']; ?>" class="form-control" id="formGroupExampleInput" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Title</label>
            <input type="text" value="<?php echo $row['title']; ?>" name="title" required class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Auther</label>
            <input type="text" value="<?php echo $row['auther']; ?>" name="auther" required class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
            <label class="form-label">Edition</label>
            <input type="text" value="<?php echo $row['edition']; ?>" name="edion" required class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Submission Date</label>
            <input type="number" value="<?php echo $row['submission']; ?>" name="submission" required class="form-control">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary bt" style="background-color: rgba(33,37,41,1);">Edit</button>
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