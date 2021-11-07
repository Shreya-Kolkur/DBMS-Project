<?php
    session_start();
    $adminuser = $_SESSION['adminuser'];
    $adminname = $_SESSION['adminname'];
    
    if(!isset($_SESSION['adminname'])){
        header("location: Admin Login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <input type="checkbox" id="check">
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <style>
        body{
            margin: 0px;
        }
        div.header{
            align-items: center;
            font-family : poppins;
            display :flex;
            justify-content:space-between ;
            padding: 0px 60px;
            background-color: #22242a;
            color: #fff;
            text-transform:uppercase;
            font-weight:900;
    
        }
        div.header button{
            background-color: #f0f0f0;
            font-size:16px;
            font-weight:550;
            padding:8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <h2>Grocery store</h2>
        <form method = "POST">
            <button name="logout">Logout</button>
        </form>
    </div>

    <!---header area start----->
    <header>
        <div class="left_area">
        <h3>Dashboard</h3>
        </div>
    </header>
    <!---header area end--->
    <!---sidebar start--->
    <div class="sidebar">
            <img src="girl.jpeg" class="profile_image" alt="">
            <h4><?php echo $adminname; ?></h4>
        <a href="display_employee.php"><i class="fas fa-users" ></i><span>Employees</span></a>
        <a href="display_product.php"><i class="fas fa-table"></i><span>Products</span></a>
        <a href="display_order.php"><i class="fas fa-caret-square-down"></i><span>Orders</span></a>
        <a href="sales.php"><i class="fas fa-money-bill"></i><span>Sales</span></a>
        <a href="admin_setting.php"><i class="fas fa-cogs"></i><span>Admin Setting</span></a>
        
    </div> 
    <!---sidebar end--->

    <div class="content">
        
    </div>

<?php
if(isset($_POST['logout'])){
    session_destroy();
    header("location: Admin Login.php");
}

?>
</body>
</html>