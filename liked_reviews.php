<?php
// liked_reviews.php

$page_title = "Movix: Liked Reviews";

require_once('includes/header.php');
require_once('includes/database.php');

// Assuming you store user ID in a session
$user_id = $_SESSION['id'];

// Query to fetch liked reviews for the logged-in user
$liked_reviews_query = "SELECT reviews.*, movies.movie_name
                       FROM liked_reviews
                       JOIN reviews ON liked_reviews.like_review_id = reviews.review_id
                       JOIN movies ON reviews.review_movie_id = movies.movie_id
                       WHERE liked_reviews.like_user_id = $user_id";

$liked_reviews_result = $conn->query($liked_reviews_query);
?>
<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Liked Reviews</li>
    </ul>

    <h1 class="text-center">Liked Reviews</h1> 
    <?php
    while ($liked_review_row = $liked_reviews_result->fetch_assoc()):
        ?>
        <div class="row movie-list">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Liked Review for <a href="moviedetails.php?id=<?= $liked_review_row['review_movie_id'] ?>">
                                <?= $liked_review_row['movie_name'] ?>
                            </a>
                        </h3>
                    </div>
                    <div class="panel-body"> 
                        <h4>
                            Rating:
                            <span class="<?php
                            if ($liked_review_row['review_rating'] >= 4) {
                                echo 'text-success';
                            } elseif ($liked_review_row['review_rating'] < 2) {
                                echo 'text-danger';
                            }
                            ?>">
                                <?= $liked_review_row['review_rating'] ?>
                            </span>
                        </h4>
                        <p class="lead"><?= $liked_review_row['review_content'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>

<style>     
    .movie-list {
        margin-bottom: 20px;
    }

    .panel-heading a {
        text-decoration: none;
        color: #007bff; 
        font-weight: bold;
        transition: color 0.3s ease-in-out; 
    }

    .panel-heading a:hover {
        color: #0056b3; 
    }

    .panel-body {
        padding: 15px;
        background-color: #f8f9fa; 
        transition: background-color 0.3s ease-in-out; 
    }

    .panel:hover .panel-body {
        background-color: #3c2f58; 
    }

    .panel {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
        color: black;
    }

    .panel:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #4b0082; 
        color: white; 
    }

    .text-success {
        color: #28a745;
    }

    .text-danger {
        color: #dc3545;
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

<?php
$conn->close();

include('includes/footer.php');
?>
