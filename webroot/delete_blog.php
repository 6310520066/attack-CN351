<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_id = $_POST["blog_id"];

    $sql = "DELETE FROM blog WHERE id = $blog_id";
    $mysqli->query($sql);

    // Redirect back to the blog page or any other page
    header("Location: index.php");
    exit;
}

?>
