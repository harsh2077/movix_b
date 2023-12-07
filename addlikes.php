<?php 
session_start();
require_once('includes/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_SESSION['id'];
    $review_id = $_GET['review_id'];  
    $check_like_query = "SELECT * FROM liked_reviews WHERE like_user_id = $user_id AND like_review_id = $review_id";
    $check_like_result = $conn->query($check_like_query);

    if ($check_like_result->num_rows == 0) {
        // User hasn't liked the review, add a like
        $add_like_query = "INSERT INTO liked_reviews (like_user_id, like_review_id) VALUES ($user_id, $review_id)";
        $conn->query($add_like_query);
    } else {
        $remove_like_query = "DELETE FROM liked_reviews WHERE like_user_id = $user_id AND like_review_id = $review_id";
        $conn->query($remove_like_query);
    } 
    header("Location: reviews.php");
    exit;
} else {
    // Handle other HTTP methods if needed
    echo "Invalid request method.";
    exit;
}
?>
