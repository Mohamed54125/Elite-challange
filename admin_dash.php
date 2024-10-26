<?php
session_start();
include 'db_conn.php';
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
} else {
    $message = null;
}



$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

$sql_scores = "SELECT * FROM scores";
$result_scores = $conn->query($sql_scores);

$sql_group_members = "SELECT * FROM group_members";
$result_group_members = $conn->query($sql_group_members);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Elite Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            background-color: #121212; 
            color: #fff;
        }
        .container {
            background-color: #1c1c1c; 
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }
        .table th, .table td, h2 {
            color: #fff;
        }
        .navbar {
            background-color: #222; 
        }
        .navbar .nav-link, .navbar-brand {
            color: #fff; 
        }
        .navbar .nav-link:hover {
            color: #ffc107; 
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Elite Challenge</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Tabs Section -->
    <ul class="nav nav-tabs" id="dashboard-tabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">Users</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="scores-tab" data-bs-toggle="tab" data-bs-target="#scores" type="button" role="tab">Challenges Scores</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="group-members-tab" data-bs-toggle="tab" data-bs-target="#group-members" type="button" role="tab">Group Members</button>
        </li>
    </ul>

    <div class="tab-content" id="dashboard-tab-content">
        <!-- Users Tab -->
        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
            <h2>Users</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Participation As</th>
                        <th>Group Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result_users->num_rows > 0) {
                            while ($row = $result_users->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['participate_as']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['group_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                                echo "<td><form method='POST' action='delete_user.php' style='display:inline;'>
                                        <input type='hidden' name='user_id' value='" . $row['id'] . "' />
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                      </form></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No users found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Scores Tab -->
        <div class="tab-pane fade" id="scores" role="tabpanel" aria-labelledby="scores-tab">
            <h2>Challenges Scores</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Challenge</th>
                        <th>Score</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_scores->num_rows > 0) {
                        while ($row = $result_scores->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['score']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No scores found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Group Members Tab -->
        <div class="tab-pane fade" id="group-members" role="tabpanel" aria-labelledby="group-members-tab">
            <h2>Group Members</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Member 1</th>
                        <th>Member 2</th>
                        <th>Member 3</th>
                        <th>Member 4</th>
                        <th>Member 5</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_group_members->num_rows > 0) {
                        while ($row = $result_group_members->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['group_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['member1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['member2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['member3']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['member4']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['member5']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No group members found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
