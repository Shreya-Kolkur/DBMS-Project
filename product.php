<?php
    require("Connection.php");
    session_start();
    $admin = $_SESSION['adminuser'];
    if(isset($_POST['submit'])){
      $product_id = $_POST['product_id'];
      $name = $_POST['name'];
      $stock = $_POST['stock'];
      $catg_id = $_POST['catg_id'];
      $price = $_POST['price'];

      $sql = "INSERT INTO `products` (product_id, name, stock, price, catg, updated_by) VALUES ('$product_id', '$name','$stock','$price', '$catg_id', '$admin')";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("location: display_product.php");
      }
      else{
        die(mysqli_error($conn));
      }

    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Information of Products</title>
  </head>
  <body>
    <div class="container my-5">
    <form class="row g-3" method ="post">
  <div class="col-md-6">
    <label class="form-label">Product id</label>
    <input type="text" class="form-control" name="product_id" placeholder="product_id">
  </div>
 
  <div class="col-12">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
  </div>
  <div class="col-12">
    <label class="form-label">Stock</label>
    <input type="text" class="form-control" name="stock" placeholder="stock">
  </div>
  <div class="col-12">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" name="price" placeholder="Price">
  </div>
  <div class="col-md-6">
    <label class="form-label">Category</label>
    <input type="text" class="form-control" name="catg_id" placeholder="Category">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
</form>
    </div>

   
  </body>
</html>
