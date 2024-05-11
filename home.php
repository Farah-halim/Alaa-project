<?php
include "products_function.php";

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $image_name; // Specify the complete path where you want to save the image
    
    if(empty($name) || empty($price) || empty($image_name)) { // Check for empty image name
        echo 'Please fill out all fields';
    } 
    else {
        // Prepare the SQL statement using prepared statements to prevent SQL injection
        $insert = mysqli_prepare($conn, "INSERT INTO product (name, price, image) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($insert, "sss", $name, $price, $folder);
        
        if(mysqli_stmt_execute($insert)) {
            // Upload the image if the SQL insertion is successful
            if(!move_uploaded_file($tmp_name, $folder)) {
                echo 'Could not upload the image';
            }
        } 
        else {
            echo 'Could not add the product';
        }

        mysqli_stmt_close($insert); // Close the prepared statement
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>
   <link rel="stylesheet" href="home.css">

</head>
<body>
<div class="banner">
      <nav>
            <ul>
                  <li> <a href="website.html"> Home</a> </li>
                  <li> <a href="about.html"> About </a> </li>
                  <li> <a href="contact.html"> Contact Us </a> </li>
            </ul>
            <a href="logout.php" class="out">Log Out</a>
      </nav>
</div>

      <div class="container">
            <div class="admin-product-form-container">
                  <form action="home.php" method="post" enctype="multipart/form-data">
                        <h3> Add a new product</h3>
                        <input type="text" placeholder="Enter product name" name="name" class="box">
                        <input type="number" placeholder="Enter product price" name="price" class="box">
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
                        <input type="submit" class="btn" name="add" value="Add">
                  </form>
            </div>
      </div>

      <div class="product-display">
    <h1>Product Details</h1>
    <table class="product-display-table">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 
        $select = mysqli_query($conn, "SELECT * FROM product");
        while($row = mysqli_fetch_assoc($select)) {
        ?>
        <tr>
            <td><img src="<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
                <button class="edit"><a href="edit.php"> Edit </a> </button>
                <form action="delete.php" method="get">
                    <!-- Add a hidden input field to store the product ID -->
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button class="delete" name="delete"> Delete </button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
