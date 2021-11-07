<?php 
  require("Connection.php");
  session_start();
  $price = $_SESSION['price'];
  $employee_id = $_SESSION['employeeid'];
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $cont_no = $_POST['cont_no'];
    $sql = "INSERT INTO `bill` (cust_name,cont_no,tot_price,employ) VALUES ('$name','$cont_no','$price','$employee_id')";
    $result = mysqli_query($conn, $sql);
    if($result){
      header("location: generate_bill.php");
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

    <title>Customer Details</title>
  </head>
  <body>
    <div class="container my-5">

<form class="row g-3" method ="post">
         <div class="col-md-6">
    <label class="form-label">Customer Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  <div class="col-md-6">
    <label class="form-label" >Customer Contact</label>
    <input type="tel" class="form-control" name="cont_no" placeholder="1234567890" pattern="[789][0-9]{9}" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
  </form>
    </div>
   
  </body>
</html>

