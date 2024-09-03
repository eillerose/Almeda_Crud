<?php
include 'db.php';

if (isset ($_GET['id'])){
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE products SET
                name='$name',
                description='$description',
                price='$price',
                quantity='$quantity',
                updated_at=NOW()
                WHERE id=$id";

        if ($conn->query($sql) === TRUE){
            header("Location:index.php");
            exit();
         }else{
            echo "Error has been occured: " .$conn->error;
        }
    }else{
        $sql = "Select * from products where id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

}else{
    die("ID not found.");
}
?>

<form method="post" action="edit.php?id=<?php echo $id; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"required><br>
    Description: <input type="text" name="description" value="<?php echo $row['description']; ?>"><br>
    Price: <input type="text" name="price" value="<?php echo $row['price']; ?>"required><br>
    Quantity: <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>"required><br>
    <input type="submit" value="Update Product">
</form>