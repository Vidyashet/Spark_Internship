<!-- ****** Transaction History Page ****** -->

<?php
include("config.php");
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
    <link rel="stylesheet" href="transhistory.css">
    
    <title>Transaction History</title>
</head>
<body class="bimage">
    <header>
        <div class="header">
            <h1>Welcome to sparks Bank</h1>

            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="customer.php">Customers</a></li>
                    <li><a href="transhistory.php">Transaction History</a></li>
                </ul>
            </nav>
            <div>

    </header>
    <!-- Table to display the transaction detail -->
    <div class="custdetail" style="display: inline-block; padding:120px 270px;">
        <table class="tbl">
            <caption>Transaction History</caption>
            <thead>
            <tr>
                <th>SI no.</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount Paid</th>
                <th>Date of Transaction</th>
            </tr>
            </thead>
            <tbody>
            <!-- Php code to display trasaction details in web page -->
            <?php
            $sql="select * from `spark_internship`.`transaction`";
            $query=mysqli_query($con,$sql);
            while($rows = mysqli_fetch_assoc($query))
            {
                ?>
                <tr>
                    <td><?php echo $rows['sno'];?></td>
                    <td><?php echo $rows['sender'];?></td>
                    <td><?php echo $rows['receiver'];?></td>
                    <td><?php echo $rows['amount'];?></td>
                    <td><?php echo $rows['datetime']; ?></td>
                </tr>
                <?php
            }
            ?>
             </tbody>
        </table> 
    </div>
</body>
</html>