<?php
session_start();
session_unset();
$conn = mysqli_connect("localhost","root","","bank");
if(!$conn)
{
    echo "failed".mysqli_connect_error();
}

if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from customers where username = '$username'";
    $result = mysqli_query($conn,$sql);

    if($result && (mysqli_num_rows($result)>0))
    {
        $row = mysqli_fetch_assoc($result);
        if($row['password']==$password)
        {
            $_SESSION['id'] = $row['id'];
            header("Location:index.php");
        }
        else
        {
            echo"wrong password";
        }
    }
    else
    {
        echo "Username does not exist";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>
<body>
<div class="container_outer">
    <div class="container_inner">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        Username:
        <input type="text" name="username" id="username" required><br>
        Password:
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="submit">
    </form>
    OR
    <a href="signup.php">Signup</a>
    </div>
</div>
</body>
</html>