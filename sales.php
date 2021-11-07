<?php
    require("Connection.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div  class = "container">
        <h3>Sales Details</h3>
    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_cust"  value="<?php if(isset($_GET['search_cust'])){echo $_GET['search_cust'];} ?>"placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Bill Number</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Contact Number</th>
      <th scope="col">Sales Price</th>
      <th scope="col">Date</th>
      <th scope="col">Employee</th>
    </tr>
  </thead>
  <tbody>

  <?php
    if(isset($_GET['search_cust'])){
        $filter = $_GET['search_cust'];
        $s = "select * from `employee` where name = '$filter'";
        $r = mysqli_query($conn,$s);
        $ro = mysqli_fetch_assoc($r);
        $empl = $filter;
        if($ro){
            $empl = $ro['employee_id'];
        }

        $sql = "SELECT * FROM `bill` WHERE cust_name LIKE '%$filter%' or bill_no LIKE '%$filter%' or cont_no LIKE '%$filter%' or employ LIKE '%$empl%' ";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $bill_no = $row['bill_no'];
                $cust_name = $row['cust_name'];
                $cust_no = $row['cont_no'];
                $date = $row['date'];
                $tot_price = $row['tot_price'];
                $employ_id = $row['employ'];
                $s = "select * from `employee` where employee_id = $employ_id";
                $r = mysqli_query($conn,$s);
                $ro = mysqli_fetch_assoc($r);
                $employ_id = $ro['name'];
                echo '<tr>
                <th scope="row">'.$bill_no.'</th>
                <td>'.$cust_name.'</td>
                <td>'.$cust_no.'</td>
                <td>'.$tot_price.'</td>
                <td>'.$date.'</td>
                <td>'.$employ_id.'</td>
                <td>
                <button class= "btn btn-danger"><a href="delete_sale.php? delete_id='.$bill_no.'" class="text-light">Delete</a></button>
                </td>
                </tr>';
        }
    }

    }
    else{
        $sql = "SELECT * FROM `bill` ";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $bill_no = $row['bill_no'];
                $cust_name = $row['cust_name'];
                $cust_no = $row['cont_no'];
                $date = $row['date'];
                $tot_price = $row['tot_price'];
                $employ_id = $row['employ'];
                $s = "select * from `employee` where employee_id = $employ_id";
                $r = mysqli_query($conn,$s);
                $ro = mysqli_fetch_assoc($r);
                $employ_id = $ro['name'];
                echo '<tr>
                <th scope="row">'.$bill_no.'</th>
                <td>'.$cust_name.'</td>
                <td>'.$cust_no.'</td>
                <td>'.$tot_price.'</td>
                <td>'.$date.'</td>
                <td>'.$employ_id.'</td>
                <td>
                <button class= "btn btn-danger"><a href="delete_sale.php? delete_id='.$bill_no.'" class="text-light">Delete</a></button>
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