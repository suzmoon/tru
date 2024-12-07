<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = "";     // Default XAMPP MySQL password (empty)
$dbname = "pandeee"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data if POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];  // This should match the name in the form

  // Check if passwords match
  if ($password !== $confirmPassword) {
      echo "Passwords do not match!";
  } else {
      // Hash the password before saving to the database
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Check if the email already exists
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          echo "Email already exists!";
      } else {
          // Insert the new user into the database
          $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";

          if ($conn->query($sql) === TRUE) {
              echo "Account created successfully!";
              // Redirect to login page after successful signup
              header("Location: login.html");
              exit();
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }
  }
}