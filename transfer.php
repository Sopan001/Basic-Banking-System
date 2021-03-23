<?php

 include('config.php');
 $query = "SELECT * FROM `accounts` ORDER BY `accounts`.`name` ASC";
 $query_run = mysqli_query($con, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/transfer.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <title>Banker</title>

</head>

<body onload="load()">

    <div class="loader" id="loading">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>


    <header>
        <h1>Banker</h1>

        <section class="menu">
            <ul class="menu-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="transfer.php">Transfer</a></li>
                <li><a href="history.php">Transaction History</a></li>
            </ul>

            <button>
                <i class="fas fa-times"></i>
                <i class="fas fa-bars"></i>
            </button>
        </section>
    </header>



    <section class="main">


        <section class="left">
            <p class="title">Make the Easy Transactions</p>
            <p class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nihil rerum itaque quisquam!
                Natus repudiandae nesciunt tempora odio amet. Saepe?</p>
            <form action="index.php"> 
                <button class="cta">Visit Home</button>
            </form>
        </section>


        <section class="right">
            
            <form action="transaction.php" method="post" class="form-content">

                <div class="row">
                    <h1>Send Money</h1>
                </div>


                <div class="row">
                    <select name="sender" required>
                        <option value="" disabled selected hidden>Select Sender</option>
                        <?php
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                echo "<option value='".$row['name']."'>".$row['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                

                <div class="row">
                    <select name="receiver" required>
                        <option value="" disabled selected hidden>Select Receiver</option>
                        <?php

                            $query = "SELECT * FROM `accounts` ORDER BY `accounts`.`name` ASC";
                            $query_run = mysqli_query($con, $query);


                            while ($row = mysqli_fetch_assoc($query_run)) {
                                echo "<option value='".$row['name']."'>".$row['name']."</option>";
                            }
                        ?>
                    </select>
                </div>

                


                <div class="row">    
                    <input type="text" name="amount" placeholder="Enter Amount" required>
                </div>

                
                <div class="row">
                    <button class="cta btn">Transfer</button>
                </div>
            </form>



        </section>



    </section>


    <script src="js/index.js"></script>

    <script>

        var preloader = document.getElementById("loading");
        function load(){
            preloader.style.display = "None";
        }

    </script>

    
</body>
</html>