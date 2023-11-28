<?php 
	$page_title = "Movix";
	include_once('includes/header.php');
?>


	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol> <!-- dots at the bottom of caraousel  -->

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="assets/indeximg/crla.jpg" alt="First slide" class="img-responsive">
				<div class="jumbotron">
					<div class="container">
						<div class="carousel-caption">
							<h1>Movix Base</h1>
							<p>Welcome to the Movix Review Service!</p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="assets/indeximg/crlb.jpg" alt="Second slide" class="img-responsive">
				<div class="jumbotron">
					<div class="container">
						<div class="carousel-caption">
							<h1>Rate Movies</h1>
							<p>Create an account to review your favorite movies</p>
							<p><a class="btn btn-lg btn-info" href="registration.php" role="button">Sign up today</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="assets/indeximg/crlc.jpg" alt="Third slide" class="img-responsive">
				<div class="jumbotron">
					<div class="container">
						<div class="carousel-caption">
							<h1>Read Reviews</h1>
							<p>Browse all of our reviews and find out more about what others thought of your favorite movies!</p>
							<p><a class="btn btn-lg btn-info" href="reviews.php" role="button">VIEW REVIEWS &raquo;</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
		</div>

	</div><!-- /.carousel is done for now only change is files and captions  -->
 
    <div class="container">
    <!-- First Row -->
    <div class="row">
        <div class="col-md-8">
            <h2>CREATE ACCOUNT</h2>
            <p>Join our community to share your thoughts on your favorite movies.</p>
            <p><a class="btn btn-primary btn-rounded" href="registration.php" role="button">Get Started &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <img src="assets\indeximg\indexa.jpg" alt="create logo" class="img-responsive" style="width: 100%; height: 100%;">
        </div>
    </div>

    <!-- Second Row -->
    <div class="row">
        <div class="col-md-8">
            <img src="assets\indeximg\indexb.jpg" alt="movie logo" class="img-responsive" style="width: 70%; height: 75%;" >
        </div>
        <div class="col-md-4">
            <h2>LIST MOVIES</h2>
            <p>Explore a diverse collection of movies with ratings, years, and reviews.</p>
            <p><a class="btn btn-success btn-rounded" href="movies.php" role="button">Explore Movies &raquo;</a></p>
        </div>
    </div>

    <!-- Third Row -->
    <div class="row">
        <div class="col-md-8">
            <h2>LIST REVIEWS</h2>
            <p>Discover what others think and share your own insights through reviews.</p>
            <p><a class="btn btn-info btn-rounded" href="reviews.php" role="button">Explore Reviews &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <img src="assets\indeximg\indexc.jpg" alt="review logo" class="img-responsive" style="width: 100%; height: 100%;">
        </div>
    </div>
</div>

<style>	
.carousel-caption {
    color: #f95959; 
    transition: color 0.5s ease-in-out; 
	opacity: 0.5;
    transition: opacity 0.1s ease-in-out;
}

.carousel-caption:hover {
    color: #ffffff; 
	 opacity: 1;
}
  
.carousel-inner .item {
    opacity: 0.7;
    transition: opacity 0.1s ease-in-out;
}
 
.carousel-inner .item.active {
    opacity: 1;
}

.btn,
.btn-primary,
.btn-success,
.btn-info {
    transition: background-color 1s ease, border-color 1s ease, color 1s ease;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn:hover,
.btn-primary:hover,
.btn-success:hover,
.btn-info:hover {
    background-color: #d9d6d8;
    border-color: #204d74;
    color: #333;
}

.btn-primary {
    background-image: linear-gradient(to bottom, #4FACFE, #00F2FE);
}

.btn-success {
    background-image: linear-gradient(to bottom, #79D13E, #00D213);
}

.btn-info {
    background-image: linear-gradient(to bottom, #70CCFF, #006EFF);
}

.img-responsive {
    transition: transform 0.5s ease; 
}

.col-md-4:hover .img-responsive {
    transform: scale(1.1); 
}
.col-md-8:hover .img-responsive {
    transform: scale(1.1); 
}

.row {
    margin-bottom: 20px; 
}
</style>

<?php
	include_once('includes/footer.php');