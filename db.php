<?php
$host = 'localhost'; // or your host
$dbname = 'portfolio_db'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password

//hostings :) :)
// $host = 'sql210.infinityfree.com'; // or your host
// $dbname = 'if0_38185686_mysite'; // your database name
// $username = 'if0_38185686'; // your database username
// $password = 'tR04fvO0sG'; // your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // You can remove this line after testing
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>




