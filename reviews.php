<?php

$page_title = "Movix: Reviews";

require_once ('includes/header.php');
require_once ('includes/database.php');

$query_str = "SELECT * FROM movies";
$result = $conn->query($query_str);

?>
 
<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Reviews</li>
    </ul>

    <h1 class="text-center">Reviews</h1>

    <?php
    while ($movie_row = $result->fetch_assoc()):
        $movie_id = $movie_row['movie_id'];
        $review_str = "SELECT * FROM reviews WHERE review_movie_id='$movie_id'";
        $review_result = $conn->query($review_str);
        $review_row = $review_result->fetch_assoc();
        if ($review_row) { ?>
            <div class="movie-box">
                <h2 class="movie-name">
                    <a href="moviedetails.php?id=<?= $movie_row['movie_id'] ?>">
                        <?= $movie_row['movie_name'] ?>
                    </a>
                </h2>
                <div class="reviews-container">
                    <?php
                    $review_result = $conn->query($review_str);
                    while ($review_row = $review_result->fetch_assoc()) :
                        ?>
                        <div class="review-box">
                            <div class="rating-column">
                                <h4>Rating: <span class="<?php
                                    if ($review_row['review_rating'] >= 4 ){
                                        echo 'text-success';
                                    } elseif ( $review_row['review_rating'] < 2 ) {
                                        echo 'text-danger';
                                    }
                                    ?>"><?= $review_row['review_rating'] ?></span></h4>
                            </div>
                            <div class="review-column">
                                <p class="lead"><?= $review_row['review_content'] ?></p>
                            </div>
                            <div class="like-column">
    <?php
    // Add an if statement to check if the user is logged in
    if (isset($_SESSION['login'])) {
        // Inside your while loop where reviews are displayed
        $review_id = $review_row['review_id'];

        $user_id = $_SESSION['id']; // Assuming user ID is stored in the session

        // Query to check if the current review is liked by the user
        $check_like_query = "SELECT * FROM liked_reviews WHERE like_user_id = $user_id AND like_review_id = $review_id";
        $check_like_result = $conn->query($check_like_query);

        // Check if there is a record in the liked_reviews table for this user and review
        $is_liked = $check_like_result->num_rows > 0;
    ?>

    <!-- Inside the while loop where the reviews are displayed -->
    <button class="btn like-button <?= $is_liked ? 'liked' : 'not-liked' ?>"
            data-review-id="<?= $review_row['review_id'] ?>"
            onclick="likeReview(<?= $review_row['review_id'] ?>)">
        <?= $is_liked ? 'Liked' : 'Like' ?>
    </button>
    <?php
    }
    ?>
                            </div>

                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        <?php } endwhile ?>
</div>
<style>
   .movie-box {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    transition: transform 0.3s ease-in-out, background-color 3s ease-in-out;
}

.movie-box:hover {
    transform: scale(1.05);
    background-color: #f0f0f0;
    background-image: linear-gradient(to right, #FFD700, #FF6347);
    color: #fff;
}

.movie-name {
    margin-bottom: 10px;
    transition: color 0.3s ease-in-out;
    color: #eee;
}

.reviews-container {
    display: flex;
    flex-direction: column;
}

.review-box {
    display: flex;
    border: 1px solid #ddd;
    margin-bottom: 5px;
    transition: background-color 0.3s ease-in-out;
}

.review-box:hover {
    background-color: #f0f0f0;
    background-image: linear-gradient(to left, #87CEEB, #FF69B4);
    color: #fff;
}

.like-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    cursor: pointer;
}

.rating-column,
.like-column,
.review-column {
    padding: 10px;
    flex: 1;
}

.like-column {
    display: flex;
    align-items: center;
    justify-content: center;
}

.like-button {
    color: white;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

.like-button.liked {
    background: linear-gradient(to right, #8b0000, #b22222);
}

.like-button.not-liked {
    background: linear-gradient(to right, #006400, #228b22);
}

.like-button:hover {
    background: linear-gradient(to right, #006400, #32cd32);
}

.like-button.liked:hover {
    background: linear-gradient(to right, #8b0000, #ff4500);
}

.breadcrumb {
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.breadcrumb li {
    list-style: none;
    display: inline;
    font-size: 16px;
}

.breadcrumb a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s ease-in-out;
}

.breadcrumb a:hover {
    color: #0056b3;
}

.breadcrumb .separator {
    margin: 0 10px;
    color: #6c757d;
}

.breadcrumb .active {
    color: #495057;
}

</style>


<script>
        function likeReview(reviewId) {
            // Assuming you have jQuery included, you can use AJAX to send data to addlikes.php
            $.ajax({
                type: "GET",
                url: "addlikes.php",
                data: { review_id: reviewId },
                success: function (response) {
                    // Handle success if needed
                    console.log(response);
                },
                error: function (error) {
                    // Handle error if needed
                    console.error(error);
                }
            });
        }
 </script>
<?php
$conn->close();

include ('includes/footer.php');
?>
