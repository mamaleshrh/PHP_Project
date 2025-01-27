<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

require 'db.php'; // Include the database connection

// Fetch all contact form submissions from the database
try {
    $stmt = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching contacts: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contacts - My Portfolio</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Additional styling for the contacts table */
        .contacts-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .contacts-table th, .contacts-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .contacts-table th {
            background-color: #f4f4f4;
        }
        .contacts-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .contacts-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Add Blog button styling */
        .add-blog-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-blog-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>View Contacts</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="section">
        <div class="container">
            <h2>Contact Form Submissions</h2>
            <?php if (!empty($contacts)): ?>
                <table class="contacts-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td><?php echo $contact['id']; ?></td>
                                <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                <td><?php echo htmlspecialchars($contact['message']); ?></td>
                                <td><?php echo $contact['created_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No contact submissions found.</p>
            <?php endif; ?>

            <!-- Add Blog Button -->
            <a href="add-blog.php" class="add-blog-button">Add Blog</a>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 My Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>