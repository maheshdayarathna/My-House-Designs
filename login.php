<?php

if (isset($_POST['submit'])) {

    include 'db.inc.php';

    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    // Hash the password - Recommended for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['password'])) {
            // Password is correct, redirect to Main.html
            header("Location: ../Main.html");
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        // Query failed
        echo "<script>alert('Error in database query');</script>";
    }
    
    // User not found
    echo "<script>alert('User not found');</script>";
}
?>