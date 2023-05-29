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

function checkUserLiked($blog_id, $user_id, $mysqli) {
    $sql = "SELECT * FROM likes WHERE blog_id = $blog_id AND created_by = $user_id";
    $result = $mysqli->query($sql);

    return $result->num_rows;
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
            <?php 
                $user_id = $blog["created_by"];
                $sql = "SELECT * FROM user WHERE id = $user_id";
                $result = $mysqli->query($sql);
                $user = $result->fetch_assoc();
            ?>

            <h3><?= htmlspecialchars($blog["header"]) ?></h3>
            <p><?= htmlspecialchars($blog["detail"]) ?></p>
            <p style="font-size: small">Created by: <?= htmlspecialchars($user['username']) ?>, created at:<?= htmlspecialchars($blog["created_at"]) ?></p>
            <div style="display: flex; align-items: center;">
                <?php if (isset($_SESSION["user_id"])): ?>
                    <!-- Like blog -->
                    <?php if (isset($_SESSION["user_id"])): ?>
                        <?php $count_like = checkUserLiked($blog["id"], $_SESSION["user_id"], $mysqli)?>
                        <?php if ($count_like > 0): ?>
                            <form method="POST" action="unlike_blog.php">
                                <input type="hidden" name="blog_id" value="<?php echo $blog["id"]; ?>">
                                <input type="hidden" name="created_by" value="<?php echo $_SESSION["user_id"]; ?>">
                                <button type="submit" style="background-color: gray; color: white;">Unlike</button>
                            </form>
                        <?php else: ?>
                            <form method="POST" action="like_blog.php">
                                <input type="hidden" name="blog_id" value="<?php echo $blog["id"]; ?>">
                                <input type="hidden" name="created_by" value="<?php echo $_SESSION["user_id"]; ?>">
                                <button type="submit" style="background-color: green; color: white;"><?php echo $count_like; ?> Like</button>
                            </form>
                        <?php endif ?>
                    <?php endif ?>

                    <!-- Delete blog -->
                    <?php if ($blog["created_by"] == $user["id"]): ?>
                        <form method="POST" action="delete_blog.php">
                            <input type="hidden" name="blog_id" value="<?php echo $blog["id"]; ?>">
                            <button type="submit" style="background-color: red; color: white;">Delete</button>
                        </form>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No blog posts found.</p>
<?php endif; ?>

</body>
</html>
