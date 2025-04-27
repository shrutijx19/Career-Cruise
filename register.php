<?php

if (empty($_POST["uname"])) {
    die("Username is required");
}

if (strlen($_POST["password"]) < 6) {
    die("Password must be at least 6 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[A-Z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one number");
}

if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
    die("Password must contain atleast one special character");
}

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords do not match");
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO register (name, uname, password_hash) VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["uname"], $password_hash);

if ($stmt->execute()) {
    header("Location: registersuccess.html");
    exit;
} else {
    if ($mysqli->errno == 1062) {
        die("Username already exists");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
