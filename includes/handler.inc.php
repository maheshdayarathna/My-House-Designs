<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "db.inc.php";

        $query = "INSERT INTO users (email, password) VALUES ($email, $password);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$email, $password]);

        $pdo = null;
        $stmt = null;

        header("Location: ../Main.html");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../Main.html");
}
?>