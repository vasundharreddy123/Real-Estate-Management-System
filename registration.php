<?php
session_start();

include "./connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // No hashing for temporary testing
    // Insert the data into the database
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>
                alert("Registration succefully done");
                window.location.href = windox.location.href;
              </script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style2.css">
</head>
<body>
<form action="#" method="POST" class="real-estate-form">
    <h2>Register Now!!</h2>
  
    <!-- Personal Details -->
    <div class="form-group">
      <label for="name">Full Name *</label>
      <input type="text" id="name" name="name" required>
    </div>
  
    <div class="form-group">
      <label for="email">Email Address *</label>
      <input type="email" id="email" name="email" required>
    </div>
  
    <div class="form-group">
      <label for="phone">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit" class="submit-button">Register</button>
    <a href="login.php" class="back-to-login-button">Back to login page</a>


</form>
</body>
</html>