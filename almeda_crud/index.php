<?php
include 'db.php';

$sql = "select * from products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h2> Products List</h2>
    <button onclick="window.location.href='create.php';">Add New Product</button>
    
    <?php if ($result->num_rows > 0): ?>
        <table border='1'>
            <tr> 
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["created_at"]; ?></td>
                    <td><?php echo $row["updated_at"]; ?></td>

                    <td>
                        <a href='view.php?id=<?php echo $row["id"]; ?>'>View</a>
                        <a href='edit.php?id=<?php echo $row["id"]; ?>'>Edit</a>
                        <a href='delete.php?id=<?php echo $row["id"]; ?>'>Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table> 
    <?php else: ?>
        <p> No result found.</p>
    <?php endif; ?>
<?php $conn->close(); ?>
</body>
</html>