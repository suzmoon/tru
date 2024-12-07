<?php
// Start session
session_start();

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

// Process login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session and redirect
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['user_email'] = $user['email']; // Store user email in session
            header("Location: webpage.html"); // Redirect to webpage.html
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Email not found!";
    }
}

// Close connection
$conn->close();
?>