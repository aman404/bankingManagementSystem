<?php
session_start();

$conn = mysqli_connect("localhost","root","","bank");
if(!$conn)
{
    echo "failed".mysqli_connect_error();
}

if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $sql = "select * from customers where id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result && mysqli_num_rows($result)>0)
    {
        $userdata = mysqli_fetch_assoc($result);
    }
}
else
{
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="container_outer">
    <div class="container_inner">
    <div class="initial"> <?php echo strtoupper($userdata['username'][0]) ?> </div>
    <h1>Hi <?php echo $userdata['username'] ?></h1>
    <div style="width: 100%; padding-right: 25px;">
        <a style="float: right;" href="login.php">Logout</a>
    </div>
    <ul class="home">
        <li><a href="details.php">View Account Details</a></li>
        <li><a href="withdraw.php">Withdraw</a></li>
        <li><a href="deposit.php">Deposit</a></li>
        <li><a href="transfer.php">Transfer Money</a></li>
    </ul>
    </div>
    </div>
</body>
</html>