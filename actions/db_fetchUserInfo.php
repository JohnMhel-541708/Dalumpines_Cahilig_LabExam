<?php
include "db_config.php";

// Make sure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user info
$stmt = $conn->prepare("SELECT user_id, first_name, last_name, email, username, gender, hobbies, country 
                        FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Convert hobbies string to array if needed
    if (!empty($user['hobbies'])) {
        $user['hobbies'] = array_map('trim', explode(",", $user['hobbies']));
    } else {
        $user['hobbies'] = [];
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}

$stmt->close();
$conn->close();
