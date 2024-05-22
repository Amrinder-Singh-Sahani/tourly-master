<?php
$servername = "localhost";
$username = "root"; // replace with your MySQL username
$password = ""; // replace with your MySQL password
$dbname = "tourly";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get booking details from POST request
$product_title = $_POST['product_title'];
$price = $_POST['price'];
$check_in_date = $_POST['check_in_date'];
$check_out_date = $_POST['check_out_date'];
$total_price = $_POST['total_price'];

// // Prepare and bind
// $stmt = $conn->prepare("INSERT INTO `tourly`.`bookings` (`product_title`,  `check_in_date`, `check_out_date`, `total_price`) VALUES (?, ?, ?, ?, ?)");
// $stmt->bind_param( );

$sql = "INSERT INTO `tourly`.`bookings` (`product_title`,  `checkin_date`, `checkout_date`, `total_price`) VALUES ('$product_title','$check_in_date', '$check_out_date', '$total_price');";
$result = mysqli_query($conn,$sql);
if (!$result) {
    // echo "Error: " . $stmt->error;
    echo "error" .mysqli_error($conn);
} else {
    echo "Booking confirmed!";
}

// $stmt->close();
// $conn->close();
?>