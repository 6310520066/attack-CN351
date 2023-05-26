<?php

if (empty($_POST["username"])) {
    die("Username is required");
}

if (empty($_POST["name"])) {
    die("Name is required");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (username, name, email, password)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssss",
    $_POST["username"],
    $_POST["name"],
    $_POST["email"],
    $password_hash
);

if ($stmt->execute()) {
    header("Location: signup-success.html");
    exit;
}
