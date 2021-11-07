<?php 
  require("Connection.php");
 
  $sql = "SELECT * FROM products WHERE product_id='".$_POST['id']."'";
  $query = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($query);
  $q = $row['stock'] - $_POST['s'];
  $sql = "UPDATE products SET stock = $q WHERE product_id='".$_POST['id']."' ";
  $query = mysqli_query($conn,$sql);

   
 ?>

