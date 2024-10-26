<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Challenge</title>
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
        
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="admin_register.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container shadow-container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 text-center">
            <h2 class="mb-4">Elite Challenge</h2>
            <p class="intro-text">
                The Elite Challenge is an engaging online competition system designed to test participants' knowledge across various subjects through quizzes. It serves as a platform for both individual and group participation, encouraging friendly competition and learning among users.
            </p>
            <a href="register.php" class="btn btn-primary">Sign Up</a>
            <a href="login.php" class="btn btn-primary">Log In</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
