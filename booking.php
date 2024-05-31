<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "tourly";

$conn = mysqli_connect($server,$username,$password,$db);

$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$newproduct = $_POST['product'];
$people = $_POST['people'];

// INSERT INTO `booking` (`sno`, `email`, `check_in`, `check_out`, `dt`) VALUES (NULL, 'sahaniamrindersingh@gmail.com', '2024-05-31', '2024-05-31', current_timestamp());


// UPDATE `booking` SET `email` = 'sahaniamrindersingh@gmail.com\r\nnew text' WHERE `booking`.`sno` = 1;


if($newproduct == "Malaysia")
{
    $price = $people*750;
}
elseif($newproduct == "Oxolotan River")
{
    $price = $people*520;
}

else
{
    $price = $people*660;
}

$sql = "SELECT email FROM booking WHERE email = '$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
    // $prevProduct = "SELECT product FROM booking WHERE email = '$email'";
    // $getProduct = mysqli_query($conn,$prevProduct);
    // $sql = "UPDATE `tourly`.`booking` SET `product` = '$getProduct\r\n$newproduct' WHERE `booking`.`email` = $email;";
    // $result = mysqli_query($conn,$sql);

    // memory map IO into basic


    $prevProduct = "SELECT product,price FROM booking WHERE email = '$email'";
    $getProductResult = mysqli_query($conn,$prevProduct);
    $row = mysqli_fetch_assoc($getProductResult);
    $getProduct = $row['product'];
    $getPrice = $row['price'];
    $newPrice = $getPrice+$price;

    $newProductValue = $getProduct . "\r\n" . $newproduct."   ".$checkin." to ".$checkout;
    $newProductValue = mysqli_real_escape_string($conn, $newProductValue);
    $sql = "UPDATE `tourly`.`booking` SET `product` = '$newProductValue', `price` = '$newPrice' WHERE `booking`.`email` = '$email'";
    $result = mysqli_query($conn,$sql);
}

else
{
    // $productValue = $newproduct."\t".$checkin."-".$checkout;
    $productValue = $newproduct."   ".$checkin." to ".$checkout;


    // $newproduct = 

    $sql = "INSERT INTO `tourly`.`booking` (`email`, `product`, `price`, `dt`) VALUES ('$email', '$productValue', '$price', current_timestamp());"; 
    $result = mysqli_query($conn,$sql);    
}

?>