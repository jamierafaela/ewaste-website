<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "ewasteph");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        // Handle sign-up
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Insert user into database
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($query)) {
            echo "<script>alert('Welcome $name, Thank you for choosing us!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to create account. Please try again.'); window.history.back();</script>";
        }
    } elseif (isset($_POST['signin'])) {
        // Handle sign-in
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $name = $user['name'];
                echo "<script>alert('Welcome back $name!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Incorrect password. Please try again.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('No account found with this email.'); window.history.back();</script>";
        }
    }
}

// Close connection
$conn->close();
?>
