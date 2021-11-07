<?php
    require("Connection.php");
    session_start();

    if(isset($_GET['delete_id'])){
        $employee_delete_id = $_GET['delete_id'];
        $sql = "SELECT * FROM `employee` WHERE Employee_id = $employee_delete_id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row['managed_by'] == $_SESSION['adminuser']){
            $sql = "DELETE FROM `employee` WHERE Employee_id = $employee_delete_id";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: display_employee.php");
            }
            else{
                die(mysqli_error($conn));
            }
        }
        else{
            echo"<script> alert('Employee is not managed by you');</script>";
        }
    }
?>
