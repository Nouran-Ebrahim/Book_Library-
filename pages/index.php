<?php
include "connect.php";

//print_r($book_search);
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

<body >
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Book Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">User </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="check.php">Admin</a>
                    </li>

                </ul>
                <form method="post" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="book_name" required>
                    <button name="search" class="btn btn-outline-success bt" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <?php
    if (isset($_POST["search"])) {
        $input = $_POST['book_name'];
        $book_search = $conn->query("SELECT * FROM books WHERE 	title LIKE '%" . $input . "%'")->fetchAll(PDO::FETCH_ASSOC);
        if (count($book_search) === 0) {
            echo '<script>alert("No Matched TITLE of the book")</script>';
            header("REFRESH:0.01;URL=index.php");
        } else {
    ?>
            <div class="table_des" style="height: 15em">
                <table class="table table-bordered tb" >
                    <thead>
                        <tr>

                            <th scope="col">Number.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Auther Name</th>
                            <th scope="col">Edition</th>
                            <th scope="col">Submission Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($book_search as $dataa) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $dataa['number'] ?></td>
                                <td><?php echo $dataa['title'] ?></td>
                                <td><?php echo $dataa['auther'] ?></td>
                                <td><?php echo $dataa['edition'] ?></td>
                                <td><?php echo $dataa['submission'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    <?php
        $input = "";
    } else {
        $books = $conn->query("SELECT * FROM books")->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div class="table_des">
            <table class="table table-bordered tb" >
                <thead>
                    <tr>

                        <th scope="col">Number.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Auther Name</th>
                        <th scope="col">Edition</th>
                        <th scope="col">Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($books as $data) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $data['number'] ?></td>
                            <td><?php echo $data['title'] ?></td>
                            <td><?php echo $data['auther'] ?></td>
                            <td><?php echo $data['edition'] ?></td>
                            <td><?php echo $data['submission'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    <?php
    }
    ?>
    </div>

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

    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>