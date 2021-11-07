<?php
    require("Connection.php");

    $Employee_id = $_GET['update_id'];
    $sql = "SELECT * FROM `employee` WHERE Employee_id = $Employee_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
      $password = $_POST['pass'];
      $sqlup = "UPDATE `employee` SET password = $password WHERE employee_id = $Employee_id ";
      $result = mysqli_query($conn, $sqlup);
      if($result){
         // echo "update success";
        header("location: generate_bill.php");
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

    <title>Information of Employees</title>
  </head>
  <body>
    <div class="container my-5">
    <form class="row g-3" method ="post">
    
 
  <div class="col-12">
    <label  class="form-label">New Password</label>
    <input type="text" class="form-control" name="pass" placeholder="Password">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">update</button>
  </div>
</form>
    </div>

   
  </body>
</html>