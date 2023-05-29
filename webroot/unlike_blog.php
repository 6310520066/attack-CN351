<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_id = $_POST["blog_id"];
    $user_id = $_SESSION["user_id"];

    $sql = "DELETE FROM likes WHERE blog_id = $blog_id AND created_by = $user_id";
    $mysqli->query($sql);

    // Redirect back to the blog page or any other page
    header("Location: index.php");
    exit;
}

?>