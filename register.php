<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,.list-group {
            background-color: #121212; 
            color: #fff; 
        }

        .container {
            background-color: #1c1c1c;
            padding: 30px;
            margin-top: 30px;
            width: 70%;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }
        .list-group-item {
            background-color: #000; 
            color: #fff;
            border-color: #444; 
        }

        .list-group-item:hover {
            background-color: #333;
            color: #ffc107;
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

        .card:hover {
            transform: scale(1.05); 
            box-shadow: 0px 8px 16px rgba(255, 255, 255, 0.5); 
        }

       

        .btn-primary:hover {
            background-color: #e0a800; 
            border-color: #e0a800; 
        }
        .form-control {
            margin-bottom: 20px;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body class="login">
    
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Elite Challenge</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="admin_register.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
    <div class="row justify-content-center form-section" id="mainContent">
        <div class="col-md-8">
            <h2 class="mb-4">User Registration</h2>
            <form method="POST" action="handel_user_register.php" class="p-4">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="participate_as" class="form-label">Participate As</label>
                    <select class="form-select" id="participate_as" name="participate_as" onchange="toggleGroupFields()" required>
                        <option value="individual">Individual</option>
                        <option value="group">Group</option>
                    </select>
                </div>

                <div id="group-fields" style="display:none;">
                    <div class="mb-3">
                        <label for="group_name" class="form-label">Group Name</label>
                        <input type="text" class="form-control" id="group_name" name="group_name">
                    </div>
                    <div class="mb-3">
                        <label for="group_member1" class="form-label">Group Members</label>
                        <input type="text" class="form-control mb-2" name="group_members[]" placeholder="Member 1" required>
                        <input type="text" class="form-control mb-2" name="group_members[]" placeholder="Member 2" required>
                        <input type="text" class="form-control mb-2" name="group_members[]" placeholder="Member 3" required>
                        <input type="text" class="form-control mb-2" name="group_members[]" placeholder="Member 4" required>
                        <input type="text" class="form-control mb-2" name="group_members[]" placeholder="Member 5">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleGroupFields() {
        var participateAs = document.getElementById('participate_as').value;
        document.getElementById('group-fields').style.display = (participateAs === 'group') ? 'block' : 'none';
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
