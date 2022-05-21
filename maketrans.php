<!-- ****** Transaction Page ****** -->

<?php
include('config.php');
if (!$con) {
    die("connection failed!!!!" . mysqli_connect_error());
}

// Before Submiting the form this php code is executed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $balance = $_POST['amount'];
    // Select the perticular row of sender and receiver
    $sql2 = "SELECT * FROM spark_internship.customer WHERE Accno='$from';";
    $sql3 = "SELECT * FROM spark_internship.customer WHERE Accno='$to';";
    $result2 = mysqli_query($con, $sql2);
    $row1 = mysqli_fetch_array($result2);
    $result3 = mysqli_query($con, $sql3);
    $row2 = mysqli_fetch_array($result3);
    // If account number is valid or not
    if (isset($row1['Accno']) && isset($row2['Accno'])) {
        if ($from == $to) {
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Sender and Receiver account number is equal")';  // showing an alert box.
            echo '</script>';
        } else if (($balance) < 0) {
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
            echo '</script>';
        } else if ($balance > $row1['Amount']) {
            echo '<script type="text/javascript">';
            echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
            echo '</script>';
        } else if ($balance == 0) {

            echo "<script type='text/javascript'>";
            echo "alert('Oops! Zero value cannot be transferred')";
            echo "</script>";
        } else {
            // Insert the transaction details to Transaction history table
            $sql1 = "INSERT INTO `spark_internship`.`transaction` (`sno`,`sender`,`receiver`,`amount`,`datetime`) VALUES ('','$from','$to','$balance',current_timestamp());";
            $result1 = mysqli_query($con, $sql1);
            $valid = TRUE;
            if ($result1) {
                echo "<script> alert('Transaction Successful');
                            window.location='transhistory.php';
                  </script>";
            }

            // After transaction, update the customer table
            if ($valid == TRUE) {
                $sql1 = "UPDATE `spark_internship`.`customer` SET `amount`=`amount`-'$balance' where `spark_internship`.`customer`.`accno`='$from';";
                $sql2 = "UPDATE `spark_internship`.`customer` SET `amount`=`amount`+'$balance' where `spark_internship`.`customer`.`accno`='$to';";
                $result1 = mysqli_query($con, $sql1);
                $result2 = mysqli_query($con, $sql2);
            }
            //close database
            $con->close();
        }
    }
    else {
        echo "<script>alert('incorrect Account Number');</script>";
    }
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Transaction</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="maketrans.css">
</head>

<body>
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

    <!-- Transaction form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="forms">

        <div class="heading">Tranfer money</div><br><br>
        <div class="fcontent">
            <input type="text" name="from" value="<?php if(isset($_GET['Accno'])) echo $_GET['Accno'] ?>" placeholder="Enter Sender account number"><br><br>
            <input type="text" name="to" placeholder="Enter Reciever account number"><br><br>
            <input type="text" name="amount" placeholder="Enter the ammount"><br><br>
            <input type="submit" value="Submit">
        </div>
    </form>

</body>

</html>