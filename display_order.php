<?php
    require("Connection.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div  class = "container">
    <button class = "btn btn-primary my-5"><a href="orders.php" class= "text-light">Order Product</a>
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
        <th scope="col">Order Id</th>
      <th scope="col">Product_id</th>
      <th scope="col">Name</th>
      <th scope="col">Ordered Number of items</th>
      <th scope="col">Total Price</th>
      <th scope="col">Category</th>
      <th scope="col">Date and Time</th>
      <th scope="col">Placed by</th>
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
        $sql = "SELECT * FROM `orders` WHERE order_id like '%$filter%' or product_id like '%$filter%' or placed_by like '%$fil%'";
        $result = mysqli_query($conn, $sql);
        $row_cnt = mysqli_num_rows($result);
    
        if($row_cnt != 0){
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $sql = "SELECT * FROM `products` where product_id = '$product_id' ";
                $result2 = mysqli_query($conn,$sql);
                $row2 = mysqli_fetch_assoc($result2);
                $order_id = $row['order_id'];
                $product_id = $row['product_id'];
                $name = $row2['name'];
                $no_of_items = $row['no_of_items'];
                $catg_id = $row2['catg'];
                $price = $row['tot_price'];
                $date = $row['date'];
                $placed = $row['placed_by'];
                $sql = "Select * from `admin` where username = '$placed'";
                $r = mysqli_query($conn,$sql);
                $ro = mysqli_fetch_assoc($r);
                $placed = $ro['name'];
                echo '<tr>
                <th scope="row">'.$order_id.'</th>
                <td>'.$product_id.'</td>
                <td>'.$name.'</td>
                <td>'.$no_of_items.'</td>
                <td>'.$price.'</td>
                <td>'.$catg_id.'</td>
                <td>'.$date.'</td>
                <td>'.$placed.'</td>
                <td>
                <button class= "btn btn-danger"><a href="delete_order.php? delete_id='.$order_id.'" class="text-light">Delete</a></button>
                </td>
                </tr>';
        }
    }
        else{
            $sql = "SELECT * FROM `products` WHERE name like '%$filter%' or catg like '%$filter%'";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $product_id = $row['product_id'];
                    $sql = "SELECT * FROM `orders` where product_id = '$product_id'";
                    $result2 = mysqli_query($conn,$sql);
                    $row1 = mysqli_fetch_assoc($result2);
                    $order_id = $row1['order_id'];
                    $product_id = $row['product_id'];
                    $name = $row['name'];
                    $no_of_items = $row1['no_of_items'];
                    $catg_id = $row['catg'];
                    $price = $row1['tot_price'];
                    $date = $row1['date'];
                    $placed = $row1['placed_by'];
                    $sql = "Select * from `admin` where username = '$placed'";
                    $r = mysqli_query($conn,$sql);
                    $ro = mysqli_fetch_assoc($r);
                    $placed = $ro['name'];
                    echo '<tr>
                    <th scope="row">'.$order_id.'</th>
                    <td>'.$product_id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$no_of_items.'</td>
                    <td>'.$price.'</td>
                    <td>'.$catg_id.'</td>
                    <td>'.$date.'</td>
                    <td>'.$placed.'</td>
                    <td>
                    <button class= "btn btn-danger"><a href="delete_order.php? delete_id='.$order_id.'" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
            }

        }
    }

    }
    else{
        $sql = "SELECT * FROM `orders` ";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $sql = "SELECT * FROM `products` where product_id = '$product_id'";
                $result2 = mysqli_query($conn,$sql);
                $row2 = mysqli_fetch_assoc($result2);
                $order_id = $row['order_id'];
                $product_id = $row['product_id'];
                $name = $row2['name'];
                $no_of_items = $row['no_of_items'];
                $catg_id = $row2['catg'];
                $price = $row['tot_price'];
                $date = $row['date'];
                $placed = $row['placed_by'];
                $sql = "Select * from `admin` where username = '$placed'";
                $r = mysqli_query($conn,$sql);
                $ro = mysqli_fetch_assoc($r);
                $placed = $ro['name'];
                echo '<tr>
                <th scope="row">'.$order_id.'</th>
                <td>'.$product_id.'</td>
                <td>'.$name.'</td>
                <td>'.$no_of_items.'</td>
                <td>'.$price.'</td>
                <td>'.$catg_id.'</td>
                <td>'.$date.'</td>
                <td>'.$placed.'</td>
                <td>
                <button class= "btn btn-danger"><a href="delete_order.php? delete_id='.$order_id.'" class="text-light">Delete</a></button>
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