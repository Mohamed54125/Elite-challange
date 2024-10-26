<?php
session_start();
include 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete scores related to the user
        $delete_scores_sql = "DELETE FROM scores WHERE username = (SELECT username FROM users WHERE id = ?)";
        $stmt = $conn->prepare($delete_scores_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Delete group members related to the user
        $delete_group_sql = "DELETE FROM group_members WHERE group_name = (SELECT group_name FROM users WHERE id = ?)";
        $stmt = $conn->prepare($delete_group_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Delete the user
        $delete_user_sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($delete_user_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Commit the transaction
        $conn->commit();

        // Redirect back to admin dashboard with a success message
        header("Location: admin_dash.php?message=User deleted successfully");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction if something failed
        $conn->rollback();

        // Redirect back with an error message
        header("Location: admin_dash.php?message=Failed to delete user: " . $e->getMessage());
        exit();
    }
}
?>
