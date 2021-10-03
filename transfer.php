<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","bank");
    if(!$conn)
    {
        echo "failed".mysqli_connect_error();
    }
    $id1 = $_SESSION['id'];
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $id2 = $_POST['id'];
        $amount = $_POST['amount'];
        $sql2 = "select * from customers where id = '$id2';";
        $result2 = mysqli_query($conn,$sql2);
        if($result2 && mysqli_num_rows($result2)>0)
        {
            $sql1 = "select * from customers where id = '$id1';";
            $result1 = mysqli_query($conn,$sql1);

            $userdata1 = mysqli_fetch_assoc($result1);
            $x = $userdata1['amount'];
            $x = $x - $amount;
            $query1 = "update customers set amount = '$x' where id = '$id1'";
            $withdrawl2 = mysqli_query($conn,$query1);

            $userdata2 = mysqli_fetch_assoc($result2);
            $x = $userdata2['amount'];
            $x = $x + $amount;
            $query2 = "update customers set amount = '$x' where id = '$id2'";
            $withdrawl1 = mysqli_query($conn,$query2);
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
    <title>Money Transfer</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>
<body>
<div class="container_outer">
    <div class="container_inner">
    <form action="transfer.php" method="POST">
        Enter Account Number: <br>
        <input type="number" name="id" id="id"><br>
        Enter Amount to transfer: <br>
        <input type="number" name="amount" id="amount"><br>
        <input type="submit" value="submit">
    </form>
    </div>
</div>
</body>
</html>