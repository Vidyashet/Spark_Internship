
<!-- ******* HOME PAGE ******** -->

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
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
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
                    <li><a href="#about">About us</a></li>
                    <li><a href="#contact">Contack us</a></li>
                </ul>
            </nav>
            <div>

    </header>
    <div class="content">
        <div>
            <div class="heading">
                <h1>Online Banking Transaction</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quibusdam doloremque possimus
                    error temporibus omnis provident at autem veritatis sequi consectetur animi eligendi officiis
                    reprehenderit ipsa distinctio laudantium magnam ea id eveniet, quaerat ullam sed! Laudantium
                    quibusdam quaerat maxime placeat molestias aut explicabo sapiente dignissimos nulla voluptatum,
                    fugit quisquam earum quo quia sed omnis recusandae error, ratione fugiat consequuntur sint aliquid?
                    us beatae nam explicabo itaque laborum inventore totam voluptatum? Nulla odit animi id
                    of?</p>

            </div>
        </div>

        <div class="button">
            <button class="btn"><a href="maketrans.php"> Make Transaction</a></button>
        </div>

        <br>
        <br>
        <br>
        <div class="about" id="about">
            <h2><u>About us</u></h2>
            <p>
                Spark Bank<br>
                It is an online trasaction website<br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, nisi! Illum cumque iusto doloribus
                quo, corrupti facilis fugiat consectetur praesentium perspiciatis culpa explicabo, eum atque laborum
                
            </p>
        </div>

        <br>
        <br>
        <br>
        <br>

        <div class="contact" id="contact">
            <h2><u>Contact Us</u></h2>
            <p>
                Email:<a href="" style="text-decoration: none; color: white;">spark@gmail.com</a><br>
                Phone number:9999999999<br>
                Address:<Address>Mumbai,India</Address>
                PinCode:555555
            </p>
        </div>
    </div>
</body>

</html>