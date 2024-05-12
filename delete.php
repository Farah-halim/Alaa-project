<?php 
include "product_connection.php";

if(isset($_GET ['delete'] )){
    $id =  $_GET ['id'] ;
    $delete_query = " DELETE FROM product WHERE id = '$id' ";
    
    if( mysqli_query($conn, $delete_query) ) {
        header('Location: product.php');
    } 
    else {
        echo "Failed to delete ";
    }
}
?>
