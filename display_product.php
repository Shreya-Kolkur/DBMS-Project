<?php
    require("Connection.php");
    session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div  class = "container">
    <button class = "btn btn-primary my-5"><a href="product.php" class= "text-light">Add Product</a>
    </button>
    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_product"  value="<?php if(isset($_GET['search_product'])){echo $_GET['search_product'];} ?>"placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Product_id</th>
      <th scope="col">Name</th>
      <th scope="col">Stock</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Updated by</th>
    </tr>
  </thead>
  <tbody>

  <?php
    if(isset($_GET['search_product'])){
        $filter = $_GET['search_product'];
        $up = "select * from `admin` where name = '$filter' ";
        $result = mysqli_query($conn,$up);
        $r = mysqli_fetch_assoc($result);
        $fil = $filter;
        if($r){
            $fil = $r['username'];
        }
        $sql = "SELECT * FROM `products` WHERE name LIKE '%$filter%' or product_id like '%$filter%' or catg like '%$filter%' or updated_by like '%$fil%' ";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $name = $row['name'];
                $stock = $row['stock'];
                $catg_id = $row['catg'];
                $price = $row['price'];
                $update = $row['updated_by'];
                $sql = "Select * from `admin` where username = '$update'";
                $r = mysqli_query($conn,$sql);
                $ro = mysqli_fetch_assoc($r);
                $update = $ro['name'];
                echo '<tr>
                <th scope="row">'.$product_id.'</th>
                <td>'.$name.'</td>
                <td>'.$stock.'</td>
                <td>'.$price.'</td>
                <td>'.$catg_id.'</td>
                <td>'.$update.'</td>
                <td>
                <button class="btn btn-primary"><a href="update_product.php? update_id='.$product_id.'" class="text-light">Update</a></button>
                <button class= "btn btn-danger"><a href="delete_product.php? delete_id='.$product_id.'" class="text-light">Delete</a></button>
                </td>
                </tr>';
        }
    }

    }
    else{
        $sql = "SELECT * FROM `products` ";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $name = $row['name'];
                $stock = $row['stock'];
                $catg_id = $row['catg'];
                $price = $row['price'];
                $update = $row['updated_by'];
                $sql = "Select * from `admin` where username = '$update'";
                $r = mysqli_query($conn,$sql);
                $ro = mysqli_fetch_assoc($r);
                $update = $ro['name'];
                echo '<tr>
                <th scope="row">'.$product_id.'</th>
                <td>'.$name.'</td>
                <td>'.$stock.'</td>
                <td>'.$price.'</td>
                <td>'.$catg_id.'</td>
                <td>'.$update.'</td>
                <td>
                <button class="btn btn-primary"><a href="update_product.php? update_id='.$product_id.'" class="text-light">Update</a></button>
                <button class= "btn btn-danger"><a href="delete_product.php? delete_id='.$product_id.'" class="text-light">Delete</a></button>
                </td>
                </tr>';
            }
        }
    }

  ?>






  </tbody>
</table>
     </div>
</body>
</html>