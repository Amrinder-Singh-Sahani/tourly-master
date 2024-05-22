<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "tourly";


$con = mysqli_connect($server,$username,$pass,$db);

$getName = $_POST['username'];
$getEmail = $_POST['email'];
$phone = $_POST['phone'];
$getPassword = $_POST['password'];
$confirmPass = $_POST['pass2'];

$getName = mysqli_real_escape_string($con, $getName);
$getEmail = mysqli_real_escape_string($con, $getEmail);
$getPassword = mysqli_real_escape_string($con, $getPassword);
// $confirmPass = mysqli_real_escape_string($con, $confirmPass);
$hash = password_hash($getPassword, PASSWORD_ARGON2ID);

$now = new DateTime(null, new DateTimeZone('Asia/Kolkata')); // Current time in IST
$setNow = $now->format('Y-m-d H:i:s');

$sql = "SELECT * FROM bsi WHERE email = '$getEmail'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Email already in use!";
} else {
    $testsqli = "INSERT INTO `tourly`.`bsi` (`name`, `email`,`phone`, `pass`, `dt`) VALUES ('$getName', '$getEmail','$phone', '$hash', '$setNow');";
    mysqli_query($con, $testsqli);
    // echo $testsqli;
    header('location: login.html');
    exit;
}


?>