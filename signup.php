<?php
session_start();

$conn = mysqli_connect("localhost","root","","bank");
if(!$conn)
{
    echo "failed".mysqli_connect_error();
}

if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $amount = $_POST['amount'];

    $query = "select username from customers where username = '$username'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result)>0)
    {
        echo '<script>alert ("Username already exists. Please try another username.");</script>';
    }
    else
    {
        $sql = "insert into customers (name,username,password,amount) values('$name','$username','$password','$amount')";
        if(mysqli_query($conn,$sql))
        {
            header("Location:login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>
<body>
<div class="container_outer">
    <div class="container_inner">
    <h2>Signup</h2>
    <form action="signup.php" method="POST">
        Name:
        <input type="text" name="name" id="name"><br>
        Username:
        <input type="text" name="username" id="username" ><br>
        Password:
        <input type="password" name="password" id="password" ><br>
        Initial Deposit:
        <input type="number" name="amount" id="amount"><br>
        <input type="submit" value="submit">
    </form>

    <a href="login.php">Login</a>
    </div>
</div>
</body>
</html>