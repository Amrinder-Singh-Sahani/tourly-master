<?php
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$checkin = $data['checkin'];
$checkout = $data['checkout'];
$cart = $data['cart'];

$stmt = $conn->prepare("INSERT INTO bookings (email, checkin_date, checkout_date, total_price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $email, $checkin, $checkout, $totalPrice);

$totalPrice = array_reduce($cart, function($sum, $item) {
  return $sum + ($item['price'] * $item['quantity']);
}, 0);

if ($stmt->execute()) {
  $booking_id = $stmt->insert_id;

  $stmtItems = $conn->prepare("INSERT INTO booking_items (booking_id, title, price, quantity) VALUES (?, ?, ?, ?)");
  $stmtItems->bind_param("isdi", $booking_id, $title, $price, $quantity);

  foreach ($cart as $item) {
    $title = $item['title'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $stmtItems->execute();
  }

  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}

$conn->close();
?>