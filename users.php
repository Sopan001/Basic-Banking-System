<?php 
include('config.php');

//selecting data to show
$sql = "SELECT * FROM `accounts`";
$result = mysqli_query($con, $sql);
mysqli_close($con);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
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

    <section class="container">

        <div class="table-box">
            <div class="table-row table-head">
                <div class="table-cell first-cell">
                    <p>ID</p>
                </div>
                <div class="table-cell">
                    <p>Name</p>
                </div>
                <div class="table-cell">
                    <p>Email-ID</p>
                </div>
                <div class="table-cell last-cell">
                    <p>Balance</p>
                </div> 
            </div>
    
            

            <?php 
                while($row = mysqli_fetch_assoc($result)){
                  
                    echo 
                    "<div class='table-row'>
                        <div class='table-cell first-cell'>
                            <p>".$row['id']."</p>
                        </div>
                        <div class='table-cell'>
                            <p>". $row['name'] ."</p>
                        </div>
                        <div class='table-cell'>
                            <p>". $row['email'] . "</p>
                        </div>
                        <div class='table-cell last-cell'>
                            <p>". $row['balance'] . "</p>
                        </div>   
                    </div>";
                }
                ?>
    
    

    </div>   
    
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