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

// Handle blog post submission
if (isset($_POST["header"]) && isset($_POST["detail"]) && isset($_SESSION["user_id"])) {
    $header = $_POST["header"];
    $detail = $_POST["detail"];

    // Insert the new blog post into the database
    $sql = "INSERT INTO blog (header, detail, created_by, created_at)
            VALUES ('$header', '$detail', $user_id, CURRENT_TIMESTAMP)";
    $mysqli->query($sql);

    // Redirect to the homepage
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Home</h1>

<?php if (isset($user)): ?>

    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
    <p><a href="create_post.php">Post a blog</a></p>
    <p><a href="logout.php">Log out</a></p>


<?php else: ?>

    <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>

<?php endif; ?>

<h2>Blog Posts</h2>

<?php if (!empty($blogs)): ?>
    <ul>
        <?php foreach ($blogs as $blog): ?>
            <li>
                <h3><?= htmlspecialchars($blog["header"]) ?></h3>
                <p><?= htmlspecialchars($blog["detail"]) ?></p>
                <p>Created by: <?= htmlspecialchars($blog["created_by"]) ?></p>
                <p>Created at: <?= htmlspecialchars($blog["created_at"]) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No blog posts found.</p>
<?php endif; ?>

</body>
</html>
