<?php
// search.php

$mysqli = require __DIR__ . "/database.php";

if (isset($_GET["query"])) {
    $query = $_GET["query"];

    // Search for blogs matching the query
    $sql = "SELECT blog.*, user.name AS username FROM blog LEFT JOIN user ON blog.created_by = user.id WHERE blog.header LIKE '%$query%' OR blog.detail LIKE '%$query%'";
    $result = $mysqli->query($sql);
    $blogs = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <meta charset="UTF-8">
    <style>
        /* Add CSS styles */
        .blog {
            background-color: lightgrey;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>BLOGGER</h1>

    <!-- Display search query -->
    <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
    <a href="index.php"><button>Go Back</button></a>

    <?php if (!empty($blogs)): ?>
        <?php foreach ($blogs as $blog): ?>
            <div class="blog">
                <!-- Display blog details -->
                <h3><?php echo htmlspecialchars($blog["header"]); ?></h3>
                <p><?php echo htmlspecialchars($blog["detail"]); ?></p>
                <p style="font-size: small">Created by: <?php echo htmlspecialchars($blog["username"]); ?>, created at: <?php echo htmlspecialchars($blog["created_at"]); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No blog posts found.</p>
    <?php endif; ?>


</body>
</html>
