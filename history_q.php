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
<form id="quizForm" method="POST" action="submit_quiz_history.php">
    <div class="container mt-5">
        <div class="row"><h2 style="text-align: center;"> Welcome To History Chllange</h2><br><br><br>
            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 1</h5>
                        <p class="card-text">Who was the famous queen of ancient Egypt known for her beauty?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q1" value="A" onclick="showResult('result1', 'A')"> A) Nefertiti</label>
                            <label class="list-group-item"><input type="radio" name="q1" value="B" onclick="showResult('result1', 'B')"> B) Cleopatra</label>
                            <label class="list-group-item"><input type="radio" name="q1" value="C" onclick="showResult('result1', 'C')"> C) Hatshepsut</label>
                            <label class="list-group-item"><input type="radio" name="q1" value="D" onclick="showResult('result1', 'D')"> D) Tutankhamun</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 2</h5>
                        <p class="card-text">What year did the Titanic sink?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q2" value="A" onclick="showResult('result2', 'A')"> A) 1912</label>
                            <label class="list-group-item"><input type="radio" name="q2" value="B" onclick="showResult('result2', 'B')"> B) 1917</label>
                            <label class="list-group-item"><input type="radio" name="q2" value="C" onclick="showResult('result2', 'C')"> C) 1905</label>
                            <label class="list-group-item"><input type="radio" name="q2" value="D" onclick="showResult('result2', 'D')"> D) 1920</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 3</h5>
                        <p class="card-text">Who wrote the famous play "Romeo and Juliet"?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q3" value="A" onclick="showResult('result3', 'A')"> A)  Charles Dickens</label>
                            <label class="list-group-item"><input type="radio" name="q3" value="B" onclick="showResult('result3', 'B')"> B) Jane Austen</label>
                            <label class="list-group-item"><input type="radio" name="q3" value="C" onclick="showResult('result3', 'C')"> C) Mark Twain</label>
                            <label class="list-group-item"><input type="radio" name="q3" value="D" onclick="showResult('result3', 'D')"> D) William Shakespeare</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 4</h5>
                        <p class="card-text">What was the main cause of the fall of the Roman Empire?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q4" value="A" onclick="showResult('result4', 'A')"> A) Natural disasters</label>
                            <label class="list-group-item"><input type="radio" name="q4" value="B" onclick="showResult('result4', 'B')"> B) Barbarian invasions</label>
                            <label class="list-group-item"><input type="radio" name="q4" value="C" onclick="showResult('result4', 'C')"> C) Economic decline</label>
                            <label class="list-group-item"><input type="radio" name="q4" value="D" onclick="showResult('result4', 'D')"> D) Political corruption</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 5</h5>
                        <p class="card-text">Who was the first woman to fly solo across the Atlantic Ocean?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q5" value="A" onclick="showResult('result5', 'A')"> A) Indira Gandhi</label>
                            <label class="list-group-item"><input type="radio" name="q5" value="B" onclick="showResult('result5', 'B')"> B) Amelia Earhart</label>
                            <label class="list-group-item"><input type="radio" name="q5" value="C" onclick="showResult('result5', 'C')"> C) Harriet Quimby</label>
                            <label class="list-group-item"><input type="radio" name="q5" value="D" onclick="showResult('result5', 'D')"> D)  Bessie Coleman</label>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Question 6</h5>
                        <p class="card-text">Who was the first President of the United States?</p>
                        <ul class="list-group mb-3">
                            <label class="list-group-item"><input type="radio" name="q6" value="A" onclick="showResult('result6', 'A')"> A) Abraham Lincoln</label>
                            <label class="list-group-item"><input type="radio" name="q6" value="B" onclick="showResult('result6', 'B')"> B) Thomas Jefferson</label>
                            <label class="list-group-item"><input type="radio" name="q6" value="C" onclick="showResult('result6', 'C')"> C)  George Washington</label>
                            <label class="list-group-item"><input type="radio" name="q6" value="D" onclick="showResult('result6', 'D')"> D) John Adams</label>
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
