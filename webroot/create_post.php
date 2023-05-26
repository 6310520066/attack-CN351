<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

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
    <title>Create Post</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h2>Post a Blog</h2>

<?php if (isset($user)): ?>

    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>

    <form method="post" action="create_post.php">
        <label for="header">Header:</label><br>
        <input type="text" id="header" name="header" required><br><br>

        <label for="detail">Detail:</label><br>
        <textarea id="detail" name="detail" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

<?php else: ?>

    <p>Please <a href="login.php">log in</a> to create a blog post.</p>

<?php endif; ?>

</body>
</html>
