
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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

    <section class="main">

        <section class="left">
            <p class="title">Welcome To Banker</p>
            <p class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nihil rerum itaque quisquam!
                Natus repudiandae nesciunt tempora odio amet. Saepe?</p>
            <form action="users.php">
                <button class="cta">View Users</button>
            </form>
            
        </section>

        <section class="right">
            <img src="images/Savings.svg" alt="Langing image">
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