<?php
$host = "localhost";     // your MySQL host
$user = "root";          // default XAMPP username
$pass = "";              // default XAMPP password is empty
$db   = "cs15exam_db"; // your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
