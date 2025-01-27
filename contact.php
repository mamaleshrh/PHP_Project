<?php
require 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    try {
        // Prepare SQL statement to insert data into the database
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // Execute the statement
        $stmt->execute();

        echo "<h2>Thank you, $name!</h2>";
        echo "<p>Your message has been sent successfully.</p>";
        echo "<p>We will get back to you at $email soon.</p>";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // If someone tries to access this page directly without submitting the form
    header("Location: index.php");
    exit();
}
?>