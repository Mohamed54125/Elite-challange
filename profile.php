<?php
include 'db_conn.php';
session_start();

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$group_name = $user['group_name'];
$group_members = [];

if ($user['participate_as'] === 'group') {
    $group_sql = "SELECT member1, member2, member3, member4, member5 FROM group_members WHERE group_name = ?";
    $group_stmt = $conn->prepare($group_sql);
    $group_stmt->bind_param("s", $group_name);
    $group_stmt->execute();
    $group_result = $group_stmt->get_result();
    
    if ($group_member = $group_result->fetch_assoc()) {
        $group_members = array_filter([$group_member['member1'], $group_member['member2'], $group_member['member3'], $group_member['member4'], $group_member['member5']]);
    }
}

$scores_sql = "SELECT category, score, created_at FROM scores WHERE username = ?";
$scores_stmt = $conn->prepare($scores_sql);
$scores_stmt->bind_param("s", $username);
$scores_stmt->execute();
$scores_result = $scores_stmt->get_result();
$scores = [];
while ($row = $scores_result->fetch_assoc()) {
    $scores[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, tbody, tr {
            background-color: #121212; 
            color: #fff; 
        }
        .container {
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }
        .navbar {
            background-color: #343a40; 
        }
        .navbar .nav-link,
        .navbar-brand {
            color: #fff; 
        }
        .navbar .nav-link:hover {
            color: #ffc107;
        }
        h2, p.lead {
            color: #ffffff;
        }
        .card {
            background-color: #121212; 
            color: #fff;
            margin-bottom: 20px; 
            transition: transform 0.3s, box-shadow 0.3s; 
            box-shadow: 0px 4px 8px rgba(255, 255, 255, 0.3);
        }
        .btn-primary:hover {
            background-color: #e0a800; 
            border-color: #e0a800; 
        }
        .form-control {
            margin-bottom: 20px;
            background-color: #333;
        }
    </style>
</head>
<body class="login">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="events.php">Elite Challenge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Challenges</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>My Profile</h2>
        <hr>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?>
                </p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateEmailModal">Update</button>
                </p>
                <p><strong>Participation Type:</strong> <?php echo $user['participate_as'] === 'group' ? 'Group' : 'Individual'; ?></p>
                <p><strong>Created at:</strong> <?php echo $user['created_at'] ?></p>
            </div>
        </div>

        <?php if ($user['participate_as'] === 'group'): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Group Information</h5>
                    <p><strong>Group Name:</strong> <?php echo htmlspecialchars($group_name); ?></p>
                    <h6>Group Members:</h6>
                    <ul>
                        <?php foreach ($group_members as $member): ?>
                            <li><?php echo htmlspecialchars($member); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="card mb-4 container">
            <div class="card-body">
                <h5 class="card-title">My Scores</h5>
                <?php if (count($scores) > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Challenge</th>
                                <th>Score</th>
                                <th>Date Achieved</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($scores as $score): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($score['category']); ?></td>
                                    <td><?php echo htmlspecialchars($score['score']); ?></td>
                                    <td><?php echo htmlspecialchars($score['created_at']); ?></td> 
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No scores available for this user.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

   

    <!-- Update Email Modal -->
    <div class="modal fade" id="updateEmailModal" tabindex="-1" aria-labelledby="updateEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="update_info.php" method="POST">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateEmailModalLabel">Update Email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="email" name="new_email" class="form-control" placeholder="New Email" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update_email">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
