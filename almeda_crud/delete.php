<?php
include 'db.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location:index.php");
    } else{
        echo "There is an error deleting records" .$conn->error;
    }
    $conn->close();
}else{
    die("ID not found.");
}
?>