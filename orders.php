<?php
    require("Connection.php");
    session_start();
    $admin = $_SESSION['adminuser'];
    $product_id = 0;
    $name = 0;
    $price = 0;
    $catg_id = 0;
    if(isset($_POST['submit2'])){
      $product_id = $_POST['product_id'];
      $sql = "SELECT * FROM `products` WHERE product_id = $product_id ";
      $result = mysqli_query($conn, $sql);
      $row_cnt = mysqli_num_rows($result);
      if($row_cnt == 1){
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $catg_id = $row['catg'];
        $price = $row['price'] - $row['price']*15/100;
      }
    }
    if(isset($_POST['submit'])){
      $product_id = $_POST['product_id'];
      $name = $_POST['name'];
      $no_of_items = $_POST['no_of_items'];
      $catg_id = $_POST['catg_id'];
      if($no_of_items and $no_of_items > 0){
        $price = $_POST['price']* $no_of_items;
      }
      else{
          $price = 0;
      }
      
      

      $sql = "INSERT INTO `orders` (product_id, no_of_items, tot_price, placed_by) VALUES ('$product_id','$no_of_items','$price', '$admin')";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("location: display_order.php");
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

    <title>Information of Order</title>
  </head>
  <body>
    <div class="container my-5">
    <form class="row g-3" method ="post">
  <div class="col-md-6">
    <label class="form-label">Product id</label>
    <input type="text" class="form-control" name="product_id" placeholder="product_id" value=<?php if($product_id){echo $product_id;}; ?>>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit2">Search</button>
  </div>
 
  <div class="col-12">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name" value=<?php if($name){echo $name;}; ?>>
  </div>
  <div class="col-12">
    <label class="form-label">Number of items to be ordered
    </label>
    <input type="text" class="form-control" name="no_of_items" placeholder="Number of items to be ordered">
  </div>
  <div class="col-12">
    <label class="form-label">Price of each item</label>
    <input type="text" class="form-control" name="price" placeholder="Price" value=<?php if($price){echo $price;}; ?>>
  </div>
  <div class="col-md-6">
    <label class="form-label">Category</label>
    <input type="text" class="form-control" name="catg_id" placeholder="Category" value=<?php if($catg_id){echo $catg_id;}; ?>>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
</form>
    </div>

   
  </body>
</html>
