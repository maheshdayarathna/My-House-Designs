
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test';

$connect = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connect) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// If the connection is successful, you can perform your database operations here.

?>
