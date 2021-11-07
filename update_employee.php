<?php
    require("Connection.php");
    session_start();
    $Employee_id = $_GET['update_id'];
    $sql = "SELECT * FROM `employee` WHERE Employee_id = $Employee_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $contact_no = $row['contact_no'];
    $Date_of_joining = $row['date_of_joining'];
    $adminuser = $_SESSION['adminuser'];
    if(isset($_POST['submit']) and $row['managed_by'] == $adminuser){
      $employee_id = $_POST['employee_id'];
      $name = $_POST['name'];
      $contact_no = $_POST['contact_no'];
      $date_of_joining = $_POST['date_of_joining'];
      $sqlup = "UPDATE `employee` SET employee_id = $employee_id, name = '$name', contact_no = '$contact_no', date_of_joining = '$date_of_joining' WHERE employee_id = $employee_id ";
      $result = mysqli_query($conn, $sqlup);
      if($result){
         // echo "update success";
        header("location: display_employee.php");
      }
      else{
        die(mysqli_error($conn));
      }

    }
    else if(isset($_POST['submit'])){
      echo"<script> alert('Employee is not managed by you');</script>";
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
    <input type="text" class="form-control" name="employee_id" placeholder="employee_id" value=<?php echo $Employee_id; ?>>
  </div>
 
  <div class="col-12">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name" value=<?php echo $name; ?>>
  </div>
 
  <div class="col-12">
    <label class="form-label">Contact_no</label>
    <input type="tel" class="form-control" name="contact_no" placeholder="1234567890" pattern="[789][0-9]{9}" required value=<?php echo $contact_no; ?>>
  </div>
  <div class="col-md-6">
    <label class="form-label">Date of joining</label>
    <input type="text" class="form-control" name="date_of_joining" placeholder="date_of_joining" value=<?php echo $Date_of_joining; ?>>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">update</button>
  </div>
</form>
    </div>

   
  </body>
</html>