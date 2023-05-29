<?php
session_start();

$mysqli = require __DIR__ . "/database.php";

// Fetch all blog posts
$sql = "SELECT * FROM blog";
$result = $mysqli->query($sql);
$blogs = $result->fetch_all(MYSQLI_ASSOC);

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    // Fetch user information
    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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

<?php if (isset($user)): ?>

    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
    <p><a href="create_post.php">Post a blog</a></p>
    <p><a href="logout.php">Log out</a></p>


<?php else: ?>

    <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>

<?php endif; ?>

<h2>Blog Posts</h2>

<?php if (!empty($blogs)): ?>
    <?php foreach ($blogs as $blog): ?>
        <div class="blog">
            <h3><?= htmlspecialchars($blog["header"]) ?></h3>
            <p><?= htmlspecialchars($blog["detail"]) ?></p>
            <p style="font-size: small">Created by: <?= htmlspecialchars($blog["created_by"]) ?>, created at:<?= htmlspecialchars($blog["created_at"]) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No blog posts found.</p>
<?php endif; ?>

</body>
</html>
