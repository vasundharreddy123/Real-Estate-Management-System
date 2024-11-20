<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style2.css">
</head>
<body style="background: linear-gradient(135deg, #33beec, #ffffff);">
  <form action="#" method="POST" class="real-estate-form">
    <h2>Property Enquiry Form</h2>
    <p>Please fill out the form below, and our team will get in touch with you shortly.</p>
  
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
      <label for="phone">Phone Number *</label>
      <input type="tel" id="phone" name="phone" required>
    </div>
  
    <!-- Property Preferences -->
    <div class="form-group">
      <label for="propertyType">Property Type *</label>
      <select id="propertyType" name="propertyType" required>
        <option value="">Select Property Type</option>
        <option value="apartment">Apartment</option>
        <option value="villa">Villa</option>
        <option value="house">House</option>
        <option value="commercial">Commercial Property</option>
      </select>
    </div>
  
    <div class="form-group">
      <label for="budget">Budget Range *</label>
      <select id="budget" name="budget" required>
        <option value="">Select Budget Range</option>
        <option value="50000">Up to ₹20Lacs</option>
        <option value="100000">₹21Lacs-₹30Lacs</option>
        <option value="250000">₹31Lacs-₹50Lacs</option>
        <option value="500000">₹51Lacs-₹70Lacs</option>
        <option value="500000+">₹71Lacs and Above</option>
      </select>
    </div>
  
    <div class="form-group">
      <label for="location">Preferred Location *</label>
      <input type="text" id="location" name="location" placeholder="City, Neighborhood, etc." required>
    </div>
  
    <!-- Additional Details -->
    <div class="form-group">
      <label for="moveInDate">Expected Move-in Date</label>
      <input type="date" id="moveInDate" name="moveInDate">
    </div>
  
    <div class="form-group">
      <label for="message">Additional Information</label>
      <textarea id="message" name="message" rows="4" placeholder="Tell us more about your preferences..."></textarea>
    </div>
  
    <!-- Submit Button -->
    <button type="submit" class="submit-button">Submit Enquiry</button>
    <a href="index.php" class="back-to-login-button">Back to Home Page</a>

  </form>
  
</body>
</html>
<?php
include("connection.php"); // Ensure this file contains the correct connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $propertyType = $_POST['propertyType'];
    $budget = $_POST['budget'];
    $location = $_POST['location'];
    $moveInDate = $_POST['moveInDate'] ?? null; // Optional field
    $message = $_POST['message'] ?? ''; // Optional field

    // Prepare SQL query to insert data
    $query = "INSERT INTO ENQUIRY (name, email, phone, propertyType, budget, location, moveInDate, message) 
              VALUES ('$name', '$email', '$phone', '$propertyType', '$budget', '$location', '$moveInDate', '$message')";

    // Execute query
    $result = mysqli_query($conn, $query);

    if ($result) {
      // On success, show an alert and redirect to the same page
      echo '<script>
              alert("Inquiry has been successfully submitted.");
              window.location.href = ;
            </script>';
  } else {
      echo "Error: " . mysqli_error($conn);
  }
}

mysqli_close($conn); // Close the database connection
?>
