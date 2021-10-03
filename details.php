<?php
session_start();
$conn = mysqli_connect("localhost","root","","bank");
if(!$conn)
{
    echo "failed".mysqli_connect_error();
}
$id = $_SESSION['id'];
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($conn,$sql);
if($result && mysqli_num_rows($result)>0)
{
    $userdata = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>
<body>
<div class="container_outer">
    <div class="container_inner">
    <h2>Hi <?php echo $userdata['name']?>, here are the details of your account:</h2>
    <ul style="margin-top: 50px;" class="details">
        <li>Account Number: <?php echo $id?></li> <hr>
        <li>Name: <?php echo $userdata['name']?></li> <hr>
        <li>Uername: <?php echo $userdata['username']?></li> <hr>
        <li>Date of opening: <?php echo  $userdata['date']?></li> <hr>
        <li>Account Balance: <?php echo  $userdata['amount']?></li> <hr>
    </ul>
    </div>
</div>
</body>
</html>