<?php
include 'db_conn.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "User not logged in!";
        exit;
    }
    
    $challenge_name = "Programming Challenge";

    $correct_answers = array(
        'q1' => 'A', 
        'q2' => 'D', 
        'q3' => 'A', 
        'q4' => 'B',
        'q5' => 'C', 
        'q6' => 'D'  
    );

    $user_answers = array(
        'q1' => isset($_POST['q1']) ? $_POST['q1'] : null,
        'q2' => isset($_POST['q2']) ? $_POST['q2'] : null,
        'q3' => isset($_POST['q3']) ? $_POST['q3'] : null,
        'q4' => isset($_POST['q4']) ? $_POST['q4'] : null,
        'q5' => isset($_POST['q5']) ? $_POST['q5'] : null,
        'q6' => isset($_POST['q6']) ? $_POST['q6'] : null,
    );

    $score = 0;

    foreach ($correct_answers as $question => $correct_answer) {
        if (isset($user_answers[$question]) && $user_answers[$question] === $correct_answer) {
            $score++;
        }
    }

    $stmt = $conn->prepare("INSERT INTO scores (username, category, score) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $challenge_name, $score);

    if ($stmt->execute()) {
        echo "Result saved!";
    } else {
        echo "Error saving result: " . $stmt->error;
    }

    $stmt->close();

    $_SESSION['score'] = $score;
    header("Location: results.php");
    exit;
} else {
    echo "Invalid request!";
}
?>
