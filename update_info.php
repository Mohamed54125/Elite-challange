<?php
session_start();
require 'db_conn.php';

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('Location: login.php');
    exit();
}

// Handle Email Update
if (isset($_POST['update_email'])) {
    $new_email = $_POST['new_email'];

    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->bind_param("si", $new_email, $user_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Email updated successfully!";
    } else {
        $_SESSION['error_message'] = "Failed to update email. Please try again.";
    }
    $stmt->close();
    header('Location: profile.php');
    exit();
}

?>
