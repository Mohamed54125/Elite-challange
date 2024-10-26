<?php
session_start();
?>
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
    </style>
</head>
<body class="login">
    
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="events.php">Elite Challenge</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="events.php">log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form id="quizForm" method="POST" action="submit_quiz_programming.php">
    <div class="container mt-5">
        <div class="row"><h2 style="text-align: center;"> Welcome To Programming & IT Chllange</h2><br><br><br>
            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 1</h5>
                        <p class="card-text">What does HTML stand for?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q1" value="A" onclick="showResult('result1', 'A')"> A)  Hyper Text Markup Language</label>
                            <label class="list-group-item"><input type="radio" name="q1" value="B" onclick="showResult('result1', 'B')"> B) High Text Markup Language</label>
                            <label class="list-group-item"><input type="radio" name="q1" value="C" onclick="showResult('result1', 'C')"> C)  Hyperlink and Text Markup Language</label>
                            <label class="list-group-item"><input type="radio" name="q1" value="D" onclick="showResult('result1', 'D')"> D) Cascading Style Sheet</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 2</h5>
                        <p class="card-text">What is the purpose of a firewall?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q2" value="A" onclick="showResult('result2', 'A')"> A) To store data</label>
                            <label class="list-group-item"><input type="radio" name="q2" value="B" onclick="showResult('result2', 'B')"> B) To increase internet speed</label>
                            <label class="list-group-item"><input type="radio" name="q2" value="C" onclick="showResult('result2', 'C')"> C) To cool down the computer</label>
                            <label class="list-group-item"><input type="radio" name="q2" value="D" onclick="showResult('result2', 'D')"> D) To protect a network from unauthorized access</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 3</h5>
                        <p class="card-text">What is an algorithm?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q3" value="A" onclick="showResult('result3', 'A')"> A) A step-by-step procedure for solving a problem</label>
                            <label class="list-group-item"><input type="radio" name="q3" value="B" onclick="showResult('result3', 'B')"> B) A data structure</label>
                            <label class="list-group-item"><input type="radio" name="q3" value="C" onclick="showResult('result3', 'C')"> C) A programming language</label>
                            <label class="list-group-item"><input type="radio" name="q3" value="D" onclick="showResult('result3', 'D')"> D) A type of software</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 4</h5>
                        <p class="card-text">Which protocol is used to securely transfer data over the internet?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q4" value="A" onclick="showResult('result4', 'A')"> A) HTTP</label>
                            <label class="list-group-item"><input type="radio" name="q4" value="B" onclick="showResult('result4', 'B')"> B) HTTPS</label>
                            <label class="list-group-item"><input type="radio" name="q4" value="C" onclick="showResult('result4', 'C')"> C) SMTP</label>
                            <label class="list-group-item"><input type="radio" name="q4" value="D" onclick="showResult('result4', 'D')"> D) HTTPS</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 5</h5>
                        <p class="card-text">Which of the following is a NoSQL database?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q5" value="A" onclick="showResult('result5', 'A')"> A) MySQL</label>
                            <label class="list-group-item"><input type="radio" name="q5" value="B" onclick="showResult('result5', 'B')"> B) PostgreSQL</label>
                            <label class="list-group-item"><input type="radio" name="q5" value="C" onclick="showResult('result5', 'C')"> C) MongoDB</label>
                            <label class="list-group-item"><input type="radio" name="q5" value="D" onclick="showResult('result5', 'D')"> D) SQLite</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 6</h5>
                        <p class="card-text">Which of the following is a widely used front-end framework?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q6" value="A" onclick="showResult('result6', 'A')"> A) Django</label>
                            <label class="list-group-item"><input type="radio" name="q6" value="B" onclick="showResult('result6', 'B')"> B) Flask</label>
                            <label class="list-group-item"><input type="radio" name="q6" value="C" onclick="showResult('result6', 'C')"> C) Ruby on Rails</label>
                            <label class="list-group-item"><input type="radio" name="q6" value="D" onclick="showResult('result6', 'D')"> D) React</label>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <button class="btn btn-primary" id="submitBtn" data-bs-toggle="modal" data-bs-target="#resultModal">Submit All Answers</button>
            </div>
        </div>
    </div>



</form>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
