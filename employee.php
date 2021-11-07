<?php
    require("Connection.php");
    session_start();
    $admin = $_SESSION['adminuser'];
    if(isset($_POST['submit'])){
      $employee_id = $_POST['employee_id'];
      $name = $_POST['name'];
      $contact_no = $_POST['contact_no'];
      $password = $_POST['password'];

      $sql = "INSERT INTO `employee` (employee_id, password, name, contact_no, managed_by) VALUES ('$employee_id', '$password','$name', '$contact_no','$admin')";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("location: display_employee.php");
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
  <div class="col-md-6">
    <label class="form-label">Employee_id</label>
    <input type="text" class="form-control" name="employee_id" placeholder="employee_id">
  </div>
 
  <div class="col-12">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
  </div>
  <div class="col-12">
    <label class="form-label">Contact_no</label>
    <input type="tel" class="form-control" name="contact_no" placeholder="1234567890" pattern="[789][0-9]{9}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Temporary Password</label>
    <input type="text" class="form-control" name="password" placeholder="password">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">submit</button>
  </div>
</form>
    </div>

   
  </body>
</html>
