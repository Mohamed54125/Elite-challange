<?php
session_start(); // Start the session at the top

include 'db_conn.php'; // Include database connection
$error_message = "";

// Check if the user is already logged in
if (isset($_SESSION['admin_id'])) {
    // Redirect the logged-in admin to the dashboard
    header("Location: admin_dash.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL query to check if the admin exists
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    // Check if any admin with the given username exists
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $admin = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $admin['password'])) {
            // Set session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            
            // Redirect to the dashboard
            header("Location: admin_dash.php");
            exit();
        } else {
            // Store the error message in the session
            $_SESSION['error_message'] = "Incorrect password!";
            header("Location: loginadmin.php");
            exit();
        }
    } else {
        // Store the error message in the session
        $_SESSION['error_message'] = "Username not found!";
        header("Location: loginadmin.php");
        exit();
    }
}

// Close the connection after use
mysqli_close($conn);
?>
