<?php

session_start();
include "./connection.php" ;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // No hashing for temporary testing

    // Query to find the user by email
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Temporary direct comparison
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            // Redirect to dashboard.php
            if (headers_sent()) {
                echo "Headers already sent!";
            } else {
                header("Location: updated.php");
                exit;
            }
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "No account found with this email";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style2.css">
</head>

<body>
<form action="#" method="POST" class="real-estate-form">
    <h2>Login Now!</h2>
    <div class="form-group">
        <label for="email">Email Address *</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit">Login</button>
    <div class="form-group"> <p>Don't have an account? <a href="registration.php" class="register-button">Register</a></p> </div>
</form>
</body>
</html>
