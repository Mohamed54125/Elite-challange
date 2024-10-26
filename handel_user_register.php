<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $participate_as = $_POST['participate_as'];

    $group_name = null;
    $group_members = [];

    if ($participate_as === 'group') {
        $group_name = $_POST['group_name'];
        $group_members = $_POST['group_members'];
    }

    $checkSql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Username or email already exists. Please choose another.";
        header("Location: register.php"); 
        exit();
    }

    if ($participate_as === 'group') {
        $groupCheckSql = "SELECT * FROM group_members WHERE group_name = ?";
        $groupCheckStmt = $conn->prepare($groupCheckSql);
        $groupCheckStmt->bind_param("s", $group_name);
        $groupCheckStmt->execute();
        $groupCheckResult = $groupCheckStmt->get_result();

        if ($groupCheckResult->num_rows > 0) {
            $_SESSION['message'] = "Group name already exists. Please choose another.";
            header("Location: register.php"); 
            exit();
        }
    }

    $sql = "INSERT INTO users (username, email, password, participate_as, group_name) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $username, $email, $password, $participate_as, $group_name);

    if ($stmt->execute()) {
        if ($participate_as === 'group') {
            $member1 = isset($group_members[0]) ? $group_members[0] : null;
            $member2 = isset($group_members[1]) ? $group_members[1] : null;
            $member3 = isset($group_members[2]) ? $group_members[2] : null;
            $member4 = isset($group_members[3]) ? $group_members[3] : null;
            $member5 = isset($group_members[4]) ? $group_members[4] : null;

            $member_sql = "INSERT INTO group_members (group_name, member1, member2, member3, member4, member5) VALUES (?, ?, ?, ?, ?, ?)";
            $member_stmt = $conn->prepare($member_sql);
            $member_stmt->bind_param("ssssss", $group_name, $member1, $member2, $member3, $member4, $member5);
            $member_stmt->execute();
        }

        $_SESSION['message'] = "Registration successful!";
        header("Location: login.php"); 
        exit();
    } else {
        $_SESSION['message'] = "Registration failed: " . $stmt->error;
        header("Location: register.php"); 
        exit();
    }

    $stmt->close();
    $checkStmt->close();
    $conn->close();
}
?>
