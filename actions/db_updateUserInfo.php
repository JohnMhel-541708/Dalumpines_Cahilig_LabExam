<?php
include "db_config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST['user_id'] ?? null;

    if (!$user_id) {
        header("Location: ../user.php?error=Invalid user");
        exit();
    }

    // Sanitize and prepare updates
    $updates = [];
    $params = [];
    $types  = "";

    // Update username
    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
        if ($username === "") {
            header("Location: ../user.php?error=Username cannot be empty");
            exit();
        }

        // check duplicate username
        $check = $conn->prepare("SELECT user_id FROM users WHERE username = ? AND user_id != ?");
        $check->bind_param("si", $username, $user_id);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
            header("Location: ../user.php?error=Username already taken");
            exit();
        }

        $updates[] = "username = ?";
        $params[]  = $username;
        $types    .= "s";
    }

    // Update email
    if (isset($_POST['facebook_link'])) {  // ⚠️ looks like you accidentally named it `facebook_link`
        $email = trim($_POST['facebook_link']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../user.php?error=Invalid email format");
            exit();
        }

        // check duplicate email
        $check = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
        $check->bind_param("si", $email, $user_id);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
            header("Location: ../user.php?error=Email already taken");
            exit();
        }

        $updates[] = "email = ?";
        $params[]  = $email;
        $types    .= "s";
    }

    // If nothing to update
    if (empty($updates)) {
        header("Location: ../user.php?error=No data to update");
        exit();
    }

    // Add user_id at the end
    $params[] = $user_id;
    $types   .= "i";

    // Build SQL dynamically
    $sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        header("Location: ../user.php?success=Info updated successfully");
        exit();
    } else {
        header("Location: ../user.php?error=Update failed");
        exit();
    }
} else {
    header("Location: ../user.php?error=Invalid request");
    exit();
}
