<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","bank");
    if(!$conn)
    {
        echo "failed".mysqli_connect_error();
    }
    $id = $_SESSION['id'];
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $amount = $_POST['amount'];
        $sql = "select * from customers where id = '$id';";
        $result = mysqli_query($conn,$sql);
        if($result && mysqli_num_rows($result)>0)
        {
            $userdata = mysqli_fetch_assoc($result);
            $x = $userdata['amount'];
            $x = $x + $amount;
            $query = "update customers set amount = '$x' where id = '$id'";
            $withdrawl = mysqli_query($conn,$query);
            header("Location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>
<body>
<div class="container_outer">
    <div class="container_inner">
    <form action="deposit.php" method="POST">
        Enter Amount to Deposit: <br>
        <input type="number" name="amount" id="amount"><br>
        <input type="submit" value="submit">
    </form>
    </div>
</div>
</body>
</html>