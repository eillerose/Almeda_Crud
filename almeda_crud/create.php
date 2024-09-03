<form method="post" action="create.php">
    Name: <input type="text" name="name" required><br>
    Description: <input type="text" name="description"><br>
    Price: <input type="text" name="price" required><br>
    Quantity: <input type="text" name="quantity" required><br>
    <input type="submit" value="Submit">
</form>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (name, description, price, quantity, created_at, updated_at)
             VALUES ('$name', '$description', '$price', '$quantity', NOW(), NOW())";

    if ($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

