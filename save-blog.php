<?php
require 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content']; // HTML content

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "images/" . basename($image);

        // Move the uploaded image to the images folder
        move_uploaded_file($image_tmp, $image_path);
    } else {
        $image = null; // No image uploaded
    }

    // Insert the blog post into the database
    $stmt = $conn->prepare("INSERT INTO blog_posts (title, content, image) VALUES (:title, :content, :image)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    // Redirect to the blog section
    header("Location: index.php#blog");
    exit();
} else {
    // If someone tries to access this page directly without submitting the form
    header("Location: add-blog.php");
    exit();
}
?>