<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf(
        "SELECT * FROM register WHERE uname = '%s'",
        $mysqli->real_escape_string($_POST["uname"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            header("Location: dashboard.html");
        } else {
            die("Invalid details");
        }
    }
}
