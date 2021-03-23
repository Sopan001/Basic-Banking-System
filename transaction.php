<?php

include('config.php');

//selecting data to show
$sql = "SELECT * FROM `accounts`";
$result = mysqli_query($con, $sql);
// mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];



        if( $sender != $receiver && $amount>0){
            $sender_query = "SELECT * FROM accounts WHERE name ='$sender'";
            $sCon = mysqli_query($con,$sender_query);
            $sResult=mysqli_fetch_assoc($sCon);
            $sBalance=$sResult['balance'];
            
            if($amount<=$sBalance){
                $receiver_query = "SELECT * FROM accounts WHERE name ='$receiver'";
                $rCon = mysqli_query($con,$receiver_query);
                $sResult = mysqli_fetch_assoc($rCon);
                $rBalance = $sResult['balance'];
        
                $sBalance-=$amount;
                $rBalance+=$amount;
        
                $sUpdate = "UPDATE `accounts` SET `balance` = '$sBalance' WHERE `accounts`.`name` = '$sender';";
                $senderLogUpdate=mysqli_query($con,$sUpdate);
        
                $rUpdate = "UPDATE `accounts` SET `balance` = '$rBalance' WHERE `accounts`.`name` = '$receiver';";
                $recevierLogUpdate=mysqli_query($con,$rUpdate);
        
                $history_query = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `time`) VALUES ('$sender', '$receiver', '$amount', current_timestamp())";
                $history = mysqli_query($con,$history_query);
        
                echo '<script> 
                   
                                Swal.fire({
                                    icon: "success",
                                    title: "Transaction Success",
                                    text: "Congratulations! You Have Made A Successful Transaction",
                                }).then(function() {
                                    window.location = "transfer.php";
                                });
                             
    
                             </script>';
                                          
                }

            else
            {
                echo '<script> 
                   
                        Swal.fire({
                                    icon: "warning",
                                    title: "Failed",
                                    text: "Insufficient Balance",
                                }).then(function() {
                                    window.location = "transfer.php";
                                });
                             
    
                             </script>';
            }

            }
            else {
                echo '<script> 
                   
                Swal.fire({
                            icon: "warning",
                            title: "Failed",
                            text: "Not able to transmit ti itself",
                        }).then(function() {
                            window.location = "transfer.php";
                        });
                     

                     </script>';
            }
    }
    else {

        echo '<script> 
                   
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Some Error Occured",
            }).then(function() {
                window.location = "transfer.php";
            });
                             
    
        </script>';

    }

?>


<script>

        var preloader = document.getElementById("loading");
        function load(){
            preloader.style.display = "None";
        }

</script>



 
</body>
</html>