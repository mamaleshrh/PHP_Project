<?php
require 'db.php'; // Include the database connection

// Get the blog post ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the blog post from the database
$stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    // If no post is found, redirect to the blog section
    header("Location: index.php#blog");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?> - My Portfolio</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo $post['title']; ?></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#about">About Me</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="section">
        <div class="container">
            <h2><?php echo $post['title']; ?></h2>
            <?php if ($post['image']): ?>
                <img src="images/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="blog-detail-img">
            <?php endif; ?>
            <div class="blog-content">
                <?php echo $post['content']; ?> <!-- Render HTML content -->
            </div>
            <a href="index.php#blog" class="btn">Back to Blog</a>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 My Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>