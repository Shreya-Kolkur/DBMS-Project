<?php
    require("Connection.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div  class = "container">
    <button class = "btn btn-primary my-5"><a href="employee.php" class= "text-light">Add Employee</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Employee_id</th>
      <th scope="col">Name</th>
      <th scope="col">Contact_No</th>
      <th scope="col">Date_of_joining</th>
      <th scope="col">Managed by</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $sql = "SELECT * FROM `employee` ";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $employee_id = $row['employee_id'];
            $name = $row['name'];
            $contact_no = $row['contact_no'];
            $Date_of_joining = $row['date_of_joining'];
            $update = $row['managed_by'];
            $sql = "Select * from `admin` where username = '$update'";
            $r = mysqli_query($conn,$sql);
            $ro = mysqli_fetch_assoc($r);
            $update = $ro['name'];
            echo '<tr>
            <th scope="row">'.$employee_id.'</th>
            <td>'.$name.'</td>
            <td>'.$contact_no.'</td>
            <td>'.$Date_of_joining.'</td>
            <td>'.$update.'</td>
            <td>
            <button class="btn btn-primary"><a href="update_employee.php? update_id='.$employee_id.'" class="text-light">Update</a></button>
            <button class= "btn btn-danger"><a href="delete_employee.php? delete_id='.$employee_id.'" class="text-light">Delete</a></button>
            </td>
          </tr>';
        }
    }

  ?>


  </tbody>
</table>
     </div>
</body>
</html>