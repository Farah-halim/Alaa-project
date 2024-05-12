<?php
include "product_connection.php";

if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $update_query = "UPDATE product SET name='$name', price='$price' WHERE id='$id' ";
    $result = mysqli_query($conn, $update_query);
    
    if($result) {
        header('Location: product.php'); 
    } 
    else {
        echo 'Error updating product';
    }
} 
else {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($conn, $select_query);
    $data = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Product</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="admin-product-form-container">
        <form action="" method="post">
            <h3>Edit Product</h3>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="text" placeholder="Product Name" name="name" value="<?php echo $data['name']; ?>"  class="box">
            <input type="number" placeholder="Product Price" name="price" value="<?php echo $data['price']; ?>"  class="box">
            <input type="submit" class="btn" name="edit" value="Save">
            <a href="home.php" class="btn"> Cancel </a>
        </form>
    </div>
</div>
</body>
</html>
