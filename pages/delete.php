<?php
include "connect.php";
session_start();
if (isset($_SESSION["name"]) == false) {
    header("location:index.php");
    exit();
}
$slected=$_GET['id'];
$sql = "DELETE FROM books WHERE id=$slected";
$conn->exec($sql);
header("location:admin.php");
exit();
//echo $slected;
?>
