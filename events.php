<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
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

        .no-results {
            display: none; 
            color: #ffc107;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Elite Challenge</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <form class="d-flex ms-3" id="searchForm" onsubmit="return false;">
        <input class="form-control me-2" type="search" id="searchInput" placeholder="Search Challenge" aria-label="Search" onkeyup="filterChallenges()">
      </form>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <!-- Search Form -->
      
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Select a Challenge</h2>
            <p class="lead">Please choose one of the following challenges:</p>
        </div>
    </div>
    <div class="row justify-content-center" id="challengeContainer">
        <div class="col-md-4 challenge-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mathematics</h5>
                    <p class="card-text">Test your knowledge in various mathematical concepts.</p>
                    <a href="math_q.php" class="btn btn-primary">Start Challenge</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 challenge-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Football</h5>
                    <p class="card-text">Test your knowledge about football.</p>
                    <a href="football_q.php" class="btn btn-primary">Start Challenge</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 challenge-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">History</h5>
                    <p class="card-text">Dive into historical events and figures.</p>
                    <a href="history_q.php" class="btn btn-primary">Start Challenge</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 challenge-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">IT & Programming</h5>
                    <p class="card-text">Test your understanding of programming and IT concepts.</p>
                    <a href="programming_q.php" class="btn btn-primary">Start Challenge</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 challenge-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Geography</h5>
                    <p class="card-text">Evaluate your knowledge of countries, capitals, and landscapes.</p>
                    <a href="geography_q.php" class="btn btn-primary">Start Challenge</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 challenge-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Science</h5>
                    <p class="card-text">Test your knowledge in physics, chemistry, biology, or natural sciences.</p>
                    <a href="science_q.php" class="btn btn-primary">Start Challenge</a>
                </div>
            </div>
        </div>
    </div>
    <div class="no-results" id="noResults">Coming Soon</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
function filterChallenges() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const challenges = document.querySelectorAll('.challenge-card');
    let hasVisibleChallenges = false;

    challenges.forEach(challenge => {
        const title = challenge.querySelector('.card-title').textContent.toLowerCase();
        if (title.includes(input)) {
            challenge.style.display = '';
            hasVisibleChallenges = true;
        } else {
            challenge.style.display = 'none';
        }
    });

    const noResults = document.getElementById('noResults');
    if (hasVisibleChallenges) {
        noResults.style.display = 'none';
    } else {
        noResults.style.display = 'block';
    }
}
</script>

</body>
</html>
