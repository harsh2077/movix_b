<?php
$page_title = "Movix: Movies";

require_once('includes/header.php');
require_once('includes/database.php');

// Select statement
$query_str = "SELECT * FROM movies";

// Execute the query
$result = $conn->query($query_str);

// Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
    ?>
    <div class="container wrapper">
	<ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Movies</li>
    </ul>
        <h1 class="text-center">Movies</h1>

        <div class="row">
            <div class="col-md-6">
                <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                    <div class="input-group">
                        <label class="sr-only" for="nameSearch">Search by Name</label>
                        <div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
                        <input type="text" name="movie" placeholder="Search by Name" id="nameSearch" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                    <div class="input-group">
                        <label class="sr-only" for="yearSearch">Search by Year</label>
                        <div class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></div>
                        <input type="text" name="year" placeholder="Search by Year" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
            </div>
        </div>

        <div class="row movie-list">
    <?php 
    $count = 0;
    while ($result_row = $result->fetch_assoc()): 
        if ($count % 3 == 0): // Start a new row for every 3 cards
    ?>
        </div> <!-- Close the previous row if it exists -->
        <div class="row movie-list">
    <?php endif; ?>
    
    <div class="col-lg-4 col-md-6">
        <a href="moviedetails.php?id=<?php echo $result_row['movie_id']?>" class="card-link">
            <div class="card mb-4 shadow">
                <img class="card-img-top" src="<?php echo $result_row['movie_img'] ?>" alt="<?php echo $result_row['movie_name'] ?>"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result_row['movie_name'] ?></h5>
                    <p class="card-text"><?php echo 'Year: ', $result_row['movie_year'] ?></p>
                    <p class="card-text"><?php echo 'Bio: ', $result_row['movie_bio'] ?></p>
                </div>
            </div>
        </a>
    </div>

    <?php 
        $count++;
    endwhile; 
    ?>
</div>


    </div>
	<style>
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
	.card {
        border: 1px solid #ddd;
        transition: all 0.3s ease;
        padding: 15px; 
		border-radius: 15px; 
        overflow: hidden; 
        transform: scale(1); 
        margin-bottom: 15px; 
    }

    .card:hover {
        background-color: #3d1b5f;
        color: white;
        transform: scale(1.05); 
    }

    .card:not(:hover) {
        background-color: #eee;
        color: black;
    }

    .card-title {
        font-size: 1.5em; 
    }
	.card-img-top {
        border-radius: 10px; 
        width: 100%; 
        height: auto; 
        display: block; 
        margin: 0 auto; 
    }
</style>
    <?php
    // Clean up result sets when we're done with them
    $result->close();
}

// Close the connection
$conn->close();

include('includes/footer.php');
?>
