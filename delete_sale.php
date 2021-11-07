<?php
    require("Connection.php");

    if(isset($_GET['delete_id'])){
        $product_delete_id = $_GET['delete_id'];

        $sql = "DELETE FROM `bill` WHERE bill_no = $product_delete_id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: sales.php");
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>