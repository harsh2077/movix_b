<?php
require_once('includes/database.php');
session_start();
// Add this at the beginning of process_feedback.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $feedback_content = mysqli_real_escape_string($conn, $_POST['feedback']);
    if (isset($_SESSION['login'])) { // Check if the user is logged in
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        // User is logged in, get username and email from session
        $username = $_SESSION['login'];
        $email = $_SESSION['email'];  

        // Insert feedback with username and email
        $query = "INSERT INTO feedback (user_name, user_email, feedback_content) 
                  VALUES ('$username', '$email', '$feedback_content')";
    } else {
        // User is not logged in, insert feedback without username and email
        $query = "INSERT INTO feedback (feedback_content) VALUES ('$feedback_content')";
    }

    // Execute the SQL query
    $result = $conn->query($query);
// Add this after the query execution
if ($result) {
    header("Refresh:0; url=index.php", true, 303);
} else {
    echo "Error submitting feedback: " . $conn->error;
}
    if ($result) {
        header("Refresh:0; url=index.php", true, 303);
    } else {
        echo "Error submitting feedback: " . $conn->error;
    }
}

$conn->close();
?>

