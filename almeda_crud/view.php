<?php
include 'db.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id=$id";
    $result=$conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else{
        die("There is an error founding records");
    }
}else{
    die("ID not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
</head>
<body>
    <h2>View Product</h2>
    <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
    <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
    <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
    <p><strong>Quantity:</strong> <?php echo $row['quantity']; ?></p>
    <p><strong>Created At:</strong> <?php echo $row['created_at']; ?></p>
    <p><strong>Updated At:</strong> <?php echo $row['updated_at']; ?></p>
    <button onclick="window.location.href='index.php';">Back to List</button>
</body>
</html>

<?php $conn->close() ?>