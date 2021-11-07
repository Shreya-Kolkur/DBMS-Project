<?php
    require("Connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee login pannal</title>
    <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel = "stylesheet" type= "text/css" href="style.css">
</head>
<body>
        <div class ="login-form">
            <h2>Employee Login</h2>
            <form method= "POST">
                <div class ="input-field">
                    <i  class="fas far fa-user"></i>
                    <input type = "text" placeholder="Employee Id" name="username">
                </div>
                <div class ="input-field">
                    <i  class="fas fas fa-lock"></i>
                    <input type = "password" placeholder="password" name="password">
                </div>
                <button type="submit" name="signin">sign in</button>

            </form>
        </div>
    
<?php
if(isset($_POST['signin']))
{
    $query = "SELECT * FROM `employee` WHERE `employee_id` = '$_POST[username]' AND `password` = '$_POST[password]'";
    $result = mysqli_query($conn,$query);
    $row_cnt = mysqli_num_rows($result);
    
    printf("Result set has %d rows.\n", $row_cnt);

    if($row_cnt== 1)
    {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $id = $row['employee_id'];
        session_start();
        $_SESSION['employeeid'] = $id;
        $_SESSION['employeename'] = $name;
        header("location: generate_bill.php");
    }
    else{
        echo"<script> alert('incorrect user id and password');</script>";
    }
}

?>


</body>
</html>