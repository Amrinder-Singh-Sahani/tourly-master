<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "tourly";

$con = mysqli_connect($server,$username,$pass,$db);

$getEmail = $_POST['email'];
$getPassword = $_POST['password'];
$getEmail = mysqli_real_escape_string($con, $getEmail);
$getPassword = mysqli_real_escape_string($con, $getPassword);
$hash = password_hash($getPassword, PASSWORD_ARGON2ID);

// $getName = mysqli_real_escape_string($con, $getName);
$getEmail = mysqli_real_escape_string($con, $getEmail);

$sql = "SELECT email,pass FROM bsi WHERE email = '$getEmail'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0)
{
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hash = $row['pass'];
    $valid = password_verify($getPassword, $hash);
    if($valid)
    {
        header('location: newbook22.html?email='.$getEmail);
        exit;
    }
    else
    {
        echo "Invalid";
    }
} else {
    echo "Invalid email.";
}

}
else
{
    echo "This email is not registered!";
}

$con->close();


?>