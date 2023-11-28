<?php

$page_title = "Movix: Movies";

require_once ('includes/header.php');
require_once('includes/database.php');

$name = $_GET['movie'];
$year = $_GET['year'];
 
// Initialize the query with a base condition
$query_str = "SELECT * FROM $tblMovies WHERE 1";

// Add conditions for name if it's not empty
if (!empty($name)) {
    $query_str .= " AND (movie_name LIKE '%" . $name . "%' OR movie_bio LIKE '%" . $name . "%')";
}

// Add conditions for year if it's not empty
if (!empty($year)) {
    $query_str .= " AND (movie_year LIKE '%" . $year . "%')";
}
//execut the query
$result = $conn->query($query_str);

//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { //display results in a table
    ?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
</head>

<body>
    <div class="container wrapper">
        <ul class="breadcrumb"> <!-- navbar --> 
            <li><a href="index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li class="active">Search Results</li>
        </ul>
        
        <h1 class="text-center">Search Results</h1>
        
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8"> 
			<form action="<?=$_SERVER['PHP_SELF']?>" class="form-inline search-form" method="get" role="form">
                 <div class="input-group">
                     <label class="sr-only" for="movieSearch">Search Movies</label>
                     <div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
                     <input type="text" name="movie" placeholder="Search" id="movieSearch" class="form-control"/>

                 </div><button type="submit" class="btn btn-primary">Go!</button>
                 <div class="input-group">
                     <label class="sr-only" for="yearSearch">Search by Year</label>
                     <div class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></div>
                     <input type="text" name="year" placeholder="Search by Year" id="yearSearch" class="form-control"/>
                   </div>
                <button type="submit" class="btn btn-primary">Go!</button>
            </form>

              <!--// suggestionsearch failed to implement  -->
            </div>
        </div> 
    
    <?php 
    	$num_rows = mysqli_num_rows($result);
    	if ($num_rows == 0) {
    		echo "<p class='lead text-center'>No results found for <strong>". $name . "</strong>. Please search again.</p>";
    	} else {
        //insert a row into the table for each row of data
		$i = 0;
		while ( $result_row = $result->fetch_assoc() ) :
			$i++;
			if ($i == 1) :
	?>
			<div class="row">
			<?php endif; ?>
				<div class="col-xs-4">
					<div class="thumbnail">
						<div class="caption">
							<div class="text-center">
								<a href="moviedetails.php?id=<?php echo $result_row['movie_id']?>">
									<!-- imp part very very  -->
									<img src="<?php echo $result_row['movie_img'] ?>" />
								</a>
							</div>
								<h3 class="text-center">
									<?php
									echo "<a href='moviedetails.php?id=" . $result_row['movie_id'] . "'>", $result_row['movie_name'], "</a>";
									?>
								</h3>
								<p class="lead text-center"><?php echo $result_row['movie_bio'] ?></p>
						</div>
					</div>
				</div>
		<?php if ($i == 3) : ?>
			</div>
		<?php $i=0; endif; endwhile; ?>
		</div>
	 
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include your script.js file -->
    <script src="js/script.js"></script>
    
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
	.breadcrumb {
        background-color: #f8f9fa; 
        padding: 10px;
        border-radius: 5px;
        /* margin-bottom: 20px; */
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
		}
		// clean up resultsets when we're done with them!
	    $result->close();
	}
	
	// close the connection.
	$conn->close();
	
	include ('includes/footer.php'); ?> 

 
  </body>

  </html>