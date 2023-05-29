<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_id = $_POST["blog_id"];
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO likes (blog_id, created_by, created_at) VALUES ($blog_id, $user_id, CURRENT_TIMESTAMP)";
    $mysqli->query($sql);

    // Redirect back to the blog page or any other page
    header("Location: index.php");
    exit;
}

?>