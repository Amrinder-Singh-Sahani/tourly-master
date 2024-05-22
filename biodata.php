<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $db = "tourly";

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
   
   $sql = "SELECT * FROM bsi WHERE email = '$email'";
   // mysqli_select_db("mydb");
   
   // $retval = mysqli_query( $conn, $sql );

   $result = mysqli_query($conn,$sql);

   // if(! $retval ) {
   //    die('Could not get data: ' . mysql_error());
   // }
   
   // while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
   //    echo "EMP NAME :{$row['employee_name']}  <br> ".
   //       "EMP AGE : {$row['employee_age']} <br> ".
   //       "EMP SALARY : {$row['employee_salary']} <br> ".
   //       "EMP GENDER : {$row['employee_gender']} <br> ".
   //       "EMP EXP : {$row['employee_experience']} <br> ".
   //       "--------------------------------<br>";
   // }
$row = mysqli_fetch_assoc($result);
      $name = " Name :".$row['name']  ."<br> ";
         $email = " Email : ".$row['email'] ."<br> ";
         $contact = " Contact No : ".$row['phone']." <br> ";
        //  " GENDER : {$row['gender']} <br> ".
        //  " EXP : {$row['experience']} <br> ".
         "--------------------------------<br>";
   
//    echo "Fetched data successfully\n";
   
   mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travelling with Kundan</title>

  <link rel = "stylesheet" href = "style.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>
<body>
    <section class="tour-search">
        <div class="container">

          <form action="" class="tour-search-form">

            <!-- <div class="input-wrapper">
              <label for="destination" class="input-label">Search Destination*</label>

              <input type="text" name="destination" id="destination" required placeholder="Enter Destination"
                class="input-field">
            </div> -->

            <!-- <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>

              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div> -->

            <!-- <div class="input-wrapper">
              <label for="checkin" class="input-label"></label>

              <input type="date" name="checkin" id="checkin" required class="input-field">
              <p><</p>
            </div>

            <div class="input-wrapper">
              <label for="checkout" class="input-label"></label>

              <input type="date" name="checkout" id="checkout" required class="input-field">
              <p><></p>
            </div>
            <div class="input-wrapper">
              <label for="checkout" class="input-label"></label>

              <input type="date" name="checkout" id="checkout" required class="input-field">
              <p><</p>
            </div> -->
            <div class="login-container">
            <form class = "login-form" id = "login-form" action="signup.php" method="post">
                <!-- <h2>Sign Up</h2> -->
                <div class="signup-wrapper">
                <!-- <div class="input-wrapper"> -->
                <!-- <div id="input-wrapper"> -->
                    <label for="username" class="input-label"></label>
                    <!-- <input type="text" id="username" name="username" class="input-field"> -->
                    <p style = "text-decoration: white;"><?php echo $name;?></p>
                </div>
                <div class="signup-wrapper">
                <!-- <div class="input-wrapper"> -->
                <!-- <div id="email-wrapper"> -->
                    <label for="email" class = "input-label"></label>
                    <!-- <input type="email" id="email" name="email" class = "input-field"> -->
                    <p style = "text-decoration: white;"><?php echo $email;?></p>
                </div>
                <div class="signup-wrapper">
                <!-- <div class="input-wrapper"> -->
                <!-- <div id="email-wrapper"> -->
                    <label for="phone" class = "input-label"></label>
                    <!-- <input type="number" id="phone" name="phone" class = "input-field"> -->
                    <p style = "text-decoration: white;"><?php echo $contact;?></p>
                </div>
            <!-- <button type="submit" class="btn btn-secondary">Inquire now</button> -->

          </form>

        </div>
      </section>
</body>
</html>