<?php
session_start();

//destroy the session data on disk
session_destroy();

//delete the session cookie
setcookie(session_name(), '', time()-3600);

//destroy the $_SESSION array
$_SESSION = array();

$page_title = "Log Out";
include('includes/header.php');

?>
<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Log Out</li>
    </ul>
    <h1 class="text-center">Logged Out</h1>
    <p class="lead text-center text-danger"> Thank you for your visit. You are now logged out.</p>
</div>
<style> 
	.breadcrumb {
        background-color: #f8f9fa; /* Light background color */
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
        color: #007bff; /* Blue color */
        transition: color 0.3s ease-in-out;
    }

    .breadcrumb a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    .breadcrumb .separator {
        margin: 0 10px;
        color: #6c757d; /* Gray color for separator */
    }

    .breadcrumb .active {
        color: #495057; /* Dark gray color for active/last item */
    }
</style>
<?php
// header( "Refresh:3; url=index.php", true, 303);
include('includes/footer.php'); ?>