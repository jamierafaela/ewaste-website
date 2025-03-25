<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : "Welcome to EWastePH!";
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <style>
        body {
            font-family: "DM Sans", sans-serif;
            text-align: center;
            background-color: #f5f5f5;
            margin-top: 20%;
        }

        h1 {
            color: #2a5d37;
        }

        p {
            font-size: 1.2rem;
            color: #555;
        }

        a {
            text-decoration: none;
            color: #2a5d37;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1><?php echo $message; ?></h1>
    <p>Click <a href="index.php">here</a> to go back to the homepage.</p>
</body>
</html>