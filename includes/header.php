<?php
//start session
@session_start();
require_once ('includes/database.php');
$login = '';
$name = '';
$role = 0;
$profilePicturePath = '';
if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
}
if (isset($_SESSION['login'])) {
    if (isset($_SESSION['profilePicturePath']) && ($_SESSION['profilePicturePath'] !== NULL)) {
        $profilePicturePath = "assets/userimg/" . $_SESSION['profilePicturePath'];
    } else {
		$profilePicturePath = "assets/userimg/default.jpg";
    }
}
if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
	$role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
	$session_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css"/>

<style>
.profile-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 15px; 
    margin-top: -10px;
    transition: background-color 0.3s ease;
}

.navbar-nav > li.dropdown:hover > .dropdown-menu,
.profile-image:hover {
    background-color: #f9f194;
	transition: background-color 1s ease, border-color 1s ease, color 1s ease;
	
    
}

.navbar {
    background-color: #333; 
    padding: 10px 0; 
}

.navbar-nav > li > a {
    color: white;
}
 
.navbar-nav > li.active > a,
.navbar-nav > li.active > a:hover,
.navbar-nav > li.active > a:focus {
    color: #f9f194; 
}

.navbar-right {
    margin-right: 15px; 
}

.navbar-brand span {
    color: #f9f194;
    font-weight: bold;
    font-size: 20px;
    margin-left: 5px;
    display: inline-block; 
    vertical-align: middle; 
}

.navbar-header {
    margin-left: 15px; 
}

.navbar-middle {
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 100%; 
}

.logo-image {
    display: flex;
    vertical-align: middle;
    margin-right: 10px; 
    width: 60px; 
    height: 60px; 
    border-radius: 50%; 
}

}
</style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">
    <span style="display: inline-block; vertical-align: middle;">Movix</span>
</a>
		<div class=" navbar-middle">
    <img src="assets/logoimg/logo4.jpg" alt="Logo" class="logo-image"></div> 
</div>		
		<div class="navbar-right">
			<div id="navbar" class="navbar-collapse collapse">
				<?php
				if ($role == 1) : ?>
					<ul class="nav navbar-nav">
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, 
					<?php echo $name; ?>!</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?php echo $profilePicturePath; ?>" alt="Profile Image" class="profile-image"> </a>
							<ul class="dropdown-menu" role="menu">
							<li><a href="index.php"><img src="assets/logoimg/home2.png" style="width: 20px; height: 20px;"> - Home</a></li>
								<li><a href="registration.php"><img src="assets/logoimg/register2.png" style="width: 20px; height: 20px;"> - Register</a></li>
								<li><a href="movies.php"><img src="assets/logoimg/movie4.png" style="width: 20px; height: 20px;"> - Movies</a></li>
								<li><a href="reviews.php"><img src="assets/logoimg/review2.png" style="width: 20px; height: 20px;"> - Reviews</a></li>
								<li><a href="addmovie.php"><img src="assets/logoimg/movie4.png" style="width: 20px; height: 20px;"> - Add Movie</a></li>
								<li><a href="liked_reviews.php"><img src="assets/logoimg/like2.png" style="width: 20px; height: 20px;"> - Liked Reviews</a></li>
								<li><a href="logout.php"><img src="assets/logoimg/logout2.png" style="width: 20px; height: 20px;"> - Logout</a></li>
							</ul>
						</li>
								
						 
							</ul>
						</li>						
					</ul>
					<div class=" navbar-brand mr-4" >
			<?php $profilePicturePath = "assets/userimg/" . $_SESSION['profilePicturePath']; ?>
			 
		</div>
				<?php
				endif;
				if ($role == 2) : ?>
					<ul class="nav navbar-nav">
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, <?php print_r($name); ?>!</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false">  
			<?php
			$profilePicturePath = "assets/userimg/" . $_SESSION['profilePicturePath'];
		?>
			<img src="<?php echo $profilePicturePath; ?>" alt="Profile Image" class="profile-image">
		 <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php"><img src="assets/logoimg/home2.png" style="width: 20px; height: 20px;"> - Home</a></li>
								<li><a href="registration.php"><img src="assets/logoimg/register2.png" style="width: 20px; height: 20px;"> - Register</a></li>
								<li><a href="movies.php"><img src="assets/logoimg/movie4.png" style="width: 20px; height: 20px;"> - Movies</a></li>
								<li><a href="reviews.php"><img src="assets/logoimg/review2.png" style="width: 20px; height: 20px;"> - Reviews</a></li>
								<li><a href="liked_reviews.php"><img src="assets/logoimg/like2.png" style="width: 20px; height: 20px;"> - Liked Reviews</a></li>
								<li><a href="logout.php"><img src="assets/logoimg/logout2.png" style="width: 20px; height: 20px;"> - Logout</a></li>
							</ul>
						</li>
					</ul>
				<?php
				endif;
				if (empty($login)) : ?>
					<form class="navbar-form navbar-right" role="form" action="login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-success">
    <img src="assets\logoimg\signin.jpg" alt="Your Image Alt Text" style="height: 20px; width: 20px;">
</button>
					</form>
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"> Navigation <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php">Home</a></li>
								<li><a href="registration.php">Register</a></li>
								<li><a href="movies.php">Movies</a></li>
								<li><a href="reviews.php">Reviews</a></li>
							</ul>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</div>	
	</div> 

</nav>
