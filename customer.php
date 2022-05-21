<!-- ****** CUSTOMER PAGE ****** -->


<?php
include('config.php');
if (!$con) {
    die("connection failed!!!!" . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer.css">
    <title>Customer</title>

</head>
<body class="bimage">
    <header>
        <div class="header">
            <h1>Welcome to sparks Bank</h1>
            <!-- Navbar -->
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="customer.php">Customers</a></li>
                    <li><a href="transhistory.php">Transaction History</a></li>
                </ul>
            </nav>
            <div>
            

    </header>
    
    <!-- Customer details table -->
    <div class="custdetail" style="display: inline-block; padding:110px 190px;">
        <table class="tbl">
            <caption>Customer Details</caption>
            <thead>
            <tr>
                <th>Acc No.</th>
                <th>Name</th>
                <th>Email ID</th>
                <th>phone no.</th>
                <th>Amount</th>
                <th>Make transaction</th>
            </tr>
            </thead>
            <tbody>
                <!-- Php code to change amount of the customer when transaction done -->
                 <?php
            $sql="select * from `spark_internship`.`customer`;";
            $query=mysqli_query($con,$sql);
            while($rows = mysqli_fetch_assoc($query))
            {
                ?>
                <tr>
                    <td><?php echo $rows['Accno'];?></td>
                    <td><?php echo $rows['Name'];?></td>
                    <td><?php echo $rows['emailid'];?></td>
                    <td><?php echo $rows['phoneno'];?></td>
                    <td><?php echo $rows['Amount']; ?></td>
                    <!-- To move to transaction page with that person Accno -->
                    <td><button><a href="maketrans.php?Accno= <?php echo $rows['Accno'] ;?>">Tranfer</a></button></td>
                 
                </tr>
                <?php
            }
            ?>
           
            </tbody>
        </table>
    </div>
</body>
</html>
