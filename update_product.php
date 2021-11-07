<?php
    require("Connection.php");
    session_start();
    $product_id = $_GET['update_id'];
    $sql = "SELECT * FROM `products` WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $stock = $row['stock'];
    $price = $row['price'];
    $catg_id = $row['catg'];
    $update = $_SESSION['adminuser'];
    if(isset($_POST['submit'])){
      $product_id = $_POST['product_id'];
      $name = $_POST['name'];
      if($_POST['add_stock']){
        $stock = $_POST['stock'] + $_POST['add_stock'];
      }
      else{
        $stock = $_POST['stock'];
      }
      $catg_id = $_POST['catg_id'];
      $price = $_POST['price'];

      $sql = "UPDATE `products` SET product_id = $product_id, name = '$name', stock = '$stock', price = '$price', catg = '$catg_id', updated_by = '$update' WHERE product_id = $product_id ";
      $result = mysqli_query($conn, $sql);
      if($result){
         // echo "update success";
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
    <label class="form-label">Product</label>
    <input type="text" class="form-control" name="product_id" placeholder="product_id" value=<?php echo $product_id; ?>>
  </div>
 
  <div class="col-12">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name" value=<?php echo $name; ?>>
  </div>
 
  <div class="col-12">
    <label class="form-label">Stock</label>
    <input type="text" class="form-control" name="stock" placeholder="stock" value=<?php echo $stock; ?>>
  </div>

  <div class="col-md-6">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" name="price" placeholder="Price" value=<?php echo $price; ?>>
  </div>

  <div class="col-md-6">
    <label class="form-label">Category</label>
    <input type="text" class="form-control" name="catg_id" placeholder="Category" value=<?php echo $catg_id; ?>>
  </div>
  <div class="col-md-6">
    <label class="form-label">Add Stock</label>
    <input type="text" class="form-control" name="add_stock" placeholder="Add">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </div>
</form>
    </div>

   
  </body>
</html>