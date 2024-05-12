<?php
include "product_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" href="styles/product.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     
</head>

<body>
<div class="banner">
            <nav>
                <p>SHOP FOR YOU</p>
                <ul>
                    <li> <a href="index1.php"> Home</a> </li>
                    <li> <a href="product.php"> Our Products</a> </li>
                </ul>
                   <a href="logout.php" class="out">Log Out</a>
            </nav>
</div>

      <div class="product-display">
             <h1>Our Products</h1>
             <table class="product-table" >
                  <thead>
                        <tr>
                              <th> <u>Product ID</u></th>
                              <th> <u>Product Image</u></th>
                               <th><u>Product Name</u></th>
                               <th><u>Product Price</u></th>
                               <th><u>Action</u></th>
                        </tr>
                  </thead>
<?php 
      $select = mysqli_query($conn, "SELECT * FROM product");

while($row = mysqli_fetch_assoc($select)) { 
        ?>
      <tr>
            <td>     <?php echo $row ['id']; ?>  </td>
            <td> <img src=" <?php echo $row ['image']; ?>"  height="100" ></td>
            <td>    <?php echo $row ['name']; ?>  </td>
            <td> $  <?php echo $row ['price']; ?> </td>

            <td>
                  <form action="edit.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $row ['id']; ?>">
                        <button class="edit" name="edit"> Edit </button>
                  </form>
                  
                  <form action="delete.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $row ['id']; ?>">
                        <button class="delete" name="delete"> Delete </button>
                  </form>
                  
            </td>
      </tr>
<?php 
} ?>
</table>
</div>

</body>
</html>
